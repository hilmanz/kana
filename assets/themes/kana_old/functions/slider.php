<?php
	// Create Slider
	add_action( 'init', 'create_slider' );
	function create_slider() {
	  $labels = array(
		'name' => _x('Slider', 'post type general name'),
		'singular_name' => _x('Slider', 'post type singular name'),
		'add_new' => _x('Add New', 'Slider'),
		'add_new_item' => __('Add New Slider'),
		'edit_item' => __('Edit Slider'),
		'new_item' => __('New Slider'),
		'view_item' => __('View Slider'),
		'search_items' => __('Search Slider'),
		'not_found' =>  __('No Slider found'),
		'not_found_in_trash' => __('No Slider found in Trash'),
		'parent_item_colon' => ''
	  );
	
	  $supports = array('title','revisions','editor');
	  register_post_type( 'slider',
		array(
		  'labels' => $labels,
		  'public' => true,
		  'supports' => $supports
		)
	  );
	}
	// Metabox Slider
	function slider_metabox( $meta_slider ) {
			$prefix = '_cmb_'; // Prefix for all fields
			$meta_slider[] = array(
				'id' => 'new_slide',
				'title' => 'Add Slider',
				'pages' => array('Slider'), // post type
				'context' => 'normal',
				'priority' => 'high',
				'show_names' => true, // Show field names on the left
				'fields' => array(
					array(
						'name' => 'Text Button1',
						'id' => $prefix . 'text_button1',
						'type' => 'text'
					),
					array(
						'name' => 'Url Button1',
						'id' => $prefix . 'url_button1',
						'type' => 'text'
					),
					array(
						'name' => 'Color Button1',
						'id' => $prefix . 'color_btn1',
						'type' => 'colorpicker'
					),
					array(
						'name' => 'Shadow Button1',
						'id' => $prefix . 'shadow_btn1',
						'type' => 'colorpicker'
					),
					array(
						'name' => 'Text Button2',
						'id' => $prefix . 'text_button2',
						'type' => 'text'
					),
					array(
						'name' => 'Url Button2',
						'id' => $prefix . 'url_button2',
						'type' => 'text'
					),
					array(
						'name' => 'Color Button2',
						'id' => $prefix . 'color_btn2',
						'type' => 'colorpicker'
					),
					array(
						'name' => 'Shadow Button2',
						'id' => $prefix . 'shadow_btn2',
						'type' => 'colorpicker'
					),
					array(
						'name' => 'Slider Images',
						'desc' => 'Size 480x265 Pixel',
						'id' => $prefix . 'img_slide',
						'type' => 'file'
					),
				),
			);
		
			return $meta_slider;
		}
		add_filter( 'cmb_meta_boxes', 'slider_metabox' );
		add_action( 'init', 'be_initialize_cmb_slider_metabox', 9999 );
		function be_initialize_cmb_slider_metabox() {
			if ( !class_exists( 'cmb_Meta_Box' ) ) {
				require_once( 'functions/init.php' );
			}
		}
?>
