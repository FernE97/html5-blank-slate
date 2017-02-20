<?php
// Enqueue Styles
function h5bs_enqueue_styles() {
    wp_register_style( 'h5bs-theme', get_template_directory_uri() . '/assets/stylesheets/theme.css', false, '3.7.0' );
    wp_register_style( 'h5bs-custom', get_template_directory_uri() . '/custom.css', false, '3.7.0' );

    // Font Awesome 4.7.0
    wp_register_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', false, '4.7.0' );
    wp_enqueue_style( 'font-awesome' );

    wp_enqueue_style( 'h5bs-theme' );
    wp_enqueue_style( 'h5bs-custom' ); // keep at bottom to overwrite other styles
}
add_action( 'wp_enqueue_scripts', 'h5bs_enqueue_styles' );

// Enqueue Scripts
function h5bs_enqueue_scripts() {
    wp_register_script( 'main', get_template_directory_uri() . '/assets/javascripts/main.js', array( 'jquery' ), '3.7.0', true );
    wp_enqueue_script( 'main' );
}
add_action( 'wp_enqueue_scripts', 'h5bs_enqueue_scripts' );
