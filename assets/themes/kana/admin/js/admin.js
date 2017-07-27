$(document).ready(function() { 
 $(function() {
    $( "#accordion" ).accordion({
      heightStyle: "content"
    });
    $( ".tabs" ).tabs();
	$("a.toplevel_page_eureka").removeAttr("href");
	$('a.toplevel_page_eureka').attr('href', 'admin.php?page=eureka-setting');
 });
});
  //   inputvideo  or inputimage
	function embedvideo()
	{
		var list = document.getElementsByClassName("inputvideo");
		for (var i = 0; i < list.length; i++) {
			list[i].style.display="block";
		}
		var list = document.getElementsByClassName("inputimage");
		for (var i = 0; i < list.length; i++) {
			list[i].style.display="none";
		}
	}
	function uploadimage()
	{
		var list = document.getElementsByClassName("inputimage");
		for (var i = 0; i < list.length; i++) {
			list[i].style.display="block";
		}
		var list = document.getElementsByClassName("inputvideo");
		for (var i = 0; i < list.length; i++) {
			list[i].style.display="none";
		}
			}