<?php
if ( post_password_required() ) {
	return;
}
$commenter = wp_get_current_commenter();
$req = get_option( 'require_name_email' );
$aria_req = ( $req ? " aria-required='true'" : '' );

if (!class_exists('bleute_walker_comment')) {
	class bleute_walker_comment extends Walker_Comment {

		// init classwide variables
		var $tree_type = 'comment';
		var $db_fields = array( 'parent' => 'comment_parent', 'id' => 'comment_ID' );
		function __construct() { ?>

			<!-- <h3 id="comments-title">Comments</h3> -->
		<div class="comment main-comment">

		<?php }

		function start_lvl( &$output, $depth = 0, $args = array() ) {
			$GLOBALS['comment_depth'] = $depth + 1; ?>
			<div class="sub-comment">
		<?php }

		/** END_LVL
		 * Ends the children list of after the elements are added. */
		function end_lvl( &$output, $depth = 0, $args = array() ) {
			$GLOBALS['comment_depth'] = $depth + 1; ?>
			</div>
		<?php }

		/** START_EL */
		function start_el( &$output, $comment, $depth = 0, $args = array(), $id = 0) {
			$depth++;
			$add_below ="";
			$GLOBALS['comment_depth'] = $depth;
			$GLOBALS['comment'] = $comment;
			$parent_class = ( empty( $args['has_children'] ) ? 'main-comment' : '' );

			$reply_args = array(
				'add_below' => $add_below,
				'depth' => $depth,
				'max_depth' => $args['max_depth'] );
		?>
			<div class="title-comment">
				
				<span class="comment-avatar"><?php echo get_avatar( $comment, 70 ); ?></span>
				
				<div id="comment-body-<?php esc_attr(comment_ID())?>" class="comment-body">
					<span class="comment-posted-in">
						<span class="comment-name"><?php echo get_comment_author_link(); ?> / </span>
						<span class="time"><?php comment_date(); ?>, <?php comment_time(); ?>  &nbsp; <?php comment_reply_link( array_merge( $args, $reply_args ) );  ?></span>
					</span>

					<span class="comment-name"></span>
					<span class="comment-posted-in"></span>
					<span class="comment-message comment" id="comment-content-<?php esc_attr(comment_ID()); ?>">
						<?php if( !$comment->comment_approved ) : ?>
						<em class="comment-awaiting-moderation"><?php esc_html_e('Your comment is awaiting moderation.','bleute')?></em>
						<?php else: ?>
						<div class="comment-body-content content"><?php comment_text();?></div><!--End comment-body-->
						<?php endif; ?>
					</span>
					<div class="clearfix"></div>
				</div><!-- /.comment-body -->
			</div>
			
		<?php }

		function end_el(&$output, $comment, $depth = 0, $args = array() ) { ?>
		<?php }

		/** DESTRUCTOR
		 * I just using this since we needed to use the constructor to reach the top
		 * of the comments list, just seems to balance out :) */
		function __destruct() { ?>

		</div><!-- /#comment-list -->

		<?php }
	}
}
?>
<?php if ( have_comments() ) : ?>
	<div class="comment-list comments-area no-border">
		<div class="title-box title-comment-box"><span><?php echo get_comments_number(); esc_html_e(" Comment" ,'bleute'); ?></span></div>
		<?php wp_list_comments( array(
	        'walker' 		=> new bleute_walker_comment,
	        'callback' 		=> null,
	        'end-callback' 	=> null,
	        'type' 			=> 'all',
	        'page' 			=> null,
	        'avatar_size' 	=> 70
	    ) ); ?>
	</div><!--End comment-list-->
<?php endif; // have_comments() ?>

<div class="clearfix"></div>
<div class="book-comment-form content-details">
	<?php
	comment_form(
		array(
	        'label_submit'	=>esc_html__('Send message','bleute'),
	        'title_reply'	=>esc_html__('Leave a reply','bleute'),
	        'comment_notes_before' =>'<div class="form-input">',
		    'fields' => array(
	            'author' => '<label>'.esc_html__('Email *','bleute').'</label><input id="email" class="required  txt-form" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '"' . $aria_req . ' />',
	            'email' => '<label>'.esc_html__('Name *','bleute').'</label><input id="author" class="required txt-form" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '"' . $aria_req . ' />',
		    ),
		    'comment_field' => '<label>'.esc_html__('Message','bleute').'</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" class="required txt-form"></textarea>',
		    'comment_notes_after' => '</div>'
		)
	);
	paginate_comments_links();
	previous_comments_link();
	?>
	<?php if ( is_singular() ) wp_enqueue_script( "comment-reply" ); ?>
</div>