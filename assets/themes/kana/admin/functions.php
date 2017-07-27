<?php

global $th_pre; // theme prefix for get option
global $th_messages;	// for handling messages

$th_pre	= "eureka_";

// defining file folder

	define(ADMINFUNC	,STYLESHEETPATH.'/admin/');
	define(THEMEFUNC	,STYLESHEETPATH.'/functions/');
	
// defining link

	define(THEMELINK	,get_bloginfo("stylesheet_directory"));
	
// including file system
	include(ADMINFUNC.'index.php');
	include(ADMINFUNC.'setting.php');
	include(ADMINFUNC.'slider.php');
	include(ADMINFUNC.'metabox.php');
	include(ADMINFUNC.'layout-app.php');
	include(ADMINFUNC.'layout.php');
	
// including built-in function file
	include(THEMEFUNC.'menu.php');


// embedding with external scripts
	
// theme support
	add_theme_support('post-thumbnails');
	set_post_thumbnail_size(700,310);
	add_image_size( 'single-post-thumbnail'		, 217, 207,true );
	add_image_size( 'sidebar-post-thumbnail'	, 125, 105,true );

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
	
// acit paging 

function acit_pagination($pages = '', $range = 2)
{  
     $showitems = ($range * 2)+1;  

     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   

     if(1 != $pages)
     {
         echo "<div class='pagination'>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo;</a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a>";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
             }
         }

         if ($paged < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a>";  
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>&raquo;</a>";
         echo "</div>\n";
		
     }
}

// post on meta

if ( ! function_exists( 'acit_posted_on' ) ) :
function acit_posted_on() {
	printf( __( '<span class="%1$s">Posted on</span> %2$s <span class="meta-sep">by</span> %3$s', 'twentyten' ),
		'meta-prep meta-prep-author',
		sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
			get_permalink(),
			esc_attr( get_the_time() ),
			get_the_date()
		),
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
			get_author_posts_url( get_the_author_meta( 'ID' ) ),
			sprintf( esc_attr__( 'View all posts by %s', 'twentyten' ), get_the_author() ),
			get_the_author()
		)
	);
}
endif;

//acit_breadcrumbs
function acit_breadcrumbs() {
 
  $delimiter = '&nbsp;&raquo;&nbsp;';
  $home = 'Home'; // text for the 'Home' link
  $before = '<span class="current">'; // tag before the current crumb
  $after = '</span>'; // tag after the current crumb
 
  if ( !is_home() && !is_front_page() || is_paged() ) {
 
    echo '<div id="crumbs">';
 
    global $post;
    $homeLink = get_bloginfo('url');
    echo '<a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';
 
    if ( is_category() ) {
      global $wp_query;
      $cat_obj = $wp_query->get_queried_object();
      $thisCat = $cat_obj->term_id;
      $thisCat = get_category($thisCat);
      $parentCat = get_category($thisCat->parent);
      if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
      echo $before  . single_cat_title('', false)  . $after;
 
    } elseif ( is_day() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
      echo $before . get_the_time('d') . $after;
 
    } elseif ( is_month() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo $before . get_the_time('F') . $after;
 
    } elseif ( is_year() ) {
      echo $before . get_the_time('Y') . $after;
 
    } elseif ( is_single() && !is_attachment() ) {
      if ( get_post_type() != 'post' ) {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a> ' . $delimiter . ' ';
        echo $before . get_the_title() . $after;
      } else {
        $cat = get_the_category(); $cat = $cat[0];
        echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
        echo $before . get_the_title() . $after;
      }
 
    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
      $post_type = get_post_type_object(get_post_type());
      echo $before . $post_type->labels->singular_name . $after;
 
    } elseif ( is_attachment() ) {
      $parent = get_post($post->post_parent);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
      echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a> ' . $delimiter . ' ';
      echo $before . get_the_title() . $after;
 
    } elseif ( is_page() && !$post->post_parent ) {
      echo $before . get_the_title() . $after;
 
    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
      echo $before . get_the_title() . $after;
 
    } elseif ( is_search() ) {
      echo $before . 'Search results for "' . get_search_query() . '"' . $after;
 
    } elseif ( is_tag() ) {
      echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;
 
    } elseif ( is_author() ) {
       global $author;
      $userdata = get_userdata($author);
      echo $before . 'Articles posted by ' . $userdata->display_name . $after;
 
    } elseif ( is_404() ) {
      echo $before . 'Error 404' . $after;
    }
 
    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
      echo __('Page') . ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }
 
    echo '</div>';
 
  }
} // end acit_breadcrumbs()
	
// calling any filter
	add_filter('body_class'		,'eurekaBodyClass');
	
// calling init theme
	function eurekaThemeInit()
	{
		// for registering sidebar
		$args = array(
			'name'          => "Sidebar",
			'id'            => 'sidebar-home',
			'description'   => '',
			'before_widget' => '<div class="widget">',
			'before_title'  => 		'<h1 class="widget-title">',
			'after_title'   => 		'</h1>'.
									'<div class="widget-content">',
			'after_widget'  => 		'</div>'.
							   '</div>',
		);
		$footer1 = array(
			'name'          => "Widget Footer 1",
			'id'            => 'footer1',
			'description'   => '',
			'before_widget' => '<div class="widget">',
			'before_title'  => 		'<h1 class="widget-title">',
			'after_title'   => 		'</h1>'.
									'<div class="widget-content">',
			'after_widget'  => 		'</div>'.
							   '</div>',
		);
		$footer2 = array(
			'name'          => "Widget Footer 2",
			'id'            => 'footer2',
			'description'   => '',
			'before_widget' => '<div class="widget">',
			'before_title'  => 		'<h1 class="widget-title">',
			'after_title'   => 		'</h1>'.
									'<div class="widget-content">',
			'after_widget'  => 		'</div>'.
							   '</div>',
		);
		$footer3 = array(
			'name'          => "Widget Footer 3",
			'id'            => 'footer3',
			'description'   => '',
			'before_widget' => '<div class="widget">',
			'before_title'  => 		'<h1 class="widget-title">',
			'after_title'   => 		'</h1>'.
									'<div class="widget-content">',
			'after_widget'  => 		'</div>'.
							   '</div>',
		);
		
		register_sidebar($args);
		register_sidebar($footer1);
		register_sidebar($footer2);
		register_sidebar($footer3);

	}
	
// built-in functions

	// for registering menu
	function eurekaRegisterMenu()
	{
		register_nav_menu("top-menu","Top Menu"); 
		register_nav_menu("footer-menu","Footer Menu"); 
	}
	
	// register javascript link
	function eurekaRegisterScript()
	{
		wp_register_script('superfish',				get_bloginfo('template_url').'/js/superfish.js',array('jquery'));
		wp_register_script('jquery.pikachoose',		get_bloginfo('template_url').'/js/jquery.pikachoose.js',array('jquery'));
		wp_register_script('jquery.jcarousel',		get_bloginfo('template_url').'/js/jquery.jcarousel.js',array('jquery'));
		wp_register_script('jquery.curvycorner',	get_bloginfo('template_url').'/js/jquery.curvycorners.js',array('jquery'));
		wp_register_script('custom-script',			get_bloginfo('template_url').'/js/custom-script.js',array('jquery'));

		wp_enqueue_script('jquery');
		wp_enqueue_script('superfish');
		wp_enqueue_script('jquery.pikachoose');
		wp_enqueue_script('jquery.jcarousel');
		wp_enqueue_script('jquery.curvycorner');
		wp_enqueue_script('custom-script');				
	}
	
	// register css link
	function eurekaRegisterCSS()
	{
		wp_register_style('superfish',		get_bloginfo('template_url').'/css/superfish.css');
		wp_register_style('custom-style',	get_bloginfo('template_url').'/style.php');
		
		wp_enqueue_style('superfish');
		wp_enqueue_style('custom-style');
	}
	
	// register admin javascript link
	function eurekaAdminRegisterScript()
	{
		wp_register_script('jpicker'		, THEMELINK.'/admin/js/jpicker.js',array('jquery'));
		wp_register_script('tinymce'		, THEMELINK.'/admin/js/tiny_mce/tiny_mce.js');
		wp_register_script('colorpicker'	, THEMELINK.'/admin/js/colorpicker.js');
		wp_register_script('my-upload'		, THEMELINK.'/admin/js/script.php?upload=8', array('jquery','media-upload','thickbox'));
		
		wp_enqueue_script('jquery');
		wp_enqueue_script('tinymce');
		wp_enqueue_script('media-upload');
		wp_enqueue_script('thickbox');
		wp_enqueue_script('my-upload');
		wp_enqueue_script('jpicker');
	}
	
	// calling action for admin_head hook
	function eurekaAdminHead()
	{
		?>
        <script type="text/javascript" src="<?php echo THEMELINK; ?>/admin/js/script.php?upload=10"></script>
        <?php
	}
	
	// calling action for admin_footer hook
	function eurekaAdminFooter()
	{

	}
	
	// register admin css link
	function eurekaAdminRegisterCSS()
	{
		wp_register_style('jpicker'			, THEMELINK.'/admin/css/jPicker.css');
		wp_register_style('jpicker-sub'		, THEMELINK.'/admin/css/jPicker-sub.css');
		
		wp_enqueue_style('jpicker');
		wp_enqueue_style('jpicker-sub');
	}
	
	// calling any function on footer
	function eurekaFooter()
	{

	}
		
	/* body_class filtering */
	function eurekaBodyClass($classes,$class = null)
	{
		global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;
	
		if(is_search() || is_single() || is_page || is_category() || is_tag()) :
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
			<div id="comment-<?php comment_ID(); ?>">
			<div class="comment-author vcard">
				<?php echo get_avatar( $comment, 40 ); ?>
				<?php printf( __( '%s <span class="says">says:</span>', 'twentyten' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
			</div><!-- .comment-author .vcard -->
			<?php if ( $comment->comment_approved == '0' ) : ?>
				<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'twentyten' ); ?></em>
				<br />
			<?php endif; ?>
	
			<div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
				<?php
					/* translators: 1: date, 2: time */
					printf( __( '%1$s at %2$s', 'twentyten' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)', 'twentyten' ), ' ' );
				?>
			</div><!-- .comment-meta .commentmetadata -->
	
			<div class="comment-body"><?php comment_text(); ?></div>
            
            <?php 
				$rating	= get_comment_meta(get_comment_ID(),"commentrating");
				
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
    	        <?php 
					endif; 
			?>
	
			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</div><!-- #comment-##  -->
	
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