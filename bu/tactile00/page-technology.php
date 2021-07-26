<?php

get_header(); ?>
<!--Tech top image-->
<div class="full_width tech_top clearfix">
<div class="in_1200">
<h1><?php the_title(); ?></h1>
<h3>
<?php echo get_field('tech_top_text') ?>
</h3>
<div class="center_txt_cont">
<?php echo get_field('tech_top_text2') ?>
</div>
</div>
</div>
<!--end Tech top image-->
<!--Diagram-->
<div class="full_width diagram clearfix">
<div class="in_1200">
<h2>From data to powerful insights</h2>
<img src="<?php echo get_theme_file_uri('images/technology/diagram.svg') ?>" width="1200" height="560" alt="Diagram">
</div>
</div>
<!-- end Diagram-->

<!--Blue-->
<div class="full_width tech_blue blue_back white clearfix">
<div class="in_1200">
<img src="<?php echo get_field('tech_first_blue_image') ?>">
<h2><?php echo get_field('tech_first_blue_heading') ?></h2>
<div class="tech_txt">
<?php echo get_field('tech_first_blue_text') ?>
</div>
</div>
</div>
<!-- end blue-->

<!--five-->
<div class="full_width tech_five clearfix">
<div class="in_1200">
<h2><?php echo get_field('tech_sec_title') ?></h2>
<div class="tech_five_cont">
<div class="one_of_five">
<h5><?php echo get_field('tech_sec_name1') ?></h5>
<img src="<?php echo get_theme_file_uri('images/technology/circle_close.svg') ?>" width="47" height="47" alt="Ingestion">
<div class="hidden_data">
<?php echo get_field('tech_sec_hidden_text1') ?>
</div>
</div>
<div class="one_of_five">
<h5><?php echo get_field('tech_sec_name2') ?></h5>
<img src="<?php echo get_theme_file_uri('images/technology/circle_close.svg') ?>" width="47" height="47" alt="Fusion">
<div class="hidden_data">
<?php echo get_field('tech_sec_hidden_text2') ?>
</div>
</div>
<div class="one_of_five">
<h5><?php echo get_field('tech_sec_name3') ?></h5>
<img src="<?php echo get_theme_file_uri('images/technology/circle_close.svg') ?>" width="47" height="47" alt="Noise Cleaning">
<div class="hidden_data">
<?php echo get_field('tech_sec_hidden_text3') ?>
</div>
</div>
<div class="one_of_five">
<h5><?php echo get_field('tech_sec_name4') ?></h5>
<img src="<?php echo get_theme_file_uri('images/technology/circle_close.svg') ?>" width="47" height="47" alt="Processing">
<div class="hidden_data">
<?php echo get_field('tech_sec_hidden_text4') ?>
</div>
</div>
<div class="one_of_five">
<h5><?php echo get_field('tech_sec_name5') ?></h5>
<img src="<?php echo get_theme_file_uri('images/technology/circle_close.svg') ?>" width="47" height="47" alt="Feedback">
<div class="hidden_data">
<?php echo get_field('tech_sec_hidden_text5') ?>
</div>
</div>
</div>
<div class="full_width spacer clearfix">
</div>
</div>
</div>
<div class="show_data clearfix">
<div class="tech_txt">
</div>
</div>

<!--end five-->
<div class="full_width tech_blue blue_back white clearfix">
<div class="in_1200">
<img src="<?php echo get_field('tech_second_blue_image') ?>">
<div class="tech_txt">
<h2><?php echo get_field('tech_second_blue_heading') ?></h2>
<?php echo get_field('tech_second_blue_text') ?>
</div>
</div>
</div>

<!--text w&b-->
<div class="full_width b_w clearfix">
<div class="one_of_two grey_back">
<div class="max_600r">
<img src="<?php echo get_field('tech_grey_image1') ?>">
<h2><?php echo get_field('tech_grey_title1') ?></h2>
<?php echo get_field('tech_grey_text1') ?>
</div>
</div>
<div class="one_of_two grey_back">
<div class="max_600l">
<img src="<?php echo get_field('tech_grey_image2') ?>">
<h2><?php echo get_field('tech_grey_title2') ?></h2>
<?php echo get_field('tech_grey_text2') ?>
</div>
</div>
</div>
<!--end text w&b-->
<?php get_footer();

?>