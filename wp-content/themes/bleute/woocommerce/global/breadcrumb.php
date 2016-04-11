<?php
/**
 * Shop breadcrumb
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.0
 * @see         woocommerce_breadcrumb()
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! empty( $breadcrumb ) ) {
?>
<section>
    <div class="container">
      <div class="breadcrumb top">
        <ul>
		<?php
			foreach ( $breadcrumb as $key => $crumb ) {

				if ( ! empty( $crumb[1] ) && sizeof( $breadcrumb ) !== $key + 1 ) {
					echo '<li><a href="' . esc_url( $crumb[1] ) . '">' . esc_html( $crumb[0] ) . '</a></li>';
				} else {
					echo '<li class="active"><a href="' . esc_url( $crumb[0] ) . '">' .esc_html( $crumb[0] ).'</a></li>';
				}

			}
		?>
		</ul>
      </div>
    </div>
</section>
<?php
}
