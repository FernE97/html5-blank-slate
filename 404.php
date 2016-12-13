<?php
/**
 * Default 404 Template
 *
 */

get_header(); ?>

<div class="content-wrap page-content" role="main">

    <article id="post-404-error" <?php post_class( 'group' ); ?>>
        <div class="row column">
            <h2><?php _e( "Sorry, the page you're looking for could not be found", 'h5bs' ); ?></h2>
        </div>
    </article>

</div><!-- end content -->

<?php // get_sidebar(); ?>

<?php get_footer(); ?>
