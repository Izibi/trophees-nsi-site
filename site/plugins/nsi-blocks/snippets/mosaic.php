<?php if($block->headline()->isNotEmpty()): ?>

  <div class="block -<?= $block->type() ?>">

    <h2 class="secondaryTitle"><?= $block->headline() ?></h2>

    <ul class="block__mosaic">
      <?php foreach ($block->thumbnails()->toStructure() as $key => $thumb): ?>
        <li class="block__mosaic__item">
          <figure class="block__mosaic__item__image"><?= svg($thumb->image()->toFile()) ?></figure>
          <p class="block__mosaic__item__text"><?= $thumb->text() ?></p>
        </li>
      <?php endforeach; ?>
    </ul>

    <?= snippet('ui/button', ['label' => $block->cta_label(),
                              'url' => $block->cta_url(),
                              'target' => '_blank'
                              ]) ?>

  </div>

<?php endif ?>
