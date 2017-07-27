<?php
	// Create Slider
	add_action( 'init', 'create_carousellogo' );
	function create_carousellogo() {
	  $labels = array(
		'name' => _x('Screenshot', 'post type general name'),
		'singular_name' => _x('Screenshot', 'post type singular name'),
		'add_new' => _x('Add New Screenshot', ' Screenshot'),
		'add_new_item' => __('Add New  Screenshot'),
		'edit_item' => __('Edit  Screenshot'),
		'new_item' => __('New  Screenshot'),
		'view_item' => __('View  Screenshot'),
		'search_items' => __('Search  Screenshot'),
		'not_found' =>  __('No Screenshot found'),
		'not_found_in_trash' => __('No Screenshot found in Trash'),
		'parent_item_colon' => ''
	  );
	
	  $supports = array('title','revisions');
	  register_post_type( 'carousellogo',
		array(
		  'labels' => $labels,
		  'public' => true,
		  'supports' => $supports
		)
	  );
	}
	
	// Metabox Slider
	function carousellogo_metabox( $meta_carousellogo ) {
			$prefix = '_cmb_'; // Prefix for all fields
			$meta_carousellogo[] = array(
				'id' => 'new_carousellogo',
				'title' => 'Add Screenshot',
				'pages' => array('carousellogo'), // post type
				'context' => 'normal',
				'priority' => 'high',
				'show_names' => true, // Show field names on the left
				'fields' => array(
					array(
						'name' => 'Url Screenshot',
						'desc' => 'Link Url Screenshot',
						'id' => $prefix . 'carousellogo_url',
						'type' => 'text'
					),
					array(
						'name' => 'Uplod Screenshot Images',
						'desc' => 'Upload Screenshot Images 210 x 120 Pixel',
						'id' => $prefix . 'carousellogo_img',
						'type' => 'file'
					),
				),
			);
		
			return $meta_carousellogo;
		}
		
		add_filter( 'cmb_meta_boxes', 'carousellogo_metabox' );
		add_action( 'init', 'be_initialize_cmb_carousellogo_metabox', 9999 );
		function be_initialize_cmb_carousellogo_metabox() {
			if ( !class_exists( 'cmb_Meta_Box' ) ) {
				require_once( 'functions/init.php' );
			}
		}
?>
