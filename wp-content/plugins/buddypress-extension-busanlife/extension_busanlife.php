<?php
/**
 * @package extension-busanlife
 */

/*
Plugin Name: Buddypress Extension BusanLife
Plugin URI: http://www.busan-life.co.kr
Description: Extension pack for BusanLife
Version: 1.0
Requires at least: 3.3
Tested up to: 3.3.1
License: GPL3
Author: Kyunghwan Abel Bae
Author URI: http://www.i-generalstore.com
*/


//wrapper function if BP is activated
function bp_group_meta_init() {
	require( dirname( __FILE__ ) . '/group_functions.php' );
}
add_action( 'bp_include', 'bp_group_meta_init' );


function bp_xprofile_meta_init() {
	require( dirname( __FILE__ ) . '/xprofile_functions.php' );
}
add_action( 'bp_include', 'bp_xprofile_meta_init' );
