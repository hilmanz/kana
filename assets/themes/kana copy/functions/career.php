<?php
	// Create Career
	add_action( 'init', 'create_career' );
	function create_career() {
	  $labels = array(
		'name' => _x('Career', 'post type general name'),
		'singular_name' => _x('Career', 'post type singular name'),
		'add_new' => _x('Add New Career', ' Career'),
		'add_new_item' => __('Add New  Career'),
		'edit_item' => __('Edit  Career'),
		'new_item' => __('New  Career'),
		'view_item' => __('View  Career'),
		'search_items' => __('Search  Career'),
		'not_found' =>  __('No Career found'),
		'not_found_in_trash' => __('No Career found in Trash'),
		'parent_item_colon' => ''
	  );
	
	  $supports = array('title','revisions','editor');
	  register_post_type( 'career',
		array(
		  'labels' => $labels,
		  'public' => true,
		  'supports' => $supports
		)
	  );
	}
	
	// Metabox Slider
	function career_metabox( $meta_career ) {
			$prefix = '_cmb_'; // Prefix for all fields
			$meta_career[] = array(
				'id' => 'new_career',
				'title' => 'Add Career',
				'pages' => array('career'), // post type
				'context' => 'normal',
				'priority' => 'high',
				'show_names' => true, // Show field names on the left
				'fields' => array(
				),
			);
		
			return $meta_career;
		}
		
		add_filter( 'cmb_meta_boxes', 'career_metabox' );
		add_action( 'init', 'be_initialize_cmb_career_metabox', 9999 );
		function be_initialize_cmb_career_metabox() {
			if ( !class_exists( 'cmb_Meta_Box' ) ) {
				require_once( 'functions/init.php' );
			}
		}
?>
