<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package accesspress_parallax
 */

get_header(); ?>
<div class="mid-content clearfix">

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">
					<?php
						if ( is_category() ) :
							single_cat_title();

						elseif ( is_tag() ) :
							single_tag_title();

						elseif ( is_author() ) :
							printf( __( 'Author: %s', 'accesspress-parallax' ), '<span class="vcard">' . get_the_author() . '</span>' );

						elseif ( is_day() ) :
							printf( __( 'Day: %s', 'accesspress-parallax' ), '<span>' . get_the_date() . '</span>' );

						elseif ( is_month() ) :
							printf( __( 'Month: %s', 'accesspress-parallax' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'accesspress-parallax' ) ) . '</span>' );

						elseif ( is_year() ) :
							printf( __( 'Year: %s', 'accesspress-parallax' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'accesspress-parallax' ) ) . '</span>' );

						elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
							_e( 'Asides', 'accesspress-parallax' );

						elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
							_e( 'Galleries', 'accesspress-parallax' );

						elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
							_e( 'Images', 'accesspress-parallax' );

						elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
							_e( 'Videos', 'accesspress-parallax' );

						elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
							_e( 'Quotes', 'accesspress-parallax' );

						elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
							_e( 'Links', 'accesspress-parallax' );

						elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
							_e( 'Statuses', 'accesspress-parallax' );

						elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
							_e( 'Audios', 'accesspress-parallax' );

						elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
							_e( 'Chats', 'accesspress-parallax' );

						else :
							_e( 'Archives', 'accesspress-parallax' );

						endif;
					?>
			
				
				<?php
				// added by KH
				$category = get_category( get_query_var( 'cat' ) );
				$cat_id = $category->cat_ID;
				if($cat == 12 && current_user_can('publish_posts')) {
				?>

					<a href="<?php site_url(); ?>/create-new-post/" class="btn-responsive-by-kh">Add New</a>
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
						<li id="list_new"><a class="group-create no-ajax" href="<?php site_url(); ?>/create-new-post/">Create A New Item</a></li>
						<!--
						<li id="list_show"><a class="group-create no-ajax" href="http://localhost/show-items-list/">Show Items List</a></li>
						-->
					</ul>
				</div>
	
				<?php
				}
				?>
			
				<?php
					// Show an optional term description.
					$term_description = term_description();
					if ( ! empty( $term_description ) ) :
						printf( '<div class="taxonomy-description">%s</div>', $term_description );
					endif;
				?>
			</header><!-- .page-header -->
			
		
			<?php /* Start the Loop */ ?>
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

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
