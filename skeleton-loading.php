<?php
/*
Plugin Name: Skeleton loading
Plugin URI: https://github.com/razorshaleh/skeleton-loading
Description: this plugin for skeleton loading from razor shaleh
Author: RAZOR SHALEH
Version: 1.0
Author URI: https://github.com/razorshaleh/
*/

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/*
* Unique string - MXSL
*/

/*
* Define MXSL_PLUGIN_PATH
*
* E:\OpenServer\domains\my-domain.com\wp-content\plugins\skeleton-loading\skeleton-loading.php
*/
if ( ! defined( 'MXSL_PLUGIN_PATH' ) ) {

	define( 'MXSL_PLUGIN_PATH', __FILE__ );

}

/*
* Define MXSL_PLUGIN_URL
*
* Return http://my-domain.com/wp-content/plugins/skeleton-loading/
*/
if ( ! defined( 'MXSL_PLUGIN_URL' ) ) {

	define( 'MXSL_PLUGIN_URL', plugins_url( '/', __FILE__ ) );

}

/*
* Define MXSL_PLUGN_BASE_NAME
*
* 	Return skeleton-loading/skeleton-loading.php
*/
if ( ! defined( 'MXSL_PLUGN_BASE_NAME' ) ) {

	define( 'MXSL_PLUGN_BASE_NAME', plugin_basename( __FILE__ ) );

}

/*
* Define MXSL_TABLE_SLUG
*/
if ( ! defined( 'MXSL_TABLE_SLUG' ) ) {

	define( 'MXSL_TABLE_SLUG', 'mxsl_mx_table' );

}

/*
* Define MXSL_PLUGIN_ABS_PATH
* 
* E:\OpenServer\domains\my-domain.com\wp-content\plugins\skeleton-loading/
*/
if ( ! defined( 'MXSL_PLUGIN_ABS_PATH' ) ) {

	define( 'MXSL_PLUGIN_ABS_PATH', dirname( MXSL_PLUGIN_PATH ) . '/' );

}

/*
* Define MXSL_PLUGIN_VERSION
*/
if ( ! defined( 'MXSL_PLUGIN_VERSION' ) ) {

	// version
	define( 'MXSL_PLUGIN_VERSION', time() ); // Must be replaced before production on for example '1.0'

}

/*
* Define MXSL_MAIN_MENU_SLUG
*/
if ( ! defined( 'MXSL_MAIN_MENU_SLUG' ) ) {

	// version
	define( 'MXSL_MAIN_MENU_SLUG', 'mxsl-skeleton-loading-menu' );

}

/**
 * activation|deactivation
 */
require_once plugin_dir_path( __FILE__ ) . 'install.php';

/*
* Registration hooks
*/
// Activation
register_activation_hook( __FILE__, [ 'MXSL_Basis_Plugin_Class', 'activate' ] );

// Deactivation
register_deactivation_hook( __FILE__, [ 'MXSL_Basis_Plugin_Class', 'deactivate' ] );


/*
* Include the main MXSLSkeletonLoading class
*/
if ( ! class_exists( 'MXSLSkeletonLoading' ) ) {

	require_once plugin_dir_path( __FILE__ ) . 'includes/final-class.php';

	/*
	* Translate plugin
	*/
	add_action( 'plugins_loaded', 'mxsl_translate' );

	function mxsl_translate()
	{

		load_plugin_textdomain( 'mxsl-domain', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

	}

}