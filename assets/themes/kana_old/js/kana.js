$(document).ready(function() { 
	//trigger menu
	$("#trigger").click(function(){
		$(".overlay").removeClass("open");
		$(".overlay").addClass("open");
 	    return false;
	});
	$("#contactbtn").click(function(){
		$("#footer").toggleClass("activefooter");
 	    return false;
	});
	$(".overlays").click(function(){
		$(this).hide();
		$(".send").hide();
 	    return false;
	});
	$('#contactbtn2').click(function(){
		$('html, body').animate({
			scrollTop: $( $.attr(this, 'href') ).offset().top
		}, 1500);
		return false;
	});
	$('.productList').click(function(){
		$('html, body').animate({
			scrollTop: $( $.attr(this, 'href') ).offset().top
		}, 1500);
		return false;
	});
	$('.btnServices').click(function(){
		$('html, body').animate({
			scrollTop: $( $.attr(this, 'href') ).offset().top
		}, 15500);
		return false;
	});
	//overlay menu
	$(".overlay-close").click(function(){
		$(".overlay").removeClass("open");
	});
	//accordion careers
	$( "#accordion" ).accordion({
	  heightStyle: "content"
	});
});
$(window).scroll(function(){
	console.log($(window).scrollTop());
	if($(window).scrollTop()<=10){
		$('#headingbox').removeClass('smallnav');
	}else{
		$('#headingbox').addClass('smallnav');
	}
	if($(window).scrollTop()>=300){
		$('.iconservices1').addClass("animated fadeInLeftBig");
		$('.servicesentry1').addClass("animated fadeInRightBig");
	}
	if($(window).scrollTop()>=600){
		$('.iconservices2').addClass("animated fadeInLeftBig");
		$('.servicesentry2').addClass("animated fadeInRightBig");
	}
	if($(window).scrollTop()>=800){
		$('.iconservices3').addClass("animated fadeInLeftBig");
		$('.servicesentry3').addClass("animated fadeInRightBig");
	}
	if($(window).scrollTop()>=1100){
		$('.iconservices4').addClass("animated fadeInLeftBig");
		$('.servicesentry4').addClass("animated fadeInRightBig");
	}
	if($(window).scrollTop()>=1400){
		$('#section-solution .iconservices').addClass("animated fadeIn");
	}
});