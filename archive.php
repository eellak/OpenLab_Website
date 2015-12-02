<?php
/**
 * The template for displaying Archive pages.
 */
get_header(); ?>
<div class="clear"></div>
</header> <!-- / END HOME SECTION  -->
<div id="content" class="site-content default-archive">
<div class="container">
<div class="content-left-wrap col-md-9">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<?php if ( have_posts() ) : ?>
			<header class="page-header">
				<h1 class="page-title">
					<?php						if ( is_category() ) :
							single_cat_title();
						elseif ( is_tag() ) :
							single_tag_title();
						elseif ( is_author() ) :
							printf( __( 'Author: %s', 'openlab-lite' ), '<span class="vcard">' . get_the_author() . '</span>' );
						elseif ( is_day() ) :
							printf( __( 'Day: %s', 'openlab-lite' ), '<span>' . get_the_date() . '</span>' );
						elseif ( is_month() ) :
							printf( __( 'Month: %s', 'openlab-lite' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'openlab-lite' ) ) . '</span>' );
						elseif ( is_year() ) :
							printf( __( 'Year: %s', 'openlab-lite' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'openlab-lite' ) ) . '</span>' );
						elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
							_e( 'Asides', 'openlab-lite' );
						elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
							_e( 'Galleries', 'openlab-lite');
						elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
							_e( 'Images', 'openlab-lite');
						elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
							_e( 'Videos', 'openlab-lite' );
						elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
							_e( 'Quotes', 'openlab-lite' );
						elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
							_e( 'Links', 'openlab-lite' );
						elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
							_e( 'Statuses', 'openlab-lite' );
						elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
							_e( 'Audios', 'openlab-lite' );
						elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
							_e( 'Chats', 'openlab-lite' );
						else :
							_e( 'Archives', 'openlab-lite' );
						endif;
					?>
				</h1>
				<?php
					// Show an optional term description.
					$term_description = term_description();
					if ( ! empty( $term_description ) ) :
						printf( '<div class="taxonomy-description">%s</div>', $term_description );
					endif;
				?>
			</header><!-- .page-header -->
			<?php while ( have_posts() ) : the_post();
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );
				endwhile;				openlab_paging_nav();			else:				get_template_part( 'content', 'none' );			endif; ?>
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .content-left-wrap -->
<div class="sidebar-wrap col-md-3 content-left-wrap">
	<?php get_sidebar(); ?>
</div><!-- .sidebar-wrap -->
</div><!-- .container -->
<?php get_footer(); ?>
