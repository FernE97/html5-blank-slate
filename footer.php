<?php
/*
	=================================================
	HTML5 Blank Slate - Default Footer Template
	=================================================
*/
?>

</div><!-- end container -->

<footer class="site-footer" role="contentinfo">
	<nav role="navigation">
		<?php h5bs_secondary_nav(); ?>
	</nav>

	<p class="copyright">&copy;<?php echo date( 'Y' ); ?> <a href="http://efdezigns.com/">Bay Area Web Design</a></p>
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