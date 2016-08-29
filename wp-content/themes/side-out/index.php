<?php 
/* index main and fallback file. for blog if site set to static.
 * @sideout
 */
get_header(); ?>
			    <div class="row" role="main">
				<section class="c8">
                                    <?php get_template_part( 'content', 'count' ); ?>
                                        <nav id="navigation">
                                            <?php sideout_numeric_posts_nav(); ?>
                                        </nav>
				</section>
				    <section class="c4 end" id="right-side">
                                        <?php get_sidebar(); ?>
				    </section>
			    </div><!-- .row -->
            </div><!-- .site-content +grid -->
        </section><!-- .site-container -->
            <?php get_footer(); ?>