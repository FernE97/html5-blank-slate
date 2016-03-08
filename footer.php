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

<?php
// don't track admins or editors and google analytics option is filled in
if ( ! current_user_can( 'edit_pages' ) && get_option( 'client_google_analytics' ) ) :
    $analytics_id = get_option( 'client_google_analytics' ); ?>

    <!-- Google Universal Analytics -->
    <script>
        (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
        function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
        e=o.createElement(i);r=o.getElementsByTagName(i)[0];
        e.src='//www.google-analytics.com/analytics.js';
        r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
        ga('create','<?php echo $analytics_id; ?>','auto');ga('send','pageview');
    </script>
<?php endif; ?>

</body>
</html>
