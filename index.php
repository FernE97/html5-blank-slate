<?php
/**
 * Default Blog Template
 *
 */

get_header(); ?>

<div class="content-wrap index-content" role="main">

    <?php
    if ( have_posts() ) :
        while ( have_posts() ) : the_post();
            get_template_part( 'parts/post', 'index' );
        endwhile;

        get_template_part( 'parts/post', 'nav' );
    endif;
    ?>

</div><!-- end content -->

<?php // get_sidebar(); ?>

<?php get_footer(); ?>
