<nav class="menu">

  <?= snippet('ui/brand') ?>


  <div class="menu__list">

    <!-- Home link -->
    <div class="menu__home <?php e($site->homepage()->isOpen(), ' -active') ?>"><a href="<?= $site->homePage()->url() ?>"><?= asset('assets/img/home.svg')->read() ?></a></div>

    <!-- Other pages link -->
    <?php foreach ($site->menu_links()->toPages() as $key => $item): ?>
      <?php $url = $item->blueprint()->name() == "pages/link" ? $item->target() : $item->url()  ?>
      <a class="menu__entry <?php e($item->isOpen(), ' -active') ?>" href="<?= $url ?>">
        <?= '' != $item->short()
        ? $item->short()
        : $item->title() ?>
      </a>
    <?php endforeach; ?>
  </div>

</nav>
