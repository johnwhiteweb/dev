<?php
get_header('new');
global $post;
$postID = $post->ID;
//print_r($post);

$categories = get_the_category( $postID );
$cat_id_array = array();
foreach($categories as $cat){
	$cat_id_array[] = $cat->term_id;
	
}

//print_r($category);

  $postcat = get_the_category( $post->ID );
 
?>
<div class="solution-page case-study article-page"><!--main div-->

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
                        <li><a class="icon whatsapp" target="_blank" href="https://wa.me/+972-4-375-0050?text=<?php echo $post->guid; ?>
"><i class="fa fa-whatsapp"></i></a></li>
                        </ul>
                      <span class="date-info"><?php echo date('M d, Y', strtotime($post->post_date)); ?> </span>
                    </div>
					<?php 
					  $image = wp_get_attachment_image_src( get_post_thumbnail_id( $postID ), 'single-post-thumbnail' );
						if($image){$image = $image[0];}else{$image = get_field("res_image", $item->ID);}
					  
					  ?>
					
					 <?php
					  $postcat = get_the_category( $post->ID );
					  ?>
					<?php 
					$content = preg_replace( "/<\/p>/", "</p><div class='img-box'><a class='sticker' href='".get_category_link($postcat[0]->term_id)."'><span class=''>".get_the_category( $item->ID )[0]->name."</span></a>" . get_the_post_thumbnail($post->ID, 'post-single')."</div>", wpautop( get_the_content() ), 1 );
					echo $content;
					?>
                      <!--<div class="sub-text">
                          <p>NEXTEER AUTOMOTIVE EXPANDS ITS GROWING SOFTWARE CAPABILITIES WITH AN INVESTMENT IN TACTILE MOBILITY, THE LEADING TACTILE VIRTUAL SENSING AND DATA COMPANY BASED IN ISRAEL.</p>
                      </div>
                      <div class="img-box"><img class="img-fluid" src="<?php echo $image; ?>"></div>
					  
                      <div class="text">
                          <p>Ut placet, inquam tum dicere exorsus est eligendi optio, cumque nihil est, necesse est, omnis voluptas assumenda est, qui blanditiis praesentium voluptatum adipiscendarum causa aut dolores suscipiantur maiorum voluptatum adipiscendarum causa aut fugit, sed uti oratione perpetua malo quam.<br>
                            Hanc ego cum memoriter, tum etiam erga nos amice et aperta iudicari ea quid sit sentiri haec ratio late patet in quo aut fugit, sed ipsius honestatis decore laudandis, id omnia referri oporteat, ipsum per se repellere, idque facere.
                        </p>
                      </div>
                        <div class="text-border">
                          <p>Ut placet, inquam tum dicere exorsus est eligendi optio, cumque nihil est, necesse est, omnis voluptas assumenda est, qui blanditiis praesentium voluptatum adipiscendarum causa aut dolores suscipiantur maiorum voluptatum adipiscendarum causa aut fugit, sed uti oratione perpetua malo quam.<br>
                              Hanc ego cum memoriter, tum etiam erga nos amice et aperta iudicari ea quid sit sentiri haec </p>
                        </div>
                        <div class="text">
                          <h5>NEXTEER AUTOMOTIVE’S</h5>
                          <p>Ut placet, inquam tum dicere exorsus est eligendi optio, cumque nihil est, necesse est, omnis voluptas assumenda est, qui blanditiis praesentium voluptatum adipiscendarum causa aut dolores suscipiantur maiorum voluptatum adipiscendarum causa aut fugit, sed uti oratione perpetua malo quam.<br>
                              Hanc ego cum memoriter, tum etiam erga nos amice et aperta iudicari ea quid sit sentiri haec ratio late patet in quo aut fugit, sed ipsius honestatis decore laudandis, id omnia referri oporteat, ipsum per se repellere, idque facere.
                              </p>
                        </div>
                        <div class="text">
                            <span><p> «Ut placet, inquam tum dicere exorsus est eligendi optio, cumque nihil est, necesse <br>est, omnis voluptas assumenda est» </p></span>
                          </div>
                          <div class="text">
                              <p>Ut placet, inquam tum dicere exorsus est eligendi optio, cumque nihil est, necesse est, omnis voluptas assumenda est, qui blanditiis praesentium voluptatum adipiscendarum causa aut dolores suscipiantur maiorum voluptatum adipiscendarum causa aut fugit, sed uti oratione perpetua malo quam.<br>
                                  Hanc ego cum memoriter, tum etiam erga nos amice et aperta iudicari ea quid sit sentiri haec
                                  </p>
                            </div>
                            <div class="text">
                                <ul>
                                   <li>Ut placet, inquam tum dicere exorsus est eligendi optio, cumque nihil est, necesse est, omnis voluptas assumenda est, qui blanditiis praesentium voluptatum adipiscendarum causa aut dolores suscipiantur maiorum voluptatum adipiscendarum causa aut fugit, sed uti oratione perpetua malo quam.</li>
                                   <li>Hanc ego cum memoriter, tum etiam erga nos amice et aperta iudicari ea quid sit sentiri haec </li>
                                  </ul>
                              </div>
                              <div class="text">
                               <ol>
                                  <li>Ut placet, inquam tum dicere exorsus est eligendi optio, cumque nihil est, necesse est, omnis voluptas assumenda est, qui blanditiis praesentium voluptatum adipiscendarum causa aut dolores suscipiantur maiorum voluptatum adipiscendarum causa aut fugit, sed uti oratione perpetua malo quam.</li>
                                  <li>Hanc ego cum memoriter, tum etiam erga nos amice et aperta iudicari ea quid sit sentiri haec </li>
                               </ol>
                              </div>-->
					<?php if( in_array( 9 ,$cat_id_array ) || in_array( 11 ,$cat_id_array ) ){?>		  
					<div class="presenters-info">
                      <div class="title"><h2>PRESENTERS</h2><hr></div>
                      <div class="row">
                          <div class="col-md-3 col-6 text-center">
                            <div class="img-box"><img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/images/oval1.png"></div>
                            <h5>David Ben Gurion</h5>
                            <p>CEO, Tactile</p>
                          </div>
                            <div class="col-md-3 col-6 text-center">
                                <div class="img-box"><img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/images/oval1.png"></div>
                                <h5>Tan Wuhan</h5>
                                <p>CEO, Tactile</p>
                            </div>
                                <div class="col-md-3 col-6 text-center">
                                    <div class="img-box"><img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/images/oval1.png"></div>
                                    <h5>Homayoun Shakibaii</h5>
                                    <p>CEO, Tactile</p>
                                </div>
                                <div class="col-md-3 col-6 text-center">
                                    <div class="img-box"><img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/images/oval1.png"></div>
                                    <h5>Alexa Richardson</h5>
                                    <p>CEO, Tactile</p>
                                </div>
                      </div>
                    </div>

                    <form>
                      <h2 class="heading">SIGN UP</h2>
                       <p class="sub-heading">Fill out the form to sign up for the webinar</p>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                            <div class="form-group floating-label-group">
                            <input  class="form-control" placeholder="" autocomplete="off" required="" type="text">
                            <lable class="floating-label">First Name</lable>
                            </div>
                            </div>                         
                            <div class="col-md-6 col-sm-6">
                            <div class="form-group floating-label-group">
                            <input class="form-control" placeholder="" autocomplete="off" required="" type="text">
                            <lable class="floating-label">Last Name</lable>
                            </div>
                            </div>                         
                            <div class="col-md-6 col-sm-6">
                            <div class="form-group floating-label-group">
                            <input class="form-control border-bottm" placeholder="" autocomplete="off" required="" type="text">
                            <lable class="floating-label">Phone</lable>
                            </div>
                            </div>                         
                            <div class="col-md-6 col-sm-6">
                            <div class="form-group floating-label-group">
                            <input class="form-control border-bottm" placeholder="" autocomplete="off" required="" type="text">
                            <lable class="floating-label">Email</lable>
                            </div>
                            </div>
                            <p>Subject to our <a href="#">privacy policy</a> </p>                            
                        </div>
                        <button class="btn"><img src="<?php echo get_template_directory_uri(); ?>/images/play-copy.png">RESERVE YOUR SEAT</button>
                    </form>
					<?php }//if in array ?>
					
                   </div>
               </div>
              
               <div class="col-md-4">
                   <div class="blog-box">
					<?php 
					 $postcat = get_the_category( $post->ID );
					
					?>
                       <h3 class="active">LATEST <?php echo $postcat[0]->name ?></h3>
					   <?php 
						$args = array(
							'posts_per_page' => 3, /* how many post you need to display */
							'offset' => 0,
							'category' => $postcat[0]->term_id,
							'orderby' => 'post_date',
							'order' => 'DESC',
							'post_type' => 'post', /* your post type name */
							'post_status' => 'publish'
						);
						$latest_posts = get_posts( $args );
						$i=1;
						foreach ( $latest_posts as $litem ) {
						?>
						<span class="date-info<?php echo ($i==1 ? " mb-3" : ""); ?>"><?php echo date('M d, Y', strtotime($litem->post_date)); ?> </span>
						<?php 
						//$content=strpos($item->post_content, ' ', 100);
						$p_title = strip_tags($litem->post_title);
						$p_title = trim($p_title);
						$p_title = substr($p_title, 0, 70);
						?>
						<a href="<?php echo get_the_permalink($litem->ID); ?>"><h4 class="<?php //echo ($i==1 ? "active" : ""); ?>"><?php echo $p_title; ?>..</h4></a>
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
					<li><a class="icon whatsapp" target="_blank" href="https://wa.me/+972-4-375-0050?text=<?php echo $post->guid; ?>
"><i class="fa fa-whatsapp"></i></a></li>
				</ul>
              </div>

              <div class="you-may-like case-studies">
                <div class="container">
                <div class="title"><h2>You may also like</h2><hr></div>
                <div class="row">
				<?php 
				$args = array(
					'posts_per_page' => 3, /* how many post you need to display */
					'offset' => 0,
					'orderby' => 'post_date',
					'order' => 'DESC',
					'post_type' => 'post', /* your post type name */
					'post_status' => 'publish'
				);
				$myposts = get_posts( $args );
				
				foreach ( $myposts as $item ) {
					$image = wp_get_attachment_image_src( get_post_thumbnail_id( $item->ID ), 'single-post-thumbnail' );
					if($image){$image = $image[0];}else{$image = get_field("res_image", $item->ID);}
				?>
				<div class="col-md-4">
					<div class="box">
						<a href ="<?php echo get_the_permalink($item->ID); ?>">
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
				   $postcat = get_the_category( $item->ID );
				 ?>
				<a href="<?php echo get_category_link($postcat[0]->term_id); ?>" class="sticker"><span class="<?php echo get_the_category( $item->ID )[0]->slug; ?>"><?php echo get_the_category( $item->ID )[0]->name; ?></span></a>
					</div>
				</div>
				
				<?php 
				}
				
				?>
                </div>
              </div>
              </div>

              <div class="contact-us">
                <div class="container">
                  <div class="row">
                    <div class="col-md-6">
                      <h2>Get the inside scoop on news<br>
                          and updates from TACTILE MOBILITY</h2>
                    </div>
                    <div class="col-md-6">
                        <div class="input">
                            <div class="input-container">
                              <input type="email" class="input-field" placeholder="Enter your email address" />
                              <button type="submit" class="input-field-shadow">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/plane-icon.png">
                              </button>
                            </div>                             
                            </div>
                            <p>Subject to our privacy policy</p>
                          </div>
                          
                    </div>
                  </div>
                </div>

              </div>

           </div>
       </div>
   </section>

</div><!--main div end-->

<script>
jQuery(document).ready(function($){

	$('.nav-open').on("click", function(e) {
		e.preventDefault();

		$(this).toggleClass('nav-close');

	});

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
	
	
	$('input.form-control').focus(function() {
		$(this).parent('.form-group').addClass('active-lable');
	}).focusout(function() {
		if($(this).val()==""){
			$(this).parent('.form-group').removeClass('active-lable');
		}
	});



});

</script>

<?php 
get_footer('new');
?>