<div class="site-title">

	<a href="<?php echo $site->language()->url() ?>">
          <?php if(!$site->brandlogo()->empty()): ?>
            <!--FIXME: panel logo selector buggy-->
          <img src="<?php echo $site->brandlogo() ?>" alt="<?php echo $site->title()->html() ?>"/>
          <?php endif ?>
          <?php echo $site->brandname() ?>
      </a>

</div>