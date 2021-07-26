<?php

$args = array(
	'post_type' => 'testimonials',
	'order'    => 'ASC',
	'post_status' => 'publish',
);

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
	preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $youtube_video, $match);
	$video_id = $match[1];
	$video_id = ltrim($video_id, 'g');

?>
	<div class="modal fade" id="localVideoLocal-<?= $x; ?>" tabindex="-<?= $x; ?>" aria-labelledby="localVideoLocal" aria-hidden="true">
		<div class="modal-dialog main-site">
			<div class="modal-content main-box">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">

					<video autoplay="false" muted="" loop="false" playsinline="">
						<source src="<?php echo $local_video; ?>" type="video/mp4">
					</video>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="youtubeVideo-<?= $x; ?>" tabindex="-<?= $x; ?>" aria-labelledby="youtubeVideo" aria-hidden="true">
		<div class="modal-dialog main-site">
			<div class="modal-content main-box">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<iframe width="100%" height="360" data-type="<?php echo $data_type; ?>" src="https://www.youtube.com/embed/<?php echo $video_id; ?>?rel=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

				</div>
			</div>
		</div>
	</div>
<?php
	$x++;
}
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

<footer class="footer">

	<div class="container row mx-auto">
		<div class="logo-part col-3">
			<a class="navbar-brand" href="<?php echo get_home_url(); ?>"><img class="images-fluid" src="<?php the_field('main_logo', 'option'); ?>"></a>

		</div>

		<div class="col-4">
			<div class="row">
				<div class="col-6">
					<ul class="botmenu">
						<li><a href="<?= get_site_url() ?>/solutions">SOLUTIONS</a></li>
						<li><a href="<?= get_site_url() ?>/technology">TECHNOLOGY</a></li>
						<li><a href="<?= get_site_url() ?>/about">ABOUT</a></li>
					</ul>
				</div>
				<div class="col-6">
					<ul class="botmenu">
						<li><a href="<?= get_site_url() ?>/careers">CAREERS</a></li>
						<li><a href="<?= get_site_url() ?>/resource">RESOURCES</a></li>
						<li><a href="<?= get_site_url() ?>/contact">CONTACT US</a></li>
					</ul>
				</div>


			</div>
		</div>
		<div class="col-1"></div>
		<ul class="col-4 ">
			<div class="newsletter">
				<p>
					Subscribe to learn about our latest news, updates and tactile journey
				</p>
				<?php echo do_shortcode('[contact-form-7 id="5270" title="Newsletter_footer"]'); ?>
			</div>

	</div>
	<div class="footer-bottom-w desktop">
		<hr class="container" />
		<div class="container row mx-auto">

			<p class="container col-5"><?php the_field('footer_text', 'option'); ?></p>

			<div class="container col-7 justify-content-end">
				<?php
				if (have_rows('footer_menu', 'option')) :
					while (have_rows('footer_menu', 'option')) : the_row(); 				?>


						<!-- <li class="<php the_sub_field('footer_menu_class', 'option'); ?>" "facebook"> -->
						<li class="social-footer pull-right <?php the_sub_field('footer_menu_class', 'option'); ?>">
							<a href="<?php the_sub_field('footer_menu_link', 'option'); ?>">

								<?php the_sub_field('footer_menu_text', 'option'); ?>
								<img src="<?php the_sub_field('footer_menu_image', 'option'); ?>">
							</a>
						</li>
				<?php
					endwhile;
				endif;
				?>
				</ul>
			</div>

		</div>
	</div>

	<div class="footer-bottom-w mobile">
		<hr class="container" />
		<div class="container row mx-auto">
			<div class="col">
				<a href="http://www.facebook.com/TactileMobility" class="fb">

					<img src="<?php echo get_site_url(); ?>/wp-content/uploads/2021/07/fb.png" data-val="<?php echo get_site_url() ?>/wp-content/uploads/2021/07/fb.png" />
				</a>

			</div>
			<div class="col">

				<a href="http://www.linkedin.com/company/tactile-mobility/" class="in">

					<img src="<?php echo get_site_url(); ?>/wp-content/uploads/2021/07/in.png" data-val="<?php echo get_site_url() ?>/tactilemobility/wp-content/uploads/2021/07/in.png" />
				</a>
			</div>
		</div>

	

			<a class="text-center privacy" href="https://tactilemobility.com/privacy-policy/" style="color:#000;">
				Privacy Policy
			</a>
	

		<p class="container block"><?php the_field('footer_text', 'option'); ?></p>
	</div>

</footer>
</div>
<div class="file-inputs-bufer" style="height:0px !important;width: 0px !important;overflow: hidden !important;opacity: 0 !important;pointer-events:none !important;"></div>
<script src="<?php echo get_theme_file_uri('/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo get_theme_file_uri('/js/slick.min.js'); ?>"></script>

<script>
	jQuery('form.wpcf7-form').on('submit', function() {
		jQuery(this).find('input[type=file]').each(function() {
			if (jQuery(this).val() === '') {
				jQuery(this).parent().appendTo('.file-inputs-bufer');
				jQuery(this).remove();
			}
		});
	});

	jQuery(document).ready(function($) {


		if ($(window).width() > 768) {
			$('a.dropdown-toggle').click(function() {
				var link = $(this).attr("href");
				window.location.href = link;
			})
		}


		$("li.facebook").on("mouseenter", function() {
			//alert('hello');
			var sttr = $(this).find("img").attr("src");
			$(this).find("img").attr("data-val", sttr);
			$(this).find("img").attr("src", "<?php echo get_theme_file_uri('images/facebook-with-bg.svg') ?>");

		}).on("mouseleave", function() {
			//alert("hello");

			var strval = $(this).find("img").attr("data-val");
			//alert(strval);
			$(this).find("img").attr("src", strval);

		});

		$("li.linkedin").on("mouseenter", function() {
			//alert('hello');
			var sttr = $(this).find("img").attr("src");
			$(this).find("img").attr("data-val", sttr);
			$(this).find("img").attr("src", "<?php echo get_theme_file_uri('images/linkedin-with-bg.svg') ?>");

		}).on("mouseleave", function() {
			//alert("hello");

			var strval = $(this).find("img").attr("data-val");
			//alert(strval);
			$(this).find("img").attr("src", strval);

		});

		if ($(window).width() < 768) {

			$("a.dropdown-toggle").after("<span class='arrow'></span>");
			$("a.dropdown").removeClass("dropdown-toggle");
			$("a.dropdown").removeAttr("data-toggle");

			$("span.arrow").addClass("dropdown-toggle");
			$("span.arrow").attr("data-toggle", "dropdown");

			/* if($('ul.dropdown-menu').find('li.active').length !== 0){
				
				$("ul.dropdown-menu").css("display", "block");
				
				$("span.dropdown-toggle").click( function(){
					$("ul.dropdown-menu").removeAttr("style");

					
					
				});
				
			} */

			$('li.nav-item').each(function() {

				if ($(this).find('li.active').length !== 0) {

					$(this).addClass("show");
					$(this).find("span.dropdown-toggle").attr("aria-expanded", "true");
					$(this).find("ul.dropdown-menu").addClass("show");

				}

			});



		}
		$('.nav-open').on("click", function(e) {
			e.preventDefault();

			$(this).toggleClass('nav-close');

		});

		$('input.form-control').focus(function() {
			$(this).parent().parent('.form-group').addClass('active-lable');
		}).focusout(function() {
			if ($(this).val() == "") {
				$(this).parent().parent('.form-group').removeClass('active-lable');
			}
		});


	});
</script>




<?php wp_footer(); ?>
</body>

</html>