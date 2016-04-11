<?php
/*
* Template Name: Template About
*/
get_header();
?>
	<section class="menu-breadcrumb">
        <div class="container">
          <div class="breadcrumb">
            <ul>
            	<?php if (function_exists('beau_the_breadcrumb')) beau_the_breadcrumb(); ?>
            </ul>
          </div>
        </div>
    </section>
    <section class="about padding-left">
        <div class="container header-about">
          <div class="wow bounceInLeft col-lg-6 col-md-6 col-sm-6 col-xs-6" data-wow-duration="1s" data-wow-delay="0.3s">
            <div class="img-author-shop">
              <?php 
              $id = get_the_ID();
              if (get_the_post_thumbnail()) {
                echo get_the_post_thumbnail( $id, 'full' );
              }
              ?>
            </div>
          </div>
          <?php 
                $page_id = get_the_ID();
                $title_about  = get_field('field_title_about',$page_id); 
                $subtitle_about  = get_field('field_subtitle_about',$page_id); 
                $description_about  = get_field('field_description_about',$page_id); 
                $reward_about  = get_field('field_reward',$page_id); 
                $title_introduce  = get_field('field_title_introduce',$page_id); 
                $description_introduce  = get_field('field_description_of_introduce',$page_id); 
                $content_left_introduce  = get_field('description_left_of_introduce',$page_id); 
                $content_right_introduce  = get_field('description_right_of_introduce',$page_id); 
                $image_description_left  = get_field('image_description_left_of_introduce',$page_id); 
                $image_description_right  = get_field('image_description_right_of_introduce',$page_id); 
                $title_content_bottom  = get_field('title_content_bottom',$page_id); 
                $content_bottom  = get_field('content_bottom',$page_id); 
                $images_bottom  = get_field('field_thanks',$page_id); 
                $title_email  = get_field('title_email',$page_id); 
                $description_email  = get_field('description_email',$page_id); 
                $title_social  = get_field('title_social',$page_id); 
                $description_social  = get_field('description_social',$page_id); 
                $title_address  = get_field('title_address',$page_id); 
                $description_address  = get_field('description_address',$page_id); 
          ?>
          <div class="wow bounceInLeft col-lg-6 col-md-6 col-sm-6 col-xs-6" data-wow-duration="1s" data-wow-delay="0.3s">
            <div class="history">
              <div class="history-title">
                <div class="title-element"><?php print($title_about); ?></div>
                <div class="shop-name"><?php print($subtitle_about); ?></div>
                <div class="description"><?php print($description_about); ?></div>
              </div>
              <div class="reward-img">
                <div class="img">
                  <img src="<?php print($reward_about); ?>" alt="author-shop">
                </div>
              </div>
            </div>
          </div>
          <div class="wow bounceInRight introduce" data-wow-duration="1s" data-wow-delay="0.3s">
            <div class="container">
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="introduce-left">
                  <div class="title"><?php print($title_introduce); ?></div>
                  <div class="description"><?php print($description_introduce); ?></div>
                </div>
              </div>
              <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                <div class="row">
                  <div class="introduce-image left">
                    <div class="images-intro">
                      <img src="<?php print($image_description_left); ?>" alt="author-shop">
                    </div>
                    <div class="content">
                      <?php print($content_left_introduce); ?>
                    </div>
                  </div>
                  <div class="introduce-image">
                    <div class="images-intro">
                      <img src="<?php print($image_description_right); ?>" alt="author-shop">
                    </div>
                    <div class="content">
                      <?php print($content_right_introduce); ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="bottom-about">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-4">
              <div class="bottom-left">
                <div class="details wow bounceInRight" data-wow-duration="1s" data-wow-delay="0.3s">
                  <div class="text"><?php print($title_email); ?></div>
                  <div class="text-info"><?php print($description_email); ?></div>
                </div>
                <div class="details wow bounceInRight" data-wow-duration="1s" data-wow-delay="0.8s">
                  <div class="text"><?php print($title_social); ?></div>
                  <div class="text-info"><?php print($description_social); ?></div>
                </div>
                <div class="details wow bounceInRight" data-wow-duration="1s" data-wow-delay="1.2s">
                  <div class="text"><?php print($title_address); ?></div>
                  <div class="text-info small"><?php print($description_address); ?></div>
                </div>
                <ul class="social-list wow bounceInRight" data-wow-duration="1s" data-wow-delay="1.5s">
                  <li><i class="fa fa-facebook"></i></li>
                  <li><i class="fa fa-twitter"></i></li>
                  <li><i class="fa fa-pinterest"></i></li>
                  <li><i class="fa fa-google-plus"></i></li>
                </ul>
              </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-8">
              <div class="title wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                <?php print($title_content_bottom); ?>
              </div>
              <div class="content wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                <?php print($content_bottom); ?>
                <img src="<?php print($images_bottom); ?>" alt="thank-you">
              </div>
            </div>
          </div>
        </div>
      </section>
<?php
get_footer();
?>