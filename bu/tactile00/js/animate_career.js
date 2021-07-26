$.fn.isInViewport = function() {
var elementTop = $(this).offset().top;
var elementBottom = elementTop + $(this).outerHeight();
var viewportTop = $(window).scrollTop();
var viewportBottom = viewportTop + $(window).height();
return elementBottom > viewportTop && elementTop < viewportBottom;
};


$(window).on('resize scroll ready', function() {
  $('.job_item').each(function() {
    if ($(this).isInViewport()) {
    if (!$(this).hasClass('done1')) {
    $(this).addClass('done1')
    delay = 600;
      $(this).delay(delay).animate({
        opacity: 1
    }, {
    duration: 800,
    complete: function() {
    $(this).find('h6').animate({
       marginRight: 0
    }, 400, 'linear');
    }
  });
    }
    }
  });
   $('.team_pics').each(function() {
    if ($(this).isInViewport()) {
     if (!$(this).hasClass('done1')) {
    $(this).addClass('done1')
   $('.team_pics img').each(function(i) {
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