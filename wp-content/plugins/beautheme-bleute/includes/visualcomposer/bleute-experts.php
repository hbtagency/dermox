<?php
if (!class_exists('WPBakeryShortCode_bleute_experts')) {
    add_action( 'vc_before_init', 'bleute_experts', 999999);
    function bleute_experts() {
      vc_map( array(
          "name" => esc_html__( "Experts","beautheme" ),
          "base" => "bleute_experts",
          'weight' => 95,
          'category' => __( 'Beau Theme', 'beautheme' ),
          'description' => esc_html__( 'This section allow you show slide of Experts', 'beautheme' ),
          "params" => array(
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
              'description' => esc_html__( 'Subtile of section.', 'beautheme' )
            ),
            array(
              'type' => 'textfield',
              'heading' => esc_html__( 'Number experts show', 'beautheme' ),
              'param_name' => 'number',
              'description' => esc_html__( 'The number of experts show.', 'beautheme' )
            ),
            array(
              "type" => "colorpicker",
              "class" => "",
              "heading" => esc_html__( "Button color", "beautheme" ),
              "param_name" => "button_color",
              "value" => '', //Default Red color
              "description" => esc_html__( "Choose button color", "beautheme" ),
              'group' => __( 'Style for element', 'beautheme' ),
            ),
            array(
              "type" => "colorpicker",
              "class" => "",
              "heading" => esc_html__( "Title element color", "beautheme" ),
              "param_name" => "titles_color",
              "value" => '', //Default Red color
              "description" => esc_html__( "Choose title color", "beautheme" ),
              'group' => __( 'Style for element', 'beautheme' ),
            ),
            array(
              "type" => "colorpicker",
              "class" => "",
              "heading" => esc_html__( "Subtitle color", "beautheme" ),
              "param_name" => "subtitles_color",
              "value" => '', //Default Red color
              "description" => esc_html__( "Choose subtitle color", "beautheme" ),
              'group' => __( 'Style for element', 'beautheme' ),
            ),
            array(
              "type" => "colorpicker",
              "class" => "",
              "heading" => esc_html__( "Title item color", "beautheme" ),
              "param_name" => "titles_item_color",
              "value" => '', //Default Red color
              "description" => esc_html__( "Choose title item color", "beautheme" ),
              'group' => __( 'Style for element', 'beautheme' ),
            ),
            array(
              "type" => "colorpicker",
              "class" => "",
              "heading" => esc_html__( "Subtitle item color", "beautheme" ),
              "param_name" => "subtitles_item_color",
              "value" => '', //Default Red color
              "description" => esc_html__( "Choose subtitle item color", "beautheme" ),
              'group' => __( 'Style for element', 'beautheme' ),
            ),
          ),
       ) 
      );
    }
    class WPBakeryShortCode_bleute_experts extends WPBakeryShortCode {}
}
?>