<?php
/*
    HTML5 Blank Slate
    function.php

*/

/* Enqueueing of Scripts and Styles */
require( 'includes/enqueue.php' );

/* Defaults for ACF: wp-admin > Theme Settings */
require( 'includes/acf-defaults.php' );

/* Walker Navigation */
require( 'includes/walker-nav.php' );

/* WordPress Theme Support */
require( 'includes/theme-support.php' );

/* BrowserSync auto inject */
require( 'includes/browsersync.php' );

/* PHP Helpers Functions */
require( 'includes/helpers.php' );
