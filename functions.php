<?php

// Custom Menus
function h5bs_register_menus() {
	register_nav_menus(array(
		'primary'   => __('Primary Navigation'),
		'secondary' => __('Secondary Navigation'),
		'tertiary'  => __('Tertiary Navigation')
	));
}

add_action( 'init', 'h5bs_register_menus' );


function h5bs_primary_nav() {
	wp_nav_menu(array( 
		'container'       => false,                        // remove nav container
		'menu'            => 'Primary Nav',                // nav name
		'menu_id'         => 'nav-main',                   // custom id
		'menu_class'      => 'nav group',                  // custom class
		'theme_location'  => 'primary',                    // where it's located in the theme
		'before'          => '',                           // before the menu
		'after'           => '',                           // after the menu
		'link_before'     => '',                           // before each link
		'link_after'      => '',                           // after each link
		'depth'           => 0,                            // set to 1 to disable dropdowns
		'fallback_cb'     => 'h5bs_primary_nav_fallback'   // fallback function
	));
}

function h5bs_secondary_nav() {
	wp_nav_menu(array( 
		'container'       => false,                        // remove nav container
		'menu'            => 'Secondary Nav',              // nav name
		'menu_id'         => 'nav-sub',                    // custom id
		'menu_class'      => 'nav group',                  // custom class
		'theme_location'  => 'secondary',                  // where it's located in the theme
		'before'          => '',                           // before the menu
		'after'           => '',                           // after the menu
		'link_before'     => '',                           // before each link
		'link_after'      => '',                           // after each link
		'depth'           => 0,                            // set to 1 to disable dropdowns
		'fallback_cb'     => 'h5bs_secondary_nav_fallback' // fallback function
	));
}

function h5bs_primary_nav_fallback() {
	wp_page_menu(array(
		'menu_class'  => 'nav group',
		'include'     => '',
		'exclude'     => '',
		'link_before' => '',
		'link_after'  => '',
		'show_home'   => true
	));
}

function h5bs_secondary_nav_fallback() {
	wp_page_menu(array(
		'menu_class'  => 'nav group',
		'include'     => '',
		'exclude'     => '',
		'link_before' => '',
		'link_after'  => '',
		'show_home'   => true
	));
}


// Image Thumbnails
add_theme_support( 'post-thumbnails' );


// Remove junk from head
function h5bs_remove_junk() {
	// Really Simple Discovery
	remove_action( 'wp_head', 'rsd_link' );
	// Windows Live Writer
	remove_action( 'wp_head', 'wlwmanifest_link' );
	// WP Version
	remove_action( 'wp_head', 'wp_generator' );
}

add_action( 'init', 'h5bs_remove_junk' );


// Enqueue Global Scripts
function h5bs_enqueue_scripts() {
	wp_deregister_script( 'jquery' ); // Load Jquery from Google CDN instead
	wp_register_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js', array(), '1.8.0', true );
	wp_register_script( 'modernizr', get_template_directory_uri() . '/lib/js/modernizr.js', array(), '2.6.2', false );
	// wp_register_script( 'plugins', get_template_directory_uri() . '/lib/js/plugins.js', array( 'jquery' ), '1.0', true );
	wp_register_script( 'main-js', get_template_directory_uri() . '/lib/js/main.js', array( 'jquery' ), '1.0', true );

	wp_enqueue_script( 'modernizr' );
	// wp_enqueue_script( 'plugins' );
	wp_enqueue_script( 'main-js' );
}

add_action( 'wp_enqueue_scripts', 'h5bs_enqueue_scripts' );


// Sidebars & Widgetizes Areas
function h5bs_register_sidebars() {
	register_sidebar(array(
		'id'            => 'sidebar1',
		'name'          => 'Sidebar 1',
		'description'   => 'The first (primary) sidebar.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widgettitle">',
		'after_title'   => '</h4>',
	));

	/* 
	uncomment to add additional sidebar

	register_sidebar(array(
		'id'            => 'sidebar2',
		'name'          => 'Sidebar 2',
		'description'   => 'The second (secondary) sidebar.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widgettitle">',
		'after_title'   => '</h4>',
	));
	*/
}

add_action( 'widgets_init', 'h5bs_register_sidebars' );


/** https://github.com/blineberry/Improved-HTML5-WordPress-Captions **/
// Removes inline styling from wp-caption and changes to HTML5 figure/figcaption
add_filter( 'img_caption_shortcode', 'h5bs_img_caption_shortcode_filter', 10, 3 );

function h5bs_img_caption_shortcode_filter($val, $attr, $content = null) {
	extract(shortcode_atts(array(
		'id'      => '',
		'align'   => '',
		'width'   => '',
		'caption' => ''
	), $attr));
	
	if ( 1 > (int) $width || empty($caption) )
		return $val;

	return '<figure id="' . $id . '" class="wp-caption ' . esc_attr($align) . '" style="width: ' . $width . 'px;">'
	. do_shortcode( $content ) . '<figcaption class="wp-caption-text">' . $caption . '</figcaption></figure>';
}


// Client Options Page
require_once( 'lib/inc/client-options.php' );
add_action( 'admin_menu', 'h5bs_client_options' );
