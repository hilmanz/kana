<?php

add_action( 'show_user_profile', 'eurekaShowExtraProfileFields', 10 );
add_action( 'edit_user_profile', 'eurekaShowExtraProfileFields', 10 );


// ================================================================	//
// == 				eurekaShowExtraProfileFields				==	//
// ================================================================	//

function eurekaShowExtraProfileFields( $user ) 
{
	$zip		= get_the_author_meta('zip'		,$user->ID);
	$birthday	= get_the_author_meta('birthday',$user->ID);
	$country	= get_the_author_meta('country'	,$user->ID);
	$city		= get_the_author_meta('city'	,$user->ID);
	$state		= get_the_author_meta('state'	,$user->ID);
	$gender		= get_the_author_meta('gender'	,$user->ID);
	?>

	<h3><?php _e('Extra Profile Information', 'eureka'); ?></h3>

	<table class="form-table">

		<tr>
			<th><label for="country"><?php _e('Birth Day', 'eureka'); ?></label></th>
			<td><input class="date-pick" type="text" name="data[user][birthday]" value="<?php echo($birthday); ?>" /></td>
		</tr>
		
		<tr>
			<th><label for="country"><?php _e('Country', 'eureka'); ?></label></th>
			<td><?php eurekaNationArray('data[user][country]',$country); ?></td>
		</tr>
        
		<tr>
			<th><label for="city"><?php _e('City', 'eureka'); ?></label></th>
			<td><input type="text" name="data[user][city]" value="<?php echo($city); ?>" /></td>
		</tr>
        
		<tr>
			<th><label for="state"><?php _e('State', 'eureka'); ?></label></th>
			<td><input type="text" name="data[user][state]" value="<?php echo($state); ?>" /></td>
		</tr>
        
		<tr>
			<th><label for="state"><?php _e('Zip Code', 'eureka'); ?></label></th>
			<td><input type="text" name="data[user][zip]" value="<?php echo($zip); ?>" /></td>
		</tr>        
        
		<tr>
			<th><label for="state"><?php _e('Gender', 'eureka'); ?></label></th>
			<td>
				<ul>
					<li><input value="male" name="data[user][gender]" 
						  <?php if ($gender == 'male' ) { ?>checked="checked"<?php }?> type="radio" /> <?php _e('Male', 'eureka'); ?>
					</li>
					<li><input value="female"  name="data[user][gender]" 
						  <?php if ($gender == 'female'  ) { ?>checked="checked"<?php }?> type="radio" /> <?php _e('Female',  'eureka'); ?>
					</li>
				</ul>
            </td>
		</tr>
		
	</table>
<?php }

// ================================================================	//
// == 				eurekaSaveExtraProfileFields				==	//
// ================================================================	//

add_action( 'personal_options_update', 'eurekaSaveExtraProfileFields' );
add_action( 'edit_user_profile_update', 'eurekaSaveExtraProfileFields' );

function eurekaSaveExtraProfileFields( $user_id ) {

	if ( !current_user_can( 'edit_user', $user_id ) )
		return false;
		
	foreach($_POST['data']['user'] as $key => $value) :
		update_usermeta( $user_id, $key, $_POST['data']['user'][$key] );	
	endforeach;
}

?>