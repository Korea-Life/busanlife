<?php
/**
 * The template for displaying Full Width pages.
 *
 * Template Name: Full Width
 *
 * @package accesspress_parallax
 */


get_header(); ?>

<?php 
if(of_get_option('enable_parallax') == 1 && is_front_page() && get_option( 'show_on_front' ) == 'page'){
	get_template_part('index','parallax');
}else{
?>

<div class="mid-content clearfix">
	<div id="primary" class="content-area full-width"> <!-- add by KH -->
		<main id="main" class="site-main" role="main">

			<?php 
			global $page;
			if(of_get_option('enable_parallax') == 0 || is_singular()): ?>

				<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // end of the loop. ?>
			<?php else:

 			echo wpautop($page->post_content); 
			
			endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php 
// edit by KH
// get_sidebar(); 
?>
</div>
<?php } ?>

<?php get_footer(); ?>

