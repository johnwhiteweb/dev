$.fn.isInViewport = function() {
var elementTop = $(this).offset().top;
var elementBottom = elementTop + $(this).outerHeight();
var viewportTop = $(window).scrollTop();
var viewportBottom = viewportTop + $(window).height();
return elementBottom > viewportTop && elementTop < viewportBottom;
};


$(window).on('resize scroll ready', function() {
  $('.press_item').each(function() {
    if ($(this).isInViewport()) {
    if (!$(this).hasClass('done1')) {
    $(this).addClass('done1')
    delay = 400;
      $(this).delay(delay).animate({
        opacity: 1
    }, {
    duration: 1000,
    complete: function() {
    $(this).find('.press_txt').animate({
       opacity: 1,
       marginLeft: 0
    }, 400, 'linear');
    $(this).find('.press_img_cont img').animate({
       marginRight: 0,
       opacity: 1
    }, 400, 'linear');
    }
  });
    }
    }
  });
});