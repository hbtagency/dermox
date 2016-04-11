<?php
$option = $section_title_box = $title_box = $subtile_box = $history_image = $description = $text_link = $url = $title_element_color = $title_color = $subitle_color = $description_color = $content_color = $text_links_color = '';
extract(shortcode_atts(array(
    'option' => '',
    'section_title_box' => '',
    'title_box' => '',
    'subtile_box' => '',
    'history_image' => '',
    'description' =>'',
    'text_link' => '',
    'url' => '',
    'title_element_color' => '', 
    'title_color' => '', 
    'subitle_color' => '', 
    'description_color' => '', 
    'content_color' => '',
    'text_links_color' => ''
), $atts));
$img = shortcode_atts(array(
            'history_image' => 'history_image',
        ), $atts);
  $img1 = wp_get_attachment_image_src($img["history_image"], "full");
  $bg_img = $img1[0];
  if ($option == 'Style full' || $option == '') {
    $style_setting = 'full';
  }
  if ($option == 'Style center') {
    $style_setting = 'center';
  }
  if ($option == 'Style 1/2') {
    $style_setting = 'half';
  }
include(get_template_directory().'/vc_templates/history/'.$style_setting.'.php');
?>
