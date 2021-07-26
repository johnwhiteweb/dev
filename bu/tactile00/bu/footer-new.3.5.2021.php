<footer class="footer">
          
	<div class="container">
	<div class="logo-part">
	<a class="navbar-brand" href="<?php echo get_home_url(); ?>"><img class="images-fluid" src="<?php the_field('main_logo', 'option'); ?>"></a>			                
	<p><?php the_field('footer_text', 'option'); ?></p>			 
	</div>            
	<ul class="social-icon">								
	<?php 				
	if( have_rows('footer_menu', 'option') ):  				
	while( have_rows('footer_menu', 'option') ): the_row(); 				?>						
	<li class="<?php the_sub_field('footer_menu_class', 'option'); ?>"><a href="<?php the_sub_field('footer_menu_link', 'option'); ?>"><?php the_sub_field('footer_menu_text', 'option'); ?><img src="<?php the_sub_field('footer_menu_image', 'option'); ?>"></a></li>				
	<?php 				
	endwhile; 				
	endif; 				
	?>   			
	</ul>                         
	</div>           
	<div class="footer-bottom">            
	<div class="container">              
	<p>Branding & website by <a href="http://www.titan.co.il" target="_blank"><img src="<?php echo get_theme_file_uri('images/general/titan.svg') ?>" width="100" height="9" alt="TitanBrandWise"></a>
	</p>                
	<img src="<?php the_field('footer_iso', 'option'); ?>">            
	</div>          
	</div>     
	</footer>
</div>
<div class="file-inputs-bufer" style="height:0px !important;width: 0px !important;overflow: hidden !important;opacity: 0 !important;pointer-events:none !important;"></div>
<script src="<?php echo get_theme_file_uri('/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo get_theme_file_uri('/js/slick.min.js'); ?>"></script>

<script>
jQuery( 'form.wpcf7-form' ).on( 'submit' , function() {
	jQuery(this).find( 'input[type=file]' ).each(function() {		
		if( jQuery( this ).val() === '' ) {			
			jQuery( this ).parent().appendTo( '.file-inputs-bufer' );			
			jQuery( this ).remove();		
		}	
	});
});

jQuery(document).ready(function($){	


	if ($(window).width() > 768){		
		$('a.dropdown-toggle').click(function(){			
			var link = $(this).attr("href");		   
			window.location.href=link;		
		})	
	}
	

	$("li.facebook").on( "mouseenter", function() {
		//alert('hello');
		var sttr = $(this).find("img").attr("src");
		$(this).find("img").attr("data-val", sttr);
		$(this).find("img").attr("src", "<?php echo get_theme_file_uri('images/facebook-with-bg.svg') ?>");
	  
	}).on( "mouseleave", function() {
		//alert("hello");
		
		var strval = $(this).find("img").attr("data-val");
		//alert(strval);
		$(this).find("img").attr("src", strval);
		
	});
	
	$("li.linkedin").on( "mouseenter", function() {
		//alert('hello');
		var sttr = $(this).find("img").attr("src");
		$(this).find("img").attr("data-val", sttr);
		$(this).find("img").attr("src", "<?php echo get_theme_file_uri('images/linkedin-with-bg.svg') ?>");
	  
	}).on( "mouseleave", function() {
		//alert("hello");
		
		var strval = $(this).find("img").attr("data-val");
		//alert(strval);
		$(this).find("img").attr("src", strval);
		
	});

	if ($(window).width() < 768){		

		$("a.dropdown-toggle").after("<span class='arrow'></span>");
		$("a.dropdown").removeClass("dropdown-toggle");
		$("a.dropdown").removeAttr("data-toggle");

		$("span.arrow").addClass("dropdown-toggle");
		$("span.arrow").attr("data-toggle", "dropdown");
		
		if($('ul.dropdown-menu').find('li.active').length !== 0){
			
			$("ul.dropdown-menu").css("display", "block");
			/* $("span.dropdown-toggle").click( function(){
				//$(this).attr("aria-expanded","false");
				
				$(this).parent("li").removeClass("show");
				$("ul.dropdown-menu").removeClass("show");
				
			}); */
			
		}
		
		

	}
	$('.nav-open').on("click", function(e) {
	  e.preventDefault();
	  
	  $(this).toggleClass('nav-close');

	});
	
	
});

	</script>




<?php wp_footer(); ?>
</body>
</html>