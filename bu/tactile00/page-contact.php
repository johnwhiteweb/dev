<?php

get_header(); ?>

<!--contact-->
<div class="full_width contact contact_page clearfix">
<h1><?php the_title(); ?></h1> 
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
<!--end contact-->
<?php get_footer();

?>