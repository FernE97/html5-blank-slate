<?php
/**
 * Default 404 Template
 *
 */

get_header(); ?>

<div class="container page-content py-4" role="main">

  <article id="post-404-error" <?php post_class( 'group' ); ?>>
    <h2><?php _e( 'Page could not be found', 'h5bs' ); ?></h2>
  </article>

</div><!-- end content -->

<?php // get_sidebar(); ?>

<?php get_footer(); ?>
