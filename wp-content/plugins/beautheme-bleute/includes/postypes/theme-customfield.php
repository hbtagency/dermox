<?php
//Some custom field for post and books
define( 'ACF_LITE', false );
if( !function_exists( 'register_field_group' ) ) {
    if (file_exists(BEAU_PLUGIN_DIR. '/libs/advanced-custom-fields/acf.php')) {
        require_once(BEAU_PLUGIN_DIR. '/libs/advanced-custom-fields/acf.php');
    }
}

//Repeater menu service
if(function_exists("register_field_group"))
{
    register_field_group(array (
        'id' => 'acf_menu',
        'title' => 'Menu',
        'fields' => array (
            array (
                'key' => 'field_menu_service',
                'label' => 'Menu service',
                'name' => 'menu_service',
                'type' => 'repeater',
                'required' => 1,
                'sub_fields' => array (
                    array (
                        'key' => 'field_name_service',
                        'label' => 'Name of service',
                        'name' => 'name_of_service',
                        'type' => 'text',
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'html',
                        'maxlength' => '',
                    ),
                    array (
                        'key' => 'field_time_service',
                        'label' => 'Time of service',
                        'name' => 'time_of_service',
                        'type' => 'text',
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'html',
                        'maxlength' => '',
                    ),
                    array (
                        'key' => 'field_price_service',
                        'label' => 'Price of service',
                        'name' => 'price_of_service',
                        'type' => 'text',
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'html',
                        'maxlength' => '',
                    ),
                ),
                'row_min' => '',
                'row_limit' => '',
                'layout' => 'table',
                'button_label' => 'Add Row',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'menu_service',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array (
            'position' => 'normal',
            'layout' => 'no_box',
            'hide_on_screen' => array (
            ),
        ),
        'menu_order' => 0,
    ));
}

//Repeater sub field membership
if(function_exists("register_field_group"))
{
    register_field_group(array (
        'id' => 'acf_membership',
        'title' => 'Membership',
        'fields' => array (
            array (
                'key' => 'field_membership',
                'label' => 'Sub field membership',
                'name' => 'membership_page',
                'type' => 'repeater',
                'sub_fields' => array (
                    array (
                        'key' => 'field_subfield',
                        'label' => 'Sub field membership',
                        'name' => 'sub_field_membership',
                        'type' => 'text',
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'html',
                        'maxlength' => '',
                    ),
                ),
                'row_min' => '',
                'row_limit' => '',
                'layout' => 'table',
                'button_label' => 'Add Row',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'membership',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array (
            'position' => 'normal',
            'layout' => 'no_box',
            'hide_on_screen' => array (
            ),
        ),
        'menu_order' => 0,
    ));
}

//Repeater gallery images service
if(function_exists("register_field_group"))
{
    register_field_group(array (
        'id' => 'acf_service',
        'title' => 'Service',
        'fields' => array (
            array (
                'key' => 'field_gallery',
                'label' => 'Gallery images',
                'name' => 'gallery_images',
                'type' => 'repeater',
                'sub_fields' => array (
                    array (
                        'key' => 'field_gallery_image',
                        'label' => 'Images',
                        'name' => 'images',
                        'type' => 'image',
                        'column_width' => '',
                        'save_format' => 'object',
                        'preview_size' => 'thumbnail',
                        'library' => 'all',
                    ),
                ),
                'row_min' => '',
                'row_limit' => '',
                'layout' => 'table',
                'button_label' => 'Add Row',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'service',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array (
            'position' => 'normal',
            'layout' => 'no_box',
            'hide_on_screen' => array (
            ),
        ),
        'menu_order' => 0,
    ));
}

//Select menu service
if(function_exists("register_field_group"))
{
    register_field_group(array (
        'id' => 'acf_select-menu',
        'title' => 'Select menu',
        'fields' => array (
            array (
                'key' => 'field_descripiton_post',
                'label' => 'Descripiton post',
                'name' => 'descripiton_post',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_content_description',
                'label' => 'Description of service',
                'name' => 'description_content_description',
                'type' => 'wysiwyg',
                'default_value' => '',
                'toolbar' => 'full',
                'media_upload' => 'yes',
            ),
            array (
                'key' => 'field_title_content_left',
                'label' => 'Title Content Left',
                'name' => 'title_content_left',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_content_left',
                'label' => 'Description of content left',
                'name' => 'description_content_left',
                'type' => 'wysiwyg',
                'default_value' => '',
                'toolbar' => 'full',
                'media_upload' => 'yes',
            ),
            array (
                'key' => 'field_title_content_right',
                'label' => 'Title Content right',
                'name' => 'title_content_right',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_contents_right',
                'label' => 'Description of content right',
                'name' => 'description_content_right',
                'type' => 'wysiwyg',
                'default_value' => '',
                'toolbar' => 'full',
                'media_upload' => 'yes',
            ),
            array (
                'key' => 'field_image_left',
                'label' => 'Images content left',
                'name' => 'image_left',
                'type' => 'image',
                'save_format' => 'url',
                'preview_size' => 'thumbnail',
                'library' => 'all',
            ),
            array (
                'key' => 'field_image_right',
                'label' => 'Images content right',
                'name' => 'image_right',
                'type' => 'image',
                'save_format' => 'url',
                'preview_size' => 'thumbnail',
                'library' => 'all',
            ),
            array (
                'key' => 'field_select_menu',
                'label' => 'Select menu',
                'name' => 'select_menu',
                'type' => 'relationship',
                'instructions' => __('You can chose multimple menu for this service. If you forget create click Menu to create it','beautheme'),
                'return_format' => 'object',
                'post_type' => array (
                    0 => 'menu_service',
                ),
                'taxonomy' => array (
                    0 => 'all',
                ),
                'filters' => array (
                    0 => 'search',
                ),
                'result_elements' => array (
                    0 => 'post_type',
                    1 => 'post_title',
                ),
                'max' => '',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'service',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array (
            'position' => 'normal',
            'layout' => 'no_box',
            'hide_on_screen' => array (
            ),
        ),
        'menu_order' => 0,
    ));
}

//Field group
if(function_exists("register_field_group"))
{
    register_field_group(array (
        'id' => 'acf_about',
        'title' => 'About',
        'fields' => array (
            array (
                'key' => 'field_title_about',
                'label' => 'Title about',
                'name' => 'title_about',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_subtitle_about',
                'label' => 'Subtitle about',
                'name' => 'subtitle_about',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_description_about',
                'label' => 'Description about',
                'name' => 'description_about',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_reward',
                'label' => 'Reward',
                'name' => 'reward',
                'type' => 'image',
                'save_format' => 'url',
                'preview_size' => 'thumbnail',
                'library' => 'all',
            ),
            array (
                'key' => 'field_title_introduce',
                'label' => 'Title Introduce',
                'name' => 'title_introduce',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_description_of_introduce',
                'label' => 'Description of Introduce',
                'name' => 'description_of_introduce',
                'type' => 'wysiwyg',
                'default_value' => '',
                'toolbar' => 'full',
                'media_upload' => 'yes',
            ),
            array (
                'key' => 'field_description_left_of_introduce',
                'label' => 'Description left of Introduce',
                'name' => 'description_left_of_introduce',
                'type' => 'wysiwyg',
                'default_value' => '',
                'toolbar' => 'full',
                'media_upload' => 'yes',
            ),
            array (
                'key' => 'field_image_description_left_of_introduce',
                'label' => 'Image description left of Introduce',
                'name' => 'image_description_left_of_introduce',
                'type' => 'image',
                'save_format' => 'url',
                'preview_size' => 'thumbnail',
                'library' => 'all',
            ),
            array (
                'key' => 'field_description_right_of_introduce',
                'label' => 'Description right of Introduce',
                'name' => 'description_right_of_introduce',
                'type' => 'wysiwyg',
                'default_value' => '',
                'toolbar' => 'full',
                'media_upload' => 'yes',
            ),
            array (
                'key' => 'field_image_description_right_of_introduce',
                'label' => 'Image description right of Introduce',
                'name' => 'image_description_right_of_introduce',
                'type' => 'image',
                'save_format' => 'url',
                'preview_size' => 'thumbnail',
                'library' => 'all',
            ),
            array (
                'key' => 'field_title_content_bottom',
                'label' => 'Title content bottom',
                'name' => 'title_content_bottom',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_content_bottom',
                'label' => 'Content bottom',
                'name' => 'content_bottom',
                'type' => 'wysiwyg',
                'default_value' => '',
                'toolbar' => 'full',
                'media_upload' => 'yes',
            ),
            array (
                'key' => 'field_thanks',
                'label' => 'Images bottom',
                'name' => 'thanks',
                'type' => 'image',
                'save_format' => 'url',
                'preview_size' => 'thumbnail',
                'library' => 'all',
            ),
            array (
                'key' => 'field_title_email',
                'label' => 'Title email left',
                'name' => 'title_email',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_description_email',
                'label' => 'Description email left',
                'name' => 'description_email',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_title_social',
                'label' => 'Title social left',
                'name' => 'title_social',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_description_social',
                'label' => 'Description social left',
                'name' => 'description_social',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_title_address',
                'label' => 'Title address left',
                'name' => 'title_address',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_description_address',
                'label' => 'Description address left',
                'name' => 'description_address',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'templates/template-about.php',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array (
            'position' => 'acf_after_title',
            'layout' => 'default',
            'hide_on_screen' => array (
            ),
        ),
        'menu_order' => 0,
    ));
}

$args = array('post_type' => 'wpcf7_contact_form', 'posts_per_page' => -1);
$cf7Forms = get_posts( $args );
$list_form = '';
if( $cf7Forms) {
  foreach($cf7Forms as $cf7Form){
    $form_name = $cf7Form->post_title;
    $form_ID = $cf7Form->ID;
    $list_form[$form_ID] = $form_name;
  }
}
//Field Contact
if(function_exists("register_field_group"))
{
    register_field_group(array (
        'id' => 'acf_contact',
        'title' => 'Contact',
        'fields' => array (
            array (
                'key' => 'field_title_contact',
                'label' => 'Title contact',
                'name' => 'title_contact',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_description_contact',
                'label' => 'Description contact',
                'name' => 'description_contact',
                'type' => 'wysiwyg',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_lat_of_map_contact',
                'label' => 'Lat of map contact',
                'name' => 'lat_of_map_contact',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_lng_of_map_contact',
                'label' => 'Long of map contact',
                'name' => 'lng_of_map_contact',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_title_email',
                'label' => 'Title email left',
                'name' => 'title_email',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_description_email',
                'label' => 'Description email left',
                'name' => 'description_email',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_title_social',
                'label' => 'Title social left',
                'name' => 'title_social',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_description_social',
                'label' => 'Description social left',
                'name' => 'description_social',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_title_address',
                'label' => 'Title address left',
                'name' => 'title_address',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_description_address',
                'label' => 'Description address left',
                'name' => 'description_address',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_title_form_contact',
                'label' => 'Title form contact',
                'name' => 'title_form_contact',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_select_form_contact',
                'label' => 'Select form contact',
                'name' => 'select_form_contact',
                'type' => 'select',
                'choices' => $list_form,
                'default_value' => '',
                'allow_null' => 0,
                'multiple' => 0,
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'templates/template-contact.php',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array (
            'position' => 'acf_after_title',
            'layout' => 'default',
            'hide_on_screen' => array (
            ),
        ),
        'menu_order' => 0,
    ));
}

if(function_exists("register_field_group"))
{
    register_field_group(array (
        'id' => 'acf_subcontent-product',
        'title' => 'Subcontent product',
        'fields' => array (
            array (
                'key' => 'field_sub_content',
                'label' => 'Sub content show',
                'name' => 'sub_content',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'product',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array (
            'position' => 'normal',
            'layout' => 'no_box',
            'hide_on_screen' => array (
            ),
        ),
        'menu_order' => 0,
    ));
}

if(function_exists("register_field_group"))
{
    register_field_group(array (
        'id' => 'acf_contact-form',
        'title' => 'Contact form',
        'fields' => array (
            array (
                'key' => 'field_select_form_contact',
                'label' => 'Select form contact',
                'name' => 'select_form_contact',
                'type' => 'select',
                'choices' => array (
                ),
                'default_value' => '',
                'allow_null' => 0,
                'multiple' => 0,
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'post',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array (
            'position' => 'normal',
            'layout' => 'no_box',
            'hide_on_screen' => array (
            ),
        ),
        'menu_order' => 0,
    ));
}

if(function_exists("register_field_group"))
{
    register_field_group(array (
        'id' => 'acf_gallery-slide',
        'title' => 'Gallery slide',
        'fields' => array (
            array (
                'key' => 'field_gallery_slide',
                'label' => 'Gallery Slide',
                'name' => 'gallery_slide',
                'type' => 'repeater',
                'instructions' => 'Only work if you choose gallery type slide.',
                'sub_fields' => array (
                    array (
                        'key' => 'field_images_slide',
                        'label' => 'Images Slide',
                        'name' => 'images_slide',
                        'type' => 'image',
                        'column_width' => '',
                        'save_format' => 'object',
                        'preview_size' => 'thumbnail',
                        'library' => 'all',
                    ),
                ),
                'row_min' => '',
                'row_limit' => '',
                'layout' => 'table',
                'button_label' => 'Add Row',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'gallery',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array (
            'position' => 'normal',
            'layout' => 'default',
            'hide_on_screen' => array (
            ),
        ),
        'menu_order' => 0,
    ));
}

if(function_exists("register_field_group"))
{
    register_field_group(array (
        'id' => 'acf_membership-2',
        'title' => 'Membership',
        'fields' => array (
            array (
                'key' => 'field_title_contact',
                'label' => 'Title contact',
                'name' => 'title_contact',
                'type' => 'wysiwyg',
                'default_value' => '',
                'toolbar' => 'full',
                'media_upload' => 'yes',
            ),
            array (
                'key' => 'field_sub_title_contact',
                'label' => 'Sub title contact',
                'name' => 'sub_title_contact',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_id_contact_form',
                'label' => 'Id contact form',
                'name' => 'id_contact_form',
                'type' => 'number',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'min' => '',
                'max' => '',
                'step' => '',
            ),
            array (
                'key' => 'field_content_right',
                'label' => 'Content right',
                'name' => 'content_right',
                'type' => 'repeater',
                'sub_fields' => array (
                    array (
                        'key' => 'field_title-text',
                        'label' => 'Title-text',
                        'name' => 'title-text',
                        'type' => 'text',
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'html',
                        'maxlength' => '',
                    ),
                    array (
                        'key' => 'field_content-text',
                        'label' => 'Content-text',
                        'name' => 'content-text',
                        'type' => 'wysiwyg',
                        'column_width' => '',
                        'default_value' => '',
                        'toolbar' => 'full',
                        'media_upload' => 'yes',
                    ),
                ),
                'row_min' => '',
                'row_limit' => '',
                'layout' => 'row',
                'button_label' => 'Add Row',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'templates/template-membership.php',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array (
            'position' => 'normal',
            'layout' => 'no_box',
            'hide_on_screen' => array (
            ),
        ),
        'menu_order' => 0,
    ));
}

?>