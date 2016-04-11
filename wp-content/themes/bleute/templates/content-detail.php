<?php while ( have_posts() ) : the_post();?>
<?php 
  $post_id = get_the_ID();
  $category_detail=get_the_category($post_id);
  foreach($category_detail as $cd){
    $category_name = $cd->cat_name;
  }
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
<article>
    <div class="content-blog-details container wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.5s">
      <div class="content-service">
          <div class="text-small">
            <div class="number"><?php the_time("m", get_option('date_format')); ?></div>
            <div class="title-element"><?php the_time("F", get_option('date_format')); ?></div>
          </div>
      </div>
      <?php if (has_post_thumbnail()) {?>
	      <div class="img-details-blog">
	        <?php echo the_post_thumbnail('bleute-main-thumbnail-blog'); ?>
          <?php if (is_sticky()): ?>
          <i class="sticky-note"><?php esc_html_e('Sticky','bleute')?></i>
          <?php endif ?>
	      </div>
      <?php }
      else { ?>
        <div class="img-details-blog">
         <?php if (is_sticky()): ?>
          <i class="sticky-note"><?php esc_html_e('Sticky','bleute')?></i>
          <?php endif ?>
        </div>
      <?php }?>

      <div class="content-details">
        <div class="title"><a href="<?php echo esc_url(get_permalink($post_id)); ?>"><?php the_title();?></a></div>
        <div class="comment"><span><?php the_time("H :i A", get_option('date_format')); ?></span>  / <span><?php print($category_name)?></span>  /  <span><?php printf('%s', get_post_field( 'comment_count', get_the_ID()));?> <?php esc_html_e('Comments','bleute');?></span></div>
        <div class="content">
        	<?php the_content();?>
        </div>
        <div class="author">
          <?php printf('%s',get_avatar( get_the_author_meta('ID'), '103' )); ?>
          <span><?php esc_html_e('Posted by:','bleute');?></span><span class="author-name"><?php the_author(); ?></span>
          <div class="share">
            <span class="like"><i class="fa fa-heart"></i><span></span></span>
            <span class="social"><i class="fa fa-share-alt-square"></i><span><?php esc_html_e('Share','bleute');?></span></span>
          </div>
        </div>
        <div class="blog-slide-details">
          <div class="swiper-container blog-slide">
              <div class="swiper-wrapper">
                <?php
                  $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => '2',
                    'post_status' => 'publish',
                    'post__not_in' => array($post_id),
                  );
                  $post_others = new WP_Query( $args);
                  if ($post_others->have_posts()): ;
                  while ( $post_others->have_posts() ) : $post_others->the_post();
                  $category = get_the_category( $post_others->post->ID );
                  $cat_name = $category[0]->cat_name;
                ?>
                  <div class="swiper-slide">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                      <div class="img-new">
                      	<?php if (has_post_thumbnail()) {?>
                        	<?php echo the_post_thumbnail('bleute-blog-slide-thumbnail'); ?>
                        <?php } ?>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                      <div class="content-blog-details">
                        <div class="date-time"><span class="date"><?php the_time('m', get_option('date_format')); ?></span><span class="month"><?php the_time('F', get_option('date_format')); ?></span></div>
                        <div class="title"><a href="<?php echo esc_url(get_permalink($post_others->post->ID)); ?>"><?php the_title();?></a></div>
                        <div class="comment-title"><span><?php the_author(); ?></span> / <span><?php print($cat_name);?></span> / <span><?php printf('%s', get_post_field( 'comment_count', get_the_ID()));?> <?php esc_html_e('Comments','bleute');?></span></div>
                      </div>
                    </div>
                  </div>
                  <?php
                    endwhile;
                  endif;
                  wp_reset_postdata();
                  ?>
              </div>
              <!-- Add Pagination -->
              <div class="swiper-button-next"></div>
              <div class="swiper-button-prev"></div>
              
          </div>
          <!-- Initialize Swiper -->
          <script type="text/javascript">
          (function($) {
             "use strict";
              var swiper = new Swiper('.blog-slide', {
                  pagination: '.swiper-pagination',
                  paginationClickable: true,
                  nextButton: '.swiper-button-next',
                  prevButton: '.swiper-button-prev',
                  slidesPerView: 1,
              });
          })(jQuery)
          </script>
        </div>
      </div>
      <?php comments_template();?>
    </div>
  </article>

<?php endwhile;?>