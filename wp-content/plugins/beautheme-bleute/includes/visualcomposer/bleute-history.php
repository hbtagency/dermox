<?php
if (!class_exists('WPBakeryShortCode_Bleute_history')) {
    add_action( 'vc_before_init', 'bleute_history', 999999);
    function bleute_history() {
      vc_map( array(
          "name" => esc_html__( "History","beautheme" ),
          "base" => "bleute_history",
          'weight' => 95,
          'category' => __( 'Beau Theme', 'beautheme' ),
          'description' => esc_html__( 'This section allow you show an image and short paragraph', 'beautheme' ),
          "params" => array(
            array(
              'type' => 'dropdown',
              'heading' => __( 'Option', 'beautheme' ),
              'param_name' => 'option',
              'value' => array('Select...','Style full','Style center', 'Style 1/2'),
            ),
            array(
              'type' => 'textfield',
              'heading' => esc_html__( 'Section title', 'beautheme' ),
              'param_name' => 'section_title_box',
              'description' => esc_html__( 'The title of section.', 'beautheme' )
            ),
            array(
              'type' => 'textfield',
              'heading' => esc_html__( 'Title', 'beautheme' ),
              'param_name' => 'title_box',
              'value' => '',
              'description' => esc_html__( 'The title of section only show on style full and center.', 'beautheme' )
            ),
            array(
              'type' => 'textfield',
              'heading' => esc_html__( 'Subtile', 'beautheme' ),
              'param_name' => 'subtile_box',
              'value' => '',
              'description' => esc_html__( 'The title of section only show on style full and center.', 'beautheme' )
            ),
            array(
              'type' => 'attach_image',
              'heading' => __( 'Image history', 'beautheme' ),
              'param_name' => 'history_image',
              'value' => '',
              'description' => esc_html__( 'The image of section only show on style full.', 'beautheme' )
              // 'group' => __('Author info','beautheme'),
            ),
            array(
              'type' => 'textarea',
              'holder' => 'div',
              'heading' => esc_html__( 'Description', 'beautheme' ),
              'param_name' => 'description',
              'value' => ''
            ),

            array(
              'type' => 'textarea_html',
              'holder' => 'div',
              'heading' => esc_html__( 'Content', 'beautheme' ),
              'param_name' => 'content',
              'value' => ''
            ),
            array(
              'type' => 'textfield',
              'heading' => esc_html__( 'text link', 'beautheme' ),
              'param_name' => 'text_link',
              'value' => '',
              'description' => esc_html__( 'The title of section only show on style full and center.', 'beautheme' )
            ),
            array(
              'type' => 'href',
              'heading' => __( 'History link', 'beautheme' ),
              'param_name' => 'url',
              'description' => __( 'History link.', 'beautheme' )
            ),
            array(
              "type" => "colorpicker",
              "class" => "",
              "heading" => esc_html__( "Title element", "beautheme" ),
              "param_name" => "title_element_color",
              "value" => '', //Default Red color
              "description" => esc_html__( "Choose title element color", "beautheme" ),
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
              "heading" => esc_html__( "Subitle color", "beautheme" ),
              "param_name" => "subitle_color",
              "value" => '', //Default Red color
              "description" => esc_html__( "Choose subitle color", "beautheme" ),
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
              "heading" => esc_html__( "Content color", "beautheme" ),
              "param_name" => "content_color",
              "value" => '', //Default Red color
              "description" => esc_html__( "Choose content color", "beautheme" ),
              'group' => __( 'Style for element', 'beautheme' ),
           ),
            array(
              "type" => "colorpicker",
              "class" => "",
              "heading" => esc_html__( "Text link color", "beautheme" ),
              "param_name" => "text_links_color",
              "value" => '', //Default Red color
              "description" => esc_html__( "Choose text link color", "beautheme" ),
              'group' => __( 'Style for element', 'beautheme' ),
           ),
          ),
       ) 
      );
    }
    class WPBakeryShortCode_Bleute_history extends WPBakeryShortCode {}
}
?>