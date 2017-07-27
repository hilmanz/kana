<?php

class EurekaCustomCss extends eurekaApp
{	
	var $data;
	var $value;
	var $status;
	var $prefix	= "eureka_";
	var $eu_active	= array(
						"Yes"		=> "Yes",
						"No"		=> "No",
					  );
	
	// init
	function init()
	{
		add_action("admin_menu",array(&$this,"createMenu"));
	}
	
	// create menu
	function createMenu()
	{
		add_submenu_page( 'eureka', 'CSS Custom', 'CSS Custom', 'manage_categories', 'eureka-css', array(&$this,"view"));
	}
	
	/*==================================================================================*/
	/*=========================			  CONTROLLER		   =========================*/
	/*==================================================================================*/
	
	// processing Input
	function processingInput()
	{
		if(isset($_POST['data']) && isset($_POST['_wpnonce'])) :
			check_admin_referer('eureka-update-css-setting');
			$this->data	= $_POST['data'];
			
			$this->updateData();
		endif;
	}
	
	// generate value from custom options
	function generateValue()
	{
		
		$this->value	= array(
			'cssStyle'		=> array(
				'customStyle'				=> stripslashes(get_option($this->prefix.'cssStyle_customStyle')),
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
        <ul id="masternav">
        <li><a href="#GeneralSetting">Add Custom Style</a></li>
        </ul>
        <?php //=============================================General Setting=============================================// ?>
        <div id="GeneralSetting" class="theContainer">
            <div class="theContainer-entry">
                <div class="postboxs">
                    <div class="inside" id="customCSS"> 	
                        <?php parent::generateInputTextarea("Custom Style"					,"cssStyle",'customStyle'); ?>  
                    </div> <!-- END .inside -->                        
                </div>  <!-- END .postboxs -->        
            </div><!-- END .theContainer-entry -->      
        </div><!-- END .theContainer -->      
        <div class="input-button" style="clear:both;">
			<?php parent::generateTinyMCE(); ?>
            <?php wp_nonce_field('eureka-update-css-setting'); ?>
            <input type="submit" class="button-primary" name="savethis" value="<?php _e('Save Settings', 'eureka') ?>" />
        </div><!-- END .input-button -->      
    </div><!-- END .tabs -->      
	</form>
        
        <?php
	}
}

$eureka_setting	= new EurekaCustomCss;
$eureka_setting->init();

?>