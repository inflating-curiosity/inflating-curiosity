<!DOCTYPE html>
<html class="no-js" lang="<?php echo $site->language()->code() ?>">
<head>

  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <title><?php echo $site->title()->html() ?> | <?php echo $page->title()->html() ?></title>
  <meta name="description" content="<?php echo $site->description()->html() ?>">

  <?php snippet('opengraph') ?>

  <!-- Alternate languages url for SEO -->
  <?php foreach ($site->languages() as $language): ?>
    <?php if ($site->language() != $language): ?>
      <link rel="alternate" hreflang="<?php echo $language->code() ?>" href="<?php echo $page->url($language->code()) ?>" />
    <?php endif ?>
  <?php endforeach ?>

  <?php echo js('assets/js/modernizr.min.js') ?>

  <?php echo css('assets/css/main.css') ?>
  <?php echo css('@auto') ?>

  <link href='http://fonts.googleapis.com/css?family=Righteous&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Quicksand:300,400,700' rel='stylesheet' type='text/css'>
</head>
<body>


  <?php snippet('menu') ?>
