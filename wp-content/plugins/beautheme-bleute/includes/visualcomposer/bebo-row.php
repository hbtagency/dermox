<?php
//Add more option for Vituarcomposer row
add_action( 'vc_before_init', 'bebo_containerCenter', 999999);
function bebo_containerCenter(){
  if(function_exists('vc_add_param')){
    vc_add_param('vc_row',array(
        'type' => 'dropdown',
        'heading' => __( 'Row stretch', 'bebo' ),
        'param_name' => 'full_width',
        'value' => array(
          __( 'Default', 'bebo' ) => '',
          __( 'Stretch row', 'bebo' ) => 'stretch_row',
          __( 'Stretch row and content', 'bebo' ) => 'stretch_row_content',
          __( 'Stretch row and content (no paddings)', 'bebo' ) => 'stretch_row_content_no_spaces',
          __( 'Stretch row and content (no paddings content in center)', 'bebo' ) => 'stretch_row_content_no_spaces_content',
        ),
        'description' => __( 'Select stretching options for row and content (Note: stretched may not work properly if parent container has "overflow: hidden" CSS property).', 'bebo' )
        // "group" => __( 'Design options', 'bebo' ),
      )
    );

  }
}
?>