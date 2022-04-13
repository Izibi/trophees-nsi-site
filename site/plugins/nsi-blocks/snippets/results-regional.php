<?php //if($block->headline()->isNotEmpty()):
$awardtitles = $page->awards_titles()->toStructure();
$awardmap = [];

foreach ($awardtitles as $key => $award):
  $awardmap[] = $award->award_title();
endforeach;

?>

  <div class="block -<?= $block->type() ?>">

      <?php foreach ($block->regions()->toStructure() as $key => $region): ?>

      <section class="block__region">

        <h3 class="block__region__name thirdTitle -secondaryColor">
          <?= $region->name() ?>
          <div class="block__region__fold">
            <img src="<?= $kirby->url('assets') ?>/img/fold.svg" />
          </div>
        </h3>

        <ul class="block__region__awwards">
          <?php foreach ($region->awards()->toStructure() as $key => $award): ?>
          <li class="block__region__awward">

            <!-- Link -->
            <?php if ($award->link()->isNotEmpty()): ?>
            <a class="block__region__awward__link" href="<?= $award->link() ?>" target="_blank">
            <?php endif ?>

            <!-- Table row -->
            <div class="block__region__awward__row">
              <?php $i = $award->award()->toInt() ?>
                <p class="block__region__awward__award"><?= $awardmap[$i] ?></p>
                <p class="block__region__awward__project"><?= $award->headline() ?></p>
                <p class="block__region__awward__school"><?= $award->school() ?></p>
            </div>

            <?php if ($award->link()->isNotEmpty()): ?>
            </a>
            <?php endif ?>
          </li>
          <?php endforeach; ?>
        </ul>

      </section>

      <?php endforeach; ?>

  </div>

<?php //endif ?>
