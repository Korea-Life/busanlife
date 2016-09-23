<?php
/**
 * accesspress_parallax functions and definitions
 *
 * @package accesspress_parallax
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'accesspress_parallax_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function accesspress_parallax_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on accesspress_parallax, use a find and replace
	 * to change 'accesspress_parallax' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'accesspress-parallax', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/**
	 * Add callback for custom TinyMCE editor stylesheets. (editor-style.css)
	 * @see http://codex.wordpress.org/Function_Reference/add_editor_style
	 */
	add_editor_style('css/editor-style.css');

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'blog-header', 900, 300, array('center','center')); //blog Image
	add_image_size( 'portfolio-thumbnail', 560, 450, array('center','center')); //Portfolio Image
    add_image_size( 'blog-thumbnail', 480, 300, array('center','center')); //Blog Image	
	add_image_size( 'team-thumbnail', 380, 380, array('top','center')); //Portfolio Image

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'accesspress-parallax' ),
	) );
	
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	//add_theme_support( 'post-formats', array(
	//	'aside', 'image', 'video', 'quote', 'link'
	//) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'accesspress_parallax_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // accesspress_parallax_setup
add_action( 'after_setup_theme', 'accesspress_parallax_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function accesspress_parallax_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'accesspress-parallax' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer One', 'accesspress-parallax' ),
		'id'            => 'footer-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Two', 'accesspress-parallax' ),
		'id'            => 'footer-2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Three', 'accesspress-parallax' ),
		'id'            => 'footer-3',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Four', 'accesspress-parallax' ),
		'id'            => 'footer-4',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'accesspress_parallax_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function accesspress_parallax_scripts() {
	$query_args = array(
		'family' => 'Roboto:400,300,500,700|Oxygen:400,300,700',
	);
	wp_enqueue_style( 'accesspress-parallax-google-fonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ) );
	wp_enqueue_style( 'accesspress-parallax-font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css' );
	wp_enqueue_style( 'accesspress-parallax-bx-slider', get_template_directory_uri() . '/css/jquery.bxslider.css' );
	wp_enqueue_style( 'accesspress-parallax-nivo-lightbox', get_template_directory_uri() . '/css/nivo-lightbox.css' );
	wp_enqueue_style( 'accesspress-parallax-animate', get_template_directory_uri() . '/css/animate.css' );
	wp_enqueue_style( 'accesspress-parallax-style', get_stylesheet_uri() );
	if(of_get_option('enable_responsive') == 1) :
		wp_enqueue_style( 'accesspress-parallax-responsive', get_template_directory_uri() . '/css/responsive.css' );
	endif;
	
	if (of_get_option('enable_animation') == '1' && is_front_page()) :
        wp_enqueue_script('accesspress-parallax-wow', get_template_directory_uri() . '/js/wow.js', array('jquery'), '1.0', true);
    endif;

	wp_enqueue_script( 'accesspress-parallax-smoothscroll', get_template_directory_uri() . '/js/SmoothScroll.js', array('jquery'), '1.2.1', true );
    wp_enqueue_script( 'accesspress-parallax-parallax', get_template_directory_uri() . '/js/parallax.js', array('jquery'), '1.1.3', true );
	wp_enqueue_script( 'accesspress-parallax-ScrollTo', get_template_directory_uri() . '/js/jquery.scrollTo.min.js', array('jquery'), '1.4.14', true );
	wp_enqueue_script( 'accesspress-parallax-local-scroll', get_template_directory_uri() . '/js/jquery.localScroll.min.js', array('jquery'), '1.3.5', true );
	wp_enqueue_script( 'accesspress-parallax-parallax-nav', get_template_directory_uri() . '/js/jquery.nav.js', array('jquery'), '2.2.0', true );
	wp_enqueue_script( 'accesspress-parallax-bx_slider', get_template_directory_uri() . '/js/jquery.bxslider.min.js', array('jquery'), '4.2.1', true );
	wp_enqueue_script( 'accesspress-parallax-easing', get_template_directory_uri() . '/js/jquery.easing.min.js', array('jquery'), '1.3', true );
	wp_enqueue_script( 'accesspress-parallax-fit-vid', get_template_directory_uri() . '/js/jquery.fitvids.js', array('jquery'), '1.0', true );
	wp_enqueue_script( 'accesspress-parallax-actual', get_template_directory_uri() . '/js/jquery.actual.min.js', array('jquery'), '1.0.16', true );
	wp_enqueue_script( 'accesspress-parallax-nivo-lightbox', get_template_directory_uri() . '/js/nivo-lightbox.min.js', array('jquery'), '1.2.0', true );
	wp_enqueue_script( 'accesspress-parallax-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	wp_enqueue_script( 'accesspress-parallax-custom', get_template_directory_uri() . '/js/custom.js', array('jquery'), '1.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'accesspress_parallax_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/accesspress-header.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/accesspress-functions.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/kh-accesspress-functions.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load Plugin installation file.
 */
require get_template_directory() . '/inc/accesspress-plugin-activation.php';

/**
 * Load Theme Option Frame work files
 */
require get_template_directory() . '/inc/options-framework/options-framework.php';

/**
 * Load More Theme Page
 */
require get_template_directory() . '/inc/more-themes.php';

define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/options-framework/' );

function accesspress_ajax_script()
{
	 wp_localize_script( 'ajax_script_function', 'ajax_script', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )) );
     wp_enqueue_script( 'ajax_script_function', get_template_directory_uri().'/inc/options-framework/js/ajax.js', 'jquery', true);

}
add_action('admin_enqueue_scripts', 'accesspress_ajax_script');

function accesspress_parallax_get_my_option()
{
	require get_template_directory() . '/inc/ajax.php';
	die();
}

add_action("wp_ajax_get_my_option", "accesspress_parallax_get_my_option");

// added by KH below
function no_edit_lock($retval, $cur_time, $lock_time, $post_date_gmt){
		return false;
}
add_filter( 'bbp_past_edit_lock', 'no_edit_lock', 1, 4);

add_filter( 'show_admin_bar', '__return_false' );

// Simple Comment Editing
add_filter( 'sce_comment_time', 'edit_sce_comment_time' );
function edit_sce_comment_time( $time_in_minutes ) {
	return 60;
}


function MyAjaxFunctionDeletePost(){

	if(isset($_REQUEST)){
		$postId = $_REQUEST['postData'];
		$n = wp_trash_post($postId);
	}
	die();
}
add_action('wp_ajax_nopriv_MyAjaxFunctionDeletePost', 'MyAjaxFunctionDeletePost');
add_action('wp_ajax_MyAjaxFunctionDeletePost', 'MyAjaxFunctionDeletePost');


// added by KH
add_filter( 'body_class', 'joinus_body_class' );
function joinus_body_class( $classes ) {
	if ( is_page( 'login' ) || is_page( 'register' ) || is_page ('lost-password') ){
		$classes[] = 'addedbykh';
		$classes[] = 'joinus';
	}

	return $classes;
}

// redirect front page for logged in visitors





// something is wrong.





function redirect_front_page_for_loggedin_users() {
	global $bp;
	// redirect only when user is logged in and we are viewing the front page as set in WP admin
	if ( is_user_logged_in() && ( is_front_page() ) ) {
		//wp_redirect( $bp->loggedin_user->domain );
		//exit();
	}
}
add_action( 'wp', 'redirect_front_page_for_loggedin_users' );


// BuddyPress

// add pagination links to the bottom of the groups directory
function add_bottom_group_pagination_links() {

		?>

		<div class="pagination" style="margin-top:5px;">

			<div class="pag-count" id="group-dir-count">

			<?php bp_groups_pagination_count() ?>

			</div>

			<div class="pagination-links" id="group-dir-pag">

			<?php bp_groups_pagination_links() ?>

			</div>

		</div>

		<?php

}

add_action( 'bp_after_groups_loop', 'add_bottom_group_pagination_links' );


// define the bp_before_member_body callback 
function action_bp_before_member_body() { 
		// make action magic happen here... 
	echo '<hr>';
} 

// add the action 
add_action( 'bp_before_member_body', 'action_bp_before_member_body', 10, 0 ); 
add_action( 'bp_before_group_body', 'action_bp_before_member_body', 10, 0 ); 

function action_bp_after_member_body() { 
		// make action magic happen here... 
//	echo '<hr>';
} 

// add the action 
add_action( 'bp_after_member_body', 'action_bp_after_member_body', 10, 0 ); 


function action_bp_before_profile_content() { 
		// make action magic happen here... 
//	echo '<hr>';
} 

// add the action 
add_action( 'bp_before_profile_content', 'action_bp_before_profile_content', 10, 0 ); 


function action_bp_before_signup_profile_fields(){
	echo '<div class="detail-toggle-link-container">';
	echo 	'<h3>Enjoy <b>BUSAN LIFE</b></h3> <h4>with powerful mailing services!</h4>';
	echo 	'<br>';
	echo 	'A few more extra fields make you use BUSAN LIFE more effectivly';
	echo 	'<br><br>';
	echo 	'<a class="detail-visibility-toggle-link" href="#">Click to confirm</a>';
	echo '</div>';
	echo '<div class="detail-container">';
}

add_action( 'bp_before_signup_profile_fields', 'action_bp_before_signup_profile_fields' );

function action_bp_after_signup_profile_fields(){
	echo '</div>';
}

add_action( 'bp_after_signup_profile_fields', 'action_bp_after_signup_profile_fields' );


// Join US bbpress

function joinus_login_redirect($redirect_to){
	//$return_url = get_site_url();
	//if(!is_user_logged_in()) $return_url = "http://www.naver.com";

	$return_url = "http://www.busan-life.com";

  	return $return_url;
}
add_filter("bbp_user_login_redirect_to", "joinus_login_redirect");

if( ! function_exists( 'custom_login_fail' ) ) {
	function custom_login_fail( $username ) {
	    //$referrer = $_SERVER['HTTP_REFERER']; // where did the post submission come from?
	    $referrer = "http://www.busan-life.com/login/"
	    // if there's a valid referrer, and it's not the default log-in screen
	    if ( !empty($referrer) && !strstr($referrer,'wp-login') && !strstr($referrer,'wp-admin') ) {
	    	if ( !strstr($referrer,'?login=failed') ) { // make sure we don’t append twice
	    	    wp_redirect( $referrer . '?login=failed' ); // append some information (login=failed) to the URL for the theme to use
	    	} else {
	    	    wp_redirect( $referrer );
	    	}
	    	exit;
	    }
	}
}
add_action( 'wp_login_failed', 'custom_login_fail' ); // hook failed login

if( ! function_exists( 'custom_login_empty' ) ) {
	function custom_login_empty(){
	    //$referrer = $_SERVER['HTTP_REFERER'];
	    $referrer = "http://www.busan-life.com/login/"

	    $id = $_POST["log"];
	    $pwd = $_POST["pwd"];

	    if ( strstr($referrer,get_home_url()) && $user==null ) { // mylogin is the name of the loginpage.
	    	if ( !strstr($referrer,'?login=empty') ) { // prevent appending twice

	    		if($id==NULL) $status = "&status=NO_ID";
	    		else if($pwd==NULL) $status = "&status=NO_PWD";

	    	    wp_redirect( $referrer . '?login=empty' . $status);

	    	} else {
	    	    wp_redirect( $referrer );
	    	}
	    }
	}
}
add_action( 'authenticate', 'custom_login_empty');

if( ! function_exists( 'custom_lostpassword_emptyfailed' ) ) {
	function custom_lostpassword_emptyfailed(){
	//	$referrer = $_SERVER['HTTP_REFERER'];
		$referrer = "http://www.busan-life.com/login/"

		$user_data = '';

		if ( !empty( $_POST['user_login'] ) ) {
	    	if ( strpos( $_POST['user_login'], '@' ) ) {
	        	$user_data = get_user_by( 'email', trim($_POST['user_login']) );
				$status = "?status=failed_email";
	    	} else {
	        	$user_data = get_user_by( 'login', trim($_POST['user_login']) );
				$status = "?status=failed_username";
	    	}
		} else {
			$status = "?status=empty";
		}

		if ( empty($user_data) ) {
	    	wp_redirect( $referrer . $status );
	    	exit;
		}
	}
}
add_action( 'lostpassword_post', 'custom_lostpassword_emptyfailed');

function getArrInterestedItems(){
	return array(
	        "Collectibles and art",
	        "Electronics",
	        "Fashion",
	        "Home and garden",
	        "Motors",
	        "Musical instruments and gear",
	        "Sporting goods",
	        "Studying and researching",
	        "Toys and hobbies"
	        );  
}

function getArrInterestedGroups(){
	return array(
	        "Local Business or Place",
	        "Company, Organization or Institution",
	        "Brand or Product",
	        "Artist, Band or Public Figure",
	        "Entertainment"
	        );  
}

function get_user_emails_by_wpdb( $field_id, $value ) {

	global $wpdb;

	$user_emails = $wpdb->get_col(
	        $wpdb->prepare(
	            "
	            SELECT user_email 
	            FROM {$wpdb->prefix}bp_xprofile_data
	            JOIN {$wpdb->prefix}users
	            ON {$wpdb->prefix}bp_xprofile_data.user_id={$wpdb->prefix}users.id
	            WHERE user_id
	            IN (
	            	SELECT user_id
	            	FROM {$wpdb->prefix}bp_xprofile_data
	            	WHERE field_id=406
	            	AND value='Yes'
	            	)
	            AND field_id=%d 
	            AND value LIKE '%%%s%%'
	            "
	            , $field_id, $value
	            )
	        );
	
	return $user_emails;
}

add_action( 'init', 'bpdev_set_email_notifications_preference' );
function bpdev_set_email_notifications_preference( ) {
	if ( is_user_logged_in() ) {
		$user_id = get_current_user_id();
		//I am putting all the notifications to no by default
		//you can set the value to 'yes' if you want that notification to be enabled.
		$settings_keys = array(
				'notification_activity_new_mention'        => 'no',
				'notification_activity_new_reply'          => 'no',
				'notification_friends_friendship_request'  => 'no',
				'notification_friends_friendship_accepted' => 'no',
				'notification_groups_invite'               => 'no',
				'notification_groups_group_updated'        => 'no',
				'notification_groups_admin_promotion'      => 'no',
				'notification_groups_membership_request'   => 'no',
				'notification_messages_new_message'        => 'no',
				);

		foreach ( $settings_keys as $setting => $preference ) {

			bp_update_user_meta( $user_id, $setting, $preference );
		}
	}
}

function my_files_only( $wp_query ) {
//	if ( strpos( $_SERVER[ 'REQUEST_URI' ], '/wp-admin/upload.php' ) !== false ) {

	if ($wp_query->query_vars['post_type']=="attachment"){
	    if ( !current_user_can( 'level_5' ) ) {
	    	global $current_user;
	    	$wp_query->set( 'author', $current_user->id );
	    }
	}
}
add_filter('parse_query', 'my_files_only' );
