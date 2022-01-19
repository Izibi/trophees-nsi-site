<?php if($block->headline()->isNotEmpty()): ?>

  <div class="block -<?= $block->type() ?> -deco">

    <h2 class="block__features__title secondaryTitle"><?= $block->headline() ?></h2>

    <div class="block__features__text">
      <div class="block__features__intro intro -plain"><strong><?= $block->text()->kirbytext() ?></strong></div>

      <ul class="block__features">
        <?php foreach ($block->features()->toStructure() as $key => $feature): ?>
          <li class="block__features__feature"><?= $feature->feature() ?></li>
        <?php endforeach; ?>
      </ul>
    </div>

  </div>

<?php endif ?>
