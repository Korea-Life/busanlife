<?php 
/* category and tags template 
 * @sideout TSW 
 */
get_header(); ?>
			    <div class="row">
				    <article class="c8">
                        <?php get_template_part( 'content', 'excerpt' ); ?>
				    </article>
				        <article class="c4 end" id="right-side">
                            <?php get_sidebar(); ?>
				        </article>
			    </div>
            </div>	<!-- ends site-content @grid -->
        </section>  <!-- ends site-container -->
            <?php get_footer(); ?>
