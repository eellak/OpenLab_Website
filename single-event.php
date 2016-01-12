<?php
/**
 * The Template for displaying all single events.
 */
get_header(); ?>

<div class="clear"></div>

</header> <!-- / END HOME SECTION  -->

<div id="content" class="site-content single-event">

	<div class="container">
		<div class="content-left-wrap col-md-3">
			<?php while ( have_posts() ) : the_post();

			get_template_part( 'content', 'event_meta' );

		echo '</div>';
		echo '<div class="content-left-wrap col-md-6">';
			echo '<div id="primary" class="content-area">';
				echo '<main id="main" class="site-main" role="main">';

						 get_template_part( 'content', 'event' );
						 //openlab_post_nav();
					endwhile; // end of the loop. ?>
				</main><!-- #main -->
			</div><!-- #primary -->
		</div>
		<div class="sidebar-wrap col-md-3 content-left-wrap">
			<?php get_sidebar(); ?>
		</div><!-- .sidebar-wrap -->
</div><!-- .container -->
<?php get_footer(); ?>
