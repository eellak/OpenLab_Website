	<?php
	//get available meta fields
	$event_id 				= get_the_ID();
	$event_type				= get_post_meta($event_id, 'event_type', true);
	$event_date_start = get_post_meta($event_id, 'event_datetime_start', true);
	$event_date_end 	= get_post_meta($event_id, 'event_datetime_end', true);
	$event_location 	= get_post_meta($event_id, 'event_location', true);
	$event_form_id 		= get_post_meta($event_id, 'selected_ninja_form_id', true);
	$event_price 			= get_post_meta($event_id, 'event_price', true);
	$featured_img 		= wp_get_attachment_image_src( get_post_thumbnail_id( $event_id ), 'small' );
	$event_state			= get_event_state($event_id);
	$site_url 				= urlencode(get_site_url());

	$img_class = 'no-feat-img';
	if($featured_img[0]){
		$img_class = 'has-feat-img';
	}

	if($event_date_start && $event_date_end):
		$date_formatted = get_single_event_list_formatted_date($event_date_start,$event_date_end);
		$time_formatted = get_single_event_list_formatted_time($event_date_start,$event_date_end);
	endif;
	?>


<div class="event-meta-wrap <?php echo esc_attr($event_state); ?>-event <?php echo esc_attr($event_type); ?> ">

  <div class="square-box">
    <div class="square-content-wrap featured-img">
      <div class="featured-img-container <?php echo esc_attr($img_class); ?>">
        <?php
        if($featured_img[0]){
          echo '<span class="featured-img" style="background-image: url('. esc_url($featured_img[0]) .');"></span>';
        }
        else{

          if($event_type):
            echo '<span class="empty-featured-img">'. get_svg_images_src($event_type) .'</span>';
						if( !is_single()):
								echo '<div class="event-date">'. $date_formatted .'</div>';
						endif;

          endif;

          if($event_state == 'passed'):
            echo '<span class="red-line">'. get_svg_images_src($event_state) .'</span>';

          endif;

        }

         ?>

      </div>
    </div>
  </div>
		<?php
			if($date_formatted):
			echo '<div class="event-date">'. $date_formatted .'</div>';
			endif;

			if($time_formatted):
			echo '<div class="event-time">'. $time_formatted .'</div>';
			endif;

			if($event_price):
			echo '<div class="event-price">'. esc_attr($event_price) .'</div>';
			endif;
		?>

		<div class="grid-2 clearfix">

			<div class="event-location">
        <div class="square-box">
          <div class="square-content-wrap">
            <div class="square-content">
              <span class="location-icon"><a class="open-map" href="#" data-toggle="modal" data-target="#map-dummy"></a></span>
            </div>
          </div>
        </div>
      </div>

			<div class="event-share">
        <div class="square-box">
          <div class="square-content-wrap">
							<div class="square-content main-state">
								<span class="share-icon"></span>
								<div class="square-content hover-state">
										<div class="grid-item share-fb"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $site_url ?>&t=" title="Share on Facebook" target="_blank" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(document.URL) + '&t=' + encodeURIComponent(document.URL)); return false;"><i class="fa fa-facebook"></i></a></div>
										<div class="grid-item share-tw"><a href="https://twitter.com/intent/tweet?source=<?php echo $site_url ?>&text=:%20<?php echo $site_url?>" target="_blank" title="Tweet" onclick="window.open('https://twitter.com/intent/tweet?text=' + encodeURIComponent(document.title) + ':%20'  + encodeURIComponent(document.URL)); return false;"><i class="fa fa-twitter"></i></a></div>
										<div class="grid-item share-ln"><a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo $site_url ?>&title=&summary=&source=<?php echo $site_url?>" target="_blank" title="Share on LinkedIn" onclick="window.open('http://www.linkedin.com/shareArticle?mini=true&url=' + encodeURIComponent(document.URL) + '&title=' +  encodeURIComponent(document.title)); return false;"><i class="fa fa-linkedin"></i></a></div>
										<div class="grid-item share-em"><a href="mailto:?subject=&body=:<?php echo $site_url ?>" target="_blank" title="Email" onclick="window.open('mailto:?subject=' + encodeURIComponent(document.title) + '&body=' +  encodeURIComponent(document.URL)); return false;"><i class="fa fa-envelope-o"></i></a></div>
								</div>
							</div>
          </div>
        </div>
      </div>

		</div><!-- Clearfix-end -->

		<div class="grid-1 form-btn-wrap clearfix">

			<div class="modal-form">
          <?php
					if( is_numeric($event_form_id) && ($event_state == 'active') && (defined('NF_PLUGIN_VERSION')) && shortcode_exists( 'ninja_forms' ) ):
							echo '<div class="buttons">';
								echo '	<a data-toggle="modal" data-target="#participate" data-backdrop="static" data-keyboard="true" class="btn open-form open-form-btn" >'. __('Participate','openlab-txtd') .'</a>';
							echo '</div>';

							echo '<div class="nf-form-container">';
								echo '<div id="participate" class="modal fade nf">';
									echo '<div class="button-wrap clearfix">';
									echo '	<a href="#" class="openlab-close-modal open-form-btn" data-dismiss="modal" aria-hidden="true">
														<span>'. get_svg_images_src('close-icon') .'</span>
													</a>';
									echo '</div>';
									echo '<div class="modal-form-container">';
									//bootstrap Modal
										if( function_exists( 'ninja_forms_display_form' ) ):
											ninja_forms_display_form( $event_form_id );
										endif;
									echo '</div>';
								echo '</div>';
							echo '</div>';
					endif;

					 ?>
      </div>

		</div>

</div>

<?php

//share Buttons
/*
<ul class="share-buttons">
	<li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $site_url?>&t=" title="Share on Facebook" target="_blank" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(document.URL) + '&t=' + encodeURIComponent(document.URL)); return false;"><img src="images/simple_icons/Facebook.png"></a></li>
	<li><a href="https://twitter.com/intent/tweet?source=<?php echo $site_url?>&text=:%20<?php echo $site_url?>" target="_blank" title="Tweet" onclick="window.open('https://twitter.com/intent/tweet?text=' + encodeURIComponent(document.title) + ':%20'  + encodeURIComponent(document.URL)); return false;"><img src="images/simple_icons/Twitter.png"></a></li>
	<li><a href="https://plus.google.com/share?url=<?php echo $site_url?>" target="_blank" title="Share on Google+" onclick="window.open('https://plus.google.com/share?url=' + encodeURIComponent(document.URL)); return false;"><img src="images/simple_icons/Google+.png"></a></li>
	<li><a href="http://pinterest.com/pin/create/button/?url=<?php echo $site_url?>&description=" target="_blank" title="Pin it" onclick="window.open('http://pinterest.com/pin/create/button/?url=' + encodeURIComponent(document.URL) + '&description=' +  encodeURIComponent(document.title)); return false;"><img src="images/simple_icons/Pinterest.png"></a></li>
	<li><a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo $site_url?>&title=&summary=&source=http%3A%2F%2Fopenlab.sirtimid.com" target="_blank" title="Share on LinkedIn" onclick="window.open('http://www.linkedin.com/shareArticle?mini=true&url=' + encodeURIComponent(document.URL) + '&title=' +  encodeURIComponent(document.title)); return false;"><img src="images/simple_icons/LinkedIn.png"></a></li>
	<li><a href="mailto:?subject=&body=:<?php echo $site_url?>" target="_blank" title="Email" onclick="window.open('mailto:?subject=' + encodeURIComponent(document.title) + '&body=' +  encodeURIComponent(document.URL)); return false;"><img src="images/simple_icons/Email.png"></a></li>
</ul>
*/
?>
