<?php

/**
 * Template Name: New Home
 */

get_header('new-home');
global $post;
$postID = $post->ID;
?>

<div class="home-page case-study solution-page">
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
							<div class="col-lg-10 col-md-10">
								<div class="text-box">

									<h1><?php echo $value['top_banner_bg']['heading']; ?></h1>
									<p><?php echo $value['top_banner_bg']['content']; ?></p>
								</div>
							</div>
							<div class="col-lg-7 col-md-5">
								<div class="img-box">

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


<?php if ($value['type'] == "trusted by (logos)") { ?>

	<section class="container trusted-section ">
		<div class="container row">
			<div class="section-heading col-2 align-middle text-box text-black">
				<h2 class="align-middle"><?php echo $value['trusted_by']['heading']; ?></h2>
			</div>
			<div class="trusted-slider desktop col-10">
				<?php
				foreach ($value['trusted_by']['items'] as $item) {

				?>
					<div class="item">
						<div class="img-box ">
							<img class="img-fluid mx-auto d-block" src="<?php echo $item; ?>">
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

			$text = 'text-black';
			if ($value['about_us']['background_color'] == 'Orange') {
				$bg = 'style="min-height: 50px; background-image: linear-gradient(to right, #fb6703, #e53317);"';
			}
			// <?= $bg > $bg = 'style="min-height: 50px; background-image: linear-gradient(to right, #00cbff, #04b3fc);"';

?>
	<section class="solution-bg">

		<div class="top-colored container">
			<div class="item row">
				<div class="col-6">
					<?php echo $value['about_us']['left_heading']; ?>
				</div>
				<div class="col-6">
					<?php echo $value['about_us']['right_heading']; ?>
				</div>
			</div>
		</div>
		<div class="top-white text-center">
			<img class=" video-circle" src="<?php echo $value['about_us']['video_image_poster'] ?>">
			<div class="float-center-text"><?php echo $value['about_us']['video_center_title'] ?></div>
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
					<h2><?php echo $value['our_solution']['heading']; ?></h2>
				</div>
				<div class="sub-heading">
					<p><?php echo $value['our_solution']['sub_heading']; ?></p>
				</div>
				<ul class="row matchHeight">
					<?php
					$i = 1;
					foreach ($value['our_solution']['items'] as $item) {
					?>
						<li id="box-<?php echo $i; ?>" class="box<?php echo ($i == 1 ? " current" : ""); ?> col">
							<div class="icon-box">
								<img class="svgClass icon-<?php echo $i; ?>" type="image/svg+xml" src="<?php echo $item['icon']; ?>" />
							</div>
							<div class="text-box match">
								<h5><?php echo $item['title']; ?></h5>
								<p class="font-weight-bold-item"><?php echo $item['text']; ?></p>
								<h3 class="read-more">Read More <img src="<?php echo get_template_directory_uri(); ?>/images/chevron-right-icon.png"></h3>

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

<?php if ($value['type'] == "Our Technology (banner)") { ?>

	<?php if ($value['our_technology']['desktop_image'] !== '') { ?>
		<section class="solution-bg img_section" style="background-image: url('<?php echo $value['our_technology']['desktop_image']; ?>');">
			<div class="container">
				<div class="row">
					<div class="col-lg-5 col-md-7">
						<div class="text-box">
							<h1><?php echo $value['our_technology']['heading']; ?></h1>
							<p><?php echo $value['our_technology']['content']; ?></p>

							<a href="<?php echo $value['our_technology']['buttons']['button_url']; ?>">
								<p><?php echo $value['our_technology']['buttons']['button_text']; ?></p>
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
	<div class="top-colored container-fluid" <?= $bg ?>>
		<div class="container">

			<h4 class="text-center"><?php echo $value['tactile_data']['heading']; ?></h4>

			<div class="row">
				<div class="col-4">
					<h5 class="text-center">
						<?php if ($value['tactile_data']['select_symbol_1_position'] == 'left' || $value['tactile_data']['select_symbol_1_position'] == 'both') { ?>
							<?php echo $value['tactile_data']['running_number_1_left_symbol']; ?>
						<?php } ?>
						<?php echo $value['tactile_data']['running_number_1']; ?></h5>
					<?php if ($value['tactile_data']['select_symbol_2_position'] == 'right' || $value['tactile_data']['select_symbol_1_position'] == 'both') { ?>
						<?php echo $value['tactile_data']['running_number_1_right_symbol']; ?>
					<?php } ?>
					</h5>
					<p><?php echo $value['tactile_data']['running_number_1_text']; ?></p>
				</div>

				<div class="col-4">
					<h5 class="text-center">
						<?php if ($value['tactile_data']['select_symbol_2_position'] == 'left' || $value['tactile_data']['select_symbol_2_position'] == 'both') { ?>
							<?php echo $value['tactile_data']['running_number_1_left_symbol']; ?>
						<?php } ?>
						<?php echo $value['tactile_data']['running_number_2']; ?></h5>
					<?php if ($value['tactile_data']['select_symbol_2_position'] == 'right' || $value['tactile_data']['select_symbol_2_position'] == 'both') { ?>
						<?php echo $value['tactile_data']['running_number_2_right_symbol']; ?>
					<?php } ?>
					</h5>
					<p><?php echo $value['tactile_data']['running_number_2_text']; ?></p>
				</div>

				<div class="col-4">
					<h5 class="text-center">
						<?php if ($value['tactile_data']['select_symbol_3_position'] == 'left' || $value['tactile_data']['select_symbol_3_position'] == 'both') { ?>
							<?php echo $value['tactile_data']['running_number_3_left_symbol']; ?>
						<?php } ?>
						<?php echo $value['tactile_data']['running_number_3']; ?>
						<?php if ($value['tactile_data']['select_symbol_3_position'] == 'right' || $value['tactile_data']['select_symbol_3_position'] == 'both') { ?>
							<?php echo $value['tactile_data']['running_number_3_right_symbol']; ?>
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
			<div class="section-heading">
				<h2 class="text-center"><?php echo $value['testimonials']['heading']; ?></h2>
			</div>
			<div class="client-slider desktop">

				<!-- <php $item['testimonial']->post_title; > -->
				<div class="item clearfix">

					<div class="row">

						<div class="col-md-4">

						</div>

						<div class="col-md-8">
							<div class="text-box">
								<h4><?php $value['testimonial']->post_title ?></h4>
							</div>

						</div>

					</div>
				</div>

			</div>

			<div class="client-slider mobile">

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
	<section class="<?= $cls ?>" <?= $bg ?>>
		<div class="container-fluid">
			<div class="row no-gutters">
				<div class="col-md-6 <?= $o_1 ?>">
					<div class="text-box <?= $text ?>">

						<?php print_r(); ?>
						<?php
						$c_cat = get_the_category($value['select_the_post'][0]->ID);

						?>
						<a href="<?php echo get_category_link($c_cat[0]->term_id ?? ''); ?>">
							<h6><?php echo $c_cat[0]->name ?? ''; ?></h6>
						</a>
						<h2><?php echo $value['select_the_post'][0]->post_title; ?></h2>
						<?php
						$content = $value['select_the_post'][0]->post_excerpt;

						if (empty($content) && strlen($content) < 10) {
							$content = strip_tags($value['select_the_post'][0]->post_content);
							$content = substr($content, 0, strpos($content, ' ', 270));
						}
						?>
						<p><?php echo $content; ?>...</p>

						<a class="btn" href="<?php echo get_the_permalink($value['select_the_post'][0]->ID); ?>">
							Learn More <img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/images/chevron-right-icon.png"></a>
					</div>
				</div>
				<?php
				$image = wp_get_attachment_image_src(get_post_thumbnail_id($value['select_the_post'][0]->ID), 'single-post-thumbnail');
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


<?php 	} //  foreach
?>

<!-- template engine -->
<!--
Top Banner
trusted by (logos)
About us (video)
Our solution

Our Technology (banner)
Banner Text + Image
tactile data (+numbers)
Testimonials
Select Post
Awards
Request A Demo
-->

<?php if ($value['type'] == "Our solution") { ?>
	<?php
	foreach ($value['trusted_by']['items'] as $item) { ?>
	<?php } // trusted by logos
	?>
<?php } // About us video
?>
</div>
<!--main div end-->

<script>
	jQuery(document).ready(function($) {

		$('.trusted-slider').slick({
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

	});
</script>

<style>
	.solution-bg {
		min-height: 500px;
		color:#fff;
		padding-top:100px;
	}

	.solution-page .solution-bg .text-box h1 {
		font-size: 5vw;
		width: auto;
		line-height: 1;
		text-shadow: none;
	}

	.solution-page .solution-bg .text-box h1 span {
		color: #ff8200;
	}

	.solution-bg {

		background: rgb(255, 255, 255);
		background: -moz-linear-gradient(0deg, rgba(255, 255, 255, 1) 46%, rgba(251, 103, 3, 1) 46%, rgba(229, 51, 23, 1) 100%);
		background: -webkit-linear-gradient(0deg, rgba(255, 255, 255, 1) 46%, rgba(251, 103, 3, 1) 46%, rgba(229, 51, 23, 1) 100%);
		background: linear-gradient(0deg, rgba(255, 255, 255, 1) 46%, rgba(251, 103, 3, 1) 46%, rgba(229, 51, 23, 1) 100%);
		filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#ffffff", endColorstr="#e53317", GradientType=1);
	}
	.float-center-text {
    margin-top: -200px;
    margin-bottom: 240px;
}
</style>

<?php

get_footer('new');

?>