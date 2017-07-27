<?php
	add_action('admin_head', 'my_custom_logo');
	function my_custom_logo() {
	   echo '<style type="text/css"> #header-logo { background-image: url('.get_bloginfo('template_directory').'/images/dashboard-logo.png) !important; }</style>';
	}
	function my_custom_login_logo() {
    echo '<style type="text/css"> h1 a { background-image:url('.get_bloginfo('template_directory').'/images/login-logo.png) !important; }</style>';
	}
	add_action('login_head', 'my_custom_login_logo');

?>
