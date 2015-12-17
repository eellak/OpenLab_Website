<?php
/**
 * Child themes template
 */
?>
<div id="child_themes" class="openlab-txtd-tab-pane">

	<?php
		$current_theme = wp_get_theme();
	?>

	<div class="openlab-tab-pane-center">

		<h1><?php esc_html_e( 'Get a whole new look for your site', 'openlab-txtd' ); ?></h1>

		<p><?php esc_html_e( 'Below you will find a selection of Openlab Lite child themes that will totally transform the look of your site.', 'openlab-txtd' ); ?></p>

	</div>


	<div class="openlab-tab-pane-half openlab-tab-pane-first-half">

		<!-- ZBlackBeard -->
		<div class="openlab-txtd-child-theme-container">
			<div class="openlab-txtd-child-theme-image-container">
				<img src="<?php echo esc_url( get_template_directory_uri() ) . '/inc/admin/welcome-screen/img/zblackbeard.jpg'; ?>" alt="<?php esc_html_e( 'ZBlackBeard Child Theme', 'openlab-txtd' ); ?>" />
				<div class="openlab-txtd-child-theme-description">
					<h2><?php esc_html_e( 'ZBlackBeard', 'openlab-txtd' ); ?></h2>
					<p><?php esc_html_e( 'ZBlackbeard is a modern responsive WordPress Theme. It\'s perfect for web agencies, digital studios, corporate, product showcase, personal and business portfolio.', 'openlab-txtd' ); ?></p>
				</div>
			</div>
			<div class="openlab-txtd-child-theme-details">
				<?php if ( 'ZBlackBeard' != $current_theme['Name'] ) { ?>
					<div class="theme-details">
						<span class="theme-name">Zblackbeard</span>
						<a href="http://themeisle.com/themes/zblackbeard/#pricing-single" class="button button-primary install right"><?php esc_html_e( 'Get now', 'openlab-txtd' ); ?></a>
						<a class="button button-secondary preview right" target="_blank" href="https://wp-themes.com/zblackbeard"><?php esc_html_e( 'Live Preview','openlab-txtd'); ?></a>
						<div class="openlab-txtd-clear"></div>
					</div>
				<?php } else { ?>
					<div class="theme-details active">
						<span class="theme-name"><?php echo esc_html_e( 'Zblackbeard - Current theme', 'openlab-txtd' ); ?></span>
						<a class="button button-secondary customize right" target="_blank" href="<?php echo get_site_url(). '/wp-admin/customize.php' ?>"><?php esc_html_e('Customize','openlab-txtd'); ?></a>
						<div class="openlab-txtd-clear"></div>
					</div>
				<?php } ?>
			</div>
		</div>
		<hr />

		<!-- OnePirate -->
		<div class="openlab-txtd-child-theme-container">
			<div class="openlab-txtd-child-theme-image-container">
				<img src="<?php echo esc_url( get_template_directory_uri() ) . '/inc/admin/welcome-screen/img/onepirate.jpg'; ?>" alt="<?php esc_html_e( 'OnePirate Child Theme', 'openlab-txtd' ); ?>" />
				<div class="openlab-txtd-child-theme-description">
					<h2><?php esc_html_e( 'OnePirate', 'openlab-txtd' ); ?></h2>
					<p><?php esc_html_e( 'One Pirate is a beautiful one-page WordPress theme, with a colorful and playful design, nice animations, full-screen layout, and elegant parallax effect. The theme comes with a full-width header and with catchy icons. Overall, One Pirate has a modern and interactive look, and a smooth transition from a section to another.', 'openlab-txtd' ); ?></p>
				</div>
			</div>
			<div class="openlab-txtd-child-theme-details">
				<?php if ( 'OnePirate' != $current_theme['Name'] ) { ?>
					<div class="theme-details">
						<span class="theme-name">OnePirate</span>
						<a href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-theme&theme=onepirate' ), 'install-theme_onepirate' ) ); ?>" class="button button-primary install right"><?php printf( __( 'Install %s now', 'openlab-txtd' ), '<span class="screen-reader-text">ZblackBeard</span>' ); ?></a>
						<a class="button button-secondary preview right" target="_blank" href="https://wp-themes.com/onepirate"><?php esc_html_e( 'Live Preview','openlab-txtd'); ?></a>
						<div class="openlab-txtd-clear"></div>
					</div>
				<?php } else { ?>
					<div class="theme-details active">
						<span class="theme-name"><?php echo esc_html_e( 'OnePirate - Current theme', 'openlab-txtd' ); ?></span>
						<a class="button button-secondary customize right" target="_blank" href="<?php echo get_site_url(). '/wp-admin/customize.php' ?>"><?php esc_html_e('Customize','openlab-txtd'); ?></a>
						<div class="openlab-txtd-clear"></div>
					</div>
				<?php } ?>
			</div>
		</div>
		
		<hr/>
		<!-- Zifer Child -->
		<div class="openlab-txtd-child-theme-container">
			<div class="openlab-txtd-child-theme-image-container">
				<img src="<?php echo esc_url( get_template_directory_uri() ) . '/inc/admin/welcome-screen/img/zifer-child.jpg'; ?>" alt="<?php esc_html_e( 'Zifer Child Theme', 'openlab-txtd' ); ?>" />
				<div class="openlab-txtd-child-theme-description">
					<h2><?php esc_html_e( 'Zifer', 'openlab-txtd' ); ?></h2>
					<p><?php esc_html_e( 'Zifer Child is a user optimized Photography WordPress Theme built with latest technologies, easy to customize. Use it to create an awesome photography portfolio.', 'openlab-txtd' ); ?></p>
				</div>
			</div>
			<div class="openlab-txtd-child-theme-details">
				<?php if ( 'Zifer Child' != $current_theme['Name'] ) { ?>
					<div class="theme-details">
						<span class="theme-name">Zifer Child</span>
						<a href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-theme&theme=zifer-child' ), 'install-theme_zifer-child' ) ); ?>" class="button button-primary install right"><?php printf( __( 'Install %s now', 'openlab-txtd' ), '<span class="screen-reader-text">Zerius</span>' ); ?></a>
						<a class="button button-secondary preview right" target="_blank" href="https://wp-themes.com/zifer-child"><?php esc_html_e( 'Live Preview','openlab-txtd'); ?></a>
						<div class="openlab-txtd-clear"></div>
					</div>
				<?php } else { ?>
					<div class="theme-details active">
						<span class="theme-name"><?php echo esc_html_e( 'Zifer Child - Current theme', 'openlab-txtd' ); ?></span>
						<a class="button button-secondary customize right" target="_blank" href="<?php echo get_site_url(). '/wp-admin/customize.php' ?>"><?php esc_html_e( 'Customize','openlab-txtd'); ?></a>
						<div class="openlab-txtd-clear"></div>
					</div>
				<?php } ?>
			</div>
		</div>

	</div>

	<div class="openlab-tab-pane-half">
		<!-- ResponsiveBoat -->
		<div class="openlab-txtd-child-theme-container">
			<div class="openlab-txtd-child-theme-image-container">
				<img src="<?php echo esc_url( get_template_directory_uri() ) . '/inc/admin/welcome-screen/img/responsiveboat.png'; ?>" alt="<?php esc_html_e( 'ResponsiveBoat', 'openlab-txtd' ); ?>" />
				<div class="openlab-txtd-child-theme-description">
					<h2><?php esc_html_e( 'ResponsiveBoat', 'openlab-txtd' ); ?></h2>
					<p><?php esc_html_e( 'ResponsiveBoat is a free responsive WordPress theme, with a friendly and colorful design. It comes with a full-screen layout, a full-width homepage header, elegant parallax effect, and nice animations. It can be used web agencies, digital studios, corporate, product showcase, personal and business portfolio. Overall, ResponsiveBoat looks very modern and interactive.', 'openlab-txtd' ); ?></p>
				</div>
			</div>
			<div class="openlab-txtd-child-theme-details">
				<?php if ( 'ResponsiveBoat' != $current_theme['Name'] ) { ?>
					<div class="theme-details">
						<span class="theme-name">ResponsiveBoat</span>
						<a href="http://themeisle.com/themes/responsiveboat-theme/#pricing-single" class="button button-primary install right"><?php printf( __( 'Get %s now', 'openlab-txtd' ), '<span class="screen-reader-text">ResponsiveBoat</span>' ); ?></a>
						<a class="button button-secondary preview right" target="_blank" href="https://wp-themes.com/responsiveboat"><?php esc_html_e( 'Live Preview','openlab-txtd'); ?></a>
						<div class="openlab-txtd-clear"></div>
					</div>
				<?php } else { ?>
				<div class="theme-details active">
					<span class="theme-name"><?php echo esc_html_e( 'ResponsiveBoat - Current theme', 'openlab-txtd' ); ?></span>
					<a class="button button-secondary customize right" target="_blank" href="<?php echo get_site_url(). '/wp-admin/customize.php' ?>"><?php esc_html_e('Customize','openlab-txtd'); ?></a>
					<div class="openlab-txtd-clear"></div>
				</div>
				<?php } ?>
			</div>
		</div>
		<hr />

		<!-- Zerius -->
		<div class="openlab-txtd-child-theme-container">
			<div class="openlab-txtd-child-theme-image-container">
				<img src="<?php echo esc_url( get_template_directory_uri() ) . '/inc/admin/welcome-screen/img/zerius.jpg'; ?>" alt="<?php esc_html_e( 'Zerius Child Theme', 'openlab-txtd' ); ?>" />
				<div class="openlab-txtd-child-theme-description">
					<h2><?php esc_html_e( 'Zerius', 'openlab-txtd' ); ?></h2>
					<p><?php esc_html_e( 'Zerius is a clean, modern, and animated free one-page parallax WordPress theme.', 'openlab-txtd' ); ?></p>
				</div>
			</div>
			<div class="openlab-txtd-child-theme-details">
				<?php if ( 'Zerius' != $current_theme['Name'] ) { ?>
					<div class="theme-details">
						<span class="theme-name">Zerius</span>
						<a href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-theme&theme=zerius' ), 'install-theme_zerius' ) ); ?>" class="button button-primary install right"><?php printf( __( 'Install %s now', 'openlab-txtd' ), '<span class="screen-reader-text">Zerius</span>' ); ?></a>
						<a class="button button-secondary preview right" target="_blank" href="https://wp-themes.com/zerius"><?php esc_html_e( 'Live Preview','openlab-txtd'); ?></a>
						<div class="openlab-txtd-clear"></div>
					</div>
				<?php } else { ?>
				<div class="theme-details active">
					<span class="theme-name"><?php echo esc_html_e( 'Zerius - Current theme', 'openlab-txtd' ); ?></span>
					<a class="button button-secondary customize right" target="_blank" href="<?php echo get_site_url(). '/wp-admin/customize.php' ?>"><?php esc_html_e('Customize','openlab-txtd'); ?></a>
					<div class="openlab-txtd-clear"></div>
				</div>
				<?php } ?>
			</div>
		</div>

	</div>

</div>
