<?php

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
    $link = get_the_permalink();
    return "<br>" . "<a href=\"{$link}\" class=\"button small secondary\">" . 'Read More' . "</a>";
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
