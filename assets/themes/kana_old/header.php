<!DOCTYPE html>
<!--[if lt IE 7]> <html dir="ltr" lang="en-US" class="ie6"> <![endif]-->
<!--[if IE 7]>    <html dir="ltr" lang="en-US" class="ie7"> <![endif]-->
<!--[if IE 8]>    <html dir="ltr" lang="en-US" class="ie8"> <![endif]-->
<!--[if gt IE 8]><!--> <html dir="ltr" lang="en-US"> <!--<![endif]-->
<!-- BEGIN head --><head>
	<!--Meta Tags-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<!--Title-->
	<title>
		<?php
        global $page, $paged;
        wp_title( '|', true, 'right' );
        // Add the blog name.
        bloginfo( 'name' );
        // Add the blog description for the home/front page.
        $site_description = get_bloginfo( 'description', 'display' );
        if ( $site_description && ( is_home() || is_front_page() ) )
            echo " | $site_description";
        // Add a page number if necessary:
        if ( $paged >= 2 || $page >= 2 )
            echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );?>
	</title>
	<!--Stylesheets-->
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/fonts/icon.css" type="text/css"  media="all" />
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/overlay.css" type="text/css"  media="all" />
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/animate.css" type="text/css"  media="all" />
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/hover.css" type="text/css"  media="all" />
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style.css" type="text/css"  media="all" />
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/responsive.css" type="text/css"  media="all" />
	<link rel="profile" href="http://kana.co.id" />
    <!--Favicon-->
	<?php  $favicon	= eurekaGetOption('general_favicon');
		if(empty($favicon)) : else : ?>
		<link href="<?php echo $favicon; ?>" rel="shortcut icon" type="image/x-icon" />
		<link rel="icon" href="<?php echo $favicon; ?>" sizes="32x32"> 
	<?php  endif; ?> 
	<!--JavaScript-->
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery-1.11.0.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/modernizr.custom.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.slimscroll.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/kana.js"></script>
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <?php
        wp_head();
    ?>
</head>     

<body <?php body_class(); ?>>
        