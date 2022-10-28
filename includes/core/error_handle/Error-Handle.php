<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/*
* Error Handle calss
*/
class MXSL_Error_Handle
{

	/**
	* Error name
	*/
	// public $mxsl_error_name = '';	

	/**
	* has error
	*/
	public $mxsl_isnt_error = true;

	public function __construct()
	{

	}
	
	public function mxsl_class_attributes_error( $class_name, $method )
	{

		// if class not exists display an error
		if( class_exists( $class_name ) ) {

			// check if method exists
			$class_inst = new $class_name();

			// if method not exists display an error
			if( !method_exists( $class_inst, $method ) ) {

				// notice of error
				$mxsl_error_notice = "The <b>\"{$class_name}\"</b> class doesn't contain the <b>\"{$method}\"</b> method.";

				// show an error
				$error_method_inst = new MXSL_Display_Error( $mxsl_error_notice );

				$error_method_inst->mxsl_show_error();

				$this->mxsl_isnt_error = $mxsl_error_notice;

			}

		} else {

			// notice of error
			$mxsl_error_notice = "The <b>\"{$class_name}\"</b> class not exists.";

			// show an error
			$error_class_inst = new MXSL_Display_Error( $mxsl_error_notice );

			$error_class_inst->mxsl_show_error();

			$this->mxsl_isnt_error = $mxsl_error_notice;

		}
	
		// 
		return $this->mxsl_isnt_error;

	}
	
}