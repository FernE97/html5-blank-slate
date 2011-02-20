<?php
/*
	=================================================
	HTML5 Blank Slate - Default Footer Template
	Author: Eric Fernandez - www.efdezigns.com
	=================================================
*/
?>

</div><!-- end container -->

<footer role="contentinfo">
	<nav role="navigation">
	<?php if ( has_nav_menu('secondary') ) {
		wp_nav_menu( array (
			'theme_location'    => 'secondary',
			'container'         => false,
			'menu_id'           => 'nav-sub',
			'depth'             => 0, // set to 1 to disable dropdowns
			'fallback_cb'       => false
		));
	} else { ?>
		<ul id="nav-sub" class="menu">
			<?php wp_list_pages('title_li='); ?>
		</ul>
	<?php } ?>
	</nav>
	<p id="copyright">&copy;<?php echo date('Y'); ?> www.efdezigns.com</p>
</footer>

<?php // JavaScript added through functions.php to avoid conflicts ?>

<!--[if lt IE 7 ]>
	<script src="<?php bloginfo('template_url'); ?>/lib/js/dd_belatedpng.js"></script>
	<script> DD_belatedPNG.fix('img, .png-bg'); </script>
<![endif]-->

<?php wp_footer(); ?>

<!-- asynchronous google analytics -->
<script>
	var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
	(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
	g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
	s.parentNode.insertBefore(g,s)}(document,'script'));
</script>

</body>
</html>