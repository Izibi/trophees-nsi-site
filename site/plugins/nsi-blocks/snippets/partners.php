<?php if($block->headline()->isNotEmpty()): ?>

  <div class="block -<?= $block->type() ?>">

    <h2 class="secondaryTitle"><?= $block->headline() ?></h2>

    <ul class="block__partners">
      <?php foreach ($block->partners()->toStructure() as $key => $partner): ?>
        <li class="block__partners__partner">
          <figure class="block__partners__partner__logo">
            <a href="<?= $partner->url() ?>" target="_blank">
              <img src="<?= $partner->logo()->toFile()->url() ?>"
                   srcset="<?= $partner->logo()->toFile()->srcset([60, 100, 100]) ?>"
                   alt="<?= $partner->name() ?>"/>
            </a>
          </figure>
        </li>
      <?php endforeach; ?>
    </ul>

    <div class="block__intro"><?= $block->text()->kirbytext() ?></div>

  </div>

<?php endif ?>
