<?php
/**
 * The template for displaying Search Results pages.
 */
get_header(); ?>

<div class="clear"></div>

</header> <!-- / END HOME SECTION  -->

<div id="content" class="site-content">

	<div class="container">

		<div class="content-left-wrap col-md-12 search">

			<div id="primary" class="content-area">

				<main id="main" class="site-main" role="main">

				<?php if ( have_posts() ) : ?>

					<header class="page-header">

						<h1 class="page-title-search"><?php echo __('Search', 'openlab-txtd'); ?></h1>
						<div class="col-md-10">
							<div class="search-form-container">
								<form role="search" method="get" class="search-form" action="<?php echo get_site_url().'/' ?>">
									<button type="submit" class="btn-search">
										<span><?php echo get_svg_images_src('focus-icon'); ?></span>
									</button>
									<span class="input-wrap">
										<input type="search" class="search-field" placeholder="" value="" name="s" title="<?php echo __('Search for...', 'openlab-txtd'); ?>">
									</span>
								</form>
							</div>
						</div>

						<h3 class="page-results-for"><?php printf( __( 'Search Results for: %s', 'openlab-txtd' ), '<span>' . get_search_query() . '</span>' ); ?></h3>

					</header><!-- .page-header -->

					<?php while ( have_posts() ) : the_post(); ?>
						<?php //echo 'The post type is: ' . get_post_type( get_the_ID() ); ?>
						<?php get_template_part( 'search/content', get_post_type( get_the_ID() ) ); ?>

					<?php endwhile; ?>

					<?php //openlab_paging_nav(); ?>

				<?php else : ?>

					<?php get_template_part( 'content', 'none' ); ?>

				<?php endif; ?>

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .content-left-wrap -->

		<!--<div class="sidebar-wrap col-md-3 content-left-wrap">-->

			<?php //get_sidebar(); ?>

		<!--</div>--> <!-- .sidebar-wrap -->

	</div><!-- .container -->

<?php get_footer(); ?>
