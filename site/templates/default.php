<?= snippet('header') ?>

<header class="header -decoBottom">

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
  <?= snippet('ui/brand') ?>


  <!-- Title -->
  <h1 class="header__title secondaryTitle"><?= $page->title() ?></h1>
  <?php if($page->description()->isNotEmpty()): ?>
    <div class="header__desc -plain"><?= $page->description()->kirbytext() ?></div>
  <?php endif ?>

</header>

<section class="content wrapper">

  <?php $count = 1; ?>
  <?php foreach ($page->blocks()->toBlocks() as $key => $block): ?>
    <?php snippet('blocks/' . $block->type(), [
      'block' => $block,
      'count' => $count
    ]);
    if($block->type() == 'step') $count++; ?>
  <?php endforeach; ?>

</section>

<?= snippet('footer') ?>
