<?php
/**
 * Template for displaying Comments
 *
 * The actual display of comments is handled by a callback to
 * h5bs_comments() which is located in the functions.php file.
 *
 */

// check if post is pwd protected
if ( post_password_required() )
    return;
?>

<section class="comments-area">

    <?php if ( have_comments() ) : ?>
        <h3 class="comments-title">
            <?php comments_number( __( 'No Comments', 'h5bs' ), __( 'One Comment', 'h5bs' ), __( '% Comments', 'h5bs' ) ); ?>
        </h3>

        <ol class="comments-list">
            <?php wp_list_comments( array( 'callback' => 'h5bs_comments', 'style' => 'ol' ) ); ?>
        </ol>

        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
        <nav class="comments-link" role="navigation">
            <div class="nav-prev"><?php previous_comments_link( __( '&larr; Older Comments', 'h5bs' ) ); ?></div>
            <div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'h5bs' ) ); ?></div>
        </nav>
        <?php endif; // check for comment navigation ?>

        <?php if ( ! comments_open() && get_comments_number() ) : ?>
            <p class="nocomments"><?php _e( 'Comments are closed.', 'h5bs' ); ?></p>
        <?php endif; // check for closed comments ?>

    <?php endif; // have_comments() ?>

    <?php comment_form(); ?>

</section><!-- /comments-area -->
