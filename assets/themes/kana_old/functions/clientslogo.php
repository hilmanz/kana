<?php
	// Create Clients
	add_action( 'init', 'create_clientslogo' );
	function create_clientslogo() {
	  $labels = array(
		'name' => _x('Clients Logo', 'post type general name'),
		'singular_name' => _x('Clients Logo', 'post type singular name'),
		'add_new' => _x('Add New Clients Logo', ' Clients Logo'),
		'add_new_item' => __('Add New  Clients Logo'),
		'edit_item' => __('Edit  Clients Logo'),
		'new_item' => __('New  Clients Logo'),
		'view_item' => __('View  Clients Logo'),
		'search_items' => __('Search  Clients Logo'),
		'not_found' =>  __('No Clients Logo found'),
		'not_found_in_trash' => __('No Clients Logo found in Trash'),
		'parent_item_colon' => ''
	  );
	
	  $supports = array('title','revisions');
	  register_post_type( 'clientslogo',
		array(
		  'labels' => $labels,
		  'public' => true,
		  'supports' => $supports
		)
	  );
	}
	
	// Metabox Slider
	function clientslogo_metabox( $meta_clientslogo ) {
			$prefix = '_cmb_'; // Prefix for all fields
			$meta_clientslogo[] = array(
				'id' => 'new_clientslogo',
				'title' => 'Add Clients Logo',
				'pages' => array('clientslogo'), // post type
				'context' => 'normal',
				'priority' => 'high',
				'show_names' => true, // Show field names on the left
				'fields' => array(
					array(
						'name' => 'Descripsi',
						'desc' => 'Summary',
						'id' => $prefix . 'clientslogo_desc',
						'type' => 'text'
					),
					array(
						'name' => 'Uplod Clients Logo',
						'desc' => 'Upload Clients Logo Thumbnail 234x182 Pixel, Transparent Image',
						'id' => $prefix . 'clientslogo_logo',
						'type' => 'file'
					),
					array(
						'name' => 'Uplod Clients Logo Thumbnail',
						'desc' => 'Upload Clients Logo Thumbnail 275x275 Pixel',
						'id' => $prefix . 'clientslogo_thumbnail',
						'type' => 'file'
					),
				),
			);
		
			return $meta_clientslogo;
		}
		
		add_filter( 'cmb_meta_boxes', 'clientslogo_metabox' );
		add_action( 'init', 'be_initialize_cmb_clientslogo_metabox', 9999 );
		function be_initialize_cmb_clientslogo_metabox() {
			if ( !class_exists( 'cmb_Meta_Box' ) ) {
				require_once( 'functions/init.php' );
			}
		}
?>
