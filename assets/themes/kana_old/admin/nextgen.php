<?php

global $eureka_nextgen;

class eurekaNextgen extends eurekaApp
{
	function generateGalleryOptions($label,$part,$section)
	{
		global $wpdb,$th_pre;
		
		$opt_name	= $th_pre.$part."_".$section;
		$id			= str_replace("_","-",$opt_name);
		$gallery_id	= stripslashes(get_option($opt_name));
		$name		= "data[".$opt_name."]";
		
		$query		= "SELECT * FROM ".$wpdb->prefix."ngg_gallery";	
		$results	= $wpdb->get_results($query,ARRAY_A);
		
		parent::beforeInput($label);
		
		?><select name="<?php echo $name; ?>" id="<?php echo $id; ?>"><?php
		
		foreach($results as $gallery) :
			$echo	= "<option value='".$gallery['gid']."'";
			
			if((is_array($gallery_id) && in_array($gallery['gid'],$gallery_id)) || $gallery['gid'] == $gallery_id) :
				$echo .= " selected='selected'";
			endif;
			
			$echo .= ">".$gallery['title']."</option>";
			
			echo $echo;
		endforeach;
		
		?></select><?php
		
		parent::afterInput();
	}
	
	function getGallery($gallery_id)
	{
		global $wpdb;
		
		$query	= "SELECT * FROM ".$wpdb->prefix."ngg_gallery WHERE gid = '".$gallery_id."' ";
		
		return $wpdb->get_row($query,ARRAY_A);
	}
	
	// ===================================================
	// Generate Album Options
	function generateAlbumOptions($album_id)
	{
		global $nggdb;
		
		$albums	= $nggdb->find_all_album();
		
		foreach($albums as $album) :
		
			$echo	= "<option value='".$album->id."'";
		
			if((is_array($album_id) && in_array($album->id,$album_id)) || $album->id == $album_id) :
				$echo .= " selected='selected'";
			endif;
			
			$echo	.= ">".$album->name."</option>";
			
			echo $echo;
		endforeach;
	}
	
	// ===================================================
	// Generate Album Options
	function generateImagesFromAlbum($album_id)
	{
		global $nggdb;
		
		$images	= $nggdb->find_images_in_album($album_id);
		
		return $images;
	}
	
	// ===================================================
	// Generate Album Options
	function generateImagesFeaturedFromAlbum($album_id)
	{
		global $nggdb;
		
		$images	= $nggdb->find_images_in_album($album_id,'sortorder');
		
		$i = 1;
		foreach($images as $image) :
			?>
			<div class="panel">
				<img src="<?php echo $image->imageURL; ?>" width="543px" alt="<?php echo $image->alttext; ?>" /> 
				<div class="panel-overlay">
	      			<p><?php echo $image->alttext; ?></p>
				</div>
  			</div>
			<?php 
			$i++;
		endforeach;
		
	}
	
	// Generate Album Options
	function generateThumbsFeaturedFromAlbum($album_id)
	{
		global $nggdb;
		
		$images	= $nggdb->find_images_in_album($album_id,'sortorder');
		
		?><ul class="filmstrip"><?php
		
		$i = 1;
		foreach($images as $image) :
			?><li>
            	<div style="overflow:hidden;width:52px;height:52px;">
                <img src="<?php echo $image->thumbURL; ?>" alt="<?php echo $image->alttext; ?>" title="<?php echo $image->alttext; ?>" width="90px" />
                </div>
             </li><?php 
			$i++;
		endforeach;
		
		?></ul><?php
	}
	
	// ===================================================
	// Generate Album Options
	function generateGallery($gallery_id)
	{
	
		global $nggdb;
		
		$images	= $nggdb->find_images_in_album($album_id);
		
		/*
		global $wpdb;
		
		if(class_exists("nggImage")) :
		
			$query		= "SELECT * FROM ".$wpdb->prefix."ngg_gallery WHERE gid = '".$gallery_id."'";
			$gallery	= $wpdb->get_row($query);
			
			$nggimage	= new nggImage($gallery);
			
			$gallery_data	= wp_cache_get( 0, 'ngg_image' );
			
			$query		= "SELECT * FROM ".$wpdb->prefix."ngg_pictures WHERE galleryid = '".$gallery_id."'";
			$pictures	= $wpdb->get_results($query,ARRAY_A);
			
			foreach($pictures as $pic) :
			
				$image	= $gallery_data->imageURL.$pic['filename'];
				$thumb	= $gallery_data->imageURL.$pic['filename'];
			
			?><li>
            	<a href="<?php echo $image; ?>" title="<?php echo $pic['alttext']; ?>" rel="example4">
            		<img src="<?php echo $thumb; ?>" alt="<?php echo $pic['alttext']; ?>" title="" />
                </a>
              </li><?php 
			endforeach;
		
		else :
		
		return;
		
		endif;
		*/
	}
	
	// ===================================================
	// Generate Gallery List From Album
	// ===================================================
	function generateGalleryFromAlbum($album_id)
	{
		global $nggdb;	
		return $this->find_galleries_in_album($album_id);
	}
	
	// ===================================================
	// Generate Gallery List From Album
	// ===================================================
    function find_galleries_in_album($album, $order_by = 'galleryid', $order_dir = 'ASC', $exclude = true) 
	{
        global $wpdb,$nggdb;
        
        if ( !is_object($album) )
            $album = nggdb::find_album( $album );

        // Get gallery list
		
		if(isset($album->galleries)) :
	        $gallery_list = implode(',', $album->galleries);       
		else :
	        $gallery_list = implode(',', $album->gallery_ids);       
		endif;
		
        // Check for the exclude setting
        $exclude_clause = ($exclude) ? ' AND tt.exclude<>1 ' : '';

        // Say no to any other value
        $order_dir = ( $order_dir == 'DESC') ? 'DESC' : 'ASC';      
        $order_by  = ( empty($order_by) ) ? 'galleryid' : $order_by;
		
		$sql	= "SELECT t.*,tt.* ".
				  "FROM $wpdb->nggallery AS t INNER JOIN $wpdb->nggpictures AS tt ".
				  "ON t.gid = tt.galleryid ".
				  "WHERE t.gid IN ($gallery_list) AND t.pageid <> '0' ".
				  "GROUP BY t.gid ";
		
        $result = $wpdb->get_results($sql);
									 
        // Return the object from the query result
        if ($result) {
            foreach ($result as $image) {
                $images[] = new nggImage( $image );
            }
            return $images;
        }

        return null;     
    }
	
	// ===================================================
	// Generate An Image From A Gallery
	// ===================================================
	
	function generateImagesFromGallery($gallery_id,$total = null)
	{
        global $wpdb;
			
		$sql	= "SELECT tt.*, t.* ".
				  "FROM $wpdb->nggallery AS t INNER JOIN $wpdb->nggpictures AS tt ON t.gid = tt.galleryid ".
				  "WHERE tt.galleryid = $gallery_id ".
				  "ORDER BY tt.sortorder ASC ";
				  
		if(!is_null($total)) :
		
			$sql	= $sql."LIMIT $total";
		
		endif;
		
        $images = $wpdb->get_results( $wpdb->prepare($sql ) );
        
        // Build the object from the query result
		if ($images) :
			foreach ($images as $key => $image) 
            	$result[$key] = new nggImage( $image );
				
				return $result;
		endif;
                
        return false;
	}
}

$eureka_nextgen	= new eurekaNextgen;

?>