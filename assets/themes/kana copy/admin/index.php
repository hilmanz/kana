<?php

global $eureka_app,$id_tinymce,$image_upload;
$image_upload	= 0;

$id_tinymce	= array();

class eurekaApp 
{
	var $table;
	var $structure;
	var $setting;

	/* initialization */
	function init()
	{
		//initalization variable
		//calling any functions for the first time
		add_action('admin_menu',array(&$this,"createMenu"));
		add_action('admin_head',array(&$this,"adminCSSJS"));
		add_action('admin_print_scripts', array(&$this,'adminScripts'));
		add_action('admin_print_styles', array(&$this,'adminStyles'));
		
	}

	// create menu
	function createMenu()
	{
		$icon	= THEMELINK.'/admin/images/icon.png';
		//add_submenu_page( 'eureka', 'eureka &bull; Setting', 'Setting', 'manage_options', 'admin.php?page=eureka-setting', array("eurekaSetting","view"));		
		add_menu_page( "eureka", "Theme Option", "manage_options", "eureka", array("eurekaSetting","view"), $icon);
	}
	
	function beforeInput($label)
	{
		?>
		<div class="input-row">
			<label><?php echo $label; ?></label>
			<div class="input-field">
        <?php
	}
	
	function afterInput()
	{
		?>
			</div>                
			<div class="wrapper"></div>
		</div>
        <?php
	}

	//generateCatOptions
	function generateCategoryOptions($label,$part,$section)
	{
		global $th_pre;
		$opt_name	= $th_pre.$part."_".$section;
		$id			= str_replace("_","-",$opt_name);
		$value		= stripslashes(get_option($opt_name));
		$name		= "data[".$opt_name."]";
		
		$cat_id		= $value;
		
		$this->beforeInput($label);
	
		?><select name="<?php echo $name; ?>" id="<?php echo $id; ?>"><?php
	
		$args	= array(
			'hide_empty'	=> 0,
		);
	
  		$cats = get_categories($args);
  	
		foreach ($cats as $cat) :
  			$option = '<option value="'.$cat->term_id.'" ';
			
			if(is_array($cat_id) && in_array($cat->term_id,$cat_id)) { $option .= "selected='selected'"; }
			elseif($cat_id == $cat->term_id) { $option .= "selected='selected'"; }
		
			$option .= ">&nbsp;&nbsp;";
		
			$option .= $cat->name;
			$option .= '</option>';
			echo $option;
		endforeach;
		
		?></select><?php
		
		$this->afterInput();
	}
	
	//generatePageOptions
	function generatePageOptions($label,$part,$section,$multiple = false)
	{
		global $th_pre;
		$this->beforeInput($label);
		
		$name		= $th_pre.$part."_".$section;
		$value		= stripslashes(get_option($name));
		$opt_name	= "data[".$name."]";
		
		if($multiple) :
			$opt_name .= "[]";
			$value		= explode(',',$value);
			
		endif;
	
		$args	= array(
			'post_type' => 'page',
			'selected'	=> $value, 
			'name' 		=> $opt_name,
			'id'		=> str_replace("]","",str_replace("[","_",$name)),
			'sort_column'	=> 'menu_order, post_title',
			'echo'		=> 0,
		);
		
		
		$dropdown	= wp_dropdown_pages($args);
		
		if($multiple) :
			$dropdown	= str_replace("<select","<select multiple='multiple' style='height:300px;width:100%;' ",$dropdown);
		endif;
		
		echo $dropdown;
		
		$this->afterInput();
	}
	
	// generateCustomPostOptions
	function generateCustomPostOptions($metakey)
	{
		global $wpdb;
		
		$query	= "SELECT distinct(meta_value) AS meta_value ".
				  "FROM ".$wpdb->prefix."postmeta ".
				  "WHERE meta_key = '".$metakey."' ";
				  
		$results	= $wpdb->get_results($query, ARRAY_A);
		
		foreach($results as $result) :
			?><option value="<?php echo $result['meta_value']; ?>"><?php echo $result['meta_value']; ?></option><?php
		endforeach;
		
	}

	// generatePostOptions	
	function generatePostOptions($category_id,$column = "post_title")
	{
		$args	= array(
			'category'	=> $category_id
		);
	
  		$pages = get_posts($args);
  	
		foreach ($pages as $pagg) :
  			$option = '<option value="'.$pagg->$column.'">';
			$option .= $pagg->$column;
			$option .= '</option>';
			echo $option;
		endforeach;
	}
	
	// generateSubCategoryOptions
	function generateSubCategoryOptions($category_id)
	{
		$args	= array(
			'hide_empty'	=> 0,
			'child_of'		=> $category_id
		);
	
  		$cats = get_categories($args);
	
		foreach ($cats as $cat) :
  			$option = '<option value="'.$cat->term_id.'">';
			$option .= $cat->name;
			$option .= '</option>';
			echo $option;
		endforeach;
	}
	
	// generateOptions
	function generateOptions($label,$part,$section,$options)
	{
		global $th_pre;
		$opt_name	= $th_pre.$part."_".$section;
		$id			= str_replace("_","-",$opt_name);
		$value		= stripslashes(get_option($opt_name));
		$name		= "data[".$opt_name."]";
	
		$this->beforeInput($label);
		
		?>
		<select name="<?php echo $name; ?>" id="<?php echo $id; ?>">
		<?php
		
		foreach($options as $key => $label) :
			$selected	= "";
			if($label == $value) { $selected = "selected='selected'"; }
			
			?><option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $label; ?></option><?php
		
		endforeach;
		
		?></select><?php
		
		$this->afterInput();
	}
	
	// generateInputText
	function generateInputText($label,$part,$section)
	{
		global $th_pre;
		$opt_name	= $th_pre.$part."_".$section;
		$id			= str_replace("_","-",$opt_name);
		$value		= stripslashes(get_option($opt_name));
		$name		= "data[".$opt_name."]";
	
		$this->beforeInput($label);
		
		?>
        <input type="text" name="<?php echo $name; ?>" id="<?php echo $id; ?>" value="<?php echo $value; ?>" />
		<?php
		
		$this->afterInput();
	}
	function generateInputTextColor($label,$part,$section)
	{
		global $th_pre;
		$opt_name	= $th_pre.$part."_".$section;
		$id			= str_replace("_","-",$opt_name);
		$value		= stripslashes(get_option($opt_name));
		$name		= "data[".$opt_name."]";
	
		$this->beforeInput($label);
		
		?>
        <input type="text" name="<?php echo $name; ?>" id="<?php echo $id; ?>" value="<?php echo $value; ?>" class="colorspicker" style="border:1px solid #<?php echo $value; ?>; border-right:20px solid #<?php echo $value; ?>;" />
		<?php
		
		$this->afterInput();
	}
	function generateInputTextVid($label,$part,$section)
	{
		global $th_pre;
		$opt_name	= $th_pre.$part."_".$section;
		$id			= str_replace("_","-",$opt_name);
		$value		= stripslashes(get_option($opt_name));
		$name		= "data[".$opt_name."]";
	
		$this->beforeInput($label);
		
		?>
        <input type="text" name="<?php echo $name; ?>" id="<?php echo $id; ?>" value="<?php echo $value; ?>" />
        <span class="smallinfo">Upload & Copy Path of video here</span> 
		<?php
		
		$this->afterInput();
	}  
	
	// generate background color input
	function generateBackgroundColors($label,$part,$section,$value)
	{
		$name	= "data[".$this->prefix."css_".$part."_".$section."]";
		
		$this->beforeInput($label);
		?>
		<input type="text" name="<?php echo $name; ?>" value="<?php echo $value; ?>" class="colorpicker" />
        <?php
		$this->afterInput();
	}
	
	// generateInputTextarea
	function generateInputTextarea($label,$part,$section,$use_editor = false)
	{
		global $th_pre,$id_tinymce;
		$opt_name	= $th_pre.$part."_".$section;
		$id			= str_replace("_","-",$opt_name);
		$value		= stripslashes(get_option($opt_name));
		$name		= "data[".$opt_name."]";
	
		$this->beforeInput($label);
		
		?>
        <textarea name="<?php echo $name; ?>" id="<?php echo $id; ?>"><?php echo $value; ?></textarea>
		<?php
		
		$this->afterInput();
		
		if($use_editor) :
			array_push($id_tinymce,$id);
		endif;
	}
	
	// generateImageUpload
	function generateImageUpload($label,$part,$section,$preview = false)
	{
		global $th_pre,$image_upload;
		$image_upload	= $image_upload + 1;
		$opt_name		= $th_pre.$part."_".$section;
		$id				= str_replace("_","-",$opt_name);
		$value			= stripslashes(get_option($opt_name));
		$name			= "data[".$opt_name."]";
	
		$this->beforeInput($label);
		
		?>
        <input id="upload_image_<?php echo $image_upload; ?>" id="<?php echo $id; ?>"  type="text" name="<?php echo $name; ?>"
        	   value="<?php echo $value; ?>" size="70" />
		<input id="upload_image_button_<?php echo $image_upload; ?>" type="button" value="Upload Image" />
		<?php
		
		if($preview) :
		?><div id="preview-<?php echo $image_upload; ?>" class="preview-image"><img width="30%" src="<?php echo $value; ?>" /></div><?php
		endif;
		
		$this->afterInput();
		
	}
	
	
	// generateTinyMCE
	function generateTinyMCE()
	{
		global $id_tinymce;
		
		?>
        
		<script type="text/javascript" src="<?php echo THEMELINK; ?>/admin/js/tiny_mce/tiny_mce.js"></script>
        <script type="text/javascript">
		tinyMCE.init({
        // General options
        mode : "exact",
        theme : "advanced",
			elements: "<?php echo implode(",",$id_tinymce); ?>",
        skin : "bootstrap",
        plugins : "table,inlinepopups,advimage",

        // Theme options
		theme_advanced_buttons1 : "bold,italic,underline,strikethrough" + ",|,justifyleft,justifycenter,justifyright,justifyfull" + ",|,styleselect,formatselect,fontselect,fontsizeselect",
	        relative_urls : false,
    	    remove_script_host : false,
        theme_advanced_toolbar_location : "top",
        theme_advanced_toolbar_align : "left",
        theme_advanced_statusbar_location : "bottom",
        theme_advanced_resizing : true,
});

		</script>
        <?php
	}
	
	// set variable
	function set($name,$value)
	{
		$this->$name	= $value;
	}
	
	// add CSS and JS if necessary
	function adminCSSJS() 
	{
		?>
        
		<?php
	}
	
	function adminScripts()
	{

	}
	
	function adminStyles()
	{
		
	}
}

$eureka_app	= new eurekaApp;
$eureka_app->init();

?>