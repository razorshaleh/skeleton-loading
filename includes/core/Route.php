<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

// require Route-Registrar.php
require_once MXSL_PLUGIN_ABS_PATH . 'includes/core/Route-Registrar.php';

/*
* Routes class
*/
class MXSL_Route
{

	public function __construct()
	{
		// ...
	}
	
	public static function mxsl_get( ...$args )
	{

		return new MXSL_Route_Registrar( ...$args );

	}
	
}