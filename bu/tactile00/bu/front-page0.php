<?php

get_header(); ?>
<div class="pop_up <?php the_field('pop_up_on'); ?>">
<h4>X</h4>
<a href="<?php echo get_field('pop_up_link') ?>" target="_blank"></a>
</div>
<!--first fold-->
<div class="full_width hp_top">
<div class="hp_top_cont">
<div class="hp_dots1">
<img src="<?php echo get_theme_file_uri('images/hp/dot.png') ?>" width="126" height="128" alt="Dot">
<img src="<?php echo get_theme_file_uri('images/hp/dot.png') ?>" width="126" height="128" alt="Dot">
<img src="<?php echo get_theme_file_uri('images/hp/dot.png') ?>" width="126" height="128" alt="Dot">
</div>
<div class="hp_dots2">
<img src="<?php echo get_theme_file_uri('images/hp/dot.png') ?>" width="126" height="128" alt="Dot">
<img src="<?php echo get_theme_file_uri('images/hp/dot.png') ?>" width="126" height="128" alt="Dot">
</div>
<div class="hp_dots3">
<img src="<?php echo get_theme_file_uri('images/hp/dot.png') ?>" width="126" height="128" alt="Dot">
<img src="<?php echo get_theme_file_uri('images/hp/dot_none.png') ?>" width="126" height="128" alt="Dot">
<img src="<?php echo get_theme_file_uri('images/hp/dot.png') ?>" width="126" height="128" alt="Dot">
</div>
<h1><?php the_content(); ?></h1>
</div>
</div>
<!--end first fold-->
<!--tactile-->
<div class="full_width hp_2 float_full_height clearfix">
<div class="one_of_two">
<div class="max_600r">
<h2><?php echo get_field('tactile') ?></h2>
<?php echo get_field('tactile_text') ?>
</div>
</div>
<div class="one_of_two orange_back">
<div class="max_600l">
<h3><?php echo get_field('tactile_right_text') ?></h3>
</div>
</div>
</div>
<!--end tactile-->
<!--Solutions-->
<div class="full_width hp_solutions float_full_height clearfix">
<div class="one_of_two">
</div>
<div class="one_of_two">
<div class="max_600l">
<h2><?php echo get_field('hp_solutions_title') ?></h2>
<h5><?php echo get_field('hp_solutions_sub_title') ?></h5>
<?php echo get_field('hp_solutions_text') ?>
<a href="solutions">READ MORE <img src="<?php echo get_theme_file_uri('images/contact/send.png') ?>" width="21" height="21" alt="READ MORE"></a>
<div class="icons clearfix">
<div class="one_of_3">
<a href="solutions#oem_">
<img src="<?php echo get_field('hp_solutions_image1') ?>">
</a>
<?php echo get_field('hp_solutions_image_text1') ?>
</div>
<div class="one_of_3">
<a href="solutions#mapping_">
<img src="<?php echo get_field('hp_solutions_image2') ?>">
</a>
<?php echo get_field('hp_solutions_image_text2') ?>
</div>
<div class="one_of_3">
<a href="solutions#fleet_">
<img src="<?php echo get_field('hp_solutions_image3') ?>">
</a>
<?php echo get_field('hp_solutions_image_text3') ?>
</div>
</div>
</div>
</div>
</div>
<!--end Solutions-->
<!--Technology-->
<div class="full_width hp_tech float_full_height clearfix">
<div class="one_of_two">
<div class="max_600r">
<h2><?php echo get_field('hp_tech_title') ?></h2>
<h5><?php echo get_field('hp_tech_sub_title') ?>
</h5>
<?php echo get_field('hp_tech_text') ?>
<a href="technology">READ MORE <img src="<?php echo get_theme_file_uri('images/contact/send.png') ?>" width="21" height="21" alt="READ MORE"></a>
</div>
</div>
<div class="one_of_two white">
<div class="max_600l">
<div>
<div class="one_of_two">
<h5><?php echo get_field('hp_tech_right_title1') ?></h5>
<?php echo get_field('hp_tech_right_text1') ?>
</div>
<div class="one_of_two">
<img src="<?php echo get_field('hp_tech_right_image1') ?>">
</div>
</div>
<div>
<div class="one_of_two">
<h5><?php echo get_field('hp_tech_right_title2') ?></h5>
<?php echo get_field('hp_tech_right_text2') ?>
</div>
<div class="one_of_two">
<img src="<?php echo get_field('hp_tech_right_image2') ?>">
</div>
</div>
</div>
</div>
</div>
<!--end Technology-->
<!--Team pic-->
<div class="full_width hp_team">
</div>
<!--end Team pic-->
<!--About-->
<div class="full_width hp_about float_full_height clearfix">
<div class="one_of_two blue_back">
<div class="max_600r">
<h2><?php echo get_field('hp_about_title') ?></h2>
<h5>
<?php echo get_field('hp_about_sub_title') ?>
</h5>
<?php echo get_field('hp_about_text') ?>
<a href="about">READ MORE <img src="<?php echo get_theme_file_uri('images/contact/send.png') ?>" width="21" height="21" alt="READ MORE"></a>
</div>
</div>
<div class="one_of_two grey_back">
<div class="max_600l">
<h2><?php echo get_field('hp_about_right_title') ?></h2>
<div class="join_us">
<a href="careers">JOIN US<img src="<?php echo get_theme_file_uri('images/hp/dots.svg') ?>" width="47" height="73" alt="Dots"/>
</a>
</div>
</div>
</div>
</div>
<!--end About-->
<!--start ticker-->
<div class="full_width slides clearfix">
<div class="in_1200">
<h2>IN THE NEWS</h2>
</div>
<section class="center slider">
<?php 
          $homepageNews = new WP_Query(array(
            'posts_per_page' => -1,
            'post_type' => 'news',
           'orderby' => 'meta_value_num',
            'order' => 'ASC',
          ));

          while($homepageNews->have_posts()) {
            $homepageNews->the_post(); ?>
                <div>
                <a href="<?php echo get_field('hp_news_link') ?>" target="_blank">
			<img src="<?php echo get_field('hp_news_image') ?>">
			</a>
		</div>
          <?php } wp_reset_postdata();
        ?>
    </section>
</div>
<!--end start ticker-->

<!--contact-->
<div class="full_width contact hp_contact clearfix">
<h3>Contact Us</h3> 
<div class="in_900">
<div class="contact_txt_cont">

<?php if( have_rows('contact_info') ): ?>
 
    <?php while( have_rows('contact_info') ): the_row(); ?>
 			<div class="contact_txt">
<h2><?php the_sub_field('country'); ?></h2>
<?php the_sub_field('country_details'); ?>
<a href="mailto:<?php the_sub_field('mail'); ?>"><?php the_sub_field('mail'); ?></a>
</div>
    <?php endwhile; ?>
 
<?php endif; ?>
</div>

<div class="contact_form in_760 clearfix">

        <?php
        echo get_field('contact_form');
		 ?>
                    	
</div>
</div>       
                    	
</div>
</div>
</div>
<!--end contact-->


<?php get_footer();

?>