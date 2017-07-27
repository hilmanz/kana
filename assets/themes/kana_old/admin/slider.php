<?php

class SliderSetting extends eurekaApp
{	
	var $data;
	var $value;
	var $status;
	var $prefix	= "eureka_";
	var $eu_active	= array(
						"Yes"		=> "Yes",
						"No"		=> "No",
					  );
	var $eu_opt	= array(
						"Slider"			=> "Slider",
						"StaticBanner"		=> "StaticBanner",
						"Video"				=> "Video",
					  );
	var $eu_vid	= array(
						"Youtube"			=> "Youtube",
						"Custom"			=> "Custom",
					  );
	
	// init
	function init()
	{
		add_action("admin_menu",array(&$this,"createMenu"));
	}
	
	// create menu
	function createMenu()
	{
		add_submenu_page( 'eureka', 'Slider Options', 'Slider Options', 'manage_categories', 'eureka-slider', array(&$this,"view"));
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
			'optslide'		=> array(
				'showslide'				=> stripslashes(get_option($this->prefix.'optslide_showslide')),
				'showslides'			=> stripslashes(get_option($this->prefix.'optslide_showslides')),
				'bannertype'			=> stripslashes(get_option($this->prefix.'optslide_bannertype')),
			),
			'slide'		=> array(
				'slideimg'				=> stripslashes(get_option($this->prefix.'slide_slideimg')),
				'slideurl'				=> stripslashes(get_option($this->prefix.'slide_slideurl')),
				'slidevideo'			=> stripslashes(get_option($this->prefix.'slide_slidevideo')),
				'slidevideomp4'			=> stripslashes(get_option($this->prefix.'slide_slidevideomp4')),
				'slidevideowebm'		=> stripslashes(get_option($this->prefix.'slide_slidevideowebm')),
				'slidevideoogv'			=> stripslashes(get_option($this->prefix.'slide_slidevideoogv')),
				'slidevideotype'		=> stripslashes(get_option($this->prefix.'slide_slidevideotype')),
				'slidevideocover'		=> stripslashes(get_option($this->prefix.'slide_slidevideocover')),
				'slidetex'				=> stripslashes(get_option($this->prefix.'slide_slidetex')),
				'slidetitle'			=> stripslashes(get_option($this->prefix.'slide_slidetitle')),
				'slideheight'			=> stripslashes(get_option($this->prefix.'slide_slideheight')),
				'slidemaxheight'		=> stripslashes(get_option($this->prefix.'slide_slidemaxheight')),
				
				'slideimg1'				=> stripslashes(get_option($this->prefix.'slide_slideimg1')),
				'slideurl1'				=> stripslashes(get_option($this->prefix.'slide_slideurl1')),
				'slidetex1'				=> stripslashes(get_option($this->prefix.'slide_slidetex1')),
				
				'slideimg2'				=> stripslashes(get_option($this->prefix.'slide_slideimg2')),
				'slideurl12'			=> stripslashes(get_option($this->prefix.'slide_slideurl12')),
				'slidetex2'				=> stripslashes(get_option($this->prefix.'slide_slidetex2')),
				
				'slideimg3'				=> stripslashes(get_option($this->prefix.'slide_slideimg3')),
				'slideurl13'			=> stripslashes(get_option($this->prefix.'slide_slideurl13')),
				'slidetex1'				=> stripslashes(get_option($this->prefix.'slide_slidetex3')),
				
				'slideimg4'				=> stripslashes(get_option($this->prefix.'slide_slideimg4')),
				'slideurl14'			=> stripslashes(get_option($this->prefix.'slide_slideurl14')),
				'slidetex4'				=> stripslashes(get_option($this->prefix.'slide_slidetex4')),
				
				'slideimg5'				=> stripslashes(get_option($this->prefix.'slide_slideimg5')),
				'slideurl15'			=> stripslashes(get_option($this->prefix.'slide_slideurl15')),
				'slidetex5'				=> stripslashes(get_option($this->prefix.'slide_slidetex5')),
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
        <div id="tab-master" class="tabs">
            <h2>Slider Options</h2>
          <ul id="masternav">
            <li><a href="#option-eureka">Slide Options</a></li>
            <li><a href="#static-eureka">Static Banner</a></li>
            <li><a href="#video-eureka">Video Banner</a></li>
          </ul>
            <?php //=============================================SLIDE 1=============================================// ?>
			<div id="option-eureka" class="theContainer">
   			 <div class="theContainer-entry">
				<div class="postboxs">
                	<h3>Slider Options</h3>
					<div class="inside"> 
                     		<?php parent::generateOptions('Show Slider'			,"optslide","showslide",$this->eu_active)?>
                     		<?php parent::generateOptions('Show Slider On All Pages'			,"optslide","showslides",$this->eu_active)?>
                     		<?php parent::generateOptions('Banner Type'			,"optslide","bannertype",$this->eu_opt)?>
							<?php parent::generateInputText("Slide Height "				,"slide",'slideheight'); ?>   
                            <?php parent::generateInputText("Maximum Slide Height "				,"slide",'slidemaxheight'); ?>   
					</div>                   
				</div>                 
			  </div> 
			</div>
            <?php //=============================================SLIDE 1=============================================// ?>
			<div id="static-eureka" class="theContainer">
   			 <div class="theContainer-entry">
				<div class="postboxs">
                	<h3>Banner Static Settings</h3>
					<div class="inside"> 
						<?php parent::generateImageUpload("Image 630x490 Pixel"		,"slide","slideimg",true); ?>  
                        <?php parent::generateInputText("Title Slide "				,"slide",'slidetitle'); ?>   
                        <?php parent::generateInputText("URL Slide "				,"slide",'slideurl'); ?>  
					</div>                   
				</div>           
			  </div>   
			</div>
            <?php //=============================================SLIDE 1=============================================// ?>
			<div id="video-eureka" class="theContainer">
   			 <div class="theContainer-entry">
				<div class="postboxs">
                	<h3>Banner Video Settings</h3>
					<div class="inside"> 
                     	<?php parent::generateOptions('Video Type'								,"slide","slidevideotype",$this->eu_vid)?>
                        <?php parent::generateInputText("Youtube Video ID"						,"slide",'slidevideo'); ?>
                        <?php parent::generateImageUpload("Video Custom Path (.mp4)"				,"slide",'slidevideomp4',true); ?>
                        <?php parent::generateImageUpload("Video Custom Path (.webm)"				,"slide",'slidevideowebm',true); ?>
                        <?php parent::generateImageUpload("Video Custom Path (.ogv)"				,"slide",'slidevideoogv',true); ?>
                        <?php parent::generateImageUpload("Video Custom Cover Path"				,"slide",'slidevideocover',true); ?>
					</div> 
					<div class="caption"> 
                    	<p>You can use shortcode into your post, page or text widget</p>
                        <h5>Ex : [video site="youtube" id="dQw4w9WgXcQ" w="630" h="490"]</h5>
                        <p><strong>Video Site List :</strong> </p>
                        <ul>
                            <li>youtube</li>
                            <li>vimeo</li>
                            <li>dailymotion</li>
                            <li>yahoo</li>
                        </ul>
                        <ul>
                            <li>bliptv</li>
                            <li>veoh</li>
                            <li>viddler</li>
                        </ul>
					</div>                       
				</div>  
			  </div>     
			</div>
            <div class="input-button" style="clear:both;">
            	<?php parent::generateTinyMCE(); ?>
	            <?php wp_nonce_field('eureka-update-theme-setting'); ?>
                <input type="submit" class="button-primary" name="savethis" value="<?php _e('Save Settings', 'eureka') ?>" />
            </div>
        </div>
		
			</form>
        
        <?php
	}
}

$slider_setting	= new SliderSetting;
$slider_setting->init();

?>