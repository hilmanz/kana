<?php
/*
Plugin Name: Video
Author: Acit Jazz
Version: 1.0
Author URI: http://www.eurekathemes.com
*/
function vid_sc($atts, $content=null) {
	extract(
		shortcode_atts(array(
			'site' => 'youtube',
			'id' => '',
			'w' => '600',
			'h' => '370'
		), $atts)
	);
	if ( $site == "youtube" ) { $src = 'http://www.youtube-nocookie.com/embed/'.$id; }
	else if ( $site == "vimeo" ) { $src = 'http://player.vimeo.com/video/'.$id; }
	else if ( $site == "dailymotion" ) { $src = 'http://www.dailymotion.com/embed/video/'.$id; }
	else if ( $site == "yahoo" ) { $src = 'http://d.yimg.com/nl/vyc/site/player.html#vid='.$id; }
	else if ( $site == "bliptv" ) { $src = 'http://a.blip.tv/scripts/shoggplayer.html#file=http://blip.tv/rss/flash/'.$id; }
	else if ( $site == "veoh" ) { $src = 'http://www.veoh.com/static/swf/veoh/SPL.swf?videoAutoPlay=0&permalinkId='.$id; }
	else if ( $site == "viddler" ) { $src = 'http://www.viddler.com/simple/'.$id; }
	if ( $id != '' ) {
		return '<iframe width="'.$w.'" height="'.$h.'" src="'.$src.'" class="vid iframe-'.$site.'"></iframe>';
	}
}
add_shortcode('video','vid_sc');
?>
