<?php
if (!class_exists('WPBakeryShortCode_bleute_menu')) {
    add_action( 'vc_before_init', 'bleute_menu', 999999);
    function bleute_menu() {
      vc_map( array(
          "name" => esc_html__( "Menu service","beautheme" ),
          "base" => "bleute_menu",
          'weight' => 95,
          'category' => __( 'Beau Theme', 'beautheme' ),
          'description' => esc_html__( 'This section allow you show menu of service', 'beautheme' ),
          "params" => array(
            array(
              'type' => 'dropdown',
              'heading' => __( 'Option', 'beautheme' ),
              'param_name' => 'option',
              'value' => array('Select...','Style title Big','Style title small','Only title'),
            ),
            array(
              'type' => 'textfield',
              'heading' => esc_html__( 'Section title', 'beautheme' ),
              'param_name' => 'section_title_box',
              'value' => esc_html__('menu','beautheme'),
              'description' => esc_html__( 'The title of section.', 'beautheme' )
            ),
            array(
              'type' => 'textfield',
              'heading' => esc_html__( 'ID menu service show', 'beautheme' ),
              'param_name' => 'id_menu',
              'description' => esc_html__( 'The ID of menu service.', 'beautheme' )
            ),
            array(
              "type" => "colorpicker",
              "class" => "",
              "heading" => esc_html__( "Title color", "beautheme" ),
              "param_name" => "title_color",
              "value" => '', //Default Red color
              "description" => esc_html__( "Choose title menu color", "beautheme" )
           ),
            array(
              "type" => "colorpicker",
              "class" => "",
              "heading" => esc_html__( "Text color", "beautheme" ),
              "param_name" => "text_color",
              "value" => '', //Default Red color
              "description" => esc_html__( "Choose text menu color", "beautheme" )
           )
          ),
       ) 
      );
    }
    class WPBakeryShortCode_bleute_menu extends WPBakeryShortCode {}
}
?>