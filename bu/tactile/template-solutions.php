<?php

/**
 * Template Name: Solutions 
 */

get_header('new');
global $post;
$postID = $post->ID;

?>
<div class="solution-page case-study">
	<!--main div-->

	<?php
	$sections = get_field('sections', $postID);
	//print_r($sections);

	foreach ($sections as $key => $value) {
		//print_r($key);
		//echo "----------------<br />";
		//print_r($value);

		if ($value['type'] == 'Full Banner') {
			//print_r($value);
	?>

			<?php if ($value['top_banner']['background_type'] == "Image Background") { ?>
				<section class="solution-bg img_section" style="background-image: url('<?php echo $value['top_banner']['desktop_image']; ?>');">
					<div class="container">
						<div class="row">
							<div class="col-lg-5 col-md-7">
								<div class="text-box">
									<h1><?php echo $value['top_banner']['heading']; ?></h1>
									<p><?php echo $value['top_banner']['content']; ?></p>

									<?php if ($value['top_banner']['buttons']['button_type'] == "URL") { ?>
										<a class="btn" href="<?php echo $value['top_banner']['buttons']['button_url']; ?>"><img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/images/play-icon.png"><?php echo $value['top_banner']['buttons']['button_text']; ?></a>
									<?php
									} else {
										$video_id = '';
										$data_type = "";
										if ($value['top_banner']['buttons']['button_type'] == "Youtube Video") {
											$data_type = "youtube";
											$yout_url = $value['top_banner']['buttons']['button_youtube_video'];
											preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $yout_url, $match);
											$video_id = $match[1];
										} elseif ($value['top_banner']['buttons']['button_type'] == "Vimeo Video") {
											$data_type = "vimeo";

											$vimeo_url = $value['top_banner']['buttons']['button_vimeo_video'];
											$video_id = substr(parse_url($vimeo_url, PHP_URL_PATH), 1);
										}
									?>

										<?php if ($value['top_banner']['buttons']['button_text']) { ?>
											<a class="btn vpop hi" href="#" data-type="<?php echo $data_type; ?>" data-id="<?php echo $video_id; ?>" data-autoplay='true'>
												<img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/images/play-icon.png"><?php echo $value['top_banner']['buttons']['button_text']; ?></a>
										<?php } ?>
									<?php } ?>
								</div>
							</div>
							<div class="col-lg-7 col-md-5">
								<div class="img-box">
									<img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/images/combined-shape.png">
								</div>
							</div>
						</div>
						<div class="wrap-scroll-down"><a href="#hidden-potential" class="btn-scroll-slider page-scroll"></a></div>
					</div>
				</section>

			<?php
			} else if ($value['top_banner']['background_type'] == "Video Background") {


			?>

				<section class="solution-bg video_section">
					<div class="video_container">
						<video autoplay="" muted="" loop="" playsinline="" id="myVideo" poster="<?php echo $value['top_banner']['video_image_poster']; ?>">
							<source src="<?php echo $value['top_banner']['desktop_video']; ?>" type="video/mp4">
						</video>
						<div class="text-box">
							<h1><?php echo $value['top_banner']['heading']; ?></h1>
							<p><?php echo $value['top_banner']['content']; ?></p>

							<?php if ($value['top_banner']['buttons']['button_type'] == "URL") { ?>
								<a class="btn" href="<?php echo $value['top_banner']['buttons']['button_url']; ?>"><img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/images/play-icon.png"><?php echo $value['top_banner']['buttons']['button_text']; ?></a>
							<?php
							} else {
								$video_id = '';
								$data_type = "";
								if ($value['top_banner']['buttons']['button_type'] == "Youtube Video") {
									$data_type = "youtube";
									$yout_url = $value['top_banner']['buttons']['button_youtube_video'];
									preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $yout_url, $match);
									$video_id = $match[1];
								} elseif ($value['top_banner']['buttons']['button_type'] == "Vimeo Video") {
									$data_type = "vimeo";

									$vimeo_url = $value['top_banner']['buttons']['button_vimeo_video'];
									$video_id = substr(parse_url($vimeo_url, PHP_URL_PATH), 1);
								}

							?>

								<?php if ($value['top_banner']['buttons']['button_text']) { ?>
									<a class="btn vpop lo" href="#" data-type="<?php echo $data_type; ?>" data-id="<?php echo $video_id; ?>" data-autoplay='true'><img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/images/play-icon.png"><?php echo $value['top_banner']['buttons']['button_text']; ?></a>
								<?php } ?>


							<?php } ?>
						</div>
					</div>
					<div class="wrap-scroll-down"><a href="#hidden-potential" class="btn-scroll-slider page-scroll"></a></div>
				</section>
			<?php } ?>

			<div id="video-popup-overlay"></div>
			<div id="video-popup-container" class="video-popup-container">
				<div id="video-popup-close" class="fade"><span style="color:#fff;">&#10006;</span></div>
				<?php
				if ($value['top_banner']['buttons']['button_type'] == "Local Video") {
				?>
					<div id="video-popup-mp4-container">
						<video autoplay="" muted="" loop="" playsinline="" id="myVideo">
							<source src="<?php echo $value['top_banner']['buttons']['button_video']; ?>" type="video/mp4">
						</video>
					</div>
				<?php
				} else if ($value['top_banner']['buttons']['button_type'] == "Youtube Video" || $value['top_banner']['buttons']['button_type'] == "Vimeo Video") {
				?>

					<div id="video-popup-iframe-container">
						<iframe id="video-popup-iframe" src="" width="800px" height="auto" frameborder="0" allow="autoplay"></iframe>
					</div>
				<?php
				}
				?>

			</div>


		<?php
		} //if
		?>


		<?php
		if ($value['type'] == 'Unlock Hidden Potential') {
		?>
			<section id="hidden-potential">

				<div class="hidden-potential desktop">
					<div class="container">
						<div class="section-heading">
							<h2><?php echo $value['unlock_hidden_potential']['heading']; ?></h2>
						</div>
						<div class="sub-heading">
							<p><?php echo $value['unlock_hidden_potential']['sub_heading']; ?></p>
						</div>
						<ul class="row matchHeight">
							<?php
							$i = 1;
							foreach ($value['unlock_hidden_potential']['items'] as $item) {
							?>
								<li id="box-<?php echo $i; ?>" class="box<?php echo ($i == 1 ? " current" : ""); ?> col">
									<div class="icon-box">
										<img class="svgClass icon-<?php echo $i; ?>" type="image/svg+xml" src="<?php echo $item['icon']; ?>" />
									</div>
									<div class="text-box match">
										<h5><?php echo $item['title']; ?></h5>
										<p class="font-weight-bold-item"><?php echo $item['text']; ?></p>
									</div>
								</li>

							<?php
								$i++;
							}
							?>

						</ul>

						<?php
						$j = 1;
						$total = count($value['unlock_hidden_potential']['items']);
						$count_type = "";
						if ($total % 2 == 0) {
							$count_type = "even";
						} else {
							$count_type = "odd";
						}
						$half = round($total / 2);
						foreach ($value['unlock_hidden_potential']['items'] as $item) {
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
							<h2><?php echo $value['unlock_hidden_potential']['heading']; ?></h2>
						</div>
						<div class="sub-heading">
							<p><?php echo $value['unlock_hidden_potential']['sub_heading']; ?></p>
						</div>

						<?php
						$p = 1;


						foreach ($value['unlock_hidden_potential']['items'] as $item) {
						?>

							<div class="btn-box" data-toggle="collapse" data-target="#box-<?php echo $p; ?>" aria-expanded="<?php /*echo ($p==1 ? "true" : "false");*/ ?>false" aria-controls="multiCollapseExample2">
								<div class="img-box">
									<!--<img class="img-fluid" src="<?php echo $item['icon']; ?>">-->
									<object class="svgClass icon-<?php echo $p; ?>" type="image/svg+xml" data="<?php echo $item['icon']; ?>"></object>
									<span><?php echo $item['title']; ?></span><i class="fa fa-angle-right"></i>
								</div>
							</div>

							<div id="box-<?php echo $p; ?>" class="row collapse<?php /*echo ($p==1 ? " show" : "");*/ ?>">
								<div class="col-12">
									<div class="text font-weight-bold">
										<p><?php echo $item['text']; ?></p>
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


		<?php
		if ($value['type'] == 'Select Post') {

			//print_r($value);
			$bg = '';
			$o_1 = '';
			$o_2 = '';
			$text = '';
			$cls = 'automated-pavement';
			if ($value['select_the_post']['post_color'] == 'Blue') {
				$bg = 'style="background-image: linear-gradient(to right, #00cbff, #04b3fc);"';
				$o_1 = 'order-md-2';
				$o_2 = 'order-md-1';
				$text = 'text-black';
				$cls = 'ebook';
			}

		?>
			<section class="ebook" <?= $bg ?>>
				<div class="container-fluid">
					<div class="row no-gutters">
						<div class="col-md-6 <?= $o_1 ?>">
							<div class="text-box <?= $text ?>">
								<?php
								$c_cat = get_the_category($value['select_the_post']['case_studies'][0]->ID);

								?>
								<a href="<?php echo get_category_link($c_cat[0]->term_id ?? ''); ?>">
									<h6><?php echo $c_cat[0]->name ?? ''; ?></h6>
								</a>
								<h2><?php echo $value['select_the_post']['case_studies'][0]->post_title; ?></h2>
								<?php
								$content = $value['select_the_post']['case_studies'][0]->post_excerpt;

								if (empty($content) && strlen($content) < 10) {
									$content = strip_tags($value['select_the_post']['case_studies'][0]->post_content);
									$content = substr($content, 0, strpos($content, ' ', 270));
								}


								?>
								<p><?php echo $content; ?>...</p>

								<a class="btn" href="<?php echo get_the_permalink($value['select_the_post']['case_studies'][0]->ID); ?>">
									Learn More <img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/images/chevron-right-icon.png"></a>
							</div>
						</div>
						<?php
						$image = wp_get_attachment_image_src(get_post_thumbnail_id($value['select_the_post']['case_studies'][0]->ID), 'single-post-thumbnail');
						$image = $image[0];
						?>
						<div class="col-md-6 <?= $o_2 ?>">
							<img class="img-fluid" src="<?php echo $image; ?>">
						</div>
					</div>
				</div>
			</section>

		<?php
		} //if
		?>


		<?php
		/*	
	if($value['type'] == 'Case Studies'){
	?>

	<section class="automated-pavement">
	<div class="container-fluid">
	  <div class="row no-gutters">
	  <div class="col-md-6">
		<div class="text-box">
		  <?php
		  $c_cat = get_the_category( $value['case_studies'][0]->ID );
		  ?>
		<a href="<?php echo get_category_link($c_cat[0]->term_id); ?>"><h6>Case studies</h6></a>
		<h2><?php echo $value['case_studies'][0]->post_title; ?></h2>
		<?php 
		//$content=strpos($item->post_content, ' ', 100);
		$content = strip_tags($value['case_studies'][0]->post_content);
		
		$content = substr($content, 0, 200);
		?>
		<p><?php echo $content; ?>...</p>
		
		<a class="btn" href="<?php echo get_the_permalink($value['case_studies'][0]->ID); ?>">Learn More <img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/images/chevron-right.png"></a>
		</div>
	   </div>
	   <?php 
		$image = wp_get_attachment_image_src( get_post_thumbnail_id( $value['case_studies'][0]->ID ), 'single-post-thumbnail' );
		$image = $image[0];
		?>
	   <div class="col-md-6">
		 <img class="img-fluid" src="<?php echo $image; ?>">
	   </div>
	  </div>
	</div>
	</section> 
	<?php
		}//if
		*/
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
					<div class="section-heading">
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
			</section>

		<?php
		} //if
		?>

		<?php
		if ($value['type'] == 'Partners') {
			//print_r($value);

		?>
			<section class="partners-section">
				<div class="container">
					<div class="section-heading">
						<h2><?php echo $value['partners']['heading']; ?></h2>
					</div>
					<div class="partners-slider desktop">
						<?php
						foreach ($value['partners']['items'] as $item) {

						?>
							<div class="item">
								<div class="img-box">
									<img class="img-fluid" src="<?php echo $item; ?>">
								</div>
							</div>

						<?php
						}

						?>


					</div>
					<div class="partners-slider mobile">

						<?php
						$y = 1;
						$total = count($value['partners']['items']);
						foreach ($value['partners']['items'] as $item) {
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
		<?php
		} //if
		?>



		<?php
		if ($value['type'] == 'Steps') {
			//print_r($value);
		?>

			<section class="as-easy-as">
				<div class="container">
					<div class="section-heading">
						<h2><?php echo $value['steps']['heading']; ?></h2>
					</div>
					<div class="row">
						<?php
						$k = 1;
						foreach ($value['steps']['items'] as $item) {

						?>
							<div class="col-md-4 text-center">
								<?php if ($item['image']) { ?>
									<div class="img-box">
										<img class="img-fluid" src="<?php echo $item['image']; ?>" alt="">
									</div>
								<?php } else { ?>
									<div class="num-box">
										<h3><?php echo $item['number']; ?></h3>
									</div>
								<?php } ?>
								<div class="text-box ">
									<h2><?php echo $item['title']; ?></h2>
									<p><?php echo $item['text']; ?></p>
								</div>
							</div>

						<?php
							$k++;
						}
						?>

					</div>
				</div>
			</section>
		<?php
		} //if
		?>


		<?php
		/*
	if($value['type'] == 'E-Book'){
		//print_r($value);
	?>

	<section class="ebook">
	  <div class="container-fluid">
		<div class="row no-gutters">
		  <div class="col-md-6">
		  <?php 
			$image = wp_get_attachment_image_src( get_post_thumbnail_id( $value['e-book'][0]->ID ), 'single-post-thumbnail' );
			$image = $image[0];
			?>
			<img class="img-fluid" src="<?php echo $image; ?>">
		  </div>
		  <div class="col-md-6">
			<div class="text-box">
			<?php
			  $e_cat = get_the_category( $value['e-book'][0]->ID );
			  ?>
			  <a href="<?php echo get_category_link($e_cat[0]->term_id); ?>"><h6>E-BOOK</h6></a>
			  <h2><?php echo $value['e-book'][0]->post_title; ?></h2>
				<?php 
				//$content=strpos($item->post_content, ' ', 100);
				$content = strip_tags($value['e-book'][0]->post_content);
				$content = trim($content);

				$content = substr($content, 0, 200);
				?>
				<p><?php echo $content; ?>...</p>
			  <a class="btn" href="<?php echo get_the_permalink($value['e-book'][0]->ID); ?>">Download the eBook <img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/images/chevron-right-white.png"></a>
			</div>
		  </div>
		</div>
	  </div>
	</section>
	<?php
		}//if
		*/
		?>



		<?php
		if ($value['type'] == 'Request A Demo') {
			//print_r($value);
		?>

			<section class="request-demo" style="background-image: url('<?php echo $value['request_a_demo']['background_image']; ?>');">
				<div class="text-box">
					<h2><?php echo $value['request_a_demo']['heading']; ?></h2>
					<button class="btn" data-toggle="modal" data-target="#exampleModal"><?php echo $value['request_a_demo']['button_text']; ?></button>
				</div>

			</section>

		<?php
		} //if
		?>


		<?php
		if ($value['type'] == 'Blog') {
			//print_r($value);
		?>

			<div class="you-may-like case-studies">
				<div class="container">
					<div class="section-heading">
						<h2>Thought Leadership & Latest Updates</h2>
					</div>
					<div class="row">
						<?php
						$l = 1;
						foreach ($value['blog'] as $item) {

						?>
							<div class="col-md-4">
								<div class="box">
									<a href="<?php echo get_the_permalink($item->ID); ?>">
										<?php
										$image = wp_get_attachment_image_src(get_post_thumbnail_id($item->ID), 'single-post-thumbnail');
										$image = $image[0];
										?>
										<div class="img-box"><img class="img-fluid" src="<?php echo $image; ?>"></div>
										<div class="text-box">
											<h5><?php echo $item->post_title; ?></h5>
											<span class="date"><?php echo date('M d, Y', strtotime($item->post_date)); ?></span>
											<?php
											//$content=strpos($item->post_content, ' ', 100);
											$content = strip_tags($item->post_content);
											$content = trim($content);
											$content = substr($content, 0, 50);

											?>
											<p><?php echo $content; ?>...</p>
											<h3 class="read-more">Read More <img src="<?php echo get_template_directory_uri(); ?>/images/chevron-right-icon.png"></h3>
										</div>
									</a>
									<?php
									$postcat = get_the_category($item->ID);
									?>
									<a class="sticker" href="<?php echo get_category_link($postcat[0]->term_id); ?>"><span class="<?php echo get_the_category($item->ID)[0]->slug; ?>"><?php echo get_the_category($item->ID)[0]->name; ?></span></a>
								</div>
							</div>

						<?php
							$l++;
						}
						?>

					</div>
				</div>
			</div>
		<?php
		} //if
		?>


	<?php

	} //for main sections

	?>

	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog main-site">
			<div class="modal-content main-box">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<h2 class="heading">Unlock Your Hidden Road Potential</h2>
					<p class="sub-heading">Fill out the form and we will be in touch with you shortly</p>
					<!--<form>
          
            <div class="row">
                <div class="col-sm-6">
                <div class="form-group floating-label-group">
                <input class="form-control" placeholder="" autocomplete="off" required="" type="text">
                <label class="floating-label">First Name</label>
                </div>
                </div>                         
                <div class="col-sm-6">
                <div class="form-group floating-label-group">
                <input class="form-control" placeholder="" autocomplete="off" required="" type="text">
                <label class="floating-label">Last Name</label>
                </div>
                </div>                         
                <div class="col-sm-6">
                <div class="form-group floating-label-group">
                <input class="form-control border-bottm" placeholder="" autocomplete="off" required="" type="text">
                <label class="floating-label">company Email</label>
                </div>
                </div>                         
                <div class="col-sm-6">
                <div class="form-group floating-label-group">
                <input class="form-control border-bottm" placeholder="" autocomplete="off" required="" type="text">
                <label class="floating-label">company name</label>
                </div>
                </div>  
                <div class="col-sm-6">
                  <div class="form-group floating-label-group">
                  <input class="form-control border-bottm" placeholder="" autocomplete="off" required="" type="text">
                  <label class="floating-label">Phone number</label>
                  </div>
                </div>     
                <div class="col-sm-6">
                    <div class="form-group floating-label-group icon">
                      <select class="custom-select">
                        <option selected>job title</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                      </select>
                    <label class="floating-label"></label>
                    </div>
                </div>     
                <div class="col-sm-6">
                     <div class="form-group floating-label-group icon">
                       <select class="custom-select" >
                         <option selected>contry</option>
                         <option value="1">One</option>
                         <option value="2">Two</option>
                         <option value="3">Three</option>
                       </select>
                     </div>
                </div>     
                <div class="col-sm-6">
                     <button class="btn">REQUEST A DEMO</button>
                </div>
				
            </div>
        </form>-->
					<?php
					/*Contact form 7 remove span*/
					add_filter('wpcf7_form_elements', function ($content) {
						$content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);

						$content = str_replace('<br />', '', $content);

						return $content;
					});

					echo do_shortcode('[contact-form-7 id="3579" title="Request A Demo"]');

					?>
				</div>
			</div>
		</div>
	</div>

</div>
<!--main div end-->

<script>
	jQuery(document).ready(function($) {



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


		$('.partners-slider').slick({
			slidesToShow: 4,
			slidesToScroll: 1,
			//dots: true,
			infinite: true,
			loop: true,
			arrows: true,
			autoplay: true,
			autoplaySpeed: 2000,
			responsive: [{
					breakpoint: 768,
					settings: {
						slidesToShow: 2,
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





		$("#video-popup-close, #video-popup-overlay").on('click', function(e) {
			$("#video-popup-iframe-container,#video-popup-container,#video-popup-close,#video-popup-overlay,#video-popup-testimonials1,#video-popup-testimonials2,#video-popup-testimonials3,#video-popup-testimonials4,#video-popup-testimonials5,#video-popup-testimonials6").hide();
			$("#video-popup-iframe").attr('src', '');
			$("#myVideo").trigger('play');
		});


		$('ul li').click(function() {
			$('.current').removeClass('current');
			$(this).addClass('current');
		});


		$(".vpop").on('click', function(e) {
			e.preventDefault();
			$("#video-popup-overlay,#video-popup-iframe-container,#video-popup-container,#video-popup-close").show();

			var srchref = '',
				autoplay = '',
				id = $(this).data('id');
			if ($(this).data('type') == 'vimeo') var srchref = "//player.vimeo.com/video/";
			else if ($(this).data('type') == 'youtube') var srchref = "https://www.youtube.com/embed/";

			if ($(this).data('autoplay') == true) autoplay = '?enablejsapi=1&autoplay=1';


			$("#video-popup-iframe").attr('src', srchref + id + autoplay);

			$("#myVideo").trigger('pause');
			$("#video-popup-iframe").on('load', function() {
				$("#video-popup-container").show();

			});
		});




		//alert("hiiiii");

		$(function() {
			$('.popup-youtube, .popup-vimeo').magnificPopup({
				disableOn: 700,
				type: 'iframe',
				mainClass: 'mfp-fade',
				removalDelay: 160,
				preloader: false,
				fixedContentPos: false
			});
		});

		quadBoxHeight = 0;
		titleHeight = 0;

		$('.match h5').each(function() {
			console.log($(this).height());
			titleHeight < $(this).height() ? titleHeight = $(this).height() : null
		});
		$('.match h5').css("height", titleHeight, "px");

		$('.matchHeight .font-weight-bold-item').each(function() {
			quadBoxHeight < $(this).height() ? quadBoxHeight = $(this).height() : null
		});
		$('.matchHeight .font-weight-bold-item').css("height", quadBoxHeight, "px");



		//   console.log($('.font-weight-bold-item').height());



		$('input.form-control').focus(function() {
			$(this).parent('.form-group').addClass('active-lable');
		}).focusout(function() {
			if ($(this).val() == "") {
				$(this).parent('.form-group').removeClass('active-lable');
			}
		});

		(function($) {
			$.fn.writeText = function(content) {
				var contentArray = content.split(""),
					current = 0,
					elem = this;
				setInterval(function() {
					if (current < contentArray.length) {
						elem.text(elem.text() + contentArray[current++]);
					}
				}, 100);
			};

		})(jQuery);

		var heading = $(".solution-bg").find("h1");
		var heading_txt = $(heading).text();
		$(heading).text("");
		$(heading).writeText(heading_txt);


		//document.querySelector(".svgClass").getSVGDocument().getElementById("svgInternalID").setAttribute("fill", "#ffffff")






	});
</script>

<?php

get_footer('new');

?>