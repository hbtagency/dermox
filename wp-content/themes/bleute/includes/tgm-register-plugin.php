<?php
/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.5.2
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once(get_template_directory().'/libs/class-tgm-plugin-activation.php');
add_action( 'tgmpa_register', 'bleute_theme_register_required_plugins' );
function bleute_theme_register_required_plugins() {
	$plugins = array (
				array (
					'name' => 'Master Slide',
					'slug' => 'masterslider',
					'source' => PLUGINS_PATH.'/general/masterslider-installable.zip',
					'required' =>true,
					'version' => '2.26.0',
					'force_activation' => false,
					'force_deactivation' => false,
					'external_url' => 'http://codecanyon.net/item/master-slider-jquery-touch-swipe-slider/6337671?ref=beautheme'
				),
				array (
					'name' => 'WPBakery Visual Composer',
					'slug' => 'js_composer',
					'source' => PLUGINS_PATH.'/general/js_composer.zip',
					'required' =>true,
					'version' => '4.10',
					'force_activation' => false,
					'force_deactivation' => false,
					'external_url' => 'http://codecanyon.net/item/visual-composer-page-builder-for-wordpress/242431?ref=beautheme'
				),
				array (
					'name' => 'Bleute postype and function',
					'slug' => 'beautheme-bleute',
					'source' => PLUGINS_PATH.'/bleute/beautheme-bleute.zip',
					'required' =>true,
					'version' => '1.0',
					'force_activation' => false,
					'force_deactivation' => false,
					'external_url' => ''
				),
				array (
					'name' => 'Woocommerce',
					'slug' => 'woocommerce',
					'source' => 'http://downloads.wordpress.org/plugin/woocommerce.zip',
					'required' =>true,
					'version' => '2.5.2',
					'force_activation' => false,
					'force_deactivation' => false,
					'external_url' => 'https://wordpress.org/plugins/woocommerce/'
				),
				array (
					'name' => 'Contact Form 7',
					'slug' => 'contact-form-7',
					'source' => 'https://downloads.wordpress.org/plugin/contact-form-7.4.3.1.zip',
					'required' =>true,
					'version' => '4.3.1',
					'force_activation' => false,
					'force_deactivation' => false,
					'external_url' => 'https://wordpress.org/plugins/contact-form-7/'
				),
				array (
					'name' => 'WooCommerce WooCart Popup Lite',
					'slug' => 'woocommerce-woocart-popup-lite',
					'source' => 'https://downloads.wordpress.org/plugin/woocommerce-woocart-popup-lite.1.1.zip',
					'required' =>false,
					'version' => '1.1',
					'force_activation' => false,
					'force_deactivation' => false,
					'external_url' => 'https://wordpress.org/plugins/woocommerce-woocart-popup-lite/'
				),
		);
	$config = array(
		'id'           => 'bleute',
		'default_path' => 'bleute-active-plugins',
		'menu'         => 'tgmpa-install-plugins',
		'parent_slug'  => 'themes.php',
		'capability'   => 'edit_theme_options',
		'has_notices'  => true,
		'dismissable'  => true,
		'dismiss_msg'  => '',
		'is_automatic' => false,
		'message'      => '',
	);
	tgmpa( $plugins, $config );
}