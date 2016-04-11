<?php 
$text_title_color = 'style="color:'.$title_color.'"';
$text_links_color = 'style="color:'.$links_color.'"';
$text_description_color = 'style="color:'.$description_color.'"';
?>
<section class="wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.3s">
    <div class="service service-icon">
      <div class="container">
        <div class="content">
          <div class="title" <?php print($text_title_color) ?>><?php print($section_title_box); ?></div>
          <div class="description" <?php print($text_description_color) ?>><?php print($subtile_box); ?></div>
        </div>
        <?php
            if ($id_service =='') {
              $args = array(
                  'post_type' => 'service',
                  'order' => 'ASC',
                  'posts_per_page' => $number
              );
            }
            else{
              $id_service = explode(',' , $id_service);
              $args = array(
                  'post_type' => 'service',
                  'post__in' => $id_service,
                  'order' => 'ASC',
                  
              );
            }
             $loop = new WP_Query( $args );
          ?>
          <?php if ($loop->have_posts()) {?>
            <?php while ( $loop->have_posts() ) : $loop->the_post();?>
              <?php
                $service_avatar = get_post_meta( get_the_ID(),'_beautheme_service_img_icon', TRUE);
                $serviceAvatar_ID  = beau_get_attachment_id_from_url($service_avatar);
                $service_avatar    = wp_get_attachment_image( $serviceAvatar_ID,'full');
                if (!$service_avatar) {
                  $service_avatar = '<img src="http://placehold.it/170x170" alt="No service avatar">';
                }
              ?>
              <div class="item-service col-lg-4 col-md-4 col-sm-4 col-xs-6">
                <div class="image-service">
                  <a href="<?php echo esc_url(get_permalink($loop->post->ID)); ?>"><?php print($service_avatar); ?></a>
                </div>
                <div class="title"><a href="<?php echo esc_url(get_permalink($loop->post->ID)); ?>" <?php print($text_links_color) ?>><?php the_title(); ?></a></div>
                <div class="content" <?php print($text_description_color) ?>><?php the_content(); ?></div>
              </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
          <?php }?>
      </div>
    </div>
  </section>