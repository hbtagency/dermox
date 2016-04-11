<?php
$option = $section_title_box = $subtile_box = $number = $id_service = $title_color = $numberr_color = $best_color = $description_color = $links_color = '';
extract(shortcode_atts(array(
    'option' => '',
    'section_title_box' => '',
    'subtile_box' => '',
    'number' => '',
    'id_service' => '',
    'title_color' => '',
    'best_color' => '',
    'numberr_color' => '',
    'links_color' => '',
    'description_color' =>''
), $atts));
  if ($option == 'Style full left' || $option == '') {
    $style_setting = 'left';
  }
  if ($option == 'Style full right') {
    $style_setting = 'right';
  }
  if ($option == 'Style odds') {
    $style_setting = 'odds';
  }
  if ($option == 'Style icon') {
    $style_setting = 'icon';
  }
  if ($option == 'Style center') {
    $style_setting = 'center';
  }
include(get_template_directory().'/vc_templates/service/'.$style_setting.'.php');
?>