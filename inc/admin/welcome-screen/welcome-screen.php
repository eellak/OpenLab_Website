<?php
/**
 * Welcome Screen Class
 */
class Openlab_Welcome {

	/**
	 * Constructor for the welcome screen
	 */
	public function __construct() {

		/* create dashbord page */
		add_action( 'admin_menu', array( $this, 'openlab_lite_welcome_register_menu' ) );

		/* activation notice */
		add_action( 'load-themes.php', array( $this, 'openlab_lite_activation_admin_notice' ) );

		/* enqueue script and style for welcome screen */
		add_action( 'admin_enqueue_scripts', array( $this, 'openlab_lite_welcome_style_and_scripts' ) );

		/* enqueue script for customizer */
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'openlab_lite_welcome_scripts_for_customizer' ) );

		/* load welcome screen */
		add_action( 'openlab_lite_welcome', array( $this, 'openlab_lite_welcome_getting_started' ), 	    10 );
		add_action( 'openlab_lite_welcome', array( $this, 'openlab_lite_welcome_actions_required' ),        20 );
		//add_action( 'openlab_lite_welcome', array( $this, 'openlab_lite_welcome_child_themes' ), 		    30 );
		//add_action( 'openlab_lite_welcome', array( $this, 'openlab_lite_welcome_github' ), 		            40 );
		//add_action( 'openlab_lite_welcome', array( $this, 'openlab_lite_welcome_changelog' ), 				50 );
		//add_action( 'openlab_lite_welcome', array( $this, 'openlab_lite_welcome_free_pro' ), 				60 );

		/* ajax callback for dismissable required actions */
		add_action( 'wp_ajax_openlab_lite_dismiss_required_action', array( $this, 'openlab_lite_dismiss_required_action_callback') );
		add_action( 'wp_ajax_nopriv_openlab_lite_dismiss_required_action', array($this, 'openlab_lite_dismiss_required_action_callback') );

	}

	/**
	 * Creates the dashboard page
	 * @see  add_theme_page()
	 * @since 1.8.2.4
	 */
	public function openlab_lite_welcome_register_menu() {
		add_theme_page( 'About Openlab Lite', 'About Openlab Lite', 'activate_plugins', 'openlab-lite-welcome', array( $this, 'openlab_lite_welcome_screen' ) );
	}

	/**
	 * Adds an admin notice upon successful activation.
	 * @since 1.8.2.4
	 */
	public function openlab_lite_activation_admin_notice() {
		global $pagenow;

		if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {
			add_action( 'admin_notices', array( $this, 'openlab_lite_welcome_admin_notice' ), 99 );
		}
	}

	/**
	 * Display an admin notice linking to the welcome screen
	 * @since 1.8.2.4
	 */
	public function openlab_lite_welcome_admin_notice() {
		?>
			<div class="updated notice is-dismissible">
				<p><?php echo sprintf( esc_html__( 'Welcome to Openlab theme!', 'openlab-lite' ), '<a href="' . esc_url( admin_url( 'themes.php?page=openlab-lite-welcome' ) ) . '">', '</a>' ); ?></p>
				<p><a href="<?php echo esc_url( admin_url( 'themes.php?page=openlab-lite-welcome' ) ); ?>" class="button" style="text-decoration: none;"><?php _e( 'Get started with Openlab Lite', 'openlab-lite' ); ?></a></p>
			</div>
		<?php
	}

	/**
	 * Load welcome screen css and javascript
	 * @since  1.8.2.4
	 */
	public function openlab_lite_welcome_style_and_scripts( $hook_suffix ) {

		if ( 'appearance_page_openlab-lite-welcome' == $hook_suffix ) {
			wp_enqueue_style( 'openlab-lite-welcome-screen-css', get_template_directory_uri() . '/inc/admin/welcome-screen/css/welcome.css' );
			wp_enqueue_script( 'openlab-lite-welcome-screen-js', get_template_directory_uri() . '/inc/admin/welcome-screen/js/welcome.js', array('jquery') );

			global $openlab_required_actions;

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

			wp_localize_script( 'openlab-lite-welcome-screen-js', 'openlabLiteWelcomeScreenObject', array(
				'nr_actions_required' => $nr_actions_required,
				'ajaxurl' => admin_url( 'admin-ajax.php' ),
				'template_directory' => get_template_directory_uri(),
				'no_required_actions_text' => __( 'Hooray! There are no required actions for you right now.','openlab-lite' )
			) );
		}
	}

	/**
	 * Load scripts for customizer page
	 * @since  1.8.2.4
	 */
	public function openlab_lite_welcome_scripts_for_customizer() {

		wp_enqueue_style( 'openlab-lite-welcome-screen-customizer-css', get_template_directory_uri() . '/inc/admin/welcome-screen/css/welcome_customizer.css' );
		wp_enqueue_script( 'openlab-lite-welcome-screen-customizer-js', get_template_directory_uri() . '/inc/admin/welcome-screen/js/welcome_customizer.js', array('jquery'), '20120206', true );

		global $openlab_required_actions;

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

		wp_localize_script( 'openlab-lite-welcome-screen-customizer-js', 'openlabLiteWelcomeScreenCustomizerObject', array(
			'nr_actions_required' => $nr_actions_required,
			'aboutpage' => esc_url( admin_url( 'themes.php?page=openlab-lite-welcome#actions_required' ) ),
			'customizerpage' => esc_url( admin_url( 'customize.php#actions_required' ) ),
			'themeinfo' => __('View Theme Info','openlab-lite'),
		) );
	}

	/**
	 * Dismiss required actions
	 * @since 1.8.2.4
	 */
	public function openlab_lite_dismiss_required_action_callback() {

		global $openlab_required_actions;

		$openlab_dismiss_id = (isset($_GET['dismiss_id'])) ? $_GET['dismiss_id'] : 0;

		echo $openlab_dismiss_id; /* this is needed and it's the id of the dismissable required action */

		if( !empty($openlab_dismiss_id) ):

			/* if the option exists, update the record for the specified id */
			if( get_option('openlab_show_required_actions') ):

				$openlab_show_required_actions = get_option('openlab_show_required_actions');

				$openlab_show_required_actions[$openlab_dismiss_id] = false;

				update_option( 'openlab_show_required_actions',$openlab_show_required_actions );

			/* create the new option,with false for the specified id */
			else:

				$openlab_show_required_actions_new = array();

				if( !empty($openlab_required_actions) ):

					foreach( $openlab_required_actions as $openlab_required_action ):

						if( $openlab_required_action['id'] == $openlab_dismiss_id ):
							$openlab_show_required_actions_new[$openlab_required_action['id']] = false;
						else:
							$openlab_show_required_actions_new[$openlab_required_action['id']] = true;
						endif;

					endforeach;

				update_option( 'openlab_show_required_actions', $openlab_show_required_actions_new );

				endif;

			endif;

		endif;

		die(); // this is required to return a proper result
	}


	/**
	 * Welcome screen content
	 * @since 1.8.2.4
	 */
	public function openlab_lite_welcome_screen() {

		require_once( ABSPATH . 'wp-load.php' );
		require_once( ABSPATH . 'wp-admin/admin.php' );
		require_once( ABSPATH . 'wp-admin/admin-header.php' );
		?>

		<ul class="openlab-lite-nav-tabs" role="tablist">
			<li role="presentation" class="active"><a href="#getting_started" aria-controls="getting_started" role="tab" data-toggle="tab"><?php esc_html_e( 'Getting started','openlab-lite'); ?></a></li>
			<li role="presentation" class="openlab-lite-w-red-tab"><a href="#actions_required" aria-controls="actions_required" role="tab" data-toggle="tab"><?php esc_html_e( 'Actions required','openlab-lite'); ?></a></li>
			<li role="presentation"><a href="#child_themes" aria-controls="child_themes" role="tab" data-toggle="tab"><?php esc_html_e( 'Child themes','openlab-lite'); ?></a></li>
		</ul>

		<div class="openlab-lite-tab-content">

			<?php
			/**
			 * @hooked openlab_lite_welcome_getting_started - 10
			 * @hooked openlab_lite_welcome_actions_required - 20
			 * @hooked openlab_lite_welcome_child_themes - 30
			 * @hooked openlab_lite_welcome_github - 40
			 * @hooked openlab_lite_welcome_changelog - 50
			 * @hooked openlab_lite_welcome_free_pro - 60
			 */
			do_action( 'openlab_lite_welcome' ); ?>

		</div>
		<?php
	}

	/**
	 * Getting started
	 * @since 1.8.2.4
	 */
	public function openlab_lite_welcome_getting_started() {
		require_once( get_template_directory() . '/inc/admin/welcome-screen/sections/getting-started.php' );
	}

	/**
	 * Actions required
	 * @since 1.8.2.4
	 */
	public function openlab_lite_welcome_actions_required() {
		require_once( get_template_directory() . '/inc/admin/welcome-screen/sections/actions-required.php' );
	}

	/**
	 * Child themes
	 * @since 1.8.2.4
	 */
	public function openlab_lite_welcome_child_themes() {
		require_once( get_template_directory() . '/inc/admin/welcome-screen/sections/child-themes.php' );
	}

	/**
	 * Contribute
	 * @since 1.8.2.4
	 */
	public function openlab_lite_welcome_github() {
		//require_once( get_template_directory() . '/inc/admin/welcome-screen/sections/github.php' );
	}

	/**
	 * Changelog
	 * @since 1.8.2.4
	 */
	public function openlab_lite_welcome_changelog() {
		//require_once( get_template_directory() . '/inc/admin/welcome-screen/sections/changelog.php' );
	}

	/**
	 * Free vs PRO
	 * @since 1.8.2.4
	 */
	public function openlab_lite_welcome_free_pro() {
		//require_once( get_template_directory() . '/inc/admin/welcome-screen/sections/free_pro.php' );
	}
}

$GLOBALS['Openlab_Welcome'] = new Openlab_Welcome();