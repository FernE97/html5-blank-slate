<article <?php post_class( 'group' ); ?> role="article">
    <header>
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_time( 'F j, Y' ); ?></time>
    </header>
    <?php the_excerpt(); ?>
</article>
