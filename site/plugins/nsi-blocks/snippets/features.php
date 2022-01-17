<?php if($block->headline()->isNotEmpty()): ?>

  <div class="block -<?= $block->type() ?> -deco">

    <h2 class="secondaryTitle"><?= $block->headline() ?></h2>
    <div class="intro"><strong><?= $block->text()->kirbytext() ?></strong></div>

    <ul class="block__features">
      <?php foreach ($block->features()->toStructure() as $key => $feature): ?>
        <li class="block__features__feature"><?= $feature->feature() ?></li>
      <?php endforeach; ?>
    </ul>
  </div>

<?php endif ?>
