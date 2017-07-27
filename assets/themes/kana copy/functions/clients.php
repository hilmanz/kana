<?php
	// Create Clients
	add_action( 'init', 'create_clients' );
	function create_clients() {
	  $labels = array(
		'name' => _x('Clients', 'post type general name'),
		'singular_name' => _x('Clients', 'post type singular name'),
		'add_new' => _x('Add New Clients', ' Clients'),
		'add_new_item' => __('Add New  Clients'),
		'edit_item' => __('Edit  Clients'),
		'new_item' => __('New  Clients'),
		'view_item' => __('View  Clients'),
		'search_items' => __('Search  Clients'),
		'not_found' =>  __('No Clients found'),
		'not_found_in_trash' => __('No Clients found in Trash'),
		'parent_item_colon' => ''
	  );
	
	  $supports = array('title','revisions','editor');
	  register_post_type( 'clients',
		array(
		  'labels' => $labels,
		  'public' => true,
		  'supports' => $supports
		)
	  );
	}
	
	// Metabox Slider
	function clients_metabox( $meta_clients ) {
			$prefix = '_cmb_'; // Prefix for all fields
			$meta_clients[] = array(
				'id' => 'new_clients',
				'title' => 'Add Clients',
				'pages' => array('clients'), // post type
				'context' => 'normal',
				'priority' => 'high',
				'show_names' => true, // Show field names on the left
				'fields' => array(
					array(
						'name' => 'Summary',
						'desc' => 'Summary',
						'id' => $prefix . 'clients_summary',
						'type' => 'textarea'
					),
					array(
						'name' => 'Uplod Clients Logo',
						'desc' => 'Upload Clients Thumbnail 200x100 Pixel, Transparent Image',
						'id' => $prefix . 'clients_logo',
						'type' => 'file'
					),
					array(
						'name' => 'Uplod Clients Thumbnail',
						'desc' => 'Upload Clients Banner 370x620 Pixel',
						'id' => $prefix . 'clients_thumbnail',
						'type' => 'file'
					),
					array(
						'name' => 'Uplod Clients Banner',
						'desc' => 'Upload Clients Banner 1600x450 Pixel',
						'id' => $prefix . 'clients_banner',
						'type' => 'file'
					),
					array(
						'name' => 'Website URL',
						'desc' => 'Website URL',
						'id' => $prefix . 'clients_url',
						'type' => 'text'
					),
				),
			);
		
			return $meta_clients;
		}
		
		add_filter( 'cmb_meta_boxes', 'clients_metabox' );
		add_action( 'init', 'be_initialize_cmb_clients_metabox', 9999 );
		function be_initialize_cmb_clients_metabox() {
			if ( !class_exists( 'cmb_Meta_Box' ) ) {
				require_once( 'functions/init.php' );
			}
		}
?>
