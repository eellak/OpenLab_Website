<section class="about-us" id="aboutus">
	<div class="container">

		<!-- SECTION HEADER -->

		<div class="section-header">

			<!-- SECTION TITLE -->

			<?php
			$openlab_aboutus_title = get_theme_mod('openlab_aboutus_title',__('About','openlab-lite'));

			if( !empty($openlab_aboutus_title) ):
				echo '<h2 class="white-text">'.$openlab_aboutus_title.'</h2>';
			endif;
			?>

			<!-- SHORT DESCRIPTION ABOUT THE SECTION -->

			<?php

				$openlab_aboutus_subtitle = get_theme_mod('openlab_aboutus_subtitle',__('Use this section to showcase important details about your business.','openlab-lite'));

				if( !empty($openlab_aboutus_subtitle) ):

					echo '<div class="white-text section-legend">';

						echo $openlab_aboutus_subtitle;

					echo '</div>';

				endif;

			?>
		</div><!-- / END SECTION HEADER -->

		<!-- 3 COLUMNS OF ABOUT US-->

		<div class="row">

			<!-- COLUMN 1 - BIG MESSAGE ABOUT THE COMPANY-->

			<?php

			$openlab_aboutus_biglefttitle = get_theme_mod('openlab_aboutus_biglefttitle',__('Everything you see here is responsive and mobile-friendly.','openlab-lite'));
			$openlab_aboutus_text = get_theme_mod('openlab_aboutus_text','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec massa enim. Aliquam viverra at est ullamcorper sollicitudin. Proin a leo sit amet nunc malesuada imperdiet pharetra ut eros.<br><br> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec massa enim. Aliquam viverra at est ullamcorper sollicitudin. Proin a leo sit amet nunc malesuada imperdiet pharetra ut eros. <br><br>Mauris vel nunc at ipsum fermentum pellentesque quis ut massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas non adipiscing massa. Sed ut fringilla sapien. Cras sollicitudin, lectus sed tincidunt cursus, magna lectus vehicula augue, a lobortis dui orci et est.');
			$openlab_aboutus_feature1_title = get_theme_mod('openlab_aboutus_feature1_title',__('YOUR SKILL #1','openlab-lite'));
			$openlab_aboutus_feature1_text = get_theme_mod('openlab_aboutus_feature1_text');
			

			switch (
				(empty($openlab_aboutus_biglefttitle) ? 0 : 1)
				+ (empty($openlab_aboutus_text) ? 0 : 1)
				+ (empty($openlab_aboutus_feature1_title) && empty($openlab_aboutus_feature1_text) ? 0 : 1)
			) {
				case 3:
					$colCount = 4;
					break;
				case 2:
					$colCount = 6;
					break;
				default:
					$colCount = 12;
			}

				if( !empty($openlab_aboutus_biglefttitle) ):

					echo '<div class="col-lg-' . $colCount . ' col-md-' . $colCount . ' column openlab-rtl-big-title">';

						echo '<div class="big-intro" data-scrollreveal="enter left after 0s over 1s">';

							echo $openlab_aboutus_biglefttitle;

						echo '</div>';

					echo '</div>';

				endif;

			if( !empty($openlab_aboutus_text) ):

				echo '<div class="col-lg-' . $colCount . ' col-md-' . $colCount . ' column openlab_about_us_center" data-scrollreveal="enter bottom after 0s over 1s">';

						echo '<p>';

							echo $openlab_aboutus_text;

						echo '</p>';

					echo '</div>';

				endif;

			?>

		<!-- COLUMN 1 - SKILSS-->

		<div class="col-lg-<?php echo $colCount; ?> col-md-<?php echo $colCount; ?> column openlab-rtl-skills ">
			<div id="about_us_img" data-scrollreveal="enter right move 60px after 0.00s over 2.5s" >
				<?php 
				
				$openlab_aboutus_img = get_theme_mod('openlab_aboutus_img');
				if($openlab_aboutus_img){
					echo '<img class="about-img-right" src="'. esc_url($openlab_aboutus_img) .'" >';
				}
				//write_log($openlab_aboutus_img);
					
				?>
			</div>

		</div> <!-- / END SKILLS COLUMN-->

	</div> <!-- / END 3 COLUMNS OF ABOUT US-->

	<!-- CLIENTS -->
	<?php
		if(is_active_sidebar( 'sidebar-aboutus' )):
			echo '<div class="our-clients">';
				echo '<h2><span class="section-footer-title">'.__('OUR HAPPY CLIENTS','openlab-lite').'</span></h2>';
			echo '</div>';

			echo '<div class="client-list">';
				echo '<div data-scrollreveal="enter right move 60px after 0.00s over 2.5s">';
				dynamic_sidebar( 'sidebar-aboutus' );
				echo '</div>';
			echo '</div> ';
		endif;
	?>

</div> <!-- / END CONTAINER -->

</section> <!-- END ABOUT US SECTION -->
