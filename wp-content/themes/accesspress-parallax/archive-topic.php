<?php

/**
 * bbPress - Topic Archive
 *
 * @package bbPress
 * @subpackage Theme
 */

get_header(); ?>


<div class="mid-content clearfix"> 	
	<div id="primary" class="content-area"> 	
		<main id="main" class="site-main" role="main">   	
			<div id="main-content" class="hentry">

	<?php do_action( 'bbp_before_main_content' ); ?>

	<?php do_action( 'bbp_template_notices' ); ?>
	<div id="topic-front" class="bbp-topics-front">
		<h1 class="entry-title"><?php echo 'Search Result'; // edit by KH // bbp_topic_archive_title(); ?></h1>
		<div class="entry-content">

			<?php bbp_get_template_part( 'content', 'archive-topic' ); ?>

		</div>
	</div><!-- #topics-front -->

	<?php do_action( 'bbp_after_main_content' ); ?>

			</div>
		</main>
	</div>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
