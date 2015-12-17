<?php
/**
 * Getting started template
 */

$customizer_url = admin_url() . 'customize.php' ;
?>

<div id="getting_started" class="openlab-txtd-tab-pane active">

	<div class="openlab-tab-pane-center">

		<h1 class="openlab-txtd-welcome-title">Welcome to Openlab Lite! <?php if( !empty($openlab_lite['Version']) ): ?> <sup id="openlab-txtd-theme-version"><?php echo esc_attr( $openlab_lite['Version'] ); ?> </sup><?php endif; ?></h1>

		<p><?php esc_html_e( 'Our most popular free one page WordPress theme, Openlab Lite!','openlab-txtd'); ?></p>
		<p><?php esc_html_e( 'We want to make sure you have the best experience using Openlab Lite and that is why we gathered here all the necessary informations for you. We hope you will enjoy using Openlab Lite, as much as we enjoy creating great products.', 'openlab-txtd' ); ?>

	</div>

	<hr />

	<div class="openlab-tab-pane-center">

		<h1><?php esc_html_e( 'Getting started', 'openlab-txtd' ); ?></h1>

		<h4><?php esc_html_e( 'Customize everything in a single place.' ,'openlab-txtd' ); ?></h4>
		<p><?php esc_html_e( 'Using the WordPress Customizer you can easily customize every aspect of the theme.', 'openlab-txtd' ); ?></p>
		<p><a href="<?php echo esc_url( $customizer_url ); ?>" class="button button-primary"><?php esc_html_e( 'Go to Customizer', 'openlab-txtd' ); ?></a></p>

	</div>

	<hr />

	<div class="openlab-tab-pane-center">

		<h1><?php esc_html_e( 'FAQ', 'openlab-txtd' ); ?></h1>

	</div>

	<div class="openlab-tab-pane-half openlab-tab-pane-first-half">

		<h4><?php esc_html_e( 'Create a child theme', 'openlab-txtd' ); ?></h4>
		<p><?php esc_html_e( 'If you want to make changes to the theme\'s files, those changes are likely to be overwritten when you next update the theme. In order to prevent that from happening, you need to create a child theme. For this, please follow the documentation below.', 'openlab-txtd' ); ?></p>
		<p><a href="http://docs.themeisle.com/article/14-how-to-create-a-child-theme/" class="button"><?php esc_html_e( 'View how to do this', 'openlab-txtd' ); ?></a></p>

		<hr />

		<h4><?php esc_html_e( 'Slider in big title section', 'openlab-txtd' ); ?></h4>
		<p><?php esc_html_e( 'If you are in the position where you want to change the default appearance of the big title section, you may want to replace it with a nice looking slider. This can be accomplished by following the documention below.', 'openlab-txtd' ); ?></p>
		<p><a href="http://docs.themeisle.com/article/13-replacing-big-title-section-with-an-image-slider/" class="button"><?php esc_html_e( 'View how to do this', 'openlab-txtd' ); ?></a></p>

		<hr />
		
		
		
		<h4><?php esc_html_e( 'Translate Openlab Lite', 'openlab-txtd' ); ?></h4>
		<p><?php esc_html_e( 'In the below documentation you will find an easy way to translate Openlab Lite into your native language or any other language you need for you site.', 'openlab-txtd' ); ?></p>
		<p><a href="http://docs.themeisle.com/article/80-how-to-translate-openlab" class="button"><?php esc_html_e( 'View how to do this', 'openlab-txtd' ); ?></a></p>

		<hr />

		<h4><?php esc_html_e( 'Change dimensions for footer social icons', 'openlab-txtd' ); ?></h4>
		<p><?php esc_html_e( 'In the below documentation you will find an easy way to change the default dimensions for you social icons.', 'openlab-txtd' ); ?></p>
		<p><a href="http://docs.themeisle.com/article/38-change-dimensions-for-footer-icons/" class="button"><?php esc_html_e( 'View how to do this', 'openlab-txtd' ); ?></a></p>

		<hr />

		<h4><?php esc_html_e( 'Turn off the animations', 'openlab-txtd' ); ?></h4>
		<p><?php esc_html_e( 'You can turn off the animation effects you see when Openlab Lite loads a section in an easy way with just few changes. Check the documentation below.', 'openlab-txtd' ); ?></p>
		<p><a href="http://docs.themeisle.com/article/15-turn-off-loading-animations-in-openlab/" class="button"><?php esc_html_e( 'View how to do this', 'openlab-txtd' ); ?></a></p>

		<hr />

		<h4><?php esc_html_e( 'Replace the skills section with an image', 'openlab-txtd' ); ?></h4>
		<p><?php esc_html_e( 'If you feel the default About us section is not exactly what you need, you can maybe try change it with an image.', 'openlab-txtd' ); ?></p>
		<p><a href="http://docs.themeisle.com/article/60-replacing-skills-section-with-an-image-in-openlab" class="button"><?php esc_html_e( 'View how to do this', 'openlab-txtd' ); ?></a></p>
		
		<hr />
		
		<h4><?php esc_html_e( 'Add a search bar in the top menu', 'openlab-txtd' ); ?></h4>
		<p><?php esc_html_e( 'Find out how to add a search bar in the top menu bar, in an easy way be following the link below.', 'openlab-txtd' ); ?></p>
		<p><a href="http://docs.themeisle.com/article/78-openlab-adding-a-search-bar-in-the-top-menu" class="button"><?php esc_html_e( 'View how to do this', 'openlab-txtd' ); ?></a></p>

	</div>

	<div class="openlab-tab-pane-half">

		<h4><?php esc_html_e( 'Speed up your site', 'openlab-txtd' ); ?></h4>
		<p><?php esc_html_e( 'If you find yourself in the situation where everything on your site is running very slow, you might consider having a look at the below documentation where you will find the most common issues causing this and possible solutions for each of the issues.', 'openlab-txtd' ); ?></p>
		<p><a href="http://docs.themeisle.com/article/63-speed-up-your-wordpress-site/" class="button"><?php esc_html_e( 'View how to do this', 'openlab-txtd' ); ?></a></p>

		<hr />

		<h4><?php esc_html_e( 'Link Menu to sections', 'openlab-txtd' ); ?></h4>
		<p><?php esc_html_e( 'Linking the frontpage sections with the top menu is very simple, all you need to do is assign section anchors to the menu. In the below documentation you will find a nice tutorial about this.', 'openlab-txtd' ); ?></p>
		<p><a href="http://docs.themeisle.com/article/33-how-to-link-menus-to-sections-in-openlab/" class="button"><?php esc_html_e( 'View how to do this', 'openlab-txtd' ); ?></a></p>

		<hr />

		<h4><?php esc_html_e( 'Change anchors', 'openlab-txtd' ); ?></h4>
		<p><?php esc_html_e( 'To better suit your site\'s needs, you can change each section\'s anchor to what you want. The entire process is described below.', 'openlab-txtd' ); ?></p>
		<p><a href="http://docs.themeisle.com/article/36-how-to-change-section-anchor-in-openlab/" class="button"><?php esc_html_e( 'View how to do this', 'openlab-txtd' ); ?></a></p>

		<hr />

		<h4><?php esc_html_e( 'Change the page template', 'openlab-txtd' ); ?></h4>
		<p><?php esc_html_e( 'Openlab Lite has three page templates available, two for the blog and one for full width pages. To make sure you take full advantage of those page templates, make sure you read the documentation.', 'openlab-txtd' ); ?></p>
		<p><a href="http://docs.themeisle.com/article/32-how-to-change-the-page-template-in-wordpress" class="button"><?php esc_html_e( 'View how to do this', 'openlab-txtd' ); ?></a></p>

		<hr />

		<h4><?php esc_html_e( 'Remove the opacity', 'openlab-txtd' ); ?></h4>
		<p><?php esc_html_e( 'You don\'t like the way Openlab Lite looks with its background opacity? No problem. Just remove it using the steps below.', 'openlab-txtd' ); ?></p>
		<p><a href="http://docs.themeisle.com/article/30-removing-background-opacity-in-openlab/" class="button"><?php esc_html_e( 'View how to do this', 'openlab-txtd' ); ?></a></p>
		
		<hr />
		
		<h4><?php esc_html_e( 'Configure the portfolio', 'openlab-txtd' ); ?></h4>
		<p><?php esc_html_e( 'Set up your portfolio section in an easy way be following the link below.', 'openlab-txtd' ); ?></p>
		<p><a href="http://docs.themeisle.com/article/85-configuring-portfolio/" class="button"><?php esc_html_e( 'View how to do this', 'openlab-txtd' ); ?></a></p>
		
		<hr />
		
		<h4><?php esc_html_e( '30 Experts Share: The Top *Non-Obvious* WordPress Plugins That’ll Make You a Better Blogger', 'openlab-txtd' ); ?></h4>
		<p><?php esc_html_e( ' At the address below you will find a cool set of original WordPress plugins that can give you great benefits despite being a little lesser known out there.', 'openlab-txtd' ); ?></p>
		<p><a href="http://www.codeinwp.com/blog/top-non-obvious-wordpress-plugins/" class="button"><?php esc_html_e( 'Read more', 'openlab-txtd' ); ?></a></p>

	</div>

	<div class="openlab-txtd-clear"></div>

	<hr />

	<div class="openlab-tab-pane-center">

		<h1><?php esc_html_e( 'View full documentation', 'openlab-txtd' ); ?></h1>
		<p><?php esc_html_e( 'Need more details? Please check our full documentation for detailed information on how to use Openlab Lite.', 'openlab-txtd' ); ?></p>
		<p><a href="http://themeisle.com/documentation-openlab-txtd/" class="button button-primary"><?php esc_html_e( 'Read full documentation', 'openlab-txtd' ); ?></a></p>

	</div>

	<hr />

	<div class="openlab-tab-pane-center">
		<h1><?php esc_html_e( 'Recommended plugins', 'openlab-txtd' ); ?></h1>
	</div>

	<div class="openlab-tab-pane-half openlab-tab-pane-first-half">

		<!-- WP Product Review -->
		<h4><?php esc_html_e( 'WP Product Review', 'openlab-txtd' ); ?></h4>
		<p><?php esc_html_e( 'Easily turn your basic posts into in-depth reviews with ratings, pros and cons, affiliate links, rich snippets and user reviews.', 'openlab-txtd' ); ?></p>

		<?php if ( is_plugin_active( 'wp-product-review/wp-product-review.php' ) ) { ?>

				<p><span class="openlab-txtd-w-activated button"><?php esc_html_e( 'Already activated', 'openlab-txtd' ); ?></span></p>

			<?php
		}
		else { ?>

				<p><a href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=wp-product-review' ), 'install-plugin_wp-product-review' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Install WP Product Review', 'openlab-txtd' ); ?></a></p>

			<?php
		}

		?>

		<hr />

		<!-- Custom Login Customizer -->
		<h4><?php esc_html_e( 'Custom Login Customizer', 'openlab-txtd' ); ?></h4>
		<p><?php esc_html_e( 'Login Customizer plugin allows you to easily customize your login page straight from your WordPress Customizer! You can preview your changes before you save them!', 'openlab-txtd' ); ?></p>

		<?php if ( is_plugin_active( 'login-customizer/login-customizer.php' ) ) { ?>

			<p><span class="openlab-txtd-w-activated button"><?php esc_html_e( 'Already activated', 'openlab-txtd' ); ?></span></p>

			<?php
		}
		else { ?>

			<p><a href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=login-customizer' ), 'install-plugin_login-customizer' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Install Custom Login Customizer', 'openlab-txtd' ); ?></a></p>

			<?php
		}
		?>
		
		<hr />
		
		<!-- Revive Old Post -->
		<h4><?php esc_html_e( 'Revive Old Post', 'openlab-txtd' ); ?></h4>
		<p><?php esc_html_e( 'A plugin to share about your old posts on twitter, facebook, linkedin to get more hits for them and keep them alive.', 'openlab-txtd' ); ?></p>

		<?php if ( is_plugin_active( 'tweet-old-post/tweet-old-post.php' ) ) { ?>

			<p><span class="openlab-txtd-w-activated button"><?php esc_html_e( 'Already activated', 'openlab-txtd' ); ?></span></p>

			<?php
		}
		else { ?>

			<p><a href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=tweet-old-post' ), 'install-plugin_tweet-old-post' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Install Revive Old Post', 'openlab-txtd' ); ?></a></p>

			<?php
		}
		?>

	</div>

	<div class="openlab-tab-pane-half">

		<!-- ShortPixel Image Optimizer -->
		<h4><?php esc_html_e( 'ShortPixel Image Optimizer', 'openlab-txtd' ); ?></h4>
		<p><?php esc_html_e( 'Fast, easy-to-use and lightweight plugin that optimizes images & PDFs. Preserve a high visual quality of images and make your website load faster!', 'openlab-txtd' ); ?></p>

		<?php if ( is_plugin_active( 'shortpixel-image-optimiser/wp-shortpixel.php' ) ) { ?>

				<p><span class="openlab-txtd-w-activated button"><?php esc_html_e( 'Already activated', 'openlab-txtd' ); ?></span></p>

			<?php
		}
		else { ?>

			<p><a href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=shortpixel-image-optimiser' ), 'install-plugin_shortpixel-image-optimiser' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Install ShortPixel Image Optimizer', 'openlab-txtd' ); ?></a></p>

			<?php
		}
		?>

		<hr />

		<!-- Visualizer: Charts and Graphs -->
		<h4><?php esc_html_e( 'Visualizer: Charts and Graphs', 'openlab-txtd' ); ?></h4>
		<p><?php esc_html_e( 'A simple, easy to use and quite powerful chart tool to create, manage and embed interactive charts into your WordPress posts and pages.', 'openlab-txtd' ); ?></p>

		<?php if ( class_exists( 'Visualizer_Plugin' ) ) { ?>

			<p><span class="openlab-txtd-w-activated button"><?php esc_html_e( 'Already activated', 'openlab-txtd' ); ?></span></p>

			<?php
		}
		else { ?>

			<p><a href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=visualizer' ), 'install-plugin_visualizer' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Install Visualizer', 'openlab-txtd' ); ?></a></p>

			<?php
		}
		?>

	</div>

	<div class="openlab-txtd-clear"></div>

</div>
