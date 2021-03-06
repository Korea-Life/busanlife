<?php
/**
 * @package accesspress_parallax
 */
?>
<?php 
$post_date = of_get_option('post_date');
$post_footer = of_get_option('post_footer');
$post_date_class = ((!empty($post_date) && $post_date == ' ') || has_post_thumbnail()) ? " no-date" : "";
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if(has_post_thumbnail()) : ?>
		<div class="entry-thumb">
			<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'blog-header' ); ?>
			<img src="<?php echo $image[0]; ?>" alt="<?php echo get_the_title(); ?>"> 
		</div>
		<?php endif; ?>
		
		<h1 class="entry-title<?php echo $post_date_class; ?>"><?php the_title(); ?></h1>

		<div class="entry-meta">
			<?php accesspress_parallax_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'accesspress-parallax' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php if( $post_footer == 1 ) : ?>
	<footer class="entry-footer">
		<?php
			/* translators: used between list items, there is a space after the comma */
			$category_list = get_the_category_list( __( ', ', 'accesspress-parallax' ) );

			/* translators: used between list items, there is a space after the comma */
			$tag_list = get_the_tag_list( '', __( ', ', 'accesspress-parallax' ) );

			if ( ! accesspress_parallax_categorized_blog() ) {
				// This blog only has 1 category so we just need to worry about tags in the meta text
				if ( '' != $tag_list ) {
					$meta_text = __( 'This entry was tagged %2$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'accesspress-parallax' );
				} else {
					$meta_text = __( 'Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'accesspress-parallax' );
				}

			} else {
				// But this blog has loads of categories so we should probably display them here
				if ( '' != $tag_list ) {
					$meta_text = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'accesspress-parallax' );
				} else {
					$meta_text = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'accesspress-parallax' );
				}

			} // end check for categories on this blog

			printf(
				$meta_text,
				$category_list,
				$tag_list,
				get_permalink()
			);
		?>
	</footer><!-- .entry-footer -->
<?php endif; ?>

<?php
	// added by KH
	if(current_user_can( 'edit_post', get_the_ID() )){	
?>
		<div class="clearfix btn-wrap">
		<a style="color:#333333; border: 2px solid #333333" class="btn" href="<?php site_url(); ?>/show-items-list/?fep_action=edit&fep_id=<?php the_ID(); ?>"><?php _e('Edit'    ,'accesspress-parallax'); ?></a>

		<a id="btn-delete-single" style="color:#333333; border: 2px solid #333333" class="btn" href="#" value=<?php the_ID(); ?>><?php _e('Delete'    ,'accesspress-parallax'); ?></a>
		</div>

<?php

	}

	// edit by KH
	//edit_post_link( __( 'Edit', 'accesspress-parallax' ), '<span class="edit-link">', '</span>' ); ?>

</article><!-- #post-## -->
