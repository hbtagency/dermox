<?php
if (!class_exists('WPBakeryShortCode_bleute_service')) {
    add_action( 'vc_before_init', 'bleute_service', 999999);
    function bleute_service() {
      vc_map( array(
          "name" => esc_html__( "Service element","beautheme" ),
          "base" => "bleute_service",
          'weight' => 95,
          'category' => __( 'Beau Theme', 'beautheme' ),
          'description' => esc_html__( 'This section allow you show an image and short paragraph', 'beautheme' ),
          "params" => array(
            array(
              'type' => 'dropdown',
              'heading' => __( 'Option', 'beautheme' ),
              'param_name' => 'option',
              'value' => array('Select...','Style full left','Style full right','Style odds', 'Style icon', 'Style center'),
            ),
            array(
              'type' => 'textfield',
              'heading' => esc_html__( 'Section title', 'beautheme' ),
              'param_name' => 'section_title_box',
              'value' => '',
              'description' => esc_html__( 'The title of service only show on style icon.', 'beautheme' )
            ),
            array(
              'type' => 'textfield',
              'heading' => esc_html__( 'Subtile', 'beautheme' ),
              'param_name' => 'subtile_box',
              'value' => '',
              'description' => esc_html__( 'The title of service only show on style icon.', 'beautheme' )
            ),
            array(
              'type' => 'textfield',
              'heading' => esc_html__( 'Number service show', 'beautheme' ),
              'param_name' => 'number',
              'description' => esc_html__( 'The number of service show (This setting not use for style full left and right).', 'beautheme' )
            ),
            array(
              'type' => 'textfield',
              'heading' => esc_html__( 'Show service with ID service', 'beautheme' ),
              'param_name' => 'id_service',
              'description' => esc_html__( 'The ID of service only show on style icon.', 'beautheme' )
            ),
            array(
              "type" => "colorpicker",
              "class" => "",
              "heading" => esc_html__( "Title color", "beautheme" ),
              "param_name" => "title_color",
              "value" => '', //Default Red color
              "description" => esc_html__( "Choose title color only show on style icon", "beautheme" ),
              'group' => __( 'Style for element', 'beautheme' ),
            ),
            array(
              "type" => "colorpicker",
              "class" => "",
              "heading" => esc_html__( "Text best seller color", "beautheme" ),
              "param_name" => "best_color",
              "value" => '', //Default Red color
              "description" => esc_html__( "Choose text best seller color", "beautheme" ),
              'group' => __( 'Style for element', 'beautheme' ),
            ),
            array(
              "type" => "colorpicker",
              "class" => "",
              "heading" => esc_html__( "Number color", "beautheme" ),
              "param_name" => "numberr_color",
              "value" => '', //Default Red color
              "description" => esc_html__( "Choose number color", "beautheme" ),
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
              "heading" => esc_html__( "Link color", "beautheme" ),
              "param_name" => "links_color",
              "value" => '', //Default Red color
              "description" => esc_html__( "Choose link color", "beautheme" ),
              'group' => __( 'Style for element', 'beautheme' ),
            )
        ),
       ) 
      );
    }
    class WPBakeryShortCode_bleute_service extends WPBakeryShortCode {}
}
?>