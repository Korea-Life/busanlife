<?php
/**
 * The template for displaying search results pages.
 *
 * @package accesspress_parallax
 */

get_header(); ?>
<div class="mid-content">
	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'accesspress-parallax' ), '<span>' . get_search_query() . '</span>' ); ?></h1>

				<?php
				// added by KH
				bbp_get_template_part( 'form', 'search-to-items' );
				?>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				// edit by KH
				//get_template_part( 'content', 'search' );
				get_template_part( 'content', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php 
				// edit by KH
				//accesspress_parallax_paging_nav(); 
				pgntn_display_pagination( 'posts' );
			?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
