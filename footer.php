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

</body>
</html>
