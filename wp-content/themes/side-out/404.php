<?php 
/* found nothing page
 * @sideout
 */
get_header(); ?>
			    <div class="row" role="main">
				    <article class="c8">
                        <div class="entry-content"> 
                        <h1><?php _e( 'Oops! You may want to try a new search', 'sideout' ); ?></h1>
    <form role="search" method="get" id="searchform" class="searchform" action="<?php esc_url( home_url( '/' ) ); ?>">
	<div>
		<label class="screen-reader-text" for="s"><?php _e( 'Search for: ', 'sideout' ); ?></label>
		<input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" />
		<input type="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'sideout' ); ?>" />
	</div>
    </form>
                        </div>
				    </article>
				        <article class="c4 end" id="right-side">
                                            <?php get_sidebar(); ?>
				        </article>
			    </div>
            </div><!-- ends site-content +grid -->
        </section><!-- ends site-container -->
            <?php get_footer(); ?>