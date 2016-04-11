<?php 
$lengthExc = 15;
?>
<div id="post-<?php the_ID();?>" <?php post_class("blog-items"); ?> >
  
    <div class="row article wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.3s">
    <?php 
      $postype = get_post_type( get_the_ID() ); 
      if ($postype == 'product') {
      ?>
        <div class="img-product">
          <?php 
          if ($postype == 'product') {
            printf('%s',get_the_post_thumbnail(get_the_ID(), 'shop_single'));
          }
          ?>
        </div>
      <?php
      }
      else{
      ?>
        <div class="img-blog">
          <?php
            if (has_post_thumbnail( get_the_ID())) {
                printf('%s',get_the_post_thumbnail(get_the_ID(), 'bleute-thumbnail'));
            }
            ?>
            <?php if (is_sticky()): ?>
              <i class="sticky-note"><?php _e('Sticky','bleute')?></i>
            <?php endif ?>
        </div>
      <?php
      }
    ?>
      <?php 
        $product_content = '';
        if ($postype == 'product') {
          $product_content = 'product';
        }
        $blog_month = get_the_time('M'); 
        $blog_day   = get_the_time('d');
        $category =  get_the_category();
        if ($category!=null) {
          $category_name = $category[0]->cat_name;
        }
        else{
          $category_name = '';
        }
        
        $content_blog = strip_tags(get_the_content()); 
      ?>
      <div class="content-blog <?php print($product_content) ?>">
        <div class="author"><?php the_author();?></div>
        <div class="date-time"><span class="date"><?php echo esc_html($blog_day); ?></span><span class="month"><?php echo esc_html($blog_month); ?></span></div>
        <div class="title"><a href="<?php echo esc_url(the_permalink());?>"><?php the_title();?></a></div>
        <div class="comment"><span><a href="<?php echo esc_url(the_permalink());?>"><?php echo esc_html($category_name); ?></a></span> <a href="<?php echo esc_url(the_permalink());?>">/</a> <span><a href="<?php echo esc_url(the_permalink());?>"><?php echo get_comments_number(); ?> <?php esc_html_e(' Comments','bleute')?></a></span></div>
        <?php
          if ($lengthExc) {
          ?>
            <div class="short-desc">
              <?php echo the_excerpt();?>
            </div>
          <?php }?>
        <a href="<?php echo esc_url(the_permalink());?>" class="readmore"><?php esc_html_e('read more...','bleute')?></a>
        <?php the_tags();?>
      </div>
    </div>
</div>
