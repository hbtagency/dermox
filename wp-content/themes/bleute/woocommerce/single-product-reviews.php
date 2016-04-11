<?php
/**
 * Display single product reviews (comments)
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.2
 */
global $product;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! comments_open() ) {
	return;
}
$rating = $product->get_average_rating();
$get_id = get_the_ID();
?>
<div id="reviews">

	<?php if ( get_option( 'woocommerce_review_rating_verification_required' ) === 'no' || wc_customer_bought_product( '', get_current_user_id(), $product->id ) ) : ?>

		<div id="review_form_wrapper">
			<div id="review_form">
				<h4 class="title-post">
					(<?php echo get_comments_number( $get_id ); ?>) 
					<?php 
						esc_html_e( 'REVIEW FOR ', 'bleute' );
						echo get_the_title($get_id); 
					?>
				</h4>
				<div id="comments">

					<?php if ( have_comments() ) : ?>

						<ol class="commentlist">
							<?php wp_list_comments( apply_filters( 'woocommerce_product_review_list_args', array( 'callback' => 'woocommerce_comments' ) ) ); ?>
						</ol>

						<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
							echo '<nav class="woocommerce-pagination">';
							paginate_comments_links( apply_filters( 'woocommerce_comment_pagination_args', array(
								'prev_text' => '&larr;',
								'next_text' => '&rarr;',
								'type'      => 'list',
							) ) );
							echo '</nav>';
						endif; ?>

					<?php else : ?>

						<p class="woocommerce-noreviews"><?php esc_html_e( 'There are no reviews yet.', 'bleute' ); ?></p>

					<?php endif; ?>
				</div>
				<?php
					$commenter = wp_get_current_commenter();

					$comment_form = array(
						'title_reply'          => have_comments() ? '' : '' . ' &ldquo;' . get_the_title() . '&rdquo;',
						'title_reply_to'       => esc_html__( 'Leave a Reply to %s', 'bleute' ),
						'comment_notes_before' => '',
						'comment_notes_after'  => '',
						'fields'               => array(
							'author' => '<p class="comment-form-author">' . '<label for="author"></label> ' .
							            '<input id="author" name="author" placeholder="' . esc_html__( 'Name', 'bleute' ) . '" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" aria-required="true" /></p>',
							'email'  => '<p class="comment-form-email"> ' .
							            '<input id="email" name="email" placeholder="' . esc_html__( 'Email', 'bleute' ) . '" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" aria-required="true" /></p>',
						),
						'label_submit'  => esc_html__( 'Submit', 'bleute' ),
						'logged_in_as'  => '',
						'comment_field' => ''
					);

					if ( $account_page_url = wc_get_page_permalink( 'myaccount' ) ) {
						$comment_form['must_log_in'] = '<p class="must-log-in">' .  sprintf( esc_html__( 'You must be <a href="%s">logged in</a> to post a review.', 'bleute' ), esc_url( $account_page_url ) ) . '</p>';
					}
					?>
					<h4>ADD A REVIEW</h4>
					<?php
					if ( get_option( 'woocommerce_enable_review_rating' ) === 'yes' ) {
						$comment_form['comment_field'] = '<p class="comment-form-rating"><label for="rating">' . esc_html__( 'Your Rating', 'bleute' ) .'</label><select name="rating" id="rating">
							<option value="">' . esc_html__( 'Rate&hellip;', 'bleute' ) . '</option>
							<option value="5">' . esc_html__( 'Perfect', 'bleute' ) . '</option>
							<option value="4">' . esc_html__( 'Good', 'bleute' ) . '</option>
							<option value="3">' . esc_html__( 'Average', 'bleute' ) . '</option>
							<option value="2">' . esc_html__( 'Not that bad', 'bleute' ) . '</option>
							<option value="1">' . esc_html__( 'Very Poor', 'bleute' ) . '</option>
						</select></p>';
					}

					$comment_form['comment_field'] .= '<p class="comment-form-comment"><textarea id="comment" placeholder="' . esc_html__( 'Tell the world what you think of this product.', 'bleute' ) . '" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>';

					comment_form( apply_filters( 'woocommerce_product_review_comment_form_args', $comment_form ) );
				?>
			</div>
		</div>

	<?php else : ?>

		<p class="woocommerce-verification-required"><?php esc_html_e( 'Only logged in customers who have purchased this product may leave a review.', 'bleute' ); ?></p>

	<?php endif; ?>
	
	<div class="clear"></div>
</div>
