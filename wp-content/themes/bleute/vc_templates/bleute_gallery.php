<?php
$option = $section_title_box = $subtile_box = $title_color = $description_color = $images_left = $images_right_bottom = $images_right_bottom_left = $images_right_bottom_right = $images_small_left_top = $images_small_left_bottom = $images_center = $images_big_right_top = $images_big_right_bottom = '';
extract(shortcode_atts(array(
    'option' =>'',
    'section_title_box' => '',
    'subtile_box' => '',
    'title_color' => '',
    'description_color' => '',
    'images_left' => '',
    'images_right_top' => '',
    'images_right_bottom_left' => '',
    'images_right_bottom_right' => '',
    'images_small_left_top' => '',
    'images_small_left_bottom' => '',
    'images_center' => '',
    'images_big_right_top' => '',
    'images_big_right_bottom' => ''
), $atts));
$img = shortcode_atts(array(
          'images_left' => 'images_left',
          'images_right_top' => 'images_right_top',
          'images_right_bottom_left' => 'images_right_bottom_left',
          'images_right_bottom_right' => 'images_right_bottom_right',
          'images_small_left_top' => 'images_small_left_top',
          'images_small_left_bottom' => 'images_small_left_bottom',
          'images_center' => 'images_center',
          'images_big_right_top' => 'images_big_right_top',
          'images_big_right_bottom' => 'images_big_right_bottom',
      ), $atts);
$img1 = wp_get_attachment_image_src($img["images_left"], "full");
$img2 = wp_get_attachment_image_src($img["images_right_top"], "full");
$img3 = wp_get_attachment_image_src($img["images_right_bottom_left"], "full");
$img4 = wp_get_attachment_image_src($img["images_right_bottom_right"], "full");
$img5 = wp_get_attachment_image_src($img["images_small_left_top"], "full");
$img6 = wp_get_attachment_image_src($img["images_small_left_bottom"], "full");
$img7 = wp_get_attachment_image_src($img["images_center"], "full");
$img8 = wp_get_attachment_image_src($img["images_big_right_top"], "full");
$img9 = wp_get_attachment_image_src($img["images_big_right_bottom"], "full");

$img_01 = $img1[0];
$img_02 = $img2[0];
$img_03 = $img3[0];
$img_04 = $img4[0];
$img_05 = $img5[0];
$img_06 = $img6[0];
$img_07 = $img7[0];
$img_08 = $img8[0];
$img_09 = $img9[0];
if ($option == 'Style 4 images' || $option == '') {
  $style_setting = '4_images';
}
if ($option == 'Style 6 images') {
  $style_setting = '6_images';
}
include(get_template_directory().'/vc_templates/gallery/'.$style_setting.'.php');
?>