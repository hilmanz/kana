<?php
	// Create Team
	add_action( 'init', 'create_team' );
	function create_team() {
	  $labels = array(
		'name' => _x('Team', 'post type general name'),
		'singular_name' => _x('Team', 'post type singular name'),
		'add_new' => _x('Add New Team', ' Team'),
		'add_new_item' => __('Add New  Team'),
		'edit_item' => __('Edit  Team'),
		'new_item' => __('New  Team'),
		'view_item' => __('View  Team'),
		'search_items' => __('Search  Team'),
		'not_found' =>  __('No Team found'),
		'not_found_in_trash' => __('No Team found in Trash'),
		'parent_item_colon' => ''
	  );
	
	  $supports = array('title','revisions');
	  register_post_type( 'team',
		array(
		  'labels' => $labels,
		  'public' => true,
		  'supports' => $supports
		)
	  );
	}
	
	// Metabox Slider
	function team_metabox( $meta_team ) {
			$prefix = '_cmb_'; // Prefix for all fields
			$meta_team[] = array(
				'id' => 'new_team',
				'title' => 'Add Team',
				'pages' => array('team'), // post type
				'context' => 'normal',
				'priority' => 'high',
				'show_names' => true, // Show field names on the left
				'fields' => array(
					array(
						'name' => 'Team Position',
						'desc' => 'position',
						'id' => $prefix . 'team_position',
						'type' => 'text'
					),
					array(
						'name' => 'Uplod Team',
						'desc' => 'Upload Team Thumbnail 183x285 Pixel',
						'id' => $prefix . 'team_photo',
						'type' => 'file'
					),
				),
			);
		
			return $meta_team;
		}
		
		add_filter( 'cmb_meta_boxes', 'team_metabox' );
		add_action( 'init', 'be_initialize_cmb_team_metabox', 9999 );
		function be_initialize_cmb_team_metabox() {
			if ( !class_exists( 'cmb_Meta_Box' ) ) {
				require_once( 'functions/init.php' );
			}
		}
?>
