<?php 
/* 
 * File Name: Content-Excerpt-Count 
 * posts 2 col or 1 col to blog page
 * @sideout
 */
if (have_posts()) : ?>
<?php $options = get_option( 'sideout_theme_options' );
    if( !isset( $options['sideout_onetwo'] ) ) { 
    echo '<ul class="c12">';
    } else { 
    echo '<ul class="'.$options['sideout_onetwo'].'">'; } ?>
    <?php while (have_posts()) : the_post(); ?>
        <li id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <article class="entry-content"> 
                <div class="entry">
                    <header class="meta-header">	
                        <h1 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h1>
                    </header>
                        <?php if ( has_post_thumbnail() ) { 
                            the_post_thumbnail(); 
                            } else {
                	    echo '<div></div>';
                            } ?>
                            <?php the_excerpt(); ?>
                                <footer class="meta-footer">
                                    <?php $category = get_the_category(); 
                                          if(!empty ($category) ){ ?>
                                    <p class="cat-link">&#9734; 
                                    <?php echo '<a href="'.get_category_link($category[0]->term_id ).'">'.$category[0]->cat_name.'</a>'; echo '</p>'; } ?>
                                    <?php $tags = get_the_tags(); 
                                          if(!empty ($tags) ){ ?>
                                    <p class="tag-link">&#9825; 
                                    <?php the_tags( '', ', ' ); echo '</p>'; } ?>
                                    <p class="entry-date"><a href="<?php the_permalink() ?>" title=""><?php the_date(); ?> @<?php the_time() ?></a></p>
                                </footer>
                </div><!-- ends entry -->
            </article><!-- ends entry container -->
        </li><!-- ends post div -->
    <?php endwhile; ?>
    </ul><!-- ends one post container list --><div class="clearfix"></div>
        <?php else : ?>

        <section class="row">
           <article class="c12 entry-content">
               <p><?php _e( 'No articles found', 'sideout' ); ?></p>
               <p><?php get_search_form(); ?></p>
           </article>
        </section>
<?php endif; ?>