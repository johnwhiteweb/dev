var revealed = 0;

function testScroll(ev) {
    var docViewTop = $(window).scrollTop();
    var docViewBottom = docViewTop + $( window ).height();
    var elemTop = $(".crew_cont").offset().top;
    if (docViewBottom > elemTop + 200 && revealed === 0) {
    revealed = 1;
    $('.one_of_four').each(function(i) {
   delay = (i)*200;
   $(this).delay(delay).animate({
       opacity: '1'
    }, {
    duration: 700,
    complete: function() {
    }
 });  
});
    }
    }
window.onscroll = testScroll;