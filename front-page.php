<?php get_header();

if ( get_option( 'show_on_front' ) == 'page' ) {
    ?>
	<div class="clear"></div>

	</header> <!-- / END HOME SECTION  -->

	<div id="content" class="site-content">

	<div class="container">

		<div class="content-left-wrap col-md-9">

			<div id="primary" class="content-area">

				<main id="main" class="site-main" role="main">

				<?php if ( have_posts() ) :

						while ( have_posts() ) : the_post();

							/* Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */

							get_template_part( 'content', get_post_format() );

						endwhile;

						openlab_paging_nav();

					else :

						get_template_part( 'content', 'none' );

					endif; ?>

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .content-left-wrap -->

		<div class="sidebar-wrap col-md-3 content-left-wrap">

			<?php get_sidebar(); ?>

		</div><!-- .sidebar-wrap -->

	</div><!-- .container -->
	<?php
}else {

	if(isset($_POST['submitted']) && !defined('PIRATE_FORMS_VERSION') && !shortcode_exists( 'pirate_forms' ) ) :

			/* recaptcha */

			$openlab_contactus_sitekey = get_theme_mod('openlab_contactus_sitekey');

			$openlab_contactus_secretkey = get_theme_mod('openlab_contactus_secretkey');

			$openlab_contactus_recaptcha_show = get_theme_mod('openlab_contactus_recaptcha_show');

			if( isset($openlab_contactus_recaptcha_show) && $openlab_contactus_recaptcha_show != 1 && !empty($openlab_contactus_sitekey) && !empty($openlab_contactus_secretkey) ) :

		        $captcha;

		        if( isset($_POST['g-recaptcha-response']) ){

		          $captcha=$_POST['g-recaptcha-response'];

		        }

		        if( !$captcha ){

		          $hasError = true;

		        }

		        $response = wp_remote_get( "https://www.google.com/recaptcha/api/siteverify?secret=".$openlab_contactus_secretkey."&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR'] );

		        if($response['body'].success==false) {

		        	$hasError = true;

		        }

	        endif;

			/* name */

			if(trim($_POST['myname']) === ''):

				$nameError = __('* Please enter your name.','openlab-lite');

				$hasError = true;

			else:

				$name = trim($_POST['myname']);

			endif;

			/* email */

			if(trim($_POST['myemail']) === ''):

				$emailError = __('* Please enter your email address.','openlab-lite');

				$hasError = true;

			elseif (!preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i", trim($_POST['myemail']))) :

				$emailError = __('* You entered an invalid email address.','openlab-lite');

				$hasError = true;

			else:

				$email = trim($_POST['myemail']);

			endif;

			/* subject */

			if(trim($_POST['mysubject']) === ''):

				$subjectError = __('* Please enter a subject.','openlab-lite');

				$hasError = true;

			else:

				$subject = trim($_POST['mysubject']);

			endif;

			/* message */

			if(trim($_POST['mymessage']) === ''):

				$messageError = __('* Please enter a message.','openlab-lite');

				$hasError = true;

			else:

				$message = stripslashes(trim($_POST['mymessage']));

			endif;

			/* send the email */

			if(!isset($hasError)):

				$openlab_contactus_email = get_theme_mod('openlab_contactus_email');

				if( empty($openlab_contactus_email) ):

					$emailTo = get_theme_mod('openlab_email');

				else:

					$emailTo = $openlab_contactus_email;

				endif;

				if(isset($emailTo) && $emailTo != ""):

					if( empty($subject) ):
						$subject = 'From '.$name;
					endif;

					$body = "Name: $name \n\nEmail: $email \n\n Subject: $subject \n\n Message: $message";

					/* FIXED HEADERS FOR EMAIL NOT GOING TO SPAM */
					$openlab_admin_email = get_option( 'admin_email' );
					$openlab_sitename = strtolower( $_SERVER['SERVER_NAME'] );

					function openlab_is_localhost() {
						$openlab_server_name = strtolower( $_SERVER['SERVER_NAME'] );
						return in_array( $openlab_server_name, array( 'localhost', '127.0.0.1' ) );
					}

					if ( openlab_is_localhost() ) {

						$headers = 'From: '.$name.' <'.$openlab_admin_email.'>' . "\r\n" . 'Reply-To: ' . $email;

					} else {

						if ( substr( $openlab_sitename, 0, 4 ) == 'www.' ) {
							$openlab_sitename = substr( $openlab_sitename, 4 );
						}

						$headers = 'From: '.$name.' <wordpress@'.$openlab_sitename.'>' . "\r\n" . 'Reply-To: ' . $email;

					}

					wp_mail($emailTo, $subject, $body, $headers);

					$emailSent = true;

				else:

					$emailSent = false;

				endif;

			endif;

		endif;

	$openlab_bigtitle_show = get_theme_mod('openlab_bigtitle_show');

	if( isset($openlab_bigtitle_show) && $openlab_bigtitle_show != 1 ):

		get_template_part( 'sections/big_title' );

	endif;

?>

</header> <!-- / END HOME SECTION  -->

<div id="content" class="site-content">

<?php

	/* OUR FOCUS SECTION */

	$openlab_ourfocus_show = get_theme_mod('openlab_ourfocus_show');

	if( isset($openlab_ourfocus_show) && $openlab_ourfocus_show != 1 ):

		get_template_part( 'sections/our_focus' );

	endif;

	/* RIBBON WITH BOTTOM BUTTON */

	get_template_part( 'sections/ribbon_with_bottom_button' );

	/* ABOUT US */

	$openlab_aboutus_show = get_theme_mod('openlab_aboutus_show');

	if( isset($openlab_aboutus_show) && $openlab_aboutus_show != 1 ):

		get_template_part( 'sections/about_us' );

	endif;

	/* OUR TEAM */

	$openlab_ourteam_show = get_theme_mod('openlab_ourteam_show');

	if( isset($openlab_ourteam_show) && $openlab_ourteam_show != 1 ):

		get_template_part( 'sections/our_team' );

	endif;

	/* TESTIMONIALS */

	$openlab_testimonials_show = get_theme_mod('openlab_testimonials_show');

	if( isset($openlab_testimonials_show) && $openlab_testimonials_show != 1 ):

		get_template_part( 'sections/testimonials' );

	endif;

	/* RIBBON WITH RIGHT SIDE BUTTON */

	get_template_part( 'sections/ribbon_with_right_button' );

	/* LATEST NEWS */
	$openlab_latestnews_show = get_theme_mod('openlab_latestnews_show');

	if( isset($openlab_latestnews_show) && $openlab_latestnews_show != 1 ):

		get_template_part( 'sections/latest_news' );

	endif;

		/* CONTACT US */
		$openlab_contactus_show = get_theme_mod('openlab_contactus_show');

		if( isset($openlab_contactus_show) && $openlab_contactus_show != 1 ):
			?>
			<section class="contact-us" id="contact">
        <div class="colored-mask"></div>
				<div class="container">
					<!-- SECTION HEADER -->
					<div class="section-header">

						<?php

							$openlab_contactus_title = get_theme_mod('openlab_contactus_title',__('Get in touch','openlab-lite'));
							if ( !empty($openlab_contactus_title) ):
								echo '<h2 class="white-text">'.$openlab_contactus_title.'</h2>';
							endif;

							$openlab_contactus_subtitle = get_theme_mod('openlab_contactus_subtitle');
							if(isset($openlab_contactus_subtitle) && $openlab_contactus_subtitle != ""):
								echo '<div class="white-text section-legend">'.$openlab_contactus_subtitle.'</div>';
							endif;
						?>
					</div>
					<!-- / END SECTION HEADER -->

					<?php
					if ( defined('PIRATE_FORMS_VERSION') && shortcode_exists( 'pirate_forms' ) ):

						echo '<div class="row">';
							echo do_shortcode('[pirate_forms]');
						echo '</div>';

					else:
					?>
						<!-- CONTACT FORM-->
						<div class="row">

							<?php

							if(isset($emailSent) && $emailSent == true) :

								echo '<div class="notification success"><p>'.__('Thanks, your email was sent successfully!','openlab-lite').'</p></div>';

							elseif(isset($_POST['submitted'])):

								echo '<div class="notification error"><p>'.__('Sorry, an error occured.','openlab-lite').'</p></div>';

							endif;

							if(isset($nameError) && $nameError != '') :

								echo '<div class="notification error"><p>'.esc_html($nameError).'</p></div>';

							endif;

							if(isset($emailError) && $emailError != '') :

								echo '<div class="notification error"><p>'.esc_html($emailError).'</p></div>';

							endif;

							if(isset($subjectError) && $subjectError != '') :

								echo '<div class="notification error"><p>'.esc_html($subjectError).'</p></div>';

							endif;

							if(isset($messageError) && $messageError != '') :

								echo '<div class="notification error"><p>'.esc_html($messageError).'</p></div>';

							endif;

							?>

							<form role="form" method="POST" action="" onSubmit="this.scrollPosition.value=(document.body.scrollTop || document.documentElement.scrollTop)" class="contact-form">

								<input type="hidden" name="scrollPosition">

								<input type="hidden" name="submitted" id="submitted" value="true" />

								<div class="col-lg-4 col-sm-4 openlab-rtl-contact-name" data-scrollreveal="enter left after 0s over 1s">
									<label for="myname" class="screen-reader-text"><?php _e( 'Your Name', 'openlab-lite' ); ?></label>
									<input required="required" type="text" name="myname" id="myname" placeholder="<?php _e('Your Name','openlab-lite'); ?>" class="form-control input-box" value="<?php if(isset($_POST['myname'])) echo esc_attr($_POST['myname']);?>">
								</div>

								<div class="col-lg-4 col-sm-4 openlab-rtl-contact-email" data-scrollreveal="enter left after 0s over 1s">
									<label for="myemail" class="screen-reader-text"><?php _e( 'Your Email', 'openlab-lite' ); ?></label>
									<input required="required" type="email" name="myemail" id="myemail" placeholder="<?php _e('Your Email','openlab-lite'); ?>" class="form-control input-box" value="<?php if(isset($_POST['myemail'])) echo is_email($_POST['myemail']) ? $_POST['myemail'] : ""; ?>">
								</div>

								<div class="col-lg-4 col-sm-4 openlab-rtl-contact-subject" data-scrollreveal="enter left after 0s over 1s">
									<label for="mysubject" class="screen-reader-text"><?php _e( 'Subject', 'openlab-lite' ); ?></label>
									<input required="required" type="text" name="mysubject" id="mysubject" placeholder="<?php _e('Subject','openlab-lite'); ?>" class="form-control input-box" value="<?php if(isset($_POST['mysubject'])) echo esc_attr($_POST['mysubject']);?>">
								</div>

								<div class="col-lg-12 col-sm-12" data-scrollreveal="enter right after 0s over 1s">
									<label for="mymessage" class="screen-reader-text"><?php _e( 'Your Message', 'openlab-lite' ); ?></label>
									<textarea name="mymessage" id="mymessage" class="form-control textarea-box" placeholder="<?php _e('Your Message','openlab-lite'); ?>"><?php if(isset($_POST['mymessage'])) { echo esc_html($_POST['mymessage']); } ?></textarea>
								</div>

								<?php
								$openlab_contactus_button_label = get_theme_mod('openlab_contactus_button_label',__('Send Message','openlab-lite'));
								if( !empty($openlab_contactus_button_label) ):
									echo '<button class="btn btn-primary custom-button red-btn" type="submit" data-scrollreveal="enter left after 0s over 1s">'.$openlab_contactus_button_label.'</button>';
								endif;
								?>

								<?php

								$openlab_contactus_sitekey = get_theme_mod('openlab_contactus_sitekey');
								$openlab_contactus_secretkey = get_theme_mod('openlab_contactus_secretkey');
								$openlab_contactus_recaptcha_show = get_theme_mod('openlab_contactus_recaptcha_show');

								if( isset($openlab_contactus_recaptcha_show) && $openlab_contactus_recaptcha_show != 1 && !empty($openlab_contactus_sitekey) && !empty($openlab_contactus_secretkey) ) :

									echo '<div class="g-recaptcha openlab-g-recaptcha" data-sitekey="' . $openlab_contactus_sitekey . '"></div>';

								endif;

								?>

							</form>

						</div>

						<!-- / END CONTACT FORM-->
					<?php
					endif;
					?>

				</div> <!-- / END CONTAINER -->

			</section> <!-- / END CONTACT US SECTION-->
			<?php
		endif;

}
get_footer(); ?>
