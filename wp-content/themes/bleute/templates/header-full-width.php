<?php
if (bleute_GetOption('megamenu-type')!= NULL) {
    $megamenu_setting = bleute_GetOption('megamenu-type');
}else{
    $megamenu_setting = 'No';
}
?>
<div class="padding-left">
  <header class="padding">
      <div class="menu-main">
        <div class="menu-top">
          <div class="row">
            <div class="spa-logo">
              <div class="img-logo">
                <?php
                  if (bleute_GetOption('bleute-logo')!= NULL) {
                      $store_logo_img = bleute_GetOption('bleute-logo');
                      $store_logo = $store_logo_img['url'];
                  }else{
                      $store_logo = get_template_directory_uri().'/asset/images/logo-blue.png';
                  }

                  if ($store_logo!='') {
                ?>
                <a href="<?php echo esc_url(home_url( '/' ));?>"><img src="<?php echo esc_url($store_logo);?>" alt="Logo"></a>
                <?php } ?>
              </div>
            </div>
            <div class="menu-login">
              <?php
                include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
                if ( is_plugin_active( 'beautheme-bleute/beautheme_init.php' ) ) {
                  wp_nav_menu(array(
                      'menu'          => 'small-menu',
                      'menu_class'    => 'small-nav hidden-xs',
                      'menu_id'       => 'small-navigation',
                      'container'     => '',
                  ));
                }
              ?>
              <form action="<?php echo esc_url(home_url( '/' ));?>" method="get" class="search-form book-search-head">
                  <input type="text" class="search-field" value="" name="s" title="search" />
                  <input type="submit" class="search-submit" value="Search" />
                  <input type="hidden" name="post_type" value="service" />
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="menu-left">
        <div id="main-nav">
          <?php
            if ($megamenu_setting == 'No') {

                wp_nav_menu(array(
                    'menu'          => 'main-menu',
                    'menu_class'    => 'padding col-md-12 col-sm-12 hidden-xs',
                    'menu_id'       => 'main-navigation',
                    'container'     => '',
                ));
            }
            if ($megamenu_setting == 'Yes') {

                if ( is_plugin_active( 'ubermenu/ubermenu.php' ) ) {
                    echo '<div id="menu-mega">';
                            ubermenu( 'mega-default' , array( 'theme_location' => 'main-menu' ) );
                    echo '</div>';
                }
            }
          ?>
          <div class="bottom-header-left">
            <?php 
              if (bleute_GetOption('title-call-us')!= NULL) {
            ?>
            <div class="contact-text"><?php print(bleute_GetOption('title-call-us')); ?></div>
            <?php
              }
            ?>
            
            <h4 class="copyright-text">Copyright © beautheme. All rights reserved.</h4>
            <ul class="social-header-left" data-wow-duration="1s" data-wow-delay="1.5s">
              <li><i class="fa fa-facebook"></i></li>
              <li><i class="fa fa-twitter"></i></li>
              <li><i class="fa fa-youtube"></i></li>
              <li><i class="fa fa-pinterest"></i></li>
              <li><i class="fa fa-google-plus"></i></li>
            </ul>
          </div>
        </div>

      </div>
      <div class="slider-header">
        <?php include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); ?>
          <?php 
            $slide_id = get_post_meta( get_the_ID(), '_beautheme_slide_custom', TRUE );
            if ($slide_id != '-1' || $slide_id !='') {
              if ( is_plugin_active( 'masterslider/masterslider.php' ) ) {
                echo do_shortcode( '[masterslider id="'.$slide_id.'"]' ); 

              }
            }
          ?>
      </div>
      <section>
        <div class="blog-header">
          <div class="swiper-container new-header">
              <div class="swiper-wrapper">
                  <?php 
                    $args = array(
                      'post_type'     => 'post',
                      'orderby'  => 'date',
                      'order'      => 'DESC',
                    );
                    $loop = new WP_Query( $args);
                    wp_reset_postdata();
                  ?>
                  <?php if ($loop->have_posts()) {?>
                    <?php while ($loop->have_posts()) {$loop ->the_post();?>
                    <?php 
                      $blog_month = get_the_time('M'); 
                      $blog_day   = get_the_time('d'); 
                      $category =  get_the_category();
                      $category_name = $category[0]->cat_name;
                      $content_blog = strip_tags(get_the_content());
                  ?>
                  <div class="swiper-slide">
                    <div class="date"><?php print($blog_day) ?></div>
                    <a href="<?php echo esc_url(the_permalink());?>">
                      <div class="img-new">
                        <div class="img">
                            <?php
                              if (has_post_thumbnail( get_the_ID())) {
                                 printf('%s',get_the_post_thumbnail(get_the_ID(), 'bleute-thumbnail-blog'));
                              }
                            ?>
                        </div>
                        <div class="content">
                          <p><?php $content_blog = strip_tags(get_the_content()); print($content_blog); ?></p>
                        </div>
                      </div>
                    </a>
                  </div>
                  <?php 
                    }
                  } 
                  ?>
              </div>
          </div>
          <!-- Add Pagination -->
          <div class="swiper-button-next"></div>
          <div class="swiper-button-prev"></div>
          <!-- Initialize Swiper -->
          <script type="text/javascript">
          (function($) {
              var swiper = new Swiper('.new-header', {
                  pagination: '.swiper-pagination',
                  paginationClickable: true,
                  nextButton: '.swiper-button-next',
                  prevButton: '.swiper-button-prev',
                  slidesPerView: 1,
              });
          })(jQuery)
          </script>
        </div>
      </section>
  </header> 
  
</div>