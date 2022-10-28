<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

class MXSL_FrontEnd_Main
{

	/*
	* MXSL_FrontEnd_Main constructor
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
		mxsl_require_class_file_frontend( 'enqueue-scripts.php' );

		MXSL_Enqueue_Scripts_Frontend::mxsl_register();

	}

}

// Initialize
$initialize_admin_class = new MXSL_FrontEnd_Main();

// include classes
$initialize_admin_class->mxsl_additional_classes();