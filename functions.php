<?php
/**
 * Openlab Lite functions and definitions
 */

function openlab_setup() {

	global $content_width;

    if (!isset($content_width)) {
        $content_width = 640;
    }

    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on openlab, use a find and replace
     * to change 'openlab-lite' to the name of your theme in all the template files
     */
    load_theme_textdomain('openlab-lite', get_template_directory() . '/languages');

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
        'primary' => __('Primary Menu', 'openlab-lite'),
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
                "id" => 'openlab-lite-req-ac-install-pirate-forms',
                "title" => esc_html__( 'Install Pirate Forms' ,'openlab-lite' ),
                "description"=> esc_html__( 'Please make sure you install the Pirate Forms plugin.','openlab-lite' ),
                "check" => defined("PIRATE_FORMS_VERSION"),
                "plugin_slug" => 'pirate-forms'
            ),
						array(
			                "id" => 'openlab-lite-req-ac-install-meta-box',
			                "title" => esc_html__( 'Install Meta box' ,'openlab-lite' ),
			                "description"=> esc_html__( 'Please make sure you install the Meta Box plugin.','openlab-lite' ),
			                "check" => defined('RWMB_VER'),
			                "plugin_slug" => 'meta-box'
			            ),
						array(
			                "id" => 'openlab-lite-req-ac-install-meta-box',
			                "title" => esc_html__( 'Install Custom Facebook Feed' ,'openlab-lite' ),
			                "description"=> esc_html__( 'Please make sure you install the Facebook Feed plugin.','openlab-lite' ),
			                "check" => defined('CFFVER'),
			                "plugin_slug" => 'custom-facebook-feed'
            ),
            array(
                "id" => 'openlab-lite-req-ac-check-pirate-forms',
                "title" => esc_html__( 'Check the contact form after installing Pirate Forms' ,'openlab-lite' ),
                "description"=> esc_html__( "After installing the Pirate Forms plugin, please make sure you check your frontpage contact form is working fine. Also, if you use Openlab Lite in other language(s) please make sure the translation is ok. If not, please translate the contact form again.",'openlab-lite' ),
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
        'name' => __('Sidebar', 'openlab-lite'),
        'id' => 'sidebar-1',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => __('About us section', 'openlab-lite'),
        'id' => 'sidebar-aboutus',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h1 class="widget-title">',
        'after_title' => '</h1>',
    ));

}

add_action('widgets_init', 'openlab_widgets_init');

function openlab_slug_fonts_url() {
    $fonts_url = '';
     /* Translators: If there are characters in your language that are not
    * supported by Lora, translate this to 'off'. Do not translate
    * into your own language.
    */
    $lato = _x( 'on', 'Lato font: on or off', 'openlab-lite' );
    $homemade = _x( 'on', 'Homemade font: on or off', 'openlab-lite' );
    /* Translators: If there are characters in your language that are not
    * supported by Open Sans, translate this to 'off'. Do not translate
    * into your own language.
    */
    $monserrat = _x( 'on', 'Monserrat font: on or off', 'openlab-lite' );
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
				'name'      => 'Login customizer',
				'slug'      => 'login-customizer',
				'required'  => false,
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
				'name'      => 'Login customizer',
				'slug'      => 'login-customizer',
				'required'  => false,
			),
			array(
				'name'      => 'Pirate Forms',
				'slug'      => 'pirate-forms',
				'required'  => false,
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
            'page_title' => __('Install Required Plugins', 'openlab-lite'),
            'menu_title' => __('Install Plugins', 'openlab-lite'),
            'installing' => __('Installing Plugin: %s', 'openlab-lite'),
            'oops' => __('Something went wrong with the plugin API.', 'openlab-lite'),
            'notice_can_install_required' => _n_noop('This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.','openlab-lite'),
            'notice_can_install_recommended' => _n_noop('This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.','openlab-lite'),
            'notice_cannot_install' => _n_noop('Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.','openlab-lite'),
            'notice_can_activate_required' => _n_noop('The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.','openlab-lite'),
            'notice_can_activate_recommended' => _n_noop('The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.','openlab-lite'),
            'notice_cannot_activate' => _n_noop('Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.','openlab-lite'),
            'notice_ask_to_update' => _n_noop('The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.','openlab-lite'),
            'notice_cannot_update' => _n_noop('Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.','openlab-lite'),
            'install_link' => _n_noop('Begin installing plugin', 'Begin installing plugins','openlab-lite'),
            'activate_link' => _n_noop('Begin activating plugin', 'Begin activating plugins','openlab-lite'),
            'return' => __('Return to Required Plugins Installer', 'openlab-lite'),
            'plugin_activated' => __('Plugin activated successfully.', 'openlab-lite'),
            'complete' => __('All plugins installed and activated successfully. %s', 'openlab-lite'),
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

        $title = __("Default title",'openlab-lite');

    return $title;

}

/*****************************************/
/******          WIDGETS     *************/
/*****************************************/

add_action('widgets_init', 'openlab_register_widgets');

function openlab_register_widgets() {

	register_widget('openlab_ourfocus');
	register_widget('openlab_map_details_widget');
  register_widget('openlab_team_widget');
	register_widget('openlab_next_event_widget');
	register_widget('openlab_latest_post_widget');

	//Sidebars
	$openlab_lite_sidebars = array (
	'sidebar-ourfocus' => 'sidebar-ourfocus',
	/* 'sidebar-testimonials' => 'sidebar-testimonials',*/
	'sidebar-ourteam' => 'sidebar-ourteam' );

	/* Register sidebars */
	foreach ( $openlab_lite_sidebars as $openlab_lite_sidebar ):

		if( $openlab_lite_sidebar == 'sidebar-ourfocus' ):

			$openlab_lite_name = __('Our focus section widgets', 'openlab-lite');

		elseif( $openlab_lite_sidebar == 'sidebar-ourteam' ):

			$openlab_lite_name = __('Our team section widgets', 'openlab-lite');

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
	'sidebar-ourfocus' => 'sidebar-ourfocus',
	'sidebar-ourteam' => 'sidebar-ourteam'
);

	$active_widgets = get_option( 'sidebars_widgets' );

	/**
     * Default Our Focus widgets
     */
	if ( empty ( $active_widgets[ $openlab_lite_sidebars['sidebar-ourfocus'] ] ) ):

		$openlab_lite_counter = 1;

        /* our focus widget #1 */
		$active_widgets[ 'sidebar-ourfocus' ][0] = 'ctup-ads-widget-' . $openlab_lite_counter;
        if ( file_exists( get_stylesheet_directory_uri().'/images/parallax.png' ) ):
            $ourfocus_content[ $openlab_lite_counter ] = array ( 'title' => 'PARALLAX EFFECT', 'text' => 'Create memorable pages with smooth parallax effects that everyone loves. Also, use our lightweight content slider offering you smooth and great-looking animations.', 'link' => '#', 'image_uri' => get_stylesheet_directory_uri()."/images/parallax.png" );
        else:
            $ourfocus_content[ $openlab_lite_counter ] = array ( 'title' => 'PARALLAX EFFECT', 'text' => 'Create memorable pages with smooth parallax effects that everyone loves. Also, use our lightweight content slider offering you smooth and great-looking animations.', 'link' => '#', 'image_uri' => get_template_directory_uri()."/images/parallax.png" );
        endif;
        update_option( 'widget_ctup-ads-widget', $ourfocus_content );
        $openlab_lite_counter++;

        /* our focus widget #2 */
        $active_widgets[ 'sidebar-ourfocus' ][] = 'ctup-ads-widget-' . $openlab_lite_counter;
        if ( file_exists( get_stylesheet_directory_uri().'/images/woo.png' ) ):
            $ourfocus_content[ $openlab_lite_counter ] = array ( 'title' => 'WOOCOMMERCE', 'text' => 'Build a front page for your WooCommerce store in a matter of minutes. The neat and clean presentation will help your sales and make your store accessible to everyone.', 'link' => '#', 'image_uri' => get_stylesheet_directory_uri()."/images/woo.png" );
        else:
            $ourfocus_content[ $openlab_lite_counter ] = array ( 'title' => 'WOOCOMMERCE', 'text' => 'Build a front page for your WooCommerce store in a matter of minutes. The neat and clean presentation will help your sales and make your store accessible to everyone.', 'link' => '#', 'image_uri' => get_template_directory_uri()."/images/woo.png" );
        endif;
        update_option( 'widget_ctup-ads-widget', $ourfocus_content );
        $openlab_lite_counter++;

        /* our focus widget #3 */
        $active_widgets[ 'sidebar-ourfocus' ][] = 'ctup-ads-widget-' . $openlab_lite_counter;
        if ( file_exists( get_stylesheet_directory_uri().'/images/ccc.png' ) ):
            $ourfocus_content[ $openlab_lite_counter ] = array ( 'title' => 'CUSTOM CONTENT BLOCKS', 'text' => 'Showcase your team, products, clients, about info, testimonials, latest posts from the blog, contact form, additional calls to action. Everything translation ready.', 'link' => '#', 'image_uri' => get_stylesheet_directory_uri()."/images/ccc.png" );
        else:
            $ourfocus_content[ $openlab_lite_counter ] = array ( 'title' => 'CUSTOM CONTENT BLOCKS', 'text' => 'Showcase your team, products, clients, about info, testimonials, latest posts from the blog, contact form, additional calls to action. Everything translation ready.', 'link' => '#', 'image_uri' => get_template_directory_uri()."/images/ccc.png" );
        endif;
        update_option( 'widget_ctup-ads-widget', $ourfocus_content );
        $openlab_lite_counter++;

        /* our focus widget #4 */
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


    /**
     * Default Our Team widgets
     */
    if ( empty ( $active_widgets[ $openlab_lite_sidebars['sidebar-ourteam'] ] ) ):

        $openlab_lite_counter = 1;

        /* our team widget #1 */
        $active_widgets[ 'sidebar-ourteam' ][0] = 'openlab_team-widget-' . $openlab_lite_counter;
        $ourteam_content[ $openlab_lite_counter ] = array ( 'name' => 'ASHLEY SIMMONS', 'position' => 'Project Manager', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc dapibus, eros at accumsan auctor, felis eros condimentum quam, non porttitor est urna vel neque', 'fb_link' => '#', 'tw_link' => '#', 'bh_link' => '#', 'db_link' => '#', 'ln_link' => '#', 'image_uri' => get_template_directory_uri()."/images/team1.png" );
        update_option( 'widget_openlab_team-widget', $ourteam_content );
        $openlab_lite_counter++;

        /* our team widget #2 */
        $active_widgets[ 'sidebar-ourteam' ][] = 'openlab_team-widget-' . $openlab_lite_counter;
        $ourteam_content[ $openlab_lite_counter ] = array ( 'name' => 'TIMOTHY SPRAY', 'position' => 'Art Director', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc dapibus, eros at accumsan auctor, felis eros condimentum quam, non porttitor est urna vel neque', 'fb_link' => '#', 'tw_link' => '#', 'bh_link' => '#', 'db_link' => '#', 'ln_link' => '#', 'image_uri' => get_template_directory_uri()."/images/team2.png" );
        update_option( 'widget_openlab_team-widget', $ourteam_content );
        $openlab_lite_counter++;

        /* our team widget #3 */
        $active_widgets[ 'sidebar-ourteam' ][] = 'openlab_team-widget-' . $openlab_lite_counter;
        $ourteam_content[ $openlab_lite_counter ] = array ( 'name' => 'TONYA GARCIA', 'position' => 'Account Manager', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc dapibus, eros at accumsan auctor, felis eros condimentum quam, non porttitor est urna vel neque', 'fb_link' => '#', 'tw_link' => '#', 'bh_link' => '#', 'db_link' => '#', 'ln_link' => '#', 'image_uri' => get_template_directory_uri()."/images/team3.png" );
        update_option( 'widget_openlab_team-widget', $ourteam_content );
        $openlab_lite_counter++;

        /* our team widget #4 */
        $active_widgets[ 'sidebar-ourteam' ][] = 'openlab_team-widget-' . $openlab_lite_counter;
        $ourteam_content[ $openlab_lite_counter ] = array ( 'name' => 'JASON LANE', 'position' => 'Business Development', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc dapibus, eros at accumsan auctor, felis eros condimentum quam, non porttitor est urna vel neque', 'fb_link' => '#', 'tw_link' => '#', 'bh_link' => '#', 'db_link' => '#', 'ln_link' => '#', 'image_uri' => get_template_directory_uri()."/images/team4.png" );
        update_option( 'widget_openlab_team-widget', $ourteam_content );
        $openlab_lite_counter++;

        update_option( 'sidebars_widgets', $active_widgets );

    endif;

}

/**************************/
/****** our focus widget */
/************************/

add_action('admin_enqueue_scripts', 'openlab_ourfocus_widget_scripts');

function openlab_ourfocus_widget_scripts() {

	wp_enqueue_media();
  wp_enqueue_script('openlab_our_focus_widget_script', get_template_directory_uri() . '/js/widget.js', false, '1.0', true);

}

class openlab_ourfocus extends WP_Widget {

	public function __construct() {
		parent::__construct(
			'ctUp-ads-widget',
			__( 'Openlab - Our focus widget', 'openlab-lite' )
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
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'openlab-lite'); ?></label><br/>
            <input type="text" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" value="<?php if( !empty($instance['title']) ): echo $instance['title']; endif; ?>" class="widefat">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('text'); ?>"><?php _e('Text', 'openlab-lite'); ?></label><br/>
            <textarea class="widefat" rows="8" cols="20" name="<?php echo $this->get_field_name('text'); ?>" id="<?php echo $this->get_field_id('text'); ?>"><?php if( !empty($instance['text']) ): echo htmlspecialchars_decode($instance['text']); endif; ?></textarea>
        </p>
		<p>
			<label for="<?php echo $this->get_field_id('link'); ?>"><?php _e('Link','openlab-lite'); ?></label><br />
			<input type="text" name="<?php echo $this->get_field_name('link'); ?>" id="<?php echo $this->get_field_id('link'); ?>" value="<?php if( !empty($instance['link']) ): echo $instance['link']; endif; ?>" class="widefat">
		</p>
        <p>
            <label for="<?php echo $this->get_field_id('image_uri'); ?>"><?php _e('Image', 'openlab-lite'); ?></label><br/>
            <?php
            if ( !empty($instance['image_uri']) ) :
                echo '<img class="custom_media_image" src="' . $instance['image_uri'] . '" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" alt="'.__( 'Uploaded image', 'openlab-lite' ).'" /><br />';
            endif;
            ?>

            <input type="text" class="widefat custom_media_url" name="<?php echo $this->get_field_name('image_uri'); ?>" id="<?php echo $this->get_field_id('image_uri'); ?>" value="<?php if( !empty($instance['image_uri']) ): echo $instance['image_uri']; endif; ?>" style="margin-top:5px;">

            <input type="button" class="button button-primary custom_media_button" id="custom_media_button" name="<?php echo $this->get_field_name('image_uri'); ?>" value="<?php _e('Upload Image','openlab-lite'); ?>" style="margin-top:5px;"/>
        </p>
    <?php

    }

}

/****************************/
/****** Next Event widget **/
/***************************/
class openlab_next_event_widget extends WP_Widget {

	public function __construct() {
		parent::__construct(
			'openlab-next-event-widget',
			__( 'Openlab - Next Event widget', 'openlab-lite' )
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
			__( 'Openlab - Latest Post widget', 'openlab-lite' )
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

/****************************/
/****** Map Detals widget **/
/***************************/
class openlab_map_details_widget extends WP_Widget {

	public function __construct() {
		parent::__construct(
			'openlab_map_details_widget',
			__( 'Openlab - Map Details Widget', 'openlab-lite' )
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


/* oplb_events_get_calendar() :: Extends get_calendar() by including custom post types.
 * Derived from get_calendar() code in /wp-includes/general-template.php.
 */

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
  $calendar_output = '<table id="wp-calendar" summary="' . esc_attr__( 'Calendar' ) . '">
  <caption>' . sprintf( $calendar_caption , $wp_locale->get_month( $thismonth ) , date( 'Y' , $unixmonth ) ) . '</caption>
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
  </thead>

  <tfoot>
  <tr>';
//disable months
  /*if ( $previous ) {    $calendar_output .= "\n\t\t" . '<td colspan="3" id="prev"><a href="' . get_month_link( $previous->year , $previous->month ) . '&post_type=event" title="' . sprintf( __( 'View posts for %1$s %2$s' ) , $wp_locale->get_month( $previous->month ) , date( 'Y' , mktime( 0 , 0 , 0 , $previous->month , 1 , $previous->year ) ) ) . '">&laquo; ' . $wp_locale->get_month_abbrev( $wp_locale->get_month( $previous->month ) ) . '</a></td>';
  } else {
    $calendar_output .= "\n\t\t" . '<td colspan="3" id="prev" class="pad">&nbsp;</td>';
  }

  $calendar_output .= "\n\t\t" . '<td class="pad">&nbsp;</td>';

  if ( $next ) {    $calendar_output .= "\n\t\t" . '<td colspan="3" id="next"><a href="' . get_month_link( $next->year , $next->month ) . '&post_type=event" title="' . esc_attr( sprintf( __( 'View posts for %1$s %2$s' ) , $wp_locale->get_month( $next->month ) , date( 'Y' , mktime( 0 , 0 , 0 , $next->month , 1 , $next->year ) ) ) ) . '">' . $wp_locale->get_month_abbrev( $wp_locale->get_month( $next->month ) ) . ' &raquo;</a></td>';
  } else {
    $calendar_output .= "\n\t\t" . '<td colspan="3" id="next" class="pad">&nbsp;</td>';
  }
  */

  $calendar_output .= '
  </tr>
  </tfoot>

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
			__( 'Openlab - Team member widget', 'openlab-lite' )
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

						<img src="<?php echo esc_url($instance['image_uri']); ?>" alt="<?php _e( 'Uploaded image', 'openlab-lite' ); ?>" />

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
                            $openlab_team_target = '_self';
                            if( !empty($instance['open_new_window']) ):
                                $openlab_team_target = '_blank';
                            endif;
                        ?>

                        <?php if ( !empty($instance['fb_link']) ): ?>
                            <li>
															<a href="<?php echo apply_filters('widget_title', $instance['fb_link']); ?>" target="<?php echo $openlab_team_target; ?>">
																<span class="widget-social">
																	<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
																		 viewBox="-230 373.4 50 50" style="enable-background:new -230 373.4 50 50;" xml:space="preserve">
																	<g>
																		<polyline points="-230,423.4 -230,373.4 -180,373.4 	"/>
																		<path class="st1" d="M-187.7,403.3l1-7.7h-7.6v-4.9c0-2.2,0.6-3.7,3.8-3.7l4.1,0v-6.8c-0.7-0.1-3.1-0.3-5.9-0.3
																			c-5.8,0-9.8,3.6-9.8,10.1v5.6h-6.6v7.7h6.6v19.6h7.9v-19.6H-187.7z"/>
																	</g>
																	</svg>
																</span>
															</a>
														</li>
                        <?php endif; ?>

                        <?php if ( !empty($instance['tw_link']) ): ?>
                            <li>
															<a href="<?php echo apply_filters('widget_title', $instance['tw_link']); ?>" target="<?php echo $openlab_team_target; ?>">
																<span class="widget-social">
																	<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
																		 viewBox="-230.1 373.4 50 50" style="enable-background:new -230.1 373.4 50 50;" xml:space="preserve">
																	<polyline class="st0" points="-230.1,423.4 -230.1,373.4 -180.1,373.4 "/>
																	<path class="st1" d="M-189.7,388c-1.2,0.5-2.5,0.9-3.9,1.1c1.4-0.8,2.5-2.2,3-3.8c-1.3,0.8-2.8,1.4-4.3,1.7c-1.2-1.3-3-2.2-5-2.2
																		c-3.8,0-6.8,3.1-6.8,6.8c0,0.5,0.1,1.1,0.2,1.6c-5.7-0.3-10.7-3-14.1-7.1c-0.6,1-0.9,2.2-0.9,3.4c0,2.4,1.2,4.5,3,5.7
																		c-1.1,0-2.2-0.3-3.1-0.9v0.1c0,3.3,2.4,6.1,5.5,6.7c-0.6,0.2-1.2,0.2-1.8,0.2c-0.4,0-0.9,0-1.3-0.1c0.9,2.7,3.4,4.7,6.4,4.7
																		c-2.3,1.8-5.3,2.9-8.5,2.9c-0.6,0-1.1,0-1.6-0.1c3,1.9,6.6,3.1,10.5,3.1c12.6,0,19.5-10.4,19.5-19.5c0-0.3,0-0.6,0-0.9
																		C-191.8,390.6-190.6,389.4-189.7,388z"/>
																	</svg>
																</span>
															</a>
														</li>
                        <?php endif; ?>

                        <?php if ( !empty($instance['bh_link']) ): ?>
                            <li>
															<a href="<?php echo apply_filters('widget_title', $instance['bh_link']); ?>" target="<?php echo $openlab_team_target; ?>">
																<span class="widget-social">
																	<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
																		 viewBox="-230.2 373.4 49.3 50" style="enable-background:new -230.2 373.4 49.3 50;" xml:space="preserve">
																	<polyline class="st0" points="-230.2,423.4 -230.2,373.4 -180.8,373.4 "/>
																	<path class="st1" d="M-209,395.6c0,0,3.1-0.2,3.1-3.9c0-3.7-2.6-5.5-5.8-5.5h-6h-0.2h-4.6v20.6h4.6h0.2h6c0,0,6.6,0.2,6.6-6.1
																		C-205.2,400.7-204.9,395.6-209,395.6z M-212.5,389.9h0.8c0,0,1.5,0,1.5,2.1s-0.9,2.5-1.8,2.5h-5.6v-4.6H-212.5z M-212,403.2h-5.7
																		v-5.5h6c0,0,2.2,0,2.2,2.8C-209.6,402.9-211.2,403.2-212,403.2z"/>
																	<path class="st1" d="M-196.4,391.4c-7.9,0-7.9,7.9-7.9,7.9s-0.5,7.9,7.9,7.9c0,0,7.1,0.4,7.1-5.5h-3.6c0,0,0.1,2.2-3.3,2.2
																		c0,0-3.6,0.2-3.6-3.6h10.7C-189.2,400.4-188.1,391.4-196.4,391.4z M-200,397.6c0,0,0.4-3.2,3.6-3.2c3.2,0,3.1,3.2,3.1,3.2H-200z"/>
																	<rect x="-200.9" y="387.4" class="st1" width="8.5" height="2.5"/>
																	</svg>
																</span>
															</a>
														</li>
                        <?php endif; ?>

                        <?php if ( !empty($instance['db_link']) ): ?>
                            <li>
															<a href="<?php echo apply_filters('widget_title', $instance['db_link']); ?>" target="<?php echo $openlab_team_target; ?>">
																<span class="widget-social">
																	<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
																		viewBox="-230 373 49.2 50" style="enable-background:new -230 373 49.2 50;" xml:space="preserve">
																		<polyline class="st0" points="-230,423 -230,373 -180.8,373 "/>
																		<path class="st1" d="M-206.2,380.8c0.3,0.2,0.7,0.5,1,0.8c0.4,0.4,0.7,0.9,1.1,1.4c0.3,0.5,0.6,1.2,0.9,1.9c0.2,0.7,0.3,1.6,0.3,2.6
																		c0,1.8-0.4,3.2-1.2,4.3c-0.4,0.5-0.8,1-1.2,1.4c-0.5,0.4-0.9,0.9-1.4,1.3c-0.3,0.3-0.6,0.7-0.8,1c-0.3,0.4-0.4,0.9-0.4,1.4
																		c0,0.5,0.1,0.9,0.4,1.3c0.3,0.3,0.5,0.6,0.7,0.9l1.7,1.4c1,0.9,1.9,1.8,2.7,2.8c0.7,1.1,1.1,2.4,1.1,4.1c0,2.4-1.1,4.6-3.1,6.4
																		c-2.2,1.9-5.3,2.9-9.4,3c-3.4,0-6-0.8-7.7-2.2c-1.7-1.4-2.6-3-2.6-4.9c0-0.9,0.3-1.9,0.8-3.1c0.5-1.1,1.5-2.1,2.9-3
																		c1.6-0.9,3.3-1.5,5-1.8c1.7-0.3,3.2-0.4,4.3-0.4c-0.4-0.5-0.7-1-0.9-1.5c-0.3-0.5-0.5-1.1-0.5-1.9c0-0.4,0.1-0.8,0.2-1.1
																		c0.1-0.3,0.2-0.6,0.3-0.9c-0.6,0.1-1.1,0.1-1.6,0.1c-2.6,0-4.6-0.9-6-2.5c-1.4-1.5-2.1-3.3-2.1-5.3c0-2.4,1-4.7,3-6.7
																		c1.4-1.2,2.8-1.9,4.3-2.3c1.5-0.3,2.9-0.5,4.2-0.5h9.8l-3,1.8L-206.2,380.8L-206.2,380.8z M-204.3,409.5c0-1.3-0.4-2.4-1.2-3.3
																		c-0.9-0.9-2.2-2-4-3.3c-0.3,0-0.7,0-1.1,0c-0.3,0-0.9,0-1.9,0.1c-1,0.1-2.1,0.4-3.1,0.7c-0.3,0.1-0.6,0.2-1.1,0.4
																		c-0.5,0.2-0.9,0.5-1.4,0.9c-0.5,0.4-0.8,0.9-1.1,1.5c-0.4,0.6-0.5,1.4-0.5,2.3c0,1.7,0.8,3.2,2.3,4.3c1.5,1.1,3.5,1.7,6.1,1.8
																		c2.3,0,4.1-0.6,5.3-1.6C-204.9,412.3-204.3,411-204.3,409.5z M-211.2,394.9c1.3,0,2.4-0.5,3.2-1.4c0.4-0.6,0.7-1.3,0.8-1.9
																		c0.1-0.7,0.1-1.2,0.1-1.7c0-2-0.5-3.9-1.5-5.9c-0.5-1-1.1-1.7-1.8-2.3c-0.8-0.6-1.7-0.9-2.7-0.9c-1.3,0-2.4,0.6-3.3,1.6
																		c-0.7,1.1-1.1,2.3-1.1,3.7c0,1.8,0.5,3.7,1.6,5.6c0.5,0.9,1.1,1.7,1.9,2.3C-213.1,394.6-212.2,394.9-211.2,394.9z"/>
																		<polygon class="st1" points="-186.9,384.5 -192,384.5 -192,379.2 -194.5,379.2 -194.5,384.5 -199.7,384.5 -199.7,387 -194.5,387
																		-194.5,392.2 -192,392.2 -192,387 -186.9,387 "/>
																	</svg>
																</span>
															</a>
														</li>
                        <?php endif; ?>

						<?php if ( !empty($instance['ln_link']) ): ?>
                            <li>
															<a href="<?php echo apply_filters('widget_title', $instance['ln_link']); ?>" target="<?php echo $openlab_team_target; ?>">
																<span class="widget-social">
																	<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
																		 viewBox="-230 373.4 50 50" style="enable-background:new -230 373.4 50 50;" xml:space="preserve">
																	<g>
																		<polyline class="st0" points="-230,423.4 -230,373.4 -180,373.4 	"/>
																		<path class="st1" d="M-221.5,392.7h7.1v22.7h-7.1V392.7z M-217.9,381.4c2.3,0,4.1,1.8,4.1,4.1c0,2.3-1.8,4.1-4.1,4.1
																			c-2.3,0-4.1-1.8-4.1-4.1C-222,383.2-220.2,381.4-217.9,381.4"/>
																		<path class="st1" d="M-210,392.7h6.8v3.1h0.1c0.9-1.8,3.2-3.7,6.7-3.7c7.1,0,8.5,4.7,8.5,10.8v12.4h-7v-11c0-2.6-0.1-6-3.7-6
																			c-3.7,0-4.2,2.9-4.2,5.8v11.2h-7C-210,415.3-210,392.7-210,392.7z"/>
																	</g>
																	</svg>
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
        $instance['db_link'] = strip_tags($new_instance['db_link']);
				$instance['ln_link'] = strip_tags($new_instance['ln_link']);
        $instance['image_uri'] = strip_tags($new_instance['image_uri']);
        $instance['open_new_window'] = strip_tags($new_instance['open_new_window']);

        return $instance;

    }

    function form($instance) {

        ?>

        <p>
            <label for="<?php echo $this->get_field_id('name'); ?>"><?php _e('Name', 'openlab-lite'); ?></label><br/>
            <input type="text" name="<?php echo $this->get_field_name('name'); ?>" id="<?php echo $this->get_field_id('name'); ?>" value="<?php if( !empty($instance['name']) ): echo $instance['name']; endif; ?>" class="widefat"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('position'); ?>"><?php _e('Position', 'openlab-lite'); ?></label><br/>
            <textarea class="widefat" rows="8" cols="20" name="<?php echo $this->get_field_name('position'); ?>" id="<?php echo $this->get_field_id('position'); ?>"><?php if( !empty($instance['position']) ): echo htmlspecialchars_decode($instance['position']); endif; ?></textarea>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('fb_link'); ?>"><?php _e('Facebook link', 'openlab-lite'); ?></label><br/>
            <input type="text" name="<?php echo $this->get_field_name('fb_link'); ?>" id="<?php echo $this->get_field_id('fb_link'); ?>" value="<?php if( !empty($instance['fb_link']) ): echo $instance['fb_link']; endif; ?>" class="widefat">

        </p>
        <p>
            <label for="<?php echo $this->get_field_id('tw_link'); ?>"><?php _e('Twitter link', 'openlab-lite'); ?></label><br/>
            <input type="text" name="<?php echo $this->get_field_name('tw_link'); ?>" id="<?php echo $this->get_field_id('tw_link'); ?>" value="<?php if( !empty($instance['tw_link']) ): echo $instance['tw_link']; endif; ?>" class="widefat">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('bh_link'); ?>"><?php _e('Behance link', 'openlab-lite'); ?></label><br/>
            <input type="text" name="<?php echo $this->get_field_name('bh_link'); ?>" id="<?php echo $this->get_field_id('bh_link'); ?>" value="<?php if( !empty($instance['bh_link']) ): echo $instance['bh_link']; endif; ?>" class="widefat">

        </p>
        <p>
            <label for="<?php echo $this->get_field_id('db_link'); ?>"><?php _e('Dribble link', 'openlab-lite'); ?></label><br/>
            <input type="text" name="<?php echo $this->get_field_name('db_link'); ?>" id="<?php echo $this->get_field_id('db_link'); ?>" value="<?php if( !empty($instance['db_link']) ): echo $instance['db_link']; endif; ?>" class="widefat">
        </p>
		<p>
            <label for="<?php echo $this->get_field_id('ln_link'); ?>"><?php _e('Linkedin link', 'openlab-lite'); ?></label><br/>
            <input type="text" name="<?php echo $this->get_field_name('ln_link'); ?>" id="<?php echo $this->get_field_id('ln_link'); ?>" value="<?php if( !empty($instance['ln_link']) ): echo $instance['ln_link']; endif; ?>" class="widefat">
        </p>
        <p>
            <input type="checkbox" name="<?php echo $this->get_field_name('open_new_window'); ?>" id="<?php echo $this->get_field_id('open_new_window'); ?>" <?php if( !empty($instance['open_new_window']) ): checked( (bool) $instance['open_new_window'], true ); endif; ?> ><?php _e( 'Open links in new window?','openlab-lite' ); ?><br>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('image_uri'); ?>"><?php _e('Image', 'openlab-lite'); ?></label><br/>

            <?php

            if ( !empty($instance['image_uri']) ) :

                echo '<img class="custom_media_image_team" src="' . $instance['image_uri'] . '" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" alt="'.__( 'Uploaded image', 'openlab-lite' ).'" /><br />';

            endif;

            ?>

            <input type="text" class="widefat custom_media_url_team" name="<?php echo $this->get_field_name('image_uri'); ?>" id="<?php echo $this->get_field_id('image_uri'); ?>" value="<?php if( !empty($instance['image_uri']) ): echo $instance['image_uri']; endif; ?>" style="margin-top:5px;">
            <input type="button" class="button button-primary custom_media_button_team" id="custom_media_button_clients" name="<?php echo $this->get_field_name('image_uri'); ?>" value="<?php _e('Upload Image','openlab-lite'); ?>" style="margin-top:5px;">
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
			if( ($avail_sl !== false) || ( count($avail_sl) >= 2 ) ){
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
		'title' => __( 'The Date/Time Event Starts', 'openlab-lite' ),
		'post_types' => 'event',
		'fields' => array(
			array(
				'name' => __( 'Date and time', 'openlab-lite' ),
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
														'required'  => __( 'Please select a date/time', 'openlab-lite' )
														)
														)
			),
	);

	// Date time Picker for event END time
	$meta_boxes[] = array(
		'title' => __( 'The Date/Time Event Ends', 'openlab-lite' ),
		'post_types' => 'event',
		'fields' => array(
			array(
				'name' => __( 'Date and time', 'openlab-lite' ),
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
														'required'  => __( 'Please select a date/time', 'openlab-lite' )
														)
														)
			),
	);

	// Google Map
	$meta_boxes[] = array(
		'title'  => __( 'Location of Event', 'openlab-lite' ),
		'post_types' => 'event',
		'fields' => array(
			// Map requires at least one address field (with type = text)
			array(
				'id'   => 'event_location',
				'name' => __( 'Address', 'openlab-lite' ),
				'type' => 'text',
				'std'  => __( 'Athens, Greece', 'openlab-lite' ),
			),
			array(
				'id'            => 'map',
				'name'          => __( 'Location', 'openlab-lite' ),
				'type'          => 'map',
				// Default location: 'latitude,longitude[,zoom]' (zoom is optional)
				'std'           => '37.9758306,23.7389269,15',
				// Name of text field where address is entered. Can be list of text fields, separated by commas (for ex. city, state)
				'address_field' => 'event_location',
			),
		),
	);

	// Slider Images
	$meta_boxes[] = array(
		'title'  => __( 'Event Slider Images', 'openlab-lite' ),
		'post_types' => 'event',
		'fields' => array(
			array(
				'id'               => 'image_advanced',
				'name'             => __( 'Slider images', 'openlab-lite' ),
				'type'             => 'image_advanced',
				'force_delete'     => false,
				'max_file_uploads' => 9,
			),
		),
	);

	//Type of event
	$meta_boxes[] = array(
		'title'  => __( 'Select the Type of Event', 'openlab-lite' ),
		'post_types' => 'event',
		'fields' => array(
			array(
				'name'        => __( 'Select the Type of Event', 'openlab-lite' ),
				'id'          => 'event_type',
				'type'        => 'select',
				'options'     => array(
					'speech' => __( 'Speech', 'openlab-lite' ),
					'seminar' => __( 'Seminar', 'openlab-lite' ),
					'workshop' => __( 'Workshop', 'openlab-lite' ),
				),
				'multiple'    => false,
				'placeholder' => __( 'Select...', 'openlab-lite' ),
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
														'required'  => __( 'Please select an event type', 'openlab-lite' )
														)
														)
			),

	);

	//Ninja Form Select
	//get available ninja forms
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
	if($available_forms){
	$meta_boxes[] = array(
		'title'  => __( 'Select a Ninja Form', 'openlab-lite' ),
		'post_types' => 'event',
		'fields' => array(
			array(
				'name'        => __( 'Select a ninja Form', 'openlab-lite' ),
				'id'          => 'selected_ninja_form_id',
				'type'        => 'select',
				// Array of 'value' => 'Label' pairs for select box
				'options'     => $available_forms,
				// Select multiple values, optional. Default is false.
				'multiple'    => false,
				'placeholder' => __( 'Select...', 'openlab-lite' ),
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
		$openlab_slides[] = $openlab_sl_1;
	endif;

	if($openlab_sl_2):
		$openlab_slides[] = $openlab_sl_2;
	endif;

	if($openlab_sl_3):
		$openlab_slides[] = $openlab_sl_3;
	endif;

	if($openlab_sl_4):
		$openlab_slides[] = $openlab_sl_4;
	endif;

	if($openlab_sl_5):
		$openlab_slides[] = $openlab_sl_5;
	endif;

	if($openlab_sl_6):
		$openlab_slides[] = $openlab_sl_6;
	endif;

	if($openlab_slides){
		return $openlab_slides;
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
