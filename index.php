<?php
/**
 * Default Blog Template
 *
 */

get_header(); ?>

<div class="content" role="main">

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <article <?php post_class( 'group' ); ?> role="article">
        <header>
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_time( 'F j, Y' ); ?></time>
        </header>
        <?php the_excerpt(); ?>
    </article>

    <?php endwhile; ?>

        <?php
        $prev_link = get_previous_posts_link( __( 'Newer Entries &raquo;', 'h5bs' ) );
        $next_link = get_next_posts_link( __( '&laquo; Older Entries', 'h5bs' ) );

        if ( $prev_link || $next_link ) { ?>
            <div class="page-nav">
                <?php if ( $next_link ) echo '<div class="alignleft">' . $next_link . '</div>'; ?>
                <?php if ( $prev_link ) echo '<div class="alignright">' . $prev_link . '</div>'; ?>
            </div>
        <?php } ?>

    <?php endif; ?>

</div><!-- end content -->

<?php // get_sidebar(); ?>

<?php get_footer(); ?>
