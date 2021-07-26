<?php

get_header(); ?>
<!--Cereer top image-->
<div class="full_width career_top b_black clearfix">
<div class="in_1200">
<h1><?php the_title(); ?></h1>
</div>
</div>
<!--end Career top image-->
<!--orange & grey-->
<div class="full_width join_cont  float_full_height clearfix">
<div class="one_of_two white orange_back2">
<div class="max_600r join">
<h2><?php echo get_field('careers_slogan') ?></h2>
</div>
</div>
<div class="one_of_two grey_back">
<div class="max_600l">
<?php echo get_field('careers_text') ?></div>
</div>
</div>
<!-- end orange & grey-->

<!--jobs-->
<div class="full_width clearfix">
<div class="in_1200">

<?php 
          $careerJobs = new WP_Query(array(
            'posts_per_page' => -1,
            'post_type' => 'jobs',
           'orderby' => 'meta_value_num',
            'order' => 'ASC',
          ));

          while($careerJobs->have_posts()) {
            $careerJobs->the_post(); ?>
            
<div class="job_item">
<h5><?php the_title(); ?></h5>
<h4>What is the goal?</h4>
<?php the_content(); ?>

<div class="job_info">
<?php if( have_rows('jobs_hidden_section') ): ?>
 
    <?php while( have_rows('jobs_hidden_section') ): the_row(); ?>
 			<div>
			<h5><?php the_sub_field('jobs_hidden_title'); ?></h5>
			<?php the_sub_field('jobs_hidden_text'); ?>
			</div>
    <?php endwhile; ?>
 
<?php endif; ?>
<?php echo get_field('jobs_hidden_location') ?><br/>
<div class="jobs_form_cont">
<?php echo do_shortcode( '[contact-form-7 id="201" title="Career form"]' ) ?>
</div>
</div>
<h6>info ></h6>
</div>
<?php } wp_reset_postdata();
        ?>
</div>
</div>
<!--end jobs-->
<!--Team pics-->
<div class="full_width clearfix">
<div class="team_pics">
<div>
<img src="<?php echo get_theme_file_uri('images/career/team1.jpg') ?>" width="315" height="215" alt="Team1">
</div>
<div>
<img src="<?php echo get_theme_file_uri('images/career/team2.jpg') ?>" width="216" height="215" alt="Team2">
</div>
<div>
<img src="<?php echo get_theme_file_uri('images/career/team3.jpg') ?>" width="314" height="215" alt="Team3">
</div>
<div>
<img src="<?php echo get_theme_file_uri('images/career/team4.jpg') ?>" width="313" height="215" alt="Team4">
</div>
</div>
</div>
<!--end Team pics-->
<?php get_footer();

?>