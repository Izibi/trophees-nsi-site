<?php if($block->headline()->isNotEmpty()): ?>

  <div class="block -<?= $block->type() ?>">

    <h2 class="secondaryTitle"><?= $block->headline() ?></h2>

    <div class="block__intro -plain"><?= $block->text()->kirbytext() ?></div>

    <ul class="block__jury">
      <?php foreach ($block->jury()->toStructure() as $key => $member): ?>
        <li class="block__jury__partner">
          <figure class="block__jury__partner__logo">
              <?php if($logo = $member->logo()->toFile()): ?>
              <img src="<?= $logo->url() ?>"
                   srcset="<?= $logo->srcset([60, 200, 300]) ?>"
                   alt="<?= $member->name() ?>"/>
              <?php endif ?>
            </figure>
            <div class="block__jury__partner__text">
              <p class="block__jury__partner__name"><?= $member->name().' '.$member->first_name() ?></p>
              <p class="block__jury__partner__organization"><?= $member->organization() ?></p>
              <p class="block__jury__partner__role"><?= $member->role() ?></p>
            </div>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>

<?php endif ?>
