<?php
/**
 * Default Blog Template
 *
 */

get_header(); ?>

<div class="container index-content py-4" role="main">

  <?php
  if ( have_posts() ) :
    while ( have_posts() ) : the_post();
      get_template_part( 'partials/post', 'index' );
    endwhile;

    get_template_part( 'partials/post', 'nav' );
  endif;
  ?>

</div><!-- end content -->

<?php // get_sidebar(); ?>

<?php get_footer(); ?>
