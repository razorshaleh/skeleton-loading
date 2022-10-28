<div class="mx-main-page-text-wrap">
	
	<h1><?php echo __( 'Settings Page', 'mxsl-domain' ); ?></h1>

	<div class="mx-block_wrap">

		<form id="mxsl_form_update" class="mx-settings" method="post" action="">

			<h2>Default script</h2>
			<textarea name="mxsl_some_string" id="mxsl_some_string"><?php echo $data->mx_name; ?></textarea>

			<p class="mx-submit_button_wrap">
				<input type="hidden" id="mxsl_wpnonce" name="mxsl_wpnonce" value="<?php echo wp_create_nonce( 'mxsl_nonce_request' ) ;?>" />
				<input class="button-primary" type="submit" name="mxsl_submit" value="Save" />
			</p>

		</form>

	</div>

</div>