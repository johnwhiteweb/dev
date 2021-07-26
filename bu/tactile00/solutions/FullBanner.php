<?php if($value['top_banner']['background_type']=="Image Background"){ ?>
	<section class="solution-bg img_section" style="background-image: url('<?php echo $value['top_banner']['desktop_image']; ?>');">
	  <div class="container">
		<div class="row">
		<div class="col-lg-5 col-md-7">
		  <div class="text-box">
			<h1><?php echo $value['top_banner']['heading']; ?></h1>
			<p><?php echo $value['top_banner']['content']; ?></p>
			
			<?php if($value['top_banner']['buttons']['button_type']=="URL"){ ?>
			<a class="btn" href="<?php echo $value['top_banner']['buttons']['button_url']; ?>">
			<img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/images/play-icon.png">
			<?php echo $value['top_banner']['buttons']['button_text']; ?>
			</a>
			
			<?php 
			}else{
				$video_id = '';
				$data_type = "";
				if($value['top_banner']['buttons']['button_type']=="Youtube Video"){
					$data_type = "youtube";
					$yout_url = $value['top_banner']['buttons']['button_youtube_video'];
					preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $yout_url, $match);
					$video_id = $match[1];
				
				}elseif($value['top_banner']['buttons']['button_type']=="Vimeo Video"){
					$data_type = "vimeo";
					
					$vimeo_url = $value['top_banner']['buttons']['button_vimeo_video'];
					$video_id = substr(parse_url($vimeo_url, PHP_URL_PATH), 1);
					
					
				}
			?>

			<?php if($value['top_banner']['buttons']['button_text'] ) { ?>
			<a class="btn vpop hi" href="#" data-type="<?php echo $data_type; ?>" data-id="<?php echo $video_id; ?>" data-autoplay='true'>
			<img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/images/play-icon.png"><?php echo $value['top_banner']['buttons']['button_text']; ?></a>
			<?php }?>
			<?php }?>
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
	}
	?>
	
	
	</div>