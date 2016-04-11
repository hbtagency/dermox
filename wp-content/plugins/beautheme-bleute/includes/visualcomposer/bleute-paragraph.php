<?php
if (!class_exists('WPBakeryShortCode_bleute_paragraph')) {
    add_action( 'vc_before_init', 'bleute_paragraph', 999999);
    function bleute_paragraph() {
      vc_map( array(
          "name" => esc_html__( "Paragraph","beautheme" ),
          "base" => "bleute_paragraph",
          'weight' => 95,
          'category' => __( 'Beau Theme', 'beautheme' ),
          'description' => esc_html__( 'This section allow you show an image and short paragraph', 'beautheme' ),
          "params" => array(
            array(
              'type' => 'dropdown',
              'heading' => __( 'Option', 'beautheme' ),
              'param_name' => 'option',
              'value' => array('Select...','Style center','Style left'),
            ),
            array(
              'type' => 'textfield',
              'heading' => esc_html__( 'Section content', 'beautheme' ),
              'param_name' => 'paragraph_content',
              'value' => '',
              'description' => esc_html__( 'The title of section.', 'beautheme' ),
              'group' => __( 'Style center', 'beautheme' ),
            ),
            array(
              'type' => 'textfield',
              'heading' => esc_html__( 'Author name', 'beautheme' ),
              'param_name' => 'paragraph_author',
              'value' => '',
              'description' => esc_html__( 'Author name of section.', 'beautheme' ),
              'group' => __( 'Style center', 'beautheme' ),
            ),
            array(
              'type' => 'textfield',
              'heading' => esc_html__( 'Sub paragraph show', 'beautheme' ),
              'param_name' => 'paragraph_sub',
              'description' => esc_html__( 'The Sub paragraph show.', 'beautheme' ),
              'group' => __( 'Style center', 'beautheme' ),
            ),
            array(
              'type' => 'textfield',
              'heading' => esc_html__( 'Text top', 'beautheme' ),
              'param_name' => 'paragraph_left_top',
              'value' => '',
              'description' => esc_html__( 'Text top only show on style left.', 'beautheme' ),
              'group' => __( 'Style left', 'beautheme' ),
            ),
            array(
              'type' => 'textfield',
              'heading' => esc_html__( 'Text sale', 'beautheme' ),
              'param_name' => 'paragraph_sale',
              'value' => '',
              'description' => esc_html__( 'Text sale only show on style left.', 'beautheme' ),
              'group' => __( 'Style left', 'beautheme' ),
            ),
            array(
              'type' => 'textfield',
              'heading' => esc_html__( 'Text bottom', 'beautheme' ),
              'param_name' => 'paragraph_left_bottom',
              'value' => '',
              'description' => esc_html__( 'Text bottom only show on style left.', 'beautheme' ),
              'group' => __( 'Style left', 'beautheme' ),
            ),
            array(
              'type' => 'textfield',
              'heading' => esc_html__( 'Text link', 'beautheme' ),
              'param_name' => 'paragraph_left_textlink',
              'value' => '',
              'description' => esc_html__( 'Text link only show on style left.', 'beautheme' ),
              'group' => __( 'Style left', 'beautheme' ),
            ),
            array(
              'type' => 'href',
              'heading' => __( 'URL (Link)', 'beautheme' ),
              'param_name' => 'paragraph_left_href',
              'description' => __( 'Enter button link.', 'beautheme' ),
              'group' => __( 'Style left', 'beautheme' ),
            ),
          ),
       ) 
      );
    }
    class WPBakeryShortCode_bleute_paragraph extends WPBakeryShortCode {}
}
?>