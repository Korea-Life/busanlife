<?php
/**
 * @package extension-busanlife
 */

function custom_field($meta_key='') {
	//get current group id and load meta_key value if passed. If not pass it blank
	return groups_get_groupmeta( bp_get_group_id(), $meta_key) ;
}


function group_header_fields_markup() {
	global $bp, $wpdb;

	if (!function_exists('getArrInterestedGroups')) { 
?>
		<label for="ex-group-category">Input group's category</label>
		<input type="text" name="ex-group-category" id="ex-group-category" value=""><br>
	<?php
	} else {

		$group_id = bp_get_group_id();
		$group_category = groups_get_groupmeta( $group_id, 'ex-group-category' );

	?>
		<!-- added by KH -->
		<label for="ex-group-category">Group Category (required)</label>
		<select id="ex-group-category" name="ex-group-category">
		<option value="" disabled selected hidden>Choose a group category</option>
		<?php
		// set value when user selected.
		$group_options = getArrInterestedGroups();
		foreach($group_options as $group_option){
			// strcmp return 0 == equals
			if(strcmp($group_category, $group_option)){
		?>	

			<option value="<?php echo $group_option; ?>"><?php echo $group_option; ?></option>

		<?php
			}else {
		?>

			<option value="<?php echo $group_option; ?>" selected><?php echo $group_option; ?></option>

		<?php	
			}
		}
		?>

		</select>
		<br><br>
	
<?php
	}
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
		'ex-group-category',
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
function show_field_in_header() {
	echo custom_field('ex-group-category');
}
add_action('bp_group_header_meta' , 'show_field_in_header') ;

?>
