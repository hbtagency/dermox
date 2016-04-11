<li <?php post_class( $classes ); ?> data-wow-duration="1s" data-wow-delay="0.3s">
	<div class="content-item-product">
	<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>
			<div class="item-product">
				<a href="<?php the_permalink(); ?>">
					<?php
						/**
						 * woocommerce_before_shop_loop_item_title hook
						 *
						 * @hooked woocommerce_show_product_loop_sale_flash - 10
						 * @hooked woocommerce_template_loop_product_thumbnail - 10
						 */
						do_action( 'woocommerce_before_shop_loop_item_title' );
					?>
				</a>
			</div>
			<div class="title">
				<a href="<?php the_permalink(); ?>">
					<?php
						/**
						 * woocommerce_shop_loop_item_title hook
						 *
						 * @hooked woocommerce_template_loop_product_title - 10
						 */
						do_action( 'woocommerce_shop_loop_item_title' );
					?>
				</a>
			</div>
			<div class="description">
				<?php 
					$id_product = get_the_ID(); 
					$content_product  = get_field('sub_content',$id_product); 
					print($content_product);
				?>
			</div>
			<?php
				/**
				 * woocommerce_after_shop_loop_item_title hook
				 *
				 * @hooked woocommerce_template_loop_rating - 5
				 * @hooked woocommerce_template_loop_price - 10
				 */
				do_action( 'woocommerce_after_shop_loop_item_title' );
			?>

		

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
</li>