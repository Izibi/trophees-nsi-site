<?php echo snippet('header') ?>

<header class="header -decoBottom">

  <!-- Cover -->
  <?php if (null !== $page->cover()->toFile() ) : ?>
    <figure class="cover__img -bgImg">
        <?php $image = $page->cover()->toFile() ?>
      <img
          src="<?php echo $image->url() ?>"
          srcset="<?php echo $image->srcset([300, 800, 1024]) ?>" />
    </figure>
  <?php endif; ?>

  <?php echo snippet('ui/menu') ?>
  <?php echo snippet('ui/brand') ?>


  <!-- Title -->
  <h1 class="header__title primaryTitle"><?php echo $page->title() ?></h1>
  <div class="header__desc -plain"><?php echo $page->description()->kirbytext() ?></div>

</header>

<div class="wrapper">

<?php if($results = $site->children()->filter('template', '==', 'results')->sortBy('title', 'desc')) : ?>
<ul class="results__selector">
    <?php foreach ($results as $result): ?>
  <li>
    <a class="results__selector__item <?php e($result->isOpen(), '-active') ?>" href="<?php echo $result->url() ?>">
        <?php echo $result->title() ?>
    </a>
  </li>
    <?php endforeach ?>
</ul>
<?php endif ?>

<?php if($page->statistics()->isNotEmpty()) : 
    $stats = $page->statistics()->toStructure() ?>
  <div class="statistic__container">
    <ul class="statistics">
      <?php foreach ($stats as $stat): ?>
      <li class="statistic">
        <p class="statistic__number"><?php echo $stat -> number() ?></p>
        <p class="statistic__label"><?php echo $stat -> label() ?></p>
      </li>
      <?php endforeach ?>
    </ul>
  </div>
<?php endif ?>

<div class="pagetabs">
  <div id="tabn" class="tab tabs__first -active">
    <h2 class="thirdTitle -secondaryColor"><?php echo $page->headline_national() ?></h2>
  </div>
  <div id="tabr" class="tab tabs__second">
    <h2 class="thirdTitle -secondaryColor"><?php echo $page->headline_regional() ?></h2>
  </div>
</div>

<section id="national" class="content ">

  <!-- National -->
    <?php $count = 1; ?>
    <?php foreach ($page->blocks_national()->toBlocks() as $key => $block): ?>
        <?php snippet(
            'blocks/' . $block->type(), [
            'block' => $block,
            'count' => $count
            ]
        );
        if($block->type() == 'step') { $count++;
        } ?>
    <?php endforeach; ?>

</section>

<section id="regional" class="content -hidden">

  <!-- Regional -->
    <?php $count = 1; ?>
    <?php foreach ($page->blocks_regional()->toBlocks() as $key => $block): ?>
        <?php snippet(
            'blocks/' . $block->type(), [
            'block' => $block,
            'count' => $count
            ]
        );
        if($block->type() == 'step') { $count++;
        } ?>
    <?php endforeach; ?>


</section>
    </div>

<?php echo snippet('footer') ?>
