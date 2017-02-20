<?php
/*
    HTML5 Blank Slate
    function.php

*/

/* Enqueue Scripts and Styles */
require( 'includes/enqueue.php' );

/* Advanced Custom Fields and Settings */
require( 'includes/acf-settings.php' );

/* Default custom fields for Theme Settings */
require( 'includes/acf-defaults.php' );

/* h5bs Walker Navs */
require( 'includes/walker-nav.php' );

/* WordPress Theme Support */
require( 'includes/theme-support.php' );

/* BrowserSync automatic injection */
require( 'includes/browsersync.php' );

/* Helpers */
require( 'includes/helpers.php' );
