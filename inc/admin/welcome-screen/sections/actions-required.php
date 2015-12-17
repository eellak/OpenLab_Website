<?php
/**
 * Actions required
 */
?>

<div id="actions_required" class="openlab-txtd-tab-pane">

    <h1><?php esc_html_e( 'OpenLab Actions' ,'openlab-txtd' ); ?></h1>

    <!-- NEWS -->
    <hr />

	<?php
	global $openlab_required_actions;

	if( !empty($openlab_required_actions) ):

		/* openlab_show_required_actions is an array of true/false for each required action that was dismissed */
		$openlab_show_required_actions = get_option("openlab_show_required_actions");

		foreach( $openlab_required_actions as $openlab_required_action_key => $openlab_required_action_value ):
			if(@$openlab_show_required_actions[$openlab_required_action_value['id']] === false) continue;
			if(@$openlab_required_action_value['check']) continue;
			?>
			<div class="openlab-action-required-box">
				<span class="dashicons dashicons-no-alt openlab-dismiss-required-action" id="<?php echo $openlab_required_action_value['id']; ?>"></span>
				<h4><?php echo $openlab_required_action_key + 1; ?>. <?php if( !empty($openlab_required_action_value['title']) ): echo $openlab_required_action_value['title']; endif; ?></h4>
				<p><?php if( !empty($openlab_required_action_value['description']) ): echo $openlab_required_action_value['description']; endif; ?></p>
				<?php
					if( !empty($openlab_required_action_value['plugin_slug']) ):
						?><p><a href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin='.$openlab_required_action_value['plugin_slug'] ), 'install-plugin_'.$openlab_required_action_value['plugin_slug'] ) ); ?>" class="button button-primary"><?php if( !empty($openlab_required_action_value['title']) ): echo $openlab_required_action_value['title']; endif; ?></a></p><?php
					endif;
				?>

				<hr />
			</div>
			<?php
		endforeach;
	endif;

	$nr_actions_required = 0;

	/* get number of required actions */
	if( get_option('openlab_show_required_actions') ):
		$openlab_show_required_actions = get_option('openlab_show_required_actions');
	else:
		$openlab_show_required_actions = array();
	endif;

	if( !empty($openlab_required_actions) ):
		foreach( $openlab_required_actions as $openlab_required_action_value ):
			if(( !isset( $openlab_required_action_value['check'] ) || ( isset( $openlab_required_action_value['check'] ) && ( $openlab_required_action_value['check'] == false ) ) ) && ((isset($openlab_show_required_actions[$openlab_required_action_value['id']]) && ($openlab_show_required_actions[$openlab_required_action_value['id']] == true)) || !isset($openlab_show_required_actions[$openlab_required_action_value['id']]) )) :
				$nr_actions_required++;
			endif;
		endforeach;
	endif;

	if( $nr_actions_required == 0 ):
		echo '<p>'.__( 'Hooray! There are no required actions for you right now.','openlab-txtd' ).'</p>';
	endif;
	?>

</div>