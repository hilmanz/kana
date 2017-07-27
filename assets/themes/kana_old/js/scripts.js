$(document).ready(function() { 
	
	// Drop Down Menu
	var mainMenu = $('#ul#main-menu').superfish({
		//add options here if required
	});
	// Slides Loader
	$(".slider").removeClass("slide-loader");
	$(".slider-single").removeClass("slide-loader-single");
	
	// Mobile Menu
	// Create the dropdown base
	$("<select />").appendTo("#nav");
      
	// Create default option "Go to..."
	$("<option />", {
		"selected": "selected",
		"value"   : "",
		"text"    : "Go to..."
	}).appendTo("#nav select");
	
	$(".d4p-tabber-widget").each(function(){
		var ul = $(this).find("ul.d4p-tabber-header");

		$(this).children("div.d4p-st-tab").each(function() {
			var widget = $(this).attr("id");
			$(this).find('a.d4p-st-title').attr("href", "#" + widget).wrap('<li></li>').parent().detach().appendTo(ul);
		});
			$( "#tabs" ).tabs();

		$(this).idTabs();
	});
      
	// Populate dropdown with menu items
	$("#main-menu a").each(function() {
		var el = $(this);
		$("<option />", {
			"value"   : el.attr("href"),
			"text"    : el.text()
		}).appendTo("#nav select");
	});
	
	// To make dropdown actually work
	$("#nav select").change(function() {
		window.location = $(this).find("option:selected").val();
	});
	//accordion
	$(function() {
    	$( "#accordion" ).accordion();
  	});
	 $(function() {
    $( "#tabpost" ).tabs();
  });
});
//scroll

$(function()
{
	$('.scroll-pane').each(
		function()
		{
			$(this).jScrollPane(
				{
					showArrows: $(this).is('.arrow')
				}
			);
			var api = $(this).data('jsp');
			var throttleTimeout;
			$(window).bind(
				'resize',
				function()
				{
					// IE fires multiple resize events while you are dragging the browser window which
					// causes it to crash if you try to update the scrollpane on every one. So we need
					// to throttle it to fire a maximum of once every 50 milliseconds...
					if (!throttleTimeout) {
						throttleTimeout = setTimeout(
							function()
							{
								api.reinitialise();
								throttleTimeout = null;
							},
							50
						);
					}
				}
			);
		}
	)

});
// Slider
$(window).load(function(){
  $('.carosel').flexslider({
	animation: "slide",
	animationLoop: false,
	controlNav:false,
	itemWidth: 230,
	itemMargin: 5,
	minItems:1,
	maxItems: 4,
  });
  $('.caroseltesti').flexslider({
    animation: "fade",
	slideshow: true,  
	controlNav:false,
	directionNav:false,       
  });
  $('.carosellogo').flexslider({
	animation: "slide",
	animationLoop: false,
	controlNav:false,
	itemWidth: 210,
	itemMargin: 5,
	minItems: 1,
	maxItems: 4
  });
});