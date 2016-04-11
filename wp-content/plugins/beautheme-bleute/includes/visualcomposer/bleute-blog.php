<?php
if (!class_exists('WPBakeryShortCode_bleute_blog')) {
    add_action( 'vc_before_init', 'bleute_blog', 999999);
    function bleute_blog() {
      vc_map( array(
          "name" => esc_html__( "Blog","beautheme" ),
          "base" => "bleute_blog",
          'weight' => 95,
          'category' => __( 'Beau Theme', 'beautheme' ),
          'description' => esc_html__( 'This section allow you show blog', 'beautheme' ),
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
              'heading' => esc_html__( 'Number blog show', 'beautheme' ),
              'param_name' => 'perpage',
              'value' => 2,
              'description' => esc_html__( 'The number of blog show.', 'beautheme' )
            ),
            array(
              "type" => "colorpicker",
              "class" => "",
              "heading" => esc_html__( "Title element color", "beautheme" ),
              "param_name" => "title_color",
              "value" => '', //Default Red color
              "description" => esc_html__( "Choose title color", "beautheme" ),
              'group' => __( 'Style for element', 'beautheme' ),
            ),
            array(
              "type" => "colorpicker",
              "class" => "",
              "heading" => esc_html__( "Subtitle color", "beautheme" ),
              "param_name" => "subtitle_color",
              "value" => '', //Default Red color
              "description" => esc_html__( "Choose subtitle color", "beautheme" ),
              'group' => __( 'Style for element', 'beautheme' ),
            ),
            array(
              "type" => "colorpicker",
              "class" => "",
              "heading" => esc_html__( "Title blog color", "beautheme" ),
              "param_name" => "title_blog_color",
              "value" => '', //Default Red color
              "description" => esc_html__( "Choose title blog color", "beautheme" ),
              'group' => __( 'Style for element', 'beautheme' ),
            ),
            array(
              "type" => "colorpicker",
              "class" => "",
              "heading" => esc_html__( "Details blog color", "beautheme" ),
              "param_name" => "details_blog_color",
              "value" => '', //Default Red color
              "description" => esc_html__( "Choose details color", "beautheme" ),
              'group' => __( 'Style for element', 'beautheme' ),
            ),
            array(
              "type" => "colorpicker",
              "class" => "",
              "heading" => esc_html__( "Content blog color", "beautheme" ),
              "param_name" => "content_blog_color",
              "value" => '', //Default Red color
              "description" => esc_html__( "Choose content color", "beautheme" ),
              'group' => __( 'Style for element', 'beautheme' ),
            ),
            array(
              "type" => "colorpicker",
              "class" => "",
              "heading" => esc_html__( "Month blog color", "beautheme" ),
              "param_name" => "month_blog_color",
              "value" => '', //Default Red color
              "description" => esc_html__( "Choose month color", "beautheme" ),
              'group' => __( 'Style for element', 'beautheme' ),
            ),
            array(
              "type" => "colorpicker",
              "class" => "",
              "heading" => esc_html__( "Day blog color", "beautheme" ),
              "param_name" => "day_blog_color",
              "value" => '', //Default Red color
              "description" => esc_html__( "Choose day color", "beautheme" ),
              'group' => __( 'Style for element', 'beautheme' ),
            ),
          ),
       ) 
      );
    }
    class WPBakeryShortCode_bleute_blog extends WPBakeryShortCode {}
}
?>