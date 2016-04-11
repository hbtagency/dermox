<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); 
$page_id = '';
if( is_shop() ) {
	$page_id = get_option( 'woocommerce_shop_page_id' );
}	    
?>
<section class="container">
	<?php
		/**
		 * woocommerce_before_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>

		<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
			<section>
		    	<?php $description_header = get_post_meta( $page_id, '_beautheme_header_description', TRUE ); ?>
		        <div class="container">
		        	<div class="content page">
		            	<div class="title"><?php woocommerce_page_title(); ?></div>
		            	<?php if (isset($description_header)) { ?>
		            		<div class="description"><?php print($description_header); ?></div>
		            	<?php } ?>
		            	
		        	</div>
		        </div>
		    </section>

		<?php endif; ?>
		<?php
	
		if (bleute_GetOption('style-shop')!= NULL) {
		    $options = bleute_GetOption('style-shop');
		}else{
		    $options = 'list-grid';
		}
		
		if($options == 'list-grid' || $options == 'list-grid-custom') {?>
			<?php
				/**
				 * woocommerce_archive_description hook
				 *
				 * @hooked woocommerce_taxonomy_archive_description - 10
				 * @hooked woocommerce_product_archive_description - 10
				 */
				do_action( 'woocommerce_archive_description' );

			?>
			<section class="container">
			<div class="side-bar-shop grid-custom col-lg-3 col-md-3 col-sm-3 col-xs-12">
	          <?php
		            if ( is_active_sidebar( 'sidebar-product' ) ){
		                if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('sidebar-product') ) ;
		            }
		        ?>
	        </div>
	        <div class="content-shop row col-lg-9 col-md-9 col-sm-9 col-xs-12">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<?php if ( have_posts() ) : ?>
							<div class="breadthums-navigation">
								<?php
									/**
									 * woocommerce_before_shop_loop hook
									 *
									 * @hooked woocommerce_result_count - 20
									 * @hooked woocommerce_catalog_ordering - 30
									 */
									do_action( 'woocommerce_before_shop_loop' );
								?>
							</div>
							<?php
								if (do_action( 'woocommerce_after_shop_loop' ) == '') {
								?>
								<div class="padding-bottom-nav"></div>
								<?php
								}
							?>
							<?php woocommerce_product_loop_start(); ?>

								<?php woocommerce_product_subcategories(); ?>

								<?php while ( have_posts() ) : the_post(); ?>
									<?php wc_get_template_part( 'content', 'product' ); ?>

								<?php endwhile; // end of the loop. ?>

							<?php woocommerce_product_loop_end(); ?>
							<!-- <div class="border-bottom"></div> -->
							<div class="bottom">
								<?php
									/**
									 * woocommerce_after_shop_loop hook
									 *
									 * @hooked woocommerce_pagination - 10
									 */
									do_action( 'woocommerce_after_shop_loop' );
								?>
							</div>

						<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

							<?php wc_get_template( 'loop/no-products-found.php' ); ?>

						<?php endif; ?>
					</div>
				</div>
			</div>
			<?php
				/**
				 * woocommerce_after_main_content hook
				 *
				 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
				 */
				do_action( 'woocommerce_after_main_content' );
			?>

			<?php
				/**
				 * woocommerce_sidebar hook
				 *
				 * @hooked woocommerce_get_sidebar - 10
				 */
				do_action( 'woocommerce_sidebar' );
			?>
		<?php } ?>

		<?php if($options == 'full') {?>
			<section class="item-product-full container">
		        <?php if ( have_posts() ) : ?>
					<div class="padding-bottom-nav"></div>
					<?php woocommerce_product_loop_start(); ?>

						<?php woocommerce_product_subcategories(); ?>

						<?php while ( have_posts() ) : the_post(); ?>
							<?php wc_get_template_part( 'content', 'product' ); ?>

						<?php endwhile; // end of the loop. ?>

					<?php woocommerce_product_loop_end(); ?>
					<!-- <div class="border-bottom"></div> -->
					<div class="bottom pagging">
						<?php
							/**
							 * woocommerce_after_shop_loop hook
							 *
							 * @hooked woocommerce_pagination - 10
							 */
							do_action( 'woocommerce_after_shop_loop' );
						?>
					</div>

				<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

					<?php wc_get_template( 'loop/no-products-found.php' ); ?>

				<?php endif; ?>
		      </section>
		<?php } ?>
</section>
<?php get_footer( 'shop' ); ?>
