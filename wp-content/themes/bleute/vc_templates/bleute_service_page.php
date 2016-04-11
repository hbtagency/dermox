<?php
$number = $number_color = $title_color = $description_color = $link_color = $orderby = '';
extract(shortcode_atts(array(
    'number' => '',
    'number_color' => '',
    'title_color' => '',
    'description_color' => '',
    'link_color' => '',
    'orderby' => ''
), $atts));
if ($orderby == '') {
  $orderby = 'DESC';
}
$text_number_color = 'style="color:'.$number_color.'"';
$text_title_color = 'style="color:'.$title_color.'"';
$text_description_color = 'style="color:'.$description_color.'"';
$text_link_color = 'style="color:'.$link_color.'"';
?>
<section>
    <div class="service-page">
      <div class="container">
        <div class="row">
        <?php
             $args = array(
                  'post_type' => 'service',
                  'posts_per_page' => $number,
                  'order' => $orderby ,
            );
             $loop = new WP_Query( $args );
          ?>
          <?php if ($loop->have_posts()) {?>
            <?php while ( $loop->have_posts() ) : $loop->the_post();?>
              <?php
                $service_avatar = get_post_meta( get_the_ID(),'_beautheme_service_img_page', TRUE);
                $serviceAvatar_ID  = beau_get_attachment_id_from_url($service_avatar);
                $service_avatar    = wp_get_attachment_image( $serviceAvatar_ID,'full');
                $service_number = get_post_meta( get_the_ID(),'_beautheme_service_number', TRUE);
                $service_description = get_post_meta( get_the_ID(),'_beautheme_service_description', TRUE);
                if (!$service_avatar) {
                  $service_avatar = '<img src="http://placehold.it/370x450" alt="No service avatar">';
                }
              ?>
                <div class="wow bounceInUp col-lg-4 col-md-4 col-sm-4 col-xs-6" data-wow-duration="1s" data-wow-delay="0.3s">
                    <div class="content-small">
                      <a href="<?php echo esc_url(get_permalink($loop->post->ID)); ?>">
                        <div class="image-small">
                          <?php print($service_avatar); ?>
                        </div>
                      </a>
                      <div class="content-service">
                          <div class="text-small">
                            <div class="number" <?php print($text_number_color) ?>><?php print($service_number); ?></div>
                            <div class="title-element"><a href="<?php echo esc_url(get_permalink($loop->post->ID)); ?>" <?php print($text_title_color) ?>><?php the_title(); ?></a></div>
                            <div class="content" <?php print($text_description_color) ?>><?php print($service_description); ?></div>
                            <a href="<?php echo esc_url(get_permalink($loop->post->ID)); ?>" <?php print($text_link_color) ?>><?php esc_html_e('Read more...', 'bleute'); ?></a>
                          </div>
                      </div>
                    </div>
                </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
          <?php }?>
        </div>
      </div>
    </div>
</section>