<?
/**
 * @package ex-buddy
 */

function custom_field($meta_key='') {
	//get current group id and load meta_key value if passed. If not pass it blank
	return groups_get_groupmeta( bp_get_group_id(), $meta_key) ;
}


function group_header_fields_markup() {
	global $bp, $wpdb;
	?>
	<label for="favorite-color">My Favorite Color</label>
	<input id="favorite-color" type="text" name="favorite-color" value="<?php echo custom_field('favorite-color'); ?>" />
	<br>

	<label for="choose_color">My Favorite Color</label>
	<input id="choose_color" type="radio" name="choose_color" <?php if (custom_field('choose_color')=='blue') echo "checked";?> value="blue"> blue</input>




	<input id="choose_color" type="radio" name="choose_color" <?php if (custom_field('choose_color')=='red') echo "checked";?> value="red">
	
	<!-- this is what I was studying for -->
	<?php 

	// Try to get fields data with group id.
	// I think field exists individually
	// get data set using group id
	// then access property through 'name'	

	$data = xprofile_get_field_data('1');

	var_dump($data);

	?>
	
	</input>
	
	<?php

	if(bp_is_active('xprofile')) : 
		if( bp_has_profile( array( 'profile_group_id' => 1, 'fetch_field_data' => false))):
			while(bp_profile_groups()) : bp_the_profile_group();

				while( bp_profile_fields()) : bp_the_profile_field();

					if(bp_get_the_profile_field_name() == 'Country'){
					
						$field_type = bp_get_the_profile_field_options();
						var_dump($field_type);
						echo $field_type;
					}	

				endwhile;
				
			endwhile;
		endif;
	endif;

	

	?>



	<br>

	<?php
}

// This saves the custom group meta – props to Boone for the function
// Where $plain_fields = array.. you may add additional fields, eg
//  $plain_fields = array(
//      'field-one',
//      'field-two'
//  );
function group_header_fields_save( $group_id ) {
	global $bp, $wpdb;
	$plain_fields = array(
	'favorite-color',
	'choose_color'
	);
	foreach( $plain_fields as $field ) {
		$key = $field;
		if ( isset( $_POST[$key] ) ) {
			$value = $_POST[$key];
			groups_update_groupmeta( $group_id, $field, $value );
		}
	}
}

add_filter( 'groups_custom_group_fields_editable', 'group_header_fields_markup' );
add_action( 'groups_group_details_edited', 'group_header_fields_save' );
add_action( 'groups_created_group',  'group_header_fields_save' );


// Show the custom field in the group header
function show_field_in_header( ) {
	echo "<p> My favorite color is:" . custom_field('favorite-color') . " Hello ? " . custom_field('choose_color') . "</p>";
}
add_action('bp_group_header_meta' , 'show_field_in_header') ;

?>
