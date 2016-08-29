<?php
/**
 * Added by KH
 * @package accesspress_parallax
 */
?>

	<div class="testimonial-listing clearfix wow fadeInUp">
	<?php 
		$bbp_loop_args = array(
		     'order' => 'DESC',		
		     //'orderby' => 'date',
		     //'orderby' => 'voices',
		     'orderby' => 'meta_value',
			 //'meta_key' => '_bbp_voice_count',
			 'meta_key' => '_bbp_last_active_time',
			 'post_parent' => 163,
			 'posts_per_page' => 5,
	     );
		if ( bbp_has_topics( $bbp_loop_args ) ) :

		?>
		<div class="testimonial-slider">
		<?php
		    while ( bbp_topics() ) : bbp_the_topic();
			//while($query->have_posts()): $query->the_post();
		?>

		<div class="testimonial-list">
		<div class="testimonial-content">
		<?php 
			$content = bbp_get_topic_excerpt(bbp_get_topic_id(), 100);

			echo $content;
		?></div>
		<h3><a href="<?php echo bbp_get_topic_permalink(); // added by KH ?>">
		<?php 
			$title = bbp_get_topic_title();
			$title = get_the_str_limit($title, 50);

			echo $title;
 		?></a></h3>
		</div>
		<?php
			endwhile;
			wp_reset_postdata();
		?>
		</div>
		<?php
		endif;
	?>
	</div>
	<!-- added by KH -->
	<div class="clearfix btn-wrap">
	<a class="btn" href="<?php echo bbp_get_forum_permalink(192); ?>"><?php _e('Read All'    ,'accesspress-parallax'); ?></a>	
	</div>
	<!-- #primary -->


