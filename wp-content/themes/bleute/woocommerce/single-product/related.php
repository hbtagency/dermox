<?php
/**
 * Related Products
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $woocommerce_loop;

if ( empty( $product ) || ! $product->exists() ) {
	return;
}

$related = $product->get_related( $posts_per_page );

if ( sizeof( $related ) == 0 ) return;

$args = apply_filters( 'woocommerce_related_products_args', array(
	'post_type'            => 'product',
	'ignore_sticky_posts'  => 1,
	'no_found_rows'        => 1,
	'posts_per_page'       => $posts_per_page,
	'orderby'              => $orderby,
	'post__in'             => $related,
	'post__not_in'         => array( $product->id )
) );

$products = new WP_Query( $args );

$woocommerce_loop['columns'] = $columns;
?>
<section class="wow bounceInUp padding-bottom-slide" data-wow-duration="1s" data-wow-delay="0.3s">
    <div class="skin-care slide-product">
      <div class="container">
        <h2 class="title-element selling"><?php esc_html_e('Selling products','bleute');?></h2>
        <div class="product">
          <div class="swiper-container slide-skin">
            <div class="swiper-wrapper">
              
                <?php if ( $products->have_posts() ) : ?>

					<?php while ( $products->have_posts() ) : $products->the_post(); ?>
						<div class="swiper-slide">
							<?php wc_get_template_part( 'content', 'product-related' ); ?>
						</div>
					<?php endwhile; // end of the loop. ?>

				<?php endif;

				wp_reset_postdata();?>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
          </div>
          <script type="text/javascript">
          		(function($) {
					"use strict";
			          var swiper = new Swiper('.swiper-container.slide-skin', {
			              pagination: '.swiper-pagination',
			              paginationClickable: true,
			              nextButton: '.swiper-button-next',
			              prevButton: '.swiper-button-prev',
			              slidesPerView: 4,
			              breakpoints: {
			                // when window width is <= 320px
			                320: {
			                  slidesPerView: 1,
			                  spaceBetweenSlides: 10
			                },
			                568: {
			                  slidesPerView: 2,
			                  spaceBetweenSlides: 10
			                },
			              }
			          });
          		})(jQuery);
          </script>
        </div>
      </div>
    </div>
  </section>