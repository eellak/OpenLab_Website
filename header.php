<?php
/**
 * The Header for our theme.
 * Displays all of the <head> section and everything up till <div id="content">
 */
?><!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<!--[if lt IE 9]>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
<link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/ie.css" type="text/css">
<![endif]-->

<?php

if ( ! function_exists( '_wp_render_title_tag' ) ) :
    function openlab_old_render_title() {
?>
<title><?php wp_title( '-', true, 'right' ); ?></title>
<?php
    }
    add_action( 'wp_head', 'openlab_old_render_title' );
endif;

wp_head(); ?>

</head>

<?php if(isset($_POST['scrollPosition'])): ?>

	<body <?php body_class(); ?> onLoad="window.scrollTo(0,<?php echo intval($_POST['scrollPosition']); ?>)">

<?php else: ?>

	<body <?php body_class(); ?> >

<?php endif;

	global $wp_customize;

	/* Preloader */

	if(is_front_page() && !isset( $wp_customize ) && get_option( 'show_on_front' ) != 'page' ):

		$openlab_disable_preloader = get_theme_mod('openlab_disable_preloader');

		if( isset($openlab_disable_preloader) && ($openlab_disable_preloader != 1)):
			echo '<div class="preloader">';
				echo '<div class="status">&nbsp;</div>';
			echo '</div>';
		endif;

	endif; ?>


<div id="mobilebgfix">
	<div class="mobile-bg-fix-img-wrap">
		<div class="mobile-bg-fix-img"></div>
	</div>
	<div class="mobile-bg-fix-whole-site">


<header id="home" class="header">

	<div id="main-nav" class="navbar navbar-inverse bs-docs-nav" role="banner">

		<div class="container">

			<div class="navbar-header responsive-logo">

				<button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">

				<span class="sr-only"></span>

				<span class="icon-bar open"></span>

				<span class="icon-bar open"></span>

				<span class="icon-bar open"></span>

        <span class="icon-bar first closed"></span>

        <span class="icon-bar second closed"></span>


				</button>
        <?php
        $openlab_logo_responsive = get_theme_mod('openlab_logo_light', get_stylesheet_directory_uri().'/images/openlab-light.svg');

        if(isset($openlab_logo_responsive) && $openlab_logo_responsive != ""):
          echo ' <span class="icon-wrap-responsive">';
          echo '  <a class="home-responsive" href="'. esc_url( home_url( '/' ) ) .'" alt="'. get_bloginfo('title') .'">';
          echo '    <img class="logo-light" src="'. $openlab_logo_responsive .'">';
          echo '  </a>';
          echo '</span>';
        endif;
        ?>
				<?php

					$openlab_logo = get_theme_mod('openlab_logo', get_stylesheet_directory_uri().'/images/openlab-logo.svg');

          /*Logo and Fixed Marks*/

          if(isset($openlab_logo) && $openlab_logo != ""):
            echo '<div class="fixed-mark-openlab top-right">';
  					echo '<a href="'.esc_url( home_url( '/' ) ).'">';
  							echo '<img src="'.$openlab_logo.'" alt="'.get_bloginfo('title').'" class="top-right openlab-logo">';
  						echo '</a>';
            echo '</div>';
          endif;


          echo '<div class="fixed-mark-openlab top-left"><img src="'.get_stylesheet_directory_uri().'/images/openlab-mark.svg" class="top-left" /></div>';
          echo '<div class="fixed-mark-openlab bottom-left"><img src="'.get_stylesheet_directory_uri().'/images/openlab-mark.svg" class="bottom-left" /></div>';
          echo '<div id="scroll-top" class="fixed-mark-openlab bottom-right">
                  <svg class="bottom-right"version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                    viewBox="0 0 30 30" style="enable-background:new 0 0 30 30;" xml:space="preserve">
                    <polygon class="st0" points="0,0 0,30 8.5,30 8.5,8.5 30,8.5 30,0 "/>
                  </svg>
                </div>';

				?>

			</div>

			<nav class="navbar-collapse bs-navbar-collapse collapse" role="navigation"   id="site-navigation">
				<?php wp_nav_menu( array('theme_location' => 'primary', 'container' => false, 'menu_class' => 'nav navbar-nav responsive-nav main-nav-list', 'fallback_cb'     => 'openlab_wp_page_menu')); ?>
			</nav>

		</div>

	</div>
	<!-- / END TOP BAR -->
