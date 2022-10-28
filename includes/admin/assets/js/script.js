jQuery( document ).ready( function( $ ) {

	$( '#mxsl_form_update' ).on( 'submit', function( e ){

		e.preventDefault();

		var nonce = $( this ).find( '#mxsl_wpnonce' ).val();

		var someString = $( '#mxsl_some_string' ).val();

		var data = {

			'action': 'mxsl_update',
			'nonce': nonce,
			'mxsl_some_string': someString

		};

		jQuery.post( mxsl_admin_localize.ajaxurl, data, function( response ){

			// console.log( response );
			alert( 'Value updated.' );

		} );

	} );

} );