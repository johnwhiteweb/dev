<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog main-site">
    <div class="modal-content main-box">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
			<h2 class="heading">Unlock Your Hidden Road Potential</h2>
           <p class="sub-heading">Fill out the form and we will be in touch with you shortly</p>
        <!--<form>
          
            <div class="row">
                <div class="col-sm-6">
                <div class="form-group floating-label-group">
                <input class="form-control" placeholder="" autocomplete="off" required="" type="text">
                <label class="floating-label">First Name</label>
                </div>
                </div>                         
                <div class="col-sm-6">
                <div class="form-group floating-label-group">
                <input class="form-control" placeholder="" autocomplete="off" required="" type="text">
                <label class="floating-label">Last Name</label>
                </div>
                </div>                         
                <div class="col-sm-6">
                <div class="form-group floating-label-group">
                <input class="form-control border-bottm" placeholder="" autocomplete="off" required="" type="text">
                <label class="floating-label">company Email</label>
                </div>
                </div>                         
                <div class="col-sm-6">
                <div class="form-group floating-label-group">
                <input class="form-control border-bottm" placeholder="" autocomplete="off" required="" type="text">
                <label class="floating-label">company name</label>
                </div>
                </div>  
                <div class="col-sm-6">
                  <div class="form-group floating-label-group">
                  <input class="form-control border-bottm" placeholder="" autocomplete="off" required="" type="text">
                  <label class="floating-label">Phone number</label>
                  </div>
                </div>     
                <div class="col-sm-6">
                    <div class="form-group floating-label-group icon">
                      <select class="custom-select">
                        <option selected>job title</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                      </select>
                    <label class="floating-label"></label>
                    </div>
                </div>     
                <div class="col-sm-6">
                     <div class="form-group floating-label-group icon">
                       <select class="custom-select" >
                         <option selected>contry</option>
                         <option value="1">One</option>
                         <option value="2">Two</option>
                         <option value="3">Three</option>
                       </select>
                     </div>
                </div>     
                <div class="col-sm-6">
                     <button class="btn">REQUEST A DEMO</button>
                </div>
				
            </div>
        </form>-->
		<?php
		/*Contact form 7 remove span*/
		add_filter('wpcf7_form_elements', function($content) {
			$content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);

			$content = str_replace('<br />', '', $content);
				
			return $content;
		});
		
		echo do_shortcode('[contact-form-7 id="3579" title="Request A Demo"]');
		
		?>
      </div>
    </div>
  </div>
</div>

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
			<a href="<?php the_sub_field('footer_menu_link', 'option'); ?>" target="_blank" class="<?php the_sub_field('footer_menu_class', 'option'); ?>"><?php the_sub_field('footer_menu_text', 'option'); ?><img src="<?php the_sub_field('footer_menu_image', 'option'); ?>"></a>
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
<div class="file-inputs-bufer" style="height:0px !important;width: 0px !important;overflow: hidden !important;opacity: 0 !important;pointer-events:none !important;"></div><script src="<?php echo get_theme_file_uri('/js/jquery-2.1.0.min.js'); ?>"></script><script src="<?php echo get_theme_file_uri('/js/functions.js'); ?>"></script><script src="<?php echo get_theme_file_uri('/js/slick.js'); ?>"></script><script src="<?php echo get_theme_file_uri('/js/bootstrap.min.js'); ?>"></script>
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
  function colorInputs(){
    console.log('l');
  }
	colorInputs();

	if ($(window).width() > 768){		
		$('a.dropdown-toggle').click(function(){			
			var link = $(this).attr("href");		   
			window.location.href=link;		
		})	
	}
	

	$("li.facebook, a.facebook").on( "mouseenter", function() {
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
	
	$("li.linkedin, a.linkedin").on( "mouseenter", function() {
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
		
		$('li.nav-item').each(function() {
			
			if($(this).find('li.active').length !== 0){
				
				$(this).addClass("show");
				$(this).find("span.dropdown-toggle").attr("aria-expanded", "true");
				$(this).find("ul.dropdown-menu").addClass("show");
				
			}
			
		});

	}
	$('.nav-open').on("click", function(e) {
	  e.preventDefault();
	  
	  $(this).toggleClass('nav-close');

	});
	
	$('input.form-control').focus(function() {
		$(this).parent('.form-group').addClass('active-lable');
	}).focusout(function() {
		if($(this).val()==""){
			$(this).parent('.form-group').removeClass('active-lable');
		}
	});
	

 
});
</script>
<?php wp_footer(); ?>
</body>
</html>