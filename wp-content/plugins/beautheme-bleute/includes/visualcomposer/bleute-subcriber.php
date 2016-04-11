<?php
if (!class_exists('WPBakeryShortCode_bleute_subcriber')) {
    add_action( 'vc_before_init', 'bleute_subcriber', 999999);
    function bleute_subcriber() {
      vc_map( array(
          "name" => esc_html__( "Subcriber","beautheme" ),
          "base" => "bleute_subcriber",
          'weight' => 95,
          'category' => __( 'Beau Theme', 'beautheme' ),
          'description' => esc_html__( 'This section allow you show an image and short paragraph', 'beautheme' ),
          "params" => array(
            array(
              'type' => 'textarea_html',
              'heading' => esc_html__( 'Section title', 'beautheme' ),
              'param_name' => 'content',
              'value' => '',
              'description' => esc_html__( 'The title of section.', 'beautheme' )
            ),
            array(
              'type' => 'textfield',
              'heading' => esc_html__( 'Subtile', 'beautheme' ),
              'param_name' => 'subtile_box',
              'value' => '',
              'description' => esc_html__( 'The subtile of section.', 'beautheme' )
            ),
            array(
              'type' => 'textfield',
              'heading' => esc_html__( 'Text of button subcriber', 'beautheme' ),
              'param_name' => 'text_button',
              'value' => '',
              'description' => esc_html__( 'Text of button subcriber.', 'beautheme' )
            ),
            array(
              'type' => 'textfield',
              'heading' => esc_html__( 'Placehold of form subcriber', 'beautheme' ),
              'param_name' => 'placehold_button',
              'value' => '',
              'description' => esc_html__( 'Text of form subcriber.', 'beautheme' )
            ),
            array(
              "type" => "colorpicker",
              "class" => "",
              "heading" => esc_html__( "Button color", "beautheme" ),
              "param_name" => "button_color",
              "value" => '', //Default Red color
              "description" => esc_html__( "Choose button color", "beautheme" )
           ),
            array(
              "type" => "colorpicker",
              "class" => "",
              "heading" => esc_html__( "Title color", "beautheme" ),
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
           )
          ),
       ) 
      );
    }
    class WPBakeryShortCode_bleute_subcriber extends WPBakeryShortCode {}
}
?>