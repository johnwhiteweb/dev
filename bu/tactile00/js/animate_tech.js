$.fn.isInViewport = function() {
var elementTop = $(this).offset().top;
var elementBottom = elementTop + $(this).outerHeight();
var viewportTop = $(window).scrollTop();
var viewportBottom = viewportTop + $(window).height();
return elementBottom > viewportTop && elementTop < viewportBottom;
};


$(window).on('resize scroll ready', function() {
  $('.tech_five').each(function() {
    if ($(this).isInViewport()) {
    if (!$(this).hasClass('done1')) {
    $(this).addClass('done1')
    $('.one_of_five').each(function(i) {
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
    }
 });
 
 
});