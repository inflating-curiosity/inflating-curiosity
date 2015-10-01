<?php snippet('header') ?>

<div class="site-container">

  <header class="site-header cf">
      <?php snippet('logo') ?>

      <div class="cf"></div>

      <div class="site-tagline">
          <?php echo $page->text()->kirbytext() ?>
      </div>
      
  </header><!-- / .site-header -->

  <?php snippet('forum') ?>


<!--END .site-container-->
</div>
<?php snippet('footer') ?>
