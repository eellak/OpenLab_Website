<?php
/**
 * Getting started template
 */

$customizer_url = admin_url() . 'customize.php' ;
?>

<div id="getting_started" class="openlab-txtd-tab-pane active">

	<div class="openlab-tab-pane-center">

		<h1 class="openlab-txtd-welcome-title"><?php echo __('Welcome to Openlab','openlab-txtd'); ?></h1>

	</div>

	<hr />

	<div class="openlab-tab-pane-center">

		<h1><?php esc_html_e( 'Getting started', 'openlab-txtd' ); ?></h1>
		<p><?php esc_html_e( 'Using the WordPress Customizer you can easily customize every aspect of the theme.', 'openlab-txtd' ); ?></p>
		<p><a href="<?php echo esc_url( $customizer_url ); ?>" class="button button-primary"><?php esc_html_e( 'Go to Customizer', 'openlab-txtd' ); ?></a></p>

	</div>

	<hr />


	<div class="openlab-txtd-clear"></div>

</div>
