<?php

class h5bs_Nav_Menu extends Walker_Nav_menu {
    function start_lvl( &$output, $depth = 0, $args = array() ) {
  		if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
  			$t = '';
  			$n = '';
  		} else {
  			$t = "\t";
  			$n = "\n";
  		}
  		$indent = str_repeat( $t, $depth );
  		$output .= "{$n}{$indent}<ul class=\"sub-menu vertical menu\">{$n}";
  	}
}

// Custom Menus
function h5bs_register_menus() {
    register_nav_menus(array(
        'primary'   => __( 'Primary Navigation', 'h5bs' ),
        'secondary' => __( 'Secondary Navigation', 'h5bs' ),
        'footer'    => __( 'Footer Navigation', 'h5bs' ),
        'mobile'    => __( 'Mobile Navigation', 'h5bs' )
    ));
}
add_action( 'init', 'h5bs_register_menus' );

function h5bs_primary_nav() {
    wp_nav_menu(array(
        'walker'          => new h5bs_Nav_Menu(),          // register h5bs custom walker
        'container'       => false,                        // remove nav container
        'menu'            => 'Primary Nav',                // nav name
        'menu_id'         => 'nav-main',                   // custom id
        'menu_class'      => 'dropdown menu nav-main nav group',         // custom class
        'theme_location'  => 'primary',                    // where it's located in the theme
        'before'          => '',                           // before the menu
        'after'           => '',                           // after the menu
        'link_before'     => '',                           // before each link
        'link_after'      => '',                           // after each link
        'depth'           => 0,                            // set to 1 to disable dropdowns
        'fallback_cb'     => 'h5bs_nav_fallback'           // fallback function
    ));
}

function h5bs_secondary_nav() {
    wp_nav_menu(array(
        'container'       => false,                        // remove nav container
        'menu'            => 'Secondary Nav',              // nav name
        'menu_id'         => 'nav-sub',                    // custom id
        'menu_class'      => 'nav-sub nav group',          // custom class
        'theme_location'  => 'secondary',                  // where it's located in the theme
        'before'          => '',                           // before the menu
        'after'           => '',                           // after the menu
        'link_before'     => '',                           // before each link
        'link_after'      => '',                           // after each link
        'depth'           => 0,                            // set to 1 to disable dropdowns
        'fallback_cb'     => 'h5bs_nav_fallback'           // fallback function
    ));
}

function h5bs_footer_nav() {
    wp_nav_menu(array(
        'container'       => false,                        // remove nav container
        'menu'            => 'Footer Nav',                 // nav name
        'menu_id'         => 'nav-footer',                 // custom id
        'menu_class'      => 'nav-footer nav group',       // custom class
        'theme_location'  => 'footer',                     // where it's located in the theme
        'before'          => '',                           // before the menu
        'after'           => '',                           // after the menu
        'link_before'     => '',                           // before each link
        'link_after'      => '',                           // after each link
        'depth'           => 0,                            // set to 1 to disable dropdowns
        'fallback_cb'     => 'h5bs_nav_fallback'           // fallback function
    ));
}

function h5bs_mobile_nav() {
    wp_nav_menu(array(
        'container'       => false,                        // remove nav container
        'menu'            => 'Mobile Nav',                 // nav name
        'menu_id'         => 'nav-mobile',                 // custom id
        'menu_class'      => 'nav-mobile nav group',       // custom class
        'theme_location'  => 'mobile',                     // where it's located in the theme
        'before'          => '',                           // before the menu
        'after'           => '',                           // after the menu
        'link_before'     => '',                           // before each link
        'link_after'      => '',                           // after each link
        'depth'           => 0,                            // set to 1 to disable dropdowns
        'fallback_cb'     => 'h5bs_nav_fallback'           // fallback function
    ));
}

function h5bs_nav_fallback() {
    wp_page_menu(array(
        'menu_class'  => 'menu nav group',
        'include'     => '',
        'exclude'     => '',
        'link_before' => '',
        'link_after'  => '',
        'show_home'   => true
    ));
}
