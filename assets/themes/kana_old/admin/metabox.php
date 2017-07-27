<?php

class eurekaMetaBox extends eurekaApp
{
	
	function isAllowedExtension($fileName)
	{
		$allowedExtensions = array("png", "gif", "jpg", 'jpeg');
		return in_array(end(explode(".", $fileName)), $allowedExtensions);
	}
	
	function metaBoxScripts()
	{
		wp_enqueue_script('media-upload');
		wp_enqueue_script('thickbox');
		wp_register_script('my-upload', get_bloginfo('template_url').'/admin/js/script.js', array('jquery','media-upload','thickbox'));
		wp_enqueue_script('my-upload');
	}
	
	function metaBoxStyles()
	{
		wp_enqueue_style('thickbox');
	}
	
}
/* Use the admin_menu action to define the custom boxes */

$className	= "eurekaMetaBox";
add_action('admin_print_scripts', array($className,'metaBoxScripts'));
add_action('admin_print_styles'	, array($className,'metaBoxStyles'));



?>