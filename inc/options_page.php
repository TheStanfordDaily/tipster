<?php

add_action( 'admin_menu', 'tipster_add_admin_menu' );
add_action( 'admin_init', 'tipster_settings_init' );


function tipster_add_admin_menu(  ) { 

	add_options_page( 'tipster', 'tipster', 'manage_options', 'tipster', 'tipster_options_page' );

}


function tipster_settings_init(  ) { 

	register_setting( 'pluginPage', 'tipster_settings' );

	add_settings_section(
		'tipster_pluginPage_section', 
		__( 'Your section description', 'en' ), 
		'tipster_settings_section_callback', 
		'pluginPage'
	);

	add_settings_field( 
		'tipster_slack_token', 
		__( 'Settings field description', 'en' ), 
		'tipster_slack_token_render', 
		'pluginPage', 
		'tipster_pluginPage_section' 
	);

	add_settings_field( 
		'tipster_slack_channel', 
		__( 'Settings field description', 'en' ), 
		'tipster_slack_channel_render', 
		'pluginPage', 
		'tipster_pluginPage_section' 
	);


}


function tipster_slack_token_render(  ) { 

	$options = get_option( 'tipster_settings' );
	?>
	<input type='text' name='tipster_settings[tipster_slack_token]' value='<?php echo $options['tipster_slack_token']; ?>'>
	<?php

}


function tipster_slack_channel_render(  ) { 

	$options = get_option( 'tipster_settings' );
	?>
	<input type='text' name='tipster_settings[tipster_slack_channel]' value='<?php echo $options['tipster_slack_channel']; ?>'>
	<?php

}


function tipster_settings_section_callback(  ) { 

	echo __( 'This section description', 'en' );

}


function tipster_options_page(  ) { 

		?>
		<form action='options.php' method='post'>

			<h2>Tipster</h2>

			<?php
			settings_fields( 'pluginPage' );
			do_settings_sections( 'pluginPage' );
			submit_button();
			?>

		</form>
		<?php

}