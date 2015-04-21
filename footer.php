<?php
/**
 * Default Footer Template
 *
 */
?>

<footer class="site-footer" role="contentinfo">
    <nav role="navigation">
        <?php h5bs_secondary_nav(); ?>
    </nav>

    <p class="copyright">&copy; <?php echo date( 'Y' ); ?> <a href="<?php echo home_url( '/' ); ?>" <?php if ( ! is_front_page() ) echo 'rel="nofollow"'; ?>><?php get_bloginfo( 'name' ); ?></a></p>
</footer>

<?php wp_footer(); ?>

<?php if ( ! current_user_can( 'edit_pages' ) ) : // don't track admins or editors ?>
<!-- Google Universal Analytics -->
<script>
    (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
    function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
    e=o.createElement(i);r=o.getElementsByTagName(i)[0];
    e.src='//www.google-analytics.com/analytics.js';
    r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
    ga('create','UA-XXXXX-X','auto');ga('send','pageview');
</script>
<?php endif; ?>

</body>
</html>
