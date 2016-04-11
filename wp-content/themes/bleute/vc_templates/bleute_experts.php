<?php
$section_title_box = $subtile_box = $number = $button_color = $titles_color = $subtitles_color = $titles_item_color = $subtitles_item_color ='';
extract(shortcode_atts(array(
    'section_title_box' => '',
    'subtile_box' => '',
    'number' => '',
    'button_color' => '',
    'titles_color' => '',
    'subtitles_color' => '',
    'titles_item_color' => '',
    'subtitles_item_color' => '',
), $atts));
$id_ran = rand(1, 99999);

$text_title_color = 'style="color:'.$titles_color.'"';
$text_subtitles_color = 'style="color:'.$subtitles_color.'"';
$text_titles_item_color = 'style="color:'.$titles_item_color.'"';

$bg_button_color = 'style="background-color:'.$button_color.'"';
?>
<section class="wow bounceInUp" data-wow-duration="0.5s" data-wow-delay="0.3s">
  <div class="experts">
    <div class="container">
      <div class="content">
        <div class="title" <?php print($text_title_color) ?>><?php print($section_title_box); ?></div>
        <div class="description" <?php print($text_subtitles_color) ?> ><?php print($subtile_box); ?></div>
      </div>
      <div class="swiper-container experts-slider-<?php print($id_ran); ?>">
        <div class="swiper-wrapper">
          <?php
             $args = array(
                  'post_type' => 'experts',
                  'posts_per_page' => $number,
                  'order' => 'DESC' ,
            );
             $loop = new WP_Query( $args );
          ?>
          <?php if ($loop->have_posts()) {?>
            <?php while ( $loop->have_posts() ) : $loop->the_post();?>
              <?php
                $experts_avatar = get_post_meta( get_the_ID(),'_beautheme_type_image', TRUE);
                $expertsAvatar_ID  = beau_get_attachment_id_from_url($experts_avatar);
                $experts_avatar    = wp_get_attachment_image( $expertsAvatar_ID,'full');
                $experts_job = get_post_meta( get_the_ID(),'_beautheme_experts_job', TRUE);
                $experts_fb = get_post_meta( get_the_ID(),'_beautheme_experts_facebook', TRUE);
                $experts_tt = get_post_meta( get_the_ID(),'_beautheme_experts_twitter', TRUE);
                $experts_gg = get_post_meta( get_the_ID(),'_beautheme_experts_google', TRUE);
                $experts_pt = get_post_meta( get_the_ID(),'_beautheme_experts_pinterest', TRUE);
                if (!$experts_avatar) {
                  $experts_avatar = '<img src="http://placehold.it/230x270" alt="No experts avatar">';
                }
              ?>
                <div class="swiper-slide">
                <div class="avatar">
                  <div class="img-avatar">
                    <?php print($experts_avatar); ?>
                  </div>
                  <ul class="social-list">
                    <li><a href="<?php print($experts_fb); ?>"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="<?php print($experts_tt); ?>"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="<?php print($experts_gg); ?>"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="<?php print($$experts_pt); ?>"><i class="fa fa-pinterest"></i></a></li>
                  </ul>
                  <div class="title">
                    <div class="name" <?php print($text_titles_item_color) ?>><?php the_title();?><span class="job" style="color:<?php print($subtitles_item_color) ?>"><?php print($experts_job); ?></span></div>
                  </div>
                </div>
              </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
          <?php }?>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-button-next experts-next-<?php print($id_ran); ?>" <?php print($bg_button_color) ?>></div>
        <div class="swiper-button-prev experts-prev-<?php print($id_ran); ?>" <?php print($bg_button_color) ?>></div>
    </div>
    <!-- Initialize Swiper -->
    <script type="text/javascript">
      (function($) {
         "use strict";
          var experts_slider_<?php print($id_ran); ?> = new Swiper('.experts-slider-<?php print($id_ran); ?>', {
              pagination: '.swiper-pagination',
              paginationClickable: true,
              nextButton: '.experts-next-<?php print($id_ran); ?>',
              prevButton: '.experts-prev-<?php print($id_ran); ?>',
              slidesPerView: 3,
              loop: true,
              breakpoints: {
                // when window width is <= 320px
                380: {
                  slidesPerView: 1,
                  spaceBetweenSlides: 10
                },
                568: {
                  slidesPerView: 2,
                  spaceBetweenSlides: 10
                },
              }
          });
      })(jQuery)
    </script>
  </div>
  </div>
</section>