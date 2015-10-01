

<section class="site-content">

  <div class="projects-feed cf">
  <?php foreach(page('projects')->children()->visible() as $project): ?>
      <article class="project cf">
        <a href="<?php echo $project->url() ?>" title="<?php echo html($project->title()) ?>">

          <?php if($thumb = $project->images()->sortBy('sort', 'asc')->find((string)$project->thumbimage())): ?>
            <div class="thumb">
              <img src="<?php echo thumb($thumb, array('width' => 800, 'height' => 800, 'crop' => true))->url() ?>"  alt="<?php echo $thumb->alt() ?>">
            </div>
          <?php endif ?>

          <div class="project-content-container">
            <div class="project-content">
              <div class="table">
                <div class="table-cell">
                  <h2 class="thumbnail-title"><?php echo html($project->title()) ?></h2>
                  <p class="thumbnail-description"><?php echo str_replace(',', ', ', $project->tags()) ?></p>
                </div>
              </div>
            </div>
          </div>

          <div class="overlay"></div>
        </a>
      </article>
    <?php endforeach ?>
    <!--END .projects-feed-->
  </div>

  <!--END .site-content-->
</section>
