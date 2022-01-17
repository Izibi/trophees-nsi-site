<?= snippet('header') ?>

<?php
$news = $page->news()->toStructure();

function selectNews($news) {
  foreach ($news as $key => $article) {
    if($article->published() == 'true') return $article;
  };
  return null;
};

?>

<header class="cover">

  <!-- Cover -->
  <?php if (null !== $page->cover()->toFile() ): ?>
    <figure class="cover__img -bgImg">
      <?php $image = $page->cover()->toFile() ?>
      <img
          src="<?= $image->url() ?>"
          srcset="<?= $image->srcset([300, 800, 1024]) ?>" />
    </figure>
  <?php endif; ?>

  <?= snippet('ui/menu') ?>

  <!-- Logo -->
  <figure class="cover__brand">
      <?= asset('assets/img/nsi-logo.svg')->read() ?>
  </figure>

  <!-- News -->
  <div class="cover__news">
    <h2 class="secondaryTitle"><?= $page->news_headline() ?></h2>
    <div class="cover__news__text"><?= selectNews($news)->text()->kirbytext() ?></div>
  </div>

</header>

<section class="content">

  <?php foreach ($page->blocks()->toBlocks() as $key => $block): ?>
      <?= $block ?>
  <?php endforeach; ?>

</section>

<?= snippet('footer') ?>
