<?php

class eurekaLayout extends eurekaLayoutApp
{	
	var $data;
	var $value;
	var $status;
	var $prefix	= "eureka_";
	var $bg_repeat	= array(
							"no-repeat"	=> "no-repeat",
							"repeat-x"	=> "repeat-x",
							"repeat-y"	=> "repeat-y",
							"repeat"	=> "repeat"
						  );
	var $yn_options		= array(
							'yes'	=> 'yes',
							"no"	=> 'no',
						  );
	
	// init
	function init()
	{
		add_action("admin_menu",array(&$this,"createMenu"));
	}
	
	// create menu
	function createMenu()
	{
		add_submenu_page( 'eureka', 'ADMIN STYLE &bull; Theme Style', 'Theme Style', 'manage_categories', 'eureka-layout', array(&$this,"view"));
	}
	
	/*==================================================================================*/
	/*=========================			  CONTROLLER		   =========================*/
	/*==================================================================================*/
	
	// processing Input
	function processingInput()
	{
	
		if(isset($_POST['data']) && isset($_POST['_wpnonce'])) :
			check_admin_referer('eureka-update-theme-layout');
			$this->data	= $_POST['data'];
			
			if(isset($_POST['savethis'])) :
				$this->updateData();
			elseif(isset($_POST['restore'])) :
			
				$this->deleteData();
			endif;
		endif;
	}
	
	// generate value from custom options
	function generateValue()
	{
		
		$this->value	= array(
			'colors'		=> array(	
				'generalcolor'				=> stripslashes(get_option($this->prefix.'css_colors_generalcolor')),
				'fontcolor'					=> stripslashes(get_option($this->prefix.'css_colors_fontcolor')),	
				'linkcolor'					=> stripslashes(get_option($this->prefix.'css_colors_linkcolor')),		
				'bgcolor'					=> stripslashes(get_option($this->prefix.'css_colors_bgcolor')),		
				'bgtop'						=> stripslashes(get_option($this->prefix.'css_colors_bgtop')),		
				'bgcontact'					=> stripslashes(get_option($this->prefix.'css_colors_bgcontact')),		
				'contactfont'				=> stripslashes(get_option($this->prefix.'css_colors_contactfont')),		
				'btnact1bg'					=> stripslashes(get_option($this->prefix.'css_colors_btnact1bg')),		
				'btnact1font'				=> stripslashes(get_option($this->prefix.'css_colors_btnact1font')),		
				'btnact2bg'					=> stripslashes(get_option($this->prefix.'css_colors_btnact2bg')),		
				'btnact2font'				=> stripslashes(get_option($this->prefix.'css_colors_btnact2font')),		
				'featuredtopbg'				=> stripslashes(get_option($this->prefix.'css_colors_featuredtopbg')),		
				'featuredtopfont'			=> stripslashes(get_option($this->prefix.'css_colors_featuredtopfont')),		
				'titlefont'					=> stripslashes(get_option($this->prefix.'css_colors_titlefont')),		
				'widgetbgtitle'				=> stripslashes(get_option($this->prefix.'css_colors_widgetbgtitle')),		
				'widgetfont'				=> stripslashes(get_option($this->prefix.'css_colors_widgetfont')),		
				'bgfooter'					=> stripslashes(get_option($this->prefix.'css_colors_bgfooter')),		
				'footerfont'				=> stripslashes(get_option($this->prefix.'css_colors_footerfont')),	
				'footerlinkfont'			=> stripslashes(get_option($this->prefix.'css_colors_footerlinkfont')),	
				'bgfootertop'				=> stripslashes(get_option($this->prefix.'css_colors_bgfootertop')),		
				'bgfooterbottom'			=> stripslashes(get_option($this->prefix.'css_colors_bgfooterbottom')),		
				'footerbottomfont'			=> stripslashes(get_option($this->prefix.'css_colors_footerbottomfont')),				
			),
			'font'		=> array(	
				'fontsize'					=> stripslashes(get_option($this->prefix.'font_fontsize')),
				'fonttype'					=> stripslashes(get_option($this->prefix.'font_fonttype')),	
				'fonttypetitle'				=> stripslashes(get_option($this->prefix.'font_fonttypetitle')),				
			)
		);		
		//echo("generate value : ");print_r($this->value);echo("<br /><br />");
	}
	
	// updateData
	function updateData()
	{
		$array_keys	= array_keys($this->data);
		
		foreach($array_keys as $key) :
			update_option($key,$this->data[$key]);
		endforeach;
		
		$this->status	= "update";
	}
	
	function deleteData()
	{
		$array_keys	= array_keys($this->data);
		
		foreach($array_keys as $key) :
			delete_option($key);
		endforeach;
		
		$this->status	= "delete";
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
		elseif($this->status == 'delete') :
		?><div class="message updated fade"><p>Settings have been reseted to default</p></div><?php
		endif;
	}
	
	// view
	function view()
	{
		$this->notification();
		
		?>
   			 <form name="form1" method="post" action="" id="settingForm">
            <div id="tab-master" class="tabs">
                <ul id="masternav">
                    <li><a href="#ColorSetting">Color  Setting</a></li>
                </ul>
				<?php //=============================================Font Setting=============================================// ?>
                <div id="ColorSetting" class="theContainer">
                    <div class="theContainer-entry">
                        <div class="postboxs">
                            <div class="inside"> 	
							<?php parent::generateBackgroundColor('General Color'					,'colors','generalcolor',$this->value['colors']['generalcolor']); ?>
                            <?php parent::generateBackgroundColor('Link Color'						,'colors','linkcolor',$this->value['colors']['linkcolor']); ?>
                            <?php parent::generateBackgroundColor('Body Background'					,'colors','bgcolor',$this->value['colors']['bgcolor']); ?>
                            <?php parent::generateBackgroundColor('Top Background'					,'colors','bgtop',$this->value['colors']['bgtop']); ?>
                            <?php parent::generateBackgroundColor('Footer Background'				,'colors','bgfooter',$this->value['colors']['bgfooter']); ?>
                            <?php parent::generateBackgroundColor('Footer Font Color '				,'colors','footerfont',$this->value['colors']['footerfont']); ?>
                            </div> <!-- END .inside -->                        
                        </div>  <!-- END .postboxs -->        
                    </div><!-- END .theContainer-entry -->      
                </div><!-- END .theContainer -->
				<?php //=============================================Font Setting=============================================// ?>
                <div id="FontSetting" class="theContainer" style="display:none">
                    <div class="theContainer-entry">
                        <div class="postboxs">
                            <div class="inside"> 	
                            <?php parent::generateInputText("General Font Size eg.12px"						,"font",'fontsize'); ?>
                            <?php parent::generateInputText("General Font Type eg.arial"					,"font",'fonttype'); ?>
                            <?php parent::generateInputText("Title Font Type eg.arial"						,"font",'fonttypetitle'); ?>
                            </div> <!-- END .inside -->                        
                        </div>  <!-- END .postboxs -->        
                    </div><!-- END .theContainer-entry -->      
                </div><!-- END .theContainer -->
                <div class="input-button" style="clear:both;">
                    <?php wp_nonce_field('eureka-update-theme-layout'); ?>
                    <input type="submit" class="button-primary" name="savethis" value="<?php _e('Save Settings', 'eureka') ?>" />
                    <input type="submit" id="restore-button" class="button-primary" name="restore" value="<?php _e('Restore To Default', 'eureka') ?>" />
                </div><!-- END .input-button -->      
            </div><!-- END .tabs -->     
			</form>
            <script type="text/javascript">
				jQuery(document).ready(function() {
					jQuery('.color-picker').jPicker();
					jQuery('#restore-button').click(function(){
						if(confirm('This action will delete all style values, are you sure?')) { return true; }
						else { return false; }
					});
				});
			</script>
        
        <?php
	}
}

$eureka_layout	= new eurekaLayout;
$eureka_layout->init();

function eurekaGetStyle($name,$atribute,$type = 'color',$important = true)
{
	global $th_pre;
	
	$value	= eurekaGetOption($name);
	
	if(!empty($value)) :
		switch($type) :
			case 'color'	: echo $atribute." : #".$value;
							  break;
		endswitch;
		
		if($important) { echo "!important"; }
		echo(';');
	endif;
	
}

?>