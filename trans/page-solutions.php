<?php

get_header('new-home'); ?>

<!--Solution top image-->
<div class="full_width solutions_top clearfix">
<div class="in_1200 about">
<h1><?php the_title(); ?></h1>
<h3>
<?php echo get_field('solutions_top_text') ?>
</h3>
<div class="center_txt_cont">
<?php echo get_field('solutions_top_text2') ?>
</div>
<div class="icons">
<div class="one_of_3" id="oem">
<img src="<?php echo get_field('icon_1_image') ?>">
<?php echo get_field('icon_1_text') ?>
</div>
<div class="one_of_3" id="mapping">
<img src="<?php echo get_field('icon_2_image') ?>">
<?php echo get_field('icon_2_text') ?>
</div>
<div class="one_of_3" id="fleet">
<img src="<?php echo get_field('icon_3_image') ?>">
<?php echo get_field('icon_3_text') ?>
</div>
</div>
</div>
</div>
<!--end Solution top image-->
<!--text w&b-->
<div class="full_width b_w oem clearfix" id="oem_">
<div class="one_of_two blue_back white">
<div class="max_600r">
<img src="<?php echo get_field('solutions_left_image') ?>">
<h2><?php echo get_field('solutions_left_heading') ?></h2>
<span class="upper"><?php echo get_field('solutions_left_text') ?></span>
</div>
</div>
<div class="one_of_two grey_back">
<div class="max_600l">
<?php echo get_field('solutions_right_text') ?></div>
</div>
</div>
<!--end text w&b-->
<!--text w&b2-->
<div class="full_width b_w mapping clearfix" id="mapping_">
<div class="one_of_two grey_back">
<div class="max_600r">
<img src="<?php echo get_field('solutions_left_image2') ?>">
<h2><?php echo get_field('solutions_left_heading2') ?></h2>
<?php echo get_field('solutions_left_text2') ?>
</div>
</div>
<div class="one_of_two blue_back white">
<div class="max_600l">
<?php echo get_field('solutions_right_text2') ?>
</div>
</div>
</div>
<!--end text w&b2-->
<!--text w&b3-->
<div class="full_width b_w fleet clearfix" id="fleet_">
<div class="one_of_two blue_back white">
<div class="max_600r">
<img src="<?php echo get_field('solutions_left_image3') ?>">
<h2><?php echo get_field('solutions_left_heading3') ?></h2>
<span class="upper"><?php echo get_field('solutions_left_text3') ?></span>
</div>
</div>
<div class="one_of_two grey_back">
<div class="max_600l">
<div class="center_text">
<?php echo get_field('solutions_right_text3') ?>
</div>
</div>
</div>
</div>
<!--end text w&b3-->
<?php get_footer('new2');

?>