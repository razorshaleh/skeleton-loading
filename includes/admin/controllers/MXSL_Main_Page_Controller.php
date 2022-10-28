<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

class MXSL_Main_Page_Controller extends MXSL_Controller
{
	
	public function index()
	{

		$model_inst = new MXSL_Main_Page_Model();

		$data = $model_inst->mxsl_get_row( NULL, 'product_id', 1 );

		return new MXSL_View( 'main-page', $data );

	}

	public function submenu()
	{

		return new MXSL_View( 'sub-page' );

	}

	public function hidemenu()
	{

		return new MXSL_View( 'hidemenu-page' );

	}

	public function settings_menu_item_action()
	{

		return new MXSL_View( 'settings-page' );

	}

}