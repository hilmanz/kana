<?php
	// Create Games
	add_action( 'init', 'create_game' );
	function create_game() {
	  $labels = array(
		'name' => _x('Games', 'post type general name'),
		'singular_name' => _x('Games', 'post type singular name'),
		'add_new' => _x('Add New Games', ' Games'),
		'add_new_item' => __('Add New  Games'),
		'edit_item' => __('Edit  Games'),
		'new_item' => __('New  Games'),
		'view_item' => __('View  Games'),
		'search_items' => __('Search  Games'),
		'not_found' =>  __('No Games found'),
		'not_found_in_trash' => __('No Games found in Trash'),
		'parent_item_colon' => ''
	  );
	
	  $supports = array('title','revisions');
	  register_post_type( 'game',
		array(
		  'labels' => $labels,
		  'public' => true,
		  'supports' => $supports,
			'has_archive' => true,
			'public' => true,
			'hierarchical' => false,
		)
	  );
	}
	
	// Metabox Slider
	function game_metabox( $meta_game ) {
			$prefix = '_cmb_'; // Prefix for all fields
			$meta_game[] = array(
				'id' => 'new_game',
				'title' => 'Add Games',
				'pages' => array('game'), // post type
				'context' => 'normal',
				'priority' => 'high',
				'show_names' => true, // Show field names on the left
				'fields' => array(
					array(
						'name' => 'Summary',
						'desc' => 'Summary',
						'id' => $prefix . 'game_summary',
						'type' => 'textarea'
					),
					array(
						'name' => 'Uplod Games Thumbnail',
						'desc' => 'Upload Games Banner 370x620 Pixel',
						'id' => $prefix . 'game_thumbnail',
						'type' => 'file'
					),
					array(
						'name'    => 'Type File',
						'desc'    => 'Select Type File',
						'id'      => $prefix . 'type_file',
						'type'    => 'select',
						'options' => array(
									array('name' => 'Video', 'value' => 'video'),
									array('name' => 'SWF', 'value' => 'swf'),
						),
					),
					array(
						'name' => 'Uplod Games Video',
						'desc' => 'Upload Games Video',
						'id' => $prefix . 'game_video',
						'type' => 'file'
					),
					array(
						'name' => 'Game SWF',
						'desc' => 'Game SWF',
						'id' => $prefix . 'game_swf',
						'type' => 'file'
					),
					array(
						'name' => 'SWF Width',
						'desc' => 'SWF Width',
						'id' => $prefix . 'swf_width',
						'type' => 'text'
					),
					array(
						'name' => 'SWF Height',
						'desc' => 'SWF Height',
						'id' => $prefix . 'swf_height',
						'type' => 'text'
					),
				),
			);
		
			return $meta_game;
		}
		
		add_filter( 'cmb_meta_boxes', 'game_metabox' );
		add_action( 'init', 'be_initialize_cmb_game_metabox', 9999 );
		function be_initialize_cmb_game_metabox() {
			if ( !class_exists( 'cmb_Meta_Box' ) ) {
				require_once( 'functions/init.php' );
			}
		}
		
		function wptp_register_taxonomy() {
		register_taxonomy( 'game_cat', array( 'game', 'post' ),
			array(
				'labels' => array(
					'name'              => 'Game Category',
					'singular_name'     => 'Game Category',
					'search_items'      => 'Search Game Categories',
					'all_items'         => 'All Game Categories',
					'edit_item'         => 'Edit Game Categories',
					'update_item'       => 'Update Game Category',
					'add_new_item'      => 'Add New Game Category',
					'new_item_name'     => 'New Game Category Name',
					'menu_name'         => 'Game Category',
				),
				'hierarchical' => true,
				'sort' => true,
				'args' => array( 'orderby' => 'term_order' ),
				'rewrite' => array( 'slug' => 'game-category' ),
				'show_admin_column' => true
			)
		);
	}
	add_action( 'init', 'wptp_register_taxonomy' );
?>
