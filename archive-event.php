<?php
/**
 * The template for displaying Archive Events.
 */
get_header(); ?>
<div class="clear events-archive"></div>
</header> <!-- / END HOME SECTION  -->
<div id="content" class="site-content">
<div class="container">
<div class="content-left-wrap col-md-12">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<?php if ( have_posts() ) : ?>
			<?php //echo '<h1>'. __('Events on: ','openlab-txtd').'</h1>'; ?>
			<?php while ( have_posts() ) : the_post();
					echo '<div class="row events">';						echo '<div class="content-left-wrap col-md-3">';							get_template_part( 'content', 'event_meta_list' );						echo '</div>';						echo '<div class="content-left-wrap col-md-9">';							get_template_part( 'content', 'event_list' );						echo '</div>';					echo '</div>';
				endwhile;			else:				get_template_part( 'content', 'none' );			endif; ?>
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .content-left-wrap -->
<!-- <div class="sidebar-wrap col-md-3 content-left-wrap"> -->
	<?php //get_sidebar(); ?>
<!-- </div> .sidebar-wrap -->
</div><!-- .container -->
<?php get_footer(); ?>
