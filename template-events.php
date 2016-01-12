<?php
/*

Template Name: Events Page

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
					echo '<h1 class="featured-title">'. __('Upcoming Events','openlab-txtd').'</h1>';
					//get Next Event from now
					$args = array(
						'post_type'    		=> 'event',
						'posts_per_page'  => 1,
						'meta_key'     		=> 'event_datetime_start',
						'meta_value'   		=> date( "U" ),
						'meta_compare' 		=> '>',
						'orderby'    		=> 'meta_value_num',
						'order'      		=> 'ASC'
					);
					$query = new WP_Query( $args );

						while ( $query->have_posts() ) : $query->the_post();

						echo '<div class="row upcoming-featured">';
							echo '<div class="content-left-wrap col-md-3 col-sm-3 col-xs-3">';
								get_template_part( 'content', 'event_meta_list_featured' );
							echo '</div>';
							echo '<div class="content-left-wrap col-md-9 col-sm-9 col-xs-9">';
								get_template_part( 'content', 'event_list_featured' );
							echo '</div>';
						echo '</div>';

						endwhile;
						wp_reset_postdata();


					//get Next 2 Events from now
					$args = array(
						'post_type'    		=> 'event',
						'posts_per_page'    => 3,
						'offset'			=> 1,
						'meta_key'     		=> 'event_datetime_start',
						'meta_value'   		=> date( "U" ),
						'meta_compare' 		=> '>',
						'orderby'    		=> 'meta_value_num',
						'order'      		=> 'ASC'
					);
					$query = new WP_Query( $args );

						while ( $query->have_posts() ) : $query->the_post();

						echo '<div class="row upcoming">';
							echo '<div class="content-left-wrap col-md-3 col-sm-3 col-xs-3">';
								get_template_part( 'content', 'event_meta_list' );
							echo '</div>';

							echo '<div class="content-left-wrap col-md-9 col-sm-9 col-xs-9">';
								get_template_part( 'content', 'event_list' );
							echo '</div>';
						echo '</div>';

						endwhile;
						wp_reset_postdata();





					//3 most recently Passed Events
					echo '<h3 class="featured-title">'. __('Passed Events','openlab-txtd').'</h3>';

					$args = array(
						'post_type'    		=> 'event',
						'posts_per_page'    => 3,
						'meta_key'     		=> 'event_datetime_end',
						'meta_value'   		=> date( "U" ),
						'meta_compare' 		=> '<',
						'orderby'    		=> 'meta_value_num',
						'order'      		=> 'DESC'
					);
					$query = new WP_Query( $args );

						while ( $query->have_posts() ) : $query->the_post();
						echo '<div class="row passed-events">';
							echo '<div class="content-left-wrap col-md-3 col-sm-3 col-xs-3">';
								get_template_part( 'content', 'event_meta_list' );
							echo '</div>';

							echo '<div class="content-left-wrap col-md-9 col-sm-9 col-xs-9">';
								get_template_part( 'content', 'event_list' );
							echo '</div>';
						echo '</div>';

						endwhile;
						wp_reset_postdata();
					?>

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .content-left-wrap -->

	</div><!-- .container -->

<?php get_footer(); ?>
