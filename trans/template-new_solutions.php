<?php

/**
 * Template Name: New Solutions
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
					<div class="container-fluid align-middle">


						<div class="text-box2 text-center container">
							<h1 class="text-center"><?php echo $value['top_banner_bg']['heading']; ?></h1>
							<p><?php echo $value['top_banner_bg']['text']; ?></p>
							<div class="warp-scroll mobile">
								<a href="#hidden-potential">

									<img src="<?php echo get_template_directory_uri(); ?>/new_home/16-chevron-bot.png" alt="scroll down" />
								</a>
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
<?php 	} //  foreach
?>

<nav class="nav-breadcrumb container-fluid" aria-label="breadcrumb" style="background:#fff;">
	<div class="container">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?php echo home_url(); ?>">Home</a></li>
			<li class="breadcrumb-item active" aria-current="page"> Solution</li>
		</ol>
	</div>
</nav>

<?php
$sections = get_field('sections', $postID);
foreach ($sections as $key => $value) {
?>


	<?php
	if ($value['type'] == 'Our solution') {
	?>
		<section id="hidden-potential">
			<div class="hidden-potential desktop no-p">
				<div class="container-fluid">
					<div class="section-heading">
						<h2 class="our-title our-solution text-center"><?php echo $value['our_solution']['heading']; ?></h2>
					</div>

					<ul class="matchHeight masonry">
						<?php
						$i = 1;
						foreach ($value['our_solution']['items'] as $item) {
						?>
							<a class="" href="<?php echo $item['read_more_link']; ?>">

								<!-- <li id="box-<php echo $i; ?>" class="box<php echo ($i == 1 ? " current" : ""); ?> col"> -->
								<li id="box-<?php echo $i; ?>" class="box<?php echo ($i % 2 == 1 ? " box-zebra" : " box-stripe"); ?> col">
									<div class="container row mx-auto">
										<div class="icon-box-x col-2">
											<img class="img-fluid icon-image icon-<?php echo $i; ?>" src="<?php echo $item['icon']; ?>">

											<!-- <img class="svgClass icon-<php echo $i; ?>" type="image/svg+xml" src="<php echo $item['icon']; ?>" /> -->
										</div>
										<div class="text-box match col-9">
											<div class="sub-heading ">
												<p class="solution-sub"><?php echo $value['our_solution']['sub_heading']; ?></p>
											</div>
											<h5 class="text-left"><?php echo $item['title']; ?></h5>
											<div class="font-weight-bold-item"><?php echo $item['text']; ?></div>
											<a href="<?= $item['read_more_link'] ?>">
												<h3 class="read-more">Learn More <img src="<?php echo get_template_directory_uri(); ?>/images/chevron-right-icon.png"></h3>
											</a>
										</div>
									</div>
								</li>
							</a>
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
							<a href="<?= $item['read_more_link'] ?>">
							<div class="row m-box<?php echo ($j == 1 ? " current2" : ""); ?> box<?php echo ($j % 2 == 1 ? " box-zebra" : " box-stripe"); ?>">
								<div class="col-md-6">
									<div class="text">
										<p><?php echo $item['slider_text_test']; ?></p>
									</div>
								</div>
								<div class="col-md-6">
									<div class="img-box">
										<img class="img-fluid icon-image" src="<?php echo $item['slider_image']; ?>">
									</div>
								</div>
							</div>
						</a>
						<?php
						} else {
						?>
						<a href="<?= $item['read_more_link'] ?>">
							<div class="row m-box<?php echo ($j == 1 ? " current" : ""); ?> box<?php echo ($j % 2 == 1 ? " box-zebra" : " box-stripe"); ?>">
								<div class="col-md-6">
									<div class="img-box">
										<img class="img-fluid icon-image" src="<?php echo $item['slider_image']; ?>">
									</div>
								</div>
								<div class="col-md-6">
									<div class="text">
										<p><?php echo $item['slider_text_test']; ?></p>
									</div>
								</div>
							</div>
						</a>
						<?php
						}
						?>
					<?php
						$j++;
					}
					?>
				</div>
			</div>
			<div class="hidden-potential mobile icons">
				<div class="container-fluid">
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
						<div id="box-<?php echo $p; ?>" class="btn-box box <?php echo ($p % 2 == 1 ? " box-zebra" : " box-stripe"); ?>" data-toggle="collapsed" data-target="#box-<?php echo $p; ?>" aria-expanded="<?php /*echo ($p==1 ? "true" : "false");*/ ?>false" aria-controls="multiCollapseExample2">
							<a class="" href="<?php echo $item['read_more_link']; ?>">
								<div class="img-box">
									<img class="img-fluid icon-image icon-<?php echo $p; ?>" src="<?php echo $item['icon']; ?>">
									<!-- <object class="svgClass icon-<php echo $p; ?>" type="image/svg+xml" data="<php echo $item['icon']; ?>"></object> -->
								</div>
								<span><?php echo $item['title']; ?></span><i class="fa fa-angle-right"></i>
								</a>
							
							<div class="col-12">
								
								<div class="text font-weight-bold">
									<p class="text-center"><?php echo $item['text']; ?></p>
									<a class="btn text-left" href="<?php echo $item['read_more_link']; ?>">

										LEARN MORE
										<img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/images/play-icon.png">
					</a>
									</div>
								</div>
								<div class="col-12">
									<!-- <div class="img-box">
										<img class="img-fluid " src="<php echo $item['slider_image']; ?>">
											</div> -->
									<a class="" href="<?php echo $item['read_more_link']; ?>">

											<div class="text">
												<p><?php echo $item['slider_text_test']; ?></p>
											</div>
										</div>
									</a>
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



	<?php if ($value['type'] == "Our Partners") {
		$none = 'style="display:none;"';
		$block = 'style="display:block;"';
	?>
		<section class="container-fluid trusted-section solutions">
			<div class="container mobile-block">
				<div class="section-heading  align-middle text-box text-black">
					<h2 class="align-middle  mx-auto title-trust"><?php echo $value['our_partners']['heading']; ?></h2>
				</div>
				<div class="trusted-slider desktop ">
					<?php
					foreach ($value['our_partners']['items'] as $item) {
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
					$total = count($value['our_partners']['items']);
					foreach ($value['our_partners']['items'] as $item) {
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
	if($value['type'] == 'Blog'){
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
	  foreach($value['blog'] as $item){
	  
	  ?>
		<div class="col-md-4">
		  <div class="box">
			<a href ="<?php echo get_the_permalink($item->ID); ?>">
			<?php 
			$image = wp_get_attachment_image_src( get_post_thumbnail_id( $item->ID ), 'single-post-thumbnail' );
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
		  $postcat = get_the_category( $item->ID );
		  ?>
		  <a class="sticker" href="<?php echo get_category_link($postcat[0]->term_id); ?>"><span class="<?php echo get_the_category( $item->ID )[0]->slug; ?>"><?php echo get_the_category( $item->ID )[0]->name; ?></span></a>
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
		}//if
	?>
		



<?php 	} //  foreach
?>
</div>

<hr class="container col-10 mobile" />

<!--main div end-->
<script>
	jQuery(document).ready(function($) {
		$('.partners-slider', '.client-slider').slick({
			slidesToShow: 4,
			slidesToScroll: 1,
			dots: true,
			infinite: true,
			loop: true,
			arrows: true,
			autoplay: true,
			autoplaySpeed: 2000,
			responsive: [{
					breakpoint: 996,
					settings: {
						slidesToShow: 3,
						slidesToScroll: 1,
						infinite: true,
						loop: true,
						dots: false,
						arrows: true,
						adaptiveHeight: true,
						// centerPadding: '40px',
					}
				},
				// You can unslick at a given breakpoint now by adding:
				// settings: "unslick"
				// instead of a settings object
			]
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
						slidesToShow: 3,
						slidesToScroll: 1,
						infinite: true,
						loop: true,
						dots: false,
						arrows: true,
						adaptiveHeight: true,
						centerPadding: '40px',
					}
				},
				// You can unslick at a given breakpoint now by adding:
				// settings: "unslick"
				// instead of a settings object
			]
		});
		$('.box-zebra').mouseenter(function() {
			$('.box-zebra').css('background', '#f0f1f3');
			$('.box-zebra .img-fluid').css('background', '#fff');
			$(this).find('.read-more img').css('left', '6px');
		
		});
		$('.box-zebra').mouseleave(function() {
			$('.box-zebra').css('background', '#fff');
			$(this).find('.read-more img').css('left', '0');
			$('.box-zebra .img-fluid').css('background', '#f0f1f3');

		});
		$('.box-stripe').mouseenter(function() {
			$('.box-stripe').css('background', '#f0f1f3');
			$('.box-stripe .img-fluid').css('background', '#fff');
			$(this).find('.read-more img').css('left', '6px');
		});
		$('.box-stripe').mouseleave(function() {
			$('.box-stripe').css('background', '#fff');
			$('.box-stripe .img-fluid').css('background', '#f0f1f3');
			$(this).find('.read-more img').css('left', '0');

		});

		$(".m-box").hide();
		$(".current").show();
		$("#box-1").click(function() {
			var box_class = $(this).attr('id');
			$(".m-box").hide();
			$("." + box_class).show();
		});
		$("#box-2").click(function() {
			var box_class = $(this).attr('id');
			$(".m-box").hide();
			$("." + box_class).show();
		});
		$("#box-3").click(function() {
			var box_class = $(this).attr('id');
			$(".m-box").hide();
			$("." + box_class).show();
		});
		$("#box-4").click(function() {
			var box_class = $(this).attr('id');
			$(".m-box").hide();
			$("." + box_class).show();
		});
		$("#box-5").click(function() {
			var box_class = $(this).attr('id');
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

		

	


	});


</script>
<style>
	:root {
		--upper: uppercase;
		--in: initial;
		--orange: #ff7000;
		--pale-grey: #f0f1f3;
	}

	body>* {
		font-family: Rajdhani;
	}

	h1 {

		text-transform: var(--upper);
	}

	.text-box p {
		font-family: Roboto;
		font-size: 16px;
		text-transform: initial;
		line-height: 1.88;
		color: #000000;
	}

	h1.text-center {
		margin-top: -20px;
		margin-bottom: 60px;
		font-weight: 600;
	}

	.breadcrumb {
		margin-top: 15px;
	}

	.text-box.match.col-9 {
		padding-left: 91px;
	}

	.row.m-box.current.box-1 {
		height: 0;
	}

	.hidden-potential .box .icon-box-x img {
    text-align: center;
    padding: 20px 16px;
    max-width: 170px;
    max-height: 166px;
    border-radius: 50%;
    background: #fff;
    border: 1.4px solid #f0f1f3;
    margin: 45px 0;
}



	img.svgClass.icon-4 {
		height: 73px;

	}

	.case-study p {
		padding: 0 100px;
		margin: 0 auto;
		font-size: 36px;
		font-weight: 600;
		line-height: 1.14;
		letter-spacing: 0.03px;
	}

	.masonry,
	.desktop .container-fluid {
		padding: 0 !important;
		margin: 0 !important;
	}

	.masonry li .container {
		position: relative;
		padding: 99px 0 65px 0;
		list-style: none;
	}

	.box-stripe {
		background-color: #f0f1f3;
	}



	.box-stripe .row {
		display: flow-root;

	}

	.box-stripe .col-2 {
		float: right;


	}

	.box-zebra .container {
		max-width: 1120px;
		left: 65px;
	}

	li.box:last-child {
		padding-bottom: 50px;
	}

	.masonry li .container:first-child {
		padding-top: 50px;
	}

	.text-box.match.col-10 {
		padding: 0 0 65px 65px;
	}

	p.font-weight-bold-item {
		min-height: auto;
	}

	.masonry li {
		list-style: none;
	}

	h5.text-left {
		font-size: 30px;
		font-weight: bold;
		font-stretch: normal;
		font-style: normal;
		line-height: normal;
		letter-spacing: 0.02px;
		color: #ff8200;
	}

	h2.align-middle.mx-auto.title-trust {
		margin: 0 auto;
		font-size: 40px;
		font-weight: 600;
	}



	.trusted-section {
		background: #f0f1f3;
	}

	@media screen and (min-width:976px) {

	
		h2.align-middle.mx-auto.title-trust {
			margin: -15px 0 30px;
		}

		.top-colored.container-fluid {
			padding: 81px 0 85px 0;
		}

		.box-stripe .row {
			display: flow-root;
			position: relative;
			right: 75px;
		}

		.trusted-section {
			height: 334px;
		}
	}

	@media screen and (max-width:975px) {
	
		section.container-fluid.trusted-section.solutions {
    padding-bottom: 50px;
}
		h2.align-middle.mx-auto.title-trust{
margin-top:-10px;		}
		.trusted-section {
    min-height: 215px !important;
}
.trusted-slider .slick-list {
    overflow: hidden !important;
}
	
 .slick-next:before {

    right: -13px !important;
}
.slick-prev:before {

left: -13px !important;
}

		.you-may-like .section-heading h2 {
			margin-bottom: 34px;
			font-size: 26px;
			color: #000000;
		}

		h2.align-middle.mx-auto.title-trust {
			font-family: Rajdhani;
			font-size: 26px !important;
			font-stretch: normal;
			color: #000000;
			margin-bottom: 30px;
    margin-top: 14px;
		}

		.hidden-potential .section-heading {
			padding-top: 0;
		}

		.hidden-potential .btn-box span {
			font-size: 26px;
			font-weight: bold;
			color: #ff8200;
			text-align: left;
			width: 100%;
			padding: 0;
			margin: 19px 15px 0;
		}

		.hidden-potential .btn-box p {
			font-family: Roboto;
			font-size: 15px;
			font-weight: normal;
			line-height: 2;
			letter-spacing: 0.01px;
			text-align: left;
			color:#000;
		}

		#tactile-data {
			margin-top: -15px;
		}

		.hidden-potential.icons .img-box {
			padding-top: 38px;
		}

		.btn-box {
			padding-bottom: 30px;
			margin-top: 15px;
		}
		/* .btn-box:last-child {
			padding-bottom: 25px;
			margin-bottom:0;
		} */
		.container-fluid {
			padding: 0;
		}

		#hidden-potential {
			background: #fff;
		}

		.nav-breadcrumb .breadcrumb .breadcrumb-item,
		.nav-breadcrumb .breadcrumb .breadcrumb-item a {
			font-size: 14px !important;
		}

		.nav-breadcrumb {
			margin-top: -14px;
		}

		.warp-scroll.mobile {
			position: relative;
			top: 35px;
		}

		section.solution-bg.img_section {

    min-height: 492px;
}
		.case-study p {
			padding: 0;
    margin: 0 auto;
    line-height: 1.14;
    letter-spacing: .03px;
    font-size: 26px;
    font-weight: 600;
}
		h1.text-center {
			font-size: 20px;
			font-weight: 600;
			margin-top: 90px;
		}

		.solution-bg h1.text-center {

			margin-top: 0;
		}

		.box-stripe {
			background: #f0f1f3;
		}

		.hidden-potential .btn-box .svgClass {
			border: solid 1.4px #f0f1f3;
			background: #fff;
			max-width: 160px;
			overflow: visible;
			min-height: 151px;
			max-height: 151px;
			padding: 25px 15px;
			border-radius: 50%;
			pointer-events: none;
			width: 150px;
		}
	}

	/* .solution-page .slick-prev::before { */
	/* .slick-prev::before,
	.slick-next::before {
		content: "";
		background-image: url(<php echo get_template_directory_uri(); ?>/images/slide_left.png);
		background-repeat: no-repeat;
		width: 40px;
		height: 40px;
		position: absolute;
	} */



	h3.read-more {
		line-height: 0.7;
	}

	.read-more:hover {
		color: #e53218;
	}

	/* .hidden-potential .masonry .box .read-more img  */
	.read-more img {
		display: inline-block;
		transition: all 0.4s ease-in-out;
	}

	.read-more img:hover {
		margin-left: 5px;
	}



</style>
<?php
get_footer('new2');
?>