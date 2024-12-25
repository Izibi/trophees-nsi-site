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
  <h1 class="header__title primaryTitle"><?= $page->title() ?></h1>
  <div class="header__desc -plain"><?= $page->description()->kirbytext() ?></div>

</header>

<?php if($results = $site->children()->filter('template', '==', 'results')->sortBy('title', 'desc')): ?>
<ul class="results__selector">
  <?php foreach ($results as $result): ?>
  <li>
    <a class="<?php e($result->isOpen(), '-active') ?>" href="<?= $result->url() ?>">
      <?= $result->title() ?>
    </a>
  </li>
  <?php endforeach ?>
</ul>
<?php endif ?>

<?php if($page->statistics()->isNotEmpty()): 
  $stats = $page->statistics()->toStructure() ?>
  <div class="statistic__container">
    <ul class="statistics">
      <?php foreach ($stats as $stat): ?>
      <li class="statistic">
        <p class="statistic__number"><?= $stat -> number() ?></p>
        <p class="statistic__label"><?= $stat -> label() ?></p>
      </li>
      <?php endforeach ?>
    </ul>
  </div>
<?php endif ?>

<div class="pagetabs">
  <div id="tabn" class="tab tabs__first -active">
    <h2 class="secondaryTitle -secondaryColor"><?= $page->headline_national() ?></h2>
  </div>
  <div id="tabr" class="tab tabs__second">
    <h2 class="secondaryTitle -secondaryColor"><?= $page->headline_regional() ?></h2>
  </div>
</div>

<section id="national" class="content ">

  <!-- National -->
    <?php $count = 1; ?>
    <?php foreach ($page->blocks_national()->toBlocks() as $key => $block): ?>
      <?php snippet('blocks/' . $block->type(), [
        'block' => $block,
        'count' => $count
      ]);
      if($block->type() == 'step') $count++; ?>
    <?php endforeach; ?>

</section>

<section id="regional" class="content -hidden">

  <!-- Regional -->
    <?php $count = 1; ?>
    <?php foreach ($page->blocks_regional()->toBlocks() as $key => $block): ?>
      <?php snippet('blocks/' . $block->type(), [
        'block' => $block,
        'count' => $count
      ]);
      if($block->type() == 'step') $count++; ?>
    <?php endforeach; ?>


</section>

<?= snippet('footer') ?>
