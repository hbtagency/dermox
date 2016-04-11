<?php
$option = $category = $section_title_box = $subtile_box = $text_link = $url = $number = $background_color = $title_color = $links_color = $description_color = $background_linkvs_color = $price_color = $button_buy_background = $sticke_background = $name_product_color = '';
extract(shortcode_atts(array(
    'option' => '',
    'category' => '',
    'section_title_box' => '',
    'subtile_box' => '',
    'text_link' => '',
    'url' => '',
    'number' => '',
    'background_color' =>'',
    'title_color' => '',
    'description_color' => '',
    'links_color' => '',
    'background_linkvs_color' => '',
    'price_color' => '',
    'button_buy_background' => '',
    'sticke_background' => '',
    'name_product_color' => ''
), $atts));
if ($option == 'Style background color' || $option == '' || $option == 'Style transparent') {
  $style_setting = 'background';
}
if ($option == 'Style slide') {
  $style_setting = 'slide';
}
include(get_template_directory().'/vc_templates/product/'.$style_setting.'.php');


?>