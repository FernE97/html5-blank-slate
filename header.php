<?php
/*
	=================================================
	HTML5 Blank Slate - Default Header Template
	Author: Eric Fernandez - www.efdezigns.com
	=================================================
*/
?>
<!doctype html>
<!--[if IE 6 ]> <html <?php language_attributes(); ?> class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]> <html <?php language_attributes(); ?> class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]> <html <?php language_attributes(); ?> class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]> <html <?php language_attributes(); ?> class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html <?php language_attributes(); ?> class="no-js"> <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">
	
	<title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>
	
	<!-- Place favicon.ico and apple-touch-icon.png in the root of the domain -->

	<!-- Versioning enabled for caching -->
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>?v=1.0">
	
	<?php // JavaScript added through functions.php to avoid conflicts ?>
	
	<!-- Enables advanced css selectors in IE, must be used with a JavaScript library (jQuery Enabled in functions.php) -->
	<!--[if lt IE 9]>
		<script src="<?php bloginfo('template_url'); ?>/lib/js/selectivizr.js?v=1.0.1"></script>
	<![endif]-->

	 <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	 
	<?php wp_head(); ?>
</head>

<body <?php if (is_front_page()) { ?> id="home"<?php } elseif (is_home() || is_single() || is_archive()) { ?> id="blog" <?php } else { ?> id="interior" class="<?php $post_data = get_post($post->post_parent); echo $slug = $post_data->post_name; ?>"<?php } ?>>

<div id="container">
	<header role="banner">
		<nav role="navigation">
		<?php if ( has_nav_menu('primary') ) {
			wp_nav_menu( array (
				'theme_location'    => 'primary',
				'container'         => '',
				'menu_id'           => 'nav-main',
				'depth'             => 0, // set to 1 to disable dropdowns
				'fallback_cb'       => false
			));
		} else { ?>
			<ul id="nav-main" class="menu">
				<?php wp_list_pages('title_li='); ?>
			</ul>
		<?php } ?>
		</nav>
	</header>