<?php
/**
 * Default Footer Template
 *
 */
?>

<footer class="site-footer" role="contentinfo">
    <nav class="nav-footer-wrap" role="navigation">
        <?php h5bs_footer_nav(); ?>
    </nav>

    <?php get_template_part( 'parts/icons', 'social' ); ?>

    <p class="copyright">&copy; <?php echo date( 'Y' ); ?> <?php echo get_bloginfo( 'name' ); ?></p>
</footer>

<?php wp_footer(); ?>
</body>
</html>
