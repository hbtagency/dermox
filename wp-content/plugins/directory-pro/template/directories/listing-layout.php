<?php
get_header(); 
	$opt_style=get_option('_archive_template');
	
	if($opt_style==''){$opt_style='style-4';} 

	if($opt_style=='style-1'){
	 echo do_shortcode('[listing_layout_style_1]');
	}
	if($opt_style=='style-2'){
	 echo do_shortcode('[listing_layout_style_2]');
	}
	if($opt_style=='style-3'){
	 echo do_shortcode('[listing_layout_style_3]');
	}
	if($opt_style=='style-4'){
	 echo do_shortcode('[listing_layout_style_4]');
	}

	
get_footer();
 ?>
