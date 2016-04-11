<?php 
global $post, $product, $woocommerce;

$attachment_ids = $product->get_gallery_attachment_ids();
$image_link   = wp_get_attachment_url( get_post_thumbnail_id() );
?>
<div <?php post_class( $classes ); ?>>
  <?php do_action( 'woocommerce_before_shop_loop_item' ); ?>
  <div class="border-item border-col wow bounceInUp col-lg-6 col-md-6 col-sm-6 col-xs-12" data-wow-duration="1s" data-wow-delay="0.5s">
    <div class="item-product">
      <div class="img-product">
        <?php
            /**
             * woocommerce_before_shop_loop_item_title hook
             *
             * @hooked woocommerce_show_product_loop_sale_flash - 10
             * @hooked woocommerce_template_loop_product_thumbnail - 10
             */
            do_action( 'woocommerce_show_product_loop_sale_flash' );
          ?>
          <img src="<?php print($image_link) ?>" alt="product">
      </div>
      <div class="content wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.5s">
        <?php
            /**
             * woocommerce_shop_loop_item_title hook
             *
             * @hooked woocommerce_template_loop_product_title - 10
             */
            do_action( 'woocommerce_shop_loop_item_title' );
          ?>
        <?php
          /**
           * woocommerce_after_shop_loop_item_title hook
           *
           * @hooked woocommerce_template_loop_rating - 5
           * @hooked woocommerce_template_loop_price - 10
           */
          do_action( 'woocommerce_after_shop_loop_item_title' );
        ?>
      </div>
      <div class="icon">
        <?php

          /**
           * woocommerce_after_shop_loop_item hook
           *
           * @hooked woocommerce_template_loop_add_to_cart - 10
           */
          do_action( 'woocommerce_after_shop_loop_item' );
          //Buton wishlist
          echo do_shortcode( '[yith_wcwl_add_to_wishlist]' );
        ?>
      </div>
    </div>
    
    <?php 
      $count = count($attachment_ids);
      if ($count == 1) {
    ?>
    <div class="sub-item">
      <div class="item-left">
        <img src="<?php echo $image_link; ?>" alt="product">
      </div>
    </div>
    <?php
      }
      else if ($count > 2){
        if ( $attachment_ids ) {
      ?>
      <div class="sub-item">
      <?php
          for ($x = 0; $x <= 1; $x++) {
      ?>
              <div class="item-left">
                <img src="<?php echo $image_link; ?>" alt="product">
              </div>
            <?php
          }
        }
        ?>
      </div>
      <?php
      }
    ?>
  </div>
</div>