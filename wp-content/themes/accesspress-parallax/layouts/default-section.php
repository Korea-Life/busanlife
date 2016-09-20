<?php
/**
 * The template for displaying all Parallax Templates.
 *
 * @package accesspress_parallax
 */
?>

	<div class="content-area">

	<?php 
	
		// added by KH
		$content = get_the_content();
		$content = '<div>'.$content.'</div>';
		echo do_shortcode($content);

	?>

	</div><!-- #primary -->



