<?php

/**
 * User Login Form
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

<form method="post" action="<?php bbp_wp_login_action( array( 'context' => 'login_post' ) ); ?>" class="bbp-login-form">
	<fieldset class="bbp-form">
		<legend><?php _e( 'Log In', 'bbpress' ); ?></legend>

		<!-- added by KH -->
		<p><br>

		<!-- added by KH -->
		<?php if($_GET["login"] == "empty" && $_GET["status"] == "NO_ID" ) { ?>
		<div class="joinus-login-error">Please enter a Username</div>
		<?php } ?>
		
		<!-- added by KH -->
		<?php if($_GET["login"] == "failed") { ?>
		<div class="joinus-login-error">Please check your username and password</div>
		<?php } ?>
		
		<div class="bbp-username">
			<label for="user_login"><?php _e( 'Username', 'bbpress' ); ?>: </label>
			<input type="text" name="log" value="<?php bbp_sanitize_val( 'user_login', 'text' ); ?>" size="20" id="user_login" tabindex="<?php bbp_tab_index(); ?>" />
		</div>

		<!-- added by KH -->
		<p>

		<!-- added by KH -->
		<?php if($_GET["login"] != NULL && $_GET["status"] == "NO_PWD" ) { ?>
		<div class="joinus-login-error">Please enter a Password</div>
		<?php } ?>

		<div class="bbp-password">
			<label for="user_pass"><?php _e( 'Password', 'bbpress' ); ?>: </label>
			<input type="password" name="pwd" value="<?php bbp_sanitize_val( 'user_pass', 'password' ); ?>" size="20" id="user_pass" tabindex="<?php bbp_tab_index(); ?>" />
		</div>

		<!-- added by KH -->
		<p><br>

		<div class="bbp-remember-me">
			<input type="checkbox" name="rememberme" value="forever" <?php checked( bbp_get_sanitize_val( 'rememberme', 'checkbox' ) ); ?> id="rememberme" tabindex="<?php bbp_tab_index(); ?>" />
			<label for="rememberme"><?php _e( 'Keep me signed in', 'bbpress' ); ?></label>
		</div>

		<!-- added by KH -->
		<br>
		<p id="nav">
		<a href="<?php get_site_url(); ?>/wordpress/register">Register</a> | 	<a href="<?php get_site_url(); ?>/wordpress/lost-password" title="Password Lost and Found">Lost your password?</a>
		</p>

		<?php do_action( 'login_form' ); ?>

		<!-- added by KH -->
		<br>

		<div class="bbp-submit-wrapper">

			<button type="submit" tabindex="<?php bbp_tab_index(); ?>" name="user-submit" class="button submit user-submit"><?php _e( 'Log In', 'bbpress' ); ?></button>

			<?php bbp_user_login_fields(); ?>

		</div>
	</fieldset>
	
	<!-- added by KH -->
	<br>
</form>
