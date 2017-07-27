<?php
add_action( 'add_meta_boxes', 'cd_meta_box_add' );
function cd_meta_box_add()
{
	add_meta_box( 'my-meta-box-id', 'Label Setting', 'cd_meta_box_cb', 'post', 'normal', 'high' );
}

function cd_meta_box_cb( $post )
{
	$values = get_post_custom( $post->ID );
	$labeltext = isset( $values['label_text'] ) ? esc_attr( $values['label_text'][0] ) : '';
	$labelfontcolor = isset( $values['label_fontcolor'] ) ? esc_attr( $values['label_fontcolor'][0] ) : '';
	$labelcolor = isset( $values['label_color'] ) ? esc_attr( $values['label_color'][0] ) : '';
	wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
	?>
	<p>
		<label for="label_text">Label Text</label>
		<input type="text" name="label_text" id="label_text" value="<?php echo $labeltext; ?>" />
	</p>
	<p>
		<label for="label_fontcolor">Label Font Color</label>
		<input type="text" name="label_fontcolor" class="colorpicker" id="label_fontcolor" value="<?php echo $labelfontcolor; ?>" />
	</p>
	<p>
		<label for="label_color">Label Color</label>
		<select name="label_color" id="label_color">
			<option value="orange" <?php selected( $labelcolor, 'orange' ); ?>>Orange</option>
			<option value="blue" <?php selected( $labelcolor, 'blue' ); ?>>Blue</option>
			<option value="grey" <?php selected( $labelcolor, 'grey' ); ?>>Grey</option>
			<option value="red" <?php selected( $labelcolor, 'red' ); ?>>Red</option>
		</select>
	</p>
	<?php	
}

add_action( 'save_post', 'cd_meta_box_save' );
function cd_meta_box_save( $post_id )
{
	// Bail if we're doing an auto save
	if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	
	// if our nonce isn't there, or we can't verify it, bail
	if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;
	
	// if our current user can't edit this post, bail
	if( !current_user_can( 'edit_post' ) ) return;
	
	// now we can actually save the data
	$allowed = array( 
		'a' => array( // on allow a tags
			'href' => array() // and those anchords can only have href attribute
		)
	);
	// Probably a good idea to make sure your data is set
	if( isset( $_POST['label_text'] ) )
		update_post_meta( $post_id, 'label_text', wp_kses( $_POST['label_text'], $allowed ) );
		
	if( isset( $_POST['label_fontcolor'] ) )
		update_post_meta( $post_id, 'label_fontcolor', wp_kses( $_POST['label_fontcolor'], $allowed ) );
		
	if( isset( $_POST['label_color'] ) )
		update_post_meta( $post_id, 'label_color', esc_attr( $_POST['label_color'] ) );
		
		
		
}
if ( ! function_exists( 'display_label' ) ) :
function display_label() {
	$values = get_post_custom( $post->ID );
	$labeltext = isset( $values['label_text'] ) ? esc_attr( $values['label_text'][0] ) : '';
	$labelfontcolor = isset( $values['label_fontcolor'] ) ? esc_attr( $values['label_fontcolor'][0] ) : '';
	$labelcolor = isset( $values['label_color'] ) ? esc_attr( $values['label_color'][0] ) : '';
	?>
    <?php if( !empty( $labeltext ) ) {   ?>
        <div class="theLabel label-<?php echo $labelcolor; ?>">
            <span class="labelText" style="color:#<?php echo $labelfontcolor; ?>"><?php echo $labeltext; ?></span>
        </div>
	<?php } ?>
	<?php
	
}
endif;
?>