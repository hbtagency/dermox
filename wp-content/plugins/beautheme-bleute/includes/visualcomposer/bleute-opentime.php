<?php
if (!class_exists('WPBakeryShortCode_bleute_opentime')) {
    add_action( 'vc_before_init', 'bleute_opentime', 999999);
    function bleute_opentime() {
      vc_map( array(
          "name" => esc_html__( "Opentime","beautheme" ),
          "base" => "bleute_opentime",
          'weight' => 95,
          'category' => __( 'Beau Theme', 'beautheme' ),
          'description' => esc_html__( 'This section show you opentime shop', 'beautheme' ),
          "params" => array(
            array(
              'type' => 'textfield',
              'heading' => esc_html__( 'Section title', 'beautheme' ),
              'param_name' => 'section_title_box',
              'description' => esc_html__( 'The title of section.', 'beautheme' )
            ),
            array(
              'type' => 'textfield',
              'heading' => esc_html__( 'Title hotline', 'beautheme' ),
              'param_name' => 'title_hotline',
              'value' => '',
              'description' => esc_html__( 'The title of hotline.', 'beautheme' )
            ),
            array(
              'type' => 'textfield',
              'heading' => esc_html__( 'Number phone hotline', 'beautheme' ),
              'param_name' => 'number_hotline',
              'value' => '',
              'description' => esc_html__( 'Number phone of hotline.', 'beautheme' )
            ),
            array(
              'type' => 'textfield',
              'heading' => esc_html__( 'Subtile hotline', 'beautheme' ),
              'param_name' => 'subtitle_hotline',
              'value' => '',
              'description' => esc_html__( 'Subtile hotline of hotline.', 'beautheme' )
            ),
            array(
              'type' => 'textfield',
              'heading' => esc_html__( 'Title hours', 'beautheme' ),
              'param_name' => 'title_hours',
              'value' => '',
              'description' => esc_html__( 'The title of hours.', 'beautheme' )
            ),
            array(
              'type' => 'textfield',
              'heading' => esc_html__( 'Text hours', 'beautheme' ),
              'param_name' => 'text_hours',
              'value' => '',
              'description' => esc_html__( 'The text of hours.', 'beautheme' )
            ),
            array(
              'type' => 'textfield',
              'heading' => esc_html__( 'Text Saturday', 'beautheme' ),
              'param_name' => 'text_saturday',
              'value' => '',
              'description' => esc_html__( 'The text of Saturday.', 'beautheme' )
            ),
            array(
              'type' => 'textfield',
              'heading' => esc_html__( 'Hours Saturday', 'beautheme' ),
              'param_name' => 'hours_saturday',
              'value' => '',
              'description' => esc_html__( 'The hours of Saturday.', 'beautheme' )
            ),
            array(
              'type' => 'textfield',
              'heading' => esc_html__( 'Text Sunday', 'beautheme' ),
              'param_name' => 'text_sunday',
              'value' => '',
              'description' => esc_html__( 'The text of Sunday.', 'beautheme' )
            ),
            array(
              'type' => 'textfield',
              'heading' => esc_html__( 'Hours Sunday', 'beautheme' ),
              'param_name' => 'hours_sunday',
              'value' => '',
              'description' => esc_html__( 'The hours of Sunday.', 'beautheme' )
            ),
            array(
              'type' => 'textfield',
              'heading' => __( 'Text Book link', 'beautheme' ),
              'param_name' => 'text_url',
              'description' => __( 'Text Book link.', 'beautheme' )
            ),
            array(
              'type' => 'href',
              'heading' => __( 'Book link', 'beautheme' ),
              'param_name' => 'url',
              'description' => __( 'opentime link.', 'beautheme' )
            ),
            array(
              "type" => "colorpicker",
              "class" => "",
              "heading" => esc_html__( "Section title color", "beautheme" ),
              "param_name" => "section_title_color",
              "value" => '', //Default Red color
              "description" => esc_html__( "Choose title section color", "beautheme" ),
              'group' => __( 'Style for element', 'beautheme' ),
            ),
            array(
              "type" => "colorpicker",
              "class" => "",
              "heading" => esc_html__( "Title hotline color", "beautheme" ),
              "param_name" => "title_hotline_color",
              "value" => '', //Default Red color
              "description" => esc_html__( "Choose title hotline color", "beautheme" ),
              'group' => __( 'Style for element', 'beautheme' ),
            ),
            array(
              "type" => "colorpicker",
              "class" => "",
              "heading" => esc_html__( "Number hotline color", "beautheme" ),
              "param_name" => "number_hotline_color",
              "value" => '', //Default Red color
              "description" => esc_html__( "Choose number hotline color", "beautheme" ),
              'group' => __( 'Style for element', 'beautheme' ),
            ),
            array(
              "type" => "colorpicker",
              "class" => "",
              "heading" => esc_html__( "Subtile hotline color", "beautheme" ),
              "param_name" => "subtile_hotline_color",
              "value" => '', //Default Red color
              "description" => esc_html__( "Choose subtile hotline color", "beautheme" ),
              'group' => __( 'Style for element', 'beautheme' ),
            ),
            array(
              "type" => "colorpicker",
              "class" => "",
              "heading" => esc_html__( "Title hours color", "beautheme" ),
              "param_name" => "title_hours_color",
              "value" => '', //Default Red color
              "description" => esc_html__( "Choose Title hours color", "beautheme" ),
              'group' => __( 'Style for element', 'beautheme' ),
            ),
            array(
              "type" => "colorpicker",
              "class" => "",
              "heading" => esc_html__( "Text hours color", "beautheme" ),
              "param_name" => "text_hours_color",
              "value" => '', //Default Red color
              "description" => esc_html__( "Choose Text hours color", "beautheme" ),
              'group' => __( 'Style for element', 'beautheme' ),
            ),
            array(
              "type" => "colorpicker",
              "class" => "",
              "heading" => esc_html__( "Text Saturday and Sunday color", "beautheme" ),
              "param_name" => "text_saturday_color",
              "value" => '', //Default Red color
              "description" => esc_html__( "Choose Text Saturday and Sunday color", "beautheme" ),
              'group' => __( 'Style for element', 'beautheme' ),
            ),
            array(
              "type" => "colorpicker",
              "class" => "",
              "heading" => esc_html__( "Hours Saturday color", "beautheme" ),
              "param_name" => "hours_saturday_color",
              "value" => '', //Default Red color
              "description" => esc_html__( "Choose Hours Saturday color", "beautheme" ),
              'group' => __( 'Style for element', 'beautheme' ),
            ),
            array(
              "type" => "colorpicker",
              "class" => "",
              "heading" => esc_html__( "Hours sunday color", "beautheme" ),
              "param_name" => "hours_sunday_color",
              "value" => '', //Default Red color
              "description" => esc_html__( "Choose Hours sunday color", "beautheme" ),
              'group' => __( 'Style for element', 'beautheme' ),
            ),
            array(
              "type" => "colorpicker",
              "class" => "",
              "heading" => esc_html__( "Background button color", "beautheme" ),
              "param_name" => "bg_button_color",
              "value" => '', //Default Red color
              "description" => esc_html__( "Background button color", "beautheme" ),
              'group' => __( 'Style for element', 'beautheme' ),
            ),
            array(
              "type" => "colorpicker",
              "class" => "",
              "heading" => esc_html__( "Text button color", "beautheme" ),
              "param_name" => "text_button_color",
              "value" => '', //Default Red color
              "description" => esc_html__( "Text button color", "beautheme" ),
              'group' => __( 'Style for element', 'beautheme' ),
            ),
          ),
       ) 
      );
    }
    class WPBakeryShortCode_bleute_opentime extends WPBakeryShortCode {}
}
?>