<?php 
/* page template 
 * @sideout TSW 
 */
get_header(); ?>
			    <div class="row" role="main">
				    <section class="c8">
                                        <?php get_template_part( 'content' ); ?>
                                            <br class="clearfix">
                                                <?php comments_template(); ?>
                                                    <nav>
                                                        <p class="pagination"><?php previous_post_link( '%link ', ' %title ' ); ?>
                                                        <b> &#8660;</b>
                                                        <?php next_post_link( '%link  ', ' %title ' ); ?> </p>
                                                    </nav>
				    </section>
                                    <!--<nav class="navigation">
                                            <?php sideout_numeric_posts_nav(); //only used for template redesign ?>
                                        </nav>-->
				        <div class="c4 end" id="right-side">
                                            <?php get_sidebar(); ?>
				        </div>
			    </div>
            </div>	<!-- ends site-content @grid -->
        </section>  <!-- ends site-container -->
            <?php get_footer(); ?>