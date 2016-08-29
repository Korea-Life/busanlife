<?php
/*
 * comments.php
 * @sideout
 */
    if ( post_password_required() )
        return;
?>
        <section id="comments">
        <?php if ( have_comments() ) : ?>
            <h2 class="comments-title"><?php get_the_title() ?></h2>
                <ol class="commentlist">
                    <?php wp_list_comments(); ?>
                </ol><!-- ends commentlist -->
                <!-- <div class="pagination">
                  <div class="alignleft"><?php previous_comments_link() ?></div>
                  <div class="alignright"><?php next_comments_link() ?></div>
                </div> -->

        <?php else : // this is displayed if there are no comments so far ?>
	    <?php if ( comments_open() ) : ?>
            <?php // translation location for Reply button: h3#reply-title.comment-reply-title:before in stylesheet ?>       
		<small><?php _e( 'No Comments yet, be the first to reply', 'sideout' ); ?></small>
            <?php else : // then this if comments are closed ?>
	        <small><?php _e( 'Comments are Closed on this Post', 'sideout' ); ?></small>
	    <?php endif;
        endif; // end have_comments() ?>
          
                        <?php comment_form(); ?>
                    </span><br /><hr>
    </section><!-- ends comments area -->