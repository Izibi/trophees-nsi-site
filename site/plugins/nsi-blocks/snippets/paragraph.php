<?php if($block->headline()->isNotEmpty()): ?>

  <div class="block -<?= $block->type() ?>">

    <figure class="block__background -bgImg">
      <?= $block->image()->toFile() ?>
    </figure>

    <h2 class="secondaryTitle"><?= $block->headline() ?></h2>

    <div class="block__paragraph">
      <div class="block__paragraph__intro"><?= $block->header()->kirbytext() ?></div>
      <div class="block__paragraph__text"><?= $block->text()->kirbytext() ?></div>
    </div>

  </div>

<?php endif ?>
