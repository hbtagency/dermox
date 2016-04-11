<?php
$section_title_box = $subtile_box = $perpage = $title_color = $subtitle_color = $title_blog_color = $details_blog_color = $content_blog_color = $month_blog_color = $day_blog_color ='';
extract(shortcode_atts(array(
    'section_title_box' => '',
    'subtile_box' => '',
    'perpage' => '',
    'title_color' => '',
    'subtitle_color' => '',
    'title_blog_color' => '',
    'content_blog_color' => '',
    'details_blog_color' => '',
    'month_blog_color' => '',
    'day_blog_color' => ''
), $atts));
$text_title_color = 'style="color:'.$title_color.'"';
$text_subtile_color = 'style="color:'.$subtitle_color.'"';
?>
<section>
  <div class="blog-element">
    <div class="container">
      <div class="content">
        <div class="title" <?php print($text_title_color) ?>><?php echo esc_html($section_title_box); ?></div>
        <div class="description" <?php print($text_subtile_color) ?>><?php echo esc_html($subtile_box); ?></div>
      </div>
      <?php 
        $args = array(
          'post_type'     => 'post',
          'posts_per_page'  => $perpage,
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

          $text_day_color = 'style="color:'.$day_blog_color.'"';
          $text_month_color = 'style="color:'.$month_blog_color.'"';
          $text_title_color = 'style="color:'.$title_blog_color.'"';
          $text_details_color = 'style="color:'.$details_blog_color.'"';
          $text_content_color = 'style="color:'.$content_blog_color.'"';
        ?>
          <div class="section-blog wow bounceInLeft col-lg-6 col-md-6 col-sm-6 col-xs-12" data-wow-duration="1s" data-wow-delay="0.3s">
            <div class="row blog-width">
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <div class="date">
                  <div class="day" <?php print($text_day_color) ?> ><?php echo esc_html($blog_day); ?></div>
                  <div class="month" <?php print($text_month_color) ?> ><?php echo esc_html($blog_month); ?></div>
                </div>
              </div>
              <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                <div class="content-blog">
                  <div class="title"><a href="<?php echo esc_url(the_permalink());?>" <?php print($text_title_color) ?>><?php the_title();?></a></div>
                  <div class="details-blog" <?php print($text_details_color) ?> ><span class="author home"><?php esc_html_e('Posted by ','bleute')?><?php the_author();?> / <span class="category"><?php echo esc_html($category_name); ?></span> / <?php echo get_comments_number(); ?> <?php esc_html_e(' Comments','bleute')?></span></div>
                  <div class="content" <?php print($text_content_color) ?> >
                    <?php echo esc_html($content_blog); ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php }?>
      <?php }?>
    </div>
  </div>
</section>