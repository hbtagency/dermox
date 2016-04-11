<?php
if (!class_exists('WPBakeryShortCode_bleute_banner')) {
    add_action( 'vc_before_init', 'bleute_banner', 999999);
    function bleute_banner() {
      vc_map( array(
          "name" => esc_html__( "Banner","beautheme" ),
          "base" => "bleute_banner",
          'weight' => 95,
          'category' => __( 'Beau Theme', 'beautheme' ),
          'description' => esc_html__( 'This section allow you show an image and short text banner', 'beautheme' ),
          "params" => array(
            array(
              'type' => 'dropdown',
              'heading' => __( 'Option', 'beautheme' ),
              'param_name' => 'option',
              'value' => array('Select...','Style left','Style right','Style small left','Style small right'),
            ),
            array(
              'type' => 'textfield',
              'heading' => esc_html__( 'Title content', 'beautheme' ),
              'param_name' => 'banner_title',
              'value' => '',
              'description' => esc_html__( 'The title of content.', 'beautheme' ),
            ),
            array(
              'type' => 'textfield',
              'heading' => esc_html__( 'Small title of content', 'beautheme' ),
              'param_name' => 'banner_smalltitle',
              'value' => '',
              'description' => esc_html__( 'The smalltitle of content only for style left.', 'beautheme' ),
            ),
            array(
              'type' => 'textfield',
              'heading' => esc_html__( 'Subtitle of content', 'beautheme' ),
              'param_name' => 'banner_subtitle',
              'value' => '',
              'description' => esc_html__( 'The subtitle of content only for style left.', 'beautheme' ),
            ),
            array(
              'type' => 'textarea_html',
              'holder' => 'div',
              'heading' => esc_html__( 'Content', 'beautheme' ),
              'param_name' => 'content',
              'value' => ''
            ),
            array(
              'type' => 'attach_image',
              'heading' => __( 'Image background', 'beautheme' ),
              'param_name' => 'banner_image',
              'value' => '',
              'description' => esc_html__( 'The image of background.', 'beautheme' )
              // 'group' => __('Author info','beautheme'),
            ),
          ),
       ) 
      );
    }
    class WPBakeryShortCode_bleute_banner extends WPBakeryShortCode {}
}
?>