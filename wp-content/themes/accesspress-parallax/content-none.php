<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package accesspress_parallax
 */
?>

<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title"><?php _e( 'Nothing Found', 'accesspress-parallax' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'accesspress-parallax' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p>
			<?php 
			// edit by KH
			//_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'accesspress-parallax' ); 
			$argStr = $_GET["s"];

			?>
				<h1 style="margin-top:40px"> Your search - <b><?php echo $argStr; ?></b> - did not match any items.</h1>
				<h3 style="margin-top:1em">Suggestion:</h3>
				<h4>
				<ul style="margin-left:1.3em;margin-bottom:2em">
					<li>-Make sure that all words are spelled correctly.</li>
					<li>-Try different keywords.</li>
					<li>-Try more general keywords.</li>
				</ul>
				</h4>
			</p>

			<?php 
			// edit by KH	
			//get_search_form(); 
			bbp_get_template_part( 'form', 'search-to-items' );
			?>

		<?php else : ?>

			<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'accesspress-parallax' ); ?></p>
			<?php get_search_form(); ?>

		<?php endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
