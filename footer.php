<?php
/**
 * The template for displaying the footer.
 * Contains the closing of the #content div and all content after
 */

?>

</div><!-- .site-content -->

<footer id="footer" role="contentinfo">

<div class="container">

	<?php
		$footer_sections = 0;
		//$openlab_address = get_theme_mod('openlab_address',__('Company address','openlab-lite'));
		//$openlab_address_icon = get_theme_mod('openlab_address_icon',get_template_directory_uri().'/images/map25-redish.png');

		//$openlab_map_icon = get_theme_mod('openlab_contact_map_icon', get_template_directory_uri().'/images/map-footer-icon.svg');


		$openlab_map_icon = '<svg version="1.1" id="footer-map-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
													 viewBox="0 0 50.1 50" style="enable-background:new 0 0 50.1 50;" xml:space="preserve">
													<g>
														<path class="map-icon-path" d="M50,48.4l-6.9-24.9l0,0c-0.2-0.5-0.7-0.8-1.2-0.8h-8.6c2.5-4.4,3.7-7.8,3.7-10.1C37,5.6,31.6,0,25,0
															c-6.6,0-12,5.6-12,12.6c0,2.3,1.3,5.7,3.7,10.1H9.6c-0.5,0-1,0.4-1.1,0.8L0.1,48.4c-0.3,0.4-0.1,0.8,0.1,1.1l0,0
															c0.1,0.1,0.5,0.5,1,0.5h47.6c0.4,0,0.8-0.2,1-0.5C50,49.1,50.1,48.8,50,48.4z M25,2.4c5.4,0,9.5,4.5,9.5,10.2
															c0,4.9-8.1,16.3-9.5,18.3c-1.1-1.5-3-4.3-5-7.4c-0.1-0.2-0.2-0.4-0.3-0.5c-2.8-4.7-4.3-8.3-4.3-10.4C15.5,7,19.7,2.4,25,2.4z
															 M25,34.2c0.4,0,0.8-0.2,1-0.5c0-0.1,0.1-0.2,0.3-0.4c0.8-1.1,3.2-4.4,5.5-8.2H41l6.2,22.5H2.9l7.5-22.5h7.8
															c2.3,3.8,4.7,7.1,5.5,8.2c0.2,0.2,0.3,0.4,0.3,0.4C24.3,34,24.6,34.2,25,34.2z"/>
														<path class="map-icon-path" d="M25,19.3c3.5,0,6.4-3,6.4-6.7c0-3.7-2.9-6.7-6.4-6.7c-3.5,0-6.4,3-6.4,6.7C18.6,16.3,21.5,19.3,25,19.3z
															 M25,8.3c2.2,0,4,1.9,4,4.3c0,2.4-1.8,4.3-4,4.3c-2.2,0-4-1.9-4-4.3C21,10.2,22.8,8.3,25,8.3z"/>
													</g>
												</svg>';

		$openlab_map_address = get_theme_mod('openlab_map_address', 'Leoxarous 17, Athens, Greece');
		$openlab_details_text = get_theme_mod('openlab_contact_details_text', '<p>Company Name</p><p>Address</p><p>Tel</p><p>email@email.com</p>');
		//write_log($openlab_map_icon);

		//$openlab_phone = get_theme_mod('openlab_phone','<a href="tel:0 332 548 954">0 332 548 954</a>');
		//$openlab_phone_icon = get_theme_mod('openlab_phone_icon',get_template_directory_uri().'/images/telephone65-blue.png');

		$openlab_socials_facebook = get_theme_mod('openlab_socials_facebook','#');
		$openlab_socials_twitter = get_theme_mod('openlab_socials_twitter','#');
		$openlab_socials_linkedin = get_theme_mod('openlab_socials_linkedin','#');
		$openlab_socials_behance = get_theme_mod('openlab_socials_behance','#');
		$openlab_socials_dribbble = get_theme_mod('openlab_socials_dribbble','#');

		$openlab_accessibility = get_theme_mod('openlab_accessibility');

		if(!empty($openlab_map_icon) || !empty($openlab_details_text)):
			$footer_sections++;
		endif;

		if(!empty($openlab_socials_facebook) || !empty($openlab_socials_twitter) || !empty($openlab_socials_linkedin) || !empty($openlab_socials_behance) || !empty($openlab_socials_dribbble) ||
		!empty($openlab_copyright)):
			$footer_sections++;
		endif;

		if( $footer_sections == 1 ):
			$footer_class = 'col-md-12';
		elseif( $footer_sections == 2 ):
			$footer_class = 'col-md-6';
		elseif( $footer_sections == 3 ):
			$footer_class = 'col-md-4';
		elseif( $footer_sections == 4 ):
			$footer_class = 'col-md-3';
		else:
			$footer_class = 'col-md-3';
		endif;


		//Facebook feed
		if ( shortcode_exists( 'custom-facebook-feed' ) ) {
			echo '<div class="col-md-4 custom-fb-feed">';
				echo do_shortcode( '[custom-facebook-feed]' );
			echo '</div>';
		}
		else{
			echo '<div class="col-md-4 custom-fb-feed-error">
					<p class="error">'. __('Please install and activate Custom Facebook Feed Plugin.' , 'openlab-lite') .'</p>
				 </div>';
		}


		//Openlab Footer Company info
		if( !empty($openlab_map_icon) || !empty($openlab_details_text) ):
			echo '<div class="col-md-4 company-details-footer">';
				echo '<div class="details-wrap">';
					if( !empty($openlab_map_icon) && !empty($openlab_map_address) ) {

						echo '<a data-toggle="modal" href="#gmap-embed"><span class="footer-map-icon">'. $openlab_map_icon .'</span></a>';
					}
					if( !empty($openlab_details_text) ) echo '<div class="details-text">'. $openlab_details_text .'</div>';
				echo '</div>';
			echo '</div>';
		endif;


		//Social Links
		// open link in a new tab when checkbox "accessibility" is not ticked
		$attribut_new_tab = (isset($openlab_accessibility) && ($openlab_accessibility != 1) ? ' target="_blank"' : '' );

		if( !empty($openlab_socials_facebook) || !empty($openlab_socials_twitter) || !empty($openlab_socials_linkedin) || !empty($openlab_socials_behance) || !empty($openlab_socials_dribbble) ||
		!empty($openlab_copyright)):

					echo '<div class="col-md-4 copyright">';
					if(!empty($openlab_socials_facebook) || !empty($openlab_socials_twitter) || !empty($openlab_socials_linkedin) || !empty($openlab_socials_behance) || !empty($openlab_socials_dribbble)):
						echo '<ul class="social">';

						/* facebook */
						if( !empty($openlab_socials_facebook) ):
							echo '<li><a'.$attribut_new_tab.' href="'.esc_url($openlab_socials_facebook).'">
											<span class="footer-social">
												<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
													 viewBox="-230 373.4 50 50" style="enable-background:new -230 373.4 50 50;" xml:space="preserve">
													<polyline points="-230,423.4 -230,373.4 -180,373.4 	"/>
													<path class="st1" d="M-187.7,403.3l1-7.7h-7.6v-4.9c0-2.2,0.6-3.7,3.8-3.7l4.1,0v-6.8c-0.7-0.1-3.1-0.3-5.9-0.3
														c-5.8,0-9.8,3.6-9.8,10.1v5.6h-6.6v7.7h6.6v19.6h7.9v-19.6H-187.7z"/>
												</svg>
											</span>
										</a></li>';
						endif;
						/* twitter */
						if( !empty($openlab_socials_twitter) ):
							echo '<li><a'.$attribut_new_tab.' href="'.esc_url($openlab_socials_twitter).'">
											<span class="footer-social">
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
										</a></li>';
						endif;
						/* linkedin */
						if( !empty($openlab_socials_linkedin) ):
							echo '<li><a'.$attribut_new_tab.' href="'.esc_url($openlab_socials_linkedin).'">
											<span class="footer-social">
												<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
													 viewBox="-230 373.4 50 50" style="enable-background:new -230 373.4 50 50;" xml:space="preserve">
													<polyline class="st0" points="-230,423.4 -230,373.4 -180,373.4 	"/>
													<path class="st1" d="M-221.5,392.7h7.1v22.7h-7.1V392.7z M-217.9,381.4c2.3,0,4.1,1.8,4.1,4.1c0,2.3-1.8,4.1-4.1,4.1
														c-2.3,0-4.1-1.8-4.1-4.1C-222,383.2-220.2,381.4-217.9,381.4"/>
													<path class="st1" d="M-210,392.7h6.8v3.1h0.1c0.9-1.8,3.2-3.7,6.7-3.7c7.1,0,8.5,4.7,8.5,10.8v12.4h-7v-11c0-2.6-0.1-6-3.7-6
														c-3.7,0-4.2,2.9-4.2,5.8v11.2h-7C-210,415.3-210,392.7-210,392.7z"/>
												</svg>
											</span>
										</a></li>';
						endif;
						/* behance */
						if( !empty($openlab_socials_behance) ):
							echo '<li><a'.$attribut_new_tab.' href="'.esc_url($openlab_socials_behance).'">
											<span class="footer-social">
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
										</a></li>';
						endif;
						/* dribbble */
						if( !empty($openlab_socials_dribbble) ):
							echo '<li><a'.$attribut_new_tab.' href="'.esc_url($openlab_socials_dribbble).'">
											<span class="footer-social">
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
										</a></li>';
						endif;
						echo '</ul>';
					endif;

					if( !empty($openlab_copyright) ):
						echo esc_attr($openlab_copyright);
					endif;

					echo '</div>';

		endif;
	?>

</div> <!-- / END CONTAINER -->
<div id="gmap-embed" class="modal fade">
		<div class="button-wrap">
			<button type="button" class="openlab-close-modal" data-dismiss="modal" aria-hidden="true">&times;</button>
		</div>
<?php
if($openlab_map_address):
	echo '<iframe class="map-container" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" width="80%" height="80%" src="https://maps.google.com/maps?q='. $openlab_map_address .'&ie=UTF8&t=roadmap&z=17&iwloc=B&output=embed"></iframe>';
endif;
?>
</div>

</footer> <!-- / END FOOOTER  -->


	</div><!-- mobile-bg-fix-whole-site -->
</div><!-- .mobile-bg-fix-wrap -->


<?php wp_footer(); ?>

</body>

</html>
