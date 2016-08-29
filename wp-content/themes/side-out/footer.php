<div class="breaker"></div>
    <footer class="site-footer">
        <div class="grid">		
            <section class="row">
                <div class="c4"> 
<div class="social-widget-area"><h3 class="widget-title"><?php _e( 'Our Social Networks', 'sideout' ); ?></h3>
                    <?php $options = get_option( 'sideout_theme_options' ); ?>
                    <ul id="social-block"> 
<?php if (isset ($options['phonenumber']) && ! empty($options['phonenumber'])) { ?>
                    <li><img src="<?php echo get_template_directory_uri() . '/images/phone.png'; ?>" alt="phone" /> <?php echo esc_attr( $options['phonenumber'] ); ?></li><?php } else { echo "<li></li>"; } ?>

<?php if (isset ($options['facebookurl']) && ! empty ($options['facebookurl']) ) { ?>
                    <li><img src="<?php echo get_template_directory_uri() . '/images/facebook.png'; ?>" alt="facebook" /> <a href="https://<?php echo esc_url( $options['facebookurl'] ); ?>" target="_blank"><?php echo esc_url( $options['facebookurl'] ); ?></a></li><?php } else { echo "<li></li>"; } ?>

<?php if (isset ($options['twitterurl']) && ! empty ($options['twitterurl']) ) { ?>
                    <li><img src="<?php echo get_template_directory_uri() . '/images/twitter.png'; ?>" alt="twitter" /> <a href="http://twitter.com/<?php echo esc_url( $options['twitterurl'] ); ?>" target="_blank"><?php echo esc_url( $options['twitterurl'] ); ?></a></li><?php } else { echo "<li></li>"; } ?>

<?php if (isset ($options['googleurl']) && ! empty ($options['googleurl']) ) { ?>
                    <li><img src="<?php echo get_template_directory_uri() . '/images/google_plus.png'; ?>" alt="gplus" /> <a href="https://<?php echo esc_url( $options['googleurl'] ); ?>" target="_blank"><?php echo esc_url( $options['googleurl'] ); ?></a></li><?php } else { echo "<li></li>"; } ?>
                    </ul>
</div>
			    </div>
			        <div class="c4">
                    <?php if (is_active_sidebar('footer-second')) : ?>
                        <div id="second" class="widget-area">
                            <ul class="sideout-list">
                            <?php dynamic_sidebar('footer-second'); ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    </div>
			            <div class="c4"> 
                        <?php if (is_active_sidebar('footer-third')) : ?>
                            <div id="third" class="widget-area">
                                <ul class="sideout-list">
                                <?php dynamic_sidebar('footer-third'); ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                    </div>
            </section>
                <section class="row">
                    <div class="c8" id="credits">
                        <?php $options = get_option( 'sideout_theme_options' ); ?> 
                        <?php if( !isset( $options['sideout_credits'] ) ) { ?>
                        <?php do_action( 'sideout_footer_credits' ); ?>
                        <?php } else { ?><?php echo '<span>' . $options['sideout_new_text'] . '</span>'; ?>
                        <?php } ?>
                    </div>
                        <div class="c3 copyright">
                            <h5><?php _e('Copyright', 'sideout'); ?> &copy; <?php echo date("Y") ?> <a href="<?php esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a>
	                    </h5>
                        </div>
                                <nav class="c1 top-button">
                                    <a href="#" title="Top of Page">&#8679;</a>
                                </nav>
                </section>
        </div><!-- ends grid for footer -->
            <?php wp_footer(); ?>
    </footer>
</body>
</html>
