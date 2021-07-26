
			 	<php if($value['about_us']['local_video'] ){ ?>
				 
				 <div class="video_container">       
				 <video autoplay="" muted="" loop="" playsinline="" id="myVideo" poster="<?php echo $value['about_us']['video_image_poster'];?>">
				   <source src="<?php echo $value['about_us']['local_video']; ?>" type="video/mp4">
				 </video>
				 </div>
			 	

			

				 php }?>
				 
                 <?php if($value['about_us']['video_type']=="URL"){ ?>
					 <a class="btn" href="<?php echo $value['top_banner']['buttons']['button_url']; ?>"><img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/images/play-icon.png"><?php echo $value['top_banner']['buttons']['button_text']; ?></a>
					 <?php 
					 }else{
						 $video_id = '';
						 $data_type = "";
						 if($value['about_us']['video_type']=="Youtube Video"){
							 $data_type = "youtube";
							 $yout_url = $value['top_banner']['buttons']['button_youtube_video'];
							 preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $yout_url, $match);
							 $video_id = $match[1];
						 
						 }elseif($value['top_banner']['buttons']['button_type']=="Vimeo Video"){
							 $data_type = "vimeo";
							 
							 $vimeo_url = $value['top_banner']['buttons']['button_vimeo_video'];
							 $video_id = substr(parse_url($vimeo_url, PHP_URL_PATH), 1);
			 
					 } ?>
		 
				
					 