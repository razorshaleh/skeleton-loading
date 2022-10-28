<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

class MXSLCPTclass
{

	/*
	* MXSLCPTclass constructor
	*/
	public function __construct()
	{		

	}

	/*
	* Observe function
	*/
	public static function createCPT()
	{

		// create CPT
		add_action( 'init', [ 'MXSLCPTclass', 'mxsl_custom_init' ] );

		// manage columns
		// add ID column to the table
		add_filter( 'manage_mxsl_books_posts_columns', [ 'MXSLCPTclass', 'mxsladd_id_column' ], 20, 1 );

			// manage ID column
			add_action( 'manage_mxsl_books_posts_custom_column', [ 'MXSLCPTclass', 'mxsl_books_column_row' ], 20, 2 );

	}

	/*
	* Manage new column
	*/
	public static function mxsl_books_column_row( $column, $post_id )
	{

		if( $column === 'book_id' ) {

			echo 'Book ID = ' . $post_id;

		}			

	}

	/*
	* Add new column to the Custom Post Type
	*/
	public static function mxsladd_id_column( $columns )
	{

		$new_column = ['book_id' => 'Book ID'];

		$new_columns = mxsl_insert_new_column_to_position( $columns, 3, $new_column );

		return $new_columns;

	}

	/*
	* Create a Custom Post Type
	*/
	public static function mxsl_custom_init()
	{
		
		register_post_type( 'mxsl_books', [

			'labels'             => [
				'name'               => 'Books',
				'singular_name'      => 'Book',
				'add_new'            => 'Add a new one',
				'add_new_item'       => 'Add a new book',
				'edit_item'          => 'Edit the book',
				'new_item'           => 'New book',
				'view_item'          => 'See the book',
				'search_items'       => 'Find a book',
				'not_found'          =>  'Books not found',
				'not_found_in_trash' => 'No books found in the trash',
				'parent_item_colon'  => '',
				'menu_name'          => 'Books'

			],
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => true,
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => [ 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ]

		] );

		// Rewrite rules
		if( is_admin() && get_option( 'mxsl_flush_rewrite_rules' ) == 'go_flush_rewrite_rules' )
		{

			delete_option( 'mxsl_flush_rewrite_rules' );

			flush_rewrite_rules();

		}

		/*
		* add metaboxes
		*/
		
		// add text input
		new MXSL_Metaboxes_Class(
			[
				'id'			=> 'text-metabox',
				'post_types' 	=> 'mxsl_books',
				'name'			=> esc_html( 'Text field', 'mx-domain' )
			]
		);

		// add email input
		new MXSL_Metaboxes_Class(
			[
				'id'			=> 'email-metabox',
				'post_types' 	=> 'mxsl_books',
				'name'			=> esc_html( 'E-mail field', 'mx-domain' ),
				'metabox_type'	=> 'input-email'
			]
		);

		// add url input
		new MXSL_Metaboxes_Class(
			[
				'id'			=> 'url-metabox',
				'post_types' 	=> 'mxsl_books',
				'name'			=> esc_html( 'URL field', 'mx-domain' ),
				'metabox_type'	=> 'input-url'
			]
		);

		// description
		new MXSL_Metaboxes_Class(
			[
				'id'			=> 'desc-metabox',
				'post_types' 	=> 'mxsl_books',
				'name'			=> esc_html( 'Some Description', 'mx-domain' ),
				'metabox_type'	=> 'textarea'
			]
		);

		// add checkboxes
		new MXSL_Metaboxes_Class(
			[
				'id'			=> 'checkboxes-metabox',
				'post_types' 	=> 'mxsl_books',
				'name'			=> esc_html( 'Checkbox Buttons', 'mx-domain' ),
				'metabox_type'	=> 'checkbox',
				'options' 		=> [
					[
						'value' => 'Dog',
						'checked' 	=> true
					],
					[
						'value' 	=> 'Cat'
					],
					[
						'value' 	=> 'Fish'
					]		
				]
			]
		);

		// add radio buttons
		new MXSL_Metaboxes_Class(
			[
				'id'			=> 'radio-buttons-metabox',
				'post_types' 	=> 'mxsl_books',
				'name'			=> esc_html( 'Radio Buttons', 'mx-domain' ),
				'metabox_type'	=> 'radio',
				'options' 		=> [
					[
						'value' => 'red'
					],
					[
						'value' => 'green'
					],
					[
						'value' 	=> 'Yellow',
						'checked' 	=> true
					]		
				]
			]
		);

		// image upload
		new MXSL_Metaboxes_Class(
			[
				'id'			=> 'featured-image-metabox',
				'post_types' 	=> 'mxsl_books',
				'name'			=> esc_html( 'Featured image', 'mx-domain' ),
				'metabox_type'	=> 'image'
			]
		);

	}

}