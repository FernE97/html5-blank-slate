<?php

// Add an ACF Theme settings page
function h5bs_acf_options_init()
{
  if (function_exists('acf_add_options_page')) {
    $option_page = acf_add_options_page([
      'page_title'  => __('Theme General Settings'),
      'menu_title'  => __('Theme Settings'),
      'menu_slug'   => 'theme-general-settings',
      'capability'  => 'edit_posts',
      'redirect'    => false,
    ]);
  }
}

add_action('acf/init', 'h5bs_acf_options_init');

// Image Thumbnails
add_theme_support('post-thumbnails');

// html5 support
add_theme_support('html5', ['comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script']);

// Remove junk from head
function h5bs_remove_junk()
{
  remove_action('wp_head', 'rsd_link'); // remove really simple discovery link
  remove_action('wp_head', 'wlwmanifest_link'); // remove wlwmanifest.xml
  remove_action('wp_head', 'wp_generator'); // remove wp version
  remove_action('wp_head', 'feed_links', 2); // remove rss feed links
  remove_action('wp_head', 'feed_links_extra', 3); // remove all extra rss feed links
  remove_action('wp_head', 'print_emoji_detection_script', 7); // remove emoji js
  remove_action('wp_print_styles', 'print_emoji_styles'); // remove emoji css
}

add_action('init', 'h5bs_remove_junk');

// Sidebars & Widgetizes Areas
function h5bs_register_sidebars()
{
  register_sidebar([
    'id'            => 'sidebar1',
    'name'          => 'Sidebar 1',
    'description'   => 'The first (primary) sidebar.',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h4 class="widgettitle">',
    'after_title'   => '</h4>',
  ]);
}

add_action('widgets_init', 'h5bs_register_sidebars');

// Add class to next/prev page links
add_filter('next_posts_link_attributes', 'h5bs_posts_link_attributes');
add_filter('previous_posts_link_attributes', 'h5bs_posts_link_attributes');

function h5bs_posts_link_attributes()
{
  return 'class="btn btn-secondary btn-sm"';
}

// Excerpts
function h5bs_custom_excerpt_length($length)
{
  return 48;
}

add_filter('excerpt_length', 'h5bs_custom_excerpt_length', 999);

function h5bs_new_excerpt_more($more)
{
  return '...';
}

add_filter('excerpt_more', 'h5bs_new_excerpt_more');

// Comments List
function h5bs_comments($comment, $args, $depth)
{
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
