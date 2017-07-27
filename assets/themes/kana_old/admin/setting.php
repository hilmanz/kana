<?php

class EurekaSetting extends eurekaApp
{	
	var $data;
	var $value;
	var $status;
	var $prefix	= "eureka_";
	var $numbering	= array(
						"1"		=> "1",
						"2"		=> "2",
						"3"		=> "3",
						"4"		=> "4",
						"5"		=> "5",
					  );
	var $numbering2	= array(
						"2"		=> "2",
						"4"		=> "4",
						"6"		=> "6",
						"8"		=> "8",
						"10"	=> "10",
					  );
	var $numbering3 = array(
						"1"		=> "1",
						"2"		=> "2",
						"3"		=> "3",
						"4"		=> "4",
						"5"		=> "5",
						"6"		=> "6",
						"7"		=> "7",
						"8"		=> "8",
						"9"		=> "9",
						"10"	=> "10",
					  );
	var $eu_active	= array(
						"Yes"		=> "Yes",
						"No"		=> "No",
					  );
	var $eu_colors	= array(
						"Default"		=> "Default",
						"Black"			=> "Black",
						"Red"			=> "Red",
						"Green"			=> "Green",
						"Orange"		=> "Orange",
					  );
	var $eu_mobile	= array(
						"Show"	=> "Show",
						"Hide"	=> "Hide",
					  );
	var $eu_float	= array(
						"Left"		=> "Left",
						"Right"	=> "Right",
					  );
	var $eu_formtype	= array(
						"Text"		=> "Text",
						"Message"		=> "Message",
					  );
	var $eu_btntarget	= array(
						"_blank"		=> "_blank",
						"_parrent"		=> "_parrent",
						"_new"			=> "_new",
					  );
	var $eu_choose	= array(
						"custom"			=> "custom",
						"custom-code"		=> "custom-code",
						"custom-shortcode"	=> "custom-shortcode",
					  );
	var $eu_vid	= array(
						"Youtube"			=> "Youtube",
						"Custom"			=> "Custom",
					  );
	var $eu_optbox	= array(
						"Slider"			=> "Slider",
						"Youtube"			=> "Youtube",
						"Custom"			=> "Custom",
						"Static"			=> "Static",
					  );
	
	// init
	function init()
	{
		add_action("admin_menu",array(&$this,"createMenu"));
	}
	
	// create menu
	function createMenu()
	{
		add_submenu_page( 'eureka', 'Theme Setting', 'Theme Setting', 'manage_categories', 'eureka-setting', array(&$this,"view"));
	}
	
	/*==================================================================================*/
	/*=========================			  CONTROLLER		   =========================*/
	/*==================================================================================*/
	
	// processing Input
	function processingInput()
	{
		if(isset($_POST['data']) && isset($_POST['_wpnonce'])) :
			check_admin_referer('eureka-update-theme-setting');
			$this->data	= $_POST['data'];
			
			$this->updateData();
		endif;
	}
	
	// generate value from custom options
	function generateValue()
	{
		
		$this->value	= array(   
			'general'		=> array(
				'favicon'						=> stripslashes(get_option($this->prefix.'general_favicon')),
				'analytic'						=> stripslashes(get_option($this->prefix.'general_analytic')),
				'logofooter'					=> stripslashes(get_option($this->prefix.'general_logofooter')),
				'showlogofooter'				=> stripslashes(get_option($this->prefix.'general_showlogofooter')),
				
			),	
			'color'		=> array(
				'bodycolor'						=> stripslashes(get_option($this->prefix.'color_bodycolor')),
				'topcolor'						=> stripslashes(get_option($this->prefix.'color_topcolor')),
				'bannercolor'					=> stripslashes(get_option($this->prefix.'color_bannercolor')),
				'footercolor'					=> stripslashes(get_option($this->prefix.'color_footercolor')),
				'fontcolor'						=> stripslashes(get_option($this->prefix.'color_fontcolor')),
				'linkcolor'						=> stripslashes(get_option($this->prefix.'color_linkcolor')),
				'linkhovercolor'				=> stripslashes(get_option($this->prefix.'color_linkhovercolor')),
				'footerfontcolor'				=> stripslashes(get_option($this->prefix.'color_footerfontcolor')),
				'footerlinkcolor'				=> stripslashes(get_option($this->prefix.'color_footerlinkcolor')),
				'footerlinkhovercolor'			=> stripslashes(get_option($this->prefix.'color_footerlinkhovercolor')),
			),		 
			'header'	=> array(
				'logo'								=> stripslashes(get_option($this->prefix.'header_logo')),
				'logowidth'							=> stripslashes(get_option($this->prefix.'header_logowidth')),
				'logotext'							=> stripslashes(get_option($this->prefix.'header_logotext')),
				'menufontsize'						=> stripslashes(get_option($this->prefix.'header_menufontsize')),
			),     
			'slider'	=> array(
				'showbanner'				=> stripslashes(get_option($this->prefix.'slider_showbanner')),
				'bannertype'				=> stripslashes(get_option($this->prefix.'slider_bannertype')),
				'slidespeed'				=> stripslashes(get_option($this->prefix.'slider_slidespeed')),
				'animspeed'					=> stripslashes(get_option($this->prefix.'slider_animspeed')),
                
				'bannertitle'				=> stripslashes(get_option($this->prefix.'slider_bannertitle')),
				'bannerdesc'				=> stripslashes(get_option($this->prefix.'slider_bannerdesc')),
				'contentposition'			=> stripslashes(get_option($this->prefix.'slider_contentposition')),
				'ortxt'						=> stripslashes(get_option($this->prefix.'slider_ortxt')),
				'slidebtn1'					=> stripslashes(get_option($this->prefix.'slider_slidebtn1')),
				'slidebtn1text'				=> stripslashes(get_option($this->prefix.'slider_slidebtn1text')),
				'slidebtn1color'			=> stripslashes(get_option($this->prefix.'slider_slidebtn1color')),
				'slidebtn1shadowcolor'		=> stripslashes(get_option($this->prefix.'slider_slidebtn1shadowcolor')),
				'slidebtn1url'				=> stripslashes(get_option($this->prefix.'slider_slidebtn1url')),
				'slidebtn2'					=> stripslashes(get_option($this->prefix.'slider_slidebtn2')),
				'slidebtn2text'				=> stripslashes(get_option($this->prefix.'slider_slidebtn2text')),
				'slidebtn2color'			=> stripslashes(get_option($this->prefix.'slider_slidebtn2color')),
				'slidebtn2shadowcolor'		=> stripslashes(get_option($this->prefix.'slider_slidebtn2shadowcolor')),
				'slidebtn2url'				=> stripslashes(get_option($this->prefix.'slider_slidebtn2url')),
				
				'optionboxShow'				=> stripslashes(get_option($this->prefix.'slider_optionboxShow')),
				'optionboxType'				=> stripslashes(get_option($this->prefix.'slider_sliderType')),
				'youtubeId'					=> stripslashes(get_option($this->prefix.'slider_youtubeId')),
				'youtubeHeight'				=> stripslashes(get_option($this->prefix.'slider_youtubeHeight')),
				'videoHeight'				=> stripslashes(get_option($this->prefix.'slider_videoHeight')),
				'videomp4'					=> stripslashes(get_option($this->prefix.'slider_videomp4')),
				'videowebm'					=> stripslashes(get_option($this->prefix.'slider_videowebm')),
				'videoogv'					=> stripslashes(get_option($this->prefix.'slider_videoogv')),
				'videocover'				=> stripslashes(get_option($this->prefix.'slider_videocover')),
				'bannerimages'				=> stripslashes(get_option($this->prefix.'slider_bannerimages')),
			),
			'featuredTop'	=> array(
				'showTop'					=> stripslashes(get_option($this->prefix.'featuredTop_showTop')),
				'FTtitle'					=> stripslashes(get_option($this->prefix.'featuredTop_FTtitle')),
				'FTtitlecolor'				=> stripslashes(get_option($this->prefix.'featuredTop_FTtitlecolor')),
				
				'showFTbtn1'				=> stripslashes(get_option($this->prefix.'featuredTop_showFTbtn1')),
				'showFTbtn2'				=> stripslashes(get_option($this->prefix.'featuredTop_showFTbtn2')),
				'FTbtn1'					=> stripslashes(get_option($this->prefix.'featuredTop_FTbtn1')),
				'FTbtn2'					=> stripslashes(get_option($this->prefix.'featuredTop_FTbtn2')),
				'FTbtnsurl1'				=> stripslashes(get_option($this->prefix.'featuredTop_FTbtnsurl1')),
				'FTbtnsurl2'			    => stripslashes(get_option($this->prefix.'featuredTop_FTbtnsurl2')),
	 
				'FTshowm1'					=> stripslashes(get_option($this->prefix.'featuredTop_FTshowm1')),
				'FTtitle1'					=> stripslashes(get_option($this->prefix.'featuredTop_FTtitle1')),
				'FTcontent1'				=> stripslashes(get_option($this->prefix.'featuredTop_FTcontent1')),
				'FTthumb1'					=> stripslashes(get_option($this->prefix.'featuredTop_FTthumb1')),
				'FTbtnurl1'					=> stripslashes(get_option($this->prefix.'featuredTop_FTbtnurl1')),
				'FTbtnText1'				=> stripslashes(get_option($this->prefix.'featuredTop_FTbtnText1')),
				
				'FTshowm2'					=> stripslashes(get_option($this->prefix.'featuredTop_FTshowm2')),
				'FTtitle2'					=> stripslashes(get_option($this->prefix.'featuredTop_FTtitle2')),
				'FTcontent2'				=> stripslashes(get_option($this->prefix.'featuredTop_FTcontent2')),
				'FTthumb2'					=> stripslashes(get_option($this->prefix.'featuredTop_FTthumb2')),
				'FTbtnurl2'					=> stripslashes(get_option($this->prefix.'featuredTop_FTbtnurl2')),
				'FTbtnText2'				=> stripslashes(get_option($this->prefix.'featuredTop_FTbtnText2')),
	 
				'FTshowm3'					=> stripslashes(get_option($this->prefix.'featuredTop_FTshowm3')),
				'FTtitle3'					=> stripslashes(get_option($this->prefix.'featuredTop_FTtitle3')),
				'FTcontent3'				=> stripslashes(get_option($this->prefix.'featuredTop_FTcontent3')),
				'FTthumb3'					=> stripslashes(get_option($this->prefix.'featuredTop_FTthumb3')),
				'FTbtnurl3'					=> stripslashes(get_option($this->prefix.'featuredTop_FTbtnurl3')),
				'FTbtnText3'				=> stripslashes(get_option($this->prefix.'featuredTop_FTbtnText3')),
	 
				'FTshowm4'					=> stripslashes(get_option($this->prefix.'featuredTop_FTshowm4')),
				'FTtitle4'					=> stripslashes(get_option($this->prefix.'featuredTop_FTtitle4')),
				'FTcontent4'				=> stripslashes(get_option($this->prefix.'featuredTop_FTcontent4')),
				'FTthumb4'					=> stripslashes(get_option($this->prefix.'featuredTop_FTthumb4')),
				'FTbtnurl4'					=> stripslashes(get_option($this->prefix.'featuredTop_FTbtnurl4')),
				'FTbtnText4'				=> stripslashes(get_option($this->prefix.'featuredTop_FTbtnText4')),
	 
				'FTshowm5'					=> stripslashes(get_option($this->prefix.'featuredTop_FTshowm5')),
				'FTtitle5'					=> stripslashes(get_option($this->prefix.'featuredTop_FTtitle5')),
				'FTcontent5'				=> stripslashes(get_option($this->prefix.'featuredTop_FTcontent5')),
				'FTthumb5'					=> stripslashes(get_option($this->prefix.'featuredTop_FTthumb5')),
				'FTbtnurl5'					=> stripslashes(get_option($this->prefix.'featuredTop_FTbtnurl5')),
				'FTbtnText5'				=> stripslashes(get_option($this->prefix.'featuredTop_FTbtnText5')),
	 
				'FTshowm6'					=> stripslashes(get_option($this->prefix.'featuredTop_FTshowm6')),
				'FTtitle6'					=> stripslashes(get_option($this->prefix.'featuredTop_FTtitle6')),
				'FTcontent6'				=> stripslashes(get_option($this->prefix.'featuredTop_FTcontent6')),
				'FTthumb6'					=> stripslashes(get_option($this->prefix.'featuredTop_FTthumb6')),
				'FTbtnurl6'					=> stripslashes(get_option($this->prefix.'featuredTop_FTbtnurl6')),
				'FTbtnText6'				=> stripslashes(get_option($this->prefix.'featuredTop_FTbtnText6')),
	 
				'FTshowm7'					=> stripslashes(get_option($this->prefix.'featuredTop_FTshowm7')),
				'FTtitle7'					=> stripslashes(get_option($this->prefix.'featuredTop_FTtitle7')),
				'FTcontent7'				=> stripslashes(get_option($this->prefix.'featuredTop_FTcontent7')),
				'FTthumb7'					=> stripslashes(get_option($this->prefix.'featuredTop_FTthumb7')),
				'FTbtnurl7'					=> stripslashes(get_option($this->prefix.'featuredTop_FTbtnurl7')),
				'FTbtnText7'				=> stripslashes(get_option($this->prefix.'featuredTop_FTbtnText7')),
	 
				'FTshowm8'					=> stripslashes(get_option($this->prefix.'featuredTop_FTshowm8')),
				'FTtitle8'					=> stripslashes(get_option($this->prefix.'featuredTop_FTtitle8')),
				'FTcontent8'				=> stripslashes(get_option($this->prefix.'featuredTop_FTcontent8')),
				'FTthumb8'					=> stripslashes(get_option($this->prefix.'featuredTop_FTthumb8')),
				'FTbtnurl8'					=> stripslashes(get_option($this->prefix.'featuredTop_FTbtnurl8')),
				'FTbtnText8'				=> stripslashes(get_option($this->prefix.'featuredTop_FTbtnText8')),
			),        
			'social'	=> array(
			
				'twitteraccount'			=> stripslashes(get_option($this->prefix.'social_twitteraccount')),
				'twitterprofile'			=> stripslashes(get_option($this->prefix.'social_twitterprofile')),
				'counttwitter'				=> stripslashes(get_option($this->prefix.'social_counttwitter')),
				
				'socialwidget'				=> stripslashes(get_option($this->prefix.'social_socialwidget')),
				'facebook'					=> stripslashes(get_option($this->prefix.'social_facebook')),
				'twitter'					=> stripslashes(get_option($this->prefix.'social_twitter')),
				'googleplus'				=> stripslashes(get_option($this->prefix.'social_googleplus')),
				'linkedin'					=> stripslashes(get_option($this->prefix.'social_linkedin')),
				'vimeo'						=> stripslashes(get_option($this->prefix.'social_vimeo')),
				'youtube'					=> stripslashes(get_option($this->prefix.'social_youtube')),
				'instagram'					=> stripslashes(get_option($this->prefix.'social_instagram')),
				'flickr'					=> stripslashes(get_option($this->prefix.'social_flickr')),
				'github'					=> stripslashes(get_option($this->prefix.'social_github')),
				'wordpress'					=> stripslashes(get_option($this->prefix.'social_wordpress')),
				'tumblr'					=> stripslashes(get_option($this->prefix.'social_tumblr')),
				'blogger'					=> stripslashes(get_option($this->prefix.'social_blogger')),
				
				'showfacebook'				=> stripslashes(get_option($this->prefix.'social_showfacebook')),
				'showtwitter'				=> stripslashes(get_option($this->prefix.'social_showtwitter')),
				'showgoogleplus'			=> stripslashes(get_option($this->prefix.'social_showgoogleplus')),
				'showlinkedin'				=> stripslashes(get_option($this->prefix.'social_showlinkedin')),
				'showvimeo'					=> stripslashes(get_option($this->prefix.'social_showvimeo')),
				'showyoutube'				=> stripslashes(get_option($this->prefix.'social_showyoutube')),
				'showinstagram'				=> stripslashes(get_option($this->prefix.'social_instagram')),
				'showflickr'				=> stripslashes(get_option($this->prefix.'social_showflickr')),
				'showgithub'				=> stripslashes(get_option($this->prefix.'social_showgithub')),
				'showwordpress'				=> stripslashes(get_option($this->prefix.'social_showwordpress')),
				'showtumblr'				=> stripslashes(get_option($this->prefix.'social_showtumblr')),
				'showblogger'				=> stripslashes(get_option($this->prefix.'social_showblogger')),
				'showfeed'				=> stripslashes(get_option($this->prefix.'social_showfeed')),
				
				'socialimg1'				=> stripslashes(get_option($this->prefix.'social_socialimg1')),
				'socialurl1'				=> stripslashes(get_option($this->prefix.'social_socialurl1')),
				'socialimg2'				=> stripslashes(get_option($this->prefix.'social_socialimg2')),
				'socialurl2'				=> stripslashes(get_option($this->prefix.'social_socialurl2')),
				'socialimg3'				=> stripslashes(get_option($this->prefix.'social_socialimg3')),
				'socialurl3'				=> stripslashes(get_option($this->prefix.'social_socialurl3')),
                
				'socialwidgetfoot'			=> stripslashes(get_option($this->prefix.'social_socialwidgetfoot')),
				'facebook_footer'			=> stripslashes(get_option($this->prefix.'social_facebook_footer')),
				'twitter_footer'			=> stripslashes(get_option($this->prefix.'social_twitter_footer')),
				'linkedin_footer'			=> stripslashes(get_option($this->prefix.'social_linkedin_footer')),
				'googleplus_footer'			=> stripslashes(get_option($this->prefix.'social_googleplus_footer')),
				'pinterest_footer'			=> stripslashes(get_option($this->prefix.'social_pinterest_footer')),
				'showfacebook_footer'		=> stripslashes(get_option($this->prefix.'social_showfacebook_footer')),
				'showtwitter_footer'		=> stripslashes(get_option($this->prefix.'social_showtwitter_footer')),
				'showlinkedin_footer'		=> stripslashes(get_option($this->prefix.'social_showlinkedin_footer')),
				'showgoogleplus_footer'		=> stripslashes(get_option($this->prefix.'social_showgoogleplus_footer')),
				'showpinterest_footer'		=> stripslashes(get_option($this->prefix.'social_showpinterest_footer')),
				'socialimg4'				=> stripslashes(get_option($this->prefix.'social_socialimg4')),
				'socialurl4'				=> stripslashes(get_option($this->prefix.'social_socialurl4')),
				'socialimg5'				=> stripslashes(get_option($this->prefix.'social_socialimg5')),
				'socialurl5'				=> stripslashes(get_option($this->prefix.'social_socialurl5')),
				'socialimg6'				=> stripslashes(get_option($this->prefix.'social_socialimg6')),
				'socialurl6'				=> stripslashes(get_option($this->prefix.'social_socialurl6')),
			),
			'contact'	=> array(
				'cformtype'					=> stripslashes(get_option($this->prefix.'contact_cformtype')),
				'cformtitle'				=> stripslashes(get_option($this->prefix.'contact_cformtitle')),
				'cformtitlecolor'			=> stripslashes(get_option($this->prefix.'contact_cformtitlecolor')),
				'ctitle'					=> stripslashes(get_option($this->prefix.'contact_ctitle')),
				'ctext'						=> stripslashes(get_option($this->prefix.'contact_ctext')),
				'cmail'						=> stripslashes(get_option($this->prefix.'contact_cmail')),
				'cshow'						=> stripslashes(get_option($this->prefix.'contact_cshow')),
				'cform'						=> stripslashes(get_option($this->prefix.'contact_cform')),
				'cformcode'					=> stripslashes(get_option($this->prefix.'contact_cformcode')),
				'cfield1'					=> stripslashes(get_option($this->prefix.'contact_cfield1')),
				'cfield2'					=> stripslashes(get_option($this->prefix.'contact_cfield2')),
				'cfield3'					=> stripslashes(get_option($this->prefix.'contact_cfield3')),
				'cfield4'					=> stripslashes(get_option($this->prefix.'contact_cfield4')),
				'cfield5'					=> stripslashes(get_option($this->prefix.'contact_cfield5')),
				'cname1'					=> stripslashes(get_option($this->prefix.'contact_cname1')),
				'cname2'					=> stripslashes(get_option($this->prefix.'contact_cname2')),
				'cname3'					=> stripslashes(get_option($this->prefix.'contact_cname3')),
				'cname4'					=> stripslashes(get_option($this->prefix.'contact_cname4')),
				'cname5'					=> stripslashes(get_option($this->prefix.'contact_cname5')),
				'ctype1'					=> stripslashes(get_option($this->prefix.'contact_ctype1')),
				'ctype2'					=> stripslashes(get_option($this->prefix.'contact_ctype2')),
				'ctype3'					=> stripslashes(get_option($this->prefix.'contact_ctype3')),
				'ctype4'					=> stripslashes(get_option($this->prefix.'contact_ctype4')),
				'ctype5'					=> stripslashes(get_option($this->prefix.'contact_ctype5')),
				'cerror'					=> stripslashes(get_option($this->prefix.'contact_cerror')),
				'csukses'					=> stripslashes(get_option($this->prefix.'contact_csukses')),
				'sendTitle'					=> stripslashes(get_option($this->prefix.'contact_sendTitle')),
				'cbtncolor'					=> stripslashes(get_option($this->prefix.'contact_cbtncolor')),
				'cbtnshadow'				=> stripslashes(get_option($this->prefix.'contact_cbtnshadow')),
			),       	
			'mobile'		=> array(	
				'showBannerm'				=> stripslashes(get_option($this->prefix.'mobile_showBannerm')),
				'showFeatureTopm'			=> stripslashes(get_option($this->prefix.'mobile_showFeatureTopm')),
				'showFeatureListm'			=> stripslashes(get_option($this->prefix.'mobile_showFeatureListm')),		
				'showContactm'				=> stripslashes(get_option($this->prefix.'mobile_showContactm')),
				'showPortfolio'				=> stripslashes(get_option($this->prefix.'mobile_showPortfolio')),
				'showTestim'				=> stripslashes(get_option($this->prefix.'mobile_showTestim')),
				'showTabm'					=> stripslashes(get_option($this->prefix.'mobile_showTabm')),
				'screenshotShowm'			=> stripslashes(get_option($this->prefix.'mobile_screenshotShowm')),
				'showSocialTopm'			=> stripslashes(get_option($this->prefix.'mobile_showSocialTopm')),				
			),
			'tab'		=> array(
				'tabshow'					=> stripslashes(get_option($this->prefix.'tab_tabshow')),
				'tabtitle'					=> stripslashes(get_option($this->prefix.'tab_tabtitle')),
				'tabtitlecolor'				=> stripslashes(get_option($this->prefix.'tab_tabtitlecolor')),
				'buttontexttab'				=> stripslashes(get_option($this->prefix.'tab_buttontexttab')),
				'btncolortab'				=> stripslashes(get_option($this->prefix.'tab_btncolortab')),
				'btnshadowtab'				=> stripslashes(get_option($this->prefix.'tab_btnshadowtab')),
			),	
			'testi'		=> array(
				'testishow'					=> stripslashes(get_option($this->prefix.'testi_testishow')),
				'testishowpost'				=> stripslashes(get_option($this->prefix.'testi_testishowpost')),
				'testititle'				=> stripslashes(get_option($this->prefix.'testi_testititle')),
				'testititlecolor'			=> stripslashes(get_option($this->prefix.'testi_testititlecolor')),
			),	
			'screenshot'		=> array(
				'screenshotShow'			=> stripslashes(get_option($this->prefix.'screenshot_screenshotShow')),
				'screenshotTitle'			=> stripslashes(get_option($this->prefix.'screenshot_screenshotTitle')),
				'screenshotTitleColor'		=> stripslashes(get_option($this->prefix.'screenshot_screenshotTitleColor')),
			),	
			'features'		=> array(
				'featuresShow'			=> stripslashes(get_option($this->prefix.'features_featuresShow')),
				'featuresLimit'			=> stripslashes(get_option($this->prefix.'features_featuresLimit')),
				'featuresTitle'			=> stripslashes(get_option($this->prefix.'features_featuresTitle')),
				'featuresTitleColor'			=> stripslashes(get_option($this->prefix.'features_featuresTitleColor')),
				'featuresLinkColor'			=> stripslashes(get_option($this->prefix.'features_featuresLinkColor')),
			),	
		);
		
		//echo("generate value : <pre>");print_r($this->value);echo("</pre><br /><br />");
	}
	
	// updateData
	function updateData()
	{


		$array_keys	= array_keys($this->data);
		
		foreach($array_keys as $key) :
			if(is_array($this->data[$key])) :
				$value	= implode(',',$this->data[$key]);
			else :
				$value	= $this->data[$key];
			endif;
			
			update_option($key,$value);
		endforeach;
		
		$this->status	= "update";
	}
	
	/*==================================================================================*/
	/*=========================				VIEW			   =========================*/
	/*==================================================================================*/
	
	// notification
	function notification()
	{
		$this->processingInput();
		$this->generateValue();
		
		if($this->status == "update") :
		?><div class="message updated fade"><p>Settings have been updated</p></div><?php
		endif;
	}
	
	// view
	function view()
	{
		global $eureka_nextgen;
		$this->notification();
		?>
<form name="form1" method="post" action="" id="settingForm">

<script type="text/javascript" src="<?php echo THEMELINK; ?>/admin/js/nicEdit.js"></script>
<script type="text/javascript" src="<?php echo THEMELINK; ?>/admin/js/colpick.js"></script>

<script type="text/javascript">
	$(document).ready(function() {
		$('.colorspicker').colpick({
			layout:'hex',
			submit:0,
			colorScheme:'dark',
			onChange:function(hsb,hex,rgb,el,bySetColor) {
				$(el).css('border-color','#'+hex);
				// Fill the text box just if the color was set using the picker, and not the colpickSetColor function.
				if(!bySetColor) $(el).val(hex);
			}
		}).keyup(function(){
			$(this).colpickSetColor(this.value);
		});
	});
</script>
<div id="tab-master" class="tabs">
	<h2>Themes Options</h2>
  <ul id="masternav">
    <li><a href="#GeneralSetting">General Setting</a></li>
    <li><a href="#HeaderSetting">Header Setting</a></li>
    <li><a href="#FeaturedTop">Featured Top</a></li>
    <li><a href="#OthersFeatures">Others Features</a></li>
    <li><a href="#SocialSetting">Social Setting</a></li>
    <li><a href="#ContactForm">Contact Form</a></li>
    <li><a href="#SmallDevice">Small Device</a></li>
  </ul>
  <div id="GeneralSetting" class="theContainer">
	<?php //=============================================General Setting=============================================// ?>
    <div class="theContainer-entry">
        <div class="postboxs">
            <h3>General Setting</h3>
            <div class="inside"> 	
                <?php parent::generateImageUpload("Favicon , 16x16 Pixel"					,"general","favicon",true); ?>
				<?php parent::generateInputTextColor("Body Background Color"   ,"color","bodycolor"); ?>
				<?php parent::generateInputTextColor("Top Background Color"   ,"color","topcolor"); ?>
				<?php parent::generateInputTextColor("Banner Background Color"   ,"color","bannercolor"); ?>
				<?php parent::generateInputTextColor("Footer Background Color"   ,"color","footercolor"); ?>
				<?php parent::generateInputTextColor("Font Color"   ,"color","fontcolor"); ?>
				<?php parent::generateInputTextColor("Link Color"   ,"color","linkcolor"); ?>
				<?php parent::generateInputTextColor("Link Hover Color"   ,"color","linkhovercolor"); ?>
				<?php parent::generateInputTextColor("Footer Font Color"   ,"color","footerfontcolor"); ?>
				<?php parent::generateInputTextColor("Footer Link Color"   ,"color","footerlinkcolor"); ?>
				<?php parent::generateInputTextColor("Footer Link Hover Color"   ,"color","footerlinkhovercolor"); ?>
				<?php parent::generateOptions('Use Logo Footer?'			,"general","showlogofooter",$this->eu_active);?> 
				<?php parent::generateImageUpload("Logo Footer 120x90 px"					,"general","logofooter",true); ?>
                <?php parent::generateInputTextarea("Google Analytic"						,"general","analytic"); ?>    
            </div><!-- END .inside -->        
        </div><!-- END .postboxs -->      
    </div><!-- END .theContainer-entry -->      
  </div><!-- END .theContainer -->  
  <div class="theContainer" id="HeaderSetting">
    <div class="theContainer-entry">
        <div class="postboxs">
            <div id="tabs" class="tabs">
                <ul>
                    <li><a href="#LogoNavigation">Logo & Navigation</a></li>
                    <li><a href="#SLIDERSET">Banner Setting</a></li>
                </ul> 
                <div id="LogoNavigation" class="tabs-entry2">
                    <h3>Logo & Navigation</h3>
                    <div class="inside">
                        <?php parent::generateImageUpload("Logo max Height 125px"					,"header","logo",true); ?>
                        <?php parent::generateInputText("Logo Width (Pixel) eg.200px"						,"header","logowidth"); ?>
                        <?php parent::generateInputTextarea("Logo text"								,"header","logotext",true); ?> 
                        <?php parent::generateInputText('Menu Font Size? eg.12,14,16'				,"header","menufontsize");?> 
                    </div><!-- END .inside -->    
                </div>   
                <div id="SLIDERSET" class="tabs-entry2">
                    <div class="inside">
                        <h3>BANNER SETTING</h3> 
                        <?php parent::generateOptions('Show Banner?'			,"slider","showbanner",$this->eu_active);?> 
                        <?php parent::generateOptions('Banner Type'			,	"slider","bannertype",$this->eu_optbox);?> 
                        <?php parent::generateOptions('Content Position'			,	"slider","contentposition",$this->eu_float);?> 
                        <?php parent::generateInputText("Space Text Between Button"   		,"slider","ortxt"); ?>
                        <div id="tab2" class="tabs">
                            <ul>
                                <li><a href="#SLIDERSETTING">SLIDER SETTING</a></li>
                                <li><a href="#BANNERCONTENT">BANNER CONTENT</a></li>
                                <li><a href="#YOUTUBE">YOUTUBE VIDEO</a></li>
                                <li><a href="#CUSTOMM">CUSTOM VIDEO</a></li>
                                <li><a href="#BANNER">STATIC BANNER</a></li>
                            </ul>
                            <div id="SLIDERSETTING" class="tabs-entry2">
                                <h3>SLIDER SETTING</h3>
                                <div class="inside"> 
								<?php parent::generateInputText("Slide Speed (Default : 7000)"		,"slider","slidespeed"); ?>
                                <?php parent::generateInputText("Animation Speed (Default : 600)"   ,"slider","animspeed"); ?>
                                </div> 
                            </div>
                            <div id="BANNERCONTENT" class="tabs-entry2">
                                <h3>BANNER CONTENT FOR VIDEO/STATIC BANNER</h3>
                                <div class="inside"> 
								<?php parent::generateInputText("Banner Title"			,"slider","bannertitle"); ?>
                                <?php parent::generateInputTextarea("Banner Description"   ,"slider","bannerdesc",true); ?>
                        		<?php parent::generateOptions('Use Button 1?'			,"slider","slidebtn1",$this->eu_active);?> 
                                <?php parent::generateInputText("Button 1 Text"   ,"slider","slidebtn1text"); ?>
                                <?php parent::generateInputTextColor("Button 1 Color"   ,"slider","slidebtn1color"); ?>
                                <?php parent::generateInputTextColor("Button 1 Shadow Color"   ,"slider","slidebtn1shadowcolor"); ?>
                                <?php parent::generateInputText("Button 1 Url"   ,"slider","slidebtn1url"); ?>
                        		<?php parent::generateOptions('Use Button 2?'			,"slider","slidebtn2",$this->eu_active);?> 
                                <?php parent::generateInputText("Button 2 Text"   ,"slider","slidebtn2text"); ?>
                                <?php parent::generateInputTextColor("Button 2 Color"   ,"slider","slidebtn2color"); ?>
                                <?php parent::generateInputTextColor("Button 2 Shadow Color"   ,"slider","slidebtn2shadowcolor"); ?>
                                <?php parent::generateInputText("Button 2 Url"   ,"slider","slidebtn2url"); ?>
                                </div>  
                            </div>
                            <div id="YOUTUBE" class="tabs-entry2">
                                <h3>YOUTUBE</h3>
                                <div class="inside"> 
                                    <?php parent::generateInputText("Youtube Video ID"	,"slider",'youtubeId'); ?>
                                    <?php parent::generateInputText(" Video Height"	,"slider",'youtubeHeight'); ?>
                                </div>  
                            </div>
                            <div id="CUSTOMM" class="tabs-entry2">
                                <h3>CUSTOM VIDEO</h3>
                                <div class="inside"> 
                                    <?php parent::generateInputText(" Video Height"	,"slider",'videoHeight'); ?>
                                    <?php parent::generateInputTextVid("Video Custom Path (.mp4)"	,"slider",'videomp4'); ?>
                                    <?php parent::generateInputTextVid("Video Custom Path (.webm)"	,"slider",'videowebm'); ?>
                                    <?php parent::generateInputTextVid("Video Custom Path (.ogv)"	,"slider",'videoogv'); ?>
                                    <?php parent::generateImageUpload("Video Custom Cover Images 480x265 Pixel"	,"slider",'videocover',true); ?>
                                </div> 
                            </div>
                            <div id="BANNER" class="tabs-entry2">
                                <h3>STATIC BANNER</h3>
                                <div class="inside"> 
                              	 <?php parent::generateImageUpload("BANNER IMAGES 480x265 Pixel" ,"slider",'bannerimages',true); ?>
                                </div> 
                            </div>
                         </div> 
                    </div><!-- END .inside -->  
                </div>   
           </div> <!-- END .tabs -->                  
        </div><!-- END .postboxs -->    
    </div><!-- END .theContainer-entry -->      
  </div><!-- END .theContainer -->  
  <div class="theContainer" id="FeaturedTop">
    <div class="theContainer-entry">
        <div class="postboxs">
            <h3>Featured Top</h3>
            <?php parent::generateOptions('Use Featured Top ?'				,"featuredTop","showTop",$this->eu_active);?>
			<?php parent::generateInputText("Featured Title"				,"featuredTop",'FTtitle'); ?>
            <?php parent::generateInputTextColor("Featured Title Color"		,"featuredTop",'FTtitlecolor'); ?>
            <div class="inside">
                <div id="tabs" class="tabs">
                    <ul>
                    	<li><a href="#featuredTop1">Featured 1</a></li>
                    	<li><a href="#featuredTop2">Featured 2</a></li>
                    	<li><a href="#featuredTop3">Featured 3</a></li>
                    	<li><a href="#featuredTop4">Featured 4</a></li>
                    	<li><a href="#featuredTop5">Featured 5</a></li>
                    	<li><a href="#featuredTop6">Featured 6</a></li>
                    	<li><a href="#featuredTop7">Featured 7</a></li>
                    	<li><a href="#featuredTop8">Featured 8</a></li>
                    </ul>
                    <div id="featuredTop1" class="tabs-entry2">
                        <h3>Promo 1</h3>
                        <?php parent::generateOptions('Show Featured'			,"featuredTop","FTshowm1",$this->eu_active);?>
                        <?php parent::generateInputText("Title"					,"featuredTop",'FTtitle1'); ?>
                        <?php parent::generateInputTextarea("Content"			,"featuredTop","FTcontent1",true); ?>  
                        <?php parent::generateImageUpload("Image icon 50x50 Pixel"				,"featuredTop",'FTthumb1'); ?>
                        <?php parent::generateInputText("Target Url"			,"featuredTop",'FTbtnurl1'); ?>
                    </div><!-- end .tabs-entry2 -->
                    <div id="featuredTop2" class="tabs-entry2">
                        <h3>Promo 2</h3>
                        <?php parent::generateOptions('Show Featured'			,"featuredTop","FTshowm2",$this->eu_active);?>
                        <?php parent::generateInputText("Title"					,"featuredTop",'FTtitle2'); ?>
                        <?php parent::generateInputTextarea("Content"			,"featuredTop","FTcontent2",true); ?>  
                        <?php parent::generateImageUpload("Image icon 50x50 Pixel"				,"featuredTop",'FTthumb2'); ?>
                        <?php parent::generateInputText("Target Url"			,"featuredTop",'FTbtnurl2'); ?>
                    </div><!-- end .tabs-entry2 -->
                    <div id="featuredTop3" class="tabs-entry2">
                        <h3>Promo 3</h3>
                        <?php parent::generateOptions('Show Featured'			,"featuredTop","FTshowm3",$this->eu_active);?>
                        <?php parent::generateInputText("Title"					,"featuredTop",'FTtitle3'); ?>
                        <?php parent::generateInputTextarea("Content"			,"featuredTop","FTcontent3",true); ?>  
                        <?php parent::generateImageUpload("Image icon 50x50 Pixel"				,"featuredTop",'FTthumb3'); ?>
                        <?php parent::generateInputText("Target Url"			,"featuredTop",'FTbtnurl3'); ?>
                    </div><!-- end .tabs-entry2 -->
                    <div id="featuredTop4" class="tabs-entry2">
                        <h3>Promo 4</h3>
                        <?php parent::generateOptions('Show Featured '			,"featuredTop","FTshowm4",$this->eu_active);?>
                        <?php parent::generateInputText("Title "				,"featuredTop",'FTtitle4'); ?>
                        <?php parent::generateInputTextarea("Content"			,"featuredTop","FTcontent4",true); ?>  
                        <?php parent::generateImageUpload("Image icon 50x50 Pixel"				,"featuredTop",'FTthumb4'); ?>
                        <?php parent::generateInputText("Target Url"			,"featuredTop",'FTbtnurl4'); ?>
                    </div><!-- end .tabs-entry2 -->
                    <div id="featuredTop5" class="tabs-entry2">
                        <h3>Promo 5</h3>
                        <?php parent::generateOptions('Show Featured '			,"featuredTop","FTshowm5",$this->eu_active);?>
                        <?php parent::generateInputText("Title "				,"featuredTop",'FTtitle5'); ?>
                        <?php parent::generateInputTextarea("Content"			,"featuredTop","FTcontent5",true); ?>  
                        <?php parent::generateImageUpload("Image icon 50x50 Pixel"				,"featuredTop",'FTthumb5'); ?>
                        <?php parent::generateInputText("Target Url"			,"featuredTop",'FTbtnurl5'); ?>
                    </div><!-- end .tabs-entry2 -->
                    <div id="featuredTop6" class="tabs-entry2">
                        <h3>Promo 6</h3>
                        <?php parent::generateOptions('Show Featured '			,"featuredTop","FTshowm6",$this->eu_active);?>
                        <?php parent::generateInputText("Title "				,"featuredTop",'FTtitle6'); ?>
                        <?php parent::generateInputTextarea("Content"			,"featuredTop","FTcontent6",true); ?>  
                        <?php parent::generateImageUpload("Image icon 50x50 Pixel"				,"featuredTop",'FTthumb6'); ?>
                        <?php parent::generateInputText("Target Url"			,"featuredTop",'FTbtnurl6'); ?>
                    </div><!-- end .tabs-entry2 -->
                    <div id="featuredTop7" class="tabs-entry2">
                        <h3>Promo 7</h3>
                        <?php parent::generateOptions('Show Featured '			,"featuredTop","FTshowm7",$this->eu_active);?>
                        <?php parent::generateInputText("Title "				,"featuredTop",'FTtitle7'); ?>
                        <?php parent::generateInputTextarea("Content"			,"featuredTop","FTcontent7",true); ?>  
                        <?php parent::generateImageUpload("Image icon 50x50 Pixel"				,"featuredTop",'FTthumb7'); ?>
                        <?php parent::generateInputText("Target Url"			,"featuredTop",'FTbtnurl7'); ?>
                    </div><!-- end .tabs-entry2 -->
                    <div id="featuredTop8" class="tabs-entry2">
                        <h3>Promo 8</h3>
                        <?php parent::generateOptions('Show Featured '			,"featuredTop","FTshowm8",$this->eu_active);?>
                        <?php parent::generateInputText("Title "				,"featuredTop",'FTtitle8'); ?>
                        <?php parent::generateInputTextarea("Content"			,"featuredTop","FTcontent8",true); ?>  
                        <?php parent::generateImageUpload("Image icon 50x50 Pixel"				,"featuredTop",'FTthumb8'); ?>
                        <?php parent::generateInputText("Target Url"			,"featuredTop",'FTbtnurl8'); ?>
                    </div><!-- end .tabs-entry2 -->
                </div><!-- end .tabs -->
            </div><!-- end .inside -->                  
        </div><!-- END .postboxs -->          
    </div><!-- END .theContainer-entry -->      
  </div><!-- END .theContainer -->  
  <div class="theContainer" id="OthersFeatures">
    <div class="theContainer-entry">
        <div class="postboxs">
            <h3>OTHERS FEATURES</h3>
            <div id="tabs" class="tabs">
                <ul>
                    <li><a href="#TABCONTENT">TAB POST</a></li>
                    <li><a href="#CLIENTTESTIMONIAL">TESTIMONIAL</a></li>
                    <li><a href="#FEATURELIST">FEATURE LIST</a></li>
                    <li><a href="#SCREENSHOT">SCREENSHOT</a></li>
                </ul>       
                <div id="TABCONTENT" class="tabs-entry2">
                    <div class="inside">
                        <h3>TAB POST</h3>
                        <?php parent::generateOptions('Show Tab Post?'				,"tab","tabshow",$this->eu_active);?>
                        <?php parent::generateInputText("Tab Title"					,"tab",'tabtitle'); ?>
                        <?php parent::generateInputTextColor("Title Color"			,"tab",'tabtitlecolor'); ?>
                        <?php parent::generateInputText("Button Text"				,"tab",'buttontexttab'); ?>
                        <?php parent::generateInputTextColor("Button Color"			,"tab",'btncolortab'); ?>
						<?php parent::generateInputTextColor("Button Shadow Color"	,"tab","btnshadowtab"); ?> 
                    </div><!-- end .inside -->
                </div>    
                <div id="FEATURELIST" class="tabs-entry2">
                    <div class="inside">
                        <h3>FEATURE LIST</h3>
                        <?php parent::generateOptions('Show Feature List?'				,"features","featuresShow",$this->eu_active);?>
                        <?php parent::generateOptions("Feature List Limit To Show"	,"features",'featuresLimit',$this->numbering3);?>
                        <?php parent::generateInputText("Feature List Title"	,"features",'featuresTitle'); ?>
                        <?php parent::generateInputTextColor("Title Color"	,"features",'featuresTitleColor'); ?>
                        <?php parent::generateInputTextColor("Link Color"	,"features",'featuresLinkColor'); ?>
                    </div><!-- end .inside -->
                </div> 
                <div id="CLIENTTESTIMONIAL" class="tabs-entry2">
                    <div class="inside">
                        <h3>TESTIMONIAL</h3>
                        <?php parent::generateOptions('Show Testimonial?'				,"testi","testishow",$this->eu_active);?>
                        <?php parent::generateOptions("Testi Limit To Show"			,"testi",'testishowpost',$this->numbering2);?>
                        <?php parent::generateInputText("Testimonial Title"				,"testi",'testititle'); ?>
                        <?php parent::generateInputTextColor("Title Color"				,"testi",'testititlecolor'); ?>
                    </div><!-- end .inside -->  
                </div>       
                <div id="SCREENSHOT" class="tabs-entry2">
                    <div class="inside">
                        <h3>SCREENSHOT</h3>
                        <?php parent::generateOptions('Show Screenshot?'	,"screenshot","screenshotShow",$this->eu_active);?>
                        <?php parent::generateInputText("Screenshot Title"				,"screenshot",'screenshotTitle'); ?>
                        <?php parent::generateInputTextColor("Screenshot Title Color"		,"screenshot",'screenshotTitleColor'); ?>
                    </div><!-- end .inside -->  
                </div>    
           </div><!-- end .tabs -->           
        </div><!-- end .posbox -->    
    </div><!-- END .theContainer-entry -->      
  </div><!-- END .theContainer -->  
  <div class="theContainer" id="SocialSetting">
    <div class="theContainer-entry">
        <div class="postboxs">
            <h3>Social Setting</h3>
            <div class="inside">
                <?php parent::generateOptions('Active Social Icon Footer?'			,"social","socialwidget",$this->eu_active);?>
                <?php parent::generateInputText("Facebook link account"				,"social",'facebook'); ?>
                <?php parent::generateOptions('Show Facebook Icon?'					,"social","showfacebook",$this->eu_active);?>
                
                <?php parent::generateInputText("Twitter link account"				,"social",'twitter'); ?>
                <?php parent::generateOptions('Show Twitter Icon?'					,"social","showtwitter",$this->eu_active);?>
                
                <?php parent::generateInputText("Linkedin link account"				,"social",'linkedin'); ?>
                <?php parent::generateOptions('Show Linkedin Icon?'					,"social","showlinkedin",$this->eu_active);?>
                
                <?php parent::generateInputText("Google Plus link account"			,"social",'googleplus'); ?>
                <?php parent::generateOptions('Show Google Plus Icon?'				,"social","showgoogleplus",$this->eu_active);?>
                
                <?php parent::generateInputText("Vimeo link account"				,"social",'vimeo'); ?> 
                <?php parent::generateOptions('Show Vimeo Icon?'					,"social","showvimeo",$this->eu_active);?>
                
                <?php parent::generateInputText("Youtube link account"				,"social",'youtube'); ?>
                <?php parent::generateOptions('Show Youtube Icon?'					,"social","showyoutube",$this->eu_active);?>
                
                <?php parent::generateInputText("Instagram link account"			,"social",'instagram'); ?>
                <?php parent::generateOptions('Show Instagram Icon?'				,"social","showinstagram",$this->eu_active);?>
                
                <?php parent::generateInputText("Flickr link account"				,"social",'flickr'); ?>
                <?php parent::generateOptions('Show Flickr Icon?'					,"social","showflickr",$this->eu_active);?>
                
                <?php parent::generateInputText("Github link account"				,"social",'github'); ?>
                <?php parent::generateOptions('Show Github Icon?'					,"social","showgithub",$this->eu_active);?>
                
                <?php parent::generateInputText("Wordpress link account"			,"social",'wordpress'); ?>
                <?php parent::generateOptions('Show Wordpress Icon?'				,"social","showwordpress",$this->eu_active);?>
                
                <?php parent::generateInputText("Tumblr link account"				,"social",'tumblr'); ?>
                <?php parent::generateOptions('Show Tumblr Icon?'					,"social","showtumblr",$this->eu_active);?>
                
                <?php parent::generateInputText("Blogger link account"				,"social",'blogger'); ?>
                <?php parent::generateOptions('Show Blogger Icon?'					,"social","showblogger",$this->eu_active);?>
                
                <?php parent::generateOptions('Show Feed Icon?'						,"social","showfeed",$this->eu_active);?>
                
                <?php parent::generateImageUpload("Others social icon 1 16x16 Px"	,"social","socialimg1",true); ?> 
                <?php parent::generateInputText("Others social icon 1 Link"			,"social","socialurl1"); ?> 
                <?php parent::generateImageUpload("Others social icon 2 16x16 Px"	,"social","socialimg2",true); ?> 
                <?php parent::generateInputText("Others social icon 2 Link"			,"social","socialurl2"); ?> 
                <?php parent::generateImageUpload("Others social icon 3 16x16 Px"	,"social","socialimg3",true); ?> 
                <?php parent::generateInputText("Others social icon 3 Link"			,"social","socialurl3"); ?> 
            </div><!-- END .inside -->         
        </div><!-- END .postboxs -->   
    </div><!-- END .theContainer-entry -->      
  </div><!-- END .theContainer -->
  <div class="theContainer" id="ContactForm">
    <div class="theContainer-entry">
        <div class="postboxs">
            <h3>Contact Form</h3>
            <div class="inside"> 
                <?php parent::generateOptions('Use Form Widget ?'				,"contact","cshow",$this->eu_active);?>
                <?php parent::generateInputText("Contact Title "				,"contact",'cformtitle'); ?>  
                <?php parent::generateInputTextColor("Contact Title Color"		,"contact",'cformtitlecolor'); ?>  
				<?php parent::generateInputTextColor("Button Color"				,"contact",'cbtncolor'); ?>
                <?php parent::generateInputTextColor("Button Shadow Color"		,"contact","cbtnshadow"); ?> 
                <?php parent::generateInputText("Your Email "					,"contact",'cmail'); ?>
                <?php parent::generateInputText("Send Mail Title "				,"contact",'sendTitle'); ?>
                <div id="tabs" class="tabs">
                    <ul>
                        <li><a href="#contactForm">Contact Form Custom</a></li>
                    </ul> 
                    <div id="contactForm" class="tabs-entry2">
                        <h3>Contact Form</h3>  
                        <?php parent::generateInputText("Error message "				,"contact",'cerror'); ?>  
                        <?php parent::generateInputText("Success message "				,"contact",'csukses'); ?>
                        <h3>Field 1</h3>
                        <?php parent::generateOptions('Use field 1 ?'						,"contact","cfield1",$this->eu_active);?>
                        <?php parent::generateInputText("Field Name"					,"contact",'cname1'); ?>  
                        <?php parent::generateOptions('Input Type'						,"contact","ctype1",$this->eu_formtype);?>
                        <h3>Field 2</h3>
                        <?php parent::generateOptions('Use field 2 ?'						,"contact","cfield2",$this->eu_active);?>
                        <?php parent::generateInputText("Field Name"					,"contact",'cname2'); ?>  
                        <?php parent::generateOptions('Input Type'						,"contact","ctype2",$this->eu_formtype);?>
                        <h3>Field 3</h3>
                        <?php parent::generateOptions('Use field 3 ?'					,"contact","cfield3",$this->eu_active);?>
                        <?php parent::generateInputText("Field Name"					,"contact",'cname3'); ?>  
                        <?php parent::generateOptions('Input Type'						,"contact","ctype3",$this->eu_formtype);?>
                        <h3>Field 4</h3>
                        <?php parent::generateOptions('Use field 4 ?'					,"contact","cfield4",$this->eu_active);?>
                        <?php parent::generateInputText("Field Name"					,"contact",'cname4'); ?>  
                        <?php parent::generateOptions('Input Type'						,"contact","ctype4",$this->eu_formtype);?>
                        <h3>Field 5</h3>
                        <?php parent::generateOptions('Use field 5 ?'					,"contact","cfield5",$this->eu_active);?>
                        <?php parent::generateInputText("Field Name"					,"contact",'cname5'); ?>   
                        <?php parent::generateOptions('Input Type'						,"contact","ctype5",$this->eu_formtype);?>
                        <div class="caption"> 
                            <p>You can use shortcode into your post, page or text widget</p>
                            <h5>Ex : [contact]</h5>
                        </div>    
                    </div><!-- end .tabs-entry2 -->
                </div><!-- end .tabs -->
            </div><!-- END .inside -->                   
        </div><!-- END .postboxs -->          
    </div><!-- END .theContainer-entry -->      
  </div><!-- END .theContainer -->  
  <div class="theContainer" id="SmallDevice">
    <div class="theContainer-entry">
        <div class="postboxs">
            <h3>Small Device Setting</h3>
            <div class="inside">
                <?php parent::generateOptions('Show banner ?'				,"mobile","showBannerm",$this->eu_mobile);?>
                <?php parent::generateOptions('Show Feature Top ?'			,"mobile","showFeatureTopm",$this->eu_mobile);?>
                <?php parent::generateOptions('Show Testimonial ?'			,"mobile","showTestim",$this->eu_mobile);?>
                <?php parent::generateOptions('Show Tab Post ?'				,"mobile","showTabm",$this->eu_mobile);?>
                <?php parent::generateOptions('Show Feature List ?'			,"mobile","showFeatureListm",$this->eu_mobile);?>
                <?php parent::generateOptions('Show Contact Form ?'			,"mobile","showContactm",$this->eu_mobile);?>
                <?php parent::generateOptions('Show Screenshot ?'			,"mobile","screenshotShowm",$this->eu_mobile);?>
                <?php parent::generateOptions('Show Social Widget'			,"mobile","showSocialTopm",$this->eu_mobile);?>
                    
            </div><!-- END .inside -->                    
        </div><!-- END .postboxs -->        
    </div><!-- END .theContainer-entry -->      
  </div><!-- END .theContainer -->  
</div><!-- END #accordion -->
<div class="input-button" style="clear:both;">
    <?php parent::generateTinyMCE(); ?>
    <?php wp_nonce_field('eureka-update-theme-setting'); ?>
    <input type="submit" class="button-primary" name="savethis" value="<?php _e('Save Settings', 'eureka') ?>" />
</div>
</form>
        
        <?php
	}
}
$eureka_setting	= new EurekaSetting;
$eureka_setting->init();

?>