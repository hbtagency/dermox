<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

?>

<?php
    /**
     * woocommerce_before_single_product hook
     *
     * @hooked wc_print_notices - 10
     */
     do_action( 'woocommerce_before_single_product' );

     if ( post_password_required() ) {
        echo get_the_password_form();
        return;
     }
?>
<section class="container-fluid details-product-page padding-left">
    <div class="container">
        <div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="wow bounceInLeft col-lg-7 col-md-7 col-sm-7 col-xs-12 animated" data-wow-duration="1s" data-wow-delay="0.3s">
                <div class="details-right">
                    <div class="img-big">
                        <?php
                            /**
                             * woocommerce_before_single_product_summary hook
                             *
                             * @hooked woocommerce_show_product_sale_flash - 10
                             * @hooked woocommerce_show_product_images - 20
                             */
                            do_action( 'woocommerce_before_single_product_summary' );
                        ?>
                    </div>
                </div>
            </div>
            <div class="wow bounceInRight col-lg-5 col-md-5 col-sm-5 col-xs-12 animated" data-wow-duration="1s" data-wow-delay="0.3s">
                <div class="details-content">
                    <div class="summary entry-summary">

                        <?php
                            /**
                             * woocommerce_single_product_summary hook
                             *
                             * @hooked woocommerce_template_single_title - 5
                             * @hooked woocommerce_template_single_rating - 10
                             * @hooked woocommerce_template_single_price - 10
                             * @hooked woocommerce_template_single_excerpt - 20
                             * @hooked woocommerce_template_single_add_to_cart - 30
                             * @hooked woocommerce_template_single_meta - 40
                             * @hooked woocommerce_template_single_sharing - 50
                             */
                            do_action( 'woocommerce_single_product_summary' );
                        ?>

                    </div><!-- .summary -->
                </div>
            </div>
        </div><!-- #product-<?php the_ID(); ?> -->
    </div>
</section>
<div class="container">
<?php
    /**
     * woocommerce_after_single_product_summary hook
     *
     * @hooked woocommerce_output_product_data_tabs - 10
     * @hooked woocommerce_upsell_display - 15
     * @hooked woocommerce_output_related_products - 20
     */
    do_action( 'woocommerce_after_single_product_summary' );
?>
</div>
<meta itemprop="url" content="<?php the_permalink(); ?>" />
<?php do_action( 'woocommerce_after_single_product' ); ?>
