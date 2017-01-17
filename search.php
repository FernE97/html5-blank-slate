<?php
/**
* The template for displaying search results pages
*
*/
get_header(); ?>

<div id="primary" class="content-wrap page-search content-area" role="main">
    <header class="page-header">
        <?php if ( have_posts() ) : ?>
            <h1 class="page-title"><?php printf( __( 'Search Results for: %s' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
        <?php else : ?>
            <h1 class="page-title"><?php _e( 'Nothing Found' ); ?></h1>
        <?php endif; ?>
    </header><!-- .page-header -->

    <?php
    if ( have_posts() ) :
        while ( have_posts() ) : the_post();
        get_template_part( 'parts/post', 'index' );
    endwhile;

    the_posts_pagination();

    else : ?>
        <p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.' ); ?></p>
        <?php
    endif;
    ?>
</div><!-- end content -->

<?php // get_sidebar(); ?>

<?php get_footer();
