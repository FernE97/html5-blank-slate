<?php
/**
 * Default Footer Template
 *
 */
?>

<footer class="footer mt-auto bg-light" role="contentinfo">
  <div class="container py-4">
    <nav class="nav-footer-wrap" role="navigation">
      <?php h5bs_footer_nav(); ?>
    </nav>

    <p class="text-center mb-0">&copy; <?= date( 'Y' ); ?> <?= get_bloginfo( 'name' ); ?></p>
  </div>
</footer>

<?php wp_footer(); ?>

<?php
// don't track admins or editors and google analytics option is filled in
if ( ! current_user_can( 'edit_pages' ) && get_option( 'client_google_analytics' ) ) :
  $analytics_id = get_option( 'client_google_analytics' ); ?>

  <!-- Google Universal Analytics -->
  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
    ga('create', '<?= $analytics_id; ?>', 'auto');ga('send', 'pageview');
  </script>
<?php endif; ?>

</body>
</html>
