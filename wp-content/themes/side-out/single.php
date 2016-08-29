<?php
/* single post template 
 * @sideout 
 * @since v0.1 
 */ 
get_header(); ?>
			    <div class="row">
				    <article class="c8">
                        <?php get_template_part( 'content' ); ?>
                            <br class="clearfix">
                                <?php comments_template(); ?>
				    </article>
				        <article class="c4 end" id="right-side">
                                            <?php get_sidebar(); ?>
				        </article>
			    </div>
            </div>	<!-- ends site-content @grid -->
        </section>  <!-- ends site-container -->
            <?php get_footer(); ?>