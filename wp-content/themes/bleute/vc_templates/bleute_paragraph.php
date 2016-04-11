<?php
$option = $paragraph_content = $paragraph_author = $paragraph_sub = $paragraph_left_top = $paragraph_sale = $paragraph_left_bottom = $paragraph_left_textlink = $paragraph_left_href = '';
extract(shortcode_atts(array(
    'option' => '',
    'paragraph_content' => '',
    'paragraph_author' => '',
    'paragraph_sub' => '',
    'paragraph_left_top' => '',
    'paragraph_sale' => '',
    'paragraph_left_bottom' => '',
    'paragraph_left_textlink' => '',
    'paragraph_left_href' => '',
), $atts));
if ($option == 'Style center' || $option == '') {
	$style_setting = 'center';
}
if ($option == 'Style left') {
	$style_setting = 'left';
}
include(get_template_directory().'/vc_templates/paragraph/'.$style_setting.'.php');

?>