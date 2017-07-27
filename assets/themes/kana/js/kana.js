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
	
	
	$(".detailPostBtn").click(function(){
		$(".detail-cilent").fadeOut();
		var targetID = jQuery(this).attr('datapost');
		$(targetID).fadeIn();
 	    return false;
	});
	$("a.closeDetail").click(function(){
		$(".detail-cilent").fadeOut();
	});
	
});
$(window).scroll(function(){
	console.log($(window).scrollTop());
	if($(window).scrollTop()<=10){
		$('#headingbox').removeClass('smallnav');
	}else{
		$('#headingbox').addClass('smallnav');
	}
});