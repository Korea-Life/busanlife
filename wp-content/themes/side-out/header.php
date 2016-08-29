<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width">
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <div class="screen-reader-text">
        <a href="#content" title="<?php esc_attr_e( 'Skip to content', 'sideout' ); ?>"><?php _e( 'Skip to content', 'sideout' ); ?></a>
    </div>
    <nav id="mobile-nav" role="navigation">
 
        <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
 
    </nav>
        <nav id="nav-switch" onclick="launchMenu();">
            <div class="menu-button">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </nav>

    <?php get_template_part( 'content', 'sideout' ); ?>

        <section id="site-container">
            <div id="site-content" class="grid">
                <div class="row" id="site-header">
                    <header class="c6" id="branding">
                        <h1 class="site-title"><a href="<?php echo esc_url( home_url() ); ?>" title="<?php echo esc_attr( get_bloginfo() ); ?>" rel="home"><?php bloginfo(); ?></a></h1>
                    </header>
                        <figure class="c6 logo">
            <img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
                        </figure>
                </div>