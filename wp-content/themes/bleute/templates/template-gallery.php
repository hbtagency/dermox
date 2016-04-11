<?php
/*
* Template Name: Template gallery
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
    <section>
        <?php $description_header = get_post_meta( get_the_ID(), '_beautheme_header_description', TRUE ); ?>
        <div class="container">
            <div class="content page">
                <div class="title"><?php the_title(); ?></div>
                <div class="description"><?php print($description_header); ?></div>
            </div>
        </div>
    </section>
    <section class="container">
        <div class="gallery-page">
          <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
            <div class="side-bar-gallery">
              <ul class="sidebar">
                <?php $categories = get_categories('taxonomy=gallery&post_type=gallery'); ?>
                    <?php foreach ($categories as $category) : ?>
                        <li><a href="<?php echo get_category_link($category->cat_ID); ?>"><?php echo $category->name; ?></a></li>
                <?php endforeach; 
                wp_reset_postdata();?>
              </ul>
              <div class="social-gallery">
                <ul class="social-list">
                  <li><i class="fa fa-facebook"></i></li>
                  <li><i class="fa fa-twitter"></i></li>
                  <li><i class="fa fa-pinterest"></i></li>
                  <li><i class="fa fa-google-plus"></i></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="gallery-content-right col-lg-9 col-md-10 col-sm-9 col-xs-12">
            <?php
                $terms = get_terms( 'gallery', array(
                    'orderby'    => 'count',
                    'hide_empty' => 0
                ) );
            ?>     
            <?php 
                // Define the query
                $args = array(
                    'post_type' => 'gallery',
                    
                );
                $query = new WP_Query( $args );
                

                // Start the Loop
                while ( $query->have_posts() ) : $query->the_post(); 
                $gallery_images = get_post_meta( get_the_ID(), '_beautheme_type_gallery', TRUE );
                $gallery_type = get_post_meta( get_the_ID(), '_beautheme_your_custom_gallery', TRUE );
                $video        = get_post_meta(get_the_ID(), '_beautheme_type_video',TRUE);
                $thumb_video  = get_post_meta(get_the_ID(), '_beautheme_thumb_video',TRUE);

                $gallery_title = get_post_meta( get_the_ID(), '_beautheme_gallery_title', TRUE );
                $gallery_description = get_post_meta( get_the_ID(), '_beautheme_gallery_description', TRUE );
                $gallery_author = get_post_meta( get_the_ID(), '_beautheme_gallery_author', TRUE );
                $thumb_video_gallery = '';
                if ($gallery_type == 'gallery_video') {
                    $thumb_video_gallery = 'gallery-video-thumb';
                }
                
                global $wp_embed;
                ?>
                <div class="gallery-content <?php print($thumb_video_gallery) ?> wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                    
                    <?php 
                        if ($gallery_type == 'gallery_image') {
                    ?>
                        <a href="#" data-toggle="modal" data-target="#gallery_<?php print(get_the_ID()) ?>">
                            <img src="<?php print ($gallery_images); ?>" alt="gallery">
                        </a>
                    <?php
                        }
                        if ($gallery_type == 'gallery_video') {
                    ?>
                        <div class="gallery-video-thumb">
                            <a href="#" data-toggle="modal" data-target="#gallery_<?php print(get_the_ID()) ?>">
                                <img src="<?php print ($thumb_video); ?>" alt="gallery">
                            </a>
                        </div>
                    <?php
                        }
                    ?>
                    <?php
                    if ($gallery_type == 'gallery_slide') {
                            $gallery_list_image  = get_field('field_gallery_slide', get_the_ID());
                            $count = count($gallery_list_image);
                            $id_ran = rand(1, 99999);
                        ?>
                        <div class="gallery-slide-farm">
                            <div class="swiper-container gallery-slider-<?php print($id_ran); ?>">
                                <div class="swiper-wrapper">
                                <?php
                                for ($i=0; $i < $count; $i++) { 
                                    $item = $gallery_list_image[$i];
                                    $image_slide = $item['images_slide']['url'];
                                    $galleryAvatar_ID  = beau_get_attachment_id_from_url($image_slide);
                                    $gallery_avatar    = wp_get_attachment_image( $galleryAvatar_ID,'bleute-main-thumbnail-blog');
                                ?>
                                    <div class="swiper-slide">
                                        <?php print($gallery_avatar); ?>
                                    </div>
                                <?php
                                    }
                                ?>
                                </div>
                                <!-- Add Pagination -->
                                <div class="swiper-button-next gallery-next-<?php print($id_ran); ?>"></div>
                                <div class="swiper-button-prev gallery-prev-<?php print($id_ran); ?>"></div>
                            </div>
                            <!-- Initialize Swiper -->
                            <script type="text/javascript">
                              (function($) {
                                 "use strict";
                                  var gallery_slider_<?php print($id_ran); ?> = new Swiper('.gallery-slider-<?php print($id_ran); ?>', {
                                      pagination: '.swiper-pagination',
                                      paginationClickable: true,
                                      nextButton: '.gallery-next-<?php print($id_ran); ?>',
                                      prevButton: '.gallery-prev-<?php print($id_ran); ?>',
                                      slidesPerView: 1,
                                  });
                              })(jQuery)
                            </script>
                        </div>
                    <?php
                        }
                    ?>
                </div>
                <div id="gallery_<?php print(get_the_ID()) ?>" class="modal fade" role="dialog">
                  <div class="modal-dialog <?php print($thumb_video_gallery) ?>">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php esc_html_e('Close','bleute')?></button>
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-body">
                        <?php 
                            if ($gallery_type == 'gallery_image') {
                        ?>
                            <img src="<?php print ($gallery_images); ?>" alt="gallery">
                            <h1><?php print($gallery_title) ?></h1>
                            <h4><?php print($gallery_description) ?></h4>
                            <h2><?php esc_html_e('by: ','bleute')?><?php print($gallery_author) ?></h2>
                        <?php
                            }
                            if ($gallery_type == 'gallery_video') {
                                $show_video = $wp_embed->run_shortcode('[embed width="780" height="450"]'.$video.'[/embed]');
                                print($show_video);
                            }
                        ?>
                        
                      </div>
                    </div>
                  </div>
                </div>
                <?php endwhile;
                 
                // use reset postdata to restore orginal query
                wp_reset_postdata();
            ?>
          </div>
        </div>
      </section>
<?php
get_footer();
?>