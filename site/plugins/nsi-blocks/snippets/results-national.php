<?php //if($block->headline()->isNotEmpty()): ?>

  <div class="block -<?= $block->type() ?>">

      <?php foreach ($block->awards()->toStructure() as $key => $award): ?>

        <div class="block__award">

          <!-- Titles -->
          <h3 class="block__award__awardTitle thirdTitle -secondaryColor"><?= $award->award() ?></h3>
          <p class="block__award__gain -primaryColor"><?= $award->gain() ?></p>

          <!-- Content -->
          <div class="block__award__content">

            <!-- Picture -->
            <div class="block__award__picture">
              <a class="block__award__picture__link" href="<?= $award->video() ?>" target="_blank">
              <figure class="block__award__picture__image">
                <?php if(!$award->picture()->isEmpty()) echo $award->picture()->toFile()->crop(300) ?>
                <div class="block__award__picture__button">
                  <img class="block__award__picture__button__icon" src="<?= $kirby->url('assets') ?>/img/play.svg" />
                  <span>Voir la vidéo</span>
                </div>
              </figure>
              </a>
            </div>

            <!-- Text -->
            <div class="block__award__text">
              <h3 class="block__award__headline thirdTitle"><?= $award->headline() ?></h3>
              <div class="block__award__description"><?= $award->description()->kirbytext() ?></div>
            </div>

          </div> <!-- End of block__award__content -->

        </div> <!-- End of block__award-->

      <?php endforeach; ?>

  </div>

<?php //endif ?>
