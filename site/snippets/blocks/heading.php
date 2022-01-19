<<?= $level = $block->level()->or('h2') ?> class="secondaryTitle" id="<?= $site->slugify($block->text()) ?>">
  <?= $block->text() ?>
</<?= $level ?>>
