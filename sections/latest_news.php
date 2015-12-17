<?php

	$openlab_total_posts = 4; /* number of latest posts to show */

	if( !empty($openlab_total_posts) && ($openlab_total_posts > 0) ):

		echo '<section class="latest-news" id="latestnews">';

			echo '<div class="container">';

				/* SECTION HEADER */

				echo '<div class="section-header">';

					$openlab_latestnews_title = get_theme_mod('openlab_latestnews_title');

					/* title */
					if( !empty($openlab_latestnews_title) ):

						echo '<h2 class="dark-text">' . $openlab_latestnews_title . '</h2>';

					else:

						echo '<h2 class="dark-text">' . __('Latest news','openlab-txtd') . '</h2>';

					endif;

					/* subtitle */
					$openlab_latestnews_subtitle = get_theme_mod('openlab_latestnews_subtitle');

					if( !empty($openlab_latestnews_subtitle) ):

						echo '<div class="dark-text section-legend">'.$openlab_latestnews_subtitle.'</div>';

					endif;

				echo '</div><!-- END .section-header -->';

				echo '<div class="clear"></div>';

				echo '<div id="carousel-homepage-latestnews" class="carousel slide" data-ride="carousel">';

					/* Wrapper for slides */

					echo '<div class="carousel-inner" role="listbox">';


						$openlab_latest_loop = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => $openlab_total_posts, 'order' => 'DESC','ignore_sticky_posts' => true ) );

						$newSlideActive = '<div class="item active">';
						$newSlide 		= '<div class="item">';
						$newSlideClose 	= '<div class="clear"></div></div>';
						$i_latest_posts= 0;

						if ( $openlab_latest_loop->have_posts() ) :

							while ( $openlab_latest_loop->have_posts() ) : $openlab_latest_loop->the_post();

								$i_latest_posts++;

								if ( !wp_is_mobile() ){

										if($i_latest_posts == 1){
											echo $newSlideActive;
										}
										else if($i_latest_posts % 4 == 1){
											echo $newSlide;
										}

										echo '<div class="col-sm-3 latestnews-box">';

											?>
											<div class="square-box">
												<?php
												$featured_img = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'post-thumbnail' );
												if ( has_post_thumbnail() ) :
													echo '<div class="square-content-wrap has-img" style="background-image:url('. esc_url($featured_img[0]) .');">';
												else:
													echo '<div class="square-content-wrap no-img">';
												endif;
												?>
												<?php echo '<a href="'.get_permalink().'" title="'.get_the_title().'">'; ?>
																			<span class="post-icon"></span>
												<?php echo '</a>'; ?>
												</div>
											</div>

											<?php

											echo '<div class="latesnews-content">';

												echo '<h3 class="latestnews-title"><a href="'.get_permalink().'" title="'.get_the_title().'">'.get_the_title().'</a></h3>';
														$content = get_the_content();
														$trimmed = wp_trim_words( $content, $num_words = 12, $more = null );
														echo '<p class="latestnews-excerpt">'. $trimmed .'</p>';
												//the_excerpt();

											echo '</div>';

										echo '</div><!-- .latestnews-box"> -->';

										/* after every four posts it must closing the '.item' */
										if($i_latest_posts % 4 == 0){
											echo $newSlideClose;
										}

								} else {

									if( $i_latest_posts == 1 ) $active = 'active'; else $active = '';

									echo '<div class="item '.$active.'">';
										echo '<div class="col-md-3 latestnews-box">';
											echo '<div class="latestnews-img">';
												echo '<a class="latestnews-img-a" href="'.get_permalink().'" title="'.get_the_title().'">';
													if ( has_post_thumbnail() ) :
														the_post_thumbnail();
													else:
														echo '<img src="'.esc_url( get_template_directory_uri() ).'/images/blank-latestposts.png" alt="'.get_the_title().'" />';
													endif;
												echo '</a>';
											echo '</div>';
											echo '<div class="latesnews-content">';
												echo '<h3 class="latestnews-title"><a href="'.get_the_permalink().'" title="'.get_the_title().'">'.get_the_title().'</a></h3>';
												the_excerpt();
											echo '</div>';
										echo '</div>';
									echo '</div>';
								}

							endwhile;

						endif;

						if ( !wp_is_mobile() ) {

							// if there are less than 10 posts
							if($i_latest_posts % 4!=0){
								echo $newSlideClose;
							}

						}

						wp_reset_postdata();

					echo '</div><!-- .carousel-inner -->';
				echo '</div><!-- #carousel-homepage-latestnews -->';

			echo '</div><!-- .container -->';
		echo '</section>';

endif; ?>
