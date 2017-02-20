<?php
// ACF Options
if ( function_exists( 'acf_add_options_page' ) ) {
    acf_add_options_page(array(
        'page_title'  => 'Theme General Settings',
        'menu_title'  => 'Theme Settings',
        'menu_slug'   => 'theme-general-settings',
        'capability'  => 'edit_posts',
        'redirect'    => false
    ));

    acf_add_options_sub_page(array(
        'page_title'  => 'Theme Header Settings',
        'menu_title'  => 'Header',
        'parent_slug' => 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title'  => 'Theme Footer Settings',
        'menu_title'  => 'Footer',
        'parent_slug' => 'theme-general-settings',
    ));
}

// Hide ACF menu
// add_filter( 'acf/settings/show_admin', '__return_false' );

/* Custom instance of the Walker_Nav_Menu
 * for the purpose of adding in Foundation 6 top-bar
 * class .vertical and .menu
 *
 * This only needs to be instantiated for the primary nav
 */
