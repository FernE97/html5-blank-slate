<?php

// Custom Menus
add_action( 'init', 'register_my_menus' );

function register_my_menus() {
	register_nav_menus(
		array(
			'primary' => __('Primary Navigation'),
			'secondary' => __('Secondary Navigation'),
			'tertiary' => __('Tertiary Navigation')
		)
	);
}


// Image Thumbnails
add_theme_support('post-thumbnails');


// Enqueue Scripts
function enqueue_my_scripts() {
	if (!is_admin()) { // Don't load scripts in the admin section
		wp_deregister_script( 'jquery' ); // Load Jquery from Google CDN instead
		wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js', false, '1.5', true);
		wp_enqueue_script( 'jquery' );
		
		// enqueue all other js files here
		wp_enqueue_script('plugins', get_bloginfo('template_url') . '/lib/js/plugins.js', array('jquery'), '1.0', true);
		wp_enqueue_script('script', get_bloginfo('template_url') . '/lib/js/script.js', array('jquery'), '1.0', true);
	}
}

add_action('init', 'enqueue_my_scripts');