<?php
	// Create Featured
	add_action( 'init', 'create_featured' );
	function create_featured() {
	  $labels = array(
		'name' => _x('Featured List', 'post type general name'),
		'singular_name' => _x('Featured List', 'post type singular name'),
		'add_new' => _x('Add New', 'Featured List'),
		'add_new_item' => __('Add New Featured List'),
		'edit_item' => __('Edit Featured List'),
		'new_item' => __('New Featured List'),
		'view_item' => __('View Featured List'),
		'search_items' => __('Search Featured List'),
		'not_found' =>  __('No Featured List found'),
		'not_found_in_trash' => __('No Featured List found in Trash'),
		'parent_item_colon' => ''
	  );
	
	  $supports = array('title', 'editor','revisions');
	  register_post_type( 'featured',
		array(
		  'labels' => $labels,
		  'public' => true,
		  'supports' => $supports
		)
	  );
	}
	// Metabox Featured
	function featured_metabox( $meta_featured ) {
			$prefix = '_cmb_'; // Prefix for all fields
			$meta_featured[] = array(
				'id' => 'test_metabox',
				'title' => 'Featured List',
				'pages' => array('featured'), // post type
				'context' => 'normal',
				'priority' => 'high',
				'show_names' => true, // Show field names on the left
				'fields' => array(
					array(
						'name' => 'Icon',
						'desc' => '50x50 Pixel',
						'id' => $prefix . 'icon_featured',
						'type' => 'file'
					),
					array(
						'name' => 'Excerpt',
						'id' => $prefix . 'excerpt_featured',
						'type' => 'textarea'
					),
				),
			);
		
			return $meta_featured;
		}
		add_filter( 'cmb_meta_boxes', 'featured_metabox' );
		add_action( 'init', 'be_initialize_cmb_meta_boxes', 9999 );
		function be_initialize_cmb_meta_boxes() {
			if ( !class_exists( 'cmb_Meta_Box' ) ) {
				require_once( 'functions/init.php' );
			}
		}
?>
