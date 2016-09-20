<?php
/**
 * The template for displaying Full Width pages.
 *
 * Template Name: Buy & Sell category
 *
 * @package accesspress_parallax
 */

get_header(); ?>
<div class="mid-content clearfix">
	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<header class="page-header">
				<h1 class="page-title">
				<a href="<?php site_url(); ?>/buy-sell/" class="no-link-color">
				<?php
					the_title();
				?>
				</a>

				<?php 

			

				//if(current_user_can('publish_posts')){
				if(1){//current_user_can('publish_posts')){
				?>
					<a href="<?php site_url(); ?>/create-a-new-item/" class="btn-responsive-by-kh">Add New</a>

					<!-- 
					<a href="http://localhost/show-items-list/" class="btn-responsive-by-kh">Show List</a>
					-->
				</h1>

				<?php 
					// added by KH
					bbp_get_template_part( 'form', 'search-to-items' ); 
				?>
					
					<div class="item-list-tabs">
						<ul>
						<!--
							<li id="list_new"><a href="http://localhost/wordpress/create-new-post/">Create A New Post </a></li>
						-->
							<li id="list_new"><a class="group-create no-ajax" href="<?php site_url(); ?>/create-a-new-item/">Create a New Item</a></li>
							<!--
							<li id="list_show"><a class="group-create no-ajax" href="http://localhost/show-items-list/">Show Items List</a></li>
							-->
						</ul>
					</div>
				
				<?php
				}
					// Show an optional term description.
					$term_description = term_description();
					if ( ! empty( $term_description ) ) :
						printf( '<div class="taxonomy-description">%s</div>', $term_description );
					endif;
				?>
			</header><!-- .page-header -->
			
		
			<?php /* Start the Loop */ ?>
			<?php

			$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;

			$query = array(
							'post_type' => 'post',
							'cat' => 5, 
							'category_name' => 'buy-sell',
							'paged' => $paged,
							'posts_per_page' => 10 );

			query_posts($query);

			?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php 
				// edit by KH
				//accesspress_parallax_paging_nav(); 
				pgntn_display_pagination( 'posts' );
			?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>

