<?php

/**
 * Pagination for pages of topics (when viewing a forum)
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

<?php do_action( 'bbp_template_before_pagination_loop' ); ?>
<?php
	$bbp = bbpress();

	$total_int = (int) !empty( $bbp->topic_query->found_posts ) ? $bbp->topic_query->found_posts : 0;

	// added by KH
	if($total_int) :
?>

<div class="bbp-pagination">
	<div class="bbp-pagination-count">

		<?php bbp_forum_pagination_count(); ?>

	</div>

	<div class="bbp-pagination-links">

		<?php bbp_forum_pagination_links(); ?>

	</div>
</div>

<?php
	endif;
?>

<?php do_action( 'bbp_template_after_pagination_loop' ); ?>
