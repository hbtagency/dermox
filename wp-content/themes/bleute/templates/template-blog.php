<?php
/*
* Template Name: Template blogs
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
	<article>
        <div class="container blog-page">
          <?php 
	        $args = array(
	          'post_type'     => 'post',
	        );
	        $loop = new WP_Query( $args);
	        wp_reset_postdata();
	        $i = 1;
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
	          <div class="row article wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.3s">
	            <div class="images">
	            	<div class="img-blog">
		              <?php
						if (has_post_thumbnail( get_the_ID())) {
				            if ($i%2 == 0 && $i > 0) {
				            	printf('%s',get_the_post_thumbnail(get_the_ID(), 'bleute-thumbnail'));
				            }
				            else{
				            	printf('%s',get_the_post_thumbnail(get_the_ID(), 'bleute-thumbnail-height'));
				            }
						}
						else{?>
							<?php 
				                if ($i%2 == 0 && $i > 0) {
				            ?>
				            	<img src="http://placehold.it/400x500" alt="<?php esc_html_e('No image','bleute')?>">
				            <?php } 
				            else{
				            ?>
				            	<img src="http://placehold.it/600x400" alt="<?php esc_html_e('No image','bleute')?>">
				            <?php	
				            }
				            ?>
						<?php }?>
		            </div>
	            </div>
	            <div class="content-blog">
	              <div class="author"><?php the_author();?></div>
	              <div class="date-time"><span class="date"><?php echo esc_html($blog_day); ?></span><span class="month"><?php echo esc_html($blog_month); ?></span></div>
	              <div class="title"><a href="<?php echo esc_url(the_permalink());?>"><?php the_title();?></a></div>
	              <div class="comment"><span><?php echo esc_html($category_name); ?></span> / <span><?php echo get_comments_number(); ?> <?php esc_html_e(' Comments','bleute')?></span></div>
	              <a href="<?php echo esc_url(the_permalink());?>" class="readmore"><?php esc_html_e('read more...','bleute')?></a>
	            </div>
	          </div>
	        <?php 
	        	$i++;
	        	}
	        ?>
	      <?php }?>
        </div>
      </article>
<?php
get_footer();
?>