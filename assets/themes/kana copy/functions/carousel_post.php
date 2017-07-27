<?php
	// Create Slider
	add_action( 'init', 'create_portfolio' );
	function create_portfolio() {
	  $labels = array(
		'name' => _x('Portfolio', 'post type general name'),
		'singular_name' => _x('Portfolio', 'post type singular name'),
		'add_new' => _x('Add New', 'Portfolio'),
		'add_new_item' => __('Add New Portfolio'),
		'edit_item' => __('Edit Portfolio'),
		'new_item' => __('New Portfolio'),
		'view_item' => __('View Portfolio'),
		'search_items' => __('Search Portfolio'),
		'not_found' =>  __('No Portfolio found'),
		'not_found_in_trash' => __('No Portfolio found in Trash'),
		'parent_item_colon' => ''
	  );
	
	  $supports = array('title','thumbnail','revisions','editor');
	  register_post_type( 'portfolio',
		array(
		  'labels' => $labels,
		  'public' => true,
		  'supports' => $supports
		)
	  );
	}
	// Metabox Slider
	function portfolio_metabox( $meta_portfolio ) {
			$prefix = '_cmb_'; // Prefix for all fields
		
			return $meta_portfolio;
		}
		add_filter( 'cmb_meta_boxes', 'portfolio_metabox' );
		add_action( 'init', 'be_initialize_cmb_portfolio_metabox', 9999 );
		function be_initialize_cmb_portfolio_metabox() {
			if ( !class_exists( 'cmb_Meta_Box' ) ) {
				require_once( 'functions/init.php' );
			}
		}
?>
