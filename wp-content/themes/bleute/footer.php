	<?php
		wp_reset_postdata();
		if (!is_404()) {
			$footer_page 	= get_post_meta(get_the_ID(), '_beautheme_footer_custom', TRUE );

            if (bleute_GetOption('footer-type')!= NULL) {
                $footer_setting = bleute_GetOption('footer-type');
            }else{
                $footer_setting = "default";
            }
			if ($footer_page) {
				$footer_setting = $footer_page;
			}
			if ($footer_setting == '') {
				$footer_setting = "default";
			}
			get_template_part('templates/footer', $footer_setting );
		}
	?>
	<div class="footer-widget-content">
		<div class="container">
			<?php
		        if ( is_active_sidebar( 'sidebar-widget' ) ){
		            if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('sidebar-widget') ) ;
		        }
		    ?>
		</div>
    </div>
<?php wp_footer();?>
</body>
</html>