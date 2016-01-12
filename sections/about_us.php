<section class="about-us" id="aboutus">
	<div class="container">

		<!-- SECTION HEADER -->

		<div class="section-header">

			<!-- SECTION TITLE -->

			<?php
			$openlab_aboutus_title = get_theme_mod('openlab_aboutus_title',__('Openlab','openlab-txtd'));

			if( !empty($openlab_aboutus_title) ):
				echo '<h2 class="white-text">'.$openlab_aboutus_title.'</h2>';
			endif;
			?>

			<!-- SHORT DESCRIPTION ABOUT THE SECTION -->

			<?php

				$openlab_aboutus_subtitle = get_theme_mod('openlab_aboutus_subtitle',__('Use this section to showcase important details about your business.','openlab-txtd'));

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

			$openlab_aboutus_biglefttitle = get_theme_mod('openlab_aboutus_biglefttitle',__('Openlab is an open workplace system design','openlab-txtd'));
			$openlab_aboutus_text = get_theme_mod('openlab_aboutus_text','Openlab long text description. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec massa enim. Aliquam viverra at est ullamcorper sollicitudin. Proin a leo sit amet nunc malesuada imperdiet pharetra ut eros.<br><br> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec massa enim. Aliquam viverra at est ullamcorper sollicitudin. Proin a leo sit amet nunc malesuada imperdiet pharetra ut eros. <br><br>Mauris vel nunc at ipsum fermentum pellentesque quis ut massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas non adipiscing massa. Sed ut fringilla sapien. Cras sollicitudin, lectus sed tincidunt cursus, magna lectus vehicula augue, a lobortis dui orci et est.');
			$openlab_aboutus_feature1_title = get_theme_mod('openlab_aboutus_feature1_title',__('Openlab section title','openlab-txtd'));
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

						echo '<span>';

							echo $openlab_aboutus_text;

						echo '</span>';

					echo '</div>';

				endif;

			?>

		<!-- COLUMN 1 - SKILSS-->

		<div class="col-lg-<?php echo $colCount; ?> col-md-<?php echo $colCount; ?> column openlab-rtl-skills ">
			<div id="about_us_img" data-scrollreveal="enter right move 60px after 0.00s over 2.5s" >
				<?php

				$openlab_aboutus_img = get_theme_mod('openlab_aboutus_img', get_template_directory_uri() . '/images/our-focus-right.svg');
				if($openlab_aboutus_img){
					echo '<img class="about-img-right" src="'. esc_url($openlab_aboutus_img) .'" >';
				}

				?>
			</div>

		</div> <!-- / END SKILLS COLUMN-->

	</div> <!-- / END 3 COLUMNS OF ABOUT US-->

</div> <!-- / END CONTAINER -->

</section> <!-- END ABOUT US SECTION -->
