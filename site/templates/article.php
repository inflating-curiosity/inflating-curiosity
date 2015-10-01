
<?php snippet('header') ?>

<div class="site-container">

  <header class="site-header cf">
      <?php snippet('logo') ?>

      <div class="cf"></div>

      <div class="site-tagline">
          <h1><?php echo $page->title()->html() ?></h1>
          <h6 class="date"><?php echo $page->author() ?> | <?php echo $page->date(l::get('date.format')) ?></h6>
      </div>

  </header><!-- / .site-header -->

  <section class="site-content">

      <!--
  	We choose selected image from project item.
 	 -->
 	 <?php
    		$selectedImage = $page->thumbimage();
  	?>
  	<?php if($image = $page->images()->sortBy('sort', 'asc')->find((string)$selectedImage)): ?>
      <div class="image">
        <img src="<?php echo $image->url() ?>">
      </div>
      <?php endif ?>

      <div class="page-desc">
      	<?php echo $page->text()->kirbytext() ?>
      </div>
  <!--END .site-content-->
  </section>

  <nav role="navigation">
	<ul class="cd-pagination animated-buttons custom-icons">
	    <li class="button"><a href="<?php echo $page->hasPrevVisible()? $page->prevVisible()->url(): '#' ?>" class="button <?php e(!$page->hasPrevVisible(), ' disabled' ) ?>"><i><?php echo l::get('nav.prev') ?></i></a></li>
	    <li class="button"><a href="<?php echo $page->hasNextVisible()? $page->nextVisible()->url(): '#' ?>" class="<?php e(!$page->hasNextVisible(), ' disabled' ) ?>"><i><?php echo l::get('nav.next') ?></i></a></li>

	</ul>
  </nav> <!-- cd-pagination-wrapper -->

<!--END .site-container-->
</div>


<?php snippet('footer') ?>
