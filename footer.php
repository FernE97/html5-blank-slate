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

    <ul class="social-icons">
        <?php if ( get_option( 'client_twitter_url' ) ) { ?>
            <li class="si-twitter"><a href="<?php echo get_option( 'client_twitter_url' ); ?>" target="_blank">Twitter</a></li>
        <?php } ?>
        <?php if ( get_option( 'client_facebook_url' ) ) { ?>
            <li class="si-facebook"><a href="<?php echo get_option( 'client_facebook_url' ); ?>" target="_blank">Facebook</a></li>
        <?php } ?>
        <?php if ( get_option( 'client_google_url' ) ) { ?>
            <li class="si-google"><a href="<?php echo get_option( 'client_google_url' ); ?>" target="_blank">Google+</a></li>
        <?php } ?>
        <?php if ( get_option( 'client_linkedin_url' ) ) { ?>
            <li class="si-linkedin"><a href="<?php echo get_option( 'client_linkedin_url' ); ?>" target="_blank">LinkedIn</a></li>
        <?php } ?>
        <?php if ( get_option( 'client_instagram_url' ) ) { ?>
            <li class="si-instagram"><a href="<?php echo get_option( 'client_instagram_url' ); ?>" target="_blank">Instagram</a></li>
        <?php } ?>
        <?php if ( get_option( 'client_pinterest_url' ) ) { ?>
            <li class="si-pinterest"><a href="<?php echo get_option( 'client_pinterest_url' ); ?>" target="_blank">Pinterest</a></li>
        <?php } ?>
        <?php if ( get_option( 'client_youtube_url' ) ) { ?>
            <li class="si-youtube"><a href="<?php echo get_option( 'client_youtube_url' ); ?>" target="_blank">YouTube</a></li>
        <?php } ?>
    </ul>

    <p class="copyright">&copy; <?php echo date( 'Y' ); ?> <a href="<?php echo home_url( '/' ); ?>" <?php if ( ! is_front_page() ) echo 'rel="nofollow"'; ?>><?php echo get_bloginfo( 'name' ); ?></a></p>
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
