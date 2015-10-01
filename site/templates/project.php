
<?php snippet('header') ?>

<div class="site-container">

  <header class="site-header cf">
      <?php snippet('logo') ?>

      <div class="cf"></div>

  </header><!-- / .site-header -->

  <section class="site-content">

            <div class="page-desc">
                 <h1><?php echo $page->title()->html() ?></h1>
                 <?php echo $page->text()->kirbytext() ?>
            </div>

            <article class="project">

                <div class="project-assets">


                    <?php foreach($page->images()->not('thumb.jpg')->sortBy('sort', 'asc') as $image): ?>

                    <div class="image">
                      <img src="<?php echo $image->url() ?>" alt="<?php echo $image->alt() ?>">
                    </div>

                    <?php endforeach ?>

                </div>
            </article>
        <!--END .site-content-->
  </section>

  <nav role="navigation">
    <ul class="cd-pagination animated-buttons custom-icons">
        <li class="button"><a href="<?php echo $page->hasPrevVisible()? $page->prevVisible()->url(): '#' ?>" class="button <?php e(!$page->hasPrevVisible(), ' disabled' ) ?>"><i><?php echo l::get('nav.prev') ?></i></a></li>
        <li class="button-main"><a href="<?php echo $page->parent()->url() ?>"><i><?php echo html($page->parent()->title()) ?></i></a></li>
        <li class="button"><a href="<?php echo $page->hasNextVisible()? $page->nextVisible()->url(): '#' ?>" class="<?php e(!$page->hasNextVisible(), ' disabled' ) ?>"><i><?php echo l::get('nav.next') ?></i></a></li>

    </ul>
  </nav> <!-- cd-pagination-wrapper -->

<!--END .site-container-->
</div>


<?php snippet('footer') ?>
