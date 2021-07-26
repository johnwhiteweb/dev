jQuery(document).ready(function(){
$('.contact_txt').each(function(i) {
   delay = (i)*300;
   $(this).delay(delay).animate({
       opacity: '1'
    }, {
    duration: 1000,
    complete: function() {
    }
 });  
});
});