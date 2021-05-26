<?php
/**
 * Default Page Template
 *
 */

get_header(); ?>

<div class="container page-content py-4" role="main">

  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <article <?php post_class( 'group' ); ?> role="article">
    <h1><?php the_title(); ?></h1>
    <?php the_content(); ?>
  </article>

  <?php endwhile; endif; ?>

</div><!-- end content -->

<?php // get_sidebar(); ?>

<?php get_footer(); ?>
