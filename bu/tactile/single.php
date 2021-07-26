<?php
get_header('new');
global $post;
$postID = $post->ID;
//print_r($post);

$categories = get_the_category($postID);
$cat_id_array = array();
foreach ($categories as $cat) {
	$cat_id_array[] = $cat->term_id;
}


//print_r($category);

$postcat = get_the_category($post->ID);

$postType = get_field('type', $postID);

?>
<div class="solution-page case-study article-page <?php if (get_field('is_fade')) : ?>fade-article<?php endif; ?>">
	<!--main div-->

	<nav class="nav-breadcrumb" aria-label="breadcrumb">
		<div class="container">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?php echo home_url(); ?>">Home</a></li>
				<li class="breadcrumb-item"><a href="<?php echo get_home_url(); ?>/resource/">Resources</a></li>
				<li class="breadcrumb-item"><a href="<?php echo get_category_link($postcat[0]->term_id); ?>"><?php echo $postcat[0]->name ?></a></li>
				<li class="breadcrumb-item active desktop" aria-current="page"><?php echo $post->post_title; ?></li>
				<?php
				$p_title = strip_tags($post->post_title);
				$p_title = trim($p_title);
				$p_title = substr($p_title, 0, 25);
				?>
				<li class="breadcrumb-item active mobail" aria-current="page"><?php echo $p_title; ?>...</li>
			</ol>
		</div>
	</nav>

	<section class="main-site">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<div class="main-box">
						<h1><?php echo $post->post_title; ?></h1>
						<div class="clearfix">
							<ul class="social-icon">
								<li><a class="icon facebook" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $post->guid; ?>"><i class="fa fa-facebook"></i></a></li>
								<li><a class="icon linkedin" target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $post->guid; ?>&title=<?php echo $post->post_title; ?>"><i class="fa fa-linkedin"></i></a></li>
								<li><a class="icon twitter" target="_blank" href="https://twitter.com/intent/tweet?text=<?php echo $post->guid; ?>"><i class="fa fa-twitter"></i></a></li>
								<li><a class="icon whatsapp" target="_blank" href="https://wa.me/?text=<?php echo $post->guid; ?>
"><i class="fa fa-whatsapp"></i></a></li>
							</ul>
							<span class="date-info <?php if ( get_field( 'hide_date' ) ): ?>hide-date<?php endif; ?>"><?php echo date('M d, Y', strtotime($post->post_date)); ?> </span>
						
							</div>
							<?php
							$excerpt = $post->post_excerpt;
							?>
							<div class="sub-title">
							<h2><?php echo $excerpt ?></h2>
						</div>
					
						<?php
						$image = wp_get_attachment_image_src(get_post_thumbnail_id($postID), 'single-post-thumbnail');
						if ($image) {
							$image = $image[0];
						} else {
							$image = get_field("res_image", $item->ID);
						}

						?>
						<article class="d-block w-100">
							<?php
							$postcat = get_the_category($post->ID);
							$show_post_type_button = get_field('show_post_type_button');
							$inner_image = get_field('inner_image');

							/*
          if(get_the_post_thumbnail($post->ID, 'post-single')){
					$content = preg_replace( "/<\/p>/", "</p><div class='img-box'><a class='sticker' href='".get_category_link($postcat[0]->term_id)."'><span class=''>".get_the_category( $item->ID )[0]->name."</span></a>" . get_the_post_thumbnail($post->ID, 'post-single')."</div>", wpautop( get_the_content() ), 1 );
          }else{
            $content = wpautop( get_the_content() );
          */
							$catSticker = "";
							if ($show_post_type_button) {
								$catSticker = "<a class='sticker' href='" . get_category_link($postcat[0]->term_id) . "'>
			<span class=''>" . get_the_category($item->ID)[0]->name . "</span></a>";
							}
							if (!empty($inner_image)) {
								echo "<div class='img-box'>{$catSticker}<img src='{$inner_image['url']}' alt='{$inner_image['alt']}'></div>";
							}

							$content = wpautop(get_the_content());
							echo "<div class='paragraphs'>".$content."</div>";

							
							?>
						</article>
					
						
						<?php if( get_field('file__download') ): ?>

						
							<a class="btn REQUEST_A_DEMO orange-btn" href="<?php the_field('file__download'); ?>" target="_blank"><span>DOWNLOAD FILE</span></a>

						
						<?php endif; ?>
						<?php
						if ($postType == 'WEBINARS') {
							$presenters = get_field('presenters');
							if (!empty($presenters)) {
						?>
								<div class="presenters-info">
									<div class="title">
										<h2>PRESENTERS</h2>
										</hr>
									</div>
									<div class="row">
										<?php
										foreach ($presenters as $presenter) {
											//print_r($presenter);
											$linkedin = get_field('linkedin', $presenter->ID);
										?>
											<div class="col-md-3 col-6 text-center">
												<div class="img-box"><img class="img-fluid" src="<?= get_the_post_thumbnail_url($presenter->ID); ?>">

													<?php
													if (!empty($linkedin)) {
														echo "<a href='{$linkedin}' target='_blank' class='position-absolute linkedin'> <i class='fa fa-linkedin'></i> </a>";
													}
													?>
												</div>
												<h5><?= $presenter->post_title; ?></h5>
												<p><?= $presenter->post_excerpt; ?></p>



											</div>
										<?php } ?>

									</div>
								</div>
							<?php } ?>
						<?php } ?>

						<div class="sign-up-form">
							<?php

							$webinar_date = get_field('webinar_date', $postID);
							$videoEmbed = get_field('webinar_video_embed_code', $postID);
							$case_studies_pdf = get_field('case_studies_pdf', $postID);

							//echo $postType;

							if ($postType == 'WEBINARS') {

								$now = time();
								$date = strtotime($webinar_date);
								$datediff = $date - $now;
								$diff = round($datediff / (60 * 60 * 24));
								//echo $webinar_date."---".date("Y-m-d")."---/".$diff;
								//echo $diff;

								if ($diff <= 1 && !empty($videoEmbed)) {
									echo do_shortcode('[contact-form-7 id="3757" title="Watch Video"]');
								} else {
									echo do_shortcode('[contact-form-7 id="3696" title="SIGN UP"]');
								}
							} elseif ($postType == 'Case studies') {
								echo '<div class="white-grd"></div>';
								echo do_shortcode('[contact-form-7 id="3764" title="Download The Case Study"]');
							} else {

								//echo do_shortcode('[contact-form-7 id="3696" title="SIGN UP"]');
							}


							?>
						</div>




					</div>
				</div>

				<div class="col-md-4">
					<div class="blog-box">
						<?php
						$lpostcat = get_the_category($post->ID);

						?>
						<h3 class="active">LATEST <?php echo $lpostcat[0]->name ?></h3>
						<?php
						$args = array(
							'posts_per_page' => 3, /* how many post you need to display */
							'offset' => 0,
							'category' => $lpostcat[0]->term_id,
							'exclude' => [$post->ID],
							'orderby' => 'post_date',
							'order' => 'DESC',
							'post_type' => 'post', /* your post type name */
							'post_status' => 'publish'
						);
						$latest_posts = get_posts($args);
						$i = 1;
						foreach ($latest_posts as $litem) {
						?>
							<span class="date-info<?php echo ($i == 1 ? " mb-3" : ""); ?>"><?php echo date('M d, Y', strtotime($litem->post_date)); ?> </span>
							<?php
							//$content=strpos($item->post_content, ' ', 100);
							$p_title = strip_tags($litem->post_title);
							$p_title = trim($p_title);
							$p_title = substr($p_title, 0, 70);
							?>
							<a href="<?php echo get_the_permalink($litem->ID); ?>">
								<h4 class="<?php //echo ($i==1 ? "active" : ""); 
											?>"><?php echo $p_title; ?>..</h4>
							</a>
						<?php
							$i++;
						}
						?>
					</div>
				</div>

				<div class="social">

					<ul class="social-icon">
						<li><a class="icon facebook" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $post->guid; ?>"><i class="fa fa-facebook"></i></a></li>
						<li><a class="icon linkedin" target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $post->guid; ?>&title=<?php echo $post->post_title; ?>"><i class="fa fa-linkedin"></i></a></li>
						<li><a class="icon twitter" target="_blank" href="https://twitter.com/intent/tweet?text=<?php echo $post->guid; ?>"><i class="fa fa-twitter"></i></a></li>
						<li><a class="icon whatsapp" target="_blank" href="https://wa.me/?text=<?php echo $post->guid; ?>"><i class="fa fa-whatsapp"></i></a></li>
					</ul>
				</div>

				<div class="you-may-like case-studies">
					<div class="container">
						<div class="title">
							<h2>You may also like</h2>
							<hr>
						</div>
						<div class="row">
							<?php


							// 	echo var_dump($catlist) ;
							//	echo var_dump($catIds);

							$args = array(
								// 'category' =>9,
								'posts_per_page' => 3, /* how many post you need to display */
								'offset' => 0,
								'exclude' => [$post->ID],
								'category__not_in' => $catIds,
								'orderby' => 'post_date',
								'order' => 'DESC',
								'post_type' => 'post', /* your post type name */
								'post_status' => 'publish'
							);
							$myposts = get_posts($args);

							foreach ($myposts as $item) {
								$image = wp_get_attachment_image_src(get_post_thumbnail_id($item->ID), 'single-post-thumbnail');
								if ($image) {
									$image = $image[0];
								} else {
									$image = get_field("res_image", $item->ID);
								}
							?>
								<div class="col-md-4">
									<div class="box">
										<a href="<?php echo get_the_permalink($item->ID); ?>">
											<div class="img-box"><img class="img-fluid" src="<?php echo $image; ?>"></div>

											<div class="text-box">

												<h5><?php echo $item->post_title; ?></h5>
												<span class="date"><?php echo date('M d, Y', strtotime($item->post_date)); ?></span>
												<?php
												//$content=strpos($item->post_content, ' ', 100);
												$content = strip_tags($item->post_content);
												$content = trim($content);

												$content = substr($content, 0, 75);
												?>
												<p><?php echo $content; ?>...</p>
												<h3 class="read-more">Read More <img src="<?php echo get_template_directory_uri(); ?>/images/chevron-right-icon.png"></h3>
											</div>
										</a>
										<?php
										//$postcat = get_the_category( $item->ID );
										?>
										<a href="<?php echo get_category_link($postcat[0]->term_id); ?>" class="sticker"><span class="<?php echo $postcat[0]->slug; ?>"><?php echo get_the_category($item->ID)[0]->name ?></span></a>
									</div>
								</div>

							<?php
							}

							?>
						</div>
					</div>
				</div>

				<!-- <div class="contact-us newsletter-form ">
					<div class="container">

						<php echo do_shortcode('[contact-form-7 id="3695" title="newslleter"]'); ?>


					</div>
				</div> -->

			</div>

		</div>
</div>
</section>

</div>
<!--main div end-->



<?php if (isset($videoEmbed) && !empty($videoEmbed)) { ?>
	<style>
		#WatchVideo .modal-body iframe {
			width: 100%;
			height: 80vh;
		}
	</style>
	<!-- Watch Video Modal -->
	<div class="modal fade" id="WatchVideo" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog  modal-xl" style="max-width:80vw">
			<div class="modal-content bg-transparent border-0">
				<div class="modal-header">
					<button type="button" class="close " data-dismiss="modal" aria-label="Close" style="opacity:1">
						<span aria-hidden="true" class="badge badge-dark text-orange p-0" style="opacity:1;width: 30px;height: 30px;color:#ff7000;border-radius:50%;text-shadow: none;">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<?= $videoEmbed ?>
				</div>
			</div>
		</div>
	</div>
<?php } ?>

<script>
	jQuery(document).ready(function($) {

		const input = document.querySelector('.input-field');

		function showSubmitButton() {
			const submit = document.querySelector('.submit-container');

			if (input.value.length >= 0) {
				submit.style.opacity = '1';
			} else {
				submit.style.opacity = '0';
			}
		}

		input.addEventListener('input', showSubmitButton);
		
		
		$('.fade-article .paragraphs').children(':lt(2)').show()



	});



	// download case study  $case_studies_pdf
	document.addEventListener('wpcf7mailsent', function(event) {
		console.log(event);
		if ('3764' == event.detail.contactFormId) {
			var msg = "Please click <a href='<?= $case_studies_pdf['url'] ?>' target='_blank'>here</a> to download the PDF file.";
			jQuery("#" + event.detail.id).find("form").html("<h3 class='thankyou'>" + msg + "</h3>").fadeIn();
			jQuery("#WatchVideo").modal('show');
		}
	}, false);


	// watch video form  $videoEmbed 
	document.addEventListener('wpcf7mailsent', function(event) {
		console.log(event);
		if ('3757' == event.detail.contactFormId) {
			var msg = "Thank you for your interest!";
			jQuery("#" + event.detail.id).find("form *").hide().html("<h3 class='thankyou'>" + msg + "</h3>").fadeIn();
			jQuery("#WatchVideo").modal('show');
		}
	}, false);


	// sign up form 
	document.addEventListener('wpcf7mailsent', function(event) {
		console.log(event);
		if ('3696' == event.detail.contactFormId) {
			var msg = "Thank you for your interest!";
			jQuery("#" + event.detail.id).find("form *").hide().html("<h3 class='thankyou'>" + msg + "</h3>").fadeIn();
		}
	}, false);


	// newsletter form 
	document.addEventListener('wpcf7mailsent', function(event) {
		console.log(event);
		if ('3695' == event.detail.contactFormId) {
			var msg = "Thank you for your interest!";
			jQuery("#" + event.detail.id).find("form *").hide().html("<h3 class='thankyou'>" + msg + "</h3>").fadeIn();
		}
	}, false);
</script>

<?php
get_footer('new');
?>