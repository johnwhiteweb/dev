<?php
	get_header('new');
	//global $post;
	//print_r($post);
	$category = get_queried_object();
	$category_name = $category->name;
	$post_type = get_post_type();
	//print_r($post_type);
?>

<div class="sub-page case-study k-center">
<section class="k-center-bg" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/k-center_bg.jpg');">
  <div class="container">
      <div class="text-box">
      <div class="btn-wrap"> <a class="btn btn-top" href="#">Resources</a></div>
    <h1><?php echo $category_name; ?></h1>
    <a class="btn btn-bottom" href="#">Read More</a>
      </div>
    </div>       
</section>

<nav class="nav-breadcrumb" aria-label="breadcrumb">
  <div class="container">
     <ol class="breadcrumb">
       <li class="breadcrumb-item"><a href="<?php echo get_home_url(); ?>">Home</a></li>
       <li class="breadcrumb-item"><a href="<?php echo get_home_url(); ?>/blog-template/">Resources</a></li>
       <li class="breadcrumb-item active" aria-current="page"><?php echo $category_name; ?></li>
     </ol>
    </div>
   </nav>
  
    
<section class="case-studies  you-may-like">
	<div class="container">
		<div class="title"><h2><?php echo $category_name; ?></h2><hr></div>
		<div class="row">
		<?php
		////////////////For Total POst Start///////////
			$args = array(
				'post_type' => $post_type,
				'posts_per_page' => -1,  
				'category' => $category->term_id
			
			);

			$myposts = get_posts( $args );
			$total = count($myposts);
		////////////////For Total Post End///////////
			
			
		////////////////For Pagination Strat///////////
			
			$per_page = 8;//define how many games for a page
			$count = $total;
			$pages = ceil($count/$per_page);
			
			$page = (isset($_GET['next'])) ? (int)$_GET['next'] : 1;
			$offset    = ($page - 1) * $per_page;
			
		////////////////For Pagination End///////////
			
			$args = array(
			'post_type' => $post_type,
			'posts_per_page' => $per_page,
			'offset' => $offset,
			'category' => $category->term_id
			
			);

			$myposts = get_posts( $args );
			$j = 1;
			foreach ( $myposts as $item ) {
				$image = wp_get_attachment_image_src( get_post_thumbnail_id( $item->ID ), 'single-post-thumbnail' );
				if($image){$image = $image[0];}else{$image = get_field("res_image", $item->ID);}
				
				//print_r($item);
				if($j == 4){
		?>
			
			<div class="col-md-8">
				<div class="box b-box" style="background-image:url(<?php echo $image; ?>)">
					<a href ="<?php echo get_the_permalink($item->ID); ?>">
						<div class="text-box">
							<h5><?php echo $item->post_title; ?></h5>
							<span class="date"><?php echo date('M d, Y', strtotime($item->post_date)); ?></span>
							<p><?php echo $item->post_content; ?></p>
							<h3 class="read-more">Read More <img src="<?php echo get_template_directory_uri(); ?>/images/chevron-right-icon.png"></h3>
						</div>
					</a>
				</div>
			</div>
			<?php }else{ ?>
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
							
							$content = substr($content, 0, 70);
							?>
							<p><?php echo $content; ?>...</p>
							<h3 class="read-more">Read More <img src="<?php echo get_template_directory_uri(); ?>/images/chevron-right-icon.png"></h3>
						</div>
					</a>
				</div>
			</div>
			
			
			<?php } ?>
		<?php
		$j++;
		}
		?>

		</div>
	</div>
</section>

<?php if($pages > 1){ ?>
  <nav aria-label="Page navigation example">
	<div class="container">
	<ul class="pagination">
		<?php
			//Show page links
			$half = round($pages/2);
			
			for ($i = 1; $i <= $pages; $i++){
		?>
		<?php if ($i<=3 || ($pages-3 < $i) ){ ?>
		
			<?php if ($pages==$i){ ?>
			<li class="page-item<?php echo ($i==$page ? " active" : ""); ?>"><a class="page-link" href="?next=<?php echo $i;?>"><i class="fa fa-angle-right"></i></a></li>
			
			<?php }else{ ?>
			<li class="page-item<?php echo ($i==$page ? " active" : ""); ?>"><a class="page-link" href="?next=<?php echo $i;?>"><?php echo $i;?></a></li>
			
			<?php } ?>
		<?php }else{ 
			if($i==$half){
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
<?php } ?>

 </div>


<script>
jQuery(document).ready(function($){


	$('.nav-open').on("click", function(e) {
	  e.preventDefault();
	  
	  $(this).toggleClass('nav-close');
	});
	
	
		
		
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
		

 
     });


	
</script>  

<?php get_footer('new');?>



