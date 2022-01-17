<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <title><?= $site->title()?></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta property="og:title" content="">
  <meta property="og:type" content="">
  <meta property="og:url" content="">
  <meta property="og:image" content="">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->

  <link rel="stylesheet" href="css/normalize.css">
  <?= css([
    'https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css',
    'assets/css/normalize.css',
    'assets/fonts/bebas/index.css',
    'assets/fonts/roboto-slab/index.css',
    'assets/css/main.css',
  ]) ?>

  <meta name="theme-color" content="#E94E1B">

</head>

<body class="<?= $page->template() ?>">
