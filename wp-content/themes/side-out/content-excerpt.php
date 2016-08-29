<?php 
/* loop used for archives and category and tags etc 
 * @sideout TSW 
 */
if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<div class="entry-content"> 
    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="meta-header">	
            <div class="entry-date">
                <?php the_date('','<h4>','</h4>'); ?>
            </div>
                <h1 class="entry-title" id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h1>
        </header>
            <article class="entry">
            <?php the_excerpt(); ?>
                <p><?php the_tags(); ?></p>
            </article>
    </div><!-- ends post div -->
</div><!-- ends entry content -->
<?php endwhile; ?>
    <?php else : ?>
    <article class="entry-content">
        <p><?php _e( 'No articles found', 'sideout' ); ?></p>
        <p><?php get_search_form(); ?></p>
    </article>
<?php endif; ?>