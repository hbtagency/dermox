<?php

if (!class_exists('WPBakeryShortCode_bleute_product')) {
    add_action( 'vc_before_init', 'bleute_product', 999999);

    function bleute_product() {
      vc_map( array(
          "name" => esc_html__( "Show Product","beautheme" ),
          "base" => "bleute_product",
          'weight' => 95,
          'category' => __( 'Beau Theme', 'beautheme' ),
          'description' => esc_html__( 'This section allow you show Product', 'beautheme' ),
          "params" => array(
            array(
              'type' => 'dropdown',
              'heading' => __( 'Option', 'beautheme' ),
              'param_name' => 'option',
              'value' => array('Select...','Style background color','Style transparent', 'Style slide'),
            ),
            array(
              'type' => 'dropdown',
              'heading' => __( 'Category product', 'beautheme' ),
              'param_name' => 'category',
              'value' => beau_get_category_product(),
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
              'description' => esc_html__( 'The Subtile of section.', 'beautheme' )
            ),

            array(
              'type' => 'textfield',
              'heading' => esc_html__( 'Number product show', 'beautheme' ),
              'param_name' => 'number',
              'description' => esc_html__( 'The number of product show.', 'beautheme' )
            ),

            array(
              'type' => 'textfield',
              'heading' => esc_html__( 'Text link visit', 'beautheme' ),
              'param_name' => 'text_link',
              'value' => '',
              'description' => esc_html__( 'Text link visit not show on style slide.', 'beautheme' )
            ),
            array(
              'type' => 'href',
              'heading' => __( 'Link visit', 'beautheme' ),
              'param_name' => 'url',
              'description' => __( 'Link visit.', 'beautheme' )
            ),

            array(
              "type" => "colorpicker",
              "class" => "",
              "heading" => esc_html__( "Background item color", "beautheme" ),
              "param_name" => "background_color",
              "value" => '', //Default Red color
              "description" => esc_html__( "Choose background item color", "beautheme" ),
              'group' => __( 'Style for element', 'beautheme' ),
            ),
            array(
              "type" => "colorpicker",
              "class" => "",
              "heading" => esc_html__( "Title color", "beautheme" ),
              "param_name" => "title_color",
              "value" => '', //Default Red color
              "description" => esc_html__( "Choose title color", "beautheme" ),
              'group' => __( 'Style for element', 'beautheme' ),
           ),
            array(
              "type" => "colorpicker",
              "class" => "",
              "heading" => esc_html__( "Description color", "beautheme" ),
              "param_name" => "description_color",
              "value" => '', //Default Red color
              "description" => esc_html__( "Choose description color", "beautheme" ),
              'group' => __( 'Style for element', 'beautheme' ),
           ),
            array(
              "type" => "colorpicker",
              "class" => "",
              "heading" => esc_html__( "Background link visit", "beautheme" ),
              "param_name" => "background_linkvs_color",
              "value" => '', //Default Red color
              "description" => esc_html__( "Choose background link visit color", "beautheme" ),
              'group' => __( 'Style for element', 'beautheme' ),
           ),
            array(
              "type" => "colorpicker",
              "class" => "",
              "heading" => esc_html__( "Background buy button", "beautheme" ),
              "param_name" => "button_buy_background",
              "value" => '', //Default Red color
              "description" => esc_html__( "Choose background buy button", "beautheme" ),
              'group' => __( 'Style for element', 'beautheme' ),
           ),
            array(
              "type" => "colorpicker",
              "class" => "",
              "heading" => esc_html__( "Background sticker sale", "beautheme" ),
              "param_name" => "sticke_background",
              "value" => '', //Default Red color
              "description" => esc_html__( "Choose background sticker sale", "beautheme" ),
              'group' => __( 'Style for element', 'beautheme' ),
           ),
            array(
              "type" => "colorpicker",
              "class" => "",
              "heading" => esc_html__( "Name product color", "beautheme" ),
              "param_name" => "name_product_color",
              "value" => '', //Default Red color
              "description" => esc_html__( "Choose name product color", "beautheme" ),
              'group' => __( 'Style for element', 'beautheme' ),
           ),
            array(
              "type" => "colorpicker",
              "class" => "",
              "heading" => esc_html__( "Price color", "beautheme" ),
              "param_name" => "price_color",
              "value" => '', //Default Red color
              "description" => esc_html__( "Choose price color", "beautheme" ),
              'group' => __( 'Style for element', 'beautheme' ),
           ),
          ),
       ) 
      );
    }
    class WPBakeryShortCode_bleute_product extends WPBakeryShortCode {}
}
?>