<?php
// GET FEATURED IMAGE
add_image_size('featured_preview', 55, 55, true);
function beau_get_featured_image($post_ID) {
    $post_thumbnail_id = get_post_thumbnail_id($post_ID);
    if ($post_thumbnail_id) {
        $post_thumbnail_img = wp_get_attachment_image_src($post_thumbnail_id, 'featured_preview');
        return $post_thumbnail_img[0];
    }
}

// ADD NEW COLUMN
function beau_columns_head($defaults) {
    $defaults['featured_image'] = __('Images','beautheme');
    return $defaults;
}

// SHOW THE FEATURED IMAGE
function beau_columns_content($column_name, $post_ID) {
    if ($column_name == 'featured_image') {
        $post_featured_image = beau_get_featured_image($post_ID);
        if ($post_featured_image) {
            echo '<img src="' . $post_featured_image . '" />';
        }
    }
}

add_filter('manage_posts_columns', 'beau_columns_head');
add_action('manage_posts_custom_column', 'beau_columns_content', 10, 2);

 ?>