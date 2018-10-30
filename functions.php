<?php

// Enqueue Styles
function h5bs_enqueue_styles() {
    wp_enqueue_style( 'font-awesome', 'https://use.fontawesome.com/releases/v5.4.2/css/all.css"' );
    wp_enqueue_style( 'h5bs-theme', get_template_directory_uri() . '/assets/css/theme.css', false, '3.6.0' );
    wp_enqueue_style( 'h5bs-custom', get_template_directory_uri() . '/custom.css', false, '3.6.0' );
}

add_action( 'wp_enqueue_scripts', 'h5bs_enqueue_styles' );


// Enqueue Scripts
function h5bs_enqueue_scripts() {
    wp_enqueue_script('vendor-js', get_template_directory_uri() . '/assets/js/vendor.bundle.js', array('jquery'), '3.6.0', true);
    // wp_enqueue_script('commons-js', get_template_directory_uri() . '/assets/js/commons.bundle.js', array(), '3.6.0', true);
    wp_enqueue_script('bundle-js', get_template_directory_uri()  . '/assets/js/bundle.js', array('jquery'), '3.6.0', true);
}

add_action( 'wp_enqueue_scripts', 'h5bs_enqueue_scripts' );


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
        'menu_class'      => 'nav-main nav group',         // custom class
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
        'menu_class'  => 'nav group',
        'include'     => '',
        'exclude'     => '',
        'link_before' => '',
        'link_after'  => '',
        'show_home'   => true
    ));
}


// Image Thumbnails
add_theme_support( 'post-thumbnails' );


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


// Client Options Page
require_once( 'includes/client-options.php' );
add_action( 'admin_menu', 'h5bs_client_options' );


// Translation
// require_once( 'includes/lang/translation.php' ); // uncomment if needed
