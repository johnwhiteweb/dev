<?php
	get_header(); 
	$category = get_queried_object();
	$category_name = $category->name; 
?>

<!--Resources top image-->
<div class="full_width resources_top b_black clearfix">
<div class="in_1200">
<h1>Resources-<?php echo $category_name ?></h1>
</div>
</div>
<!--end Resources top image-->

<div class="full_width orange_back clearfix">
<div class="in_1200">
<?php
       $args = array(
       'type'                     => 'resources',
       'child_of'                 => 0,
       'parent'                   => '',
       'orderby'                  => 'name',
       'order'                    => 'ASC',
       'hide_empty'               => 1,
       'hierarchical'             => 1,
       'taxonomy'                 => 'category',
       'pad_counts'               => false );
       $categories = get_categories($args);
        echo '<ul class="category_menu">';

       foreach ($categories as $category) {
         $url = get_term_link($category); ?>
          <li class="<?php echo $category->name; ?>"><a href="<?php echo $url;?>"><?php echo $category->name; ?></a></li>
         <?php
       }
       echo '</ul>';
   ?>
</div>
</div>
<script>
jQuery('ul.category_menu li.<?php echo $category_name ?>').css('border', '2px solid white');
</script>


<div class="full_width press_cont in_category clearfix">
<div>


<?php 
          $resourcescategory = new WP_Query(array(
            'posts_per_page' => -1,
            'post_type' => 'resources',
            'meta_key'			=> 'res_date',
			'orderby'			=> 'meta_value',
            'order' => 'DSC',
          ));

          while($resourcescategory->have_posts()) {
            $resourcescategory->the_post();
            if ( in_category( $category_name ) ) :
            ?>
                <div class="in_1200 press_item">
		<div class="two_third">
		<h6><?php echo get_field('res_date') ?></h6>
                <h5><?php the_title(); ?></h5>
                <div class="press_txt">
			<?php the_content(); ?>
			</div>
			
	<?php

if(get_field('res_link'))
{
	echo '<a href="' . get_field('res_link') . '" target="_blank">Read more</a>';
}
if(get_field('res_file'))
{
	echo '<a class="linked_file" href="' . get_field('res_file') . '" target="_blank"><img src="' . get_theme_file_uri('images/resources/files.png') . '" width="60" height="73" alt="Download file"></a>';
}

?>
			
</div>
<div class="one_third">
<div class="press_img_cont">
<img src="<?php echo get_field('res_image') ?>">
</div>
</div>
</div>

          <?php endif; } wp_reset_postdata();
        ?>


</div>
</div>
<?php get_footer();

?>