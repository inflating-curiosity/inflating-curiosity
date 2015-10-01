 
<?php snippet('header') ?>

<div class="site-container">

  <header class="site-header cf">
      <?php snippet('logo') ?>

      <div class="cf"></div>
      
  </header><!-- / .site-header -->

  <section class="site-content">
  	<div class="page-desc">
  	<?php echo $page->text()->kirbytext() ?>
  	</div>

  </section>


        
<!--END .site-container-->
</div>


<?php snippet('footer') ?>