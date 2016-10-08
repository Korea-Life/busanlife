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

	$post_parent = 6;

	$arr_body_class = get_body_class();
	$index = array_search('forum', $arr_body_class);

	$user_id = get_current_user_id();
	$group_id = bp_get_group_id();

	if($index>0 && ( groups_is_user_mod($user_id,$group_id)
     			|| groups_is_user_admin($user_id,$group_id) )){

    	$post_parent = get_the_ID();
?>
     	<!-- added by KH -->
     	<?php bbp_get_template_part( 'form', 'search-to-topics' ); ?>

     	<div class="item-list-tabs">
     		<ul>
     			<li id="topic_new">
     				<form id="topic-form" method="post" action="<?php site_url(); ?>/wordpress/create-a-new-topic">
     				<input type="hidden" name="ForumId" value="<?php echo $post_parent; ?>" /> 
     				<a class="group-create no-ajax" onclick="document.getElementById('topic-form').submit();">Create a New Topic</a>
     				</form>
     			</li>
     		</ul>
     	</div>
<?php
	}

	if(bbp_has_topics(array('post_parent' => $post_parent,'s' => $argStr))):
//	if(bbp_has_topics(array('post_parent' => get_the_ID(),'s' => $argStr))):
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
