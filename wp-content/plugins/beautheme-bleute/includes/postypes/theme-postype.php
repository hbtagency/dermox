<?php
if ( function_exists('add_theme_support') ) {
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'nav_menus' );
    add_theme_support( 'excerpt', array( 'post' ) );
}

if (function_exists('add_post_type_support')) {
    add_post_type_support( 'post', 'excerpt' );
}

if (function_exists('add_action')) {
    add_action('init', 'service_post_type');
    add_action('init', 'experts_post_type');
    add_action('init', 'gallery_post_type');
    add_action('init', 'membership_post_type');
    add_action('init', 'menu_service_post_type');
    add_action( 'init', 'gallery_taxonomy', 0 );
    // add_action('init', 'gallery_archive_rewrite');
}

// Posttype Service
function service_post_type()
{
    $labels = array(
        'name' => _x('Service', 'post type general name', 'bleute'),
        'singular_name' => _x('Service', 'post type singular name', 'bleute'),
        'add_new' => _x('Add New', 'service', 'bleute'),
        'add_new_item' => __('Add new service', 'bleute'),
        'edit_item' => __('Edit service', 'bleute'),
        'new_item' => __('New service', 'bleute'),
        'all_items' => __('All service', 'bleute'),
        'view_item' => __('View service', 'bleute'),
        'search_items' => __('Search service', 'bleute'),
        'not_found' =>  __('No partner Found', 'bleute'),
        'not_found_in_trash' => __('No service Found in Trash', 'bleute'),
        'parent_item_colon' => ''
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_icon' => 'dashicons-clipboard',
        'rewrite' => array('slug' => 'service', 'with_front' => false),
        'query_var' => true,
        'show_in_nav_menus'=> false,
        'supports' => array('title','page-attributes','editor')
    );
    register_post_type( 'service' , $args );
}

// Posttype Experts
function experts_post_type()
{
    $labels = array(
        'name' => _x('Experts', 'post type general name', 'bleute'),
        'singular_name' => _x('Experts', 'post type singular name', 'bleute'),
        'add_new' => _x('Add New', 'experts', 'bleute'),
        'add_new_item' => __('Add new experts', 'bleute'),
        'edit_item' => __('Edit experts', 'bleute'),
        'new_item' => __('New experts', 'bleute'),
        'all_items' => __('All experts', 'bleute'),
        'view_item' => __('View experts', 'bleute'),
        'search_items' => __('Search experts', 'bleute'),
        'not_found' =>  __('No partner Found', 'bleute'),
        'not_found_in_trash' => __('No experts Found in Trash', 'bleute'),
        'parent_item_colon' => ''
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_icon' => 'dashicons-businessman',
        'rewrite' => array('slug' => 'experts', 'with_front' => false),
        'query_var' => true,
        'show_in_nav_menus'=> false,
        'supports' => array('title','page-attributes')
    );
    register_post_type( 'experts' , $args );
}

// Posttype gallery
function gallery_post_type()
{
    $labels = array(
        'name' => _x('Gallery', 'post type general name', 'bebostore'),
        'singular_name' => _x('Gallery', 'post type singular name', 'bebostore'),
        'add_new' => _x('Add New', 'gallery', 'bebostore'),
        'add_new_item' => __('Add new gallery', 'bebostore'),
        'edit_item' => __('Edit gallery', 'bebostore'),
        'new_item' => __('New gallery', 'bebostore'),
        'all_items' => __('All gallery', 'bebostore'),
        'view_item' => __('View gallery', 'bebostore'),
        'search_items' => __('Search gallery', 'bebostore'),
        'not_found' =>  __('No partner Found', 'bebostore'),
        'not_found_in_trash' => __('No gallery Found in Trash', 'bebostore'),
        'parent_item_colon' => ''
    );
    $args = array(
        'labels' => $labels,
        'public' => false,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_icon' => 'dashicons-format-image',
        'rewrite' => array('slug' => 'gallery', 'with_front' => false),
        'query_var' => true,
        'show_in_nav_menus'=> false,
        'supports' => array('title','page-attributes')
    );
    register_post_type( 'gallery' , $args );
}


// Register Custom Taxonomy
function gallery_taxonomy() {

  $labels = array(
    'name'                       => _x( 'Categories', 'Taxonomy General Name', 'bleute' ),
    'singular_name'              => _x( 'Category', 'Taxonomy Singular Name', 'bleute' ),
    'menu_name'                  => __( 'Category gallery', 'bleute' ),
    'all_items'                  => __( 'All Items', 'bleute' ),
    'parent_item'                => __( 'Parent Item', 'bleute' ),
    'parent_item_colon'          => __( 'Parent Item:', 'bleute' ),
    'new_item_name'              => __( 'New Item Name', 'bleute' ),
    'add_new_item'               => __( 'Add New Item', 'bleute' ),
    'edit_item'                  => __( 'Edit Item', 'bleute' ),
    'update_item'                => __( 'Update Item', 'bleute' ),
    'separate_items_with_commas' => __( 'Separate items with commas', 'bleute' ),
    'search_items'               => __( 'Search Items', 'bleute' ),
    'add_or_remove_items'        => __( 'Add or remove items', 'bleute' ),
    'choose_from_most_used'      => __( 'Choose from the most used items', 'bleute' ),
    'not_found'                  => __( 'Not Found', 'bleute' ),
  );
  $args = array(
    'labels'                     => $labels,
    'hierarchical'               => true,
    'public'                     => true,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'show_in_nav_menus'          => true,
    'show_tagcloud'              => true,
  );
  register_taxonomy( 'gallery', array( 'gallery' ), $args );

}

// Hook into the 'init' action
add_action( 'init', 'gallery_taxonomy', 0 );

// function gallery_archive_rewrite(){
//    add_rewrite_rule('^gallery/?','index.php?post_type=gallery&year=$matches[1]&monthnum=$matches[2]','top');
//    add_rewrite_rule('^gallery/?','index.php?post_type=gallery&year=$matches[1]','top');
// }

// Posttype membership
function membership_post_type()
{
    $labels = array(
        'name' => _x('Membership', 'post type general name', 'bebostore'),
        'singular_name' => _x('Membership', 'post type singular name', 'bebostore'),
        'add_new' => _x('Add New', 'membership', 'bebostore'),
        'add_new_item' => __('Add new membership', 'bebostore'),
        'edit_item' => __('Edit membership', 'bebostore'),
        'new_item' => __('New membership', 'bebostore'),
        'all_items' => __('All membership', 'bebostore'),
        'view_item' => __('View membership', 'bebostore'),
        'search_items' => __('Search membership', 'bebostore'),
        'not_found' =>  __('No partner Found', 'bebostore'),
        'not_found_in_trash' => __('No membership Found in Trash', 'bebostore'),
        'parent_item_colon' => ''
    );
    $args = array(
        'labels' => $labels,
        'public' => false,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_icon' => 'dashicons-awards',
        'rewrite' => array('slug' => 'membership', 'with_front' => false),
        'query_var' => true,
        'show_in_nav_menus'=> false,
        'supports' => array('title','page-attributes')
    );
    register_post_type( 'membership' , $args );
}

// Posttype menu
function menu_service_post_type()
{
    $labels = array(
        'name' => _x('Menu service', 'post type general name', 'bebostore'),
        'singular_name' => _x('Menu service', 'post type singular name', 'bebostore'),
        'add_new' => _x('Add New', 'menu service', 'bebostore'),
        'add_new_item' => __('Add new menu service', 'bebostore'),
        'edit_item' => __('Edit menu service', 'bebostore'),
        'new_item' => __('New menu service', 'bebostore'),
        'all_items' => __('All menu service', 'bebostore'),
        'view_item' => __('View menu service', 'bebostore'),
        'search_items' => __('Search menu service', 'bebostore'),
        'not_found' =>  __('No partner Found', 'bebostore'),
        'not_found_in_trash' => __('No menu service Found in Trash', 'bebostore'),
        'parent_item_colon' => ''
    );
    $args = array(
        'labels' => $labels,
        'public' => false,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_icon' => 'dashicons-list-view',
        'rewrite' => array('slug' => 'menu_service', 'with_front' => false),
        'query_var' => true,
        'show_in_nav_menus'=> false,
        'supports' => array('title','page-attributes')
    );
    register_post_type( 'menu_service' , $args );
}
?>