<nav class="menu">
  <?php foreach ($site->menu_links()->toPages() as $key => $page): ?>
    <a class="menu__entry <?php e($page->isOpen(), ' -active') ?>" href="<?= $page->url() ?>">
      <?= $page->short(); ?>
    </a>
  <?php endforeach; ?>
</nav>
