<?php if($block->headline()->isNotEmpty()): ?>

  <div class="block -<?= $block->type() ?>">

    <p class="block__step__number"><?= $count ?></p>

    <div class="block__step">
      <h2 class="block__step__title secondaryTitle"><?= $block->headline() ?></h2>
      <div class="block__step__text -plain"><?= $block->text()->kirbytext() ?></div>
    </div>

    <div class="block__step__illustration"><?= svg($block->image()->toFile()) ?> </div>


  </div>

<?php endif ?>
