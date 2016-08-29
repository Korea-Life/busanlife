<?php
include_once (get_template_directory() . '/include/theme-options.php');
    // theme setup
    function sideout_setup() {	
                register_nav_menus(array(
                    'primary' => __('Primary Menu', 'sideout'),			
		));
                add_theme_support( "title-tag" );
 		add_theme_support('post-thumbnails');
		add_theme_support('automatic-feed-links');
                // custom editor style support
                add_editor_style( 'custom-editor-style.css' );
		// set content width 
		global $content_width;  
		    if (!isset($content_width)) {$content_width = 733;}
                // custom background support		
                add_theme_support( 'custom-background' );
                    $args = array(
                        'default-color' => 'fafafb',
                        'default-image' => '',
                );
                add_theme_support( 'custom-background', $args );
                // custom header image on top sidebar
                add_theme_support( 'custom-header' ); 
                    $args = array(
	                'default-image'      => get_stylesheet_directory_uri() . '/images/default-header.png',
                        'random-default'     => false,
                        'width'              => 500,
                        'height'             => 150,
                        'flex-height'        => true,
                        'flex-width'         => true,
                        'default-text-color' => 'ffffff',
                        'header-text'        => false,
                        'uploads'            => true,
                );
                add_theme_support( 'custom-header', $args );
    }
    add_action('after_setup_theme', 'sideout_setup');

// load css 
function sideout_styles() {		
	wp_enqueue_style('sideout-style', get_stylesheet_uri());
   /**
    * Adds JavaScript to pages with the comment form to support
    * sites with threaded comments (when in use).
    */
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
	wp_enqueue_script( 'comment-reply' );  

    // mobile navigation support @since ver. 0.6
    wp_enqueue_script( 'sideout-nav', get_template_directory_uri() . '/js/sideout-nav.js', array( 'jquery' ) );

}
add_action( 'wp_enqueue_scripts', 'sideout_styles' );

// html5 shim
function sideout_html5_shiv() {
    echo '<!--[if lt IE 9]>';
    echo '<script src="'. get_template_directory_uri() .'/js/html5shiv.js"></script>';
    echo '<![endif]-->';
}
add_action('wp_head', 'sideout_html5_shiv');

// title tag filter
function sideout_title($title, $sep) {
	global $paged, $page;
	if (is_feed()) {return $title;}
	$title .= get_bloginfo('name');	
	$site_description = get_bloginfo('description', 'display');
	if ( $site_description && (is_home() || is_front_page())) {
		$title = "$title $sep $site_description";
	}	
	if ( $paged >= 2 || $page >= 2 ) {
		$title = "$title $sep " . sprintf( __('Page %s', 'sideout'), max($paged, $page));
	}
	return $title;
}
add_filter('wp_title', 'sideout_title', 10, 2);

// custom footer credits
function sideout_footer_credits() {
    echo "<p><small><a href='http://www.tradesouthwest.com/' title='Tradesouthwest'>Theme Sideout</a></small></p>";
}
    add_action( 'sideout_footer_credits', 'sideout_footer_credits' );

// custom excerpt 
function new_excerpt_more($more) {
	global $post;
	return '<p><a class="more-link" href="'. get_permalink($post->ID) . '">' . '[ &#133; ]' . '</a></p>';
}
add_filter('excerpt_more', 'new_excerpt_more');

// numeric pagination
function sideout_numeric_posts_nav() {

	if( is_singular() )
		return;

	global $wp_query;

	/** Stop execution if there's only 1 page */
	if( $wp_query->max_num_pages <= 1 )
		return;

	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );

	/**	Add current page to the array */
	if ( $paged >= 1 )
		$links[] = $paged;

	/**	Add the pages around the current page to the array */
	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}

	echo '<div class="navigation"><ul>' . "\n";

	/**	Previous Post Link */
	if ( get_previous_posts_link() )
		printf( '<li>%s</li>' . "\n", get_previous_posts_link() );

	/**	Link to first page, plus ellipses if necessary */
	if ( ! in_array( 1, $links ) ) {
		$class = 1 == $paged ? ' class="active"' : '';

		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

		if ( ! in_array( 2, $links ) )
			echo '<li>...</li>';
	}

	/**	Link to current page, plus 2 pages in either direction if necessary */
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
	}

	/**	Link to last page, plus ellipses if necessary */
	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) )
			echo '<li>...</li>' . "\n";

		$class = $paged == $max ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
	}

	/**	Next Post Link */
	if ( get_next_posts_link() )
		printf( '<li>%s</li>' . "\n", get_next_posts_link() );

	echo '</ul></div>' . "\n";
}

// pagination for archives and search results
global $wp_query;
$big = 999999999; // need an unlikely integer
echo paginate_links( array(
	'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	'format' => '?paged=%#%',
	'current' => max( 1, get_query_var('paged') ),
	'total' => $wp_query->max_num_pages
) );

// sidebars
function sideout_widgets_init() {
	register_sidebar(array(
		'name' => __('Primary Sidebar', 'sideout'),
		'id'   => 'primary-sidebar',
		'description'   => __('Widgets will appear in the right sidebar on posts and pages', 'sideout'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => "</div>",
		'before_title'  => '<header class="meta-header"><h4>',
		'after_title'   => '</h4></header>'
	));
	register_sidebar(array(
		'name' => __('Footer Middle 1', 'sideout'),
		'id'   => 'footer-second',
		'description'   => __('Widgets will appear in the second column of the footer', 'sideout'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => "</div>",
		'before_title'  => '<h4>',
		'after_title'  => '</h4>'
	));
	register_sidebar(array(
		'name' => __('Footer Middle 2', 'sideout'),
		'id'   => 'footer-third',
		'description'   => __('Widgets will appear in the third column of the footer', 'sideout'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => "</div>",
		'before_title'  => '<h4>',
		'after_title'   => '</h4>'
	));
}
add_action('widgets_init', 'sideout_widgets_init');
?>
