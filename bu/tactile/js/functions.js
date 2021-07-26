var Lines_up = 0;
var cur_open;
var number_of_slides = 5;

var the_txt;
var myString = "";
var myArray;
var my_div_id;
var div_name;
var div_name_cont = ['.about_top', '.contact_page', '.career_top', '.tech_top', '.solutions_top', '.hp_top', '.resources_top'];
var temp_i;

var count_up_temp = 15193185;
var count_up;

// Calculate the difference of two dates in total days
var nDays;
var startDate = new Date(2019, 5, 1);  // 2000-01-01
var endDate =   new Date();              // Today

// Calculate the difference of two dates in total days
function diffDays(d1, d2) {
endDate =   new Date();
  var nDays;
  var tv1 = d1.getTime();  // msec since 1970
  var tv2 = d2.getTime();

  nDays = (tv2 - tv1) / 1000;
  nDays = Math.round(nDays - 0.5);
  count_up = Math.round(count_up_temp + nDays / 7);
  count_up = Number(count_up).toLocaleString('en');   
}

jQuery(document).ready(function(){

$('ul.category_menu').click(function(){ //pop up close
jQuery("ul.category_menu li ul").slideToggle(400, "linear", function(){
});
 });




if ( $( ".in_category" ).length ) {
$('.press_item').css('opacity', '1');
$('.press_txt').css('opacity', '1');
$('.press_txt').css('margin-left', '0');
$('.press_img_cont img').css('opacity', '1');
$('.press_img_cont img').css('margin-right', '0');
  }

$('.pop_up h4').click(function(){ //pop up close
 $('.pop_up').css('display', 'none');
 });


if ( $( ".num_count" ).length ) {
diffDays(startDate, endDate);
$( ".num_count" ).text(count_up);
window.setInterval(function(){
diffDays(startDate, endDate);
$( ".num_count" ).text(count_up);
}, 7000);
}

function check_in_page( temp_item ){
if ( $( temp_item ).length ) {
div_name = temp_item;
set_write_txt(div_name);
}
}
$(div_name_cont).each(function(i){
temp_item = div_name_cont[i];
check_in_page( temp_item )
});

function set_write_txt(div_name){
the_cont = $(div_name).find("h1");
the_txt = $(the_cont).text();
$(the_cont).html('&nbsp;');
$(the_cont).css('opacity', '1');
pre_frameLooper(the_txt, the_cont);
$(div_name).find('.center_txt_cont').animate({
        opacity: '1'
    }, 1000, 'linear');
    $(div_name).find('h1').animate({
        marginBottom: '50px'
    }, 1000, 'linear');

}


$('.job_item h6').click(function(){ //jobs open function
$(this).toggleClass('closed');
var the_holder2 = $(this).parent().find('.job_info');
$(this).parent().find('.job_info').slideToggle(600, "linear", function(){
if($(this).parent().find('.job_info').css('display') != 'none' ) {
$('html, body').animate({
        scrollTop: '+=200'
    }, 500, 'linear');
} else {
$('html, body').animate({
        scrollTop: '-=500'
    }, 500, 'linear');
}
		});
 });
 
 var tech_open = false;
$('.one_of_five').click(function(){ //Technology more info reveal function
if (!tech_open) {
tech_open = true;
var offset_pos = $(this).offset();
var div_hight = $(this).outerHeight();
var width_fix = $(window).width() * 0.01;
var offset_top = offset_pos.top + div_hight + width_fix + "px";
if ( $( this ).find('img').hasClass( "rotate" ) ) {
$(this).find('img').removeClass('rotate');
$('.spacer').css('height', '0');
$(".show_data").animate({ opacity: '0', marginTop: '-10px'}, 500, 'linear', function(){
		$('.show_data').css('display', 'none');
		tech_open = false;
		 });
} else{
$('.one_of_five').find('img').removeClass('rotate');
$('.show_data').css('display', 'none');
$('.show_data').css('margin-top', '-10px');
$('.show_data').css('opacity', '0');
$(this).find('img').addClass('rotate');
$('.show_data').css('top', offset_top);
$('.show_data .tech_txt').html($(this).find('.hidden_data').html());
$('.show_data').css('display', 'block');
var show_height = $('.show_data').outerHeight() - 40;
$('.spacer').css('height', show_height);
$(".show_data").animate({ opacity: '1', marginTop: '25px'}, 500, 'linear', function(){
tech_open = false;
		 });
}
}
 });
 
if ( $( ".slides" ).length ) { //Home page slider number of slides
  if ($(window).width() >= 800) {
  number_of_slides = 5;
  go_animate(number_of_slides);
  }else{
  number_of_slides = 3;
go_animate(number_of_slides);
  }
  }
  function go_animate(number_of_slides){  //Home page slider function activation
$(".center").slick({
        dots: false,
        infinite: true,
        centerMode: false,
        slidesToShow: number_of_slides,
        slidesToScroll: 1
      });
}
	
	jQuery("#mobile_link").click(function(){ //Mobile menu
	if(Lines_up ==0){
		mobile_link_lines();
		Lines_up=1;
		}else{
		mobile_link_lines_back();
		Lines_up = 0;
		}
		jQuery(".nav_ul_wrap").slideToggle(400, "linear", function(){
		jQuery(this).toggleClass("nav-ex").css("display", '');
		});
	});

jQuery(".team_sq").click(function(){ // Team members on click function

var offset_pos = $(this).offset();
var div_hight = $(this).outerHeight();
var width_fix = $(window).width() * 0.01;
var offset_top = offset_pos.top + div_hight + width_fix + "px";
	
var the_name = $(this).find('.hold_hide h5').text();
var the_txt = $(this).find('.hold_hide p').text();
$('.hidden_line h5').text(the_name);
$('.hidden_line p').text(the_txt);
$('.hidden_line').css("display" , "block");
$('.hidden_line').css("z-index", '2');
$('.hidden_line').css("top", offset_top);
$(".team_sq").addClass( "no_color" );
$(this).removeClass( "no_color" );
$(".team_sq").removeClass( "the_shape_up" );
$(".team_sq").addClass( "the_shape_down" );
$(".team_sq").removeClass( "add_shade" );
$(this).addClass( "add_shade" );
$(this).removeClass( "the_shape_down" );
$(this).addClass( "the_shape_up" );
if ($(window).width() > 680) {
$('html, body').animate({
        scrollTop: $('body .hidden_line').offset().top - 250
    }, 500, 'linear');
}
});
jQuery(".hidden_line h4").click(function(){ //Team hide function
$(this).parent().parent().css("display" , "none");
$(".team_sq").addClass( "no_color" );
$(".team_sq").removeClass( "the_shape_up" );
$(".team_sq").addClass( "the_shape_down" );
$(".team_sq").removeClass( "add_shade" );
});
jQuery(".icons .one_of_3").click(function(){ //Team slide down function
var scroll_to = $(this).attr('id');
$('html, body').animate({
        scrollTop: $('.' + scroll_to).offset().top - 130
    }, 500, 'linear');
});
var hash= window.location.hash //Links with hash tag slow roll
if ( hash == '' || hash == '#' || hash == undefined ) return false;
      var target = $(hash);
      headerHeight = 130;
      target = target.length ? target : $('[name=' + hash.slice(1) +']');
      if (target.length) {
        $('html,body').stop().animate({
          scrollTop: target.offset().top - 130 //offsets for fixed header
        }, 500, 'linear');
      }
});

function mobile_link_lines(){ //Mobile link animation
$(".reg_grey_hr2").css("opacity", "0");
$('.reg_grey_hr1').css("-moz-transform", "rotate(-45deg)");
$('.reg_grey_hr1').css("-webkit-transform", "rotate(-45deg)");
$(".reg_grey_hr1").css("transform", "rotate(-45deg)");
$('.reg_grey_hr1').css("top", "10px");
$('.reg_grey_hr1').css("transform", "rotate(-45deg)");
$(".reg_grey_hr3").css("transform", "rotate(45deg)");
$(".reg_grey_hr3").css("-webkit-transform", "rotate(45deg)");
$(".reg_grey_hr3").css("transform", "rotate(45deg)");
 }
  function mobile_link_lines_back(){
  $(".reg_grey_hr2").css("opacity", "1");
$('.reg_grey_hr1').css("-moz-transform", "rotate(0deg)");
$('.reg_grey_hr1').css("-webkit-transform", "rotate(0deg)");
$('.reg_grey_hr1').css("transform", "rotate(0deg)");
$('.reg_grey_hr1').css("top", "0");
$(".reg_grey_hr3").css("transform", "rotate(0deg)");
$(".reg_grey_hr3").css("-webkit-transform", "rotate(0deg)");
$(".reg_grey_hr3").css("transform", "rotate(0deg)");
 }


var final_text = "";
function pre_frameLooper(myString, my_div_id) {
    myArray = myString.split("");
    frameLooper(my_div_id, myArray);
}
var loopTimer;

function frameLooper(my_div_id) {
    my_div_id1 = my_div_id
    if (myArray.length > 0) {
    final_text += myArray.shift();
        $(my_div_id).html(final_text);
    } else {
        clearTimeout(loopTimer);
        return false;
    }
    loopTimer = setTimeout('frameLooper(my_div_id1)', 100);
}