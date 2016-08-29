<?php
/**
 * @package ex-buddy
 */

/*
Plugin Name: Favorite Color
Plugin URI: http://MyWebsite.com
Description: Let Groups Pick their favorite Color
Version: 1.0
Requires at least: 3.3
Tested up to: 3.3.1
License: GPL3
Author: Your Name
Author URI: http://YourCoolWebsite.com
*/

//wrapper function if BP is activated
function bp_group_meta_init() {
	   /*Our Cool Code */
	   require( dirname( __FILE__ ) . '/fav_col_function.php' );
}
add_action( 'bp_include', 'bp_group_meta_init' );
