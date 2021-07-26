<?php
	get_header('new');
	//global $post;
	//print_r($post);
	$category = get_queried_object();
	$category_name = $category->name;
	$post_type = get_post_type();
	//print_r($post_type);

$header_image = ['url'=>''];
$header_image = get_field('header_image', $category);
	
$featured_post = get_posts( ['numberposts'=>1,'orderby'=>'publish_date','sort_order' => 'desc','category'=>$category->term_id,'meta_query'=>['relation'=> 'AND',['key'=>'is_featured','value'=>true] ] ] );
if(!empty($featured_post)){

if(!empty($img = get_field('header_image',$featured_post[0]->ID)))
$header_image = $img;
}

?>

<div class="sub-page case-study k-center">
<section class="k-center-bg" style="background-image: url('<?php echo $header_image['url']; ?>');">
  <div class="container">
      <div class="text-box">
	  <a class="btn btn-top" href="#"><?php echo $category_name; ?></a>



	  <div class="center_txt_cont"><p><?php echo category_description(); ?></p>
	   </div> 

	   <?php if(!empty($featured_post)){ ?>
    <h1><?php echo $featured_post[0]->post_title; ?></h1>
    <a class="btn btn-bottom" href="<?php echo get_the_permalink($featured_post[0]->ID); ?>"><?=get_field('read_more_text',$featured_post[0]->ID)?></a>
	  <?php } ?>
     </div>
    </div>       
</section>

<nav class="nav-breadcrumb" aria-label="breadcrumb">
  <div class="container">
     <ol class="breadcrumb">
       <li class="breadcrumb-item"><a href="<?php echo get_home_url(); ?>">Home</a></li>
       <li class="breadcrumb-item"><a href="<?php echo get_home_url(); ?>/resource/">Resources</a></li>
       <li class="breadcrumb-item active" aria-current="page"><?php echo $category_name; ?></li>
     </ol>
    </div>
   </nav>
  
    
<section class="case-studies you-may-like">
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
			
			$per_page = 8;
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
				<div class="box b-box" style="/*background-image:url(<?php echo $image; ?>)*/">
					<a href ="<?php echo get_the_permalink($item->ID); ?>">
					<img src="<?php echo $image; ?>" style="max-width:100%;">
						<div class="text-box">
							<h5><?php echo $item->post_title; ?></h5>
							<span class="date"><?php echo date('M d, Y', strtotime($item->post_date)); ?></span>
							
							<p ><h2 class="field field-name-field-penton-content-summary field-type-text-long field-label-hidden"><?php echo $item->post_excerpt; ?></h2></p>
							<h3 class="read-more">Read More <img src="<?php echo get_template_directory_uri(); ?>/images/chevron-right-icon.png"></h3>
						</div>
					</a>
				</div>
			</div>
			<?php }else{ ?>
			<div class="col-md-4">
				<div class="box">
					<a class="cat" href ="<?php echo get_the_permalink($item->ID); ?>">
						<div class="img-box"><img class="img-fluid" src="<?php echo $image; ?>"></div>
						<div class="text-box">
							<h5><?php echo $item->post_title; ?></h5>
							<span class="date"><?php echo date('M d, Y', strtotime($item->post_date)); ?></span>
							<?php
							//$content=strpos($item->post_content, ' ', 100);
							if(!empty($item->post_excerpt)){
								$content = strip_tags($item->post_excerpt);
							}else{
							$content = strip_tags($item->post_content);
							}
							$content = trim($content);
							$content = substr($content, 0, 80);
							?>
							<p ><?php echo $content; ?>...</p>
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
			
				<?php 
							
							$next_page = $page + 1;
							if($next_page >= $pages ){
								$next_page = $next_page -1;
							} ?>
			<li class="page-item<?php echo ($m==$page ? " active" : ""); ?>">
						<a class="page-link" href="?cat_tab=all_cat&all_pag=<?php echo $next_page;?>"><i class="fa fa-angle-right"></i></a></li>
						
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



