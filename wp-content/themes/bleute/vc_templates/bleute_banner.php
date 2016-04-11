<?php
$option = $banner_title = $banner_smalltitle = $banner_subtitle = $banner_image = '';
extract(shortcode_atts(array(
    'option' => '',
    'banner_title' => '',
    'banner_smalltitle' => '',
    'banner_subtitle' => '',
    'banner_image' => ''
), $atts));
$img = shortcode_atts(array(
    'banner_image' => 'banner_image',
), $atts);
$img1 = wp_get_attachment_image_src($img["banner_image"], "full");
$bg_img = $img1[0];
if ($option == 'Style left' || $option == '') {
	$style_setting = 'left';
}
if ($option == 'Style right') {
	$style_setting = 'right';
}
if ($option == 'Style small left') {
    $style_setting = 'small-left';
}
if ($option == 'Style small right') {
    $style_setting = 'small-right';
}
include(get_template_directory().'/vc_templates/banner/'.$style_setting.'.php');

?>