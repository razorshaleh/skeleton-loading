<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/*
* View class
*/
class MXSL_View
{

	public function __construct( ...$args )
	{
		
		$this->mxsl_render( ...$args );

	}
	
	// render HTML
	public function mxsl_render( $file, $data = NULL )
	{

		// view content
		if( file_exists( MXSL_PLUGIN_ABS_PATH . "includes/admin/views/{$file}.php" ) ) {

			// data from model
			$data = $data;

			require_once MXSL_PLUGIN_ABS_PATH . "includes/admin/views/{$file}.php";

		} else { ?>

			<div class="notice notice-error is-dismissible">

			    <p>The view file "<b>includes/admin/views/<?php echo esc_attr( $file ); ?>.php</b>" doesn't exists.</p>
			    
			</div>
		<?php }


	}
	
}