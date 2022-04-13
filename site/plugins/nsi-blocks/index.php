<?php
Kirby::plugin('nsi/blocks', [
  'blueprints' => [
    'blocks/features' => __DIR__ . '/blueprints/features.yml',
    'blocks/paragraph' => __DIR__ . '/blueprints/paragraph.yml',
    'blocks/mosaic' => __DIR__ . '/blueprints/mosaic.yml',
    'blocks/calendar' => __DIR__ . '/blueprints/calendar.yml',
    'blocks/partners' => __DIR__ . '/blueprints/partners.yml',
    'blocks/step' => __DIR__ . '/blueprints/step.yml',
    'blocks/results-national' => __DIR__ . '/blueprints/results-national.yml',
    'blocks/results-regional' => __DIR__ . '/blueprints/results-regional.yml',
  ],
  'snippets' => [
    'blocks/features' => __DIR__ . '/snippets/features.php',
    'blocks/paragraph' => __DIR__ . '/snippets/paragraph.php',
    'blocks/mosaic' => __DIR__ . '/snippets/mosaic.php',
    'blocks/calendar' => __DIR__ . '/snippets/calendar.php',
    'blocks/partners' => __DIR__ . '/snippets/partners.php',
    'blocks/step' => __DIR__ . '/snippets/step.php',
    'blocks/results-national' => __DIR__ . '/snippets/results-national.php',
    'blocks/results-regional' => __DIR__ . '/snippets/results-regional.php',
    // more snippets
  ],
]);
