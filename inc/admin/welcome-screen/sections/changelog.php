<?php
/**
 * Changelog
 */

$openlab_lite = wp_get_theme( 'openlab-lite' );

?>
<div class="openlab-lite-tab-pane" id="changelog">

	<div class="openlab-tab-pane-center">
	
		<h1>Openlab Lite <?php if( !empty($openlab_lite['Version']) ): ?> <sup id="openlab-lite-theme-version"><?php echo esc_attr( $openlab_lite['Version'] ); ?> </sup><?php endif; ?></h1>

	</div>

	<?php
	WP_Filesystem();
	global $wp_filesystem;
	$openlab_lite_changelog = $wp_filesystem->get_contents( get_template_directory().'/CHANGELOG.md' );
	$openlab_lite_changelog_lines = explode(PHP_EOL, $openlab_lite_changelog);
	foreach($openlab_lite_changelog_lines as $openlab_lite_changelog_line){
		if(substr( $openlab_lite_changelog_line, 0, 3 ) === "###"){
			echo '<hr /><h1>'.substr($openlab_lite_changelog_line,3).'</h1>';
		} else {
			echo $openlab_lite_changelog_line,'<br/>';
		}
	}

	?>
	
</div>