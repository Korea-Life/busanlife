<?php
/**
 * The template for displaying all Parallax Templates.
 *
 * @package accesspress_parallax
 */
?>

	<div class="content-area blank-section">

	<?php 
		$content = get_the_content();
		// do your transformation here
		$content = '<div>'.$content.'</div>';
		echo do_shortcode($content);
		//echo do_shortcode('[ufbl form_id="1"]');
	/*
		$post = get_post(get_queried_object_id());
		$testimonial_items = $post->content ;
		$testimonial_items = apply_filters('the_content', $content);
		*/
	?>

	</div><!-- #primary -->



