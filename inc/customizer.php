<?php
/**
 * openlab Theme Customizer
 *
 * @package openlab
 */
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function openlab_customize_register( $wp_customize ) {
	class Openlab_Customize_Textarea_Control extends WP_Customize_Control {
		public $type = 'textarea';

		public function render_content() {
			?>
			<label>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
			</label>
			<?php
		}
	}
	class Openlab_Customizer_Number_Control extends WP_Customize_Control {
		public $type = 'number';
		public function render_content() {
		?>
			<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<input type="number" <?php $this->link(); ?> value="<?php echo intval( $this->value() ); ?>" />
			</label>
		<?php
		}
	}
	class Openlab_Theme_Support extends WP_Customize_Control
	{
		public function render_content()
		{

		}
	}

	class Openlab_Theme_Support_Videobackground extends WP_Customize_Control
	{
		public function render_content()
		{

		}
	}

	class Openlab_Theme_Support_Googlemap extends WP_Customize_Control
	{
		public function render_content()
		{

		}
	}

	class Openlab_Theme_Support_Pricing extends WP_Customize_Control
	{
		public function render_content()
		{

		}
	}

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->remove_section('colors');


	/***********************************************/
	/************** GENERAL OPTIONS  ***************/
	/***********************************************/
	if ( class_exists( 'WP_Customize_Panel' ) ):

		$wp_customize->add_panel( 'panel_general', array(
			'priority' => 30,
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'title' => __( 'General options', 'openlab-txtd' )
		) );

		$wp_customize->add_section( 'openlab_general_section' , array(
				'title'       => __( 'General', 'openlab-txtd' ),
				'priority'    => 30,
				'panel' => 'panel_general'
		));

		/* LOGO	*/
		$wp_customize->add_setting( 'openlab_logo', array('sanitize_callback' => 'esc_url_raw'));
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_logo', array(
				'label'    => __( 'Logo', 'openlab-txtd' ),
				'section'  => 'title_tagline',
				'settings' => 'openlab_logo',
				'priority'    => 1,
		)));

		/* Disable preloader */
		$wp_customize->add_setting( 'openlab_disable_preloader', array('sanitize_callback' => 'openlab_sanitize_text'));
		$wp_customize->add_control(
				'openlab_disable_preloader',
				array(
					'type' => 'checkbox',
					'label' => __('Disable preloader?','openlab-txtd'),
					'section' => 'openlab_general_section',
					'priority'    => 2,
				)
		);

		/* Disable smooth scroll */
		$wp_customize->add_setting( 'openlab_disable_smooth_scroll', array('sanitize_callback' => 'openlab_sanitize_text'));
		$wp_customize->add_control(
				'openlab_disable_smooth_scroll',
				array(
					'type' 		=> 'checkbox',
					'label' 	=> __('Disable smooth scroll?','openlab-txtd'),
					'section' 	=> 'openlab_general_section',
					'priority'	=> 3,
				)
		);

		/* News Page Select */
		$wp_customize->add_setting( 'openlab_news_page_id', array('sanitize_callback' => 'absint','default' => ''));
		$wp_customize->add_control( 'openlab_news_page_id', array(
				'label'    => __( 'Select the News Page', 'openlab-txtd' ),
				'section'  => 'openlab_general_section',
				'settings' => 'openlab_news_page_id',
				'type'     => 'dropdown-pages',
				'priority' => 4,
		));

		/* Events Page Select */
		$wp_customize->add_setting( 'openlab_events_page_id', array('sanitize_callback' => 'absint','default' => ''));
		$wp_customize->add_control( 'openlab_events_page_id', array(
				'label'    => __( 'Select the Events Page', 'openlab-txtd' ),
				'section'  => 'openlab_general_section',
				'settings' => 'openlab_events_page_id',
				'type'     => 'dropdown-pages',
				'priority' => 5,
		));

		$wp_customize->add_section( 'openlab_general_socials_section' , array(
				'title'       => __( 'Socials', 'openlab-txtd' ),
				'priority'    => 31,
				'panel' => 'panel_general'
		));

		/* facebook */
		$wp_customize->add_setting( 'openlab_socials_facebook', array('sanitize_callback' => 'esc_url_raw','default' => '#'));
		$wp_customize->add_control( 'openlab_socials_facebook', array(
				'label'    => __( 'Facebook link', 'openlab-txtd' ),
				'section'  => 'openlab_general_socials_section',
				'settings' => 'openlab_socials_facebook',
				'priority'    => 4,
		));
		/* twitter */
		$wp_customize->add_setting( 'openlab_socials_twitter', array('sanitize_callback' => 'esc_url_raw','default' => '#'));
		$wp_customize->add_control( 'openlab_socials_twitter', array(
				'label'    => __( 'Twitter link', 'openlab-txtd' ),
				'section'  => 'openlab_general_socials_section',
				'settings' => 'openlab_socials_twitter',
				'priority'    => 5,
		));
		/* linkedin */
		$wp_customize->add_setting( 'openlab_socials_linkedin', array('sanitize_callback' => 'esc_url_raw','default' => '#'));
		$wp_customize->add_control( 'openlab_socials_linkedin', array(
				'label'    => __( 'Linkedin link', 'openlab-txtd' ),
				'section'  => 'openlab_general_socials_section',
				'settings' => 'openlab_socials_linkedin',
				'priority'    => 6,
		));
		/* email */
		$wp_customize->add_setting( 'openlab_socials_gplus', array('sanitize_callback' => 'esc_url_raw','default' => '#'));
		$wp_customize->add_control( 'openlab_socials_gplus', array(
				'label'    => __( 'Google+ link', 'openlab-txtd' ),
				'section'  => 'openlab_general_socials_section',
				'settings' => 'openlab_socials_gplus',
				'priority'    => 7,
		));

		$wp_customize->add_section( 'openlab_general_footer_section' , array(
				'title'       => __( 'Footer', 'openlab-txtd' ),
				'priority'    => 32,
				'panel' => 'panel_general'
		));

		/* map - ICON */
		$wp_customize->add_setting( 'openlab_contact_map_icon', array('sanitize_callback' => 'esc_url_raw','default' => get_template_directory_uri().'/images/location-white.svg'));
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'openlab_contact_map_icon', array(
					'label'    => __( 'Map section - icon', 'openlab-txtd' ),
					'section'  => 'openlab_general_footer_section',
					'settings' => 'openlab_contact_map_icon',
					'priority'    => 9,
		)));

		/* text */
		$wp_customize->add_setting( 'openlab_contact_details_text', array( 'sanitize_callback' => 'openlab_sanitize_text','default' => '<p>Company Name</p><p>Address</p><p>Tel</p><p>email@email.com</p>') );
		$wp_customize->add_control( new Openlab_Customize_Textarea_Control( $wp_customize, 'openlab_contact_details_text', array(
				'label'   => __( 'Contact Details', 'openlab-txtd' ),
				'section' => 'openlab_general_footer_section',
				'settings'   => 'openlab_contact_details_text',
				'priority' => 10
		)) );

	else: /* Old versions of WordPress */

		$wp_customize->add_section( 'openlab_general_section' , array(
				'title'       => __( 'General options', 'openlab-txtd' ),
				'priority'    => 30,
				'description' => __('Openlab theme general options','openlab-txtd'),
		));
		/* LOGO	*/
		$wp_customize->add_setting( 'openlab_logo', array('sanitize_callback' => 'esc_url_raw'));
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_logo', array(
				'label'    => __( 'Logo', 'openlab-txtd' ),
				'section'  => 'openlab_general_section',
				'settings' => 'openlab_logo',
				'priority'    => 1,
		)));

		/* Disable preloader */
		$wp_customize->add_setting( 'openlab_disable_preloader', array('sanitize_callback' => 'openlab_sanitize_text'));
		$wp_customize->add_control(
				'openlab_disable_preloader',
				array(
					'type' => 'checkbox',
					'label' => __('Disable preloader?','openlab-txtd'),
					'section' => 'openlab_general_section',
					'priority'    => 2,
				)
		);

		/* Disable smooth scroll */
		$wp_customize->add_setting( 'openlab_disable_smooth_scroll', array('sanitize_callback' => 'openlab_sanitize_text'));
		$wp_customize->add_control(
				'openlab_disable_smooth_scroll',
				array(
					'type' 		=> 'checkbox',
					'label' 	=> __('Disable smooth scroll?','openlab-txtd'),
					'section' 	=> 'openlab_general_section',
					'priority'	=> 3,
				)
		);

		/* News Page Select */
		$wp_customize->add_setting( 'openlab_news_page_id', array('sanitize_callback' => 'absint','default' => ''));
		$wp_customize->add_control( 'openlab_news_page_id', array(
				'label'    => __( 'Select the News Page', 'openlab-txtd' ),
				'section'  => 'openlab_general_section',
				'settings' => 'openlab_news_page_id',
				'type'     => 'dropdown-pages',
				'priority' => 4,
		));

		/* Events Page Select */
		$wp_customize->add_setting( 'openlab_events_page_id', array('sanitize_callback' => 'absint','default' => ''));
		$wp_customize->add_control( 'openlab_events_page_id', array(
				'label'    => __( 'Select the Events Page', 'openlab-txtd' ),
				'section'  => 'openlab_general_section',
				'settings' => 'openlab_events_page_id',
				'type'     => 'dropdown-pages',
				'priority' => 5,
		));

		/* facebook */
		$wp_customize->add_setting( 'openlab_socials_facebook', array('sanitize_callback' => 'esc_url_raw','default' => '#'));
		$wp_customize->add_control( 'openlab_socials_facebook', array(
				'label'    => __( 'Facebook link', 'openlab-txtd' ),
				'section'  => 'openlab_general_section',
				'settings' => 'openlab_socials_facebook',
				'priority' => 3,
		));
		/* twitter */
		$wp_customize->add_setting( 'openlab_socials_twitter', array('sanitize_callback' => 'esc_url_raw','default' => '#'));
		$wp_customize->add_control( 'openlab_socials_twitter', array(
				'label'    => __( 'Twitter link', 'openlab-txtd' ),
				'section'  => 'openlab_general_section',
				'settings' => 'openlab_socials_twitter',
				'priority'    => 5,
		));
		/* linkedin */
		$wp_customize->add_setting( 'openlab_socials_linkedin', array('sanitize_callback' => 'esc_url_raw','default' => '#'));
		$wp_customize->add_control( 'openlab_socials_linkedin', array(
				'label'    => __( 'Linkedin link', 'openlab-txtd' ),
				'section'  => 'openlab_general_section',
				'settings' => 'openlab_socials_linkedin',
				'priority'    => 6,
		));
		/* behance */
		$wp_customize->add_setting( 'openlab_socials_behance', array('sanitize_callback' => 'esc_url_raw','default' => '#'));
		$wp_customize->add_control( 'openlab_socials_behance', array(
				'label'    => __( 'Behance link', 'openlab-txtd' ),
				'section'  => 'openlab_general_section',
				'settings' => 'openlab_socials_behance',
				'priority'    => 7,
		));
		/* dribbble */
		$wp_customize->add_setting( 'openlab_socials_dribbble', array('sanitize_callback' => 'esc_url_raw','default' => '#'));
		$wp_customize->add_control( 'openlab_socials_dribbble', array(
				'label'    => __( 'Dribbble link', 'openlab-txtd' ),
				'section'  => 'openlab_general_section',
				'settings' => 'openlab_socials_dribbble',
				'priority'    => 8,
		));
		/* Map - ICON */
		$wp_customize->add_setting( 'openlab_contact_map_icon', array('sanitize_callback' => 'esc_url_raw','default' => get_template_directory_uri().'/images/location-white.svg'));
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'openlab_contact_map_icon', array(
					'label'    => __( 'Footer Map icon', 'openlab-txtd' ),
					'section'  => 'openlab_general_section',
					'settings' => 'openlab_contact_map_icon',
					'priority'    => 9,
		)));

		/* Contact details Text */
		$wp_customize->add_setting( 'openlab_contact_details_text', array( 'sanitize_callback' => 'openlab_sanitize_text','default' => __('<p>Company Name</p><p>Address</p><p>Tel</p><p>email@email.com</p>','openlab-txtd')) );
		$wp_customize->add_control( new Openlab_Customize_Textarea_Control( $wp_customize, 'openlab_contact_details_text', array(
				'label'   => __( 'Contact Details', 'openlab-txtd' ),
				'section' => 'openlab_general_section',
				'settings'   => 'openlab_contact_details_text',
				'priority' => 10
		)) );

	endif;

	/*****************************************************/
    /**************	BIG TITLE SECTION *******************/
	/****************************************************/
	if ( class_exists( 'WP_Customize_Panel' ) ):

		$wp_customize->add_panel( 'panel_big_title', array(
			'priority' => 31,
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'title' => __( 'Big title section', 'openlab-txtd' )
		) );

		$wp_customize->add_section( 'openlab_bigtitle_section' , array(
			'title'       => __( 'Main content', 'openlab-txtd' ),
			'priority'    => 1,
			'panel'       => 'panel_big_title'
		));

		/* show/hide */
		$wp_customize->add_setting( 'openlab_bigtitle_show', array('sanitize_callback' => 'openlab_sanitize_text'));
		$wp_customize->add_control(
			'openlab_bigtitle_show',
			array(
				'type' => 'checkbox',
				'label' => __('Hide big title section?','openlab-txtd'),
				'section' => 'openlab_bigtitle_section',
				'priority'    => 1,
			)
		);
		/* title */
		$wp_customize->add_setting( 'openlab_bigtitle_title', array('sanitize_callback' => 'openlab_sanitize_text','default' => __('ONE OF THE TOP 10 MOST POPULAR THEMES ON WORDPRESS.ORG','openlab-txtd')));
		$wp_customize->add_control( 'openlab_bigtitle_title', array(
			'label'    => __( 'Title', 'openlab-txtd' ),
			'section'  => 'openlab_bigtitle_section',
			'settings' => 'openlab_bigtitle_title',
			'priority'    => 2,
		));

		/****************************************************/
		/************	Slider IMAGES *********************/
		/****************************************************/
		$wp_customize->add_section( 'openlab_slider_section' , array(
			'title'       => __( 'Slider Images', 'openlab-txtd' ),
			'priority'    => 2,
			'panel'       => 'panel_big_title'
		));

		/* IMAGE 1*/
		$wp_customize->add_setting( 'openlab_slider_img1', array('sanitize_callback' => 'esc_url_raw', 'default' => get_template_directory_uri() . '/images/slide1.jpg'));
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_slider_img1', array(
			'label'    	=> __( 'Image 1', 'openlab-txtd' ),
			'section'  	=> 'openlab_slider_section',
			'settings' 	=> 'openlab_slider_img1',
			'priority'	=> 1,
		)));

		/* Slide1 Caption */
		$wp_customize->add_setting( 'openlab_slide1_caption', array('sanitize_callback' => 'openlab_sanitize_text','default' => __('Slider Title Text','openlab-txtd')));
		$wp_customize->add_control( 'openlab_slide1_caption', array(
			'label'    => __( 'Slide 1 Caption', 'openlab-txtd' ),
			'section'  => 'openlab_slider_section',
			'settings' => 'openlab_slide1_caption',
			'priority'    => 2,
		));

		/* IMAGE 2 */
		$wp_customize->add_setting( 'openlab_slider_img2', array('sanitize_callback' => 'esc_url_raw', 'default' => get_template_directory_uri() . '/images/slide2.jpg'));
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_slider_img2', array(
			'label'    	=> __( 'Image 2', 'openlab-txtd' ),
			'section'  	=> 'openlab_slider_section',
			'settings' 	=> 'openlab_slider_img2',
			'priority'	=> 3,
		)));
		/* Slide2 Caption */
		$wp_customize->add_setting( 'openlab_slide2_caption', array('sanitize_callback' => 'openlab_sanitize_text','default' => __('Slider Title Text','openlab-txtd')));
		$wp_customize->add_control( 'openlab_slide2_caption', array(
			'label'    => __( 'Slide 2 Caption', 'openlab-txtd' ),
			'section'  => 'openlab_slider_section',
			'settings' => 'openlab_slide2_caption',
			'priority'    => 4,
		));

		/* IMAGE 3 */
		$wp_customize->add_setting( 'openlab_slider_img3', array('sanitize_callback' => 'esc_url_raw', 'default' => get_template_directory_uri() . '/images/slide3.jpg'));
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_slider_img3', array(
			'label'    	=> __( 'Image 3', 'openlab-txtd' ),
			'section'  	=> 'openlab_slider_section',
			'settings' 	=> 'openlab_slider_img3',
			'priority'	=> 5,
		)));
		/* Slide3 Caption */
		$wp_customize->add_setting( 'openlab_slide3_caption', array('sanitize_callback' => 'openlab_sanitize_text','default' => __('Slider Title Text','openlab-txtd')));
		$wp_customize->add_control( 'openlab_slide3_caption', array(
			'label'    => __( 'Slide 3 Caption', 'openlab-txtd' ),
			'section'  => 'openlab_slider_section',
			'settings' => 'openlab_slide3_caption',
			'priority'    => 6,
		));

		/* IMAGE 4 */
		$wp_customize->add_setting( 'openlab_slider_img4', array('sanitize_callback' => 'esc_url_raw', 'default' => get_template_directory_uri() . '/images/slide4.jpg'));
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_slider_img4', array(
			'label'    	=> __( 'Image 4', 'openlab-txtd' ),
			'section'  	=> 'openlab_slider_section',
			'settings' 	=> 'openlab_slider_img4',
			'priority'	=> 7,
		)));
		/* Slide4 Caption */
		$wp_customize->add_setting( 'openlab_slide4_caption', array('sanitize_callback' => 'openlab_sanitize_text','default' => __('Slider Title Text','openlab-txtd')));
		$wp_customize->add_control( 'openlab_slide4_caption', array(
			'label'    => __( 'Slide 4 Caption', 'openlab-txtd' ),
			'section'  => 'openlab_slider_section',
			'settings' => 'openlab_slide4_caption',
			'priority'    => 8,
		));

		/* IMAGE 5 */
		$wp_customize->add_setting( 'openlab_slider_img5', array('sanitize_callback' => 'esc_url_raw', 'default' => get_template_directory_uri() . '/images/slide5.jpg'));
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_slider_img5', array(
			'label'    	=> __( 'Image 5', 'openlab-txtd' ),
			'section'  	=> 'openlab_slider_section',
			'settings' 	=> 'openlab_slider_img5',
			'priority'	=> 9,
		)));
		/* Slide5 Caption */
		$wp_customize->add_setting( 'openlab_slide5_caption', array('sanitize_callback' => 'openlab_sanitize_text','default' => __('Slider Title Text','openlab-txtd')));
		$wp_customize->add_control( 'openlab_slide5_caption', array(
			'label'    => __( 'Slide 5 Caption', 'openlab-txtd' ),
			'section'  => 'openlab_slider_section',
			'settings' => 'openlab_slide5_caption',
			'priority'    => 10,
		));
		/* IMAGE 6 */
		$wp_customize->add_setting( 'openlab_slider_img6', array('sanitize_callback' => 'esc_url_raw', 'default' => get_template_directory_uri() . '/images/slide6.jpg'));
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_slider_img6', array(
			'label'    	=> __( 'Image 6', 'openlab-txtd' ),
			'section'  	=> 'openlab_slider_section',
			'settings' 	=> 'openlab_slider_img6',
			'priority'	=> 11,
		)));
		/* Slide6 Caption */
		$wp_customize->add_setting( 'openlab_slide6_caption', array('sanitize_callback' => 'openlab_sanitize_text','default' => __('Slider Title Text','openlab-txtd')));
		$wp_customize->add_control( 'openlab_slide6_caption', array(
			'label'    => __( 'Slide 6 Caption', 'openlab-txtd' ),
			'section'  => 'openlab_slider_section',
			'settings' => 'openlab_slide6_caption',
			'priority' => 12,
		));

	else:
		/* OLD WORDPRESS */
		$wp_customize->add_section( 'openlab_bigtitle_section' , array(
			'title'       => __( 'Big title section', 'openlab-txtd' ),
			'priority'    => 31
		));
		/* show/hide */
		$wp_customize->add_setting( 'openlab_bigtitle_show', array('sanitize_callback' => 'openlab_sanitize_text'));
		$wp_customize->add_control(
			'openlab_bigtitle_show',
			array(
				'type' => 'checkbox',
				'label' => __('Hide big title section?','openlab-txtd'),
				'section' => 'openlab_bigtitle_section',
				'priority'    => 1,
			)
		);
		/* title */
		$wp_customize->add_setting( 'openlab_bigtitle_title', array('sanitize_callback' => 'openlab_sanitize_text','default' => __('ONE OF THE TOP 10 MOST POPULAR THEMES ON WORDPRESS.ORG','openlab-txtd')));
		$wp_customize->add_control( 'openlab_bigtitle_title', array(
			'label'    => __( 'Title', 'openlab-txtd' ),
			'section'  => 'openlab_bigtitle_section',
			'settings' => 'openlab_bigtitle_title',
			'priority'    => 2,
		));

		/****************************************************/
		/************	slider IMAGES *********************/
		/****************************************************/
		$wp_customize->add_section( 'openlab_slider_section' , array(
			'title'       => __( 'Slider Images', 'openlab-txtd' ),
			'priority'    => 60
		));
		/* IMAGE 1*/
		$wp_customize->add_setting( 'openlab_slider_img1', array('sanitize_callback' => 'esc_url_raw', 'default' => get_template_directory_uri() . '/images/slide1.jpg'));
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_slider_img1', array(
			'label'    	=> __( 'Image 1', 'openlab-txtd' ),
			'section'  	=> 'openlab_slider_section',
			'settings' 	=> 'openlab_slider_img1',
			'priority'	=> 1,
		)));
		/* Slide1 Caption */
		$wp_customize->add_setting( 'openlab_slide1_caption', array('sanitize_callback' => 'openlab_sanitize_text','default' => __('Slider Title Text','openlab-txtd')));
		$wp_customize->add_control( 'openlab_slide1_caption', array(
			'label'    => __( 'Slide 1 Caption', 'openlab-txtd' ),
			'section'  => 'openlab_slider_section',
			'settings' => 'openlab_slide1_caption',
			'priority'    => 2,
		));
		/* IMAGE 2 */
		$wp_customize->add_setting( 'openlab_slider_img2', array('sanitize_callback' => 'esc_url_raw', 'default' => get_template_directory_uri() . '/images/slide2.jpg'));
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_slider_img2', array(
			'label'    	=> __( 'Image 2', 'openlab-txtd' ),
			'section'  	=> 'openlab_slider_section',
			'settings' 	=> 'openlab_slider_img2',
			'priority'	=> 3,
		)));
		/* Slide2 Caption */
		$wp_customize->add_setting( 'openlab_slide2_caption', array('sanitize_callback' => 'openlab_sanitize_text','default' => __('Slider Title Text','openlab-txtd')));
		$wp_customize->add_control( 'openlab_slide2_caption', array(
			'label'    => __( 'Slide 2 Caption', 'openlab-txtd' ),
			'section'  => 'openlab_slider_section',
			'settings' => 'openlab_slide2_caption',
			'priority'    => 4,
		));

		/* IMAGE 3 */
		$wp_customize->add_setting( 'openlab_slider_img3', array('sanitize_callback' => 'esc_url_raw', 'default' => get_template_directory_uri() . '/images/slide3.jpg'));
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_slider_img3', array(
			'label'    	=> __( 'Image 3', 'openlab-txtd' ),
			'section'  	=> 'openlab_slider_section',
			'settings' 	=> 'openlab_slider_img3',
			'priority'	=> 5,
		)));
		/* Slide3 Caption */
		$wp_customize->add_setting( 'openlab_slide3_caption', array('sanitize_callback' => 'openlab_sanitize_text','default' => __('Slider Title Text','openlab-txtd')));
		$wp_customize->add_control( 'openlab_slide3_caption', array(
			'label'    => __( 'Slide 3 Caption', 'openlab-txtd' ),
			'section'  => 'openlab_slider_section',
			'settings' => 'openlab_slide3_caption',
			'priority'    => 6,
		));

		/* IMAGE 4 */
		$wp_customize->add_setting( 'openlab_slider_img4', array('sanitize_callback' => 'esc_url_raw', 'default' => get_template_directory_uri() . '/images/slide4.jpg'));
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_slider_img4', array(
			'label'    	=> __( 'Image 4', 'openlab-txtd' ),
			'section'  	=> 'openlab_slider_section',
			'settings' 	=> 'openlab_slider_img4',
			'priority'	=> 7,
		)));
		/* Slide4 Caption */
		$wp_customize->add_setting( 'openlab_slide4_caption', array('sanitize_callback' => 'openlab_sanitize_text','default' => __('Slider Title Text','openlab-txtd')));
		$wp_customize->add_control( 'openlab_slide4_caption', array(
			'label'    => __( 'Slide 4 Caption', 'openlab-txtd' ),
			'section'  => 'openlab_slider_section',
			'settings' => 'openlab_slide4_caption',
			'priority'    => 8,
		));

		/* IMAGE 5 */
		$wp_customize->add_setting( 'openlab_slider_img5', array('sanitize_callback' => 'esc_url_raw', 'default' => get_template_directory_uri() . '/images/slide5.jpg'));
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_slider_img5', array(
			'label'    	=> __( 'Image 5', 'openlab-txtd' ),
			'section'  	=> 'openlab_slider_section',
			'settings' 	=> 'openlab_slider_img5',
			'priority'	=> 9,
		)));
		/* Slide5 Caption */
		$wp_customize->add_setting( 'openlab_slide5_caption', array('sanitize_callback' => 'openlab_sanitize_text','default' => __('Slider Title Text','openlab-txtd')));
		$wp_customize->add_control( 'openlab_slide5_caption', array(
			'label'    => __( 'Slide 5 Caption', 'openlab-txtd' ),
			'section'  => 'openlab_slider_section',
			'settings' => 'openlab_slide5_caption',
			'priority'    => 10,
		));

		/* IMAGE 6 */
		$wp_customize->add_setting( 'openlab_slider_img6', array('sanitize_callback' => 'esc_url_raw', 'default' => get_template_directory_uri() . '/images/slide6.jpg'));
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_slider_img6', array(
			'label'    	=> __( 'Image 6', 'openlab-txtd' ),
			'section'  	=> 'openlab_slider_section',
			'settings' 	=> 'openlab_slider_img6',
			'priority'	=> 11,
		)));
		/* Slide6 Caption */
		$wp_customize->add_setting( 'openlab_slide6_caption', array('sanitize_callback' => 'openlab_sanitize_text','default' => __('Slider Title Text','openlab-txtd')));
		$wp_customize->add_control( 'openlab_slide6_caption', array(
			'label'    => __( 'Slide 6 Caption', 'openlab-txtd' ),
			'section'  => 'openlab_slider_section',
			'settings' => 'openlab_slide6_caption',
			'priority'    => 12,
		));

	endif;


	/********************************************************************/
	/*************  OUR FOCUS SECTION **********************************/
	/********************************************************************/
	if ( class_exists( 'WP_Customize_Panel' ) ):
		$wp_customize->add_panel( 'panel_ourfocus', array(
			'priority' => 32,
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'title' => __( 'Our focus section', 'openlab-txtd' )
		) );
		$wp_customize->add_section( 'openlab_ourfocus_section' , array(
				'title'       => __( 'Content', 'openlab-txtd' ),
				'priority'    => 1,
				'panel'       => 'panel_ourfocus'
		));
		/* show/hide */
		$wp_customize->add_setting( 'openlab_ourfocus_show', array('sanitize_callback' => 'openlab_sanitize_text'));
		$wp_customize->add_control(
			'openlab_ourfocus_show',
			array(
				'type' => 'checkbox',
				'label' => __('Hide our focus section?','openlab-txtd'),
				'section' => 'openlab_ourfocus_section',
				'priority'    => 1,
			)
		);
		/* our focus title */
		$wp_customize->add_setting( 'openlab_ourfocus_title', array('sanitize_callback' => 'openlab_sanitize_text','default' => __('FEATURES','openlab-txtd')));
		$wp_customize->add_control( 'openlab_ourfocus_title', array(
					'label'    => __( 'Title', 'openlab-txtd' ),
					'section'  => 'openlab_ourfocus_section',
					'settings' => 'openlab_ourfocus_title',
					'priority'    => 2,
		));
		/* our focus subtitle */
		$wp_customize->add_setting( 'openlab_ourfocus_subtitle', array('sanitize_callback' => 'openlab_sanitize_text','default' => __('What makes this single-page WordPress theme unique.','openlab-txtd')));
		$wp_customize->add_control( 'openlab_ourfocus_subtitle', array(
				'label'    => __( 'Our focus subtitle', 'openlab-txtd' ),
				'section'  => 'openlab_ourfocus_section',
				'settings' => 'openlab_ourfocus_subtitle',
				'priority'    => 3,
		));

		/* Call to action Button */
		$wp_customize->add_setting( 'openlab_ourfocus_button_label', array('sanitize_callback' => 'openlab_sanitize_text','default' => __('Join Us','openlab-txtd')));
		$wp_customize->add_control( 'openlab_ourfocus_button_label', array(
			'label'    => __( 'Join Us label', 'openlab-txtd' ),
			'section'  => 'openlab_ourfocus_section',
			'settings' => 'openlab_ourfocus_button_label',
			'priority' => 4,
		));

	  /*
		$wp_customize->add_setting( 'openlab_ourfocus_button_url', array('sanitize_callback' => 'esc_url_raw','default' => esc_url( home_url( '/' ) ).'#joinUs'));
		$wp_customize->add_control( 'openlab_ourfocus_button_url', array(
			'label'    => __( 'Join Us link', 'openlab-txtd' ),
			'section'  => 'openlab_ourfocus_section',
			'settings' => 'openlab_ourfocus_button_url',
			'priority'    => 5,
		));
		*/
		$available_forms = get_available_nf_forms();
		$available_forms[0] = __( '-- Disabled --', 'openlab-txtd' );

		$wp_customize->add_setting( 'openlab_ourfocus_button_nf_form', array('sanitize_callback' => 'openlab_sanitize_text','default' => '0'));
		$wp_customize->add_control( 'openlab_ourfocus_button_nf_form', array(
		'label'   => __( 'Select a form...', 'openlab-txtd' ),
		'section' => 'openlab_ourfocus_section',
		'type'    => 'select',
		'settings' => 'openlab_ourfocus_button_nf_form',
		'priority' => 5,
		'choices'  => $available_forms,
		));


		/* Call to action slide image*/
		$wp_customize->add_setting( 'openlab_ourfocus_bg_img', array('sanitize_callback' => 'esc_url_raw', 'default' => get_template_directory_uri() . '/images/slide1.jpg'));
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_ourfocus_bg_img', array(
			'label'    	=> __( 'Join Us Background Image', 'openlab-txtd' ),
			'section'  	=> 'openlab_ourfocus_section',
			'settings' 	=> 'openlab_ourfocus_bg_img',
			'priority'	=> 6,
		)));


	else:

		$wp_customize->add_section( 'openlab_ourfocus_section' , array(
				'title'       => __( 'Our focus section', 'openlab-txtd' ),
				'priority'    => 32,
				'description' => __( 'The main content of this section is customizable in: Customize -> Widgets -> Our focus section. There you must add the "Openlab - Our focus widget"', 'openlab-txtd' )
		));
		/* show/hide */
		$wp_customize->add_setting( 'openlab_ourfocus_show', array('sanitize_callback' => 'openlab_sanitize_text'));
		$wp_customize->add_control(
			'openlab_ourfocus_show',
			array(
				'type' => 'checkbox',
				'label' => __('Hide our focus section?','openlab-txtd'),
				'section' => 'openlab_ourfocus_section',
				'priority'    => 1,
			)
		);
		/* our focus title */
		$wp_customize->add_setting( 'openlab_ourfocus_title', array('sanitize_callback' => 'openlab_sanitize_text','default' => __('FEATURES','openlab-txtd')));
		$wp_customize->add_control( 'openlab_ourfocus_title', array(
					'label'    => __( 'Title', 'openlab-txtd' ),
					'section'  => 'openlab_ourfocus_section',
					'settings' => 'openlab_ourfocus_title',
					'priority'    => 2,
		));
		/* our focus subtitle */
		$wp_customize->add_setting( 'openlab_ourfocus_subtitle', array('sanitize_callback' => 'openlab_sanitize_text','default' => __('What makes this single-page WordPress theme unique.','openlab-txtd')));
		$wp_customize->add_control( 'openlab_ourfocus_subtitle', array(
				'label'    => __( 'Our focus subtitle', 'openlab-txtd' ),
				'section'  => 'openlab_ourfocus_section',
				'settings' => 'openlab_ourfocus_subtitle',
				'priority' => 3,
		));
		/* Call to action Button */
		$wp_customize->add_setting( 'openlab_ourfocus_button_label', array('sanitize_callback' => 'openlab_sanitize_text','default' => __('Join Us','openlab-txtd')));
		$wp_customize->add_control( 'openlab_ourfocus_button_label', array(
			'label'    => __( 'Join Us label', 'openlab-txtd' ),
			'section'  => 'openlab_ourfocus_section',
			'settings' => 'openlab_ourfocus_button_label',
			'priority' => 4,
		));

		$available_forms = get_available_nf_forms();
		$available_forms[0] = __( '-- Disabled --', 'openlab-txtd' );

		$wp_customize->add_setting( 'openlab_ourfocus_button_nf_form', array('sanitize_callback' => 'openlab_sanitize_text','default' => '0'));
		$wp_customize->add_control( 'openlab_ourfocus_button_nf_form', array(
		'label'   => __( 'Select a form...', 'openlab-txtd' ),
		'section' => 'openlab_ourfocus_section',
		'type'    => 'select',
		'settings' => 'openlab_ourfocus_button_nf_form',
		'priority' => 5,
		'choices'  => $available_forms,
		));

		/* Call to action background image*/
		$wp_customize->add_setting( 'openlab_ourfocus_bg_img', array('sanitize_callback' => 'esc_url_raw', 'default' => get_template_directory_uri() . '/images/background2.png'));
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_ourfocus_bg_img', array(
			'label'    	=> __( 'Join Us Background Image', 'openlab-txtd' ),
			'section'  	=> 'openlab_ourfocus_section',
			'settings' 	=> 'openlab_ourfocus_bg_img',
			'priority'	=> 6,
		)));
	endif;

	/************************************/
	/******* ABOUT US SECTION ***********/
	/************************************/
	if ( class_exists( 'WP_Customize_Panel' ) ):

		$wp_customize->add_panel( 'panel_about', array(
			'priority' => 34,
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'title' => __( 'About us section', 'openlab-txtd' )
		) );

		$wp_customize->add_section( 'openlab_aboutus_settings_section' , array(
				'title'       => __( 'Settings', 'openlab-txtd' ),
				'priority'    => 1,
				'panel' => 'panel_about'
		));
		/* about us show/hide */
		$wp_customize->add_setting( 'openlab_aboutus_show', array('sanitize_callback' => 'openlab_sanitize_text'));
		$wp_customize->add_control(
			'openlab_aboutus_show',
			array(
				'type' => 'checkbox',
				'label' => __('Hide about us section?','openlab-txtd'),
				'section' => 'openlab_aboutus_settings_section',
				'priority'    => 1,
			)
		);

		$wp_customize->add_section( 'openlab_aboutus_main_section' , array(
				'title'       => __( 'Main content', 'openlab-txtd' ),
				'priority'    => 2,
				'panel' => 'panel_about'
		));

		/* title */
		$wp_customize->add_setting( 'openlab_aboutus_title', array('sanitize_callback' => 'openlab_sanitize_text','default' => __('About','openlab-txtd')));
		$wp_customize->add_control( 'openlab_aboutus_title', array(
					'label'    => __( 'Title', 'openlab-txtd' ),
					'section'  => 'openlab_aboutus_main_section',
					'settings' => 'openlab_aboutus_title',
					'priority'    => 2,
		));
		/* subtitle */
		$wp_customize->add_setting( 'openlab_aboutus_subtitle', array('sanitize_callback' => 'openlab_sanitize_text','default' => __('Use this section to showcase important details about your business.','openlab-txtd')));
		$wp_customize->add_control( 'openlab_aboutus_subtitle', array(
				'label'    => __( 'Subtitle', 'openlab-txtd' ),
				'section'  => 'openlab_aboutus_main_section',
				'settings' => 'openlab_aboutus_subtitle',
				'priority'    => 3,
		));
		/* big left title */
		$wp_customize->add_setting( 'openlab_aboutus_biglefttitle', array('sanitize_callback' => 'openlab_sanitize_text','default' => __('Everything you see here is responsive and mobile-friendly.','openlab-txtd')));
		$wp_customize->add_control( 'openlab_aboutus_biglefttitle', array(
				'label'    => __( 'Big left side title', 'openlab-txtd' ),
				'section'  => 'openlab_aboutus_main_section',
				'settings' => 'openlab_aboutus_biglefttitle',
				'priority'    => 4,
		));
		/* text */
		$wp_customize->add_setting( 'openlab_aboutus_text', array('sanitize_callback' => 'openlab_sanitize_text','default' => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec massa enim. Aliquam viverra at est ullamcorper sollicitudin. Proin a leo sit amet nunc malesuada imperdiet pharetra ut eros.<br><br> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec massa enim. Aliquam viverra at est ullamcorper sollicitudin. Proin a leo sit amet nunc malesuada imperdiet pharetra ut eros. <br><br>Mauris vel nunc at ipsum fermentum pellentesque quis ut massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas non adipiscing massa. Sed ut fringilla sapien. Cras sollicitudin, lectus sed tincidunt cursus, magna lectus vehicula augue, a lobortis dui orci et est.','openlab-txtd')));
		$wp_customize->add_control( 'openlab_aboutus_text', array(
				'label'    => __( 'Text', 'openlab-txtd' ),
				'section'  => 'openlab_aboutus_main_section',
				'settings' => 'openlab_aboutus_text',
				'priority'    => 5,
		));

		/* image right */
		$wp_customize->add_setting( 'openlab_aboutus_img', array('sanitize_callback' => 'esc_url_raw', 'default' => get_template_directory_uri() . '/images/our-focus-right.svg'));
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_aboutus_img', array(
			'label'    	=> __( 'Right side Image', 'openlab-txtd' ),
			'section'  	=> 'openlab_aboutus_main_section',
			'settings' 	=> 'openlab_aboutus_img',
			'priority'	=> 6,
		)));


	else:

	/* Old versions of WordPress */
		$wp_customize->add_section( 'openlab_aboutus_section' , array(
				'title'       => __( 'About us section', 'openlab-txtd' ),
				'priority'    => 34
		));
		/* about us show/hide */
		$wp_customize->add_setting( 'openlab_aboutus_show', array('sanitize_callback' => 'openlab_sanitize_text'));
		$wp_customize->add_control(
			'openlab_aboutus_show',
			array(
				'type' => 'checkbox',
				'label' => __('Hide about us section?','openlab-txtd'),
				'section' => 'openlab_aboutus_section',
				'priority'    => 1,
			)
		);
		/* title */
		$wp_customize->add_setting( 'openlab_aboutus_title', array('sanitize_callback' => 'openlab_sanitize_text','default' => __('About','openlab-txtd')));
		$wp_customize->add_control( 'openlab_aboutus_title', array(
					'label'    => __( 'Title', 'openlab-txtd' ),
					'section'  => 'openlab_aboutus_section',
					'settings' => 'openlab_aboutus_title',
					'priority'    => 2,
		));
		/* subtitle */
		$wp_customize->add_setting( 'openlab_aboutus_subtitle', array('sanitize_callback' => 'openlab_sanitize_text','default' => __('Use this section to showcase important details about your business.','openlab-txtd')));
		$wp_customize->add_control( 'openlab_aboutus_subtitle', array(
				'label'    => __( 'Subtitle', 'openlab-txtd' ),
				'section'  => 'openlab_aboutus_section',
				'settings' => 'openlab_aboutus_subtitle',
				'priority'    => 3,
		));
		/* big left title */
		$wp_customize->add_setting( 'openlab_aboutus_biglefttitle', array('sanitize_callback' => 'openlab_sanitize_text','default' => __('Everything you see here is responsive and mobile-friendly.','openlab-txtd')));
		$wp_customize->add_control( 'openlab_aboutus_biglefttitle', array(
				'label'    => __( 'Big left side title', 'openlab-txtd' ),
				'section'  => 'openlab_aboutus_section',
				'settings' => 'openlab_aboutus_biglefttitle',
				'priority'    => 4,
		));
		/* text */
		$wp_customize->add_setting( 'openlab_aboutus_text', array('sanitize_callback' => 'openlab_sanitize_text','default' => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec massa enim. Aliquam viverra at est ullamcorper sollicitudin. Proin a leo sit amet nunc malesuada imperdiet pharetra ut eros.<br><br> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec massa enim. Aliquam viverra at est ullamcorper sollicitudin. Proin a leo sit amet nunc malesuada imperdiet pharetra ut eros. <br><br>Mauris vel nunc at ipsum fermentum pellentesque quis ut massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas non adipiscing massa. Sed ut fringilla sapien. Cras sollicitudin, lectus sed tincidunt cursus, magna lectus vehicula augue, a lobortis dui orci et est.','openlab-txtd')));
		$wp_customize->add_control( 'openlab_aboutus_text', array(
				'label'    => __( 'Text', 'openlab-txtd' ),
				'section'  => 'openlab_aboutus_section',
				'settings' => 'openlab_aboutus_text',
				'priority'    => 5,
		));
		/* image right side */
		$wp_customize->add_setting( 'openlab_aboutus_img', array('sanitize_callback' => 'esc_url_raw', 'default' => get_template_directory_uri() . '/images/background1.jpg'));
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_aboutus_img', array(
			'label'    	=> __( 'Image 1', 'openlab-txtd' ),
			'section'  	=> 'openlab_aboutus_section',
			'settings' 	=> 'openlab_aboutus_img',
			'priority'	=> 6,
		)));


	endif;
	/******************************************/
    /**********	OUR TEAM SECTION **************/
	/******************************************/
	if ( class_exists( 'WP_Customize_Panel' ) ):

		$wp_customize->add_panel( 'panel_ourteam', array(
			'priority' => 35,
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'title' => __( 'Our team section', 'openlab-txtd' )
		) );

		$wp_customize->add_section( 'openlab_ourteam_section' , array(
				'title'       => __( 'Content', 'openlab-txtd' ),
				'priority'    => 1,
				'panel'       => 'panel_ourteam'
		));
		/* our team show/hide */
		$wp_customize->add_setting( 'openlab_ourteam_show', array('sanitize_callback' => 'openlab_sanitize_text'));
		$wp_customize->add_control(
			'openlab_ourteam_show',
			array(
				'type' => 'checkbox',
				'label' => __('Hide our team section?','openlab-txtd'),
				'section' => 'openlab_ourteam_section',
				'priority'    => 1,
			)
		);
		/* our team title */
		$wp_customize->add_setting( 'openlab_ourteam_title', array('sanitize_callback' => 'openlab_sanitize_text','default' => __('YOUR TEAM','openlab-txtd')));
		$wp_customize->add_control( 'openlab_ourteam_title', array(
					'label'    => __( 'Title', 'openlab-txtd' ),
					'section'  => 'openlab_ourteam_section',
					'settings' => 'openlab_ourteam_title',
					'priority'    => 2,
		));
		/* our team subtitle */
		$wp_customize->add_setting( 'openlab_ourteam_subtitle', array('sanitize_callback' => 'openlab_sanitize_text','default' => __('Prove that you have real people working for you, with some nice looking profile pictures and links to social media.','openlab-txtd')));
		$wp_customize->add_control( 'openlab_ourteam_subtitle', array(
				'label'    => __( 'Our team subtitle', 'openlab-txtd' ),
				'section'  => 'openlab_ourteam_section',
				'settings' => 'openlab_ourteam_subtitle',
				'priority'    => 3,
		));

		$wp_customize->add_setting( 'openlab_ourteam_subsection_title', array('sanitize_callback' => 'openlab_sanitize_text','default' => __('Subsection small title','openlab-txtd')));
		$wp_customize->add_control( 'openlab_ourteam_subsection_title', array(
				'label'    => __( 'Our team subsection title', 'openlab-txtd' ),
				'section'  => 'openlab_ourteam_section',
				'settings' => 'openlab_ourteam_subsection_title',
				'priority'    => 4,
		));

		$wp_customize->add_setting( 'openlab_ourteam_subsection_content', array('sanitize_callback' => 'openlab_sanitize_text','default' => __('Text used as content','openlab-txtd')));
		$wp_customize->add_control( 'openlab_ourteam_subsection_content', array(
				'label'    => __( 'Our team subsection content', 'openlab-txtd' ),
				'type' => 'textarea',
				'section'  => 'openlab_ourteam_section',
				'settings' => 'openlab_ourteam_subsection_content',
				'priority'    => 5,
		));

	else:

		$wp_customize->add_section( 'openlab_ourteam_section' , array(
				'title'       => __( 'Our team section', 'openlab-txtd' ),
				'priority'    => 35,

				'description' => __( 'The main content of this section is customizable in: Customize -> Widgets -> Our team section. There you must add the "Openlab - Team member widget"', 'openlab-txtd' )
		));
		/* our team show/hide */
		$wp_customize->add_setting( 'openlab_ourteam_show', array('sanitize_callback' => 'openlab_sanitize_text'));
		$wp_customize->add_control(
			'openlab_ourteam_show',
			array(
				'type' => 'checkbox',
				'label' => __('Hide our team section?','openlab-txtd'),
				'section' => 'openlab_ourteam_section',
				'priority'    => 1,
			)
		);
		/* our team title */
		$wp_customize->add_setting( 'openlab_ourteam_title', array('sanitize_callback' => 'openlab_sanitize_text','default' => __('YOUR TEAM','openlab-txtd')));
		$wp_customize->add_control( 'openlab_ourteam_title', array(
					'label'    => __( 'Title', 'openlab-txtd' ),
					'section'  => 'openlab_ourteam_section',
					'settings' => 'openlab_ourteam_title',
					'priority'    => 2,
		));
		/* our team subtitle */
		$wp_customize->add_setting( 'openlab_ourteam_subtitle', array('sanitize_callback' => 'openlab_sanitize_text','default' => __('Prove that you have real people working for you, with some nice looking profile pictures and links to social media.','openlab-txtd')));
		$wp_customize->add_control( 'openlab_ourteam_subtitle', array(
				'label'    => __( 'Our team subtitle', 'openlab-txtd' ),
				'section'  => 'openlab_ourteam_section',
				'settings' => 'openlab_ourteam_subtitle',
				'priority'    => 3,
		));

		$wp_customize->add_setting( 'openlab_ourteam_subsection_title', array('sanitize_callback' => 'openlab_sanitize_text','default' => __('Subsection small title','openlab-txtd')));
		$wp_customize->add_control( 'openlab_ourteam_subsection_title', array(
				'label'    => __( 'Our team subsection title', 'openlab-txtd' ),
				'section'  => 'openlab_ourteam_section',
				'settings' => 'openlab_ourteam_subsection_title',
				'priority'    => 4,
		));

		$wp_customize->add_setting( 'openlab_ourteam_subsection_content', array('sanitize_callback' => 'openlab_sanitize_text','default' => __('Text used as content','openlab-txtd')));
		$wp_customize->add_control( 'openlab_ourteam_subsection_content', array(
				'label'    => __( 'Our team subsection content', 'openlab-txtd' ),
				'section'  => 'openlab_ourteam_section',
				'settings' => 'openlab_ourteam_subsection_content',
				'priority'    => 5,
		));

	endif;

	/**********************************************/
    /**********	LATEST NEWS SECTION **************/
	/**********************************************/
	$wp_customize->add_section( 'openlab_latestnews_section' , array(
			'title'       => __( 'Latest News section', 'openlab-txtd' ),
    	  	'priority'    => 37
	));
	/* latest news show/hide */
	$wp_customize->add_setting( 'openlab_latestnews_show', array('sanitize_callback' => 'openlab_sanitize_text'));
    $wp_customize->add_control(
		'openlab_latestnews_show',
		array(
			'type' => 'checkbox',
			'label' => __('Hide latest news section?','openlab-txtd'),
			'section' => 'openlab_latestnews_section',
			'priority'    => 1,
		)
	);
	/* latest news subtitle */
	$wp_customize->add_setting( 'openlab_latestnews_title', array('sanitize_callback' => 'openlab_sanitize_text'));
	$wp_customize->add_control( 'openlab_latestnews_title', array(
			'label'    		=> __( 'Latest News title', 'openlab-txtd' ),
	      	'section'  		=> 'openlab_latestnews_section',
	      	'settings' 		=> 'openlab_latestnews_title',
			'priority'    	=> 2,
	));

	/*******************************************************/
    /************	CONTACT US SECTION *********************/
	/*******************************************************/

	$openlab_contact_us_section_description = '';

	/* if Pirate Forms is installed */
	if( defined("PIRATE_FORMS_VERSION") ):
		$openlab_contact_us_section_description = __( 'For more advanced settings please go to Settings -> Pirate Forms','openlab-txtd' );
	endif;

	$wp_customize->add_section( 'openlab_contactus_section' , array(
			'title'       => __( 'Contact us section', 'openlab-txtd' ),
			'description' => $openlab_contact_us_section_description,
    	  	'priority'    => 38
	));
	/* contact us show/hide */
	$wp_customize->add_setting( 'openlab_contactus_show', array('sanitize_callback' => 'openlab_sanitize_text'));
    $wp_customize->add_control(
		'openlab_contactus_show',
		array(
			'type' => 'checkbox',
			'label' => __('Hide contact us section?','openlab-txtd'),
			'section' => 'openlab_contactus_section',
			'priority'    => 1,
		)
	);
	/* contactus title */
	$wp_customize->add_setting( 'openlab_contactus_title', array('sanitize_callback' => 'openlab_sanitize_text','default' => __('Get in touch','openlab-txtd')));
	$wp_customize->add_control( 'openlab_contactus_title', array(
				'label'    => __( 'Contact us section title', 'openlab-txtd' ),
				'section'  => 'openlab_contactus_section',
				'settings' => 'openlab_contactus_title',
				'priority'    => 2,
	));
	/* contactus subtitle */
	$wp_customize->add_setting( 'openlab_contactus_subtitle', array('sanitize_callback' => 'openlab_sanitize_text'));
	$wp_customize->add_control( 'openlab_contactus_subtitle', array(
			'label'    => __( 'Contact us section subtitle', 'openlab-txtd' ),
	      	'section'  => 'openlab_contactus_section',
	      	'settings' => 'openlab_contactus_subtitle',
			'priority'    => 3,
	));

	/* contactus email */
	$wp_customize->add_setting( 'openlab_contactus_email', array('sanitize_callback' => 'openlab_sanitize_text'));

	$wp_customize->add_control( 'openlab_contactus_email', array(
				'label'    => __( 'Email address', 'openlab-txtd' ),
				'section'  => 'openlab_contactus_section',
				'settings' => 'openlab_contactus_email',
				'priority'    => 4,
	));

	/* contactus button label */
	$wp_customize->add_setting( 'openlab_contactus_button_label', array('sanitize_callback' => 'openlab_sanitize_text','default' => __('Send Message','openlab-txtd')));

	$wp_customize->add_control( 'openlab_contactus_button_label', array(
				'label'    => __( 'Button label', 'openlab-txtd' ),
				'section'  => 'openlab_contactus_section',
				'settings' => 'openlab_contactus_button_label',
				'priority'    => 5,
	));
	/* recaptcha */
	$wp_customize->add_setting( 'openlab_contactus_recaptcha_show', array('sanitize_callback' => 'openlab_sanitize_text'));
	$wp_customize->add_control(
		'openlab_contactus_recaptcha_show',
		array(
			'type' => 'checkbox',
			'label' => __('Hide reCaptcha?','openlab-txtd'),
			'section' => 'openlab_contactus_section',
			'priority'    => 6,
		)
	);

	/* site key */
	$attribut_new_tab = (isset($openlab_accessibility) && ($openlab_accessibility != 1) ? ' target="_blank"' : '' );
	$wp_customize->add_setting( 'openlab_contactus_sitekey', array('sanitize_callback' => 'openlab_sanitize_text'));
	$wp_customize->add_control( 'openlab_contactus_sitekey', array(
				'label'    => __( 'Site key', 'openlab-txtd' ),
				'description' => '<a'.$attribut_new_tab.' href="https://www.google.com/recaptcha/admin#list">'.__('Create an account here','openlab-txtd').'</a> to get the Site key and the Secret key for the reCaptcha.',
				'section'  => 'openlab_contactus_section',
				'settings' => 'openlab_contactus_sitekey',
				'priority'    => 7,
	));
	/* secret key */
	$wp_customize->add_setting( 'openlab_contactus_secretkey', array('sanitize_callback' => 'openlab_sanitize_text'));
	$wp_customize->add_control( 'openlab_contactus_secretkey', array(
				'label'    => __( 'Secret key', 'openlab-txtd' ),
				'section'  => 'openlab_contactus_section',
				'settings' => 'openlab_contactus_secretkey',
				'priority'    => 8,
	));

	/* Openlab Map Settings section */

	$wp_customize->add_panel( 'panel_openlab_map', array(
		'priority' => 120,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'General Map options', 'openlab-txtd' )
	) );

	$wp_customize->add_section( 'openlab_map_section' , array(
			'title'       => __( 'Google map options', 'openlab-txtd' ),
			'priority'    => 120,
			'panel' => 'panel_openlab_map'
	));

	$wp_customize->add_setting( 'openlab_map_address', array('sanitize_callback' => 'openlab_sanitize_text'));
	$wp_customize->add_control( 'openlab_map_address', array(
			'label'    => __( 'Address', 'openlab-txtd' ),
			'section'  => 'openlab_map_section',
			'settings' => 'openlab_map_address',
			'priority' => 1,
	));
	$wp_customize->add_setting( 'openlab_map_zoom', array('sanitize_callback' => 'openlab_sanitize_text'));
	$wp_customize->add_control( 'openlab_map_zoom', array(
			'label'    => __( 'Map Zoom', 'openlab-txtd' ),
			'section'  => 'openlab_map_section',
			'settings' => 'openlab_map_zoom',
			'priority' => 2,
	));
  //


	/* LOGO	*/
	$wp_customize->add_setting( 'openlab_logo', array('sanitize_callback' => 'esc_url_raw'));
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_logo', array(
			'label'    => __( 'Logo', 'openlab-txtd' ),
			'section'  => 'title_tagline',
			'settings' => 'openlab_logo',
			'priority'    => 1,
	)));

}
add_action( 'customize_register', 'openlab_customize_register' );
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function openlab_customize_preview_js() {
	wp_enqueue_script( 'openlab_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'openlab_customize_preview_js' );
function openlab_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}
function openlab_sanitize_pro_version( $input ) {
    return $input;
}
function openlab_sanitize_number( $input ) {
    return force_balance_tags( $input );
}
function openlab_registers() {

	wp_enqueue_script( 'openlab_customizer_script', get_template_directory_uri() . '/js/openlab_customizer.js', array("jquery"), '20120206', true  );

	wp_localize_script( 'openlab_customizer_script', 'openlabLiteCustomizerObject', array(

		'documentation' => __( 'View Documentation', 'openlab-txtd' ),
		'pro' => __('View PRO version','openlab-txtd')

	) );
}
add_action( 'customize_controls_enqueue_scripts', 'openlab_registers' );
