<?php

/**
 * Topics Loop
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

<?php do_action( 'bbp_template_before_topics_loop' ); ?>

<?php


	// added by KH

	$argStr = $_GET["s_keyword"];

	if(bbp_has_topics(array('post_parent' => 6,'s' => $argStr))):

?>

<ul id="bbp-forum-<?php bbp_forum_id(); ?>" class="bbp-topics">

	<li class="bbp-header">

		<ul class="forum-titles">
			<li class="bbp-topic-title"><?php _e( 'Topic', 'bbpress' ); ?></li>
			<li class="bbp-topic-voice-count"><?php _e( 'Voices', 'bbpress' ); ?></li>
			<li class="bbp-topic-reply-count"><?php bbp_show_lead_topic() ? _e( 'Replies', 'bbpress' ) : _e( 'Posts', 'bbpress' ); ?></li>
			<li class="bbp-topic-freshness"><?php _e( 'Freshness', 'bbpress' ); ?></li>
		</ul>

	</li>

	


	<li class="bbp-body">

		<?php while ( bbp_topics() ) : bbp_the_topic(); ?>

			<?php bbp_get_template_part( 'loop', 'single-topic' ); ?>

		<?php endwhile; ?>

	</li>

	<li class="bbp-footer">

		<div class="tr">
			<p>
				<span class="td colspan<?php echo ( bbp_is_user_home() && ( bbp_is_favorites() || bbp_is_subscriptions() ) ) ? '5' : '4'; ?>">&nbsp;</span>
			</p>
		</div><!-- .tr -->

	</li>

</ul><!-- #bbp-forum-<?php bbp_forum_id(); ?> -->

<?php
	// added by KH
	else :
?>

		
		<h1 style="margin-top:40px"> Your search - <b><?php echo $argStr; ?></b> - did not match any topics.</h1>	
		<h3 style="margin-top:1em">Suggestion:</h3>
		<h4>
		<ul style="margin-left:1.3em;margin-bottom:2em">
			<li>-Make sure that all words are spelled correctly.</li>
			<li>-Try different keywords.</li>
			<li>-Try more general keywords.</li>
		</ul>
		</h4>
			
<?php
	endif;
?>

<?php do_action( 'bbp_template_after_topics_loop' ); ?>
