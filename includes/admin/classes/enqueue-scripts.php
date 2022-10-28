<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

class MXSL_Enqueue_Scripts
{

	/*
	* MXSL_Enqueue_Scripts
	*/
	public function __construct()
	{

	}

	/*
	* Registration of styles and scripts
	*/
	public static function mxsl_register()
	{

		// register scripts and styles
		add_action( 'admin_enqueue_scripts', [ 'MXSL_Enqueue_Scripts', 'mxsl_enqueue' ] );

	}

		public static function mxsl_enqueue()
		{

			wp_enqueue_style( 'mxsl_font_awesome', MXSL_PLUGIN_URL . 'assets/font-awesome-4.6.3/css/font-awesome.min.css' );

			wp_enqueue_style( 'mxsl_admin_style', MXSL_PLUGIN_URL . 'includes/admin/assets/css/style.css', [ 'mxsl_font_awesome' ], MXSL_PLUGIN_VERSION, 'all' );

			wp_enqueue_script( 'mxsl_admin_script', MXSL_PLUGIN_URL . 'includes/admin/assets/js/script.js', [ 'jquery' ], MXSL_PLUGIN_VERSION, false );

			wp_localize_script( 'mxsl_admin_script', 'mxsl_admin_localize', [

				'ajaxurl' 			=> admin_url( 'admin-ajax.php' )

			] );

		}

}