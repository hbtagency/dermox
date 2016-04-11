<?php
if (!class_exists('WPBakeryShortCode_bleute_gallery')) {
    add_action( 'vc_before_init', 'bleute_gallery', 999999);
    function bleute_gallery() {
      vc_map( array(
          "name" => esc_html__( "Gallery element","beautheme" ),
          "base" => "bleute_gallery",
          'weight' => 95,
          'category' => __( 'Beau Theme', 'beautheme' ),
          'description' => esc_html__( 'This section allow you show some images', 'beautheme' ),
          "params" => array(
            array(
              'type' => 'dropdown',
              'heading' => __( 'Option', 'beautheme' ),
              'param_name' => 'option',
              'value' => array('Select...','Style 4 images','Style 6 images'),
            ),
            array(
              'type' => 'textfield',
              'heading' => esc_html__( 'Section title', 'beautheme' ),
              'param_name' => 'section_title_box',
              'value' => '',
              'description' => esc_html__( 'The title of section.', 'beautheme' )
            ),
            array(
              'type' => 'textfield',
              'heading' => esc_html__( 'Subtile', 'beautheme' ),
              'param_name' => 'subtile_box',
              'value' => '',
              'description' => esc_html__( 'The title of section only show on style full and center.', 'beautheme' )
            ),
            array(
              "type" => "colorpicker",
              "class" => "",
              "heading" => esc_html__( "Button color", "beautheme" ),
              "param_name" => "title_color",
              "value" => '', //Default Red color
              "description" => esc_html__( "Choose title color", "beautheme" )
           ),
            array(
              "type" => "colorpicker",
              "class" => "",
              "heading" => esc_html__( "Description color", "beautheme" ),
              "param_name" => "description_color",
              "value" => '', //Default Red color
              "description" => esc_html__( "Choose description color", "beautheme" )
            ),
            array(
              'type' => 'attach_image',
              'heading' => __( 'Image left', 'beautheme' ),
              'param_name' => 'images_left',
              'value' => '',
              'group' => __( 'Images for style 4 images', 'beautheme' ),
            ),
            array(
              'type' => 'attach_image',
              'heading' => __( 'Image right top', 'beautheme' ),
              'param_name' => 'images_right_top',
              'value' => '',
              'group' => __( 'Images for style 4 images', 'beautheme' ),
            ),
            array(
              'type' => 'attach_image',
              'heading' => __( 'Image right bottom left', 'beautheme' ),
              'param_name' => 'images_right_bottom_left',
              'value' => '',
              'group' => __( 'Images for style 4 images', 'beautheme' ),
            ),
            array(
              'type' => 'attach_image',
              'heading' => __( 'Image right bottom right', 'beautheme' ),
              'param_name' => 'images_right_bottom_right',
              'value' => '',
              'group' => __( 'Images for style 4 images', 'beautheme' ),
            ),
            array(
              'type' => 'attach_image',
              'heading' => __( 'Image small left top', 'beautheme' ),
              'param_name' => 'images_small_left_top',
              'value' => '',
              'group' => __( 'Images for style 6 images', 'beautheme' ),
            ),
            array(
              'type' => 'attach_image',
              'heading' => __( 'Image small left bottom', 'beautheme' ),
              'param_name' => 'images_small_left_bottom',
              'value' => '',
              'group' => __( 'Images for style 6 images', 'beautheme' ),
            ),
            array(
              'type' => 'attach_image',
              'heading' => __( 'Image center', 'beautheme' ),
              'param_name' => 'images_center',
              'value' => '',
              'group' => __( 'Images for style 6 images', 'beautheme' ),
            ),
            array(
              'type' => 'attach_image',
              'heading' => __( 'Image big right top', 'beautheme' ),
              'param_name' => 'images_big_right_top',
              'value' => '',
              'group' => __( 'Images for style 6 images', 'beautheme' ),
            ),
            array(
              'type' => 'attach_image',
              'heading' => __( 'Image big right bottom', 'beautheme' ),
              'param_name' => 'images_big_right_bottom',
              'value' => '',
              'group' => __( 'Images for style 6 images', 'beautheme' ),
            ),
          ),
       ) 
      );
    }
    class WPBakeryShortCode_bleute_gallery extends WPBakeryShortCode {}
}
?>