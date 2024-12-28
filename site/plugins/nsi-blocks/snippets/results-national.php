<?php //if($block->headline()->isNotEmpty()):
$awardtitles = $page->awards_titles()->toStructure();
$awardmap = [];

foreach ($awardtitles as $key => $award):
  $awardmap[] = $award->award_title();
endforeach;

?>

  <div class="block -<?= $block->type() ?>">

      <?php foreach ($block->awards()->toStructure() as $key => $award): ?>

        <div class="block__award">

          <!-- Titles -->
          <?php $i = $award->award()->toInt() ?>
          <h3 class="block__award__awardTitle thirdTitle -secondaryColor"><?= $awardmap[$i] ?></h3>
          <?php if ($award->gain()->isNotEmpty()): ?>
            <p class="block__award__gain -primaryColor"><?= $award->gain() ?></p>
          <?php endif ?>

          <!-- Content -->
          <div class="block__award__content">

            <!-- Picture -->
            <div class="block__award__picture">
              <a class="block__award__picture__link" href="<?= $award->video() ?>" target="_blank">
              <figure class="block__award__picture__image">
                <?php if(!$award->picture()->isEmpty()) echo $award->picture()->toFile()->crop(300) ?>
                <div class="block__award__picture__button">
                  <img class="block__award__picture__button__icon" src="<?= $kirby->url('assets') ?>/img/play.svg" />
                  <span>Voir la vidéo</span>
                </div>
              </figure>
              </a>
            </div>

            <!-- Text -->
            <div class="block__award__text">
              <h3 class="block__award__headline thirdTitle"><?= $award->headline() ?></h3>
              <div class="block__award__description"><?= $award->description()->kirbytext() ?></div>
              <?php if ($pdf = $award->pdf()->toFile()): ?>
              <a class="readPDF" href="<?= $pdf->url() ?>" target="_blank">Lire le pdf</a>
              <?php endif ?>
              <?php if ($award->team()->isNotEmpty()): ?>
              <div class="block__national__awward__team">
                <?= $award->team()->kirbyText() ?>
              </div>
              <?php endif ?>
            </div>

          </div> <!-- End of block__award__content -->

        </div> <!-- End of block__award-->

      <?php endforeach; ?>

  </div>

<?php //endif ?>
