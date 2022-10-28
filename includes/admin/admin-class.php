<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

class MXSL_Admin_Main
{

	// list of model names used in the plugin
	public $models_collection = [
		'MXSL_Main_Page_Model'
	];

	/*
	* MXSL_Admin_Main constructor
	*/
	public function __construct()
	{

	}

	/*
	* Additional classes
	*/
	public function mxsl_additional_classes()
	{

		// enqueue_scripts class
		mxsl_require_class_file_admin( 'enqueue-scripts.php' );

		MXSL_Enqueue_Scripts::mxsl_register();

		// mx metaboxes class
		mxsl_require_class_file_admin( 'metabox.php' );

		mxsl_require_class_file_admin( 'metabox-image-upload.php' );

		MXSL_Metaboxes_Image_Upload_Class::register_scrips();
		
		// CPT class
		mxsl_require_class_file_admin( 'cpt.php' );

		MXSLCPTclass::createCPT();

	}

	/*
	* Models Connection
	*/
	public function mxsl_models_collection()
	{

		// require model file
		foreach ( $this->models_collection as $model ) {
			
			mxsl_use_model( $model );

		}		

	}

	/**
	* registration ajax actions
	*/
	public function mxsl_registration_ajax_actions()
	{

		// ajax requests to main page
		MXSL_Main_Page_Model::mxsl_wp_ajax();

	}

	/*
	* Routes collection
	*/
	public function mxsl_routes_collection()
	{

		// main menu item
		MXSL_Route::mxsl_get( 'MXSL_Main_Page_Controller', 'index', '', [
			'page_title' => 'Main Menu title',
			'menu_title' => 'Main menu'
		] );

		// sub menu item
		MXSL_Route::mxsl_get( 'MXSL_Main_Page_Controller', 'submenu', '', [
			'page_title' => 'Sub Menu title',
			'menu_title' => 'Sub menu'
		], 'sub_menu' );

		// hide menu item
		MXSL_Route::mxsl_get( 'MXSL_Main_Page_Controller', 'hidemenu', 'NULL', [
			'page_title' => 'Hidden Menu title',
		], 'hide_menu' );

		// sub settings menu item
		MXSL_Route::mxsl_get( 'MXSL_Main_Page_Controller', 'settings_menu_item_action', 'NULL', [
			'menu_title' => 'Settings Item',
			'page_title' => 'Title of settings page'
		], 'settings_menu_item', true );

	}

}

// Initialize
$initialize_admin_class = new MXSL_Admin_Main();

// include classes
$initialize_admin_class->mxsl_additional_classes();

// include models
$initialize_admin_class->mxsl_models_collection();

// ajax requests
$initialize_admin_class->mxsl_registration_ajax_actions();

// include controllers
$initialize_admin_class->mxsl_routes_collection();