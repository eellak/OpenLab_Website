<?php
/**
 * Openlab Lite functions and definitions
 */

function openlab_setup() {

	global $content_width;

    if (!isset($content_width)) {
        $content_width = 640;
    }
	if(!defined('OPENLAB_PATH_IMG')):
		define( "OPENLAB_PATH_IMG", get_template_directory() .'/images' );
	endif;
    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on openlab, use a find and replace
     * to change 'openlab-txtd' to the name of your theme in all the template files
     */
    load_theme_textdomain('openlab-txtd', get_template_directory() . '/languages');

    add_theme_support('automatic-feed-links');

    /*
     * Enable support for Post Thumbnails on posts and pages.
     */
    add_theme_support('post-thumbnails');

    /* Set the image size by cropping the image */
    add_image_size('post-thumbnail', 250, 250, true);
    add_image_size( 'post-thumbnail-large', 750, 500, true ); /* blog thumbnail */
    add_image_size( 'post-thumbnail-large-table', 600, 300, true ); /* blog thumbnail for table */
    add_image_size( 'post-thumbnail-large-mobile', 400, 200, true ); /* blog thumbnail for mobile */
		add_image_size('openlab_project_photo', 285, 214, true);
    add_image_size('openlab_our_team_photo', 174, 174, true);

	/* Register primary menu */
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'openlab-txtd'),
    ));

    /* Enable support for Post Formats. */
    //add_theme_support('post-formats', array('aside', 'image', 'video', 'quote', 'link'));

    /* Setup the WordPress core custom background feature. */
    add_theme_support('custom-background', apply_filters('openlab_custom_background_args', array(
        'default-color' => 'ffffff',
        'default-image' => get_stylesheet_directory_uri() . "/images/slide1.jpg",
    )));

    /* Enable support for HTML5 markup. */
    add_theme_support('html5', array(
        'comment-list',
        'search-form',
        'comment-form',
        'gallery',
    ));

	/* Enable support for title-tag */
	add_theme_support( 'title-tag' );

	/* Custom template tags for this theme. */
	require get_template_directory() . '/inc/template-tags.php';

	/* Custom functions that act independently of the theme templates. */
	require get_template_directory() . '/inc/extras.php';

	/* Customizer additions. */
	require get_template_directory() . '/inc/customizer.php';

	/* tgm-plugin-activation */
    require_once get_template_directory() . '/class-tgm-plugin-activation.php';

    /* woocommerce support */
	add_theme_support( 'woocommerce' );

	/*******************************************/
    /*************  Welcome screen *************/
    /*******************************************/

	if ( is_admin() ) {

        global $openlab_required_actions;

        /*
         * id - unique id; required
         * title
         * description
         * check - check for plugins (if installed)
         * plugin_slug - the plugin's slug (used for installing the plugin)
         *
         */
        $openlab_required_actions = array(
            array(
			                "id" => 'openlab-txtd-req-ac-install-pirate-forms',
			                "title" => esc_html__( 'Install Pirate Forms' ,'openlab-txtd' ),
			                "description"=> esc_html__( 'Please make sure you install the Pirate Forms plugin.','openlab-txtd' ),
			                "check" => defined("PIRATE_FORMS_VERSION"),
			                "plugin_slug" => 'pirate-forms'
            ),
						array(
			                "id" => 'openlab-txtd-req-ac-install-meta-box',
			                "title" => esc_html__( 'Install Meta box' ,'openlab-txtd' ),
			                "description"=> esc_html__( 'Please make sure you install the Meta Box plugin.','openlab-txtd' ),
			                "check" => defined('RWMB_VER'),
			                "plugin_slug" => 'meta-box'
			    	),
						array(
			                "id" => 'openlab-txtd-req-ac-install-ninja-forms',
			                "title" => esc_html__( 'Install Ninja Forms' ,'openlab-txtd' ),
			                "description"=> esc_html__( 'Please make sure you install the Ninja Forms plugin.','openlab-txtd' ),
			                "check" => defined('NF_PLUGIN_VERSION'),
			                "plugin_slug" => 'ninja-forms'
			    	),
						array(
			                "id" => 'openlab-txtd-req-ac-install-cff',
			                "title" => esc_html__( 'Install Custom Facebook Feed' ,'openlab-txtd' ),
			                "description"=> esc_html__( 'Please make sure you install the Facebook Feed plugin.','openlab-txtd' ),
			                "check" => defined('CFFVER'),
			                "plugin_slug" => 'custom-facebook-feed'
            ),
            array(
			                "id" => 'openlab-txtd-req-ac-check-pirate-forms',
			                "title" => esc_html__( 'Check the contact form after installing Pirate Forms' ,'openlab-txtd' ),
			                "description"=> esc_html__( "After installing the Pirate Forms plugin, please make sure you check your frontpage contact form is working fine. Also, if you use Openlab Lite in other language(s) please make sure the translation is ok. If not, please translate the contact form again.",'openlab-txtd' ),
            ),

        );

		require get_template_directory() . '/inc/admin/welcome-screen/welcome-screen.php';
	}
}

add_action('after_setup_theme', 'openlab_setup');

/**
 * Register widgetized area and update sidebar with default widgets.
 */

function openlab_widgets_init() {

	register_sidebar(array(
        'name' => __('Sidebar', 'openlab-txtd'),
        'id' => 'sidebar-1',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    /*register_sidebar(array(
        'name' => __('About us section', 'openlab-txtd'),
        'id' => 'sidebar-aboutus',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h1 class="widget-title">',
        'after_title' => '</h1>',
    ));*/

}

add_action('widgets_init', 'openlab_widgets_init');

function openlab_slug_fonts_url() {
    $fonts_url = '';
     /* Translators: If there are characters in your language that are not
    * supported by Lora, translate this to 'off'. Do not translate
    * into your own language.
    */
    $lato = _x( 'on', 'Lato font: on or off', 'openlab-txtd' );
    $homemade = _x( 'on', 'Homemade font: on or off', 'openlab-txtd' );
    /* Translators: If there are characters in your language that are not
    * supported by Open Sans, translate this to 'off'. Do not translate
    * into your own language.
    */
    $monserrat = _x( 'on', 'Monserrat font: on or off', 'openlab-txtd' );
     if ( 'off' !== $lato || 'off' !== $monserrat|| 'off' !== $homemade ) {
        $font_families = array();

        if ( 'off' !== $lato ) {
            $font_families[] = 'Lato:300,400,700,400italic';
        }
         if ( 'off' !== $monserrat ) {
            $font_families[] = 'Montserrat:700';
        }

        if ( 'off' !== $homemade ) {
            $font_families[] = 'Homemade Apple';
        }
         $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );
         $fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
    }
     return $fonts_url;
}
/**
 * Enqueue scripts and styles.
 */

function openlab_scripts() {

	//wp_enqueue_style('openlab_font', openlab_slug_fonts_url(), array(), null );

    //wp_enqueue_style( 'openlab_font_all', '//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600italic,600,700,700italic,800,800italic');

    wp_enqueue_style('openlab_bootstrap_style', get_template_directory_uri() . '/css/bootstrap.css');

    wp_style_add_data( 'openlab_bootstrap_style', 'rtl', 'replace' );

    wp_enqueue_style('openlab_fontawesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), 'v1');

    wp_enqueue_style('openlab_pixeden_style', get_template_directory_uri() . '/css/pixeden-icons.css', array('openlab_fontawesome'), 'v1');

    wp_enqueue_style('openlab_style', get_stylesheet_uri(), array('openlab_pixeden_style'), 'v1');

    wp_enqueue_style('openlab_responsive_style', get_template_directory_uri() . '/css/responsive.css', array('openlab_style'), 'v1');

		wp_enqueue_style('openlab_custom_style', get_template_directory_uri() . '/css/main.css', array(), 'v1');

    if ( wp_is_mobile() ){

        wp_enqueue_style( 'openlab_style_mobile', get_template_directory_uri() . '/css/style-mobile.css', array('openlab_bootstrap_style', 'openlab_style'),'v1' );

    }

    wp_enqueue_script('jquery');

    /* Bootstrap script */
    wp_enqueue_script('openlab_bootstrap_script', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '20120206', true);

    /* Flickity Slider */
    wp_enqueue_script('openlab_flickity', get_template_directory_uri() . '/js/flickity.js', array("jquery"), '20120206', true);

		/* Perfect ScrollBar */
		wp_enqueue_script('openlab_perfect_scrolbar', get_template_directory_uri() . '/js/perfect-scrollbar.jquery.js', array("jquery"), '20120206', true);

		/* Flickity */
		wp_enqueue_script('openlab_flickity', get_template_directory_uri() . '/js/flickity.js', array("jquery"), '20120206', true);

		/* Smootscroll script */
    $openlab_disable_smooth_scroll = get_theme_mod('openlab_disable_smooth_scroll');
    if( isset($openlab_disable_smooth_scroll) && ($openlab_disable_smooth_scroll != 1)):
        wp_enqueue_script('openlab_smoothscroll', get_template_directory_uri() . '/js/smoothscroll.js', array("jquery"), '20120206', true);
    endif;

		/* scrollReveal script */
		if ( !wp_is_mobile() ){
			wp_enqueue_script( 'openlab_scrollReveal_script', get_template_directory_uri() . '/js/scrollReveal.js', array("jquery"), '20120206', true  );
		}

    /* openlab script */
    wp_enqueue_script('openlab_script', get_template_directory_uri() . '/js/openlab.js', array("jquery"), '20120206', true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {

        wp_enqueue_script('comment-reply');

    }

    /* parallax effect */
    if ( !wp_is_mobile() ){

        /* include parallax only if on frontpage and the parallax effect is activated */
        $openlab_parallax_use = get_theme_mod('openlab_parallax_show');

        if ( !empty($openlab_parallax_use) && ($openlab_parallax_use == 1) && is_front_page() ):

            wp_enqueue_script( 'openlab_parallax', get_template_directory_uri() . '/js/parallax.js', array("jquery"), 'v1', true  );

        endif;
    }

	add_editor_style('/css/custom-editor-style.css');

}
add_action('wp_enqueue_scripts', 'openlab_scripts');

add_action('tgmpa_register', 'openlab_register_required_plugins');

function openlab_register_required_plugins() {

	$wp_version_nr = get_bloginfo('version');

	if( $wp_version_nr < 3.9 ):

		$plugins = array(
			array(
				'name' => 'Widget customizer',
				'slug' => 'widget-customizer',
				'required' => false
			),
			array(
				'name'      => 'Pirate Forms',
				'slug'      => 'pirate-forms',
				'required'  => true,
			),
			array(
				'name'      => 'Ninja Forms',
				'slug'      => 'ninja-forms',
				'required'  => true,
			),
			array(
				'name'      => 'Custom Facebook Feed',
				'slug'      => 'custom-facebook-feed',
				'required'  => true,
			)
		);

	else:

		$plugins = array(
			array(
				'name'      => 'Pirate Forms',
				'slug'      => 'pirate-forms',
				'required'  => true,
			),
			array(
				'name'      => 'Ninja Forms',
				'slug'      => 'ninja-forms',
				'required'  => true,
			),
			array(
				'name'      => 'Custom Facebook Feed',
				'slug'      => 'custom-facebook-feed',
				'required'  => true,
			)
		);

	endif;

    $config = array(
        'default_path' => '',
        'menu' => 'tgmpa-install-plugins',
        'has_notices' => true,
        'dismissable' => true,
        'dismiss_msg' => '',
        'is_automatic' => false,
        'message' => '',
        'strings' => array(
            'page_title' => __('Install Required Plugins', 'openlab-txtd'),
            'menu_title' => __('Install Plugins', 'openlab-txtd'),
            'installing' => __('Installing Plugin: %s', 'openlab-txtd'),
            'oops' => __('Something went wrong with the plugin API.', 'openlab-txtd'),
            'notice_can_install_required' => _n_noop('This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.','openlab-txtd'),
            'notice_can_install_recommended' => _n_noop('This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.','openlab-txtd'),
            'notice_cannot_install' => _n_noop('Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.','openlab-txtd'),
            'notice_can_activate_required' => _n_noop('The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.','openlab-txtd'),
            'notice_can_activate_recommended' => _n_noop('The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.','openlab-txtd'),
            'notice_cannot_activate' => _n_noop('Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.','openlab-txtd'),
            'notice_ask_to_update' => _n_noop('The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.','openlab-txtd'),
            'notice_cannot_update' => _n_noop('Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.','openlab-txtd'),
            'install_link' => _n_noop('Begin installing plugin', 'Begin installing plugins','openlab-txtd'),
            'activate_link' => _n_noop('Begin activating plugin', 'Begin activating plugins','openlab-txtd'),
            'return' => __('Return to Required Plugins Installer', 'openlab-txtd'),
            'plugin_activated' => __('Plugin activated successfully.', 'openlab-txtd'),
            'complete' => __('All plugins installed and activated successfully. %s', 'openlab-txtd'),
            'nag_type' => 'updated'
        )
    );

    tgmpa($plugins, $config);

}

/* Load Jetpack compatibility file. */

require get_template_directory() . '/inc/jetpack.php';

function openlab_wp_page_menu() {

	echo '<ul class="nav navbar-nav navbar-right responsive-nav main-nav-list">';

		wp_list_pages(array('title_li' => '', 'depth' => 1));

    echo '</ul>';

}

add_filter('the_title', 'openlab_default_title');

function openlab_default_title($title) {

	if ($title == '')

        $title = __("Default title",'openlab-txtd');

    return $title;

}

/*****************************************/
/******          WIDGETS     *************/
/*****************************************/

add_action('widgets_init', 'openlab_register_widgets');

function openlab_register_widgets() {

	//register_widget('openlab_ourfocus');
	//register_widget('openlab_map_details_widget');
  register_widget('openlab_team_widget');
	//register_widget('openlab_next_event_widget');
	//register_widget('openlab_latest_post_widget');
	register_widget('openlab_events_archive_widget');

	//Sidebars
	$openlab_lite_sidebars = array (
	/* 'sidebar-ourfocus' => 'sidebar-ourfocus', */
	/* 'sidebar-testimonials' => 'sidebar-testimonials',*/
	'sidebar-ourteam' => 'sidebar-ourteam' );

	/* Register sidebars */
	foreach ( $openlab_lite_sidebars as $openlab_lite_sidebar ):

		/*if( $openlab_lite_sidebar == 'sidebar-ourfocus' ):

			$openlab_lite_name = __('Our focus section widgets', 'openlab-txtd');

		else */
		if( $openlab_lite_sidebar == 'sidebar-ourteam' ):

			$openlab_lite_name = __('Our team section widgets', 'openlab-txtd');

		else:

			$openlab_lite_name = $openlab_lite_sidebar;

		endif;

        register_sidebar(
            array (
                'name'          => $openlab_lite_name,
                'id'            => $openlab_lite_sidebar,
                'before_widget' => '',
                'after_widget'  => ''
            )
        );

    endforeach;

}

/**
 * Add default widgets
 */
add_action('after_switch_theme', 'openlab_register_default_widgets');

function openlab_register_default_widgets() {

	$openlab_lite_sidebars = array (
	/* 'sidebar-ourfocus' => 'sidebar-ourfocus', */
	'sidebar-ourteam' => 'sidebar-ourteam'
);

	$active_widgets = get_option( 'sidebars_widgets' );

	/**
     * Default Our Focus widgets
     */
	/* if ( empty ( $active_widgets[ $openlab_lite_sidebars['sidebar-ourfocus'] ] ) ):

		$openlab_lite_counter = 1;

        /* our focus widget #1
		$active_widgets[ 'sidebar-ourfocus' ][0] = 'ctup-ads-widget-' . $openlab_lite_counter;
        if ( file_exists( get_stylesheet_directory_uri().'/images/parallax.png' ) ):
            $ourfocus_content[ $openlab_lite_counter ] = array ( 'title' => 'PARALLAX EFFECT', 'text' => 'Create memorable pages with smooth parallax effects that everyone loves. Also, use our lightweight content slider offering you smooth and great-looking animations.', 'link' => '#', 'image_uri' => get_stylesheet_directory_uri()."/images/parallax.png" );
        else:
            $ourfocus_content[ $openlab_lite_counter ] = array ( 'title' => 'PARALLAX EFFECT', 'text' => 'Create memorable pages with smooth parallax effects that everyone loves. Also, use our lightweight content slider offering you smooth and great-looking animations.', 'link' => '#', 'image_uri' => get_template_directory_uri()."/images/parallax.png" );
        endif;
        update_option( 'widget_ctup-ads-widget', $ourfocus_content );
        $openlab_lite_counter++;

        /* our focus widget #2
        $active_widgets[ 'sidebar-ourfocus' ][] = 'ctup-ads-widget-' . $openlab_lite_counter;
        if ( file_exists( get_stylesheet_directory_uri().'/images/woo.png' ) ):
            $ourfocus_content[ $openlab_lite_counter ] = array ( 'title' => 'WOOCOMMERCE', 'text' => 'Build a front page for your WooCommerce store in a matter of minutes. The neat and clean presentation will help your sales and make your store accessible to everyone.', 'link' => '#', 'image_uri' => get_stylesheet_directory_uri()."/images/woo.png" );
        else:
            $ourfocus_content[ $openlab_lite_counter ] = array ( 'title' => 'WOOCOMMERCE', 'text' => 'Build a front page for your WooCommerce store in a matter of minutes. The neat and clean presentation will help your sales and make your store accessible to everyone.', 'link' => '#', 'image_uri' => get_template_directory_uri()."/images/woo.png" );
        endif;
        update_option( 'widget_ctup-ads-widget', $ourfocus_content );
        $openlab_lite_counter++;

        /* our focus widget #3
        $active_widgets[ 'sidebar-ourfocus' ][] = 'ctup-ads-widget-' . $openlab_lite_counter;
        if ( file_exists( get_stylesheet_directory_uri().'/images/ccc.png' ) ):
            $ourfocus_content[ $openlab_lite_counter ] = array ( 'title' => 'CUSTOM CONTENT BLOCKS', 'text' => 'Showcase your team, products, clients, about info, testimonials, latest posts from the blog, contact form, additional calls to action. Everything translation ready.', 'link' => '#', 'image_uri' => get_stylesheet_directory_uri()."/images/ccc.png" );
        else:
            $ourfocus_content[ $openlab_lite_counter ] = array ( 'title' => 'CUSTOM CONTENT BLOCKS', 'text' => 'Showcase your team, products, clients, about info, testimonials, latest posts from the blog, contact form, additional calls to action. Everything translation ready.', 'link' => '#', 'image_uri' => get_template_directory_uri()."/images/ccc.png" );
        endif;
        update_option( 'widget_ctup-ads-widget', $ourfocus_content );
        $openlab_lite_counter++;

        /* our focus widget #4
        $active_widgets[ 'sidebar-ourfocus' ][] = 'ctup-ads-widget-' . $openlab_lite_counter;
        if ( file_exists( get_stylesheet_directory_uri().'/images/ti-logo.png' ) ):
            $ourfocus_content[ $openlab_lite_counter ] = array ( 'title' => 'GO PRO FOR MORE FEATURES', 'text' => 'Get new content blocks: pricing table, Google Maps, and more. Change the sections order, display each block exactly where you need it, customize the blocks with whatever colors you wish.', 'link' => '#', 'image_uri' => get_stylesheet_directory_uri()."/images/ti-logo.png" );
        else:
            $ourfocus_content[ $openlab_lite_counter ] = array ( 'title' => 'GO PRO FOR MORE FEATURES', 'text' => 'Get new content blocks: pricing table, Google Maps, and more. Change the sections order, display each block exactly where you need it, customize the blocks with whatever colors you wish.', 'link' => '#', 'image_uri' => get_template_directory_uri()."/images/ti-logo.png" );
        endif;
        update_option( 'widget_ctup-ads-widget', $ourfocus_content );
        $openlab_lite_counter++;

		update_option( 'sidebars_widgets', $active_widgets );

    endif;
		*/


    /**
     * Default Our Team widgets
     */
    if ( empty ( $active_widgets[ $openlab_lite_sidebars['sidebar-ourteam'] ] ) ):

        $openlab_lite_counter = 1;

        /* our team widget #1 */
        $active_widgets[ 'sidebar-ourteam' ][0] = 'openlab_team-widget-' . $openlab_lite_counter;
        $ourteam_content[ $openlab_lite_counter ] = array ( 'name' => 'ASHLEY SIMMONS', 'position' => 'Project Manager', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc dapibus, eros at accumsan auctor, felis eros condimentum quam, non porttitor est urna vel neque', 'fb_link' => '#', 'tw_link' => '#', 'bh_link' => '#', 'gp_link' => '#', 'ln_link' => '#', 'image_uri' => get_template_directory_uri()."/images/team1.png" );
        update_option( 'widget_openlab_team-widget', $ourteam_content );
        $openlab_lite_counter++;

        /* our team widget #2 */
        $active_widgets[ 'sidebar-ourteam' ][] = 'openlab_team-widget-' . $openlab_lite_counter;
        $ourteam_content[ $openlab_lite_counter ] = array ( 'name' => 'TIMOTHY SPRAY', 'position' => 'Art Director', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc dapibus, eros at accumsan auctor, felis eros condimentum quam, non porttitor est urna vel neque', 'fb_link' => '#', 'tw_link' => '#', 'bh_link' => '#', 'gp_link' => '#', 'ln_link' => '#', 'image_uri' => get_template_directory_uri()."/images/team2.png" );
        update_option( 'widget_openlab_team-widget', $ourteam_content );
        $openlab_lite_counter++;

        /* our team widget #3 */
        $active_widgets[ 'sidebar-ourteam' ][] = 'openlab_team-widget-' . $openlab_lite_counter;
        $ourteam_content[ $openlab_lite_counter ] = array ( 'name' => 'TONYA GARCIA', 'position' => 'Account Manager', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc dapibus, eros at accumsan auctor, felis eros condimentum quam, non porttitor est urna vel neque', 'fb_link' => '#', 'tw_link' => '#', 'bh_link' => '#', 'gp_link' => '#', 'ln_link' => '#', 'image_uri' => get_template_directory_uri()."/images/team3.png" );
        update_option( 'widget_openlab_team-widget', $ourteam_content );
        $openlab_lite_counter++;

        /* our team widget #4 */
        $active_widgets[ 'sidebar-ourteam' ][] = 'openlab_team-widget-' . $openlab_lite_counter;
        $ourteam_content[ $openlab_lite_counter ] = array ( 'name' => 'JASON LANE', 'position' => 'Business Development', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc dapibus, eros at accumsan auctor, felis eros condimentum quam, non porttitor est urna vel neque', 'fb_link' => '#', 'tw_link' => '#', 'bh_link' => '#', 'gp_link' => '#', 'ln_link' => '#', 'image_uri' => get_template_directory_uri()."/images/team4.png" );
        update_option( 'widget_openlab_team-widget', $ourteam_content );
        $openlab_lite_counter++;

        update_option( 'sidebars_widgets', $active_widgets );

    endif;

}

/**************************/
/****** our focus widget */
/************************/

//add_action('admin_enqueue_scripts', 'openlab_ourfocus_widget_scripts');

function openlab_ourfocus_widget_scripts() {

	wp_enqueue_media();
  wp_enqueue_script('openlab_our_focus_widget_script', get_template_directory_uri() . '/js/widget.js', false, '1.0', true);

}
/*
class openlab_ourfocus extends WP_Widget {

	public function __construct() {
		parent::__construct(
			'ctUp-ads-widget',
			__( 'Openlab - Our focus widget', 'openlab-txtd' )
		);
	}

    function widget($args, $instance) {

        extract($args);

        echo $before_widget;

        ?>

        <div class="col-lg-3 col-sm-3 focus-box" data-scrollreveal="enter left after 0.15s over 1s">

			<?php if( !empty($instance['image_uri']) ): ?>
            <div class="service-icon">

				<?php if( !empty($instance['link']) ): ?>

					<a href="<?php echo $instance['link']; ?>"><i class="pixeden" style="background:url(<?php echo esc_url($instance['image_uri']); ?>) no-repeat center;width:100%; height:100%;"></i> <!-- FOCUS ICON--></a>

				<?php else: ?>

					<i class="pixeden" style="background:url(<?php echo esc_url($instance['image_uri']); ?>) no-repeat center;width:100%; height:100%;"></i> <!-- FOCUS ICON-->

				<?php endif; ?>

            </div>
			<?php endif; ?>

            <h3 class="red-border-bottom"><?php if( !empty($instance['title']) ): echo apply_filters('widget_title', $instance['title']); endif; ?></h3>
            <!-- FOCUS HEADING -->

			<?php
				if( !empty($instance['text']) ):

					echo '<p>';
						echo htmlspecialchars_decode(apply_filters('widget_title', $instance['text']));
					echo '</p>';
				endif;
			?>

        </div>

        <?php

        echo $after_widget;

    }

    function update($new_instance, $old_instance) {

        $instance = $old_instance;
        $instance['text'] = stripslashes(wp_filter_post_kses($new_instance['text']));
        $instance['title'] = strip_tags($new_instance['title']);
				$instance['link'] = strip_tags( $new_instance['link'] );
        $instance['image_uri'] = strip_tags($new_instance['image_uri']);

        return $instance;

    }

    function form($instance) {
        ?>

        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'openlab-txtd'); ?></label><br/>
            <input type="text" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" value="<?php if( !empty($instance['title']) ): echo $instance['title']; endif; ?>" class="widefat">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('text'); ?>"><?php _e('Text', 'openlab-txtd'); ?></label><br/>
            <textarea class="widefat" rows="8" cols="20" name="<?php echo $this->get_field_name('text'); ?>" id="<?php echo $this->get_field_id('text'); ?>"><?php if( !empty($instance['text']) ): echo htmlspecialchars_decode($instance['text']); endif; ?></textarea>
        </p>
		<p>
			<label for="<?php echo $this->get_field_id('link'); ?>"><?php _e('Link','openlab-txtd'); ?></label><br />
			<input type="text" name="<?php echo $this->get_field_name('link'); ?>" id="<?php echo $this->get_field_id('link'); ?>" value="<?php if( !empty($instance['link']) ): echo $instance['link']; endif; ?>" class="widefat">
		</p>
        <p>
            <label for="<?php echo $this->get_field_id('image_uri'); ?>"><?php _e('Image', 'openlab-txtd'); ?></label><br/>
            <?php
            if ( !empty($instance['image_uri']) ) :
                echo '<img class="custom_media_image" src="' . $instance['image_uri'] . '" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" alt="'.__( 'Uploaded image', 'openlab-txtd' ).'" /><br />';
            endif;
            ?>

            <input type="text" class="widefat custom_media_url" name="<?php echo $this->get_field_name('image_uri'); ?>" id="<?php echo $this->get_field_id('image_uri'); ?>" value="<?php if( !empty($instance['image_uri']) ): echo $instance['image_uri']; endif; ?>" style="margin-top:5px;">

            <input type="button" class="button button-primary custom_media_button" id="custom_media_button" name="<?php echo $this->get_field_name('image_uri'); ?>" value="<?php _e('Upload Image','openlab-txtd'); ?>" style="margin-top:5px;"/>
        </p>
    <?php

    }

}
*/

/****************************/
/****** Next Event widget **/
/***************************/
class openlab_next_event_widget extends WP_Widget {

	public function __construct() {
		parent::__construct(
			'openlab-next-event-widget',
			__( 'Openlab - Next Event widget', 'openlab-txtd' )
		);
	}

    function widget($args, $instance) {

        extract($args);

        echo $before_widget;

        ?>
			<div class="col-lg-3 col-sm-3 focus-box next-event" data-scrollreveal="enter left after 0.15s over 1s" data-sr-init="true" data-sr-complete="true">
	      <div class="next-event-wrap">
					<?php
						$args = array( 'numberposts' => '1', 'post_type' => 'event' );
						$recent_events = wp_get_recent_posts( $args );

						if($recent_events[0]){
							$trimmed_content = wp_trim_words( $recent_events[0]['post_content'] , $num_words = 20, $more = null );
							$next_event_title = $recent_events[0]['post_title'];
							$post_permalink = get_post_permalink($recent_events[0]['ID']);
							$event_future_date = get_post_meta($recent_events[0]['ID'], 'event_datetime_start', true);

							//convert to readable Format ( example: 28 NOV )
							if($event_future_date){
								$event_future_date = gmdate("j M", $event_future_date);
							}
							if( $post_permalink ){
								echo '<div class="next-event-image-wrap">';
								if($event_future_date){
									echo '<span class="event-date">'. $event_future_date .'</span>';
								}
									echo '<a href="'. $post_permalink .'">
													<svg version="1.1" class="events-top-icon widget-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
													width="100px" height="100px" viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve">
													<path fill="#231F20" d="M60.628,36.324c-0.651,0-1.184-0.533-1.184-1.184v-8.459c0-0.65,0.532-1.184,1.184-1.184
													c0.65,0,1.183,0.533,1.183,1.184v8.459C61.811,35.791,61.278,36.324,60.628,36.324z"/>
													<path fill="#231F20" d="M38.146,36.324c-0.651,0-1.183-0.533-1.183-1.184v-8.459c0-0.65,0.531-1.184,1.183-1.184
													s1.183,0.533,1.183,1.184v8.459C39.329,35.791,38.798,36.324,38.146,36.324z"/>
													<g>
													<rect x="41.696" y="29.291" fill="#231F20" width="15.382" height="2.248"/>
													<path fill="#231F20" d="M89.514,29.291H64.178v2.248h25.336c1.242,0,2.248,1.006,2.248,2.248v37.037
													c0,1.242-1.006,2.248-2.248,2.248H9.261c-1.243,0-2.248-1.006-2.248-2.248V33.848c0-1.244,1.005-2.25,2.248-2.25h25.336V29.35
													H9.261c-2.485,0-4.556,2.012-4.556,4.557v37.035c0,2.484,2.011,4.557,4.556,4.557h80.253c2.484,0,4.556-2.014,4.556-4.557V33.848
													C94.069,31.303,91.998,29.291,89.514,29.291z"/>
													</g>
													</svg>
												</a>
											</div>';
							}
							if($next_event_title && $post_permalink){
								echo '<div class="next-event-title"><h3><a href="'. $post_permalink .'">'. $next_event_title .'</a></h3></div>';
							}
							if($trimmed_content){
								echo '<div class="next-event-content"><span>'. $trimmed_content .'</span></div>';
							}

						}
					?>

	      </div>
			</div>

        <?php

        echo $after_widget;

    }

    function update($new_instance, $old_instance) {

        $instance = $old_instance;

        return $instance;

    }

    function form($instance) {

    }

}


/****************************/
/****** Latest Post widget **/
/***************************/
class openlab_latest_post_widget extends WP_Widget {

	public function __construct() {
		parent::__construct(
			'openlab-latest-post-widget',
			__( 'Openlab - Latest Post widget', 'openlab-txtd' )
		);
	}

    function widget($args, $instance) {

        extract($args);
        echo $before_widget;

				$openlab_accessibility = get_theme_mod('openlab_accessibility');
				// open link in a new tab when checkbox "accessibility" is not ticked
				$attribut_new_tab = (isset($openlab_accessibility) && ($openlab_accessibility != 1) ? ' target="_blank"' : '' );
        ?>
			<div class="col-lg-3 col-sm-3 focus-box latest-post" data-scrollreveal="enter left after 0.15s over 1s" data-sr-init="true" data-sr-complete="true">
	      <div class="latest-post-wrap">
					<?php
						$args = array( 'numberposts' => '1', 'post_type' => 'post' );
						$recent_posts = wp_get_recent_posts( $args );

						if($recent_posts[0]){

							//$default_img = get_template_directory_uri() . '/images/announcement-white.svg';
							$trimmed_content = strip_tags( wp_trim_words( $recent_posts[0]['post_content'] , $num_words = 20, $more = null ) );
							$latest_post_title = $recent_posts[0]['post_title'];
							$post_permalink = get_post_permalink($recent_posts[0]['ID']);

							if( $post_permalink ){
								echo '<div class="latest-post-image-wrap"><a href="'. $post_permalink .'">
								<svg version="1.1" class="posts-top-icon widget-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
												width="100px" height="100px" viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve">
												<g>
												<path fill="#231F20" d="M56.854,51.256c0.197-0.092,0.357-0.236,0.473-0.41c0.115-0.172,0.188-0.383,0.188-0.609
												c-0.002-0.303-0.131-0.574-0.324-0.768c-0.195-0.195-0.465-0.322-0.77-0.324h-19c-0.024,0-0.024,0-0.047,0
												c-0.023,0-0.047,0-0.071,0h-0.014l-0.014,0.002c-0.151,0.01-0.292,0.053-0.415,0.117c-0.185,0.098-0.332,0.242-0.437,0.414
												s-0.169,0.371-0.169,0.586c0,0.023,0.001,0.049,0.003,0.076l0.001,0.014l0.001,0.012c0.04,0.291,0.193,0.531,0.389,0.703
												c0.197,0.17,0.448,0.281,0.732,0.285c0.017,0,0.031-0.002,0.047-0.002H56.42C56.576,51.352,56.725,51.314,56.854,51.256z"/>
												<path fill="#231F20" d="M25.614,67.787l0.001,0.014c0.039,0.281,0.184,0.518,0.377,0.688c0.194,0.17,0.446,0.281,0.729,0.281
												c0.026,0,0.053-0.002,0.079-0.006h16.307c0.013,0,0.024,0.002,0.036,0.002c0.153,0,0.298-0.037,0.426-0.096
												c0.192-0.088,0.35-0.227,0.466-0.395c0.116-0.17,0.191-0.377,0.191-0.604c0-0.156-0.037-0.303-0.098-0.434
												c-0.092-0.197-0.235-0.357-0.41-0.473c-0.174-0.113-0.383-0.186-0.609-0.186h-16.31c-0.047,0-0.07,0-0.094,0s-0.048,0-0.07,0
												h-0.031l-0.029,0.004c-0.278,0.041-0.512,0.186-0.682,0.381c-0.169,0.195-0.282,0.451-0.283,0.738c0,0.02,0.001,0.045,0.002,0.07
												L25.614,67.787z"/>
												<path fill="#231F20" d="M37.255,44.223h19.329c0.15,0,0.291-0.035,0.418-0.09c0.189-0.086,0.352-0.217,0.475-0.387
												c0.121-0.17,0.203-0.381,0.203-0.617V31.904c0-0.156-0.037-0.303-0.096-0.432c-0.088-0.195-0.225-0.357-0.393-0.479
												s-0.375-0.203-0.607-0.205H37.255c-0.023,0-0.047,0-0.07,0.002h-0.031l-0.03,0.004c-0.28,0.039-0.518,0.186-0.687,0.381
												c-0.168,0.195-0.275,0.449-0.276,0.729v11.225c0.001,0.305,0.131,0.576,0.325,0.77C36.681,44.092,36.952,44.221,37.255,44.223z
												M38.35,32.996h17.117v9.041H38.35V32.996z"/>
												<path fill="#231F20" d="M79.283,38.074c-0.689-0.686-1.643-1.119-2.684-1.119h-2.352v-8.156c0-1.041-0.436-1.99-1.125-2.678
												S71.482,25,70.441,25H23.378c-1.043,0-1.991,0.434-2.674,1.123c-0.685,0.688-1.112,1.639-1.112,2.676v42.402
												c0,1.049,0.428,2,1.112,2.686C21.389,74.574,22.338,75,23.378,75h51.213h1.699H76.6c0.047,0,0.092,0,0.141,0h0.693v-0.104
												c0.82-0.18,1.549-0.629,2.078-1.256c0.555-0.654,0.896-1.508,0.896-2.439V40.754C80.408,39.713,79.973,38.764,79.283,38.074z
												M78.219,71.201c0,0.447-0.182,0.848-0.475,1.141c-0.295,0.295-0.697,0.475-1.145,0.475h-0.26c-0.232-0.02-0.477-0.076-0.779-0.217
												c-0.16-0.08-0.312-0.178-0.457-0.311c-0.219-0.201-0.426-0.482-0.586-0.941c-0.16-0.461-0.27-1.1-0.27-1.982V39.162H76.6
												c0.451,0,0.854,0.178,1.146,0.465s0.471,0.68,0.473,1.127V71.201z M23.378,27.209h47.061c0.451,0,0.854,0.178,1.146,0.465
												s0.471,0.68,0.473,1.125v9.084c-0.01,0.039-0.018,0.082-0.018,0.129s0.008,0.09,0.018,0.127v30.145v1.084
												c0,0.955,0.129,1.768,0.355,2.455c0.119,0.367,0.268,0.695,0.436,0.994H23.378c-0.449,0-0.843-0.18-1.132-0.471
												c-0.288-0.293-0.465-0.695-0.465-1.145V28.799c0-0.449,0.176-0.842,0.462-1.129C22.531,27.385,22.926,27.209,23.378,27.209z"/>
												<path fill="#231F20" d="M25.614,61.977l0.001,0.014c0.039,0.281,0.184,0.516,0.377,0.686c0.194,0.17,0.447,0.281,0.729,0.281
												c0.027,0,0.054-0.002,0.079-0.006h16.31l0,0c0.012,0.002,0.025,0.002,0.037,0.002c0.152,0,0.297-0.035,0.425-0.094
												c0.192-0.088,0.35-0.227,0.465-0.396c0.115-0.168,0.19-0.377,0.19-0.602c0-0.156-0.037-0.305-0.098-0.436
												c-0.092-0.195-0.235-0.355-0.409-0.471c-0.175-0.113-0.384-0.186-0.61-0.188h-16.31c-0.047,0-0.07,0-0.094,0s-0.048,0-0.07,0
												h-0.032l-0.03,0.006c-0.143,0.021-0.273,0.072-0.387,0.139c-0.171,0.104-0.309,0.244-0.409,0.41
												c-0.101,0.164-0.166,0.359-0.167,0.572c0,0.02,0.001,0.043,0.003,0.07L25.614,61.977z"/>
												<path fill="#231F20" d="M67.65,66.766c-0.176-0.113-0.385-0.186-0.609-0.186H50.732c-0.023,0-0.048,0-0.094,0
												c-0.024,0-0.024,0-0.047,0h-0.03l-0.027,0.004c-0.272,0.035-0.51,0.17-0.683,0.357s-0.289,0.439-0.289,0.723
												c0,0.035,0.003,0.07,0.007,0.105l0,0c0,0,0.001,0.014,0.001,0.021c0.002,0.004,0.002,0.008,0.002,0.008v0.004
												c0.027,0.277,0.165,0.516,0.351,0.682c0.194,0.174,0.448,0.285,0.731,0.285c0.025,0,0.053-0.002,0.078-0.006h16.307
												c0.012,0,0.023,0.002,0.035,0.002c0.154,0,0.299-0.037,0.426-0.096c0.193-0.088,0.35-0.227,0.467-0.395
												c0.115-0.17,0.191-0.377,0.191-0.604c0-0.156-0.037-0.305-0.098-0.434C67.967,67.041,67.824,66.881,67.65,66.766z"/>
												<path fill="#231F20" d="M67.65,60.955c-0.174-0.113-0.383-0.186-0.609-0.188H50.732c-0.023,0-0.048,0-0.094,0
												c-0.024,0-0.024,0-0.047,0h-0.03l-0.029,0.004c-0.28,0.041-0.515,0.182-0.685,0.371c-0.168,0.189-0.283,0.434-0.285,0.715
												c0,0.033,0.003,0.066,0.007,0.102l0,0c0,0,0.001,0.018,0.003,0.027c0,0.004,0,0.006,0,0.006l0.001,0.002
												c0.028,0.277,0.166,0.512,0.35,0.678c0.194,0.174,0.449,0.283,0.731,0.285c0.025,0,0.053-0.002,0.078-0.006l0,0h16.309l0,0
												c0.012,0.002,0.025,0.002,0.035,0.002c0.154,0,0.299-0.035,0.426-0.094c0.191-0.088,0.35-0.227,0.465-0.396
												c0.115-0.168,0.191-0.377,0.191-0.602c0-0.156-0.037-0.307-0.098-0.436C67.967,61.23,67.824,61.07,67.65,60.955z"/>
												<path fill="#231F20" d="M25.614,56.166l0.001,0.012c0.039,0.281,0.185,0.52,0.379,0.688s0.447,0.279,0.729,0.281
												c0.026,0,0.051-0.004,0.077-0.006h16.307c0.013,0.002,0.024,0.002,0.036,0.002c0.153,0,0.298-0.035,0.426-0.096
												c0.192-0.088,0.35-0.227,0.467-0.395c0.115-0.17,0.19-0.379,0.19-0.605c0-0.154-0.037-0.303-0.098-0.434
												c-0.092-0.195-0.235-0.355-0.409-0.471c-0.175-0.115-0.384-0.186-0.61-0.186h-16.31c-0.047,0-0.07,0-0.094,0s-0.048,0-0.07,0
												h-0.032l-0.03,0.002c-0.143,0.021-0.273,0.074-0.387,0.141c-0.172,0.104-0.309,0.244-0.41,0.41c-0.1,0.164-0.165,0.359-0.166,0.572
												c0,0.021,0.001,0.045,0.003,0.072L25.614,56.166z"/>
												<path fill="#231F20" d="M50.638,54.957c-0.024,0-0.024,0-0.047,0h-0.03l-0.027,0.002c-0.282,0.039-0.517,0.182-0.688,0.369
												c-0.169,0.191-0.284,0.438-0.284,0.719c0,0.031,0.003,0.066,0.007,0.1h-0.002c0.001,0.008,0.002,0.018,0.003,0.025
												c0,0,0,0.006,0.002,0.01l0,0c0.013,0.133,0.052,0.258,0.109,0.367c0.093,0.182,0.232,0.326,0.399,0.43
												c0.166,0.104,0.363,0.168,0.573,0.168c0.027,0,0.053-0.004,0.077-0.006h16.306c0.014,0.002,0.025,0.002,0.037,0.002
												c0.152,0,0.297-0.035,0.426-0.096c0.191-0.088,0.35-0.227,0.467-0.395c0.115-0.17,0.189-0.379,0.189-0.605
												c0-0.156-0.037-0.303-0.098-0.434c-0.092-0.197-0.236-0.355-0.41-0.471s-0.383-0.186-0.609-0.186H50.732
												C50.708,54.957,50.684,54.957,50.638,54.957z"/>
												</g>
												</svg>

											</a>
											</div>';
							}
							if($latest_post_title && $post_permalink){
								echo '<div class="latest-post-title"><h3><a href="'. $post_permalink .'">'. $latest_post_title .'</a></h3></div>';
							}
							if($trimmed_content){
								echo '<div class="latest-post-content"><span>'. $trimmed_content .'</span></div>';
							}

						}
					?>

	      </div>
			</div>

        <?php

        echo $after_widget;

    }

    function update($new_instance, $old_instance) {

        $instance = $old_instance;

        return $instance;

    }

    function form($instance) {

    }

}


/****** Latest 3 EVENTS widget **/
/***************************/
class openlab_events_archive_widget extends WP_Widget {

	public function __construct() {
		parent::__construct(
			'openlab-events-archive-widget',
			__( 'Openlab - Events Archive widget', 'openlab-txtd' )
		);
	}

    function widget($args, $instance) {

        extract($args);
        echo $before_widget;
				$viewed_in						= $GLOBALS['post']->ID;
				$args 								= array( 'numberposts' => '3', 'post_type' => 'event', 'post__not_in' => array($viewed_in)  );
				$recent_events				= wp_get_recent_posts( $args );
				$archive_permalink 		= get_post_type_archive_link( 'event' );
				$ev_title 						= '';
				$ev_date 							= '';
				$ev_permalink					= '';
				$ev_type							= '';

        ?>

				<div class="recent-events-archive widget">
					<h2 class="events-widget"><?php echo __('Other Events', 'openlab-txtd') ?></h2>
	      	<div class="recent-events-wrap">

					<?php
						if($recent_events):

							foreach($recent_events as $ev):

								$ev_type 			= get_post_meta($ev['ID'], 'event_type', true);
								$ev_title 		= $ev['post_title'];
								$ev_date 			= get_post_meta($ev['ID'], 'event_datetime_start', true);
								if($ev_date):
									$ev_date = gmdate('j F Y', $ev_date);
								endif;
								$ev_permalink = esc_url( get_post_permalink($ev['ID']) );

								echo '<div class="widget-event '. $ev_type .'">';
									if($ev_date){
										echo '<p class="event-date">'. $ev_date .'</p>';
									}
									if($ev_title && $ev_permalink){
										echo '<h4 class="event-title"><a href="'. esc_url($ev_permalink) .'">'. $ev_title .'</a></h4>';
									}

								echo '</div>';
							endforeach;
						endif;
					?>

	      </div>
			</div>

        <?php

        echo $after_widget;

    }

    function update($new_instance, $old_instance) {

        $instance = $old_instance;

        return $instance;

    }

    function form($instance) {

    }

}


/****************************/
/****** Map Detals widget **/
/***************************/
class openlab_map_details_widget extends WP_Widget {

	public function __construct() {
		parent::__construct(
			'openlab_map_details_widget',
			__( 'Openlab - Map Details Widget', 'openlab-txtd' )
		);
	}

    function widget($args, $instance) {

        extract($args);
        echo $before_widget;

        ?>
			<div class="col-lg-3 col-sm-3 focus-box map-details" data-scrollreveal="enter left after 0.15s over 1s" data-sr-init="true" data-sr-complete="true">
	      <div class="map-details-wrap">
					<?php

					//$openlab_map_icon = get_theme_mod('openlab_contact_map_icon', get_template_directory_uri().'/images/location-white.svg');
					$openlab_map_address = get_theme_mod('openlab_map_address', 'Leoxarous 17, Athens, Greece');
					$openlab_details_text = get_theme_mod('openlab_contact_details_text', '<p>Company Name</p><p>Address</p><p>Tel</p><p>email@email.com</p>');

					if( $openlab_map_address){
						if( !empty($openlab_map_address) ) {

							echo '<a data-toggle="modal" href="#gmap-embed">
											<svg version="1.1" class="map-top-icon widget-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
												width="100px" height="100px" viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve">
												<g>
												<path fill="#231F20" d="M74.442,73.932l-6.93-24.93l-0.012-0.031c-0.246-0.49-0.725-0.82-1.191-0.82h-8.629
												c2.479-4.404,3.735-7.789,3.735-10.064c0-6.941-5.368-12.588-11.967-12.588s-11.967,5.646-11.967,12.588
												c0,2.275,1.257,5.66,3.735,10.064h-7.181c-0.505,0-0.979,0.369-1.097,0.844L24.569,73.9c-0.271,0.428-0.064,0.836,0.116,1.105
												l0.021,0.027c0.14,0.139,0.513,0.465,0.952,0.465h47.58c0.423,0,0.76-0.17,0.974-0.492C74.477,74.609,74.552,74.256,74.442,73.932z
												M49.449,27.916c5.354,0,9.548,4.467,9.548,10.17c0,4.859-8.064,16.262-9.548,18.32c-1.085-1.5-3.05-4.299-4.956-7.449
												c-0.059-0.191-0.156-0.354-0.291-0.482c-2.813-4.721-4.301-8.312-4.301-10.389C39.901,32.479,44.185,27.916,49.449,27.916z
												M49.449,59.672c0.423,0,0.759-0.17,0.974-0.492c0.033-0.051,0.137-0.191,0.298-0.412c0.802-1.1,3.23-4.426,5.538-8.197h9.193
												l6.213,22.508H27.351l7.537-22.508h7.752c2.309,3.773,4.736,7.1,5.539,8.197c0.16,0.221,0.264,0.361,0.297,0.412
												C48.69,59.502,49.026,59.672,49.449,59.672z"/>
												<path fill="#231F20" d="M49.449,44.777c3.519,0,6.382-3.002,6.382-6.691c0-3.691-2.863-6.693-6.382-6.693s-6.382,3.002-6.382,6.693
												C43.067,41.775,45.931,44.777,49.449,44.777z M49.449,33.812c2.185,0,3.962,1.916,3.962,4.273c0,2.355-1.777,4.271-3.962,4.271
												s-3.962-1.916-3.962-4.271C45.487,35.729,47.265,33.812,49.449,33.812z"/>
												</g>
											</svg>
										</a>';
						}
						if( !empty($openlab_map_address) ) echo '<div class="map-details-title"><h3>'. $openlab_map_address .'</h3></div>';
						if( !empty($openlab_details_text) ) echo '<div class="details-text">'. $openlab_details_text .'</div>';
					}

					?>

	      </div>
			</div>

        <?php

        echo $after_widget;

    }

    function update($new_instance, $old_instance) {

        $instance = $old_instance;

        return $instance;

    }

    function form($instance) {

    }

}

/****************************/
/****** Events Calendar **/
/***************************/
class event_cpt_calendar extends WP_Widget {

	function event_cpt_calendar() {
		parent::__construct(false, $name = 'Openlab - Events Calendar');
	}

    function widget($args, $instance) {
        extract( $args );
        ?>
			<?php echo '<div class="col-lg-3 col-sm-3 focus-box events-calendar" data-scrollreveal="enter left after 0.15s over 1s" data-sr-init="true" data-sr-complete="true">'; ?>
				<?php echo $before_widget; ?>
						<div class="widget-events-calendar">
							<div id="calendar_wrap">
								<?php 	oplb_events_get_calendar(); ?>
							</div>
						</div>
				<?php echo $after_widget; ?>
			<?php echo '</div>'; ?>
        <?php
    }

    function update($new_instance, $old_instance) {
		$instance = $old_instance;
        return $instance;
    }

    function form($instance) {
        ?>

        <?php
    }

}
//Events Calendar Logic
// register CPT Calendar widget
add_action('widgets_init', create_function('', 'return register_widget("event_cpt_calendar");'));

function oplb_events_get_calendar( $post_types = '' , $initial = true , $echo = true ) {
  global $wpdb, $m, $monthnum, $year, $wp_locale, $posts;

  $post_types = '\'event\'';
  $cache = array();

  $key = md5( $m . $monthnum . $year );
  if ( $cache = wp_cache_get( 'get_calendar' , 'calendar' ) ) {
    if ( is_array( $cache ) && isset( $cache[$key] ) ) {
      remove_filter( 'get_calendar' , 'oplb_events_get_calendar_filter' );
      $output = apply_filters( 'get_calendar',  $cache[$key] );
      add_filter( 'get_calendar' , 'oplb_events_get_calendar_filter' );
      if ( $echo ) {
        echo $output;
        return;
      } else {
        return $output;
      }
    }
  }

  if ( !is_array( $cache ) )
    $cache = array();

  // Quick check. If we have no posts at all, abort!
  if ( !$posts ) {
    $sql = "SELECT 1 as test FROM $wpdb->posts WHERE post_type IN ( $post_types ) AND post_status IN ('publish','future') LIMIT 1";
    $gotsome = $wpdb->get_var( $sql );
    if ( !$gotsome ) {
      $cache[$key] = '';
      wp_cache_set( 'get_calendar' , $cache , 'calendar' );
      return;
    }
  }

  if ( isset( $_GET['w'] ) )
    $w = '' . intval( $_GET['w'] );

  // week_begins = 0 stands for Sunday
  $week_begins = intval( get_option( 'start_of_week' ) );

  // Let's figure out when we are
  if ( !empty( $monthnum ) && !empty( $year ) ) {
    $thismonth = '' . zeroise( intval( $monthnum ) , 2 );
    $thisyear = ''.intval($year);
  } elseif ( !empty( $w ) ) {
    // We need to get the month from MySQL
    $thisyear = '' . intval( substr( $m , 0 , 4 ) );
    $d = ( ( $w - 1 ) * 7 ) + 6; //it seems MySQL's weeks disagree with PHP's
    $thismonth = $wpdb->get_var( "SELECT DATE_FORMAT( ( DATE_ADD( '${thisyear}0101' , INTERVAL $d DAY ) ) , '%m' ) " );
  } elseif ( !empty( $m ) ) {
    $thisyear = '' . intval( substr( $m , 0 , 4 ) );
    if ( strlen( $m ) < 6 )
        $thismonth = '01';
    else
        $thismonth = '' . zeroise( intval( substr( $m , 4 , 2 ) ) , 2 );
  } else {
    $thisyear = gmdate( 'Y' , current_time( 'timestamp' ) );
    $thismonth = gmdate( 'm' , current_time( 'timestamp' ) );
  }

  $unixmonth = mktime( 0 , 0 , 0 , $thismonth , 1 , $thisyear);

  // Get the next and previous month and year with at least one post
  $previous = $wpdb->get_row( "SELECT DISTINCT MONTH( post_date ) AS month , YEAR( post_date ) AS year
    FROM $wpdb->posts
    WHERE post_date < '$thisyear-$thismonth-01'
    AND post_type IN ( $post_types ) AND post_status IN ('publish','future')
      ORDER BY post_date DESC
      LIMIT 1" );
  $next = $wpdb->get_row( "SELECT DISTINCT MONTH( post_date ) AS month, YEAR( post_date ) AS year
    FROM $wpdb->posts
    WHERE post_date > '$thisyear-$thismonth-01'
    AND MONTH( post_date ) != MONTH( '$thisyear-$thismonth-01' )
    AND post_type IN ( $post_types ) AND post_status IN ('publish','future')
      ORDER  BY post_date ASC
      LIMIT 1" );

  //$calendar_caption = _x( '%1$s %2$s' , 'calendar caption' );
  $calendar_caption = _x( '%1$s' , 'calendar caption' );

	$month_desc = $wp_locale->get_month( $thismonth );

	switch ($month_desc) {
    case "Ιανουαρίου":
				$month_desc = 'ΙΑΝΟΥΑΡΙΟΣ';
        break;
		case "Φεβρουαρίου":
				$month_desc = 'ΦΕΒΡΟΥΑΡΙΟΣ';
        break;
		case "Μαρτίου":
				$month_desc = 'ΜΑΡΤΙΟΣ';
        break;
		case "Απριλίου":
				$month_desc = 'ΑΠΡΙΛΙΟΣ';
        break;
		case "Μαΐου":
				$month_desc = 'ΜΑΪΟΣ';
				break;
		case "Ιουνίου":
				$month_desc = 'ΙΟΥΝΙΟΣ';
        break;
		case "Ιουλίου":
				$month_desc = 'ΙΟΥΛΙΟΣ';
        break;
		case "Αυγούστου":
				$month_desc = 'ΑΥΓΟΥΣΤΟΣ';
        break;
		case "Σεπτεμβρίου":
				$month_desc = 'ΣΕΠΤΕΜΒΡΙΟΣ';
        break;
		case "Οκτωβρίου":
				$month_desc = 'ΟΚΤΩΒΡΙΟΣ';
				break;
		case "Νοεμβρίου":
				$month_desc = 'ΝΟΕΜΒΡΙΟΣ';
        break;
		case "Δεκεμβρίου":
				$month_desc = 'ΔΕΚΕΜΒΡΙΟΣ';
        break;

}

  $calendar_output = '<table id="wp-events-calendar">
  <h3>' . sprintf( $calendar_caption , $month_desc , date( 'Y' , $unixmonth ) ) . '</h3>
  <thead>
  <tr>';

  $myweek = array();

  for ( $wdcount = 0 ; $wdcount <= 6 ; $wdcount++ ) {
    $myweek[] = $wp_locale->get_weekday( ( $wdcount + $week_begins ) % 7 );
  }

  foreach ( $myweek as $wd ) {
    $day_name = ( true == $initial ) ? $wp_locale->get_weekday_initial( $wd ) : $wp_locale->get_weekday_abbrev( $wd );
    $wd = esc_attr( $wd );
    $calendar_output .= "\n\t\t<th scope=\"col\" title=\"$wd\">$day_name</th>";
  }

  $calendar_output .= '
  </tr>
  </thead>';

  $calendar_output .= '
    <tbody>
  <tr>';

  // Get days with posts
  $dayswithposts = $wpdb->get_results( "SELECT DISTINCT DAYOFMONTH( post_date )
    FROM $wpdb->posts WHERE MONTH( post_date ) = '$thismonth'
    AND YEAR( post_date ) = '$thisyear'
    AND post_type IN ( $post_types ) AND post_status IN ('publish','future')
    AND post_date < '" . current_time( 'mysql' ) . '\'', ARRAY_N );
  if ( $dayswithposts ) {
    foreach ( (array) $dayswithposts as $daywith ) {
      $daywithpost[] = $daywith[0];
    }
  } else {
    $daywithpost = array();
  }

  if ( strpos( $_SERVER['HTTP_USER_AGENT'] , 'MSIE' ) !== false || stripos( $_SERVER['HTTP_USER_AGENT'] , 'camino' ) !== false || stripos( $_SERVER['HTTP_USER_AGENT'] , 'safari' ) !== false )
    $ak_title_separator = "\n";
  else
    $ak_title_separator = ', ';

  $ak_titles_for_day = array();
  $ak_post_titles = $wpdb->get_results( "SELECT ID, post_title, DAYOFMONTH( post_date ) as dom "
    . "FROM $wpdb->posts "
    . "WHERE YEAR( post_date ) = '$thisyear' "
    . "AND MONTH( post_date ) = '$thismonth' "
    . "AND post_date < '" . current_time( 'mysql' ) . "' "
    . "AND post_type IN ( $post_types ) AND post_status IN ('publish','future')"
  );
  if ( $ak_post_titles ) {
    foreach ( (array) $ak_post_titles as $ak_post_title ) {

        $post_title = esc_attr( apply_filters( 'the_title' , $ak_post_title->post_title , $ak_post_title->ID ) );

        if ( empty( $ak_titles_for_day['day_' . $ak_post_title->dom] ) )
          $ak_titles_for_day['day_'.$ak_post_title->dom] = '';
        if ( empty( $ak_titles_for_day["$ak_post_title->dom"] ) ) // first one
          $ak_titles_for_day["$ak_post_title->dom"] = $post_title;
        else
          $ak_titles_for_day["$ak_post_title->dom"] .= $ak_title_separator . $post_title;
    }
  }

  // See how much we should pad in the beginning
  $pad = calendar_week_mod( date( 'w' , $unixmonth ) - $week_begins );
  if ( 0 != $pad )
    $calendar_output .= "\n\t\t" . '<td colspan="' . esc_attr( $pad ) . '" class="pad">&nbsp;</td>';

  $daysinmonth = intval( date( 't' , $unixmonth ) );
  for ( $day = 1 ; $day <= $daysinmonth ; ++$day ) {
    if ( isset( $newrow ) && $newrow )
      $calendar_output .= "\n\t</tr>\n\t<tr>\n\t\t";
    $newrow = false;

    if ( $day == gmdate( 'j' , current_time( 'timestamp' ) ) && $thismonth == gmdate( 'm' , current_time( 'timestamp' ) ) && $thisyear == gmdate( 'Y' , current_time( 'timestamp' ) ) )
      $calendar_output .= '<td id="today">';
    else
      $calendar_output .= '<td>';

    if ( in_array( $day , $daywithpost ) ) // any posts today?
        $calendar_output .= '<a href="' . get_day_link( $thisyear , $thismonth , $day ) . '&post_type=event'."\" title=\"" . esc_attr( $ak_titles_for_day[$day] ) . "\">$day</a>";
    else
      $calendar_output .= $day;
    $calendar_output .= '</td>';

    if ( 6 == calendar_week_mod( date( 'w' , mktime( 0 , 0 , 0 , $thismonth , $day , $thisyear ) ) - $week_begins ) )
      $newrow = true;
  }

  $pad = 7 - calendar_week_mod( date( 'w' , mktime( 0 , 0 , 0 , $thismonth , $day , $thisyear ) ) - $week_begins );
  if ( $pad != 0 && $pad != 7 )
    $calendar_output .= "\n\t\t" . '<td class="pad" colspan="' . esc_attr( $pad ) . '">&nbsp;</td>';

  $calendar_output .= "\n\t</tr>\n\t</tbody>\n\t</table>";

  $cache[$key] = $calendar_output;
  wp_cache_set( 'get_calendar' , $cache, 'calendar' );

  remove_filter( 'get_calendar' , 'oplb_events_get_calendar_filter' );
  $output = apply_filters( 'get_calendar',  $calendar_output );
  add_filter( 'get_calendar' , 'oplb_events_get_calendar_filter' );

  if ( $echo )
    echo $output;
  else
    return $output;
}

function oplb_events_get_calendar_filter( $content ) {
  $output = oplb_events_get_calendar( '' , '' , false );
  return $output;
}
add_filter( 'get_calendar' , 'oplb_events_get_calendar_filter' , 10 , 2 );



/****************************/
/****** team member widget **/
/***************************/

add_action('admin_enqueue_scripts', 'openlab_team_widget_scripts');

function openlab_team_widget_scripts() {

	wp_enqueue_media();

  wp_enqueue_script('openlab_team_widget_script', get_template_directory_uri() . '/js/widget-team.js', false, '1.0', true);

}

class openlab_team_widget extends WP_Widget{

	public function __construct() {
		parent::__construct(
			'openlab_team-widget',
			__( 'Openlab - Team member widget', 'openlab-txtd' )
		);
	}

    function widget($args, $instance) {

        extract($args);

        echo $before_widget;

        ?>

        <div class="col-lg-3 col-sm-3 team-box">

            <div class="team-member">

				<?php if( !empty($instance['image_uri']) ): ?>

					<figure class="profile-pic">

						<img src="<?php echo esc_url($instance['image_uri']); ?>" alt="<?php _e( 'Uploaded image', 'openlab-txtd' ); ?>" />

					</figure>

				<?php else: ?>

					<figure class="profile-pic-empty">

						<img src="<?php echo esc_url( get_template_directory_uri().'/images/people-empty.svg' ); ?>" alt="<?php _e( 'Uploaded image', 'openlab-txtd' ); ?>" />

					</figure>

				<?php endif; ?>

                <div class="member-details">

					<?php if( !empty($instance['name']) ): ?>

						<h3 class="member-title"><?php echo apply_filters('widget_title', $instance['name']); ?></h3>

					<?php endif; ?>

					<?php if( !empty($instance['position']) ): ?>

						<div class="position"><?php echo htmlspecialchars_decode(apply_filters('widget_title', $instance['position'])); ?></div>

					<?php endif; ?>

                </div>

                <div class="social-icons">

                    <ul>
                        <?php
                            $openlab_team_target = '_blank';
                        ?>

                        <?php if ( !empty($instance['fb_link']) ): ?>
                            <li>
															<a href="<?php echo apply_filters('widget_title', $instance['fb_link']); ?>" target="<?php echo $openlab_team_target; ?>">
																<span class="widget-social">
																	<i class="fa fa-facebook"></i>
																</span>
															</a>
														</li>
                        <?php endif; ?>

                        <?php if ( !empty($instance['tw_link']) ): ?>
                            <li>
															<a href="<?php echo apply_filters('widget_title', $instance['tw_link']); ?>" target="<?php echo $openlab_team_target; ?>">
																<span class="widget-social">
																	<i class="fa fa-twitter"></i>
																</span>
															</a>
														</li>
                        <?php endif; ?>

                        <?php if ( !empty($instance['bh_link']) ): ?>
                            <li>
															<a href="<?php echo apply_filters('widget_title', $instance['bh_link']); ?>" target="<?php echo $openlab_team_target; ?>">
																<span class="widget-social">
																	<i class="fa fa-behance"></i>
																</span>
															</a>
														</li>
                        <?php endif; ?>

                        <?php if ( !empty($instance['gp_link']) ): ?>
                            <li>
															<a href="<?php echo apply_filters('widget_title', $instance['gp_link']); ?>" target="<?php echo $openlab_team_target; ?>">
																<span class="widget-social">
																	<i class="fa fa-google-plus"></i>
																</span>
															</a>
														</li>
                        <?php endif; ?>

						<?php if ( !empty($instance['ln_link']) ): ?>
                            <li>
															<a href="<?php echo apply_filters('widget_title', $instance['ln_link']); ?>" target="<?php echo $openlab_team_target; ?>">
																<span class="widget-social">
																	<i class="fa fa-linkedin"></i>
																</span>
															</a>
														</li>
                        <?php endif; ?>

                    </ul>

                </div>

            </div>

        </div>

        <?php

        echo $after_widget;

    }

    function update($new_instance, $old_instance) {

        $instance = $old_instance;

        $instance['name'] = strip_tags($new_instance['name']);
        $instance['position'] = stripslashes(wp_filter_post_kses($new_instance['position']));
        //$instance['description'] = stripslashes(wp_filter_post_kses($new_instance['description']));
        $instance['fb_link'] = strip_tags($new_instance['fb_link']);
        $instance['tw_link'] = strip_tags($new_instance['tw_link']);
        $instance['bh_link'] = strip_tags($new_instance['bh_link']);
        $instance['gp_link'] = strip_tags($new_instance['gp_link']);
				$instance['ln_link'] = strip_tags($new_instance['ln_link']);
        $instance['image_uri'] = strip_tags($new_instance['image_uri']);
        $instance['open_new_window'] = strip_tags($new_instance['open_new_window']);

        return $instance;

    }

    function form($instance) {

        ?>

        <p>
            <label for="<?php echo $this->get_field_id('name'); ?>"><?php _e('Name', 'openlab-txtd'); ?></label><br/>
            <input type="text" name="<?php echo $this->get_field_name('name'); ?>" id="<?php echo $this->get_field_id('name'); ?>" value="<?php if( !empty($instance['name']) ): echo $instance['name']; endif; ?>" class="widefat"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('position'); ?>"><?php _e('Position', 'openlab-txtd'); ?></label><br/>
            <textarea class="widefat" rows="8" cols="20" name="<?php echo $this->get_field_name('position'); ?>" id="<?php echo $this->get_field_id('position'); ?>"><?php if( !empty($instance['position']) ): echo htmlspecialchars_decode($instance['position']); endif; ?></textarea>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('fb_link'); ?>"><?php _e('Facebook link', 'openlab-txtd'); ?></label><br/>
            <input type="text" name="<?php echo $this->get_field_name('fb_link'); ?>" id="<?php echo $this->get_field_id('fb_link'); ?>" value="<?php if( !empty($instance['fb_link']) ): echo $instance['fb_link']; endif; ?>" class="widefat">

        </p>
        <p>
            <label for="<?php echo $this->get_field_id('tw_link'); ?>"><?php _e('Twitter link', 'openlab-txtd'); ?></label><br/>
            <input type="text" name="<?php echo $this->get_field_name('tw_link'); ?>" id="<?php echo $this->get_field_id('tw_link'); ?>" value="<?php if( !empty($instance['tw_link']) ): echo $instance['tw_link']; endif; ?>" class="widefat">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('bh_link'); ?>"><?php _e('Behance link', 'openlab-txtd'); ?></label><br/>
            <input type="text" name="<?php echo $this->get_field_name('bh_link'); ?>" id="<?php echo $this->get_field_id('bh_link'); ?>" value="<?php if( !empty($instance['bh_link']) ): echo $instance['bh_link']; endif; ?>" class="widefat">

        </p>
        <p>
            <label for="<?php echo $this->get_field_id('gp_link'); ?>"><?php _e('Google+ link', 'openlab-txtd'); ?></label><br/>
            <input type="text" name="<?php echo $this->get_field_name('gp_link'); ?>" id="<?php echo $this->get_field_id('gp_link'); ?>" value="<?php if( !empty($instance['gp_link']) ): echo $instance['gp_link']; endif; ?>" class="widefat">
        </p>
		<p>
            <label for="<?php echo $this->get_field_id('ln_link'); ?>"><?php _e('Linkedin link', 'openlab-txtd'); ?></label><br/>
            <input type="text" name="<?php echo $this->get_field_name('ln_link'); ?>" id="<?php echo $this->get_field_id('ln_link'); ?>" value="<?php if( !empty($instance['ln_link']) ): echo $instance['ln_link']; endif; ?>" class="widefat">
        </p>
        <p>
            <input type="checkbox" name="<?php echo $this->get_field_name('open_new_window'); ?>" id="<?php echo $this->get_field_id('open_new_window'); ?>" <?php if( !empty($instance['open_new_window']) ): checked( (bool) $instance['open_new_window'], true ); endif; ?> ><?php _e( 'Open links in new window?','openlab-txtd' ); ?><br>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('image_uri'); ?>"><?php _e('Image', 'openlab-txtd'); ?></label><br/>

            <?php

            if ( !empty($instance['image_uri']) ) :

                echo '<img class="custom_media_image_team" src="' . $instance['image_uri'] . '" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" alt="'.__( 'Uploaded image', 'openlab-txtd' ).'" /><br />';

            endif;

            ?>

            <input type="text" class="widefat custom_media_url_team" name="<?php echo $this->get_field_name('image_uri'); ?>" id="<?php echo $this->get_field_id('image_uri'); ?>" value="<?php if( !empty($instance['image_uri']) ): echo $instance['image_uri']; endif; ?>" style="margin-top:5px;">
            <input type="button" class="button button-primary custom_media_button_team" id="custom_media_button_clients" name="<?php echo $this->get_field_name('image_uri'); ?>" value="<?php _e('Upload Image','openlab-txtd'); ?>" style="margin-top:5px;">
        </p>

    <?php

    }

}

function openlab_customizer_custom_css() {

    wp_enqueue_style('openlab_customizer_custom_css', get_template_directory_uri() . '/css/openlab_customizer_custom_css.css');

}
add_action('customize_controls_print_styles', 'openlab_customizer_custom_css');

function openlab_excerpt_more( $more ) {
	return '<a href="'.get_permalink().'">[...]</a>';
}
add_filter('excerpt_more', 'openlab_excerpt_more');

/* Enqueue Google reCAPTCHA scripts */
add_action( 'wp_enqueue_scripts', 'recaptcha_scripts' );

function recaptcha_scripts() {

    if ( is_home() ):
        $openlab_contactus_sitekey = get_theme_mod('openlab_contactus_sitekey');
        $openlab_contactus_secretkey = get_theme_mod('openlab_contactus_secretkey');
        $openlab_contactus_recaptcha_show = get_theme_mod('openlab_contactus_recaptcha_show');
        if( isset($openlab_contactus_recaptcha_show) && $openlab_contactus_recaptcha_show != 1 && !empty($openlab_contactus_sitekey) && !empty($openlab_contactus_secretkey) ) :
            wp_enqueue_script( 'recaptcha', 'https://www.google.com/recaptcha/api.js' );
        endif;
    endif;

}

/* remove custom-background from body_class() */
add_filter( 'body_class', 'remove_class_function' );
function remove_class_function( $classes ) {

    if ( !is_home() ) {
        // index of custom-background
        $key = array_search('custom-background', $classes);
        // remove class
        unset($classes[$key]);
    }
		else{

			$avail_sl = get_registered_gallery_slides();
			if( ($avail_sl !== false) || ( count($avail_sl) >= 1 ) ){
				//add extra class to body
				$classes[] = 'no-background';
				$key = array_search('custom-background', $classes);
				// remove class
				unset($classes[$key]);

			}

		}

    return $classes;

}

/* Update Pirate Forms plugin when there is a change in Customizer Contact us section */

add_action('customize_save_after', 'openlab_lite_update_options_in_pirate_forms', 99);

function openlab_lite_update_options_in_pirate_forms() {

    /* if Pirate Forms is installed */
    if( defined("PIRATE_FORMS_VERSION") ):

        $openlab_lite_current_mods = get_theme_mods(); /* all theme modification values in Customize for Openlab Lite */

        $pirate_forms_settings_array = get_option( 'pirate_forms_settings_array' ); /* Pirate Forms's options's array */

        if( !empty($openlab_lite_current_mods) ):

            if( isset($openlab_lite_current_mods['openlab_contactus_button_label']) ):
                $pirate_forms_settings_array['pirateformsopt_label_submit_btn'] = $openlab_lite_current_mods['openlab_contactus_button_label'];
            endif;

            if( isset($openlab_lite_current_mods['openlab_contactus_email']) ):

                $pirate_forms_settings_array['pirateformsopt_email'] = $openlab_lite_current_mods['openlab_contactus_email'];
                $pirate_forms_settings_array['pirateformsopt_email_recipients'] = $openlab_lite_current_mods['openlab_contactus_email'];

            endif;

            if( isset($openlab_lite_current_mods['openlab_contactus_recaptcha_show']) && ($openlab_lite_current_mods['openlab_contactus_recaptcha_show'] == 1) ):
                if( isset($pirate_forms_settings_array['pirateformsopt_recaptcha_field']) ):
                    unset($pirate_forms_settings_array['pirateformsopt_recaptcha_field']);
                endif;
            else:
                $pirate_forms_settings_array['pirateformsopt_recaptcha_field'] = 'yes';
            endif;

            if( isset($openlab_lite_current_mods['openlab_contactus_sitekey']) ):
                $pirate_forms_settings_array['pirateformsopt_recaptcha_sitekey'] = $openlab_lite_current_mods['openlab_contactus_sitekey'];
            endif;

            if( isset($openlab_lite_current_mods['openlab_contactus_secretkey']) ):
                $pirate_forms_settings_array['pirateformsopt_recaptcha_secretkey'] = $openlab_lite_current_mods['openlab_contactus_secretkey'];
            endif;


        endif;

        if( !empty($pirate_forms_settings_array) ):
            update_option('pirate_forms_settings_array', $pirate_forms_settings_array); /* Update the options */
        endif;

    endif;
}
///////////////////////////////////////////////////////////////
/////////////////////*  DEBUGGING *////////////////////

if ( ! function_exists('write_log')) {
   function write_log ( $log )  {
      if ( is_array( $log ) || is_object( $log ) ) {
         error_log( print_r( $log, true ) );
      } else {
         error_log( $log );
      }
   }
}

///////////////////////////////////////////////////////////////
/////////////////////*  CUSTOM POST TYPE 'EVENTS' *////////////
add_action( 'init', 'register_cpt_event' );
function register_cpt_event() {

    $labels = array(
        'name' => _x( 'Events', 'event' ),
        'singular_name' => _x( 'Event', 'event' ),
        'add_new' => _x( 'Add New', 'event' ),
        'add_new_item' => _x( 'Add New Event', 'event' ),
        'edit_item' => _x( 'Edit Event', 'event' ),
        'new_item' => _x( 'New Event', 'event' ),
        'view_item' => _x( 'View Event', 'event' ),
        'search_items' => _x( 'Search Events', 'event' ),
        'not_found' => _x( 'No events found', 'event' ),
        'not_found_in_trash' => _x( 'No events found in Trash', 'event' ),
        'parent_item_colon' => _x( 'Parent Event:', 'event' ),
        'menu_name' => _x( 'Events', 'event' ),
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => false,
        'description' => 'Custom Event post type',
        'supports' => array( 'title', 'editor', 'thumbnail', 'revisions' ),
        'taxonomies' => array( 'event_taxonomy', 'post_tag' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 20,
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => 'event',
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );

    register_post_type( 'event', $args );
}

function create_eventcategory_taxonomy() {

$labels = array(
    'name' => _x( 'Categories', 'taxonomy general name' ),
    'singular_name' => _x( 'Category', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Categories' ),
    'popular_items' => __( 'Popular Categories' ),
    'all_items' => __( 'All Categories' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Category' ),
    'update_item' => __( 'Update Category' ),
    'add_new_item' => __( 'Add New Category' ),
    'new_item_name' => __( 'New Category Name' ),
    'separate_items_with_commas' => __( 'Separate categories with commas' ),
    'add_or_remove_items' => __( 'Add or remove categories' ),
    'choose_from_most_used' => __( 'Choose from the most used categories' ),
);

register_taxonomy('event_taxonomy','event', array(
    'label' => __('Event Category'),
    'labels' => $labels,
    'hierarchical' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'event-category' ),
));
}

add_action( 'init', 'create_eventcategory_taxonomy', 0 );


add_filter( 'rwmb_meta_boxes', 'openlab_register_meta_boxes' );
function openlab_register_meta_boxes( $meta_boxes ){

	// Date time Picker for event START
	$meta_boxes[] = array(
		'title' => __( 'The Date/Time Event Starts', 'openlab-txtd' ),
		'post_types' => 'event',
		'fields' => array(
			array(
				'name' => __( 'Date and time', 'openlab-txtd' ),
				'id'   => 'event_datetime_start',
				'type' => 'datetime',
				'timestamp' => true,
				'js_options' => array(
					'stepMinute'     => 15,
					'showTimepicker' => true,
				),
			),
		),
		'validation' => array(
				'rules'    => array(
														'event_datetime_start' => array(
														'required'  => true
														),
				),
				'messages' => array(
														'event_datetime_start' => array(
														'required'  => __( 'Please select a date/time', 'openlab-txtd' )
														)
														)
			),
	);

	// Date time Picker for event END time
	$meta_boxes[] = array(
		'title' => __( 'The Date/Time Event Ends', 'openlab-txtd' ),
		'post_types' => 'event',
		'fields' => array(
			array(
				'name' => __( 'Date and time', 'openlab-txtd' ),
				'id'   => 'event_datetime_end',
				'type' => 'datetime',
				'timestamp' => true,
				'js_options' => array(
					'stepMinute'     => 15,
					'showTimepicker' => true,
				),
			),
		),
		'validation' => array(
				'rules'    => array(
														'event_datetime_end' => array(
														'required'  => true
														),
				),
				'messages' => array(
														'event_datetime_end' => array(
														'required'  => __( 'Please select a date/time', 'openlab-txtd' )
														)
														)
			),
	);

	// Google Map
	$meta_boxes[] = array(
		'title'  => __( 'Location of Event', 'openlab-txtd' ),
		'post_types' => 'event',
		'fields' => array(
			// Map requires at least one address field (with type = text)
			array(
				'id'   => 'event_location',
				'name' => __( 'Address', 'openlab-txtd' ),
				'type' => 'text',
				'std'  => __( 'Athens, Greece', 'openlab-txtd' ),
			),
			array(
				'id'            => 'map',
				'name'          => __( 'Location', 'openlab-txtd' ),
				'type'          => 'map',
				// Default location: 'latitude,longitude[,zoom]' (zoom is optional)
				'std'           => '37.9758306,23.7389269,15',
				// Name of text field where address is entered. Can be list of text fields, separated by commas (for ex. city, state)
				'address_field' => 'event_location',
			),
		),
	);

	// Slider Images
	/*$meta_boxes[] = array(
		'title'  => __( 'Event Slider Images', 'openlab-txtd' ),
		'post_types' => 'event',
		'fields' => array(
			array(
				'id'               => 'image_advanced',
				'name'             => __( 'Slider images', 'openlab-txtd' ),
				'type'             => 'image_advanced',
				'force_delete'     => false,
				'max_file_uploads' => 9,
			),
		),
	);
	*/

	//Type of event
	$meta_boxes[] = array(
		'title'  => __( 'Select the Type of Event', 'openlab-txtd' ),
		'post_types' => 'event',
		'fields' => array(
			array(
				'name'        => __( 'Select the Type of Event', 'openlab-txtd' ),
				'id'          => 'event_type',
				'type'        => 'select',
				'options'     => array(
					'speech' => __( 'Speech', 'openlab-txtd' ),
					'seminar' => __( 'Seminar', 'openlab-txtd' ),
					'workshop' => __( 'Workshop', 'openlab-txtd' ),
				),
				'multiple'    => false,
				'placeholder' => __( 'Select...', 'openlab-txtd' ),
			),
		),
		'validation' => array(
				'rules'    => array(
														'event_type' => array(
														'required'  => true
														),
				),
				'messages' => array(
														'event_type' => array(
														'required'  => __( 'Please select an event type', 'openlab-txtd' )
														)
														)
			),

	);

	//Event Price field
	$meta_boxes[] = array(
		'title'  => __( 'Participation Ticket Price', 'openlab-txtd' ),
		'post_types' => 'event',
		'fields' => array(
			array(
				'name'        => __( 'Event Price', 'openlab-txtd' ),
				'id'          => 'event_price',
				'type'        => 'text',
				'std' 				=> __( 'FREE', 'openlab-txtd' ),
				'size'				=> '30',
			),
		),
		'validation' => array(
				'rules'    => array(
														'event_price' => array(
														'required'  => true
														),
				),
				'messages' => array(
														'event_price' => array(
														'required'  => __( 'Please add the Event Price', 'openlab-txtd' )
														)
														)
			),

	);

	$available_forms = get_available_nf_forms();
	if($available_forms){
	$meta_boxes[] = array(
		'title'  => __( 'Select a Ninja Form', 'openlab-txtd' ),
		'post_types' => 'event',
		'fields' => array(
			array(
				'name'        => __( 'Select a ninja Form', 'openlab-txtd' ),
				'id'          => 'selected_ninja_form_id',
				'type'        => 'select',
				// Array of 'value' => 'Label' pairs for select box
				'options'     => $available_forms,
				// Select multiple values, optional. Default is false.
				'multiple'    => false,
				'placeholder' => __( 'Select...', 'openlab-txtd' ),
			),
		)
	);
	}

    return $meta_boxes;

}

//get registered slides

// Add CPT Event to archive loop
function namespace_add_custom_post_to_archive( $query ) {

	$query->set( 'post_type', array( 'post', 'event' ) );
	return $query;

}
//add_filter( 'pre_get_posts', 'namespace_add_custom_post_to_archive' );

//disable default calendar
function remove_calendar_widget() {
    unregister_widget('WP_Widget_Calendar');
}
add_action( 'widgets_init', 'remove_calendar_widget' );

/* Enable svg files upload */
add_filter('upload_mimes', 'custom_upload_mimes');
function custom_upload_mimes ( $existing_mimes=array() ) {

	$existing_mimes['svg'] = 'mime/type';

	return $existing_mimes;

}

function single_post_single_result_redirect() {
  if (is_archive()) {
    global $wp_query;
    if ($wp_query->post_count == 1) {
      wp_redirect( get_permalink( $wp_query->posts['0']->ID ) );
    }
  }
}
add_action('template_redirect', 'single_post_single_result_redirect');


/********************************************************************************************/
/********************************** HELPER FUNCTIONS*****************************************/
/********************************************************************************************/



//Get available ninja forms, returns array
function get_available_nf_forms(){
	global $wpdb;
	$prfx = $wpdb->prefix;
	$available_forms = array();

	if($prfx){
		$ninja_forms_query = '';
		$ninja_forms_query = 'SELECT object_id as nform_id, meta_value as nform_title FROM '. $prfx .'nf_objectmeta WHERE meta_key = "form_title"';
		$results = $wpdb->get_results( $ninja_forms_query, ARRAY_A );

	}
	if ($results){

		foreach( $results as $form){

			$available_forms[ $form['nform_id'] ] = $form['nform_title'];

		}
	}

	return $available_forms;
}



//get available slide images for homePage gallery
function get_registered_gallery_slides(){

	$openlab_slides = array();

	$openlab_sl_1 = get_theme_mod('openlab_slider_img1',get_template_directory_uri() . '/images/slide1.jpg');
	$openlab_sl_2 = get_theme_mod('openlab_slider_img2',get_template_directory_uri() . '/images/slide2.jpg');
	$openlab_sl_3 = get_theme_mod('openlab_slider_img3',get_template_directory_uri() . '/images/slide3.jpg');
	$openlab_sl_4 = get_theme_mod('openlab_slider_img4',get_template_directory_uri() . '/images/slide4.jpg');
	$openlab_sl_5 = get_theme_mod('openlab_slider_img5',get_template_directory_uri() . '/images/slide5.jpg');
	$openlab_sl_6 = get_theme_mod('openlab_slider_img6',get_template_directory_uri() . '/images/slide6.jpg');

	if($openlab_sl_1):
		$openlab_slides['s1'] = $openlab_sl_1;
	endif;

	if($openlab_sl_2):
		$openlab_slides['s2'] = $openlab_sl_2;
	endif;

	if($openlab_sl_3):
		$openlab_slides['s3'] = $openlab_sl_3;
	endif;

	if($openlab_sl_4):
		$openlab_slides['s4'] = $openlab_sl_4;
	endif;

	if($openlab_sl_5):
		$openlab_slides['s5'] = $openlab_sl_5;
	endif;

	if($openlab_sl_6):
		$openlab_slides['s6'] = $openlab_sl_6;
	endif;

	if($openlab_slides){
		return $openlab_slides;
	}
	else{
		return false;
	}
}


function get_registered_slide_captions(){
	$openlab_captions = array();

	$openlab_cap_1 = get_theme_mod('openlab_slide1_caption');
	$openlab_cap_2 = get_theme_mod('openlab_slide2_caption');
	$openlab_cap_3 = get_theme_mod('openlab_slide3_caption');
	$openlab_cap_4 = get_theme_mod('openlab_slide4_caption');
	$openlab_cap_5 = get_theme_mod('openlab_slide5_caption');
	$openlab_cap_6 = get_theme_mod('openlab_slide6_caption');

	if($openlab_cap_1):
		$openlab_captions['s1'] = $openlab_cap_1;
	endif;

	if($openlab_cap_2):
		$openlab_captions['s2'] = $openlab_cap_2;
	endif;

	if($openlab_cap_3):
		$openlab_captions['s3'] = $openlab_cap_3;
	endif;

	if($openlab_cap_4):
		$openlab_captions['s4'] = $openlab_cap_4;
	endif;

	if($openlab_cap_5):
		$openlab_captions['s5'] = $openlab_cap_5;
	endif;

	if($openlab_cap_6):
		$openlab_captions['s6'] = $openlab_cap_6;
	endif;

	if($openlab_captions){
		return $openlab_captions;
	}
	else{
		return false;
	}

}

//Check if an event is on a future date, or it's date has passed.
function get_event_state($event_id){

	$state = '';
	$event_end = get_post_meta($event_id, 'event_datetime_end', true);
	$now = time();

	if( is_numeric($event_end) ):

		$state = 'active';

		if( $event_end < $now) :
			$state = 'passed';
		endif;

	endif;

	return $state;

}



// Return SVG Image Data
function get_svg_images_src($type){

$data = '';

if($type):

	if($type == 'speech'):
		$data = '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
									 viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve">
									<path fill="#ffffff" d="M29.877,35.932H11.916c-3.273,0-5.938,2.662-5.938,5.936v23.697c0,3.273,2.664,5.938,5.938,5.938h0.99
										v17.961h3.539V67.852h-4.529c-1.283,0-2.289-1.006-2.289-2.287V41.867c0-1.281,1.006-2.287,2.289-2.287h18.07
										c1.281,0,2.287,1.006,2.287,2.287v23.697c0,1.281-1.006,2.287-2.287,2.287h-4.744v21.502h3.539V71.502h1.205
										c3.273,0,5.936-2.664,5.936-5.938V41.852C35.805,38.531,33.148,35.932,29.877,35.932z"/>
									<path fill="#ffffff" d="M20.898,32.33c6.018,0,10.914-4.898,10.914-10.914c0-5.916-5-10.914-10.914-10.914
										c-5.92,0-10.914,4.998-10.914,10.914C9.984,27.33,14.979,32.33,20.898,32.33z M20.898,14.041c4.064,0,7.369,3.309,7.369,7.375
										c0,4.062-3.305,7.373-7.369,7.373c-4.068,0-7.375-3.311-7.375-7.373C13.523,17.35,16.83,14.041,20.898,14.041z"/>
									<path fill="#ffffff" d="M33.68,10.502v3.539h52.588v42.758c0,1.281-1.002,2.289-2.283,2.289H40.713v3.648h43.162
										c3.273,0,5.938-2.664,5.938-5.938V14.041h3.461v-3.539H33.68z"/>
									<polygon fill="#ffffff" points="56.266,66.445 52.727,66.445 52.727,72.963 37.617,87.963 40.156,90.502 52.727,78.039
										52.727,90.006 56.266,90.006 56.266,78.039 68.836,90.502 71.375,87.963 56.266,72.963 	"/>
							</svg>';
	endif;

	if($type == 'seminar'):
		$data = '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
							 viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve">
							<path fill="#ffffff" d="M19.801,35.02l0.003,0.021c0.063,0.471,0.299,0.875,0.624,1.164c0.324,0.289,0.755,0.48,1.236,0.48
								c0.024,0,0.045-0.002,0.066-0.002h17.06c0.253,0,0.493-0.055,0.71-0.146c0.324-0.137,0.6-0.357,0.807-0.641
								c0.206-0.283,0.344-0.641,0.344-1.037c0-0.254-0.057-0.492-0.15-0.705c-0.142-0.32-0.361-0.586-0.641-0.785
								c-0.278-0.199-0.626-0.334-1.016-0.334c-0.02,0-0.046,0-0.076,0.002H21.887c-0.061-0.016-0.128-0.025-0.208-0.025
								c-0.014,0-0.03,0.002-0.044,0.004c-0.011-0.002-0.021-0.004-0.031-0.004c-0.098-0.002-0.189,0.02-0.274,0.049
								c-0.19,0.031-0.369,0.094-0.528,0.178c-0.307,0.162-0.548,0.396-0.722,0.674c-0.173,0.277-0.284,0.602-0.285,0.961
								c0,0.037,0.001,0.08,0.005,0.125L19.801,35.02z"/>
							<path fill="#ffffff" d="M21.656,42.771L21.656,42.771c-0.263,0-0.509,0.064-0.722,0.164c-0.32,0.152-0.573,0.383-0.761,0.658
								c-0.185,0.277-0.309,0.607-0.31,0.984c0,0.016,0.001,0.035,0.002,0.053l0,0v0.002c0.001,0.021,0,0.039,0.002,0.062h0.001
								c0.009,0.23,0.062,0.449,0.15,0.645c0.146,0.318,0.373,0.58,0.653,0.771c0.28,0.189,0.623,0.311,0.998,0.311
								c0.023,0,0.04-0.002,0.059-0.002h30.48c0.253,0,0.494-0.055,0.71-0.146c0.324-0.139,0.6-0.359,0.806-0.643
								c0.205-0.283,0.343-0.641,0.343-1.035c0-0.262-0.062-0.512-0.163-0.729c-0.153-0.328-0.391-0.592-0.679-0.783
								s-0.636-0.311-1.017-0.312H21.727C21.692,42.771,21.692,42.771,21.656,42.771z"/>
							<path fill="#ffffff" d="M78.261,62.617c-0.281-0.201-0.636-0.338-1.031-0.338H21.728c-0.035,0-0.106,0-0.178,0
								c-0.036,0-0.071,0-0.106,0h-0.06l-0.06,0.008c-0.241,0.035-0.457,0.123-0.643,0.236c-0.279,0.174-0.498,0.402-0.66,0.672
								c-0.16,0.27-0.268,0.584-0.269,0.938c0,0.07,0.005,0.145,0.016,0.221h-0.001c0.001,0.004,0.002,0.006,0.002,0.006
								c0.001,0.006,0,0.006,0.001,0.008l0,0c0.067,0.467,0.306,0.855,0.624,1.135c0.322,0.281,0.742,0.467,1.216,0.469
								c0.04,0,0.079-0.006,0.117-0.008l0,0h55.502c0.263,0,0.512-0.062,0.73-0.164c0.327-0.152,0.591-0.391,0.782-0.68
								c0.189-0.287,0.311-0.635,0.312-1.016c-0.001-0.254-0.059-0.49-0.151-0.701C78.761,63.086,78.541,62.818,78.261,62.617z"/>
							<path fill="#ffffff" d="M66.165,17.652c-3.536,0-6.753,1.445-9.079,3.773c-2.327,2.328-3.773,5.551-3.773,9.102
								c0,3.549,1.446,6.779,3.772,9.115c2.324,2.338,5.542,3.793,9.08,3.793c3.554,0,6.781-1.455,9.111-3.793
								c2.331-2.336,3.777-5.566,3.777-9.115c0-3.551-1.447-6.773-3.779-9.102C72.944,19.098,69.717,17.652,66.165,17.652z M68.025,34.979
								l3.259,3.254c-0.959,0.639-2.064,1.096-3.259,1.322V34.979z M68.025,21.539c1.821,0.357,3.442,1.242,4.701,2.494
								c1.258,1.256,2.15,2.873,2.51,4.703h-7.211V21.539z M73.844,35.635l-3.231-3.248h4.609C74.974,33.568,74.497,34.658,73.844,35.635z
								 M64.34,39.549c-1.96-0.391-3.69-1.398-4.983-2.816c-1.488-1.637-2.393-3.805-2.394-6.205c0.001-2.402,0.904-4.562,2.389-6.189
								c1.295-1.416,3.028-2.42,4.988-2.805V39.549z"/>
							<path fill="#ffffff" d="M88.109,12.998c-1.145-1.154-2.733-1.885-4.478-1.885H15.359c-1.745,0-3.334,0.73-4.479,1.885
								s-1.862,2.748-1.862,4.488v51.059c0,1.74,0.719,3.328,1.866,4.473c1.146,1.146,2.735,1.863,4.476,1.863h17.488L24.37,88.246
								l0.003,0.002c-0.228,0.312-0.332,0.678-0.331,1.02c0.001,0.303,0.071,0.594,0.205,0.861s0.332,0.514,0.6,0.699l0.02,0.014
								l0.02,0.012c0.298,0.184,0.625,0.258,0.937,0.258c0.327,0,0.646-0.08,0.937-0.24c0.268-0.146,0.511-0.373,0.681-0.672l0.002,0.002
								l9.733-15.314l0.003-0.008h10.491v14.344c0,0.254,0.055,0.494,0.147,0.711c0.139,0.324,0.359,0.6,0.643,0.805
								s0.641,0.342,1.035,0.342c0.263,0,0.512-0.061,0.729-0.162c0.328-0.154,0.592-0.391,0.783-0.68c0.19-0.287,0.311-0.635,0.312-1.016
								v-14.34h10.456l0.002,0.004l9.735,15.316l0.003-0.002c0.168,0.299,0.412,0.525,0.679,0.672c0.291,0.16,0.609,0.24,0.937,0.24
								c0.312,0,0.638-0.076,0.935-0.256l0.022-0.014l0.02-0.014c0.268-0.186,0.467-0.432,0.601-0.697
								c0.133-0.268,0.204-0.561,0.204-0.863c0.001-0.342-0.103-0.705-0.331-1.018l0.003-0.004l-8.475-13.365h17.523
								c1.741,0,3.329-0.719,4.476-1.863c1.147-1.146,1.867-2.732,1.866-4.473V17.486C89.974,15.746,89.256,14.152,88.109,12.998z
								 M83.632,71.232H15.359c-0.756,0-1.422-0.299-1.908-0.783c-0.486-0.486-0.783-1.15-0.784-1.904V17.486
								c0.001-0.754,0.301-1.432,0.789-1.928c0.489-0.494,1.154-0.795,1.903-0.797h68.272c0.749,0.002,1.414,0.303,1.903,0.797
								c0.488,0.496,0.788,1.174,0.788,1.928v51.059c0,0.754-0.298,1.418-0.783,1.904C85.053,70.934,84.387,71.232,83.632,71.232z"/>
							<path fill="#ffffff" d="M77.229,52.545H21.728c-0.035,0-0.106,0-0.178,0c-0.036,0-0.071,0-0.106,0h-0.06l-0.058,0.008
								c-0.232,0.033-0.445,0.115-0.632,0.225c-0.279,0.164-0.505,0.393-0.671,0.664c-0.164,0.271-0.271,0.596-0.271,0.949
								c0,0.074,0.005,0.152,0.016,0.232c0.064,0.471,0.312,0.865,0.637,1.137c0.326,0.271,0.741,0.439,1.196,0.439
								c0.044,0,0.085-0.004,0.127-0.008h55.501l0,0c0.018,0,0.035,0.002,0.054,0.002c0.258,0,0.504-0.062,0.717-0.164
								c0.321-0.152,0.576-0.389,0.759-0.672c0.182-0.283,0.294-0.623,0.295-0.99c-0.002-0.51-0.218-0.961-0.54-1.283
								C78.189,52.762,77.739,52.545,77.229,52.545z"/>
							<polygon fill="#ffffff" points="19.769,54.625 19.769,54.623 19.769,54.619 	"/>
						</svg>';
	endif;

	if($type == 'workshop'):
		$data = '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
							 viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve">
							<path fill="#ffffff" d="M63.568,53.459h-4.736V42.711c0-5.101-4.149-9.25-9.251-9.25c-5.1,0-9.25,4.149-9.25,9.25v10.748h-4.736
								 M17.092,53.459h-2.495H4.994c-0.925,0-1.672,0.748-1.672,1.673c0,0.923,0.748,1.671,1.672,1.671h7.931v27.834
								c0,0.925,0.748,1.673,1.672,1.673h69.968c0.925,0,1.673-0.748,1.673-1.673V56.803h7.931c0.925,0,1.673-0.748,1.673-1.671
								c0-0.925-0.748-1.673-1.673-1.673h-9.604H82.07 M78.727,53.46H66.913 M43.675,42.713c0-3.257,2.65-5.906,5.906-5.906
								c3.257,0,5.907,2.649,5.907,5.906V53.46H43.675V42.713z M32.25,53.46H20.437 M82.894,82.965H16.269V56.803h2.496h15.157h8.081
								h15.158h8.081h15.157h2.496v26.162H82.894z"/>
							<path fill="#ffffff" d="M49.581,31.181c4.101,0,7.436-3.336,7.436-7.436s-3.335-7.436-7.436-7.436c-4.1,0-7.435,3.336-7.435,7.436
								S45.481,31.181,49.581,31.181z M49.581,19.654c2.257,0,4.091,1.835,4.091,4.091c0,2.254-1.834,4.091-4.091,4.091
								c-2.254,0-4.09-1.835-4.09-4.091S47.327,19.654,49.581,19.654z"/>
						</svg>';
	endif;

	if($type == 'passed'):
		$data = '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
							 viewBox="0 0 154.7 154.3" style="enable-background:new 0 0 154.7 154.3;" xml:space="preserve">
						<line class="passed-indicator" x1="153" y1="1.8" x2="2.3" y2="152.7"/>
						</svg>';
	endif;

	if($type == 'map'):
		$data = '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
								 viewBox="0 0 45 45" style="enable-background:new 0 0 45 45;" xml:space="preserve">
								<path fill="#ffffff" d="M45,43.6l-6.2-22.4l0,0c-0.2-0.4-0.7-0.7-1.1-0.7h-7.8c2.2-4,3.4-7,3.4-9.1C33.3,5.1,28.4,0,22.5,0
									c-5.9,0-10.8,5.1-10.8,11.3c0,2,1.1,5.1,3.4,9.1H8.6c-0.5,0-0.9,0.3-1,0.8L0.1,43.6c-0.2,0.4-0.1,0.8,0.1,1l0,0
									C0.4,44.7,0.7,45,1.1,45h42.8c0.4,0,0.7-0.2,0.9-0.4C45,44.2,45.1,43.9,45,43.6z M22.5,2.2c4.8,0,8.6,4,8.6,9.2
									c0,4.4-7.3,14.6-8.6,16.5c-1-1.3-2.7-3.9-4.5-6.7c-0.1-0.2-0.1-0.3-0.3-0.4c-2.5-4.3-3.9-7.5-3.9-9.4C13.9,6.3,17.8,2.2,22.5,2.2z
									 M22.5,30.8c0.4,0,0.7-0.2,0.9-0.4c0,0,0.1-0.2,0.3-0.4c0.7-1,2.9-4,5-7.4h8.3l5.6,20.3H2.6l6.8-20.3h7c2.1,3.4,4.3,6.4,5,7.4
									c0.1,0.2,0.2,0.3,0.3,0.4C21.8,30.6,22.1,30.8,22.5,30.8z"/>
								<path fill="#ffffff" d="M22,17.3c3.2,0.3,6-2.2,6.2-5.5c0.3-3.3-2-6.2-5.2-6.5c-3.2-0.3-6,2.2-6.2,5.5C16.5,14.1,18.8,17,22,17.3z
									 M22.8,7.5c2,0.2,3.4,2,3.2,4.1c-0.2,2.1-1.9,3.7-3.9,3.5c-2-0.2-3.4-2-3.2-4.1C19.1,8.9,20.9,7.3,22.8,7.5z"/>
							</svg>';
	endif;

	if($type == 'share'):
		$data = '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
			 viewBox="0 0 60.8 62.9" style="enable-background:new 0 0 60.8 62.9;" xml:space="preserve">
					<path fill="#ffffff" d="M18,39.8c-4.7,0-8.4-3.7-8.4-8.4c0-4.7,3.7-8.4,8.4-8.4c4.7,0,8.4,3.7,8.4,8.4
						C26.4,36.1,22.5,39.8,18,39.8z M18,26.5c-2.7,0-4.9,2.2-4.9,4.9c0,2.7,2.2,4.9,4.9,4.9c2.7,0,4.9-2.2,4.9-4.9
						C22.9,28.7,20.6,26.5,18,26.5z"/>
						<path fill="#ffffff" d="M42.9,16.8c-4.7,0-8.4-3.7-8.4-8.4c0-4.7,3.7-8.4,8.4-8.4c4.7,0,8.4,3.7,8.4,8.4
							C51.3,13.1,47.4,16.8,42.9,16.8z M42.9,3.5c-2.7,0-4.9,2.2-4.9,4.9c0,2.7,2.2,4.9,4.9,4.9c2.7,0,4.9-2.2,4.9-4.9
							C47.8,5.7,45.6,3.5,42.9,3.5z"/>
						<path fill="#ffffff" d="M42.9,62.9c-4.7,0-8.4-3.7-8.4-8.4c0-4.7,3.7-8.4,8.4-8.4c4.7,0,8.4,3.7,8.4,8.4
							C51.3,59.1,47.4,62.9,42.9,62.9z M42.9,49.6c-2.7,0-4.9,2.2-4.9,4.9c0,2.7,2.2,4.9,4.9,4.9c2.7,0,4.9-2.2,4.9-4.9
							C47.8,51.8,45.6,49.6,42.9,49.6z"/>
						<rect fill="#ffffff" x="28.6" y="9.4" transform="matrix(0.7073 0.707 -0.707 0.7073 22.8845 -15.3884)" width="2.9" height="21"/>
						<rect fill="#ffffff" x="19.5" y="41.5" transform="matrix(0.7071 0.7071 -0.7071 0.7071 39.1462 -8.6578)" width="21" height="2.9"/>
			</svg>';
	endif;

	if($type == 'close-icon'):
		$data = '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
							 viewBox="0 0 31.8 31.8" style="enable-background:new 0 0 31.8 31.8;" xml:space="preserve">
							<path fill="#d9be40" d="M26.8,21.2L26.8,21.2l-5-5l8.3-8.3c1.6-1.6,1.6-4.2,0-5.8c-1.6-1.6-4.2-1.6-5.8,0L21,5.4l-5,5L7.7,2.1
								c-1.6-1.6-4.2-1.6-5.8,0c-1.6,1.6-1.6,4.2,0,5.8l3.3,3.3l5,5l-8.3,8.3c-1.6,1.6-1.6,4.2,0,5.8c1.6,1.6,4.2,1.6,5.8,0L11,27l0,0l5-5
								l8.3,8.3c1.6,1.6,4.2,1.6,5.8,0c1.6-1.6,1.6-4.2,0-5.8L26.8,21.2z"/>
					 		</svg>';
	endif;

	if($type == 'post'):
		$data = '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
								 viewBox="-255 347 100 100" style="enable-background:new -255 347 100 100;" xml:space="preserve">
								<path fill="#FFFFFF" d="M-198.1,398.3c0.2-0.1,0.4-0.2,0.5-0.4c0.1-0.2,0.2-0.4,0.2-0.6c0-0.3-0.1-0.6-0.3-0.8
									c-0.2-0.2-0.5-0.3-0.8-0.3h-19c0,0,0,0,0,0c0,0,0,0-0.1,0h0l0,0c-0.2,0-0.3,0.1-0.4,0.1c-0.2,0.1-0.3,0.2-0.4,0.4
									c-0.1,0.2-0.2,0.4-0.2,0.6c0,0,0,0,0,0.1l0,0l0,0c0,0.3,0.2,0.5,0.4,0.7c0.2,0.2,0.4,0.3,0.7,0.3c0,0,0,0,0,0h19
									C-198.4,398.4-198.3,398.3-198.1,398.3z"/>
								<path fill="#FFFFFF" d="M-229.4,414.8L-229.4,414.8c0,0.3,0.2,0.5,0.4,0.7c0.2,0.2,0.4,0.3,0.7,0.3c0,0,0.1,0,0.1,0h16.3c0,0,0,0,0,0
									c0.2,0,0.3,0,0.4-0.1c0.2-0.1,0.4-0.2,0.5-0.4c0.1-0.2,0.2-0.4,0.2-0.6c0-0.2,0-0.3-0.1-0.4c-0.1-0.2-0.2-0.4-0.4-0.5
									c-0.2-0.1-0.4-0.2-0.6-0.2h-16.3c0,0-0.1,0-0.1,0s0,0-0.1,0h0l0,0c-0.3,0-0.5,0.2-0.7,0.4C-229.3,414.2-229.4,414.4-229.4,414.8
									C-229.4,414.7-229.4,414.7-229.4,414.8L-229.4,414.8z"/>
								<path fill="#FFFFFF" d="M-217.7,391.2h19.3c0.2,0,0.3,0,0.4-0.1c0.2-0.1,0.4-0.2,0.5-0.4c0.1-0.2,0.2-0.4,0.2-0.6v-11.2
									c0-0.2,0-0.3-0.1-0.4c-0.1-0.2-0.2-0.4-0.4-0.5c-0.2-0.1-0.4-0.2-0.6-0.2h-19.3c0,0,0,0-0.1,0h0l0,0c-0.3,0-0.5,0.2-0.7,0.4
									c-0.2,0.2-0.3,0.4-0.3,0.7v11.2c0,0.3,0.1,0.6,0.3,0.8C-218.3,391.1-218,391.2-217.7,391.2z M-216.6,380h17.1v9h-17.1V380z"/>
								<path fill="#FFFFFF" d="M-175.7,385.1c-0.7-0.7-1.6-1.1-2.7-1.1h-2.4v-8.2c0-1-0.4-2-1.1-2.7c-0.7-0.7-1.6-1.1-2.7-1.1h-47.1
									c-1,0-2,0.4-2.7,1.1c-0.7,0.7-1.1,1.6-1.1,2.7v42.4c0,1,0.4,2,1.1,2.7c0.7,0.7,1.6,1.1,2.7,1.1h51.2h1.7h0.3c0,0,0.1,0,0.1,0h0.7
									v-0.1c0.8-0.2,1.5-0.6,2.1-1.3c0.6-0.7,0.9-1.5,0.9-2.4v-30.4C-174.6,386.7-175,385.8-175.7,385.1z M-176.8,418.2
									c0,0.4-0.2,0.8-0.5,1.1c-0.3,0.3-0.7,0.5-1.1,0.5h-0.3c-0.2,0-0.5-0.1-0.8-0.2c-0.2-0.1-0.3-0.2-0.5-0.3c-0.2-0.2-0.4-0.5-0.6-0.9
									c-0.2-0.5-0.3-1.1-0.3-2v-30.2h2.4c0.5,0,0.9,0.2,1.1,0.5c0.3,0.3,0.5,0.7,0.5,1.1V418.2z M-231.6,374.2h47.1
									c0.5,0,0.9,0.2,1.1,0.5c0.3,0.3,0.5,0.7,0.5,1.1v9.1c0,0,0,0.1,0,0.1s0,0.1,0,0.1v30.1v1.1c0,1,0.1,1.8,0.4,2.5
									c0.1,0.4,0.3,0.7,0.4,1h-49.5c-0.4,0-0.8-0.2-1.1-0.5c-0.3-0.3-0.5-0.7-0.5-1.1v-42.4c0-0.4,0.2-0.8,0.5-1.1
									C-232.5,374.4-232.1,374.2-231.6,374.2z"/>
								<path fill="#FFFFFF" d="M-229.4,409L-229.4,409c0,0.3,0.2,0.5,0.4,0.7c0.2,0.2,0.4,0.3,0.7,0.3c0,0,0.1,0,0.1,0h16.3l0,0c0,0,0,0,0,0
									c0.2,0,0.3,0,0.4-0.1c0.2-0.1,0.4-0.2,0.5-0.4c0.1-0.2,0.2-0.4,0.2-0.6c0-0.2,0-0.3-0.1-0.4c-0.1-0.2-0.2-0.4-0.4-0.5
									c-0.2-0.1-0.4-0.2-0.6-0.2h-16.3c0,0-0.1,0-0.1,0s0,0-0.1,0h0l0,0c-0.1,0-0.3,0.1-0.4,0.1c-0.2,0.1-0.3,0.2-0.4,0.4
									C-229.3,408.5-229.4,408.7-229.4,409C-229.4,408.9-229.4,408.9-229.4,409L-229.4,409z"/>
								<path fill="#FFFFFF" d="M-187.4,413.8c-0.2-0.1-0.4-0.2-0.6-0.2h-16.3c0,0,0,0-0.1,0c0,0,0,0,0,0h0l0,0c-0.3,0-0.5,0.2-0.7,0.4
									c-0.2,0.2-0.3,0.4-0.3,0.7c0,0,0,0.1,0,0.1l0,0c0,0,0,0,0,0c0,0,0,0,0,0v0c0,0.3,0.2,0.5,0.4,0.7c0.2,0.2,0.4,0.3,0.7,0.3
									c0,0,0.1,0,0.1,0h16.3c0,0,0,0,0,0c0.2,0,0.3,0,0.4-0.1c0.2-0.1,0.4-0.2,0.5-0.4c0.1-0.2,0.2-0.4,0.2-0.6c0-0.2,0-0.3-0.1-0.4
									C-187,414-187.2,413.9-187.4,413.8z"/>
								<path fill="#FFFFFF" d="M-187.4,408c-0.2-0.1-0.4-0.2-0.6-0.2h-16.3c0,0,0,0-0.1,0c0,0,0,0,0,0h0l0,0c-0.3,0-0.5,0.2-0.7,0.4
									c-0.2,0.2-0.3,0.4-0.3,0.7c0,0,0,0.1,0,0.1l0,0c0,0,0,0,0,0c0,0,0,0,0,0l0,0c0,0.3,0.2,0.5,0.3,0.7c0.2,0.2,0.4,0.3,0.7,0.3
									c0,0,0.1,0,0.1,0l0,0h16.3l0,0c0,0,0,0,0,0c0.2,0,0.3,0,0.4-0.1c0.2-0.1,0.3-0.2,0.5-0.4c0.1-0.2,0.2-0.4,0.2-0.6
									c0-0.2,0-0.3-0.1-0.4C-187,408.2-187.2,408.1-187.4,408z"/>
								<path fill="#FFFFFF" d="M-229.4,403.2L-229.4,403.2c0,0.3,0.2,0.5,0.4,0.7s0.4,0.3,0.7,0.3c0,0,0.1,0,0.1,0h16.3c0,0,0,0,0,0
									c0.2,0,0.3,0,0.4-0.1c0.2-0.1,0.3-0.2,0.5-0.4c0.1-0.2,0.2-0.4,0.2-0.6c0-0.2,0-0.3-0.1-0.4c-0.1-0.2-0.2-0.4-0.4-0.5
									c-0.2-0.1-0.4-0.2-0.6-0.2h-16.3c0,0-0.1,0-0.1,0c0,0,0,0-0.1,0h0l0,0c-0.1,0-0.3,0.1-0.4,0.1c-0.2,0.1-0.3,0.2-0.4,0.4
									C-229.3,402.7-229.4,402.9-229.4,403.2C-229.4,403.1-229.4,403.1-229.4,403.2L-229.4,403.2z"/>
								<path fill="#FFFFFF" d="M-204.4,402C-204.4,402-204.4,402-204.4,402L-204.4,402l-0.1,0c-0.3,0-0.5,0.2-0.7,0.4
									c-0.2,0.2-0.3,0.4-0.3,0.7c0,0,0,0.1,0,0.1h0c0,0,0,0,0,0c0,0,0,0,0,0l0,0c0,0.1,0.1,0.3,0.1,0.4c0.1,0.2,0.2,0.3,0.4,0.4
									c0.2,0.1,0.4,0.2,0.6,0.2c0,0,0.1,0,0.1,0h16.3c0,0,0,0,0,0c0.2,0,0.3,0,0.4-0.1c0.2-0.1,0.4-0.2,0.5-0.4c0.1-0.2,0.2-0.4,0.2-0.6
									c0-0.2,0-0.3-0.1-0.4c-0.1-0.2-0.2-0.4-0.4-0.5s-0.4-0.2-0.6-0.2L-204.4,402C-204.3,402-204.3,402-204.4,402z"/>
							</svg>';
	endif;

	if($type == 'link-right'):
		$data = '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
							 viewBox="0 0 80 80" style="enable-background:new 0 0 80 80;" xml:space="preserve">
							<polygon fill="#B5B2AE" points="62.4,40 27.4,5 17.6,14.9 42.7,40 17.6,65.1 27.4,75 	"/>
							</svg>';
	endif;

	if($type == 'focus-icon'):
		$data = '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
								 viewBox="0 0 29.8 30" xml:space="preserve">
								<circle style="fill:none;stroke:#B5B2AE;stroke-width:6;stroke-miterlimit:10;" cx="13.4" cy="13.5" r="10.2"/>
								<line style="fill:none;stroke:#B5B2AE;stroke-width:6;stroke-miterlimit:10;" x1="19.9" y1="19.8" x2="27.6" y2="27.5"/>
							</svg>';
	endif;

endif;

return $data;

}


function get_single_event_formatted_date($start,$end){
	$formatted 	= '';
	$s_date 		= gmdate('d M Y', $start);
	$e_date 		= gmdate('d M Y', $end);


		if($s_date == $e_date):

			$formatted = gmdate('d M Y', $start);

		elseif($s_date !== $e_date):

			$first_part 	= gmdate('d.m.Y', $start);
			$second_part 	= gmdate('d.m.Y', $end);
			$time_start 	= gmdate('H:i', $start);
			$time_end 		= gmdate('H:i', $end);

			$formatted = $first_part;
			$formatted .= '<br>'. __('TO','openlab-txtd') .'<br>';
			$formatted .= $second_part;
			$formatted .= '<br><br>'. $time_start .' - '. $time_end;


		else:

		    $formatted = 'Error!';

		endif;

	return $formatted;
}

function get_single_event_list_formatted_date($start,$end){
	$formatted 	= '';
	$s_date 		= gmdate('d M Y', $start);
	$e_date 		= gmdate('d M Y', $end);


		if($s_date == $e_date):

			$formatted = gmdate('j M', $start);

		elseif($s_date !== $e_date):

			$first_part 	= gmdate('d.m', $start);
			$second_part 	= gmdate('d.m', $end);

			$formatted = $first_part .'-'. $second_part ;

		else:

		    $formatted = 'Error!';

		endif;

	return $formatted;
}

function get_single_event_list_formatted_time($start,$end){
	$formatted 	= '';
	$s_date 		= gmdate('H:i', $start);
	$e_date 		= gmdate('H:i', $end);

		if($s_date == $e_date):

			$formatted = gmdate('H:i', $start);

		elseif($s_date !== $e_date):

			$first_part 	= gmdate('H:i', $start);
			$second_part 	= gmdate('H:i', $end);

			$formatted = $first_part .' - '. $second_part ;

		else:

		    $formatted = 'Error!';

		endif;

	return $formatted;
}

function get_single_event_widget_formatted_date($start,$end){
	$formatted 	= '';
	$s_date 		= gmdate('d.m.Y', $start);
	$e_date 		= gmdate('d.m.Y', $end);

		if($s_date == $e_date):

			$formatted = gmdate('d.m.Y', $start);

		elseif($s_date !== $e_date):

			$first_part 	= gmdate('d.m.Y', $start);
			$second_part 	= gmdate('d.m.Y', $end);

			$formatted = $first_part .' - '. $second_part ;

		else:

		    $formatted = 'Error!';

		endif;

	return $formatted;
}


// Get active events
function get_active_events(){

	$args = array(
		'post_type'    		=> 'event',
		'post_status'     => 'publish',
		'posts_per_page'  => 3,
		'meta_key'     		=> 'event_datetime_start',
		'meta_value'   		=> date( "U" ),
		'meta_compare' 		=> '>',
		'orderby'    		=> 'meta_value_num',
		'order'      		=> 'ASC'
	);
	$active = new WP_Query( $args );

 return $active;

}

// Get active events
function get_passed_events($num){

	$args = array(
		'post_type'    		=> 'event',
		'post_status'     => 'publish',
		'posts_per_page'  => $num,
		'meta_key'     		=> 'event_datetime_end',
		'meta_value'   		=> date( "U" ),
		'meta_compare' 		=> '<',
		'orderby'    		=> 'meta_value_num',
		'order'      		=> 'ASC'
	);
	$passed = new WP_Query( $args );

 return $passed;

}

//make modal contact form - gets called in footer.php
function event_modal_contact_form_html($event_id){
	
}
