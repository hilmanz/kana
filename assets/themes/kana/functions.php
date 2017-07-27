<?php

global $th_pre; // theme prefix for get option
global $th_messages;	// for handling messages

$th_pre	= "eureka_";

// defining file folder

	define(ADMINFUNC		,STYLESHEETPATH.'/admin/');
	define(THEMEFUNC		,STYLESHEETPATH.'/functions/');
	define(THEMEFUNCTWITTER	,STYLESHEETPATH.'/functions/twitter/');
	define(THEMEFUNCPRICETABLE	,STYLESHEETPATH.'/functions/pricetable/');
	
// defining link
	define(THEMELINK	,get_bloginfo("stylesheet_directory"));
	
//	odd even list post on category
	$odd_or_even = 'odd';

// including file system
	//include(ADMINFUNC.'index.php');
	//include(ADMINFUNC.'setting.php');
	//include(ADMINFUNC.'customcss.php');
	//include(ADMINFUNC.'slider.php');
	//include(ADMINFUNC.'layout-app.php');
	//include(ADMINFUNC.'layout.php');
	//include(ADMINFUNC.'metabox.php');
	
// including built-in function file
	include(THEMEFUNC.'menu.php');
	include(THEMEFUNC.'paging.php');
	include(THEMEFUNC.'pos-on.php');
	//include(THEMEFUNC.'breadcrumbs.php');
	include(THEMEFUNC.'eu-functions.php');
	//include(THEMEFUNC.'googlemap_widget.php');
	//include(THEMEFUNC.'aboutus_widget.php');
	//include(THEMEFUNC.'contactinfo_widget.php');
	//include(THEMEFUNC.'postlabel.php');
	//include(THEMEFUNC.'slider.php');
	//include(THEMEFUNC.'tabpost.php');
	//include(THEMEFUNC.'featured.php');
	//include(THEMEFUNC.'testimonial.php');
	include(THEMEFUNC.'clients.php');
	include(THEMEFUNC.'clientslogo.php');
	include(THEMEFUNC.'career.php');
	include(THEMEFUNC.'game.php');
	include(THEMEFUNC.'team.php');
	//include(THEMEFUNC.'contact.php');
	//include(THEMEFUNC.'video.php');
	//include(THEMEFUNCPRICETABLE.'pricetable.php');
	//include(THEMEFUNC.'tab-widget.php');
	//include(THEMEFUNCTWITTER.'twitter.php');
	//layout


// embedding with external scripts

	function jpeg_quality_callback($arg)
	{ return (int)100; }
	add_filter('jpeg_quality', 'jpeg_quality_callback');
	
	
// theme support
	@ini_set( 'upload_max_size' , '64M' );
	@ini_set( 'post_max_size', '64M');
	@ini_set( 'max_execution_time', '300' );
	add_theme_support('post-thumbnails');
	set_post_thumbnail_size(600,400);
	add_image_size( 'bigthumb'			, 220, 220,true );
	add_image_size( 'fixbanner'			, 1600, 400,true );
	add_image_size( 'banner-thumb'		, 1100, 310,true );

// calling any action
	add_action('init'				,'eurekaThemeInit');
	add_action('admin_head'			,'eurekaAdminHead');
	add_action('admin_footer'		,'eurekaAdminFooter');
	add_action('wp_footer'			,'eurekaFooter');
	add_action('wp_print_scripts'	,'eurekaRegisterScript');
	add_action('wp_print_styles'	,'eurekaRegisterCSS');
	add_action("admin_print_scripts","eurekaAdminRegisterScript");
	add_action("admin_print_styles"	,"eurekaAdminRegisterCSS");
	add_action('after_setup_theme'	,'eurekaRegisterMenu');
	add_action ('comment_post'		,'eurekaCommentPost');
	
	function eurekaCommentPost($comment_id) {
		add_comment_meta($comment_id, 'commentrating', $_POST['commentrating'], true);
	}
	

// Filter MENU
// calling any filter
	add_filter('body_class'		,'eurekaBodyClass');
// calling init theme
	function eurekaThemeInit()
	{
		// for registering sidebar
		$args = array(
			'name'          => "Sidebar",
			'id'            => 'sidebar',
			'description'   => '',
			'before_widget' => '<div class="widget"><div class="widget-content">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<div class="widget-title clearfix"><h4>',
			'after_title'   => '</h4></div>',
		);
		register_sidebar($args);

	}
	
// built-in functions

	// for registering menu
	function eurekaRegisterMenu()
	{
		register_nav_menu("main-menu","Main Menu"); 
		register_nav_menu("footer-menu","Footer Menu"); 
	}
	
	// register javascript link
	function eurekaRegisterScript()
	{		
	}
	
	// register css link
	function eurekaRegisterCSS()
	{
	}
	
	// register admin javascript link
	function eurekaAdminRegisterScript()
	{
	}
	
	// calling action for admin_head hook
	function eurekaAdminHead()
	{
	}
	
	// calling action for admin_footer hook
	function eurekaAdminFooter()
	{

	}
	
	// register admin css link
	function eurekaAdminRegisterCSS()
	{
	}
	
	// calling any function on footer
	function eurekaFooter()
	{

	}
		
	/* body_class filtering */
	function eurekaBodyClass($classes,$class = null)
	{
		global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;
	
		if(is_search() || is_single()  || is_category() || is_tag()) :
			$classes[]	= "not-front";
		endif;
		
		if($is_lynx) 		$classes[] = 'lynx';
		elseif($is_gecko) 	$classes[] = 'gecko';
		elseif($is_opera) 	$classes[] = 'opera';
		elseif($is_NS4) 	$classes[] = 'ns4';
		elseif($is_safari) 	$classes[] = 'safari';
		elseif($is_chrome) 	$classes[] = 'chrome';
		elseif($is_IE) 		$classes[] = 'ie';
		else $classes[] = 'unknown';

		if($is_iphone) $classes[] = 'iphone';

		
		return $classes;
	}
	
	function eurekaGetOption($name,$type = 'text',$caption = null)
	{
		global $th_pre;
		
		$value	= stripslashes(get_option($th_pre.$name));
		
		if(!empty($value)) :
			switch($type) :
			
				case "image"	: return "<img src='".$value."' title='".$caption."' />"; 
								  break;
				
				case "page"		: $page	= get_page($value);
								  return $page;
								  break;
								  
				case "text"		: return $value; 
								  break;
				
			endswitch;
		endif;
		
		return '';
	}
	
	function eurekaCustomPost($name,$postID)
	{
		$value	= get_post_custom_values($name,$postID);
		return (sizeof($value) > 0) ? end($value) : NULL;
	}
	
	function eurekaComment( $comment, $args, $depth ) 
	{
		$GLOBALS['comment'] = $comment;
		switch ( $comment->comment_type ) :
			case '' :
		?>
        
        <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
            <div class="comment-wrapper" id="comment-<?php comment_ID(); ?>">
                <div class="author-image">
					<?php echo get_avatar( $comment, 40 ); ?>
                    <?php // printf( __( '%s', 'twentyten' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
                </div>
				<?php if ( $comment->comment_approved == '0' ) : ?>
                <p><em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'twentyten' ); ?></em></p>
                <?php endif; ?>
                
                <p class="comment-author"><a href="#">Admin</a>
                <span>
                    <a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
                    <?php
                        /* translators: 1: date, 2: time */
                        printf( __( '%1$s at %2$s', 'twentyten' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)', 'twentyten' ), ' ' );
                    ?>
                </span>
                </p>
                <div class="comment-body"><?php comment_text(); ?></div>
           		<?php  $rating	= get_comment_meta(get_comment_ID(),"commentrating");
				
				if(sizeof($rating) > 0) :
				$rating	= end($rating);
				?>
        	    <div class="comment-rating">
				<?php
					for($i = 1;$i <= $rating;$i++) :
					?><img src="<?php bloginfo('template_url'); ?>/images/icon-star-mini.png" alt="" /><?php
					endfor;
				?>
	            </div>
    	        <?php  endif;  ?>
                <p><span class="reply"><span class="icon-undo">&nbsp;</span> <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?></span></p>
            </div>
		<?php
				break;
			case 'pingback'  :
			case 'trackback' :
		?>
		<li class="post pingback">
			<p><?php _e( 'Pingback:', 'twentyten' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'twentyten' ), ' ' ); ?></p>
		<?php
				break;
		endswitch;
	}
?>