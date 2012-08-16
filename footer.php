<?php
/*
	=================================================
	HTML5 Blank Slate - Default Footer Template
	=================================================
*/
?>

</div><!-- end container -->

<footer role="contentinfo">
	<nav role="navigation">
	<?php if ( has_nav_menu( 'secondary ') ) {
		wp_nav_menu( array (
			'theme_location' => 'secondary',
			'container'      => false,
			'menu_id'        => 'nav-sub',
			'depth'          => 0, // set to 1 to disable dropdowns
			'fallback_cb'    => false
		));
	} else { ?>
		<ul id="nav-sub" class="menu">
			<?php wp_list_pages( 'title_li=' ); ?>
		</ul>
		<?php
	} ?>
	</nav>
	<p id="copyright">&copy;<?php echo date( 'Y' ); ?> <a href="http://efdezigns.com/">Bay Area Web Design</a></p>
</footer>

<?php // JavaScript added through functions.php to avoid conflicts ?>

<!-- Prompt IE 6 & 7 users to install Chrome Frame -->
<!--[if lt IE 8 ]>
	<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
    <script>window.attachEvent("onload",function(){CFInstall.check({mode:"overlay"})})</script>
<![endif]-->

<?php wp_footer(); ?>

<!-- Google Analytics -->
<script>
	var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
	(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
	g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
	s.parentNode.insertBefore(g,s)}(document,'script'));
</script>

</body>
</html>