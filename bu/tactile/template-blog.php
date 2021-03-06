<?php
/**
* Template Name: Blog 
*/

get_header('new');
global $post;
$postID = $post->ID;

?>

<div class="k-center all-center"><!--main div-->

<?php $top_banner = get_field('top_banner', $postID); ?>
<section class="k-center-bg" style="background-image: url('<?php echo $top_banner['desktop_image']; ?>');">
  <div class="container">
      <div class="text-box">
       <a class="btn btn-top" href="#"><?php echo $top_banner['top_button']['button_text']; ?></a>
		<h1><?php echo $top_banner['heading']; ?></h1>
	   <div class="center_txt_cont"><p><?php echo $top_banner['content']; ?></p>
	   </div> 
		<?php if($top_banner['buttons']['button_text']) { ?> 
		<a class="btn btn-bottom" href="#"><?php echo $top_banner['buttons']['button_text']; ?></a>
		<?php } ?>
      </div>

      <ul class="nav nav-tabs nav-justified d-none d-md-block" role="tablist">
        <li class="nav-item"><a class="nav-link cat_tabs all<?php echo (isset($_GET['cat_tab']) && $_GET['cat_tab']=='all_cat' ? " active" : (!isset($_GET['cat_tab']) ? " active" : "")); ?>" href="#content-all"  id="show_all" data-toggle="tab" data-value="all">All</a></li>
		<?php
		$args = array(
			'hide_empty'      => true,
		);
		$categories = get_categories($args);
		$i=1;
		foreach($categories as $category) {
			//print_r($category);
		?>
		<li class="nav-item"><a class="nav-link <?php echo $category->slug;?><?php echo (isset($_GET['cat_tab']) && $_GET['cat_tab']==$category->slug ? " active" : ""); ?> cat_tabs" data-toggle="tab" data-value="other" href="#content-<?php echo $i; ?>"><?php echo $category->name; ?></a></li>
		<?php
		$i++;		
		}
		?>
      </ul> 

	  
      <ul class="nav nav-tabs nav-justified d-block d-md-none" role="tablist">
        <li class="nav-item"><a class="nav-link cat_tabs all<?php echo (isset($_GET['cat_tab']) && $_GET['cat_tab']=='all_cat' ? " active" : (!isset($_GET['cat_tab']) ? " active" : "")); ?>" href="#"  id="show_all" data-toggle="tab" data-value="all">All</a></li>
		<?php
		$args = array(
			'hide_empty'      => true,
		);
		$categories = get_categories($args);
		$i=1;
		foreach($categories as $category) {
			//print_r($category);
		?>
		<li class="nav-item"><a class="nav-link <?php echo $category->slug;?><?php echo (isset($_GET['cat_tab']) && $_GET['cat_tab']==$category->slug ? " active" : ""); ?> cat_tabs" data-toggle="tab" data-value="other" href="#content-m-<?php echo $i; ?>"><?php echo $category->name; ?></a></li>
		<?php
		$i++;		
		}
		?>
      </ul> 
	  
	  
    </div> 
</section>

<nav class="nav-breadcrumb" aria-label="breadcrumb">
  <div class="container">
     <ol class="breadcrumb">
       <li class="breadcrumb-item"><a href="<?php echo home_url(); ?>">Home</a></li>
       <li class="breadcrumb-item active" aria-current="page"> Resources</li>
     </ol>
    </div>
   </nav>

    


   <div class="tab-content  d-none d-md-block">
   
   <?php
	$j=1;
	$args = array(
	'hide_empty'      => true,
	);
	$categories = get_categories($args);
   foreach($categories as $category) { 
   ?>
    <div id="content-<?php echo $j; ?>" class="container tab-pane<?php echo (isset($_GET['cat_tab']) && $_GET['cat_tab']==$category->slug ? " active" : ""); ?>"><br>
      <div class="case-studies  you-may-like">
        <div class="container">
          <div class="title"><h2><?php echo $category->name; ?></h2><a href="<?php echo get_category_link($category->term_id); ?>"><span class="see-all">see all</span></a><hr></div>
			<div class="row Mobail-slider">
			<?php
			////////////////For Total POst Start///////////
								
				$args = array(
					'post_type' => 'post',
					'posts_per_page' => -1,
					'post_status' => 'publish',
					'category' => $category->term_id
				
				);

				$myposts = get_posts( $args );
				
				$total = count($myposts);
				
			////////////////For Total Post End///////////
				
				
			////////////////For Pagination Strat///////////
				
				$per_page = 9;//define how many games for a page
				$count = $total;
				$pages = ceil($count/$per_page);
				
				$page = (isset($_GET[$category->term_id.'pag'])) ? (int)$_GET[$category->term_id.'pag'] : 1;
				$offset    = ($page - 1) * $per_page;
				
			////////////////For Pagination End///////////
				
				$args = array(
					'post_type' => 'post',
					'post_status' => 'publish',
					'posts_per_page' => $per_page,
					'offset' => $offset,
					'category' => $category->term_id
				);

				$myposts = get_posts( $args );
				$o = 1;
				foreach ( $myposts as $item ) {
					$image = wp_get_attachment_image_src( get_post_thumbnail_id( $item->ID ), 'single-post-thumbnail' );
					if($image){$image = $image[0];}else{$image = get_field("res_image", $item->ID);}
					
					//print_r($item);
			?>
				<div class="col-md-4<?php echo ($o > 3 ? " at_all_hide" : ""); ?>">
				<div class="box">
				  <a href ="<?php echo get_the_permalink($item->ID); ?>">
				<div class="img-box"><img class="img-fluid" src="<?php echo $image; ?>"></div>
				<div class="text-box">
				  <h5><?php echo $item->post_title; ?></h5>
				  <span class="date"><?php echo date('M d, Y', strtotime($item->post_date)); ?></span>
				  <?php 
					//$content=strpos($item->post_content, ' ', 100);
					/*
					$content = strip_tags($item->post_content);
					
					$content = substr($content, 0, 100);*/
					
			
						$content= $item->post_excerpt;
						if(empty($content)){
						$content = strip_tags($item->post_content);
						}
						
						$content = substr($content, 0, strpos($content, ' ', 100));

					?>
					<p><?php echo $content; ?>....</p>
				  <h3 class="read-more">Read More <img src="<?php echo get_template_directory_uri(); ?>/images/chevron-right-icon.png"></h3>
				</div>
				</a>
				</div>
			  </div>
			<?php
				$o++;
				}//post for
			?>
			  
			</div>
			<?php if($pages > 1){ ?>
			  <nav class="pagination" aria-label="Page navigation example">
				<div class="container">
				<ul class="pagination">
					<?php
						//Show page links
						$half = round($pages/2);
						
						for ($m = 1; $m <= $pages; $m++){
					?>
					<?php if ($m<=3 || ($pages-3 < $m) ){ ?>
					
						<?php if ($pages==$m){ ?>
						<li class="page-item<?php echo ($m==$page ? " active" : ""); ?>"><a class="page-link" href="?cat_tab=<?php echo $category->slug; ?>&<?php echo $category->term_id; ?>pag=<?php echo $m;?>"><i class="fa fa-angle-right"></i></a></li>
						
						<?php }else{ ?>
						<li class="page-item<?php echo ($m==$page ? " active" : ""); ?>"><a class="page-link" href="?cat_tab=<?php echo $category->slug; ?>&<?php echo $category->term_id; ?>pag=<?php echo $m;?>"><?php echo $m;?></a></li>
						
						<?php } ?>
					<?php }else{ 
						if($m==$half){
					?>
					
					<li class="page-item dots">...</li>
					
					<?php 
						}
					} 
					?>
					
					
					
					<?php           
					  } //for
					?>
				  
				</ul>
			  </div>
			  </nav>
			<?php } //if pages ?>
			
			
		</div>
	 </div>
    </div>
	

	
		<?php
		$j++;		
		} //cat for
		?>
		
	<div id="content-all" class="container tab-pane<?php echo (isset($_GET['cat_tab']) && $_GET['cat_tab']=='all_cat' ? " active" : (!isset($_GET['cat_tab']) ? " active" : "")); ?>"><br>
      <div class="case-studies  you-may-like">
        <div class="container">
          <!--<div class="title"><h2>All</h2><a href=""><span class="see-all">All</span></a><hr></div>-->
			<div class="row Mobail-slider">
			<?php
			////////////////For Total POst Start///////////
								
				$args = array(
					'post_type' => 'post',
					'posts_per_page' => -1,
					'post_status' => 'publish'
					
				
				);

				$myposts = get_posts( $args );
				
				$total = count($myposts);
				
			////////////////For Total Post End///////////
				
				
			////////////////For Pagination Strat///////////
				
				$per_page = 9;//define how many games for a page
				$count = $total;
				$pages = ceil($count/$per_page);
				
				$page = (isset($_GET['all_pag']) ? (int)$_GET['all_pag'] : 1);
				$offset    = ($page - 1) * $per_page;
				
			////////////////For Pagination End///////////
				
				$args = array(
					'post_type' => 'post',
					'post_status' => 'publish',
					'orderby' => 'date',
					'order'   => 'DESC',
					'ignore_custom_sort' => true,
					'suppress_filters' => true,
					'posts_per_page' => $per_page,
					'offset' => $offset
				);

				$myposts = get_posts( $args );
				foreach ( $myposts as $item ) {
					$image = wp_get_attachment_image_src( get_post_thumbnail_id( $item->ID ), 'single-post-thumbnail' );
					if($image){$image = $image[0];}else{$image = get_field("res_image", $item->ID);}
					
					//print_r($item);
			?>
				<div class="col-md-4">

				<div class="box">



				  <a href ="<?php echo get_the_permalink($item->ID); ?>">
				<div class="img-box"><img class="img-fluid" src="<?php echo $image; ?>"></div>
				<div class="text-box">
				  <h5><?php echo $item->post_title; ?></h5>
				  <span class="date"><?php echo date('M d, Y', strtotime($item->post_date)); ?></span>
				  <?php 
		
		$content= $item->post_excerpt;
		if(empty($content)){
		$content = strip_tags($item->post_content);
		}
		$excerpt_length = strlen($content);
		if($excerpt_length>=100){
			$content = substr($content, 0, strpos($content, ' ', 100));
			//  echo '100 :'.$excerpt_length."\n";
		}elseif($excerpt_length>=50){
			$content = substr($content, 0, strpos($content, ' ', 50));
			// echo '50 :'.$excerpt_length."\n";
		}else{
			$content = substr($content, 0, strpos($content, ' ', 20));
			// echo '20 :'.$excerpt_length."\n";	
		}
		
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
				
				}//post for
			?>
			  
			</div>
			<?php if($pages > 1){ ?>
			  <nav class="pagination" aria-label="Page navigation">
				<div class="container">
				<ul class="pagination">
					<?php
						//Show page links
						$half = round($pages/2);
						
						for ($m = 1; $m <= $pages; $m++){
					?>
					<?php if ($m<=3 || ($pages-3 < $m) ){ ?>
					
						<?php if ($pages==$m){ ?>
							
							<?php 
							
							$next_page = $page + 1;
							if($next_page >= $pages ){
								$next_page = $next_page -1;
							} ?>
						<li class="page-item<?php echo ($m==$page ? " active" : ""); ?>">
						<a class="page-link" href="?cat_tab=all_cat&all_pag=<?php echo $next_page;?>"><i class="fa fa-angle-right"></i></a></li>
						
						<?php }else{ ?>
						<li class="page-item<?php echo ($m==$page ? " active" : ""); ?>"><a class="page-link" href="?cat_tab=all_cat&all_pag=<?php echo $m;?>"><?php echo $m;?></a></li>
						
						<?php } ?>
					<?php }else{ 
						if($m==$half){
					?>
					
					<li class="page-item dots">...</li>
					
					<?php 
						}
					} 
					?>
					
					
					
					<?php           
					  } //for
					?>
				  
				</ul>
			  </div>
			  </nav>
			<?php } //if pages ?>
			
			
		</div>
	 </div>
    </div>
	
	
  </div>
  
  
  
  
  
  
  
  
  
  <div class="tab-content  d-block d-md-none">

	<?php
	$j=1;
	$args = array(
	'hide_empty'      => true,
	);
	$categories = get_categories($args);
   foreach($categories as $category) { 
   //print_r($category);
   
   if($category->count >=2 ){ 
   ?>


<div id="content-m-<?php echo $j; ?>" class="container tab-pane <?php if(!isset($_GET['cat_tab'])) echo 'active';  if(isset($_GET['cat_tab']) && $_GET['cat_tab']==$category->slug) echo 'active'; ?>"><br>
    <div class="case-studies  you-may-like">
        <div class="container">
          <div class="title"><h2><?php echo $category->name; ?></h2><a href="<?php echo get_category_link($category->term_id); ?>"><span class="see-all">see all</span></a><hr></div>
			<div class="row Mobail-slider">
			
			<?php 
			$args = array(
				'post_type' => 'post',
				'post_status' => 'publish',
				'posts_per_page' => 10,
				'category' => [$category->term_id],
				
				
			);

			$myposts = get_posts( $args );
			
			
			foreach ( $myposts as $item ) {
				$image = wp_get_attachment_image_src( get_post_thumbnail_id( $item->ID ), 'single-post-thumbnail' );
				if($image){$image = $image[0];}else{$image = get_field("res_image", $item->ID);}
			?>
			
			
			<div class="col-md-4 col-mobile">
				<div class="box">
				  <a href ="<?php echo get_the_permalink($item->ID); ?>">
				<div class="img-box"><img class="img-fluid" src="<?php echo $image; ?>"></div>
				<div class="text-box">
				  <h5><?php echo $item->post_title; ?></h5>
				  <span class="date 55"><?php echo date('M d, Y', strtotime($item->post_date)); ?></span>
				  <?php 
					//$content=strpos($item->post_content, ' ', 100);
					/*$content = strip_tags($item->post_content);
					
					$content = substr($content, 0, 100);*/
					$content= $item->post_excerpt;
						if(empty($content)){
						$content = strip_tags($item->post_content);
						}
						
						$content = substr($content, 0, strpos($content, ' ', 100));
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
				
				}//post for
			?>
			</div>
		</div>
	</div>
</div>	
   <?php } ?>
   <?php $j++;} ?>
  </div>
  
  
  
  
  
</div><!--main div end-->



<script>
jQuery(document).ready(function($){
	if ($(window).width() < 769){
		$('.Mobail-slider').slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			dots: false,
			infinite: true,
			arrows: false,
			autoplay: true,
			autoplaySpeed: 2000,
			centerMode: true,
		});
		jQuery('ul li a').click(function(){
			jQuery('.Mobail-slider').slick('refresh');
		});
	}
	
	$(window).resize(function() {
		if ($(window).width() < 769){
			$('.Mobail-slider').slick({
				slidesToShow: 1,
				slidesToScroll: 1,
				dots: false,
				infinite: true,
				arrows: false,
				autoplay: false,
				autoplaySpeed: 2000,
				centerMode: true,
			});
			jQuery('ul li a').click(function(){
				jQuery('.Mobail-slider').slick('refresh');
			});
		}
	});

	if ($(window).width() < 769){
		$('.nav-tabs').slick({
			slidesToShow: 4,
			slidesToScroll: 1,
			dots: false,
			infinite: false,
			arrows: false,
			autoplay: false,
			autoplaySpeed: 2000,
			responsive: [
   
			{
			breakpoint: 480,
			settings: {
			slidesToShow: 3,
			slidesToShow: 1
			}
			}
			]

		});
		$("a.nav-link").on("click", function() {
			$("a.nav-link").removeClass("active");
			$(this).addClass("active");
			var data_val = $(this).attr("href");
			
			$(".tab-pane").hide();
			$(data_val).show();
			console.log("A",data_val);
			
			if(data_val=='#'){
				$(".tab-pane").show();
			}
			
		});
	
	}
	$(window).resize(function() {
		if ($(window).width() < 769){
			$('.nav-tabs').slick({
				slidesToShow: 1,
				slidesToScroll: 1,
				dots: false,
				infinite: true,
				arrows: false,
				autoplay: false,
				autoplaySpeed: 2000,
				centerMode: true,
			});
		
		}
	});

	
	/* $(".cat_tabs").on("click", function() {
		var data_val = $(this).attr("data-value");
		//alert(data_val);
		
		if(data_val=="all"){
			$(".at_all_hide").hide();
			$(".pagination").hide();	
		}else if(data_val=="other"){
			$(".at_all_hide").show();
			$(".pagination").show();	
		}
		
	}); */
	
	
	(function($) {
		$.fn.writeText = function(content) {
			var contentArray = content.split(""),
				current = 0,
				elem = this;
			setInterval(function() {
				if(current < contentArray.length) {
					elem.text(elem.text() + contentArray[current++]);
				}
			}, 100);
		};

	})(jQuery);
	
	var heading = $(".k-center-bg").find("h1");
	var heading_txt = $(heading).text();
	$(heading).text("");
	$(heading).writeText(heading_txt);
	
	
	
	
	imageHeight = 0;
	
$('.img-box .img-fluid').each(function() {
	if($(this).height() < 250){
	let thisHeight = 300 - $(this).height()
		$(this).addClass('shortImage');
		// $(this).css("padding-bottom", thisHeight, "px");
	}
	// $(this).height() < 250 ? $(this).addClass('shortImage') : null;

	// check if image is shorter then 250
	//take the %
	// if it is:  padding: 15px 15px 62px 15px;
	imageHeight < $(this).height() ? imageHeight = $(this).height() : null
});
// $('.img-box .img-fluid').css("height", titleHeight, "px");
				
 
}); //ready

</script>  

<?php 

get_footer('new');

?>


