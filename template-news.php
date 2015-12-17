<?php
/*

Template Name: News Page

*/

get_header(); ?>

<div class="clear"></div>

</header> <!-- / END HOME SECTION  -->

<div id="content" class="site-content">

	<div class="container">

		<div class="content-left-wrap col-md-12">

			<div id="primary" class="content-area">

				<main id="main" class="site-main" role="main">

					<?php

					$args = array(
						'post_type'    		=> 'post',
						'posts_per_page'    => -1,
						'orderby'    		=> 'date',
						'order'      		=> 'DESC'
					);

					$query = new WP_Query( $args );

						while ( $query->have_posts() ) : $query->the_post();

							get_template_part( 'content', 'single_post_archive' );

						endwhile;

					wp_reset_postdata();

					?>

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .content-left-wrap -->

	</div><!-- .container -->

<?php get_footer(); ?>
