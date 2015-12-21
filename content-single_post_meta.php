	<?php
	//get available meta fields
	$post_id 				= get_the_ID();
	$theme_path     = get_template_directory_uri();

	$featured_img 		= wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'small' );
	$site_url 				= urlencode(get_site_url());

	$img_class = 'no-feat-img';
	if($featured_img[0]){
		$img_class = 'has-feat-img';
	}

	$formatted_post_date = get_the_date('j M Y');
	$formatted_post_date = str_replace(" ", "<br>", $formatted_post_date);

	?>


<div class="post-meta-wrap">

  <div class="square-box">
    <div class="square-content-wrap featured-img">
      <div class="featured-img-container <?php echo esc_attr($img_class); ?>">
        <?php
        if($featured_img[0]){
          echo '<span class="featured-img" style="background-image: url('. esc_url($featured_img[0]) .');"></span>';
        }

         ?>
      </div>
    </div>
  </div>

		<div class="grid-2 clearfix">

			<div class="post-date">
        <div class="square-box">
          <div class="square-content-wrap">
            <div class="square-content">
              <span><?php echo $formatted_post_date; ?></span>
            </div>
          </div>
        </div>
      </div>

			<div class="post-share">
        <div class="square-box">
          <div class="square-content-wrap">
						<span class="main-state"></span>
						<div class="square-content hover-state">
								<div class="grid-item share-fb"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $site_url ?>&t=" title="Share on Facebook" target="_blank" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(document.URL) + '&t=' + encodeURIComponent(document.URL)); return false;"><i class="fa fa-facebook"></i></a></div>
							  <div class="grid-item share-tw"><a href="https://twitter.com/intent/tweet?source=<?php echo $site_url ?>&text=:%20<?php echo $site_url?>" target="_blank" title="Tweet" onclick="window.open('https://twitter.com/intent/tweet?text=' + encodeURIComponent(document.title) + ':%20'  + encodeURIComponent(document.URL)); return false;"><i class="fa fa-twitter"></i></a></div>
							  <div class="grid-item share-ln"><a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo $site_url ?>&title=&summary=&source=<?php echo $site_url?>" target="_blank" title="Share on LinkedIn" onclick="window.open('http://www.linkedin.com/shareArticle?mini=true&url=' + encodeURIComponent(document.URL) + '&title=' +  encodeURIComponent(document.title)); return false;"><i class="fa fa-linkedin"></i></a></div>
							  <div class="grid-item share-em"><a href="mailto:?subject=&body=:<?php echo $site_url ?>" target="_blank" title="Email" onclick="window.open('mailto:?subject=' + encodeURIComponent(document.title) + '&body=' +  encodeURIComponent(document.URL)); return false;"><i class="fa fa-envelope-o"></i></a></div>
						</div>
          </div>
        </div>
      </div>

		</div><!-- Clearfix-end -->


</div>
