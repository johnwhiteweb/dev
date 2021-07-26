<?php

get_header(); ?>
<!--About top image-->
<div class="full_width about_top clearfix">
<div class="in_1200 about">
<h1><?php the_title(); ?></h1>
<h3>
<?php echo get_field('about_top_text') ?>
</h3>
<div class="center_txt_cont">
<?php echo get_field('about_top_text2') ?></div>
</div>
</div>
<!--end About top image-->
<!--text w&b-->
<div class="full_width b_w clearfix">
<div class="one_of_two blue_back white">
<div class="max_600r">
<?php echo get_field('about_left_text') ?></div>
</div>
<div class="one_of_two grey_back">
<div class="max_600l">
<?php echo get_field('about_right_text') ?></div>
</div>
</div>
<!--end text w&b-->

<!--Team-->
<div class="full_width crew_cont clearfix">
<div class="in_1200 crew">

<div class="one_of_four">
<h2>Management team</h2>
</div>

<?php 
          $teamItems = new WP_Query(array(
            'posts_per_page' => -1,
            'post_type' => 'team',
            'order' => 'DSC',
          ));

          while($teamItems->have_posts()) {
            $teamItems->the_post(); ?>
             
             <div class="one_of_four team_sq no_color the_shape_down">
<h5><?php the_title(); ?></h5>
<p><?php echo get_field('position') ?></p>
<img src="<?php echo get_field('picture') ?>" width="247" height="247">
<div class="hold_hide">
<h4>X</h4>
<h5><?php the_title(); ?>, <?php echo get_field('position') ?></h5>
<p>
<?php the_content(); ?>
</p>
</div>
</div>   

			
	<?php } wp_reset_postdata();
        ?>



<div class="one_of_four empty_crew">
<img src="<?php echo get_theme_file_uri('images/about/empty.png') ?>" width="247" height="247" alt="place holder">
</div>
<div class="one_of_four empty_crew">
<img src="<?php echo get_theme_file_uri('images/about/empty.png') ?>" width="247" height="247" alt="place holder">
</div>
<div class="one_of_four join_us_t">
<a href="https://tactilemobility.com/careers/">
<img src="<?php echo get_theme_file_uri('images/about/join_us.png') ?>" width="247" height="247" alt="Join us">
</a>
</div>
</div>
</div>

<div class="full_width hidden_line clearfix">
<div class="in_1200">
<h4>X</h4>
<h5>&nbsp;</h5>
<p>
</p>
</div>
</div>
<!-- end Team-->
<?php 
get_footer('new');

?>