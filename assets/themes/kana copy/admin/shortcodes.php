<?php

// add_shortcode 
add_shortcode('goodfoot'	,'eurekaGoodFoot');
add_shortcode('collapser'	,'eurekaCollapser');


// shortcode for showing collapser
//  [collapser title='xxx']content[/collapser]
function eurekaCollapser($atts, $content = null ) 
{
	extract( shortcode_atts( array(
		'title' => '',
	), $atts ) );
	
	return "
    <div class='post-collapser'>".$title."</div>
    <div class='post-collapsed' style='display:none'>".$content."</div>
	";
	
}

// shortcode for the text with goodfoot font
// [goodfoot]content[/goodfoot]
function eurekaGoodFoot($atts, $content = null)
{
	return "<p class='post-goodfoot'>".$content."</p>";
}
?>