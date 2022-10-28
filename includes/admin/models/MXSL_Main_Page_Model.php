<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/**
* Main page Model
*/
class MXSL_Main_Page_Model extends MXSL_Model
{

	/*
	* Observe function
	*/
	public static function mxsl_wp_ajax()
	{

		add_action( 'wp_ajax_mxsl_update', [ 'MXSL_Main_Page_Model', 'prepare_update_database_column' ], 10, 1 );

	}

	/*
	* Prepare for data updates
	*/
	public static function prepare_update_database_column()
	{
		
		// Checked POST nonce is not empty
		if( empty( $_POST['nonce'] ) ) wp_die( '0' );

		// Checked or nonce match
		if( wp_verify_nonce( $_POST['nonce'], 'mxsl_nonce_request' ) ){

			// Update data
			$str = sanitize_text_field( $_POST['mxsl_some_string'] );

			self::update_database_column( $str );		

		}

		wp_die();

	}

		// Update data
		public static function update_database_column( $string )
		{

			global $wpdb;

			$clean_string = esc_html( $string );

			$table_name = $wpdb->prefix . MXSL_TABLE_SLUG;

			$wpdb->update(

				$table_name, 
				[
					'mx_name' => $clean_string,
				], 
				[ 'product_id' => 1 ], 
				[ 
					'%s'
				]

			);

		}
	
}