<?php
	// Create Slider
	add_action( 'init', 'create_tabpost' );
	function create_tabpost() {
	  $labels = array(
		'name' => _x('Tab Post', 'post type general name'),
		'singular_name' => _x('Tab Post', 'post type singular name'),
		'add_new' => _x('Add New', 'Tab Post'),
		'add_new_item' => __('Add New Tab Post'),
		'edit_item' => __('Edit Tab Post'),
		'new_item' => __('New Tab Post'),
		'view_item' => __('View Tab Post'),
		'search_items' => __('Search Tab Post'),
		'not_found' =>  __('No Tab Post found'),
		'not_found_in_trash' => __('No Tab Post found in Trash'),
		'parent_item_colon' => ''
	  );
	
	  $supports = array('title','thumbnail','revisions','editor');
	  register_post_type( 'tabpost',
		array(
		  'labels' => $labels,
		  'public' => true,
		  'supports' => $supports
		)
	  );
	}
	// Metabox Slider
	function tabpost_metabox( $meta_tabpost ) {
			$prefix = '_cmb_'; // Prefix for all fields
			$meta_tabpost[] = array(
				'id' => 'new_slide',
				'title' => 'Add Tab Post',
				'pages' => array('tabpost'), // post type
				'context' => 'normal',
				'priority' => 'high',
				'show_names' => true, // Show field names on the left
				'fields' => array(
					array(
						'name' => 'Tab Name',
						'id' => $prefix . 'tabname',
						'type' => 'text'
					),
				),
			);
			return $meta_tabpost;
		}
		add_filter( 'cmb_meta_boxes', 'tabpost_metabox' );
		add_action( 'init', 'be_initialize_cmb_tabpost_metabox', 9999 );
		function be_initialize_cmb_tabpost_metabox() {
			if ( !class_exists( 'cmb_Meta_Box' ) ) {
				require_once( 'functions/init.php' );
			}
		}
?>
