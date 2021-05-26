<?php
/**
 * Default Archives Template
 *
 */

get_header(); ?>

<div class="container archive-content py-4" role="main">

  <header>
    <h1><?php single_cat_title( __( 'Archive for ', 'h5bs' ) ); ?></h1>
  </header>

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
