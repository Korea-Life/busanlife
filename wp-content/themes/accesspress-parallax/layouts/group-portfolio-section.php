<?php
/**
 * The template for displaying all Parallax Templates.
 *
 * @package accesspress_parallax
 */
?>

	<div class="portfolio-listing clearfix">
	<?php 


		/*
			blog-section.php를 참고해서, query를 적용해야할 것으로 보인다. 
			근데 buddypress는 어떤 식으로 적용을 시켜야할런지 알 수가 없다.
			참고하도록
		*/


		if ( bp_has_groups() ) :
			 while ( bp_groups() ) : bp_the_group(); 
		?>

		<a href="<?php bp_group_permalink(); ?>" class="portfolio-list wow fadeInUp" data-wow-delay="<?php echo $i; ?>s">
		<div class="portfolio-overlay"><span>+</span></div>
			<div class="portfolio-image">
			<?php if(bp_get_group_has_avatar()) : 
			//$image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'portfolio-thumbnail'); 
			$image = bp_get_group_avatar('type=full&width=280&height=225'); 
			echo $image;
			
			?>
			<!--
				<img src="<?php echo esc_url($image[0]); ?>" alt="<?php bp_group_name(); ?>">
			-->
			<?php else: ?>
				<img src="<?php echo get_template_directory_uri(); ?>/images/no-image.jpg" alt="<?php bp_group_name(); ?>">
			<?php endif; ?>
			</div>
			<h3><?php bp_group_name(); ?></h3>
		</a>

		<?php
			endwhile;
			wp_reset_postdata();
		endif;
	?>
	</div><!-- #primary -->

	<!-- added by KH -->
	<div class="clearfix btn-wrap">
	<a class="btn" href="<?php site_url() ?>/wordpress/groups"><?php _e('Read All'    ,'accesspress-parallax'); ?></a>   
	</div>



