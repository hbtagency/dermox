<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if( !class_exists( 'ReduxFramewrk' ) ) {
        if (file_exists( BEAU_PLUGIN_DIR. '/libs/ReduxCore/framework.php')) {
            require_once( BEAU_PLUGIN_DIR. '/libs/ReduxCore/framework.php' );
        }
    }
    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    $archive_page = $mailchimp_list = $custom_header = $custom_footer ="";

    //Columns
    $beau_column = array();
    for($i=1; $i<=5; $i++){
        $beau_column[$i] = $i;
    }
    $custom_header = array(
        'default'           => 'Default',
        'shipping'    => 'Shipping',
        'full-width'    => 'Full width',
        'none-slide'           => 'none-slide',
    );
    
    //Color array
    $custom_color = array(
        ''              => 'Default blue',
        'brown'       => 'Brown',
        'pink'         => 'Pink',
        'dark'       => 'Dark',
    );

    //Shop style
    $style_shop = array(
        'list-grid'       => 'List Grid',
        'list-grid-custom'         => 'List Grid Custom',
        'full'              => 'Full',
    );

    //Archive
    $archive_page = array(
        'postcatstandard' => __('Full page with title and description','beautheme'),
        'postcattags'     => __('Layout with sidebar','beautheme'),
    );

    //Beau perpage
    $beau_perpage = array('-1'=>'Show all');
    for($i=1; $i<=50; $i++){
        $beau_perpage[$i] = $i;
    }

    //Style Array
    $style_array = array(
        ''              => __('Light','beautheme'),
        'classic.css'   => __('Classic','beautheme'),
        'dark.css'      => __('Dark','beautheme'),
        'formal.css'    => __('Formal','beautheme'),
        'pastel.css'    => __('Pastel','beautheme'),
        'dj.css'        => __('DJ','beautheme'),
        'hiphop.css'    => __('Hip hop','beautheme')
    );

    // Sidebar list
    $sidebar_list = array(
        '1'  => __('One widget','beautheme'),
        '2'  => __('Two widgets','beautheme'),
        '3'  => __('Three widgets','beautheme'),
        '4'  => __('Four widgets','beautheme'),
        '5'  => __('Five widgets','beautheme'),
        '6'  => __('Six widgets','beautheme'),
    );

    // Social list
    $social_list = array(
        'facebook'      => 'Facebook',
        'twitter'       => 'Twitter',
        'google-plus'   => 'Google Plus',
        'pinterest'     => 'Pinterest',
    );

    //Custom footer
    $custom_footer = array(
        'default'     => __('Footer twitter','beautheme'),
        'column'    => __('Footer columns','beautheme'),
        'none'    => __('Footer none','beautheme'),
    );

    //Get all page
    $allPage = array();
    $args = array(
        'sort_order' => 'asc',
        'sort_column' => 'post_title',
        'post_type' => 'page',
        'post_status' => 'publish'
    );
    $pages = get_pages($args);
    wp_reset_postdata();
    foreach ($pages as $page) {
        $allPage[$page->post_name] = $page->post_title;
    }

    // This is your option name where all the Redux data is stored.
    $opt_name = "bleute_option";


    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => false,
        // Show the sections below the admin menu item or not
        'menu_title'           => __( 'Theme Options', 'beau-theme-setting' ),
        'page_title'           => __( 'Theme Options', 'beau-theme-setting' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => false,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    // ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.
    $args['admin_bar_links'][] = array(
        'id'    => 'redux-docs',
        'href'  => 'http://docs.beautheme.com/bleute/',
        'title' => __( 'Documentation','bleute' ),
    );

    $args['admin_bar_links'][] = array(
        //'id'    => 'redux-support',
        'href'  => 'http://support.beautheme.com/',
        'title' => __( 'Support Team','bleute' ),
    );

    // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
    $args['share_icons'][] = array(
        'url'   => 'https://www.facebook.com/beautheme',
        'title' => 'Like us on Facebook',
        'icon'  => 'el el-facebook'
    );
    $args['share_icons'][] = array(
        'url'   => 'http://twitter.com/Beauthemes',
        'title' => 'Follow us on Twitter',
        'icon'  => 'el el-twitter'
    );
    $args['share_icons'][] = array(
        'url'   => 'http://behance.net/beautheme',
        'title' => 'Find us on behance',
        'icon'  => 'el el-behance'
    );
    $args['share_icons'][] = array(
        'url'   => 'https://dribbble.com/beauvn',
        'title' => 'Find us on dribbble',
        'icon'  => 'el el-dribbble'
    );

    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
        //$args['intro_text'] = sprintf( __( '<p>Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: <strong>$%1$s</strong></p>','bleute' ), $v );
    } else {
        //$args['intro_text'] = __( '<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>','bleute' );
    }

    // Add content after the form.
    $args['footer_text'] = __( '<p>Thanks for used our theme <a href="http://beautheme.com" target="_blank  ">Beau Theme</a>.</p>','bleute' );

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */


    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => __( 'Theme Information 1','bleute' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>','bleute' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => __( 'Theme Information 2','bleute' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>','bleute' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = __( '<p>This is the sidebar content, HTML is allowed.</p>','bleute' );
    Redux::setHelpSidebar( $opt_name, $content );



    // -> START General option
    Redux::setSection( $opt_name, array(
        'title'            => __( 'General setting','bleute' ),
        'id'               => 'general',
        'desc'             => __( 'These are something setting for all page!','bleute' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-cogs',
    ) );

    Redux::setSection( $opt_name, array(
        'title'            => __( 'General options','bleute' ),
        'id'               => 'general-options',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'       => 'bleute-logo',
                'type'     => 'media',
                'url'      => true,
                'title'    => __( 'Upload logo', 'beautheme' ),
                'compiler' => 'true',
                'subtitle' => __( 'Upload any image using the WordPress native uploader', 'beautheme' ),
            ),
            array(
                'id'       => 'bleute-style',
                'type'     => 'select',
                'title'    => __( 'Change website color', 'beautheme' ),
                'subtitle' => __( 'Select your color with our style defined.', 'beautheme' ),
                'options'  => $custom_color,
                'default'  => '',
            ),
        )
    ) );
    // -> START shop option
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Shop setting','bleute' ),
        'id'               => 'shop',
        'customizer_width' => '500px',
        'icon'             => 'el el-shopping-cart',
    ) );
    // Chon kieu trang archive
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Page shop options','bleute' ),
        'id'               => 'shop-options',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'       => 'style-shop',
                'type'     => 'select',
                'title'    => __( 'Chose style page shop','bleute' ),
                'subtitle' => __( 'Style page shop will show','bleute' ),
                'options'  => $style_shop,
                'default'  => '',
            ),

        )
    ) );

//Social setting
// -> START blog option
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Social setting','bleute' ),
        'id'               => 'social',
        'customizer_width' => '500px',
        'icon'             => 'el el-thumbs-up',
    ) );



    Redux::setSection( $opt_name, array(
        'title'            => __( 'Social link','bleute' ),
        'id'               => 'social-link',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'       => 'beau-facebook',
                'type'     => 'text',
                'title'    => __( 'Your facebook url','bleute' ),
            ),
            array(
                'id'       => 'beau-twitter',
                'type'     => 'text',
                'title'    => __( 'Your twitter url','bleute' ),
            ),
            array(
                'id'       => 'beau-google-plus',
                'type'     => 'text',
                'title'    => __( 'Your google plus url','bleute' ),
            ),
            array(
                'id'       => 'beau-pinterest',
                'type'     => 'text',
                'title'    => __( 'Your pinterest url','bleute' ),
            ),

        )
    ) );


    
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Mailchimp API','bleute' ),
        'id'               => 'social-mailchimp',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'       => 'mailchimp-api',
                'type'     => 'text',
                'title'    => __( 'Your mailchimp API','bleute' ),
                'subtitle' => __( 'Grab an API Key from <a href="http://admin.mailchimp.com/account/api/" target="_blank">here</a>.','bleute' ),
            ),

             array(
                'id'        => 'mailchimp-groupid',
                'type'      => 'text',
                'title'     => __( 'Your group id','bleute' ),
                'subtitle'  => __( 'Grab your List\'s Unique Id by going <a href="http://admin.mailchimp.com/lists/" target="_blank">here</a>.<br> Click the "settings" link for the list - the Unique Id is at the bottom of that page.','bleute' ),
            ),

        )
    ) );


    Redux::setSection( $opt_name, array(
        'title'            => __( 'Typo setting','bleute' ),
        'id'               => 'typo',
        'customizer_width' => '500px',
        'icon'             => 'el el-font',
    ) );

    Redux::setSection( $opt_name, array(
        'title'            => __( 'Your custom typo','bleute' ),
        'id'               => 'typo-custom',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'       => 'body-text',
                'type'     => 'typography',
                'title'    => __( 'Body Font','bleute' ),
                // 'compiler' => array('body *'),
                'output'   => array('body,header #main-navigation.default .menu-item a'),
                'subtitle' => __( 'Specify the body font properties.','bleute' ),
                'google'   => true,
            ),
            array(
                'id'       => 'title-text',
                'type'     => 'typography',
                'title'    => __( 'Body Font','bleute' ),
                // 'compiler' => array('body *'),
                'output'   => array('.description h2'),
                'subtitle' => __( 'Specify the section title font properties.','bleute' ),
                'google'   => true,
            ),
            array(
                'id'       => 'h1-element',
                'type'     => 'typography',
                'title'    => __( 'H1 element','bleute' ),
                'subtitle' => __( 'Specify the h1 font properties.','bleute' ),
                'output'    => array('h1'),
                // 'compiler' => array('h1'),
                'google'   => true,
            ),
            array(
                'id'       => 'h2-element',
                'type'     => 'typography',
                'title'    => __( 'H2 element','bleute' ),
                'subtitle' => __( 'Specify the h2 font properties.','bleute' ),
                'compiler' => array('h2'),
                'output' => array('h2'),
                'google'   => true,
            ),
            array(
                'id'       => 'h3-element',
                'type'     => 'typography',
                'title'    => __( 'H3 element','bleute' ),
                'subtitle' => __( 'Specify the h3 font properties.','bleute' ),
                // 'compiler' => array('h3'),
                'output' => array('h3'),
                'google'   => true,
            ),
            array(
                'id'       => 'h4-element',
                'type'     => 'typography',
                'title'    => __( 'H4 element','bleute' ),
                'subtitle' => __( 'Specify the h4 font properties.','bleute' ),
                // 'compiler' => array('h4'),
                'output'   => array('h4'),
                'google'   => true,
            ),
            array(
                'id'       => 'h5-element',
                'type'     => 'typography',
                'title'    => __( 'H5 element','bleute' ),
                'subtitle' => __( 'Specify the h5 font properties.','bleute' ),
                // 'compiler' => array('h5'),
                'output'   => array('h5'),
                'google'   => true,
            ),
            array(
                'id'       => 'h6-element',
                'type'     => 'typography',
                'title'    => __( 'H6 element','bleute' ),
                'subtitle' => __( 'Specify the h6 font properties.','bleute' ),
                // 'compiler' => array('h6'),
                'output' => array('h6'),
                'google'   => true,
            ),
        )
    ) );



    // Your header and footer custom
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Header & footer','bleute' ),
        'id'               => 'headerfooter',
        'customizer_width' => '500px',
        'icon'             => 'el el-magic',
    ) );

    Redux::setSection( $opt_name, array(
        'title'             => __( 'Custom header','bleute' ),
        'id'                => 'headerfooter-header',
        'subsection'        => true,
        'customizer_width'  => '450px',
        'fields'            => array(
            array(
                'id'       => 'header-type',
                'type'     => 'select',
                'title'    => __( 'Chose your menu type','bleute' ),
                'subtitle' => __( 'This menu default all page','bleute' ),
                'options'  => $custom_header,
            ),
            array(
                'id'       => 'enable-fixed',
                'type'     => 'button_set',
                'title'    => __( 'Enable header fixed','bleute' ),
                'options'  => array(
                    '1'    => 'No',
                    '2'    => 'Yes',
                ),
                'default'  => '2'
            ),
            array(
                'id'        => 'header-text-color',
                'type'      => 'color_rgba',
                'title'     => __( 'Menu Text Color','bleute' ),
                'subtitle'  => __( 'Gives you the RGBA color.','bleute' ),
                // 'compiler' => array('.header'),
                'output' => array(
                    'header','header.tranfarent .menu-bottom #main-nav ul li.current_page_item a',
                    'header.tranfarent .menu-bottom #main-nav ul li a',
                ),
                'mode'      => 'color',
                //'validate' => 'colorrgba',
            ),

            array(
                'id'        => 'header-bg',
                'type'      => 'color_rgba',
                'title'     => __( 'Header background Color','bleute' ),
                'subtitle'  => __( 'Gives you the RGBA color.','bleute' ),
                // 'compiler' => array('.header'),
                'output' => array(
                    'header',
                    'header.tranfarent .menu-bottom #main-nav ul li ',
                ),
                'mode'      => 'background',
                //'validate' => 'colorrgba',
            ),

            array(
                'id'        => 'header-dropdown-color',
                'type'      => 'color_rgba',
                'title'     => __( 'Header dropdown BG Color','bleute' ),
                'subtitle'  => __( 'Gives you the RGBA color.','bleute' ),
                // 'compiler' => array('#main-navigation .menu-item .sub-menu .menu-item', '#main-navigation .menu-item .sub-menu .menu-item:hover', '#main-navigation .menu-item .sub-menu.current-menu-item'),
                'output' => array(
                    'header #main-navigation.default .menu-item:hover .sub-menu li',
                    '#main-navigation .menu-item .sub-menu .menu-item:hover',
                    '#main-navigation .menu-item .sub-menu.current-menu-item'
                ),
                'mode'      => 'background',
                //'validate' => 'colorrgba',
            ),
            array(
                'id'        => 'header-fixed',
                'type'      => 'button_set',
                'title'     => __( 'Header fixed','bleute' ),
                // 'subtitle' => __( 'No validation can be done on this field type','bleute' ),
                // 'desc'     => __( 'This is the description field, again good for additional info.','bleute' ),
                //Must provide key => value pairs for radio options
                'options'   => array(
                    '1'     => 'No',
                    '2'     => 'Yes',
                ),
                'default'   => '2'
            ),
            array(
                'id'       => 'title-free-ship',
                'type'     => 'editor',
                'title'    => __( 'Your title free shipping', 'beautheme' ),
                'default'  => 'Free shipping',
                'subtitle' => __( 'Use any of the features of WordPress editor inside your panel!','bleute' ),
            ),
            array(
                'id'       => 'text-free-ship',
                'type'     => 'editor',
                'title'    => __( 'Your text free shipping', 'beautheme' ),
                'default'  => 'samples on us orders $50+',
                'subtitle' => __( 'Use any of the features of WordPress editor inside your panel!','bleute' ),
            ),
            array(
                'id'       => 'title-call-us',
                'type'     => 'editor',
                'title'    => __( 'Your text call us', 'beautheme' ),
                'default'  => 'Call us now',
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'             => __( 'Custom footer','bleute' ),
        'id'                => 'headerfooter-footer',
        'subsection'        => true,
        'customizer_width'  => '450px',
        'fields'            => array(

            array(
                'id'       => 'footer-type',
                'type'     => 'select',
                'multi'    => false,
                'title'    => __( 'Chose your default footer', 'beautheme' ),
                'subtitle' => __( 'Select defaulr footer for default page', 'beautheme' ),
                //Must provide key => value pairs for radio options
                'options'  =>  $custom_footer,
                'default'  => 'default',
            ),
            array(
                'id'       => 'footer-widget-number',
                'type'     => 'select',
                'title'    => __( 'Chose footer columns','bleute' ),
                'subtitle' => __( 'Chose your custom widget number you want to show','bleute' ),
                'options'  => $beau_column,
            ),

            array(
                'id'        => 'footer-text',
                'type'      => 'color_rgba',
                'title'     => __( 'Footer Text Color','bleute' ),
                'subtitle'  => __( 'Gives you the RGBA color.','bleute' ),
                // 'compiler' => array('footer'),
                'output'   => array(
                    'footer', 'footer .footer-widget .widget-title',
                    'footer .footer-widget .widget-body .menu li a',
                    'footer .footer-widget .widget-body',
                    '.book-info span.book-name a',
                    'footer .footer-widget .widget-body .book-info .book-price',
                    '.widget-footer .list-social a'
                ),
                'mode'      => 'color',
            ),
            array(
                'id'        => 'footer-bg',
                'type'      => 'color_rgba',
                'title'     => __( 'Footer background Color','bleute' ),
                'subtitle'  => __( 'Gives you the RGBA color.','bleute' ),
                'output'   => array( 'footer' ),
                'mode'      => 'background',
            ),
            array(
                'id'        => 'footer-bottom-bg',
                'type'      => 'color_rgba',
                'title'     => __( 'Footer bottom Color','bleute' ),
                'subtitle'  => __( 'Gives you the RGBA color.','bleute' ),
                // 'compiler' => array('.bottom-footer'),
                'output'   => array( 'footer .bottom-footer .footer' ),
                'mode'      => 'background',
            ),
            array(
                'id'        => 'footer-bottom-text',
                'type'      => 'color_rgba',
                'title'     => __( 'Footer bottom Text Color','bleute' ),
                'subtitle'  => __( 'Gives you the RGBA color.','bleute' ),
                // 'compiler' => array('.bottom-footer'),
                'output'   => array( 'footer .bottom-footer .copyright' ),
                'mode'      => 'color',
            ),
            array(
                'id'       => 'text-call-us',
                'type'     => 'editor',
                'title'    => __( 'Your text and phone number of footer', 'beautheme' ),
                'default'  => 'call us now toll free : 012-345-6789:',
                'subtitle' => __( 'Use any of the features of WordPress editor inside your panel!','bleute' ),
            ),
            array(
                'id'       => 'text-copyright',
                'type'     => 'editor',
                'title'    => __( 'Your copyright', 'beautheme' ),
                'default'  => 'Copyright © beautheme. All rights reserved. Privacy Policy',
                'subtitle' => __( 'Use any of the features of WordPress editor inside your panel!','bleute' ),
            ),
            
        )
    ) );

    // -> START shop option
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Widget sale footer','bleute' ),
        'id'               => 'widget',
        'customizer_width' => '500px',
        'icon'             => 'el el-wrench',
    ) );
    // Chon kieu trang archive
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Page widget text','bleute' ),
        'id'               => 'widget-options',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'       => 'price_sale',
                'type'     => 'text',
                'title'    => __( 'Your price sale', 'beautheme' ),
                'value'    => '',
                'desc'     => __( 'You can change price sale show in footer', 'beautheme' )
            ),
            array(
                'id'       => 'title_sale',
                'type'     => 'text',
                'title'    => __( 'Title sale in footer', 'beautheme' ),
                'value'    => '',
                'desc'     => __( 'You can change title sale in footer', 'beautheme' )
            ),
            array(
                'id'       => 'description_sale',
                'type'     => 'editor',
                'title'    => __( 'Description sale in footer', 'beautheme' ),
                'subtitle' => __( 'You can change description sale in footer','bleute' ),
            ),
        )
    ) );


    // -> START Editors
    // Redux::setSection( $opt_name, array(
    //     'title'            => __( 'Custom Code','bleute' ),
    //     'id'               => 'editor',
    //     'customizer_width' => '500px',
    //     'icon'             => 'el el-edit',
    // ) );

    // Redux::setSection( $opt_name, array(
    //     'title'      => __( 'Your css & Js','bleute' ),
    //     'id'         => 'editor-ace',
    //     //'icon'  => 'el el-home'
    //     'subsection' => true,
    //     // 'desc'       => __( 'For full documentation on the this field, visit: ','bleute' ) . '<a href="//docs.reduxframework.com/core/fields/ace-editor/" target="_blank">docs.reduxframework.com/core/fields/ace-editor/</a>',
    //     'fields'     => array(
    //         array(
    //             'id'       => 'yourcustom-css',
    //             'type'     => 'ace_editor',
    //             'title'    => __( 'CSS Code','bleute' ),
    //             'subtitle' => __( 'Paste your CSS code here.','bleute' ),
    //             'mode'     => 'css',
    //             'theme'    => 'monokai',
    //             // 'desc'     => 'Possible modes can be found at <a href="' . 'http://' . 'ace.c9.io" target="_blank">' . 'http://' . 'ace.c9.io/</a>.',
    //             'default'  => ""
    //         ),
    //         array(
    //             'id'       => 'yourcustom-js',
    //             'type'     => 'ace_editor',
    //             'title'    => __( 'JS Code','bleute' ),
    //             'subtitle' => __( 'Paste your JS code here.','bleute' ),
    //             'mode'     => 'javascript',
    //             'theme'    => 'chrome',
    //             // 'desc'     => 'Possible modes can be found at <a href="' . 'http://' . 'ace.c9.io" target="_blank">' . 'http://' . 'ace.c9.io/</a>.',
    //             'default'  => "jQuery(document).ready(function(){\n\n});"
    //         ),

    //     )
    // ) );

// Dynamically add a section. Can be also used to modify sections/fields
    // add_filter('redux/options/' . $opt_name . '/sections', 'dynamic_section');

    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field set with compiler=>true is changed.
     * */
    // if ( ! function_exists( 'compiler_action' ) ) {
    //     function compiler_action($options, $css, $changed_values) {
    //         var_dump($css.''.$option.''.$changed_values);
    //         global $wp_filesystem;
    //         $filename = get_template_directory(). '/asset/css/custom_store.css';

    //         if( empty( $wp_filesystem ) ) {
    //             require_once( ABSPATH .'/wp-admin/includes/file.php' );
    //             WP_Filesystem();
    //         }

    //         if( $wp_filesystem ) {
    //             $wp_filesystem->put_contents(
    //                 $filename,
    //                 $css,
    //                 FS_CHMOD_FILE // predefined mode settings for WP files
    //             );
    //         }
    //     }
    // }


    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built in icons
     * */
    // if ( ! function_exists( 'dynamic_section' ) ) {
    //     function dynamic_section( $sections ) {
            //$sections = array();
            // $sections[] = array(
            //     'title'  => __( 'Section via hook', 'redux-framework-demo' ),
            //     'desc'   => __( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'redux-framework-demo' ),
            //     'icon'   => 'el el-paper-clip',
            //     // Leave this as a blank section, no options just some intro text set above.
            //     'fields' => array()
            // );

    //         return $sections;
    //     }
    // }