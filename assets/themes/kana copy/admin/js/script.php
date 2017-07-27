<?php
	include('../../../../../wp-config.php');
	header("Content-type: text/javascript"); 
?>

jQuery(document).ready(function() {

	jQuery.fn.jPicker.defaults.window.position.y 	= '10px';
	jQuery.fn.jPicker.defaults.images.clientPath	= '<?php bloginfo('template_url'); ?>/admin/images/';
	jQuery('input.colorpicker').jPicker({window:{title:'Choose Color'}});

	<?php
	$upload	= $_REQUEST['upload'];
	
	for($i = 1;$i <= $upload;$i++) :
	?>
	jQuery('#upload_image_button_<?php echo $i; ?>').click(function(){
 		formfield = jQuery('#upload_image_<?php echo $i; ?>').attr('name');
 		tb_show('', 'media-upload.php?type=image&amp;TB_iframe=1');
 
		window.send_to_editor = function(html) {
 			imgurl = jQuery('img',html).attr('src');
 			jQuery('#upload_image_<?php echo $i; ?>').val(imgurl);
            jQuery('#preview-<?php echo $i; ?>').html('<img />');
            jQuery('#preview-<?php echo $i; ?> img').attr('src',imgurl);
 			tb_remove();
		}
 
	 	return false;
	});
    <?php
	endfor;
	?>
});