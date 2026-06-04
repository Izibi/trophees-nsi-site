<?php echo snippet('header') ?>

<header class="header -decoBottom">

  <!-- Cover -->
  <?php if (null !== $page->cover()->toFile() ) : ?>
    <figure class="cover__img -bgImg">
        <?php $image = $page->cover()->toFile() ?>
      <img
          src="<?php echo $image->url() ?>"
          srcset="<?php echo $image->srcset([300, 800, 1024]) ?>" />
    </figure>
  <?php endif; ?>

  <?php echo snippet('ui/menu') ?>
  <?php echo snippet('ui/brand') ?>

  <!-- Title -->
  <h1 class="header__title primaryTitle"><?php echo $page->title() ?></h1>
  <div class="header__desc -plain"><?php echo $page->description()->kirbytext() ?></div>

</header>

<?php
// Shuffle projects and assign IDs
$projectsArray = [];
if($projects = $page->projects()->toStructure()) {
  foreach ($projects as $index => $project) {
    $projectsArray[] = [
      'id' => $index,
      'data' => $project
    ];
  }
  shuffle($projectsArray);
}
?>

<div class="wrapper">

<!-- Voting Form -->
<section class="voting-form" style="background: #f5f5f5; padding: 2rem; margin: 2rem 0; border-radius: 8px;">
  <h2 class="thirdTitle -secondaryColor">Votez pour votre projet préféré</h2>

  <div id="vote-message" style="padding: 1rem; margin: 1rem 0; border-radius: 4px; background: #d4edda; color: #155724; border: 1px solid #c3e6cb;">
    Merci à toutes et tous de votre participation&nbsp;! Les votes sont désormais clos. Le résultat sera annoncé en direct lors de la cérémonie de clôture des Trophées NSI 2026. Nous vous donnons rendez-vous le 9 juin pour découvrir le projet gagnant.
  </div>
  
<!--  <div id="vote-message" style="display: none; padding: 1rem; margin: 1rem 0; border-radius: 4px;"></div>
  
  <form id="vote-form" action="https://depot.trophees-nsi.fr/vote-du-public/vote" method="post" style="margin: 1rem 0;">
    <div style="margin-bottom: 1rem;">
      <label for="email" style="display: block; margin-bottom: 0.5rem; font-weight: bold;">Adresse e-mail *</label>
      <input 
        type="email" 
        id="email" 
        name="email" 
        required 
        style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; box-sizing: border-box;"
        placeholder="votre@email.fr"
      />
    </div>
    
    <div style="margin-bottom: 1.5rem;">
      <label for="project" style="display: block; margin-bottom: 0.5rem; font-weight: bold;">Choisissez votre projet favori *</label>
      <select 
        id="project" 
        name="project" 
        required
        style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; background: white; box-sizing: border-box;"
      >
        <option value="">-- Sélectionnez un projet --</option>
        <?php foreach ($projectsArray as $item): ?>
          <option value="<?php echo $item['id'] ?>">
            <?php echo $item['data']->headline()->html() ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>
    
    <button 
      type="submit" 
      id="vote-button"
      style="width: 100%; background: #FF6B35; color: white; padding: 0.75rem 2rem; border: none; border-radius: 4px; font-size: 1rem; font-weight: bold; cursor: pointer; transition: background 0.3s; box-sizing: border-box;"
      onmouseover="this.style.background='#E55A2B'"
      onmouseout="this.style.background='#FF6B35'"
    >
      Voter
    </button>
  </form>
  <p style="margin-top: 1rem; font-size: 0.9rem; color: #666;">
    Un seul vote par jour par personne. L'adresse e-mail ne sera utilisée que pour le vote, et sera seulement conservée pendant cette édition des Trophées NSI. Les votes automatisés ou doublons pourront être annulés.
  </p>-->
  
  <script>
  (function() {
    const form = document.getElementById('vote-form');
    const messageDiv = document.getElementById('vote-message');
    const submitButton = document.getElementById('vote-button');
    
    form.addEventListener('submit', async function(e) {
      e.preventDefault();
      
      // Disable button and show loading state
      submitButton.disabled = true;
      submitButton.textContent = 'Envoi en cours...';
      messageDiv.style.display = 'none';
      
      const formData = new FormData(form);
      const data = {
        email: formData.get('email'),
        project: parseInt(formData.get('project'), 10)
      };
      
      try {
        const response = await fetch('https://depot.trophees-nsi.fr/vote-du-public/vote', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
          },
          body: JSON.stringify(data)
        });
        
        const result = await response.json();
        
        if (result.success) {
          // Success - show message and remove form
          messageDiv.textContent = 'Un mail vous a été envoyé, veuillez cliquer sur le lien afin de confirmer votre vote.';
          messageDiv.style.display = 'block';
          messageDiv.style.background = '#d4edda';
          messageDiv.style.color = '#155724';
          messageDiv.style.border = '1px solid #c3e6cb';
          form.style.display = 'none';
        } else {
          // Error - show appropriate message
          if (result.error === 'already_voted') {
            messageDiv.textContent = 'Il semblerait que vous ayez déjà voté aujourd\'hui, veuillez attendre demain avant de voter de nouveau.';
          } else {
            messageDiv.textContent = 'Erreur lors de l\'enregistrement de votre vote, veuillez vérifier votre adresse e-mail puis réessayer dans quelques minutes.';
          }
          messageDiv.style.display = 'block';
          messageDiv.style.background = '#f8d7da';
          messageDiv.style.color = '#721c24';
          messageDiv.style.border = '1px solid #f5c6cb';
          
          // Re-enable button
          submitButton.disabled = false;
          submitButton.textContent = 'Voter';
        }
      } catch (error) {
        // Network or other error
        messageDiv.textContent = 'Erreur lors de l\'enregistrement de votre vote, veuillez vérifier votre adresse e-mail puis réessayer dans quelques minutes.';
        messageDiv.style.display = 'block';
        messageDiv.style.background = '#f8d7da';
        messageDiv.style.color = '#721c24';
        messageDiv.style.border = '1px solid #f5c6cb';
        
        // Re-enable button
        submitButton.disabled = false;
        submitButton.textContent = 'Voter';
      }
    });
  })();
  </script>
</section>

<!-- Projects Display -->
<section class="content">
  <h2 class="thirdTitle -secondaryColor"><?php echo $page->headline_projects() ?></h2>
  
  <div class="-results-national">

      <?php foreach ($projectsArray as $item): ?>
        <?php $project = $item['data']; ?>

        <div class="block__award">

          <!-- Titles -->
          <?php if ($project->school()->isNotEmpty()): ?>
            <p class="block__award__gain -primaryColor"><?= $project->school() ?></p>
          <?php endif ?>

          <!-- Content -->
          <div class="block__award__content">

            <!-- Picture -->
            <div class="block__award__picture">
              <a class="block__award__picture__link" href="<?= $project->video_link() ?>" target="_blank">
              <figure class="block__award__picture__image">
                <?php if(!$project->picture()->isEmpty()) echo $project->picture()->toFile()->crop(300) ?>
                <div class="block__award__picture__button">
                  <img class="block__award__picture__button__icon" src="<?= $kirby->url('assets') ?>/img/play.svg" />
                  <span>Voir la vidéo</span>
                </div>
              </figure>
              </a>
            </div>

            <!-- Text -->
            <div class="block__award__text">
              <h3 class="block__award__headline thirdTitle"><?= $project->headline() ?></h3>
              <?php if ($project->link()->isNotEmpty()): ?>
              <div style="margin-top: 8px; margin-bottom: 8px;"><a class="readPDF" href="<?= $project->link() ?>" target="_blank">
                <?= asset('assets/img/icon-doc.svg')->read() ?>
                Accédez au dossier technique
              </a></div>
              <?php endif ?>
              <div class="block__award__description"><?= $project->description()->kirbytext() ?></div>
              <?php if ($pdf = $project->pdf()->toFile()): ?>
              <a class="readPDF" href="<?= $pdf->url() ?>" target="_blank">Lire le pdf</a>
              <?php endif ?>
              <?php if ($project->team()->isNotEmpty()): ?>
              <div class="block__national__awward__team">
                <?= $project->team()->kirbyText() ?>
              </div>
              <?php endif ?>
            </div>

          </div> <!-- End of block__award__content -->

        </div> <!-- End of block__award-->

      <?php endforeach; ?>

  </div>

</section>

</div>

<?php echo snippet('footer') ?>
