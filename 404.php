<?php
/**
 * Default 404 Template
 *
 */

get_header(); ?>

<div class="content-wrap page-content" role="main">
    <article id="post-404-error" <?php post_class( 'group' ); ?>>
        <h1><?php _e( '404', 'cwp' ); ?></h1>
        <h5 class="message">Sorry, the page <strong><?php echo $_SERVER['REQUEST_URI']; ?></strong> could not be found or has moved.</h5>
        <a href="<?php _e( home_url() ); ?>" class="button">Home</a>
    </article>
</div><!-- end content -->

<?php // get_sidebar(); ?>

<?php get_footer(); ?>
