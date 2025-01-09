<?php if($block->headline()->isNotEmpty()) : ?>

  <div class="block <?php echo '-'.$block->type() ?> -decoAngle">


      <figure class="block__background -bgImg">
        <?php echo $block->image()->toFile() ?>
      </figure>

      <div class="two-columns">

        <div>
          <h2 class="secondaryTitle"><?php echo $block->headline() ?></h2>
        </div>
        <div class="block__paragraph">
          <div class="block__paragraph__intro"><?php echo $block->header()->kirbytext() ?></div>
          <div class="block__paragraph__text -plain"><?php echo $block->text()->kirbytext() ?></div>
        </div>

      </div>


  </div>

<?php endif ?>
