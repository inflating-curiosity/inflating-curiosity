

<a href="#cd-nav" class="cd-nav-trigger">Menu 
      <span class="cd-nav-icon"></span>
      <svg x="0px" y="0px" width="54px" height="54px" viewBox="0 0 54 54">
          <circle fill="transparent" stroke="#90D4C5" stroke-width="2" cx="27" cy="27" r="25" stroke-dasharray="157 157" stroke-dashoffset="157"></circle>
      </svg>
  </a>
      
  <div id="cd-nav" class="cd-nav">
      <div class="cd-navigation-wrapper">
          <div class="cd-half-block">

              <nav>
                  <ul class="cd-primary-nav">
                      <?php foreach($pages->visible() as $p): ?>
                        <li><a <?php e($p->isOpen(), ' class="selected"') ?> href="<?php echo $p->url() ?>"><?php echo $p->title()->html() ?></a></li>
                      <?php endforeach ?>
                  </ul>
              </nav>

              
          </div><!-- .cd-half-block -->
          
          <div class="cd-half-block">
              <address>
                  <ul class="cd-contact-info">
                      <li><a href="mailto:<?php echo $site->email()->html() ?>"><?php echo $site->email()->html() ?></a></li>
                      <li><?php echo $site->phone()->html() ?></li>
                  </ul>
                  <ul class="cd-contact-socials">
                      <?php foreach($site->socials()->yaml() as $social): ?>
                        <li><a href="<?php echo $social['link'] ?>"><?php echo $social['name'] ?></a></li> 
                      <?php endforeach ?>   
                  </ul>
                  
              </address>
          </div> <!-- .cd-half-block -->
      </div> <!-- .cd-navigation-wrapper -->
  </div> <!-- .cd-nav -->
