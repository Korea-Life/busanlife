<?php
/**
 * @package extension-busanlife
 */

// added by KH
function bp_add_custom_country_list() {

	if ( !xprofile_get_field_id_from_name('Country') && 'bp-profile-setup' == $_GET['page'] ) {

		$country_list_args = array(
						'field_group_id'  => 1,
						'name'            => 'Country',
						'description'	 => 'Please select your country',
						'can_delete'      => true,
						'field_order' 	 => 2,
						'is_required'     => false,
						'type'            => 'selectbox',
						'order_by'	 => 'custom'

						);

		$country_list_id = xprofile_insert_field( $country_list_args );

		if ( $country_list_id ) {

			$countries = array(
						"United States",			
						"Afghanistan",
						"Albania",
						"Algeria",
						"Andorra",
						"Angola",
						"Antigua and Barbuda",
						"Argentina",
						"Armenia",
						"Australia",
						"Austria",
						"Azerbaijan",
						"Bahamas",
						"Bahrain",
						"Bangladesh",
						"Barbados",
						"Belarus",
						"Belgium",
						"Belize",
						"Benin",
						"Bhutan",
						"Bolivia",
						"Bosnia and Herzegovina",
						"Botswana",
						"Brazil",
						"Brunei",
						"Bulgaria",
						"Burkina Faso",
						"Burundi",
						"Cambodia",
						"Cameroon",
						"Canada",
						"Cape Verde",
						"Central African Republic",
						"Chad",
						"Chile",
						"China",
						"Colombi",
						"Comoros",
						"Congo (Brazzaville)",
						"Congo",
						"Costa Rica",
						"Cote d'Ivoire",
						"Croatia",
						"Cuba",
						"Cyprus",
						"Czech Republic",
						"Denmark",
						"Djibouti",
						"Dominica",
						"Dominican Republic",
						"East Timor (Timor Timur)",
						"Ecuador",
						"Egypt",
						"El Salvador",
						"Equatorial Guinea",
						"Eritrea",
						"Estonia",
						"Ethiopia",
						"Fiji",
						"Finland",
						"France",
						"Gabon",
						"Gambia, The",
						"Georgia",
						"Germany",
						"Ghana",
						"Greece",
						"Grenada",
						"Guatemala",
						"Guinea",
						"Guinea-Bissau",
						"Guyana",
						"Haiti",
						"Honduras",
						"Hungary",
						"Iceland",
						"India",
						"Indonesia",
						"Iran",
						"Iraq",
						"Ireland",
						"Israel",
						"Italy",
						"Jamaica",
						"Japan",
						"Jordan",
						"Kazakhstan",
						"Kenya",
						"Kiribati",
						"Korea, North",
						"Korea, South",
						"Kuwait",
						"Kyrgyzstan",
						"Laos",
						"Latvia",
						"Lebanon",
						"Lesotho",
						"Liberia",
						"Libya",
						"Liechtenstein",
						"Lithuania",
						"Luxembourg",
						"Macedonia",
						"Madagascar",
						"Malawi",
						"Malaysia",
						"Maldives",
						"Mali",
						"Malta",
						"Marshall Islands",
						"Mauritania",
						"Mauritius",
						"Mexico",
						"Micronesia",
						"Moldova",
						"Monaco",
						"Mongolia",
						"Morocco",
						"Mozambique",
						"Myanmar",
						"Namibia",
						"Nauru",
						"Nepal",
						"Netherlands",
						"New Zealand",
						"Nicaragua",
						"Niger",
						"Nigeria",
						"Norway",
						"Oman",
						"Pakistan",
						"Palau",
						"Panama",
						"Papua New Guinea",
						"Paraguay",
						"Peru",
						"Philippines",
						"Poland",
						"Portugal",
						"Qatar",
						"Romania",
						"Russia",
						"Rwanda",
						"Saint Kitts and Nevis",
						"Saint Lucia",
						"Saint Vincent",
						"Samoa",
						"San Marino",
						"Sao Tome and Principe",
						"Saudi Arabia",
						"Senegal",
						"Serbia and Montenegro",
						"Seychelles",
						"Sierra Leone",
						"Singapore",
						"Slovakia",
						"Slovenia",
						"Solomon Islands",
						"Somalia",
						"South Africa",
						"Spain",
						"Sri Lanka",
						"Sudan",
						"Suriname",
						"Swaziland",
						"Sweden",
						"Switzerland",
						"Syria",
						"Taiwan",
						"Tajikistan",
						"Tanzania",
						"Thailand",
						"Togo",
						"Tonga",
						"Trinidad and Tobago",
						"Tunisia",
						"Turkey",
						"Turkmenistan",
						"Tuvalu",
						"Uganda",
						"Ukraine",
						"United Arab Emirates",
						"United Kingdom",
						"Uruguay",
						"Uzbekistan",
						"Vanuatu",
						"Vatican City",
						"Venezuela",
						"Vietnam",
						"Yemen",
						"Zambia",
						"Zimbabwe"
					);

			foreach (  $countries as $country ) {
				xprofile_insert_field( array(
											'field_group_id'	=> 1,
											'parent_id'		=> $country_list_id,
											'type'			=> 'option',
											'name'			=> $country,
											'option_order'   	=> $i++
										));

			}

		}
	}
}
add_action('bp_init', 'bp_add_custom_country_list');


// added by KH
function bp_add_custom_items_list() {

	if ( !xprofile_get_field_id_from_name('Interested items') && 'bp-profile-setup' == $_GET['page'] ) {

		$items_list_args = array(
						'field_group_id'  => 1,
						'name'            => 'Interested items',
						'can_delete'      => true,
						'field_order' 	 => 2,
						'is_required'     => false,
						'type'            => 'checkbox',
						'order_by'	 => 'custom'
						);

		$items_list_id = xprofile_insert_field( $items_list_args );

		if ( $items_list_id ) {

			$items = getArrInterestedItems();

			foreach (  $items as $item ) {
				xprofile_insert_field( array(
											'field_group_id'	=> 1,
											'parent_id'		=> $items_list_id,
											'type'			=> 'option',
											'name'			=> $item,
											'option_order'   	=> $i++
										));

			}

		}
	}
}
add_action('bp_init', 'bp_add_custom_items_list');


// added by KH
function bp_add_custom_interests_list() {

	if ( !xprofile_get_field_id_from_name('Interests') && 'bp-profile-setup' == $_GET['page'] ) {

		$interests_list_args = array(
							'field_group_id'  => 1,
							'name'            => 'Interests',
							'can_delete'      => true,
							'field_order' 	 => 2,
							'is_required'     => false,
							'type'            => 'checkbox',
							'order_by'	 => 'custom'
						);

		$interests_list_id = xprofile_insert_field( $interests_list_args );

		if ( $interests_list_id ) {

			$interests = getArrInterests();

			foreach (  $interests as $interest ) {
				xprofile_insert_field( array(
											'field_group_id'	=> 1,
											'parent_id'		=> $interests_list_id,
											'type'			=> 'option',
											'name'			=> $interest,
											'option_order'   	=> $i++
										));

			}
		}
	}
}
add_action('bp_init', 'bp_add_custom_interests_list');

?>
