<?php
if (!class_exists('WPBakeryShortCode_bleute_service_page')) {
    add_action( 'vc_before_init', 'bleute_service_page', 999999);
    function bleute_service_page() {
      vc_map( array(
          "name" => esc_html__( "Service page","beautheme" ),
          "base" => "bleute_service_page",
          'weight' => 95,
          'category' => __( 'Beau Theme', 'beautheme' ),
          'description' => esc_html__( 'This section allow you show service on page service', 'beautheme' ),
          "params" => array(
            array(
              'type' => 'textfield',
              'heading' => esc_html__( 'Number service show', 'beautheme' ),
              'param_name' => 'number',
              'description' => esc_html__( 'The number of service show.', 'beautheme' )
            ),
            array(
              'type' => 'dropdown',
              'heading' => __( 'Order by', 'beautheme' ),
              'param_name' => 'orderby',
              'value' => array('Select...','ASC','DESC'),
            ),
            array(
              "type" => "colorpicker",
              "class" => "",
              "heading" => esc_html__( "Number color", "beautheme" ),
              "param_name" => "number_color",
              "value" => '', //Default Red color
              "description" => esc_html__( "Choose number color", "beautheme" )
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
              "heading" => esc_html__( "Best seller color", "beautheme" ),
              "param_name" => "best_color",
              "value" => '', //Default Red color
              "description" => esc_html__( "Choose Best seller text color", "beautheme" )
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
              "type" => "colorpicker",
              "class" => "",
              "heading" => esc_html__( "Link color", "beautheme" ),
              "param_name" => "link_color",
              "value" => '', //Default Red color
              "description" => esc_html__( "Choose link color", "beautheme" )
            )
          ),
       ) 
      );
    }
    class WPBakeryShortCode_bleute_service_page extends WPBakeryShortCode {}
}
?>