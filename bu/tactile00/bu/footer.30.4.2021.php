<!--footer-->
<div class="full_width footer clearfix">
<div class="in_1200">

<div class="one_of_two">
<img src="<?php the_field('main_logo', 'option'); ?>">
<p><?php the_field('footer_text', 'option'); ?></p>
</div>

<div class="one_of_two footer_links">
<?php if( have_rows('footer_menu', 'option') ): ?>
    <?php while( have_rows('footer_menu', 'option') ): the_row(); ?>
			<a href="<?php the_sub_field('footer_menu_link', 'option'); ?>" target="_blank"><?php the_sub_field('footer_menu_text', 'option'); ?><img src="<?php the_sub_field('footer_menu_image', 'option'); ?>"></a>
    <?php endwhile; ?>
    <?php endif; ?>    
</div>

</div>
</div>

<div class="full_width footer_bottom clearfix">
<div class="in_1200">

<div class="one_of_two">
<p>Branding & website by <a href="http://www.titan.co.il" target="_blank"><img src="<?php echo get_theme_file_uri('images/general/titan.svg') ?>" width="100" height="9" alt="TitanBrandWise"></a></p>
</div>

<div class="one_of_two">
<img src="<?php the_field('footer_iso', 'option'); ?>">
</div>

</div>
<!--end footer-->
</div>
</div>
<!--end container-->
<div class="file-inputs-bufer" style="height:0px !important;width: 0px !important;overflow: hidden !important;opacity: 0 !important;pointer-events:none !important;"></div><script src="<?php echo get_theme_file_uri('/js/jquery-2.1.0.min.js'); ?>"></script><script src="<?php echo get_theme_file_uri('/js/functions.js'); ?>"></script><script src="<?php echo get_theme_file_uri('/js/slick.js'); ?>"></script>
<script>
jQuery( 'form.wpcf7-form' ).on( 'submit' , function() {
	jQuery(this).find( 'input[type=file]' ).each(function() {
		if( jQuery( this ).val() === '' ) {
			jQuery( this ).parent().appendTo( '.file-inputs-bufer' );
			jQuery( this ).remove();
		}
	});
});
</script>
<?php wp_footer(); ?>
</body>
</html>