<?php if($block->headline()->isNotEmpty()): ?>

  <div class="block -<?= $block->type() ?>">
    <div class="wrapper">

    <h2 class="secondaryTitle"><?= $block->headline() ?></h2>

    <ul class="block__calendar">
      <?php foreach ($block->dates()->toStructure() as $key => $date): ?>
        <li class="block__calendar__date">
          <div class="block__calendar__date__marker <?= $date->duration() == "true" ? '-duration' : '' ?>"></div>
          <figure class="block__calendar__date__icon"><?= svg($date->icon()->toFile()) ?></figure>
          <p class="block__calendar__date__text"><?= $date->date_headline() ?></p>
          <p class="block__calendar__date__day"><?= $date->day() ?></p>
          <p class="block__calendar__date__hour"><?= $date->hour() ?></p>
          <p class="block__calendar__date__comment"><?= $date->comment() ?></p>
        </li>
      <?php endforeach; ?>
    </ul>
    </div>

  </div>

<?php endif ?>
