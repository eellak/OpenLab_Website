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
	$permalink 				= get_post_permalink();

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
    <div class="square-content-wrap featured-img" <?php if($featured_img[0]): echo 'style="background-image: url('. esc_url($featured_img[0]) .')"'; endif; ?> >
      <div class="featured-img-container <?php echo esc_attr($img_class); ?>">

				<a href="<?php echo esc_url($permalink); ?>" class="link-mask">
					<span class="icon-mask <?php echo esc_attr($event_state); ?>-event <?php echo esc_attr($event_type); ?>"></span>
				</a>
				<?php

				if($date_formatted):
				echo '<div class="event-date">'. $date_formatted .'</div>';
				endif;
         ?>
      </div>
    </div>
  </div>

</div>
