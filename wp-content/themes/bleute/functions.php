<?php
$themeInfo            =  wp_get_theme();
$themeName            = trim($themeInfo['Title']);
$themeAuthor          = trim($themeInfo['Author']);
$themeAuthor_URI      = trim($themeInfo['Author URI']);
$themeVersion         = trim($themeInfo['Version']);

define('BLEUTE_BASE_URL', get_template_directory_uri());
define('BLEUTE_BASE', get_template_directory());
define('BLEUTE_THEME_NAME', $themeName);
define('BLEUTE_TEXT_DOMAIN', 'bleute');
define('BLEUTE_THEME_AUTHOR', $themeAuthor);
define('BLEUTE_THEME_AUTHOR_URI', $themeAuthor_URI);
define('BLEUTE_THEME_VERSION', $themeVersion);
define('BLEUTE_IMAGES', BLEUTE_BASE_URL . '/asset/images');
define('BLEUTE_JS', BLEUTE_BASE_URL . '/asset/js');
define('BLEUTE_CSS', BLEUTE_BASE_URL . '/asset/css');
define('PLUGINS_PATH', 'http://plugins.beautheme.com');
define('PLUGINS_PATH_REQUIRE', BLEUTE_BASE.'/includes/');
define('PLUGINS_PATH_LIBS', BLEUTE_BASE.'/libs/');


//For multiple language
$language_folder = BLEUTE_BASE .'/languages';
load_theme_textdomain( 'bleute', $language_folder );

if (!class_exists('bleute_ThemeFunction')) {
    class bleute_ThemeFunction {

        public function __construct(){
            //Get all file php in include folder
            $this -> bleute_Get_files();
        }
        //Include php
        public function bleute_Get_files(){
            $files = scandir(get_template_directory().'/includes/');
            foreach ($files as $key => $file) {
                if (preg_match("/\.(php)$/", $file)) {
                    require_once(get_template_directory().'/includes/'.$file);
                }
            }
        }
    }
    new bleute_ThemeFunction;
}

if ( ! isset( $content_width ) ) $content_width = 900;
///Beautheme support

function bleute_GetOption($option, $image = FALSE){
    global $bleute_option;
    if (isset($bleute_option[$option])) {
        $option =  $bleute_option[$option];
    }else{
        $option = NULL;
    }
    return $option;
}

// Add theme support for this theme
function bleute_theme_support() {

    add_theme_support( "excerpt", array( "post" ) );
    add_theme_support( "automatic-feed-links" );
    add_theme_support( "post-thumbnails" );
    add_theme_support( "automatic-feed-links" );
    add_theme_support( 'title-tag' );
    add_theme_support( "custom-header", array());
    add_theme_support( "custom-background", array()) ;
    add_editor_style();

    // For thumbnai and size image

    add_image_size('bleute-main-thumbnail-blog','970','570', true);
    add_image_size('bleute-blog-slide-thumbnail', '230', '150', TRUE );
    add_image_size('bleute-thumbnail', '400', '500', TRUE );
    add_image_size('bleute-thumbnail-height', '600', '400', TRUE );
    add_image_size('bleute-thumbnail-blog', '265', '170', TRUE );
    add_image_size('bleute-service-detail', '1920', '600', TRUE );
    add_image_size('bleute-service-detail-gallery', '270', '230', TRUE );

    // Theme support with nav menu
    add_theme_support( "nav-menus" );
    $nav_menus['main-menu'] = esc_html__( 'Main menu', 'bleute');
    register_nav_menus( $nav_menus );
}
add_action( 'after_setup_theme', 'bleute_theme_support' );

if ( ! function_exists( 'bleute_fonts_url' ) ) :
function bleute_fonts_url() {
    $fonts_url = '';
    $fonts     = array();
    $subsets   = 'latin,latin-ext';

    /*
     * Translators: If there are characters in your language that are not supported
     * by Lato, translate this to 'off'. Do not translate into your own language.
     */
    if ( 'off' !== _x( 'on', 'Lato font: on or off', 'bleute' ) ) {
        $fonts[] = 'Lato:100,300,400,700,900';
    }

    /*
     * Translators: If there are characters in your language that are not supported
     * by Oswald, translate this to 'off'. Do not translate into your own language.
     */
    if ( 'off' !== _x( 'on', 'Oswald font: on or off', 'bleute' ) ) {
        $fonts[] = 'Oswald:300,400,700';
    }

    /*
     * Translators: To add an additional character subset specific to your language,
     * translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language.
     */
    $subset = _x( 'no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'bleute' );

    if ( 'cyrillic' == $subset ) {
        $subsets .= ',cyrillic,cyrillic-ext';
    } elseif ( 'greek' == $subset ) {
        $subsets .= ',greek,greek-ext';
    } elseif ( 'devanagari' == $subset ) {
        $subsets .= ',devanagari';
    } elseif ( 'vietnamese' == $subset ) {
        $subsets .= ',vietnamese';
    }

    if ( $fonts ) {
        $fonts_url = add_query_arg( array(
            'family' => urlencode( implode( '|', $fonts ) ),
            'subset' => urlencode( $subsets ),
        ), 'https://fonts.googleapis.com/css' );
    }

    return $fonts_url;
}
endif;

function bleute_scripts(){
    // Lib jquery
    if (!is_admin()) {
        $site_color = bleute_GetOption('bleute-style');
        $value_color = get_post_meta( get_the_ID(), '_beautheme_color_custom', TRUE );
        $value_style_woo = bleute_GetOption('style-shop');

        if ($value_style_woo == 'list-grid') {
            remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating',5);
            add_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_rating',5);
        }
        if ($value_style_woo == 'list-grid-custom') {
            remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart',5);
            add_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_add_to_cart',15);
            add_filter( 'woocommerce_product_add_to_cart_text', 'bleu_woo_archive_custom_cart_button_text' );    // 2.1 +
 
            function bleu_woo_archive_custom_cart_button_text() {
                    return esc_html__( 'Add to cart', 'bleute' );
            }
        }
        if ($value_style_woo == 'full') {
            function bleu_woo_archive_custom_cart_button_text() {
                    return esc_html__( 'Buy now', 'bleute' );
            }
        }
        wp_enqueue_style( 'bleute-fonts', bleute_fonts_url(), array(), null );
        
        if (!is_404()) {
            wp_enqueue_script('jquery-idangerous', BLEUTE_JS .'/swiper.min.js', array('jquery'), '3.2.0', FALSE);
            wp_enqueue_script('jquery-modernizr', BLEUTE_JS .'/modernizr.js', array('jquery'), '2.7.1', TRUE);
            wp_enqueue_script('bootstrap',  BLEUTE_JS .'/bootstrap.min.js', array('jquery'), '3.3.1', FALSE);
            wp_enqueue_script('jquery-wow', BLEUTE_JS .'/wow.min.js', array('jquery'), '1.0.3', FALSE);
             wp_enqueue_script('jquery-back-to-top', BLEUTE_JS .'/back-to-top.js', array('jquery'), '1.0.0', TRUE);
            //check menu fix
            if (bleute_GetOption('header-fixed')!= NULL) {
                wp_enqueue_script('jquery-menufix',  BLEUTE_JS .'/sticker-menu.js', array('jquery'), '1.0.0', TRUE);
            }

            //js scroll
            wp_enqueue_script('jquery-TweenMax', BLEUTE_JS .'/TweenMax.min.js', array('jquery'), '1.0.0', TRUE);
            wp_enqueue_script('jquery-ScrollToPlugin', BLEUTE_JS .'/ScrollToPlugin.min.js', array('jquery'), '1.0.0', TRUE);

            //js site
            wp_enqueue_script('jquery-book-app', BLEUTE_JS .'/bleute.js', array('jquery'), '1.0.1', TRUE);
        
            wp_enqueue_style('css-font-awesome', BLEUTE_CSS .'/font-awesome.min.css', array(), '4.3.0');
            wp_enqueue_style('css-idangerous', BLEUTE_CSS .'/swiper.min.css', array(), BLEUTE_THEME_VERSION);
            wp_enqueue_style('css-animate', BLEUTE_CSS .'/animate.css', array(), '3.3.1');
        }
        wp_enqueue_style('css-bootstrap', BLEUTE_CSS .'/bootstrap.css', array(), '3.3.1');
        
        wp_enqueue_style('css-default-style', BLEUTE_CSS .'/bleute.css', array(), BLEUTE_THEME_VERSION);
        if ($value_color == 'brown' || $site_color == 'brown') {
            wp_enqueue_style('css-brown-style', BLEUTE_CSS .'/style_brown.css', array(), BLEUTE_THEME_VERSION);
        }
        if ($value_color == 'dark' || $site_color == 'dark') {
            wp_enqueue_style('css-dark-style', BLEUTE_CSS .'/style_dark.css', array(), BLEUTE_THEME_VERSION);
        }
        if ($value_color == 'pink' || $site_color == 'pink') {
            wp_enqueue_style('css-pink-style', BLEUTE_CSS .'/style_pink.css', array(), BLEUTE_THEME_VERSION);
        }
        if (is_admin()) {
            
        }
    }
}
add_action( 'wp_enqueue_scripts', 'bleute_scripts' );

add_action('admin_head', 'bleute_css_backend');

function bleute_css_backend() {
  echo '<style>
    #setting-error-bleute{
        display: block;
    }
  </style>';
}

//Theme menu
register_nav_menus(array(
    'main-menu'     => esc_html__('Main menu', 'bleute'),
    'mobile-menu'    => esc_html__('Mobile Menu', 'bleute'),
    'small-menu'    => esc_html__('Small Menu', 'bleute'),
));


// Numbered Pagination
if ( !function_exists( 'bleute_pagination' ) ) {
    function bleute_pagination($loop='', $range = 4) {
        global $wp_query;
        if ($loop=="") {
            $loop = $wp_query;
        }
        $big = 999999999; // need an unlikely integer
        $pages = paginate_links( array(
            'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format'    => '?paged=%#%',
            'current'   => max( 1, get_query_var('paged') ),
            'total'     => $loop->max_num_pages,
            'prev_next' => false,
            'type'      => 'array',
            'prev_next' => TRUE,
            'prev_text' => esc_html__('PREV','bleute'),
            'next_text' => esc_html__('NEXT','bleute'),
        ) );
        if( is_array( $pages ) ) {
            $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
            echo '<div class="pagging"><ul>';
            foreach ( $pages as $page ) {
                echo "<li>$page</li>";
            }
           echo '</ul></div>';
        }
    }

}

/*
Register WIDGETS
*/

////Register widget for page
function bleute_register_sidebar() {

    $col = $sidebarWidgets = "";

    //Register sidebar for sidebar widget
    register_sidebar(
        array(
            'name' => esc_html__('Sidebar widget', 'bleute' ),
            'id' => 'sidebar-widget',
            'before_widget' => '<div class="sidebar-widget">',
            'after_widget' => '</div></div>',
            'before_title' => '<div class="title-box title-sidebar-widget"><span>',
            'after_title' => '</span></div><div class="sidebar-content-widget">'
        )
    );

    register_sidebar(array(
        'name'          => esc_html__('Sidebar Product','bleute'),
        'id'            => 'sidebar-product',
        'description'   => esc_html__('Sidebar product widget position.','bleute'),
        'before_widget' => '<div id="%1$s" class="sidebar-widget col-md-3 col-sm-3 col-xs-12">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>'
    ));

    //Register to show sidebar on footer
    if (bleute_GetOption('footer-widget-number')!= NULL) {
        $col    = intval(bleute_GetOption('footer-widget-number'));
    }
    if($col==0){
        $col  = 5;
    }
    $columns = intval(10/$col);
    if($columns==1){
        register_sidebar(
            array(  // 1
                'name' => esc_html__( 'Footer sidebar', 'bleute' ),
                'description' => esc_html__( 'This is footer sidebar ', 'bleute' ),
                'id' => 'sidebar-footer-1',
                'before_widget' => '<div class="footer-column col-md-12 col-sm-12 col-xs-12"><div class="footer-widget">',
                'after_widget' => '</div></div></div>',
                'before_title' => '<div class="title-box widget-title"><span>',
                'after_title' => '</span></div><div class="widget-body">'
            )
        );
    }else{
        for ($i=1; $i <= $col; $i++) {
            register_sidebar(
                array(
                    'name' => 'Footer sidebar '.$i,
                    'id' => 'sidebar-footer-'.$i,
                    'before_widget' => '<div class="footer-column col-md-'.$columns.' col-sm-'.$columns.' col-xs-12"><div class="footer-widget">',
                    'after_widget' => '</div></div></div>',
                    'before_title' => '<div class="title-box widget-title"><span>',
                    'after_title' => '</span></div><div class="widget-body">'
                )
            );
        }
    }

}
add_action( 'widgets_init', 'bleute_register_sidebar' );

//Custom placeholder
add_filter( 'woocommerce_checkout_fields' , 'bleute_override_checkout_fields' );

// Our hooked in function - $fields is passed via the filter!
function bleute_override_checkout_fields( $fields ) {
     $fields['order']['order_comments']['placeholder'] = 'Order note';
     $fields['order']['order_comments']['label'] = '';

     $fields['shipping']['shipping_company']['placeholder'] = 'Company Name';
     $fields['shipping']['shipping_company']['label'] = '';
     $fields['shipping']['shipping_first_name']['placeholder'] = 'First Name';
     $fields['shipping']['shipping_first_name']['label'] = '';
     $fields['shipping']['shipping_last_name']['placeholder'] = 'Last Name';
     $fields['shipping']['shipping_last_name']['label'] = '';
     $fields['shipping']['shipping_address_1']['placeholder'] = 'Address';
     $fields['shipping']['shipping_address_1']['label'] = '';
     $fields['shipping']['shipping_address_2']['placeholder'] = 'Address';
     $fields['shipping']['shipping_address_2']['label'] = '';
     $fields['shipping']['shipping_postcode']['placeholder'] = 'Post/Zip code';
     $fields['shipping']['shipping_postcode']['label'] = '';
     $fields['shipping']['shipping_city']['placeholder'] = 'Town/City';
     $fields['shipping']['shipping_city']['label'] = '';
     $fields['shipping']['shipping_state']['placeholder'] = 'State / County';
     $fields['shipping']['shipping_state']['label'] = '';

     $fields['billing']['billing_first_name']['placeholder'] = 'First Name';
     $fields['billing']['billing_first_name']['label'] = '';
     $fields['billing']['billing_last_name']['placeholder'] = 'Last Name';
     $fields['billing']['billing_last_name']['label'] = '';
     $fields['billing']['billing_company']['placeholder'] = 'Company Name';
     $fields['billing']['billing_company']['label'] = '';
     $fields['billing']['billing_email']['placeholder'] = 'Email';
     $fields['billing']['billing_email']['label'] = '';
     $fields['billing']['billing_phone']['placeholder'] = 'Phone';
     $fields['billing']['billing_phone']['label'] = '';
     $fields['billing']['billing_address_1']['placeholder'] = 'Address';
     $fields['billing']['billing_address_1']['label'] = '';
     $fields['billing']['billing_address_2']['placeholder'] = 'Phone';
     $fields['billing']['billing_address_2']['label'] = '';
     $fields['billing']['billing_postcode']['placeholder'] = 'Postcode';
     $fields['billing']['billing_postcode']['label'] = '';
     $fields['billing']['billing_city']['placeholder'] = 'Town/City';
     $fields['billing']['billing_city']['label'] = '';
     $fields['billing']['billing_state']['placeholder'] = 'State / County';
     $fields['billing']['billing_state']['label'] = '';
     return $fields;
}

// check for empty-cart get param to clear the cart
add_action( 'init', 'bleute_woocommerce_clear_cart_url' );
function bleute_woocommerce_clear_cart_url() {
  global $woocommerce;
    
    if ( isset( $_GET['empty-cart'] ) ) {
        $woocommerce->cart->empty_cart(); 
    }
}

remove_action('woocommerce_single_product_summary', 'woocommerce_template_loop_rating',5);
add_action('woocommerce_single_product_summary', 'woocommerce_template_loop_rating',5);

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta',40);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta',1);

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt',20);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt',30);


add_filter( 'woocommerce_output_related_products_args', 'bleute_related_products_args' );
function bleute_related_products_args( $args ) {
    $args['posts_per_page'] = 8; // 4 related products
    $args['columns'] = 0; // arranged in 2 columns
    return $args;
}


add_action( 'after_setup_theme', 'bleute_woocommerce_support' );
function bleute_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

if ( ! function_exists( 'bleute_main_menu' ) ) {
  function bleute_main_menu( $slug ) {
    $menu = array(
      'theme_location' => $slug,
      'menu_class'    => 'default col-md-12 col-sm-12 hidden-xs',
      'menu_id'       => 'main-navigation',
      'container' => 'nav',
      'container_class' => $slug,
    );
    wp_nav_menu( $menu );
  }
}

?>