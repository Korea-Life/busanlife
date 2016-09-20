<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package accesspress_parallax
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
		<header class="entry-header">
		<?php 
			// edit by KH
			// Question & Answer : bbpress
			if(get_the_ID()==8) {// && current_user_can('publish_posts')) {
		?>
				<a href="<?php site_url(); ?>/question-answer/" class="no-link-color">
		<?php
				$btn_responsive_add_new = '<a href="' . site_url() . '/create-a-new-topic" class="btn-responsive-by-kh">Add New</a>';
		
				the_title( '<h1 class="entry-title">', $btn_responsive_add_new . '</h1>' ); ?>
				</a>

				<!-- added by KH -->
				<?php bbp_get_template_part( 'form', 'search-to-topics' ); ?>

				<div class="item-list-tabs">
					<ul>
						<li id="topic_new"><a class="group-create no-ajax" href="<?php site_url(); ?>/create-a-new-topic">Create a New Topic</a></li>
					</ul>
				</div>

		<?php
			// added by KH
			// Groups : buddypress
			}else if(get_queried_object_id()==11&&current_user_can('publish_posts')){

				$btn_responsive_add_new = '<a href="' . site_url() . '/groups/create" class="btn-responsive-by-kh">Add New</a>';
				the_title( '<h1 class="entry-title">', $btn_responsive_add_new . '</h1>' ); 

			}else {
				the_title( '<h1 class="entry-title">', '</h1>' ); 
			}			
		?>

		</header><!-- .entry-header -->

		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'accesspress-parallax' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<footer class="entry-footer">
		<?php edit_post_link( __( 'Edit', 'accesspress-parallax' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
