<?php 
/**
 * @Author	Anonymous
 * @link http://www.redrokk.com
 * @Package Wordpress
 * @SubPackage RedRokk Library
 * @copyright  Copyright (C) 2011+ Redrokk Interactive Media
 * 
 * @version 2.0
 */

//security
defined('ABSPATH') or die('You\'re not supposed to be here.');

/**
 * 
 * 
 * @author Anonymous
 * @example

	$gallery = redrokk_taxmeta_class::getInstance('gallery');
	$gallery->set('_fields', array(
					array(
						'name' 	=> 'New Image',
						'type' 	=> 'title',
					),
					array(
						'name' 	=> 'Image Title',
						'id' 	=> $this->_id.'_post_title',
						'type' 	=> 'text',
					),
					array(
						'name' 	=> 'Description',
						'id' 	=> $this->_id.'_post_content',
						'type' 	=> 'textarea',
					),
					array(
						'name' 	=> 'Image File',
						'id' 	=> $this->_id.'_image',
						'type' 	=> 'image',
					),
					array(
						'name' 	=> 'Save Image',
						'type' 	=> 'submit',
					),
				));

 */
class redrokk_taxmeta_class
{
	/**
	 * HTML 'id' attribute of the edit screen section
	 * 
	 * @var string
	 */
	var $_id;
	
	/**
	 * Save the form fields here that will be displayed to the user
	 * 
	 * @var array
	 */
	var $_fields;
	
	/**
	 * The type of Write screen on which to show the edit screen section 
	 * ('post', 'page', 'link', or 'custom_post_type' where custom_post_type 
	 * is the custom post type slug)
	 * Default: None
	 * 
	 * @var array
	 */
	var $_object_types = array();
	
	/**
	 * Prebuilt metaboxes can be activated by using this type
	 * Default: default
	 * 
	 * (options:)
	 * default
	 * images
	 * 
	 * @var string
	 */
	var $_type;
	
	/**
	 * 
	 * @var string
	 */
	var $_table = 'term';
	
	/**
	 * Method properly prepares the metabox type by binding the necessary hooks
	 * 
	 * @param mixed $value
	 */
	function setType( $value = 'default' )
	{
		$this->_type = $value;
		
		switch ($this->_type)
		{
			default:
			case 'default':
				add_action('taxmeta-show-'.$this->_id, array(&$this, '_renderForm'), 20, 1 );
				add_action('taxmeta-save-'.$this->_id, array(&$this, 'saveAsPostMeta'), 1, 2);
				break;
				/*
			case 'images':
				$this->_fields = array(
					array(
						'name' 	=> 'New Image',
						'type' 	=> 'title',
					),
					array(
						'name' 	=> 'Image Title',
						'id' 	=> $this->_id.'_post_title',
						'type' 	=> 'text',
					),
					array(
						'name' 	=> 'Description',
						'id' 	=> $this->_id.'_post_content',
						'type' 	=> 'textarea',
					),
					array(
						'name' 	=> 'Image File',
						'id' 	=> $this->_id.'_image',
						'type' 	=> 'image',
					),
					array(
						'name' 	=> 'Save Image',
						'type' 	=> 'submit',
					),
				);
				add_action('taxmeta-show-'.$this->_id, array(&$this, '_renderListImageAttachments'), 20, 1 );
				add_action('taxmeta-show-'.$this->_id, array(&$this, '_renderForm'), 20, 1 );
				add_action('taxmeta-save-'.$this->_id, array(&$this, 'saveAsImageAttachment'), 1, 2);
				break;
				*/
		}
	}
	
	/**
	 * Method will save the posted content as an image attachment
	 * 
	 */
	function saveAsImageAttachment( $source, $term_id )
	{
		if (empty($_FILES) || !isset($_REQUEST[$this->_id.'files'])) return $this;
		
		// initializing
		$property = $_REQUEST[$this->_id.'files'];
		$post_data = array();
		
		if (isset($source[$this->_id.'_post_title'])) {
			$post_data['post_title'] = $source[$this->_id.'_post_title'];
		}
			
		if (isset($source[$this->_id.'_post_content'])) {
			$post_data['post_content'] = $source[$this->_id.'_post_content'];
		}
		
		$id = media_handle_upload($property, $term_id, $post_data);
		
		$old = get_metadata($this->_table, $term_id, $property, true);
		if ($id && $id != $old) {
			wp_delete_attachment( $old, true );
    		update_metadata($this->_table, $term_id, $property, $id);
    	}
	}
	
	/**
	 * Method saves the data provided as post meta values
	 * 
	 * @param array $source
	 * @param integer $term_id
	 */
	function saveAsPostMeta( $source, $term_id )
	{
		$this->saveAsImageAttachment( $source, $term_id );
		
		foreach ((array)$source as $property => $new)
		{
			$old = get_metadata($this->_table, $term_id, $property, true);
			if ($new && $new != $old) {
    			update_metadata($this->_table, $term_id, $property, $new);
    		}
    		elseif (!$new) {
    			delete_metadata($this->_table, $term_id, $property, $old);
    		}
		}
		return true;
	}
	
	/**
	 * Do something with the data entered
	 * 
	 * @param integer $term_id
	 * @param integer $tt_id
	 */
	function _save( $term_id )
	{
		//initializing
		$term = get_term($term_id, $this->getCurrentTaxonomy());
		
		// verify if this is an auto save routine. 
		// If it is our form has not been submitted, so we dont want to do anything
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
			return;
		
		// verify this came from the our screen and with proper authorization,
		// because save_post can be triggered at other times
		if ( !isset($_REQUEST[ get_class().$this->_id ]) )
			return;
		
		if ( !wp_verify_nonce( $_REQUEST[ get_class().$this->_id ], plugin_basename( __FILE__ ) ) )
			return;
		
		// this metabox is to be displayed for a certain object type only
		if ( !in_array($this->getCurrentTaxonomy(), $this->_object_types) )
			return;
		
		// Check permissions
		//if ( !current_user_can( 'edit_post' ) ) return;
		
		//saving the request data
		do_action('taxmeta-save-'.$this->_id, $this->getRequestMetas(), $term_id, $this );
		return true;
	}
	
	/**
	 * Method returns the post meta
	 * 
	 */
	function getRequestMetas()
	{
		$ignores = array('post_title', 'post_name', 'post_content', 'post_excerpt', 'post',
		'post_status', 'post_type', 'post_author', 'ping_status', 'post_parent', 'message',
		'post_category', 'comment_status', 'menu_order', 'to_ping', 'pinged', 'post_password', 
		'guid', 'post_content_filtered', 'import_id', 'post_date', 'post_date_gmt', 'tags_input',
		'action');
		
		$fields = array();
		foreach ((array)$this->_fields as $field)
		{
			if (!isset($field['id'])) continue;
			$fields[] = $field['id'];
		}
		
		$requests = $_REQUEST;
		foreach ((array)$requests as $k => $request)
		{
			if (($fields && !in_array($k, $fields))
			|| (in_array($k, $ignores) || strpos($k, 'nounce')!==false))
			{
				unset($requests[$k]);
			}
		}
		return apply_filters('taxmeta-requests-'.$this->_id, $requests);
	}
	
	/**
	 * Display the form
	 */
	function show( $_taxonomy )
	{
		// Use nonce for verification
  		wp_nonce_field( plugin_basename( __FILE__ ), get_class().$this->_id );
  		do_action('taxmeta-show-'.$this->_id, $this->_fields, $this);
	}
	
	/**
	 * Method renders the form from any source
	 * 
	 * @param array $fields
	 */
	function _renderForm( $fields = array() )
	{
		//initializing
		global $tax;
		$term_id = isset($_REQUEST['tag_ID']) ?$_REQUEST['tag_ID'] :0;
		
		$defaults = array(
			'name' 	=> '',
			'desc' 	=> '',
			'id' 	=> '',
			'type' 	=> 'text',
			'options'=> array(),
			'default'=> '',
			'value'=> '',
			'class'=> '',
			'multiple'=> '',
		);
		
		// no fields to render
		if (empty($fields)) {
			?>
		<p>No form fields have been defined. Use <pre>
		$metabox->set('_fields', array(
			array(
				'name' 	=> 'Title',
				'type' 	=> 'title',
			),
			array(
				'name' 	=> 'Title',
				'desc' 	=> '',
				'id' 	=> 'title',
				'type' 	=> 'text',
				'std' 	=> ''
			),
			array(
				'name' 	=> 'image',
				'desc' 	=> '',
				'id' 	=> 'imagefile',
				'type' 	=> 'image',
				'std' 	=> ''
			),
			array(
				'name' 	=> 'Textarea',
				'desc' 	=> 'Enter big text here',
				'id' 	=> 'textarea_id',
				'type' 	=> 'textarea',
				'std' 	=> 'Default value 2'
			),
			array(
				'name'  => 'Select box',
				'id'	=> 'select_id',
				'type'  => 'select',
				'options'=> array(
					'value1' => 'Value 1',
					'value2' => 'Value 2',
					'value3' => 'Value 3',
					'value4' => 'Value 4',
				)
			),
			array(
				'name' 	=> 'Radio',
				'id' 	=> 'radio_id',
				'type' 	=> 'radio',
				'value' => 'test',
				'desc' 	=> 'Check this box if you want its value saved',
			),
			array(
				'name' 	=> '',
				'id' 	=> 'radio_id', 
				'type' 	=> 'radio',
				'value' => 'test2',
				'desc' 	=> 'Check this box if you want its value saved',
			),
			array(
				'name' 	=> 'Checkbox',
				'id' 	=> 'checkbox_id',
				'type' 	=> 'checkbox',
				'desc' 	=> 'Check this box if you want its value saved',
			),
		));</pre>
		</p>
			<?php 
			
		// rendering the fields
		} else {
			?>
		<table class="form-table">
			<?php foreach ((array)$fields as $field): ?>
			<?php extract(wp_parse_args($field, $defaults)); ?>
			<?php $id = sanitize_title($id); ?>
			<?php $meta = get_metadata($this->_table, $term_id, $id, true); ?>
			<?php switch ($type){ default: ?>
			<?php case 'text': ?>
			<tr>
				<th scope="row" style="width: 140px">
					<label for="<?php echo $id; ?>"><?php echo $name; ?></label></th>
				<td><input 
					id="<?php echo $id; ?>" 
					value="<?php echo $meta ?$meta :$default; ?>" 
					type="<?php echo $type; ?>" 
					name="<?php echo $id; ?>" 
					class="text large-text <?php echo $class; ?>" />
					<span class="description"><?php echo $desc; ?></span>
					</td>
			</tr>
			<?php break; ?>
			<?php case 'submit': ?>
			<?php case 'button': ?>
			<tr>
				<td colspan="2"><input 
					id="<?php echo $id; ?>" 
					value="<?php echo $name; ?>" 
					type="submit" 
					name="submit" 
					class="button-primary <?php echo $class; ?>" />
					<span class="description"><?php echo $desc; ?></span>
					</td>
			</tr>
			<?php break; ?>
			<?php case 'file': ?>
			<?php case 'image': ?> 
			<tr>
				<th scope="row" style="width: 140px">
					<label for="<?php echo $id; ?>"><?php echo $name; ?></label></th>
				<td>
				<?php if ($url = wp_get_attachment_thumb_url( $meta )): ?>
					<div style="padding:10px;background:whiteSmoke;width:150px;position:relative;float:left;">
						<img src="<?php echo $url; ?>" /></div>
				<?php endif; ?>
				
				<input type="hidden" name="<?php echo $this->_id; ?>files" value="<?php echo $id; ?>" />
				<!-- first hidden input forces this item to be submitted when it is not checked -->
				<input 
					id="<?php echo $id; ?>" 
					type="file" 
					name="<?php echo $id; ?>" 
					onChange="
					if (document.getElementById('addtag')!==null)
						document.getElementById('addtag').enctype = 'multipart/form-data';
					if (document.getElementById('edittag')!==null)
						document.getElementById('edittag').enctype = 'multipart/form-data';"
					class="<?php echo $class; ?>" />
					<span class="description"><?php echo $desc; ?></span>
					</td>
			</tr>
			<?php break; ?>
			<?php case 'title': ?>
			<tr>
				<th colspan="2" scope="row">
					<h3 style="border: 1px solid #ddd;
						padding: 10px;
						background: #eee;
						border-radius: 2px;
						color: #666;
						margin: 0;"><?php echo $name; ?></h1></th>
				<td>
			</tr>
			<?php break; ?>
			<?php case 'checkbox': ?>
			<tr>
				<th scope="row" style="width: 140px">
					<label for="<?php echo $id; ?>"><?php echo $name; ?></label></th>
				<td>
				<input type="hidden" name="<?php echo $id; ?>" value="" />
				<!-- first hidden input forces this item to be submitted when it is not checked -->
				<input 
					value="<?php echo $value; ?>" 
					type="<?php echo $type; ?>" 
					name="<?php echo $id; ?>" 
					<?php echo $meta && $meta == $value || (!$meta && $default) ?'checked="checked"' :''; ?>
					class="<?php echo $class; ?>" />
					<span class="description"><?php echo $desc; ?></span>
					</td>
			</tr>
			<?php break; ?>
			<?php case 'radio': ?>
			<tr>
				<th scope="row" style="width: 140px">
					<label for="<?php echo $id; ?>"><?php echo $name; ?></label></th>
				<td><input 
					value="<?php echo $value; ?>" 
					type="<?php echo $type; ?>" 
					name="<?php echo $id; ?>" 
					<?php echo $meta && $meta == $value || (!$meta && $default) ?'checked="checked"' :''; ?>
					class="<?php echo $class; ?>" />
					<span class="description"><?php echo $desc; ?></span>
					</td>
			</tr>
			<?php break; ?>
			<?php case 'textarea': ?>
			<tr>
				<th scope="row" style="width: 140px">
					<label for="<?php echo $id; ?>"><?php echo $name; ?></label></th>
				<td><textarea 
					id="<?php echo $id; ?>" 
					name="<?php echo $id; ?>" 
					class="large-text <?php echo $class; ?>"
					><?php echo $meta ?$meta :$default; ?></textarea>
					<span class="description"><?php echo $desc; ?></span>
					</td>
			</tr>
			<?php break; ?>
			<?php case 'select': ?>
			<tr>
				<th scope="row" style="width: 140px">
					<label for="<?php echo $id; ?>"><?php echo $name; ?></label></th>
				<td><select 
					id="<?php echo $id; ?>" 
					name="<?php echo $id; ?>" 
					class="<?php echo $class; ?>"
					<?php echo $multiple ?"MULTIPLE SIZE='$multiple'" :''; ?>
					><?php foreach ((array)$options as $_value => $_name): ?>
					
						<option 
							value="<?php echo $_value; ?>"
							<?php echo $meta == $_value || (!$meta && $_value == $default) ?' selected="selected"' :''; ?>
							><?php echo $_name; ?></option>
						
					<?php endforeach; ?></select>
					<span class="description"><?php echo $desc; ?></span>
					</td>
			</tr>
			<?php break; ?>
			<?php } ?>
			<?php endforeach; ?>
		</table>
			<?php 
		}
		return;
	}
	
	/**
	 * Method is designed to return the currently visible post type
	 */
	function getCurrentTaxonomy()
	{
		$taxonomy = '';
		if (isset($_REQUEST['taxonomy'])) {
			$taxonomy = $_REQUEST['taxonomy'];
		}
		
		if (!$taxonomy) {
			global $tax;
			if (isset($tax->slug)) {
				$taxonomy = $tax->slug;
			}
		}
		return $taxonomy;
	}
	
	/**
	 * Method is needed because wordpress thought it would be cute to
	 * require us to know the exact taxonomy.
	 * 
	 */
	function _taxonomy_action()
	{
		// if the user has not already set the type of this metabox,
		// then we need to do that now
		if (!$this->_type) {
			$this->setType();
		}
		
		// this metabox is to be displayed for a certain object type only
		if ( !in_array($this->getCurrentTaxonomy(), $this->_object_types) )
			return;
		
		add_action( $this->getCurrentTaxonomy().'_add_form_fields', array(&$this, 'show'));
		add_action( $this->getCurrentTaxonomy().'_edit_form_fields', array(&$this, 'show'));
		
		add_action( 'created_'.$this->getCurrentTaxonomy(), array(&$this, '_save'), 20, 2 );
		add_action( 'edited_'.$this->getCurrentTaxonomy(), array(&$this, '_save'), 20, 2 );
		
		return $this;
	}
	
	/**
	 * Method properly inturprets the given parameter and sets it accordingly
	 *  
	 * @param string|object $value
	 */
	function setObjectTypes( $value )
	{
		if (is_a($value, 'redrokk_taxonomy_class')) {
			$value = $value->_taxonomy;
		}
		
		$this->_object_types[] = $value;
		return $this;
	}
	
	/**
	 * This function is called when the plugin is activated, it allow to create the SQL table.
	 *
	 * @return void
	 * @author Amaury Balmer
	 */
	function _install_table() 
	{
		global $wpdb;
		
		$charset_collate = '';
		if ( ! empty($wpdb->charset) )
			$charset_collate .= "DEFAULT CHARACTER SET $wpdb->charset";
			
		if ( ! empty($wpdb->collate) )
			$charset_collate .= " COLLATE $wpdb->collate";
		
		// Add one library admin function for next function
		require_once ABSPATH . 'wp-admin/includes/upgrade.php';
		
		// Try to create the meta table
		return maybe_create_table( $wpdb->{$this->tablename} , 
			"CREATE TABLE IF NOT EXISTS " . $wpdb->{$this->tablename} . " (
				`meta_id` int(20) NOT NULL auto_increment,
				`term_id` INT( 20 ) NOT NULL,
				`meta_key` VARCHAR( 255 ) NOT NULL,
				`meta_value` LONGTEXT NOT NULL,
				PRIMARY KEY  (`meta_id`),
				KEY `term_id` (`term_id`),
				KEY `meta_key` (`meta_key`)
			) $charset_collate;" 
		);
	}
	
	/**
	 * Constructor.
	 * 
	 */
	function __construct( $options = array() )
	{
		//initializing
		$this->setProperties($options);
		
		add_action( 'admin_init', array(&$this, '_taxonomy_action') );
		
		global $wpdb;
		$this->tablename = $this->_table.'meta';
		$wpdb->tables[] = $this->tablename;
		$wpdb->{$this->tablename} = $wpdb->prefix . $this->_table.'_meta';
		
		add_action( 'update_option_recently_activated', array($this, '_install_table') );
		//add_action( 'init', array($this, '_install_table') );
	}
	
	/**
	 * Method redirects the user if we have added a request redirect
	 * in the url
	 * 
	 * @param string $location
	 */
	function _redirectIntervention( $location )
	{
		if (isset($_GET['_redirect'])) {
			$location = urldecode($_GET['_redirect']);
		}
		return $location;
	}
	
	/**
	 * Get the current page url
	 */
	function _currentPageURL()
	{
		$pageURL = 'http';
		if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
		$pageURL .= "://";
		if ($_SERVER["SERVER_PORT"] != "80") {
			$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
		} else {
			$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
		}
		return $pageURL;
	}
	
	/**
	 * Method to bind an associative array or object to the JTable instance.This
	 * method only binds properties that are publicly accessible and optionally
	 * takes an array of properties to ignore when binding.
	 *
	 * @param   mixed  $src	 An associative array or object to bind to the JTable instance.
	 * @param   mixed  $ignore  An optional array or space separated list of properties to ignore while binding.
	 *
	 * @return  boolean  True on success.
	 *
	 * @link	http://docs.joomla.org/JTable/bind
	 * @since   11.1
	 */
	public function bind($src, $ignore = array())
	{
		// If the source value is not an array or object return false.
		if (!is_object($src) && !is_array($src))
		{
			trigger_error('Bind failed as the provided source is not an array.');
			return $this;
		}

		// If the source value is an object, get its accessible properties.
		if (is_object($src))
		{
			$src = get_object_vars($src);
		}

		// If the ignore value is a string, explode it over spaces.
		if (!is_array($ignore))
		{
			$ignore = explode(' ', $ignore);
		}

		// Bind the source value, excluding the ignored fields.
		foreach ($this->getProperties() as $k => $v)
		{
			// Only process fields not in the ignore array.
			if (!in_array($k, $ignore))
			{
				if (isset($src[$k]))
				{
					$this->$k = $src[$k];
				}
			}
		}

		return $this;
	}
	
	/**
	 * Set the object properties based on a named array/hash.
	 *
	 * @param   mixed  $properties  Either an associative array or another object.
	 *
	 * @return  boolean
	 *
	 * @since   11.1
	 *
	 * @see	 set() 
	 */
	public function setProperties($properties)
	{
		if (is_array($properties) || is_object($properties))
		{
			foreach ((array) $properties as $k => $v)
			{
				// Use the set function which might be overridden.
				$this->set($k, $v);
			}
		}

		return $this;
	}
	
	/**
	 * Modifies a property of the object, creating it if it does not already exist.
	 *
	 * @param   string  $property  The name of the property.
	 * @param   mixed   $value	 The value of the property to set.
	 *
	 * @return  mixed  Previous value of the property.
	 *
	 * @since   11.1
	 */
	public function set($property, $value = null)
	{
		$_property = 'set'.str_replace(' ', '', ucwords(str_replace('_', ' ', $property)));
		if (method_exists($this, $_property)) {
			return $this->$_property($value);
		}
		
		$previous = isset($this->$property) ? $this->$property : null;
		$this->$property = $value;
		return $this;
	}
	
	/**
	 * Returns an associative array of object properties.
	 *
	 * @param   boolean  $public  If true, returns only the public properties.
	 *
	 * @return  array 
	 *
	 * @see	 get()
	 */
	public function getProperties($public = true)
	{
		$vars = get_object_vars($this);
		if ($public)
		{
			foreach ($vars as $key => $value)
			{
				if ('_' == substr($key, 0, 1))
				{
					unset($vars[$key]);
				}
			}
		}

		return $vars;
	}
	
	/**
	 * 
	 * contains the current instance of this class
	 * @var object
	 */
	static $_instances = null;
	
	/**
	 * Method is called when we need to instantiate this class
	 * 
	 * @param array $options
	 */
	public static function getInstance( $_id, $options = array() )
	{
		if (!isset(self::$_instances[$_id]))
		{
			$options['_id'] = $_id;
			$class = get_class();
			self::$_instances[$_id] =& new $class($options);
		}
		return self::$_instances[$_id];
	}
}