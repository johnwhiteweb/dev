$(document).ready(function(){
$('.hp_top img').delay('500').each(function(i) {
   delay = (i)*400;
   $(this).delay(delay).animate({
       opacity: '1'
    }, {
    duration: 1100,
    complete: function() {
    }
 });  
});
});

$.fn.isInViewport = function() {
var elementTop = $(this).offset().top;
var elementBottom = elementTop + $(this).outerHeight();
var viewportTop = $(window).scrollTop();
var viewportBottom = viewportTop + $(window).height();
return elementBottom > viewportTop && elementTop < viewportBottom;
};


$(window).on('resize scroll', function() {
  $('.hp_contact').each(function() {
    if ($(this).isInViewport()) {
    $('.contact_txt').each(function(i) {
   delay = (i)*400;
   $(this).delay(delay).animate({
       opacity: '1'
    }, {
    duration: 900,
    complete: function() {
    }
 });  
  });
    }
 });
 
 $('.hp_tech .one_of_two:last-child').each(function() {
    if ($(this).isInViewport()) {
    $(this).find('img').each(function(i) {
   delay = (i)*1000;
   $(this).delay(delay).animate({
       marginRight: '0'
    }, {
    duration: 900,
    complete: function() {
    }
 });  
  });
    }
 });
 
});