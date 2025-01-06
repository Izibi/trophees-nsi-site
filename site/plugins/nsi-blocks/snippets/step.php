<?php if($block->headline()->isNotEmpty()): ?>

  <div class="block <?php e($count % 2 == 0, 'full-width') ?> <?= '-'.$block->type() ?>">
    <div class="block__step wrapper">
      <h2 class="block__step__title secondaryTitleAlt"><p class="block__step__number"><?= $count ?></p><?= $block->headline() ?></h2>
      <div class="block__step__content">
        <div class="block__step__text -plain"><?= $block->text()->kirbytext() ?></div>
        <div class="block__step__illustration"><?= svg($block->image()->toFile()) ?> </div>
      </div>
    </div>



  </div>

<?php endif ?>
