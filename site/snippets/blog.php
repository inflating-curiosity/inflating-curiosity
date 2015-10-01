


<section class="site-content">

	<div class="page-desc">
	      <?php echo $page->text()->kirbytext() ?>
	</div>

	<article class="news">

	    <?php foreach($posts as $article): ?>
	    <div class="blog_item full grey_bg ">
	        <a class="full_link" href="<?php echo $article->url() ?>"></a>
	        <!--
              We choose selected image from project item.
              -->
              <?php
                $selectedImage = $article->thumbimage();
              ?>
              <?php if($image = $article->images()->sortBy('sort', 'asc')->find((string)$selectedImage)): ?>
	        <div class="abs_bg" style="background-image: url('<?php echo thumb($image, array('width' => 1920, 'crop' => true))->url() ?>')"></div>
	        <?php endif ?>
	        <div class="blog_item_inner">
	            <h1><?php echo $article->title()->html() ?></h1>
	            <h5 class="date"><?php echo $article->author() ?> | <?php echo $article->date(l::get('date.format')) ?></h5>
	        </div>
	    </div>
	    <?php endforeach ?>

	</article>

	<!--END .site-content-->
</section>

<nav role="navigation">
	<ul class="cd-pagination animated-buttons custom-icons">
	    <?php if($pagination->hasPrevPage()): ?>
	    	<li class="button"><a href="<?php echo $pagination->prevPageURL() ?>"><i><?php echo l::get('nav.prev') ?></i></a></li>
	    <?php endif ?>
	    <?php foreach($pagination->range(10) as $r): ?>
			<li><a<?php if($pagination->page() == $r) echo ' class="current"' ?> href="<?php echo $pagination->pageURL($r) ?>"><?php echo $r ?></a></li>
		<?php endforeach ?>
	    <?php if($pagination->hasNextPage()): ?>
	    	<li class="button"><a href="<?php echo $pagination->nextPageURL() ?>"><i><?php echo l::get('nav.next') ?></i></a></li>
	    <?php endif ?>
	</ul>
</nav> <!-- cd-pagination-wrapper -->



