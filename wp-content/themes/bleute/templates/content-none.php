<section class="no-results not-found">
		<div class="">
			<div class="container">
				<div class="title-box book-center"><span><?php esc_html_e( 'Nothing Found', 'bleute' ); ?></span></div>
			</div>
		</div>
		<div class="page-content">
			<div class="container">
				<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
					<p><?php printf( esc_html__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'bleute' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>
				<?php elseif ( is_search() ) : ?>
					<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'bleute' ); ?></p>
					<?php get_search_form(); ?>
				<?php else : ?>
					<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'bleute' ); ?></p>
					<?php get_search_form(); ?>
				<?php endif; ?>
			</div>
		</div><!-- .page-content -->
</section><!-- .no-results -->