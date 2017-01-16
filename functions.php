<?php

// Enqueue Styles
function h5bs_enqueue_styles() {
    wp_register_style( 'h5bs-theme', get_template_directory_uri() . '/assets/stylesheets/theme.css', false, '3.7.0' );
    wp_register_style( 'h5bs-custom', get_template_directory_uri() . '/custom.css', false, '3.7.0' );

    // Font Awesome 4.7.0
    wp_register_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', false, '4.7.0' );
    wp_enqueue_style( 'font-awesome' );

    wp_enqueue_style( 'h5bs-theme' );
    wp_enqueue_style( 'h5bs-custom' ); // keep at bottom to overwrite other styles
}

add_action( 'wp_enqueue_scripts', 'h5bs_enqueue_styles' );


// Enqueue Scripts
function h5bs_enqueue_scripts() {
    wp_register_script( 'main', get_template_directory_uri() . '/assets/javascripts/main.js', array( 'jquery' ), '3.7.0', true );
    wp_enqueue_script( 'main' );
}

add_action( 'wp_enqueue_scripts', 'h5bs_enqueue_scripts' );

// ACF Options
if ( function_exists( 'acf_add_options_page' ) ) {
    acf_add_options_page(array(
        'page_title'  => 'Theme General Settings',
        'menu_title'  => 'Theme Settings',
        'menu_slug'   => 'theme-general-settings',
        'capability'  => 'edit_posts',
        'redirect'    => false
    ));

    acf_add_options_sub_page(array(
        'page_title'  => 'Theme Header Settings',
        'menu_title'  => 'Header',
        'parent_slug' => 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title'  => 'Theme Footer Settings',
        'menu_title'  => 'Footer',
        'parent_slug' => 'theme-general-settings',
    ));
}

// Hide ACF menu
// add_filter( 'acf/settings/show_admin', '__return_false' );

// Custom Menus
function h5bs_register_menus() {
    register_nav_menus(array(
        'primary'   => __( 'Primary Navigation', 'h5bs' ),
        'secondary' => __( 'Secondary Navigation', 'h5bs' ),
        'footer'    => __( 'Footer Navigation', 'h5bs' ),
        'mobile'    => __( 'Mobile Navigation', 'h5bs' )
    ));
}

add_action( 'init', 'h5bs_register_menus' );


function h5bs_primary_nav() {
    wp_nav_menu(array(
        'container'       => false,                        // remove nav container
        'menu'            => 'Primary Nav',                // nav name
        'menu_id'         => 'nav-main',                   // custom id
        'menu_class'      => 'menu nav-main nav group',         // custom class
        'theme_location'  => 'primary',                    // where it's located in the theme
        'before'          => '',                           // before the menu
        'after'           => '',                           // after the menu
        'link_before'     => '',                           // before each link
        'link_after'      => '',                           // after each link
        'depth'           => 0,                            // set to 1 to disable dropdowns
        'fallback_cb'     => 'h5bs_nav_fallback'           // fallback function
    ));
}

function h5bs_secondary_nav() {
    wp_nav_menu(array(
        'container'       => false,                        // remove nav container
        'menu'            => 'Secondary Nav',              // nav name
        'menu_id'         => 'nav-sub',                    // custom id
        'menu_class'      => 'nav-sub nav group',          // custom class
        'theme_location'  => 'secondary',                  // where it's located in the theme
        'before'          => '',                           // before the menu
        'after'           => '',                           // after the menu
        'link_before'     => '',                           // before each link
        'link_after'      => '',                           // after each link
        'depth'           => 0,                            // set to 1 to disable dropdowns
        'fallback_cb'     => 'h5bs_nav_fallback'           // fallback function
    ));
}

function h5bs_footer_nav() {
    wp_nav_menu(array(
        'container'       => false,                        // remove nav container
        'menu'            => 'Footer Nav',                 // nav name
        'menu_id'         => 'nav-footer',                 // custom id
        'menu_class'      => 'nav-footer nav group',       // custom class
        'theme_location'  => 'footer',                     // where it's located in the theme
        'before'          => '',                           // before the menu
        'after'           => '',                           // after the menu
        'link_before'     => '',                           // before each link
        'link_after'      => '',                           // after each link
        'depth'           => 0,                            // set to 1 to disable dropdowns
        'fallback_cb'     => 'h5bs_nav_fallback'           // fallback function
    ));
}

function h5bs_mobile_nav() {
    wp_nav_menu(array(
        'container'       => false,                        // remove nav container
        'menu'            => 'Mobile Nav',                 // nav name
        'menu_id'         => 'nav-mobile',                 // custom id
        'menu_class'      => 'nav-mobile nav group',       // custom class
        'theme_location'  => 'mobile',                     // where it's located in the theme
        'before'          => '',                           // before the menu
        'after'           => '',                           // after the menu
        'link_before'     => '',                           // before each link
        'link_after'      => '',                           // after each link
        'depth'           => 0,                            // set to 1 to disable dropdowns
        'fallback_cb'     => 'h5bs_nav_fallback'           // fallback function
    ));
}

function h5bs_nav_fallback() {
    wp_page_menu(array(
        'menu_class'  => 'menu nav group',
        'include'     => '',
        'exclude'     => '',
        'link_before' => '',
        'link_after'  => '',
        'show_home'   => true
    ));
}


// Theme Support
add_theme_support( 'post-thumbnails' );

add_theme_support( 'title-tag' );

add_theme_support( 'post-formats', array(
    'aside',
    'image',
    'video',
    'quote',
    'link',
    'gallery',
    'audio',
) );

add_theme_support( 'custom-logo', array(
    'width'       => 250,
    'height'      => 250,
    'flex-width'  => true,
) );


// html5 search form
add_theme_support( 'html5', array( 'search-form' ) );


// Add class to next/prev page links
add_filter( 'next_posts_link_attributes', 'posts_link_attributes' );
add_filter( 'previous_posts_link_attributes', 'posts_link_attributes' );

function posts_link_attributes() {
    return 'class="button tiny radius"';
}


// Excerpts
function custom_excerpt_length( $length ) {
    return 48;
}

add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


function new_excerpt_more( $more ) {
    return '...';
}

add_filter( 'excerpt_more', 'new_excerpt_more' );


// Remove junk from head
function h5bs_remove_junk() {
    // Really Simple Discovery
    remove_action( 'wp_head', 'rsd_link' );
    // Windows Live Writer
    remove_action( 'wp_head', 'wlwmanifest_link' );
    // WP Version
    remove_action( 'wp_head', 'wp_generator' );
}

add_action( 'init', 'h5bs_remove_junk' );


// Sidebars & Widgetizes Areas
function h5bs_register_sidebars() {
    register_sidebar(array(
        'id'            => 'sidebar1',
        'name'          => 'Sidebar 1',
        'description'   => 'The first (primary) sidebar.',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widgettitle">',
        'after_title'   => '</h4>',
    ));
}

add_action( 'widgets_init', 'h5bs_register_sidebars' );


// Comments List
function h5bs_comments( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;

    if ( get_comment_type() == 'pingback' || get_comment_type() == 'trackback' ) : ?>

        <li class="pingback" id="comment-<?php comment_ID(); ?>">
            <article <?php comment_class( 'group' ); ?>>

                <header class="comment-meta">
                    <h5><?php _e( 'Pingback:', 'h5bs' ); ?></h5>
                    <p><?php edit_comment_link(); ?></p>
                </header>

                <p><?php comment_author_link(); ?></p>
            </article>
        <?php // WordPress closes </li>

    elseif ( get_comment_type() == 'comment' ) : ?>
        <li id="comment-<?php comment_ID(); ?>">
            <article <?php comment_class( 'group' ); ?>>

                <header class="comment-meta">
                    <h5><?php comment_author_link(); ?></h5>
                    <p class="comment-date">on <?php comment_date(); ?> at <?php comment_time(); ?></p>

                    <p class="reply">
                        <?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'h5bs' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                    </p>
                </header>

                <figure class="comment-avatar">
                    <?php
                    $avatar_size = 80;
                    echo get_avatar( $comment, $avatar_size );
                    ?>
                </figure>

                <?php if ( '0' == $comment->comment_approved ) : ?>
                    <p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'h5bs' ); ?></p>
                <?php endif; ?>

                <?php comment_text(); ?>

            </article>
        <?php // WordPress closes </li>
    endif;
}


/** https://github.com/blineberry/Improved-HTML5-WordPress-Captions **/
// Removes inline styling from wp-caption and changes to HTML5 figure/figcaption
add_filter( 'img_caption_shortcode', 'h5bs_img_caption_shortcode_filter', 10, 3 );

function h5bs_img_caption_shortcode_filter($val, $attr, $content = null) {
    extract(shortcode_atts(array(
        'id'      => '',
        'align'   => '',
        'width'   => '',
        'caption' => ''
    ), $attr));

    if ( 1 > (int) $width || empty($caption) )
        return $val;

    return '<figure id="' . $id . '" class="wp-caption ' . esc_attr($align) . '" style="width: ' . $width . 'px;">'
    . do_shortcode( $content ) . '<figcaption class="wp-caption-text">' . $caption . '</figcaption></figure>';
}

// BrowserSync script
function browser_sync() {
    $whitelist = array(
        '127.0.0.1',
        '::1'
    );
if(in_array($_SERVER['REMOTE_ADDR'], $whitelist)){
    echo "
    <!-- BrowserSync -->
    <script id=\"__bs_script__\">//<![CDATA[
        document.write(\"<script async src='http://HOST:3000/browser-sync/browser-sync-client.js?v=2.18.2'><\/script>\".replace(\"HOST\", location.hostname));
        //]]></script>
        ";
    }
}
add_action( 'wp_footer', 'browser_sync' );

// Helper function for printing clean var dumps
function dump( $var ) {
    echo "<pre>";
    print_r( $var );
    echo "</pre>";
}
