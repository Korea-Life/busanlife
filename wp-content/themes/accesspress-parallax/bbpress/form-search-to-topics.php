<?php

/**
 * send query to topics
 * made by KH
 *
 */

?>
<form role="search" method="get" id="searchform" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
	<div>
		<label class="screen-reader-text hidden" for="bbp_search"><?php _e( 'Search for:', 'bbpress' ); ?></label>
		<input class="input" type="text" placeholder="Search Topic..." style="color:#404040; background:#fafafa" value="<?php echo $_GET["s_keyword"]; ?>" name="s_keyword" id="s_keyword" />
		<input class="button" type="submit" id="bbp_search_submit" value="<?php esc_attr_e( 'Search', 'bbpress' ); ?>" />
	</div>
</form>
