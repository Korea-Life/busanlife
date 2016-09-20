<?php

/**
 * User Lost Password Form
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

<form method="post" action="<?php bbp_wp_login_action( array( 'action' => 'lostpassword', 'context' => 'login_post' ) ); ?>" class="bbp-login-form">
	<fieldset class="bbp-form">
		<legend><?php _e( 'Lost Password', 'bbpress' ); ?></legend>


		<?php
			// added by KH
			$msg = NULL;
			if($_GET["status"] == "empty") $msg = "Please input username or email";
			else if($_GET["status"] == "failed_username") 
				$msg = "Your username is not found, Try again!";
			else if($_GET["status"] == "failed_email") 
				$msg = "Your email is not found, Try again!";

			if($msg != NULL){
		?>
			<div class="joinus-login-error"><?php echo $msg; ?></div>
		<?php
			}
		?>

		<div class="bbp-username">
			<p>
				<label for="user_login" class="hide"><?php _e( 'Username or Email', 'bbpress' ); ?>: </label>
				<input type="text" name="user_login" value="" size="20" id="user_login" tabindex="<?php bbp_tab_index(); ?>" />
			</p>
		</div>

		<?php do_action( 'login_form', 'resetpass' ); ?>

		<div class="bbp-submit-wrapper">

			<button type="submit" tabindex="<?php bbp_tab_index(); ?>" name="user-submit" class="button submit user-submit"><?php _e( 'Reset My Password', 'bbpress' ); ?></button>

			<?php bbp_user_lost_pass_fields(); ?>

		</div>
	</fieldset>
</form>
