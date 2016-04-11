<?php
//Create Button
function beau_hugoButton($atts, $content=''){
	$defaults =  array(
		'class' 			=> '',
		'id' 				=> '',
		'background_color'	=>'',
		'background_image' 	=>'',
		'button_type' 		=>'',
		'link_to'			=>'',
		'button_text'		=>__('Button Text','beautheme'),
		"is_container" 		=> true,
	);
	$atts = shortcode_atts( $defaults, $atts );
	$html = '<a id="'.$atts['id'].'" class="b-button '.$atts['class'].'" href="'.$atts['link_to'].'">'.$atts['button_text'].'</a>';
	return $html;
}
add_shortcode('hugo_button','beau_hugoButton');


?>