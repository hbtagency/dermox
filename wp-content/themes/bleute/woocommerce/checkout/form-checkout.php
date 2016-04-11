<?php
/**
 * Checkout Form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

wc_print_notices();

do_action( 'woocommerce_before_checkout_form', $checkout );
$order_button_text = '';
// If checkout registration is disabled and not logged in, the user cannot checkout
if ( ! $checkout->enable_signup && ! $checkout->enable_guest_checkout && ! is_user_logged_in() ) {
	echo apply_filters( 'woocommerce_checkout_must_be_logged_in_message', esc_html__( 'You must be logged in to checkout.', 'bleute' ) );
	return;
}

// filter hook for include new pages inside the payment method
$get_checkout_url = apply_filters( 'woocommerce_get_checkout_url', WC()->cart->get_checkout_url() ); ?>
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
	<div class="shopping-cart">
		<div class="container">
			<div class="title-page"><?php esc_html_e('Check out', 'bleute'); ?></div><!--End title-page-->
			<div class="clearfix"></div>
			<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( $get_checkout_url ); ?>" enctype="multipart/form-data">
				<div class="box-check-out">
				<?php if ( sizeof( $checkout->checkout_fields ) > 0 ) : ?>

					<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

					<div class="col2-set" id="customer_details">
						<div class="billing-address pull-left col-lg-3 col-md-3 col-sm-3 col-xs-12">
							<?php do_action( 'woocommerce_checkout_billing' ); ?>
						</div>

						<div class="shipping-address pull-left col-lg-offset-1 col-md-offset-1 col-sd-offset-1 col-md-3 col-sm-3 col-xs-12">
							<div class="title-box-checkout shipping"><?php esc_html_e( 'Shipping Method', 'bleute' ); ?></div>
							<?php do_action( 'woocommerce_checkout_shipping' ); ?>
						</div>

						<div class="shipping-method pull-right col-md-4 col-sm-4 col-xs-12">
							<div class="title-box-checkout payment"><?php esc_html_e( 'Payment Methods', 'bleute' ); ?></div>
							<div style="clear:both;"></div>
							<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

							<div id="order_review" class="woocommerce-checkout-review-order">
								<?php if ( ! is_ajax() ) : ?>
									<?php do_action( 'woocommerce_review_order_before_payment' ); ?>
								<?php endif; ?>

								<div id="payment" class="woocommerce-checkout-payment">
									<?php if ( WC()->cart->needs_payment() ) : ?>
									<ul class="payment_methods methods">
										<?php
											if ( ! empty( $available_gateways ) ) {
												foreach ( $available_gateways as $gateway ) {
													wc_get_template( 'checkout/payment-method.php', array( 'gateway' => $gateway ) );
												}
											} else {
												if ( ! WC()->customer->get_country() ) {
													$no_gateways_message = esc_html__( 'Please fill in your details above to see available payment methods.', 'bleute' );
												} else {
													$no_gateways_message = esc_html__( 'Sorry, it seems that there are no available payment methods for your state. Please contact us if you require assistance or wish to make alternate arrangements.', 'bleute' );
												}

												echo '<li>' . apply_filters( 'woocommerce_no_available_payment_methods_message', $no_gateways_message ) . '</li>';
											}
										?>
									</ul>
									<?php endif; ?>

									<div class="form-row place-order">

										<noscript><?php esc_html_e( 'Since your browser does not support JavaScript, or it is disabled, please ensure you click the <em>Update Totals</em> button before placing your order. You may be charged more than the amount stated above if you fail to do so.', 'bleute' ); ?><br/><input type="submit" class="button alt" name="woocommerce_checkout_update_totals" value="<?php esc_attr_e( 'Update totals', 'bleute' ); ?>" /></noscript>

										<?php wp_nonce_field( 'woocommerce-process_checkout' ); ?>

										<?php do_action( 'woocommerce_review_order_before_submit' ); ?>

										<?php echo apply_filters( 'woocommerce_order_button_html', '<input type="submit" class="button alt" name="woocommerce_checkout_place_order" id="place_order" value="' . esc_attr( $order_button_text ) . '" data-value="' . esc_attr( $order_button_text ) . '" />' ); ?>

										<?php if ( wc_get_page_id( 'terms' ) > 0 && apply_filters( 'woocommerce_checkout_show_terms', true ) ) : ?>
											<p class="form-row terms">
												<label for="terms" class="checkbox"><?php printf( esc_html__( 'I&rsquo;ve read and accept the <a href="%s" target="_blank">terms &amp; conditions</a>', 'bleute' ), esc_url( wc_get_page_permalink( 'terms' ) ) ); ?></label>
												<input type="checkbox" class="input-checkbox" name="terms" <?php checked( apply_filters( 'woocommerce_terms_is_checked_default', isset( $_POST['terms'] ) ), true ); ?> id="terms" />
											</p>
										<?php endif; ?>

										<?php do_action( 'woocommerce_review_order_after_submit' ); ?>

									</div>

									<div class="clear"></div>
								</div>

								<?php if ( ! is_ajax() ) : ?>
									<?php do_action( 'woocommerce_review_order_after_payment' ); ?>
								<?php endif; ?>
							</div>

							<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
						</div>
					</div>

					<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

				<?php endif; ?>
				</div>
			</form>
		</div>
	</div>
</section>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
