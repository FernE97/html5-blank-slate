<?php
/**
 * Default Footer Template
 *
 */
?>

</div><!-- end container -->

<footer class="site-footer" role="contentinfo">
    <nav role="navigation">
        <?php h5bs_secondary_nav(); ?>
    </nav>

    <p class="copyright">&copy;<?php echo date( 'Y' ); ?> <a href="http://yoursitename.com/" <?php if ( ! is_front_page() ) echo 'rel="nofollow"'; ?>>Your Site Name</a></p>
</footer>

<?php // JavaScript added through functions.php to avoid conflicts ?>

<!-- Prompt IE 6 & 7 users to install Chrome Frame -->
<!--[if lt IE 8 ]>
    <script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
    <script>window.attachEvent("onload",function(){CFInstall.check({mode:"overlay"})})</script>
<![endif]-->

<?php wp_footer(); ?>

<?php if ( ! current_user_can( 'edit_pages' ) ) : // don't track admins or editors ?>
<!-- Google Universal Analytics -->
<script>
    (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
    function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
    e=o.createElement(i);r=o.getElementsByTagName(i)[0];
    e.src='//www.google-analytics.com/analytics.js';
    r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
    ga('create','UA-XXXXX-X');ga('send','pageview');
</script>
<?php endif; ?>

</body>
</html>