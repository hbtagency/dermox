<?php
/*
* Template Name: Template Membership
*/
get_header();
?>
<div class="img-header tranfarent">
<?php 
  $id = get_the_ID();
  if (get_the_post_thumbnail()) {
    echo get_the_post_thumbnail( $id, 'full' );
  }
?>
</div>
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
    <section class="wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.3s">
      <div class="container table-membership">
        <?php 
          $args = array(
            'post_type'     => 'membership',
          );
          $loop = new WP_Query( $args);
          wp_reset_postdata();
        ?>
        <?php if ($loop->have_posts()) {?>
          <?php while ($loop->have_posts()) {$loop ->the_post();?>
          <?php 
            $price = get_post_meta( get_the_ID(), '_beautheme_membership_price', TRUE ); 
            $per = get_post_meta( get_the_ID(), '_beautheme_membership_per', TRUE ); 
            $link = get_post_meta( get_the_ID(), '_beautheme_membership_link', TRUE ); 
            $popular = get_post_meta( get_the_ID(), '_beautheme_service_popular', TRUE ); 
            $currency = get_woocommerce_currency_symbol();
            $active = 'bg';
            if ($popular =="on") {
              $active = 'active';
            }
          ?>
          <div class="content-pack">
            <div class="<?php print($active); ?>">
              <ul>
                <?php if ($active =='active') {
                ?>
                  <li class="popular"><?php esc_html_e('Most popular','bleute'); ?></li>
                <?php } ?>
                <li class="title"><?php the_title(); ?></li>
                <li class="price"><span class="icon"><?php print($currency); ?></span><span class="big-price"><?php print($price); ?></span><span><?php print($per); ?></span></li>
                <?php 
                  $id_membership = get_the_ID();
                  $membershipList  = get_field('membership_page', $id_membership);
                  $count = count($membershipList);
                  for ($i=0; $i < $count; $i++) { 
                  $item = $membershipList[$i];
                  $name_field = $item['sub_field_membership'];
                  ?>
                  <li class="text"><?php print($name_field); ?></li>
                <?php } ?>
                <li><a href="<?php print($link); ?>" class="button"><?php esc_html_e('Buy now','bleute'); ?></a></li>
              </ul>
            </div>
          </div>
        <?php 
            }
          }
          wp_reset_postdata();
        ?>
        
      </div>
    </section>
    <?php 

      $page_id = get_the_ID();
      $title_contact  = get_field('title_contact',$page_id); 
      $sub_title_contact  = get_field('sub_title_contact',$page_id); 
      $content_right_contact  = get_field('content_right',$page_id); 
      $id_form_contact = get_field('id_contact_form',$page_id);
    ?>
    <section class="contact-membership container">
      <div class="membership-left wow bounceInLeft col-lg-6 col-md-6 col-sm-6 col-xs-12" data-wow-duration="1s" data-wow-delay="0.3s">
        <h4>
          <?php print($title_contact); ?>
        </h4>
        <h6><?php print($sub_title_contact); ?></h6>
        <div class="form-contact">
          <?php echo do_shortcode('[contact-form-7 id="'.$id_form_contact.'"]'); ?>
        </div>
      </div>
      <div class="membership-right wow bounceInRight col-lg-6 col-md-6 col-sm-6 col-xs-12" data-wow-duration="1s" data-wow-delay="1.5s">
        <?php 
            $contentList  = get_field('field_content_right', $page_id);
            $count = count($contentList);
            for ($i=0; $i < $count; $i++) { 
            $item = $contentList[$i];
            $title_text = $item['title-text'];
            $content_text = $item['content-text'];
            ?>
            <div class="text-member">
              <h3><?php print($title_text) ?></h3>
              <div class="content">
                <?php print($content_text) ?>
              </div>
            </div>
            <?php 
            }
          ?>
        
      </div>
    </section>
<?php
get_footer();
?>