<?php if($block->headline()->isNotEmpty()): ?>

  <div class="block -<?= $block->type() ?>">

    <h2 class="secondaryTitle"><?= $block->headline() ?></h2>

    <div class="block__intro -plain"><?= $block->text()->kirbytext() ?></div>

    <ul class="block__partnersVerbatim">
      <?php foreach ($block->partners()->toStructure() as $key => $partner): ?>
        <li class="block__partnersVerbatim__partner">
          <a href="<?= $partner->url() ?>" target="_blank">
          <figure class="block__partnersVerbatim__partner__logo">
              <?php if($logo = $partner->logo()->toFile()): ?>
              <img src="<?= $logo->url() ?>"
                   srcset="<?= $logo->srcset([60, 200, 300]) ?>"
                   alt="<?= $partner->name() ?>"/>
              <?php endif ?>
            </figure>
            <div class="block__partnersVerbatim__partner__text">
              <p class="block__partnersVerbatim__partner__name"><?= $partner->name() ?></p>
              <p class="block__partnersVerbatim__partner__verbatim"><?= $partner->verbatim() ?></p>
            </div>
          </a>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>

<?php endif ?>
