<?php

class eurekaLayoutApp
{
	var $prefix	= "eureka_";
	
	// initialization
	function init()
	{
	
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
	
	// generate background color input
	function generateBackgroundColor($label,$part,$section,$value)
	{
		$name	= "data[".$this->prefix."css_".$part."_".$section."]";
		
		$this->beforeInput($label);
		?>
		<input type="text" name="<?php echo $name; ?>" value="<?php echo $value; ?>" class="colorpicker" />
        <?php
		$this->afterInput();
	}
	
	// generate background repeat
	function generateSelectOptions($label,$part,$section,$value,$options)
	{
		$name	= "data[".$this->prefix."css_".$part."_".$section."]";
		
		$this->beforeInput($label);
		?>
        <select name="<?php echo $name; ?>">
        	<?php 
			foreach($options as $key => $label) :
			$selected = '';
            if($key == $value) { $selected = "selected='selected'"; }
			?><option value="<?php echo $label; ?>" <?php echo $selected; ?>><?php echo $key; ?></option><?php
            endforeach;
			?>
        </select>
        <?php
		$this->afterInput();
	}
	
	// generate upload image
	function generateUploadImage($label,$part,$section,$value,$i)
	{
		$name	= "data[".$this->prefix."css_".$part."_".$section."]";
		
		$this->beforeInput($label);
		?>
       	<input type="text" name="<?php echo $name; ?>" id="upload_image_<?php echo $i; ?>" 
           	   value="<?php echo $value; ?>" />
        <input id="upload_image_button_<?php echo $i; ?>" type="button" value="Upload Image" style="width:100px;" />
        <?php
		$this->afterInput();
	}
	
	// generate text input
	function generateTextInput($label,$part,$section,$value)
	{
		$name	= "data[".$this->prefix."css_".$part."_".$section."]";
		
		$this->beforeInput($label);
		?>
        <input type="text" name="<?php echo $name; ?>" value="<?php echo $value; ?>" />
        <?php
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
}

$eureka_layoutapp	= new eurekaLayoutApp;
$eureka_layoutapp->init();

function eurekaGetCSSValue($part,$section,$class,$type = "text")
{
	global $th_pre;
	$name	= $th_pre."css_".$part."_".$section;
	$option	= stripslashes(get_option($name));
	
	if(!empty($option)) :
	
		$echo	= $class." : ";
		
		switch($type) :
			case "color"				: $echo = $echo."#".$option.";"; 
							  	  		  break;
			case "image"				:
			case "image-clear"			:
			case "image-absolute"		:			
			case "image-padding-left"	: $echo = $echo."url('".$option."');"; 
										  list($width, $height, $apalah, $attr) = getimagesize($option);
							  	   		  break;
			case "text"					: $echo = $echo.$option.";"; 
							      		  break;
		endswitch;
		
		switch($type) :
			case "image-absolute"		: $echo .= "width : ".$width."px;";
										  $echo .= "height : ".$height."px;";
										  break;
			case "image-padding-left"	: $padding_left	= $width + 10;
										  $echo .= "padding-left : ".$padding_left."px;";
										  break;
			
		endswitch;
		
		return $echo;
		
	else :
		
		if($type == 'image-clear') :
			return "background-image:none!important;";
		endif;
	
	endif;
	
	return '';
	
}

?>