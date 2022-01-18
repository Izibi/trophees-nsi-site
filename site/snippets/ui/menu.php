<nav class="menu">

  <?= snippet('ui/brand') ?>

  <div class="menu__list">
    <?php foreach ($site->menu_links()->toPages() as $key => $item): ?>
      <?php $url = $item->blueprint()->name() == "pages/link" ? $item->target() : $item->url()  ?>
      <a class="menu__entry <?php e($item->isOpen(), ' -active') ?>" href="<?= $url ?>">
        <?= $item->short(); ?>
      </a>
    <?php endforeach; ?>
  </div>

</nav>
