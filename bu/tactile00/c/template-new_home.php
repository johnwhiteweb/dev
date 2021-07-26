<?php

/**
 * Template Name: New Home
 */
get_header('new-home');
global $post;
$postID = $post->ID;
?>
<div class="home-page case-study newHome ">
	<!--main div-->
	<?php
	$sections = get_field('sections', $postID);
	//print_r($sections);
	foreach ($sections as $key => $value) {
		#print_r($key);
		//echo "----------------<br />";
	?>
		<?php
		if ($value['type'] == 'Top Banner') {
			//print_r($value);
		?>
			<?php if ($value['top_banner']['top_banner_bg'] !== '') { ?>
				<section class="solution-bg img_section" style="background-image: url('<?php echo $value['top_banner_bg']['image']; ?>');">
					<div class="container align-middle">
						<div class="row">
							<div class="col-lg-12 col-md-12">
								<div class="text-box text-m-left">
									<h1><?php echo $value['top_banner_bg']['heading']; ?></h1>
									<p><?php echo $value['top_banner_bg']['content']; ?></p>

									<div class="wrap-scroll-down"><a href="#about-us" class="btn-scroll-slider page-scroll"></a></div>
								</div>
							</div>

						</div>
				</section>
			<?php
			} ?>
</div>
<?php
		} //if
?>
<?php if ($value['type'] == "trusted by (logos)") {
			$none = 'style="display:none;"';
			$block = 'style="display:block;"';
?>
	<section class="container trusted-section ">
		<div class="container mobile-block row">
			<div class="section-heading col align-middle text-box text-black">
				<h2 class="align-middle  mx-auto title-trust"><?php echo $value['trusted_by']['heading']; ?></h2>
			</div>
			<div class="trusted-slider desktop col-lg-10 init-hide">
				<?php
				foreach ($value['trusted_by']['items'] as $item) {
				?>
					<div class="item">
						<div class="img-box ">
							<img class="img-fluid mx-auto d-block" src="<?php echo $item; ?>" width="200">
						</div>
					</div>
				<?php } // trusted by logos
				?>
			</div>
			<div class="trusted-slider mobile">
				<?php
				$y = 1;
				$total = count($value['trusted_by']['items']);
				foreach ($value['trusted_by']['items'] as $item) {
				?>
					<div class="item">
						<div class="img-box">
							<img class="img-fluid" src="<?php echo $item; ?>">
						</div>
					</div>
				<?php
					$y++;
				}
				?>
			</div>
		</div>
	</section>
<?php } //  if trusted by (logos)
?>
<?php
		if ($value['type'] == 'About us (video)') {
			$x = 1;
			$text = 'text-black';
			if ($value['tactile_data']['background_color'] == 'Blue') {
				$bg = 'style="min-height: 50px; background-image: linear-gradient(to right, #00cbff, #04b3fc);"';
			} else {
				$bg = 'style="min-height: 50px; background-image: linear-gradient(to right, #fb6703, #e53317);"';
			} ?>
	<section class="solution-bg" id="about-us">
		<div class="top-colored container">
			<div class="item row">
				<div class="col-6 our-mission">
					<?php echo $value['about_us']['left_heading']; ?>
				</div>
				<div class="col-6 right_text">
					<p>

						<?php echo strip_tags($value['about_us']['right_heading']); ?>
					</p>
				</div>
			</div>
		</div>
		<div class="top-white text-center">


			<div class="item clearfix">



				<?php if ($value['about_us']['video_type'] == "Local Video" || $value['about_us']['video_type'] == "Youtube Video") {
					$data_type = "youtube";
					$yout_url = $value['about_us']['youtube_video'];
					preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $yout_url, $match);
					$video_id = $match[1];
				?>

					<a class="btn vpop lo" href="#" data-id="" data-autoplay='true'>
						<div class="float-center-text btn vpop lo" id="vidTitle">
							<?php echo $value['about_us']['video_center_title'] ?>
						</div>

						<div>
							<a class="btn vpop lo" href="#" data-type="<?php echo $data_type; ?>" data-id="<?php echo $video_id; ?>" data-autoplay='true'>

								<img id="vid-poster" src="<?php echo $value['about_us']['video_image_poster']; ?>" alt="about us video" />
							</a>

						</div>


					</a>
					<div id="video-popup-overlay"></div>
					<div id="video-popup-container" class="video-popup-container container mx-auto">
						<div id="video-popup-close" class="fade"><span style="color:#fff;">&#10006;</span></div>
						<?php
						if ($value['about_us']['video_type'] == "Local Video") {
						?>

							<div id="video-popup-mp4-container">
								<video autoplay="" muted="" loop="" playsinline="" id="myVideo" poster="<?php echo $value['about_us']['video_image_poster']; ?>">
									<source src="<?php echo $value['about_us']['local_video']; ?>" type="video/mp4">
								</video>
							</div>
						<?php
						} else if ($value['about_us']['video_type'] == "Youtube Video") {

						?>
							<div class="container col-10">

								<div id="video-popup-iframe-container">
									<iframe id="video-popup-iframe" src="" width="800px" height="auto" frameborder="0" allow="autoplay"></iframe>
								</div>

							</div>

						<?php
						}
						?>

					</div>


					<!-- <php } ?> -->

					<!-- <php if ($value['about_us']['video_type'] == "Youtube Video") {
					$data_type = "youtube";
					$yout_url = $value['about_us']['youtube_video'];
					preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $yout_url, $match);
					$video_id = $match[1];
				?>
					<div class=" container col-10 mobile-low-p">
						<iframe width="100%" height="534" data-type="<php echo $data_type; ?>" src="https://www.youtube.com/embed/<php echo $video_id; ?>?rel=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>




					</div>
			</div>
		<?php } ?> -->

			</div>
		</div>

	</section>
<?php } // About us video
?>
<?php
		if ($value['type'] == 'Our solution') {
?>
	<section id="hidden-potential">
		<div class="hidden-potential desktop">
			<div class="container">
				<div class="section-heading">
					<h2 class="our-title our-solution text-center"><?php echo $value['our_solution']['heading']; ?></h2>
				</div>
				<div class="sub-heading text-center">
					<p class="solution-sub"><?php echo $value['our_solution']['sub_heading']; ?></p>
				</div>
				<ul class="row matchHeight">
					<?php
					$i = 1;
					foreach ($value['our_solution']['items'] as $item) {
					?>
						<!-- <li id="box-<php echo $i; ?>" class="box<php echo ($i == 1 ? " current" : ""); ?> col"> -->
						<li id="box-<?php echo $i; ?>" class="box<?php echo ($i == 1 ? "" : ""); ?> col">
							<div class="icon-box">
								<img class="svgClass icon-<?php echo $i; ?>" type="image/svg+xml" src="<?php echo $item['icon']; ?>" />
							</div>
							<div class="text-box match text-center">
								<h5 class="text-center"><?php echo $item['title']; ?></h5>
								<p class="font-weight-bold-item"><?php echo $item['text']; ?></p>
								<h3 class="read-more">Learn More <img src="<?php echo get_template_directory_uri(); ?>/images/chevron-right-icon.png"></h3>
							</div>
						</li>
					<?php
						$i++;
					}
					?>
					<!-- our_solution items read_more_link
	icon icon_hover title text -->
				</ul>
				<?php
				$j = 1;
				$total = count($value['our_solution']['items']);
				$count_type = "";
				if ($total % 2 == 0) {
					$count_type = "even";
				} else {
					$count_type = "odd";
				}
				$half = round($total / 2);
				foreach ($value['our_solution']['items'] as $item) {
				?>
					<?php
					if (($count_type == "odd" && $j < $half) || ($count_type == "even" && $j < ($half + 1))) {
					?>
						<div class="row m-box<?php echo ($j == 1 ? " current" : ""); ?> box-<?php echo $j; ?>">
							<div class="col-md-6">
								<div class="text">
									<p><?php echo $item['slider_text_test']; ?></p>
								</div>
							</div>
							<div class="col-md-6">
								<div class="img-box">
									<img class="img-fluid" src="<?php echo $item['slider_image']; ?>">
								</div>
							</div>
						</div>
					<?php
					} else {
					?>
						<div class="row m-box<?php echo ($j == 1 ? " current" : ""); ?> box-<?php echo $j; ?>">
							<div class="col-md-6">
								<div class="img-box">
									<img class="img-fluid" src="<?php echo $item['slider_image']; ?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="text">
									<p><?php echo $item['slider_text_test']; ?></p>
								</div>
							</div>
						</div>
					<?php
					}
					?>
				<?php
					$j++;
				}
				?>
			</div>
		</div>
		<div class="hidden-potential mobile">
			<div class="container">
				<div class="section-heading">
					<h2><?php echo $value['our_solution']['heading']; ?></h2>
				</div>
				<div class="sub-heading">
					<p><?php echo $value['our_solution']['sub_heading']; ?></p>
				</div>
				<?php
				$p = 1;
				foreach ($value['our_solution']['items'] as $item) {
				?>
					<div class="btn-box" data-toggle="collapsed" data-target="#box-<?php echo $p; ?>" aria-expanded="<?php /*echo ($p==1 ? "true" : "false");*/ ?>false" aria-controls="multiCollapseExample2">
						<div class="img-box">
							<!--<img class="img-fluid" src="<php echo $item['icon']; ?>">-->
							<object class="svgClass icon-<?php echo $p; ?>" type="image/svg+xml" data="<?php echo $item['icon']; ?>"></object>
							<span><?php echo $item['title']; ?></span><i class="fa fa-angle-right"></i>
						</div>
					</div>
					<div id="box-<?php echo $p; ?>" class="row collapsed<?php /*echo ($p==1 ? " show" : "");*/ ?>">
						<div class="col-12">
							<div class="text font-weight-bold">
								<p class="text-center"><?php echo $item['text']; ?></p>
								<a class="btn" href="<?php echo $item['read_more_link']; ?>">
									LEARN MORE
									<img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/images/play-icon.png">
								</a>
							</div>
						</div>
						<div class="col-12">
							<div class="img-box">
								<img class="img-fluid" src="<?php echo $item['slider_image']; ?>">
							</div>
							<div class="text">
								<p><?php echo $item['slider_text_test']; ?></p>
							</div>
						</div>
					</div>
				<?php
					$p++;
				}
				?>
			</div>
		</div>
	</section>
<?php
		} //if
?>
<?php if ($value['type'] == "Our Technology (banner)") { ?>
	<?php if ($value['our_technology']['desktop_image'] !== '') { ?>
		<section class="solution-bg img_section our-technology" style="background-image: url('<?php echo $value['our_technology']['desktop_image']; ?>');">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-md-8">
						<div class="text-box">
							<h2 class="our-title our-solution"><?php echo $value['our_technology']['heading']; ?></h2>
							<div class="tech-text"><?php echo $value['our_technology']['content']; ?></div>
							<a href="<?php echo $value['our_technology']['buttons']['button_url']; ?>">
								<button class="btn orange-btn"><?php echo $value['our_technology']['buttons']['button_text']; ?></button>
							</a>
						</div>
					</div>
				</div>
			</div>
		</section>
	<?php } // if desktop_image
	?>
<?php } // if Our Technology
?>
<?php if ($value['type'] == "tactile data (+numbers)") {
			if ($value['tactile_data']['background_color'] == 'Blue') {
				$bg = 'style="min-height: 50px; background-image: linear-gradient(to right, #00cbff, #04b3fc);"';
			} else {
				$bg = 'style="min-height: 50px; background-image: linear-gradient(to right, #fb6703, #e53317);"';
			} ?>
	<div class="top-colored container-fluid" id="tactile-data" <?= $bg ?>>
		<div class="container b-text text-white text-center ">
			<h4 class="data"><?php echo $value['tactile_data']['heading']; ?></h4>
			<div class="row">
				<div class="col-4">
					<h5 class="text-center numbered">
						<?php if ($value['tactile_data']['select_symbol_1_position'] == 'left' || $value['tactile_data']['select_symbol_1_position'] == 'both') { ?>
							<div class="num left"><?php echo $value['tactile_data']['running_number_1_left_symbol']; ?></div>
						<?php } ?>
						<span class="Counter" data-value="<?php echo $value['tactile_data']['running_number_1']; ?>">
							<?php echo $value['tactile_data']['running_number_1']; ?>
						</span>
						<?php if ($value['tactile_data']['select_symbol_2_position'] == 'right' || $value['tactile_data']['select_symbol_1_position'] == 'both') { ?>
							<div class="num right"><?php echo $value['tactile_data']['running_number_1_right_symbol']; ?></div>
						<?php } ?>
					</h5>
					<p><?php echo $value['tactile_data']['running_number_1_text']; ?></p>
				</div>
				<div class="col-4">
					<h5 class="text-center numbered">
						<?php if ($value['tactile_data']['select_symbol_2_position'] == 'left' || $value['tactile_data']['select_symbol_2_position'] == 'both') { ?>
							<div class="num left"><?php echo $value['tactile_data']['running_number_1_left_symbol']; ?></div>
						<?php } ?>
						<span class="Counter" data-value="<?php echo $value['tactile_data']['running_number_2']; ?>">
							<?php echo $value['tactile_data']['running_number_2']; ?>
						</span>
						<?php if ($value['tactile_data']['select_symbol_2_position'] == 'right' || $value['tactile_data']['select_symbol_2_position'] == 'both') { ?>
							<div class="num right"><?php echo $value['tactile_data']['running_number_2_right_symbol']; ?></div>
						<?php } ?>
					</h5>
					<p><?php echo $value['tactile_data']['running_number_2_text']; ?></p>
				</div>
				<div class="col-4">
					<h5 class="text-center numbered">
						<?php if ($value['tactile_data']['select_symbol_3_position'] == 'left' || $value['tactile_data']['select_symbol_3_position'] == 'both') { ?>
							<div class="num left"><?php echo $value['tactile_data']['running_number_3_left_symbol']; ?></div>
						<?php } ?>
						<span class="Counter" data-value="<?php echo $value['tactile_data']['running_number_3']; ?>">
							<?php echo $value['tactile_data']['running_number_3']; ?>
						</span>
						<?php if ($value['tactile_data']['select_symbol_3_position'] == 'right' || $value['tactile_data']['select_symbol_3_position'] == 'both') { ?>
							<div class="num right"><?php echo $value['tactile_data']['running_number_3_right_symbol']; ?></div>
						<?php } ?>
					</h5>
					<p><?php echo $value['tactile_data']['running_number_3_text']; ?></p>
				</div>
			</div>
		</div>
	</div>
<?php } // tactile data
?>

<?php
		if ($value['type'] == 'Testimonials') {
			$args = array(
				'post_type' => 'testimonials',
				'order'    => 'ASC',
				'post_status' => 'publish',
			);
?>
	<section class="client-section">
		<div class="container">
			<div class="section-heading behind-image">
				<h2 class="text-center"><?php echo $value['testimonials']['heading']; ?></h2>
			</div>
			<div class="client-slider desktop">
				<?php
				$x = 1;
				$testimonials = get_posts($args);
				// foreach ($value['testimonials']['testimonial_choose'] as $item) {
				foreach ($testimonials as $item) {
					//  var_dump($item);
					$post_name  =  $item->post_title;
					$role = get_field('role', $item->ID);
					$testimonial  = get_field('testimonial', $item->ID);
					$testimonial = strip_tags($testimonial);
					strlen($testimonial) >= 250 ? $testimonial = substr($testimonial, 0, strpos($testimonial, ' ', 251)) : null;
					$image  = get_field('image', $item->ID);

					$select_video_type  = get_field('select_video_type', $item->ID);
					$local_video  = get_field('local_video', $item->ID);
					$youtube_video  = get_field('youtube_video', $item->ID);
					$other  = get_field('other', $item->ID);
				?>
					<!-- <php $item['testimonial']->post_title; > -->

					<div class="item clearfix">
						<div class="row">
							<div class="col-md-4">

								<?php if ($select_video_type == 'Select / none') { ?>
									<img class="img-fluid" src="<?php echo $image; ?>" />

								<?php } ?>

								<?php if ($select_video_type == 'Local') { ?>

									<a class="" href="#" data-toggle="modal" data-target="#localVideoLocal-<?= $x; ?>">
										<div class="play_tri"></div>
										<img class="img-fluid" src="<?php echo $image; ?>" />
									</a>
								<?php } ?>

								<?php if ($select_video_type == 'YouTube') { ?>
									<a class="" href="#" data-toggle="modal" data-target="#youtubeVideo-<?= $x; ?>">
										<div class="play_tri"></div>
										<img class="img-fluid" src="<?php echo $image; ?>" />
									</a>
								<?php } ?>

								<?php if ($select_video_type == 'Other / external') { ?>

									<a class="" href="<?= $other ?>" target="_blank">
										<div class="play_tri"></div>
										<img class="img-fluid" src="<?php echo $image; ?>" />
									</a>
								<?php } ?>
							</div>

							<div class="col-md-8">
								<div class="text-box">
									<h5><?php echo $testimonial; ?></h5>
									<div class="title-box box-offset">
										<h4><?php echo $post_name ?></h4>
										<p><?php echo $role; ?></p>
									</div>
								</div>
							</div>

						</div>
					</div>




				<?php $x++;
				} ?>
			</div>
		</div>
		</div>
		<div class="client-slider mobile">
			<?php
			$x = 1;
			$testimonials = get_posts($args);
			// foreach ($value['testimonials']['testimonial_choose'] as $item) {
			foreach ($testimonials as $item) {
				//  var_dump($item);
				$post_name  =  $item->post_title;
				$role = get_field('role', $item->ID);
				$testimonial  = get_field('testimonial', $item->ID);
				$testimonial = strip_tags($testimonial);
				strlen($testimonial) >= 150 ? $testimonial = substr($testimonial, 0, strpos($testimonial, ' ', 150)) : null;
				$image  = get_field('image', $item->ID);
				$select_video_type  = get_field('select_video_type', $item->ID);
				$local_video  = get_field('local_video', $item->ID);
				$youtube_video  = get_field('youtube_video', $item->ID);
				$other  = get_field('other', $item->ID);
			?>
				<!-- <php $item['testimonial']->post_title; > -->
				<div class="item clearfix">
					<div class="">
						<div class="">
							<div class="text-box">
								<h5><?php echo $testimonial; ?></h5>
								<div class="margin-image">

									<?php if ($select_video_type == 'Select / none') { ?>
										<img class="img-fluid" src="<?php echo $image; ?>" width="150" />

									<?php } ?>

									<?php if ($select_video_type == 'Local') { ?>

										<a class="" href="#" data-toggle="modal" data-target="#localVideoLocal-<?= $x; ?>">
											<div class="play_tri"></div>
											<img class="img-fluid" src="<?php echo $image; ?>" />
										</a>
									<?php } ?>

									<?php if ($select_video_type == 'YouTube') { ?>
										<a class="" href="#" data-toggle="modal" data-target="#youtubeVideo-<?= $x; ?>">
											<div class="play_tri"></div>
											<img class="img-fluid" src="<?php echo $image; ?>" />
										</a>
									<?php } ?>

									<?php if ($select_video_type == 'Other / external') { ?>

										<a class="" href="<?= $other ?>" target="_blank">
											<div class="play_tri"></div>
											<img class="img-fluid" src="<?php echo $image; ?>" />
										</a>
									<?php } ?>
								</div>
								<div class="title-box text-center">
									<h4><?php echo $post_name ?></h4>
								</div>
								<p><?php echo $role; ?></p>
							</div>
						</div>
					</div>
				</div>
			<?php $x++;
			} ?>
		</div>
		</div>
		</div>
	</section>
<?php
		} //if
?>
<?php
		if ($value['type'] == 'Select Post') {
			$bg = '';
			$o_1 = '';
			$o_2 = '';
			$text = '';
			$cls = 'automated-pavement';
			if ($value['select_the_post']['post_color'] == 'Blue') {
				$bg = 'style="background-image: linear-gradient(to right, #00cbff, #04b3fc);"';
				$text = 'text-white';
				$o_1 = 'order-md-2'; //reverse order masonry here and below
				$o_2 = 'order-md-1';
			} else {
				$cls = 'ebook';
				$text = 'text-white';
				$bg = 'style="background-image: linear-gradient(to right, #fb6703, #e53317);"';
			}
?>
	<section class="<?= $cls ?>" <?= $bg ?>>
		<div class="container-fluid">
			<div class="row no-gutters ">
				<div class="col-md-1 "></div>
				<div class="col-md-5 <?= $o_1 ?>">
					<div class="text-box <?= $text ?>">
						<?php
						$posts = get_posts($args);
						foreach ($value['select_the_post']['post'] as $item) {
							$text = $item->post_content; // content
							$category = get_the_category($item->ID); // cat name get
							$cat_name = $category[0]->cat_name;
							$link_cat = get_category_link($category[0]->term_id); // cat link get
							$value['select_the_post']['sub_heading'] ? $title = $value['select_the_post']['sub_heading'] :  $title = $item->post_title;
						?>
							<a href="<?php echo $link_cat; ?>">
								<h6><?php echo $cat_name; ?></h6>
							</a>
							<h2><?php echo $title; ?></h2>
							<?php
							$content = $item->post_excerpt;
							if (empty($content) && strlen($content) < 10) {
								$content = strip_tags($text);
								$content = substr($content, 0, strpos($content, ' ', 400));
							}
							?>
							<p><?php echo $content; ?>...</p>
							<!-- <a href="<php echo $link; ?>"> -->
							<a class="btn" href="<?php echo $item->guid; ?>">
								Learn More <img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>\new_home\14-chevron-right.png"></a>
					</div>
				</div>
				<?php
							$image = wp_get_attachment_image_src(get_post_thumbnail_id($value['select_the_post'][0]->ID), 'single-post-thumbnail');
							$image = $image[0];
							//  print_r($value['select_the_post']['big_image']);
				?>
				<div class="col-md-6 <?= $o_2 ?>">
					<img class="img-fluid" src="<?php echo $value['select_the_post']['big_image']; ?>">
				</div>
			</div>
		</div>
	</section>
<?php } //if
?>
<?php } //if
?>
<?php if ($value['type'] == "Awards") { ?>
	<section class="container trusted-section awards-section">
		<div class="container ">
			<h2 class="center-text mx-auto text-center"><?php echo $value['awards']['heading']; ?></h2>
			<div class="trusted-slider desktop ">
				<?php
				?>
				<?php
				foreach ($value['awards']['images'] as $item) {
				?>
					<div class="item">
						<div class="img-box ">
							<a href="<?php echo $item['image_link']; ?>">
								<img class="img-fluid mx-auto d-block" src="<?php echo $item['image']; ?>" width="200">
								<h5><?php echo $item['awards_name']; ?></h5>

							</a>

						</div>
					</div>
				<?php } // images
				?>
			</div>
			<div class="mobile-awards mx-auto ">
				<?php
				?>
				<?php
				foreach ($value['awards']['images'] as $item) {
				?>
					<div class="img-box">
						<a href="<?php echo $item['image_link']; ?>">
							<img class="" src="<?php echo $item['image']; ?>" width="100">
						</a>
					</div>
				<?php } // images
				?>
			</div>
			<div class="center-text mx-auto text-center awards-sub"><?php echo $value['awards']['text']; ?></div>

		</div>
	</section>
<?php } //awards
?>
<?php
		if ($value['type'] == 'Request A Demo') {
			//print_r($value);
?>
	<section class="request-demo" style="background-image: url('<?php echo $value['request_a_demo']['background_image']; ?>');">
		<div class="text-box">
			<h2><?php echo $value['request_a_demo']['heading']; ?></h2>
			<button class="btn req-but" data-toggle="modal" data-target="#exampleModal"><?php echo $value['request_a_demo']['button_text']; ?></button>
		</div>

	</section>
<?php
		} //if
?>
<?php 	} //  foreach
?>
</div>
<!--main div end-->


<script>
	jQuery(document).ready(function($) {


		$("#video-popup-close, #video-popup-overlay").on('click', function(e) {
			$("#video-popup-iframe-container,#video-popup-container,#video-popup-close,#video-popup-overlay,#video-popup-testimonials1,#video-popup-testimonials2,#video-popup-testimonials3,#video-popup-testimonials4,#video-popup-testimonials5,#video-popup-testimonials6").hide();
			$("#video-popup-iframe").attr('src', '');
			$("#myVideo").trigger('play');
			// $("#myVideo").play();
		});


		$('ul li').click(function() {
			$('.current').removeClass('current');
			$(this).addClass('current');
		});


		$(".vpop").on('click', function(e) {
			setTimeout(() => {}, 0);
			e.preventDefault();

			$("#video-popup-overlay,#video-popup-iframe-container,#video-popup-container,#video-popup-close").show();

			var srchref = '',
				autoplay = '',
				id = $(this).data('id');
			console.log(id);
			if ($(this).data('type') == 'vimeo') var srchref = "//player.vimeo.com/video/";
			else if ($(this).data('type') == 'youtube') var srchref = "https://www.youtube.com/embed/";

			if ($(this).data('autoplay') == true) autoplay = '?enablejsapi=1&autoplay=1';


			// $("#video-popup-iframe").attr('src', srchref + id + autoplay + '&origin=https://dev.hostests.com/tactilemobility');
			$("#video-popup-iframe").attr('src', srchref + id + autoplay);

			$("#myVideo").trigger('pause');
			$("#video-popup-iframe").on('load', function() {
				$("#video-popup-container").show();

			});
		});

		$('.client-slider').slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			dots: true,
			infinite: true,
			loop: true,
			arrows: true,
			autoplay: true,
			autoplaySpeed: 2000,
		});



		$('.trusted-slider').slick({
			slidesToShow: 4,
			slidesToScroll: 1,
			//dots: true,
			infinite: true,
			loop: true,
			arrows: true,
			autoplay: true,
			autoplaySpeed: 2000,
			centerPadding: '50px',
			responsive: [{
					breakpoint: 996,
					settings: {
						slidesToShow: 4,
						slidesToScroll: 1,
						infinite: true,
						loop: true,
						arrows: false,
						adaptiveHeight: true,
						centerPadding: '20px',
					}
				},
				// You can unslick at a given breakpoint now by adding:
				// settings: "unslick"
				// instead of a settings object
			]
		});

		$('.trusted-slider .item').css('opacity', 1);

		$(".m-box").hide();
		$(".current").show();
		$("#box-1").click(function() {
			var box_class = $(this).attr('id');
			//alert(box_class);
			$(".m-box").hide();
			$("." + box_class).show();
		});
		$("#box-2").click(function() {
			var box_class = $(this).attr('id');
			//alert(box_class);
			$(".m-box").hide();
			$("." + box_class).show();
		});
		$("#box-3").click(function() {
			var box_class = $(this).attr('id');
			//alert(box_class);
			$(".m-box").hide();
			$("." + box_class).show();
		});
		$("#box-4").click(function() {
			var box_class = $(this).attr('id');
			//alert(box_class);
			$(".m-box").hide();
			$("." + box_class).show();
		});
		$("#box-5").click(function() {
			var box_class = $(this).attr('id');
			//alert(box_class);
			$(".m-box").hide();
			$("." + box_class).show();
		});
		$('a.page-scroll').on('click', function(e) {
			var anchor = $(this);
			$('html, body').stop().animate({
				scrollTop: $(anchor.attr('href')).offset().top - 100
			}, 1000);
			e.preventDefault();
		});

		$(window).scroll(function() {
			var tophead = $('header');
			if ($(this).scrollTop() > 200) {
				tophead.addClass('fixed');
			} else {
				tophead.removeClass('fixed');
			}
		});
		var counterTeaserL = $('#tactile-data');
		var winHeight = $(window).height();
		// getAttribute("data-value");
		if (counterTeaserL.length) {
			var firEvent = false,
				objectPosTop = $('#tactile-data').offset().top;
			var elementViewInBottom = objectPosTop - winHeight;
			$(window).on('scroll', function() {
				var currentPosition = $(document).scrollTop();
				if (currentPosition > elementViewInBottom && firEvent === false) {
					firEvent = true;
					animationCounter();
				}
			});
		}

		function animationCounter() {
			$('.Counter').each(function() {
				$(this).prop('Counter', 0).animate({
					Counter: $(this).text()
				}, {
					duration: 1000,
					easing: 'linear',
					step: function(now) {
						$(this).text(Math.ceil(now));
					},
					complete: function() {
						$n = +$(this).text();
						if ($n >= 1000) {
							// console.log($n.toLocaleString());
							return $(this).text($n.toLocaleString())
						}
					}
				});
			});
		}
	});
</script>
<style>
	h2.our-title.our-solution {
		font-size: 20px;
	}

	.slick-list {
		max-height: 290px;
		position: relative;
		margin: 0 30px;
		left: 20px;
		overflow-y: hidden;

	}

	.slick-prev::before,
	.slick-next::before {
		content: "";
		background-image: url(<?php echo get_template_directory_uri(); ?>/new_home/14-chevron-right.png);
		top: 16px;
		background-repeat: no-repeat;
		width: 40px;
		height: 40px;
		position: absolute;
	}

	.slick-prev::before {
		transform: rotateY(180deg);
	}

	.slick-prev,
	.slick-next {
		top: 40%;
	}
</style>


<?php
get_footer('new');
?>