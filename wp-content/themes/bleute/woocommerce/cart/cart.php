<?php
/**
 * Cart Page
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.3.8
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

wc_print_notices();
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
<section class="shopping-cart">
<?php
do_action( 'woocommerce_before_cart' ); ?>
<div class="title-page-light"><?php esc_html_e('Shopping cart', 'bleute'); ?></div><!--End title-page-->
<form action="<?php echo esc_url( WC()->cart->get_cart_url() ); ?>" method="post">

<?php do_action( 'woocommerce_before_cart_table' ); ?>
<div class="main-cart col-md-12 col-sm-12 col-xs-12">
	<table class="shop_table cart" cellspacing="0">
		<thead>
			<tr>
				<th class="product-name col-sm-5 col-md-5 col-xs-3"><?php esc_html_e('Product name', 'bleute'); ?></th>
                <th class="product-price col-md-2 col-sm-2 col-xs-2"><?php esc_html_e('Price', 'bleute'); ?></th>
                <th class="product-quantity col-md-2 col-sm-2 col-xs-2"><?php esc_html_e('Qty', 'bleute'); ?></th>
                <th class="product-subtotal col-md-2 col-sm-2 col-xs-2"><?php esc_html_e('Total', 'bleute'); ?></th>
                <th class="remove-subtotal col-md-1 col-sm-1 col-xs-1"><?php esc_html_e('Remove', 'bleute'); ?></th>
			</tr>
		</thead>
		<tbody>
			<?php do_action( 'woocommerce_before_cart_contents' ); ?>

			<?php
			foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
				$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
				$product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
				$product_content = get_field('sub_content',$product_id); 

				if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
					?>
					<tr class="<?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">
						<td class="product-thumbnail col-sm-5 col-md-5 col-xs-3">
							<div class="product-item">
	                            <div class="product-image">
	                                <?php
										$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

										if ( ! $_product->is_visible() ) {
											print($thumbnail);
										} else {
											printf( '<a href="%s">%s</a>', esc_url( $_product->get_permalink( $cart_item ) ), $thumbnail );
										}
									?>
	                            </div>
	                          </div>

	                        <span class="product-info-name name-full">
	                          <?php
									if ( ! $_product->is_visible() ) {
										echo apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key ) . '&nbsp;';
									} else {
										echo apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s </a>', esc_url( $_product->get_permalink( $cart_item ) ), $_product->get_title() ), $cart_item, $cart_item_key );
									}

									// Meta data
									echo WC()->cart->get_item_data( $cart_item );

									// Backorder notification
									if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
										echo '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'bleute' ) . '</p>';
									}
								?>
	                          <span class="product-desc"><?php print($product_content) ?></span>
	                        </span>
							
						</td>

						<td class="product-price col-md-2 col-sm-2 col-xs-2">
							<?php
								echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
							?>
						</td>

						<td class="product-quantity col-md-2 col-sm-2 col-xs-2">
							<div class="quantity">
								<?php
									if ( $_product->is_sold_individually() ) {
										$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
									} else {
										$product_quantity = woocommerce_quantity_input( array(
											'input_name'  => "cart[{$cart_item_key}][qty]",
											'input_value' => $cart_item['quantity'],
											'max_value'   => $_product->backorders_allowed() ? '' : $_product->get_stock_quantity(),
											'min_value'   => '0'
										), $_product, false );
									}

									echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item );
								?>
							</div>
						</td>

						<td class="product-subtotal col-md-2 col-sm-2 col-xs-2">
							<?php
								echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );
							?>
						</td>

						<td class="remove-subtotal col-md-1 col-sm-1 col-xs-1">
							<?php
								echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
									'<a href="%s" class="remove" title="%s" data-product_id="%s" data-product_sku="%s">&times;</a>',
									esc_url( WC()->cart->get_remove_url( $cart_item_key ) ),
									esc_html__( 'Remove this item', 'bleute' ),
									esc_attr( $product_id ),
									esc_attr( $_product->get_sku() )
								), $cart_item_key );
							?>
						</td>
					</tr>
					<?php
				}
			}
			global $woocommerce;
			do_action( 'woocommerce_cart_contents' );
			$shop_page_url = get_permalink( woocommerce_get_page_id( 'shop' ) );
			?>
		</tbody>
		<tfoot>
            <tr>
              <td class="col-lg-7 col-sm-7 col-md-7 col-xs-12">
              <a href="<?php print($shop_page_url); ?>"><?php esc_attr_e( 'Continue shopping', 'bleute' ); ?></a>
              </td>
              <td class="center shopping col-lg-2 col-sm-2 col-md-2 col-xs-12">
              	<input type="submit" class="button" name="update_cart" value="<?php esc_attr_e( 'Update shopping cart', 'bleute' ); ?>" />
              </td>
              <td class="right col-lg-3 col-sm-3 col-md-3 col-xs-12">
              	<a class="button" href="<?php print($woocommerce->cart->get_cart_url()); ?>?empty-cart"><?php esc_html_e( 'Clear shopping cart', 'bleute' ); ?></a>
              </td>
            </tr>
        </tfoot>

	</table>
</div>
<?php do_action( 'woocommerce_after_cart_table' ); ?>

</form>
</section>
<?php if ( WC()->cart->coupons_enabled() ) { ?>
	<div class="clearfix"></div>
   	<div class="info-cart col-md-12 col-sm-12 col-xs-12">
        <div class="box-info-cart cart-type-2">
	        <div class="coupon">
	            <div class="footer-box-cart pull-left">
	              <div class="coupon-cart"><?php esc_html_e( 'DISCOUNT CODES', 'bleute' ); ?></div>
	              <span><?php esc_html_e( 'Enter your coupon code if you have one.', 'bleute' ); ?></span>
	              <div class="input-coup-on">
	                <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'Coupon code', 'bleute' ); ?>" /> 
	                <input type="submit" class="button" name="apply_coupon" value="<?php esc_attr_e( 'Apply Coupon', 'bleute' ); ?>" />
	              </div>
	            </div>
	        </div>
	        <div class="pull-right">
	            <div class="cart_totals total-cart-type2">
	              <?php wp_nonce_field( 'woocommerce-cart' ); ?>
					<?php do_action( 'woocommerce_after_cart_contents' ); ?>
					<div class="cart-collaterals">

						<?php do_action( 'woocommerce_cart_collaterals' ); ?>

					</div>
	            </div>
	        </div>
    	</div>
    </div>
<?php } ?>



<?php do_action( 'woocommerce_cart_actions' ); ?>

<?php do_action( 'woocommerce_after_cart' ); ?>
