<?php
/*
	=================================================
	HTML5 Blank Slate - Default Header Template
	=================================================
*/
?>
<!doctype html>
<!--[if lt IE 7]>      <html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 ie7"> <![endif]-->
<!--[if IE 8]>         <html <?php language_attributes(); ?> class="no-js lt-ie9 ie8"> <![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"> <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="author" content="Eric Fernandez | www.efdezigns.com">
	<!-- Enable if site is optimized for mobile devices -->
	<!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
	
	<title><?php wp_title( '|', true, 'right' ); bloginfo( 'name' ); ?></title>
	
	<!-- Place favicon.ico and apple-touch-icon.png in the root of the domain -->
	
	<!-- Versioning enabled for caching -->
	<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>?v=1.2">
	
	<?php // JavaScript added through functions.php to avoid conflicts ?>
	
	<!-- Enables advanced css selectors in IE, must be used with a JavaScript library (jQuery Enabled in functions.php) -->
	<!--[if lt IE 9]>
		<script src="<?php bloginfo( 'template_url' ); ?>/lib/js/selectivizr.js?v=1.0.2"></script>
	<![endif]-->
	
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="container">
	<header class="header" role="banner">
		<p id="logo"><a href="<?php bloginfo( 'url' ); ?>"><?php bloginfo( 'name' ); ?></a></p>
		
		<nav role="navigation">
		<?php if ( has_nav_menu( 'primary' ) ) {
			wp_nav_menu( array (
				'theme_location' => 'primary',
				'container'      => '',
				'menu_id'        => 'nav-main',
				'depth'          => 0, // set to 1 to disable dropdowns
				'fallback_cb'    => false
			));
		} else { ?>
			<ul id="nav-main" class="menu">
				<?php wp_list_pages( 'title_li=' ); ?>
			</ul>
			<?php
		} ?>
		</nav>
	</header>