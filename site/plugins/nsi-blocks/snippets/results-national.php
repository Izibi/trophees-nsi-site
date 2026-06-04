<?php //if($block->headline()->isNotEmpty()):
$awardtitles = $page->awards_titles()->toStructure();
$awardmap = [];

foreach ($awardtitles as $key => $award):
  $awardmap[] = $award->award_title();
endforeach;

?>

  <div class="block -<?= $block->type() ?>">

      <?php foreach ($block->awards()->toStructure() as $key => $award): ?>

        <div class="block__award">

          <!-- Titles -->
          <?php $i = $award->award()->toInt() ?>
          <h3 class="block__award__awardTitle thirdTitle -secondaryColor"><?= $awardmap[$i] ?></h3>
          <?php if ($award->gain()->isNotEmpty()): ?>
            <p class="block__award__gain -primaryColor"><?= $award->gain() ?></p>
          <?php endif ?>

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
              <?php if ($award->dossier()->isNotEmpty()): ?>
              <div style="margin-top: 8px; margin-bottom: 8px;"><a class="readPDF" href="<?= $award->dossier() ?>" target="_blank">
                <?= asset('assets/img/icon-doc.svg')->read() ?>
                Accédez au dossier technique
              </a></div>
              <?php endif ?>
              <div class="block__award__description"><?= $award->description()->kirbytext() ?></div>
              <?php if ($pdf = $award->pdf()->toFile()): ?>
              <a class="readPDF" href="<?= $pdf->url() ?>" target="_blank">Lire le pdf</a>
              <?php endif ?>
              <?php if ($award->team()->isNotEmpty()): ?>
              <div class="block__national__awward__team">
                <?= $award->team()->kirbyText() ?>
              </div>
              <?php endif ?>
            </div>

          </div> <!-- End of block__award__content -->

          <!-- Nominés -->
          <?php if ($award->nomines()->isNotEmpty()): ?>
          <div class="block__award__nomines">
            <h4 class="block__award__nomines__title">Nominés</h4>
            <ul class="block__award__nomines__list">
              <?php foreach ($award->nomines()->toStructure() as $nomine): ?>
              <li class="block__award__nomine">
                <div class="block__award__nomine__row">
                  <p class="block__award__nomine__project"><?= $nomine->headline() ?></p>
                  <p class="block__award__nomine__school"><?= $nomine->school() ?></p>
                  <div class="block__award__nomine__links">
                    <?php if ($pdf = $nomine->pdf()->toFile()): ?>
                      <p class="block__award__nomine__pdf">
                        <a href="<?= $pdf->url() ?>" target="_blank" title="PDF de présentation">
                          <?= asset('assets/img/icon-doc.svg')->read() ?>
                        </a>
                      </p>
                    <?php endif ?>
                    <?php if ($nomine->dossier()->isNotEmpty()): ?>
                      <p class="block__award__nomine__pdf">
                        <a href="<?= $nomine->dossier() ?>" target="_blank" title="Dossier technique">
                          <?= asset('assets/img/icon-doc.svg')->read() ?>
                        </a>
                      </p>
                    <?php endif ?>
                    <?php if ($nomine->video_link()->isNotEmpty()): ?>
                      <p class="block__award__nomine__video">
                        <a href="<?= $nomine->video_link() ?>" target="_blank" title="Vidéo de présentation">
                          <?= asset('assets/img/icon-play.svg')->read() ?>
                        </a>
                      </p>
                    <?php endif ?>
                  </div>
                </div>
                <?php if ($nomine->team()->isNotEmpty()): ?>
                  <div class="block__award__nomine__team">
                    <?= $nomine->team()->kirbyText() ?>
                  </div>
                <?php endif ?>
              </li>
              <?php endforeach ?>
            </ul>
          </div>
          <?php endif ?>

        </div> <!-- End of block__award-->

      <?php endforeach; ?>

  </div>

<?php //endif ?>
