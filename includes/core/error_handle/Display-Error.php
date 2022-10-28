<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/*
* Error Handle calss
*/
class MXSL_Display_Error
{

	/**
	* Error notice
	*/
	public $mxsl_error_notice = '';

	public function __construct( $mxsl_error_notice )
	{

		$this->mxsl_error_notice = $mxsl_error_notice;

	}

	public function mxsl_show_error()
	{
		
		add_action( 'admin_notices', function() { ?>

			<div class="notice notice-error is-dismissible">

			    <p><?php echo esc_attr( $this->mxsl_error_notice ); ?></p>
			    
			</div>
		    
		<?php } );

	}

}