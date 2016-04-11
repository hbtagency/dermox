<?php 
$text_title_color = 'style="color:'.$title_color.'"';
$text_best_color = 'style="color:'.$best_color.'"';
$text_numberr_color = 'style="color:'.$numberr_color.'"';
$text_links_color = 'style="color:'.$links_color.'"';
$text_description_color = 'style="color:'.$description_color.'"';
?>
<section>
    <div class="service service-full">
      <div class="row">
          <?php
             $args = array(
                  'post_type' => 'service',
                  'p'=>$id_service
            );
             $loop = new WP_Query( $args );
          ?>
          <?php if ($loop->have_posts()) {?>
            <?php while ( $loop->have_posts() ) : $loop->the_post();?>
              <?php
                $service_title = get_post_meta( get_the_ID(),'_beautheme_service_title_full', TRUE);
                $service_best_seller = get_post_meta( get_the_ID(),'_beautheme_service_best', TRUE);
                $service_avatar = get_post_meta( get_the_ID(),'_beautheme_service_img_full', TRUE);
                $serviceAvatar_ID  = beau_get_attachment_id_from_url($service_avatar);
                $service_avatar    = wp_get_attachment_image( $serviceAvatar_ID,'full');
                $service_number = get_post_meta( get_the_ID(),'_beautheme_service_number', TRUE);
                $service_description = get_post_meta( get_the_ID(),'_beautheme_service_description', TRUE);
                if (!$service_avatar) {
                  $service_avatar = '<img src="http://placehold.it/370x450" alt="No service avatar">';
                }
              ?>
              <div class="wow bounceInLeft col-lg-6 col-md-6 col-sm-6 col-xs-12" data-wow-duration="1s" data-wow-delay="0.3s">
                <div class="content-service left">
                    <div class="text-top">
                        <div class="number" <?php print($text_numberr_color) ?>><?php print($service_number); ?></div>
                        <div class="title-element" <?php print($text_title_color) ?>><a href="<?php echo esc_url(get_permalink($loop->post->ID)); ?>"><?php print($service_title); ?></a></div>
                        <div class="description" <?php print($text_best_color) ?>><?php print($service_best_seller); ?></div>
                    </div>
                    <div class="text-bottom">
                      <div class="content"  <?php print($text_description_color) ?>><?php the_content(); ?></div>
                      <a href="<?php echo esc_url(get_permalink($loop->post->ID)); ?>" <?php print($text_links_color) ?>><?php esc_html_e('Read more...', 'bleute'); ?></a>
                    </div>
                </div>
              </div>
              <div class="wow bounceInRight col-lg-6 col-md-6 col-sm-6 col-xs-12" data-wow-duration="1s" data-wow-delay="0.3s">
                <a href="<?php echo esc_url(get_permalink($loop->post->ID)); ?>">
                  <div class="image-left right">
                  <?php print($service_avatar); ?>
                  </div>
                </a>
              </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
          <?php }?>
      </div>
    </div>
</section>