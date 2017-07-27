<?php
/*
Plugin Name: Google Map
Description: Adds a sidebar widget to display Google Maps
Author: Acit Jazz
Version: 1.0
Author URI: http://www.eurekathemes.com
*/

function widget_eumaps_init() {
	
	if ( !function_exists('register_sidebar_widget') || !function_exists('register_widget_control') )
		return;

	function widget_eumaps_control() {
		$options = $newoptions = get_option('widget_eumaps');
		if ( $_POST['eumaps-submit'] ) {
			$newoptions['title'] = strip_tags(stripslashes($_POST['eumaps-title']));
			$newoptions['url'] = $_POST['eumaps-url'];
			$newoptions['width'] = (int) $_POST['eumaps-width'];
			$newoptions['height'] = (int) $_POST['eumaps-height'];
		}
		if ( $options != $newoptions ) {
			$options = $newoptions;
			update_option('widget_eumaps', $options);
		}
	?>
				<div style="text-align:right; position:relative;">
				<label for="eumaps-title" style="line-height:35px;display:block;">
					<?php _e('Map title:', 'widgets'); ?> 
                    <input type="text" id="eumaps-title" name="eumaps-title" value="<?php echo wp_specialchars($options['title'], true); ?>"  style="width:300px"/>
                </label>
				<label for="eumaps-url" style="line-height:35px;display:block;">
					<?php _e('Url Google Map:', 'widgets'); ?> 
                    <input type="text" id="eumaps-url" name="eumaps-url" value="<?php echo $options['url']; ?>"   style="width:300px"/>
                </label>
				<label for="eumaps-width" style="line-height:35px;display:block;">
					<?php _e('Width:', 'widgets'); ?> 
                   	<input type="text" id="eumaps-width" name="eumaps-width" value="<?php echo $options['width']; ?>"   style="width:300px"/>
                </label>
				<label for="eumaps-height" style="line-height:35px;display:block;">
					<?php _e('Height:', 'widgets'); ?> 
                	<input type="text" id="eumaps-height" name="eumaps-height" value="<?php echo $options['height']; ?>"   style="width:300px"/>
                </label>
				<input type="hidden" name="eumaps-submit" id="eumaps-submit" value="1" />
				</div>
	<?php
	}

	function widget_eumaps($args) {
		extract($args);
		$defaults = array('url' => 'https://maps.google.co.id/?ll=-6.233395,106.836548&spn=2.659133,4.872437&t=m&z=8', 'title' => 'Jakarta','width' => 400, 'height' => 400);
		$options = (array) get_option('widget_eumaps');

		foreach ( $defaults as $url => $value )
			if ( !isset($options[$url]) )
				$options[$url] = $defaults[$url];
		?>
		<?php echo $before_widget; ?>
			<?php echo $before_title . "{$options['title']}" . $after_title; ?>
            <div style="width:<?php echo $options['width'] ?>px; height:<?php echo $options['height'] ?>px; margin:10px auto; position:relative; border:solid 2px #ccc; overflow:hidden;" class="mapWidget">
            <iframe width="<?php echo $options['width'] ?>" height="<?php echo $options['height'] ?>" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="<?php echo $options['url'] ?>&amp;output=embed"></iframe>
            </div>
		<?php echo $after_widget; ?>
<?php
	}

	register_sidebar_widget(array('Google Maps', 'widgets'), 'widget_eumaps');
	register_widget_control(array('Google Maps', 'widgets'), 'widget_eumaps_control',400,300);
	
}

add_action('widgets_init', 'widget_eumaps_init');

?>
