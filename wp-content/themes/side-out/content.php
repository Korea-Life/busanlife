<?php 
/* content full-content 
 * @sideout 
 * @since v0.1 
 */
if (have_posts()) : while (have_posts()) : the_post(); ?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="entry-content"> 	
        <article class="entry">
            <header class="meta-header" id="single-post-header">
                <p class="entry-date"><a href="<?php the_permalink() ?>" title=""><?php the_date(); ?></a></p>
                    <h1 class="entry-title" id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h1>
            </header>
                <?php if ( has_post_thumbnail() ) { ?>
                <figure>
<?php $image = wp_get_attachment_url( get_post_thumbnail_id($post->ID)); ?>
                    <a href="<?php echo $image; ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_post_thumbnail(); ?></a></figure>
                <?php } else { echo '<div class="no-thumb"></div>'; } ?>
                    <div class="entry-content">
                        <?php the_content(); ?><nav class="navigation"><?php wp_link_pages(); ?></nav>
                    </div> 
                            <footer class="meta-footer">
                                <?php $category = get_the_category(); 
                                      if(!empty ($category) ){ ?>
                            <p class="cat-link">&#9734; 
                            <?php echo '<a href="'.get_category_link($category[0]->term_id ).'">'.$category[0]->cat_name.'</a>'; echo '</p>'; } ?>
                                <?php $tags = get_the_tags(); 
                                      if(!empty ($tags) ){ ?>
                                <p class="tag-link">&#9825; 
                                <?php the_tags( '', ', ' ); echo '</p>'; } ?>
                                <p class="post-edit-link"><?php edit_post_link(__('Edit', 'sideout' ) ); ?></p>
                            </footer>
       </article>
</div>
               <?php endwhile; ?>

                   <?php else : ?>

               <article class="entry">
               <p><?php _e( 'No articles found', 'sideout' ); ?></p>
               <p><?php get_search_form(); ?></p>
               </article>
</div>
                        <?php endif; ?>