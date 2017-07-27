<?php
	// Create Testimonial
	add_action( 'init', 'create_testimonial' );
	function create_testimonial() {
	  $labels = array(
		'name' => _x('Testimonial', 'post type general name'),
		'singular_name' => _x('Testimonial', 'post type singular name'),
		'add_new' => _x('Add New', 'Testimonial'),
		'add_new_item' => __('Add New Testimonial'),
		'edit_item' => __('Edit Testimonial'),
		'new_item' => __('New Testimonial'),
		'view_item' => __('View Testimonial'),
		'search_items' => __('Search Testimonial'),
		'not_found' =>  __('No Testimonial found'),
		'not_found_in_trash' => __('No Testimonial found in Trash'),
		'parent_item_colon' => ''
	  );
	
	  $supports = array('title','editor','revisions');
	  register_post_type( 'testimonial',
		array(
		  'labels' => $labels,
		  'public' => true,
		  'supports' => $supports
		)
	  );
	}
	// Metabox testimonial
	function testimonial_metabox( $meta_testimonial ) {
			$prefix = '_cmb_'; // Prefix for all fields
			$meta_testimonial[] = array(
				'id' => 'testimonial_metabox',
				'title' => 'Testimonial',
				'pages' => array('testimonial'), // post type
				'context' => 'normal',
				'priority' => 'high',
				'show_names' => true, // Show field names on the left
				'fields' => array(
					array(
						'name' => 'Testimonial Author',
						'desc' => 'Testimonial Author',
						'id' => $prefix . 'text_authortesti',
						'type' => 'text'
					),
				),
			);
		
			return $meta_testimonial;
		}
		add_filter( 'cmb_meta_boxes', 'testimonial_metabox' );
		add_action( 'init', 'be_initialize_cmb_testimonial_metabox', 9999 );
		function be_initialize_cmb_testimonial_metabox() {
			if ( !class_exists( 'cmb_Meta_Box' ) ) {
				require_once( 'functions/init.php' );
			}
		}
?>
