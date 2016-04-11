<?php
add_filter( 'cmb_meta_boxes', 'beau_theme_metaboxes' );
function beau_theme_metaboxes( array $meta_boxes ) {

    $prefix = '_beautheme_';

    if(function_exists('get_masterslider_names')){
        $master_sliders = get_masterslider_names();
        if (count($master_sliders) == 0) {
            $master_sliders = array(0=>__('No slider found','bebo'));
        }
    }else{
        $master_sliders = array(__('No slider found','bebo'));
    }


    //Header array
    $custom_header = array(
        'none-slide'    => 'None slide',
        'default'           => 'Default',
        'shipping'    => 'Shipping',
        'full-width'    => 'Full width',
    );

    //Color array
    $custom_color = array(
        ''              => 'Default blue',
        'brown'       => 'Brown',
        'pink'         => 'Pink',
        'dark'       => 'Dark',
    );

    //Footer array
    $custom_footer = array(
        ''              => 'Default on Theme Option',
        'default'       => 'Footer twitter',
        'column'         => 'Footer column',
        'none'         => 'Footer none',
    );

    //For page and post options header
    $meta_boxes['header_metabox'] = array(
        'id'         => 'header_metabox',
        'title'      => __( 'Your custom header & footer', 'bleute' ),
        'pages'      => array( 'page'), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        // 'cmb_styles' => true, // Enqueue the CMB stylesheet on the frontend
        'fields'     => array(
            array(
                'name' => __( 'Description of title page', 'beautheme' ),
                'desc' => __('Enter description of this page','beautheme'),
                'id'   => $prefix . 'header_description',
                'type' => 'text',
            ),
            array(
                'name'    => __('Select header','bleute'),
                'desc'    => __('Chose your header or default on theme option','bleute'),
                'id'      => $prefix . 'custom_header',
                'type'    => 'select',
                'options' => $custom_header,
            ),
            array(
                'name'    => __('Select footer','bleute'),
                'desc'    => __('Chose your footer or default on theme option','bleute'),
                'id'      => $prefix . 'footer_custom',
                'type'    => 'select',
                'options' => $custom_footer,
            ),
            array(
                'name'    => __('Select color style of page','bleute'),
                'desc'    => __('Chose your color style','bleute'),
                'id'      => $prefix . 'color_custom',
                'type'    => 'select',
                'options' => $custom_color,
            ),
            array(
                'name'    => __('Select slide','bleute'),
                'desc'    => __('Chose your slider','bleute'),
                'id'      => $prefix . 'slide_custom',
                'type'    => 'select',
                'options' => $master_sliders,
            ),
        ),
    );

    //For post type testimonial
    $meta_boxes['testimonial_metabox'] = array(
        'id'         => 'testimonial_metabox',
        'title'      => __( 'Testimonial info', 'beautheme' ),
        'pages'      => array( 'testimonial'), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        // 'cmb_styles' => true, // Enqueue the CMB stylesheet on the frontend
        'fields'     => array(
            array(
                'name' => __( 'Message', 'beautheme' ),
                'desc' => __( 'Author message for testimonial', 'beautheme' ),
                'id'   => $prefix . 'testimonial_message',
                'type' => 'textarea',
            ),
            array(
                'name' => __( 'Author name', 'beautheme' ),
                'desc' => __('Enter author name eg: Shival - k','beautheme'),
                'id'   => $prefix . 'author_name',
                'type' => 'text',
            ),
            array(
                'name' => __( 'Author job', 'beautheme' ),
                'desc' => __('Enter author job eg: Designer, Writer','beautheme'),
                'id'   => $prefix . 'author_job',
                'type' => 'text',
            ),

        ),
    );

    //Metabox for experts
    $meta_boxes['experts_metabox'] = array(
        'id'           => 'experts_metabox',
        'title'        => __( 'Experts infomation', 'beautheme' ),
        'pages'        => array( 'experts', ), // Post type
        'context'      => 'normal',
        'priority'     => 'high',
        'show_names'   => true, // Show field names on the left
        'fields'       => array(
            array(
                'name' => __( 'Job', 'beautheme' ),
                'desc' => __( 'Job of Experts.', 'beautheme' ),
                'id'   => $prefix . 'experts_job',
                'type' => 'text',
            ),
            array(
                'name'   => __( 'Experts avatar', 'beautheme' ),
                'desc'   => __( 'Upload an image or enter a URL to image.', 'beautheme' ),
                'id'     => $prefix . 'type_image',
                'type'   => 'file',
                'allows' => 'url',
            ),
            array(
                'name' => __( 'Experts facebook url', 'beautheme' ),
                'desc' => __( 'Experts Facebook link.', 'beautheme' ),
                'id'   => $prefix . 'experts_facebook',
                'type' => 'text',
            ),
            array(
                'name' => __( 'Experts twitter url', 'beautheme' ),
                'desc' => __( 'Experts Twitter link.', 'beautheme' ),
                'id'   => $prefix . 'experts_twitter',
                'type' => 'text',
            ),
            array(
                'name' => __( 'Experts google', 'beautheme' ),
                'desc' => __( 'Experts google link.', 'beautheme' ),
                'id'   => $prefix . 'experts_google',
                'type' => 'text',
            ),
            array(
                'name' => __( 'Experts pinterest', 'beautheme' ),
                'desc' => __( 'Experts pinterest link.', 'beautheme' ),
                'id'   => $prefix . 'experts_pinterest',
                'type' => 'text',
            ),
        ),
    );

    //Metabox for gallery
        $meta_boxes['gallery_metabox'] = array(
            'id'           => 'gallery_metabox',
            'title'        => __( 'Gallery infomation', 'beautheme' ),
            'pages'        => array( 'gallery', ), // Post type
            'context'      => 'normal',
            'priority'     => 'high',
            'show_names'   => true, // Show field names on the left
            'fields'       => array(
                
                array(
                    'name' => __( 'Title of gallery', 'beautheme' ),
                    'desc' => __( 'Title gallery.', 'beautheme' ),
                    'id'   => $prefix . 'gallery_title',
                    'type' => 'text',
                ),
                array(
                    'name' => __( 'Description', 'beautheme' ),
                    'desc' => __( 'Description of gallery.', 'beautheme' ),
                    'id'   => $prefix . 'gallery_description',
                    'type' => 'textarea',
                ),
                array(
                    'name' => __( 'Name of author', 'beautheme' ),
                    'desc' => __( 'Name author.', 'beautheme' ),
                    'id'   => $prefix . 'gallery_author',
                    'type' => 'text',
                ),
                array(
                    'name'    => __('Chose gallery type','bleute'),
                    'id'      => $prefix . 'your_custom_gallery',
                    'type'    => 'radio_inline',
                    'options' => array(
                        'gallery_image'      => __( 'Image', 'bleute' ),
                        'gallery_slide'   => __( 'Slide', 'bleute' ),
                        'gallery_video'         => __( 'Video link', 'bleute' ),
                    ),
                    'default' => 'product_standard',
                ),
                array(
                    'name'   => __( 'Gallery image', 'beautheme' ),
                    'desc'   => __( 'Only work if you choose gallery type image.', 'beautheme' ),
                    'id'     => $prefix . 'type_gallery',
                    'type'   => 'file',
                    'allows' => 'url',
                ),
                array(
                    'name'   => __( 'Gallery link video', 'beautheme' ),
                    'desc'   => __( 'Only work if you choose gallery type video.', 'beautheme' ),
                    'id'     => $prefix . 'type_video',
                    'type'   => 'text',
                    'allows' => 'url',
                ),
                array(
                    'name'   => __( 'Thumb gallery', 'beautheme' ),
                    'desc'   => __( 'Only work if you choose gallery type video.', 'beautheme' ),
                    'id'     => $prefix . 'thumb_video',
                    'type'   => 'file',
                    'allows' => 'url',
                ),
            ),
        );

    //For post type membership
    $meta_boxes['membership_metabox'] = array(
        'id'         => 'membership_metabox',
        'title'      => __( 'Membership info', 'beautheme' ),
        'pages'      => array( 'membership'), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        // 'cmb_styles' => true, // Enqueue the CMB stylesheet on the frontend
        'fields'     => array(
            array(
                'name' => __( 'Price of pack membership', 'beautheme' ),
                'desc' => __( 'Price for pack', 'beautheme' ),
                'id'   => $prefix . 'membership_price',
                'type' => 'text',
            ),
            array(
                'name' => __( 'Per month or year?', 'beautheme' ),
                'desc' => __( 'Price for pack per month or year?', 'beautheme' ),
                'id'   => $prefix . 'membership_per',
                'type' => 'text',
            ),
            array(
                'name' => __( 'Link buy membership', 'beautheme' ),
                'desc' => __( 'Buy pack link.', 'beautheme' ),
                'id'   => $prefix . 'membership_link',
                'type' => 'text',
            ),
            array(
                'name' => __( 'Most popular', 'beautheme' ),
                'desc' => __( 'Show active in element or not?', 'beautheme' ),
                'id'   => $prefix . 'service_popular',
                'type' => 'checkbox',
            ),
        ),
    );

    //For post type service
    $meta_boxes['service_metabox'] = array(
        'id'         => 'service_metabox',
        'title'      => __( 'Service info', 'beautheme' ),
        'pages'      => array( 'service'), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        // 'cmb_styles' => true, // Enqueue the CMB stylesheet on the frontend
        'fields'     => array(
            array(
                'name' => __( 'Ordinal numbers', 'beautheme' ),
                'desc' => __( 'Ordinal numbers of service', 'beautheme' ),
                'id'   => $prefix . 'service_number',
                'type' => 'text',
            ),
            array(
                'name' => __( 'Title options full', 'beautheme' ),
                'desc' => __( 'Title of service style full service', 'beautheme' ),
                'id'   => $prefix . 'service_title_full',
                'type' => 'textarea_code',
            ),
            array(
                'name'   => __( 'Image show page service', 'beautheme' ),
                'desc'   => __( 'Upload an image or enter a URL to image.', 'beautheme' ),
                'id'     => $prefix . 'service_img_page',
                'type'   => 'file',
                'allows' => 'url',
            ),
            array(
                'name'   => __( 'Image option show full image', 'beautheme' ),
                'desc'   => __( 'Upload an image or enter a URL to image.', 'beautheme' ),
                'id'     => $prefix . 'service_img_full',
                'type'   => 'file',
                'allows' => 'url',
            ),
            array(
                'name'   => __( 'Image option show odds image', 'beautheme' ),
                'desc'   => __( 'Upload an image or enter a URL to image.', 'beautheme' ),
                'id'     => $prefix . 'service_img_odds',
                'type'   => 'file',
                'allows' => 'url',
            ),
            array(
                'name'   => __( 'Image option show icon', 'beautheme' ),
                'desc'   => __( 'Upload an image or enter a URL to image.', 'beautheme' ),
                'id'     => $prefix . 'service_img_icon',
                'type'   => 'file',
                'allows' => 'url',
            ),
            array(
                'name'   => __( 'Image option show details image', 'beautheme' ),
                'desc'   => __( 'Upload an image or enter a URL to image.', 'beautheme' ),
                'id'     => $prefix . 'service_img_details',
                'type'   => 'file',
                'allows' => 'url',
            ),
            array(
                'name' => __( 'Text of best sellers service', 'beautheme' ),
                'desc' => __( 'Title of best sellers service show in element full service and odds service.', 'beautheme' ),
                'id'   => $prefix . 'service_best',
                'type' => 'text',
            ),
            array(
                'name' => __( 'Description', 'beautheme' ),
                'desc' => __( 'Description of service.', 'beautheme' ),
                'id'   => $prefix . 'service_description',
                'type' => 'textarea',
            ),
            array(
                'name' => __( 'Url book service', 'beautheme' ),
                'desc' => __( 'Link book service', 'beautheme' ),
                'id'   => $prefix . 'service_url',
                'type' => 'text',
            ),
        ),
    );
    

    // Add other metaboxes as needed
    return $meta_boxes;
}

add_action( 'init', 'cmb_initialize_cmb_meta_boxes', 9999 );
/**
 * Initialize the metabox class.
 */
function cmb_initialize_cmb_meta_boxes() {
    if ( ! class_exists( 'cmb_Meta_Box' ) )
        require_once BEAU_PLUGIN_DIR .'/libs/metaboxes/init.php';

}
