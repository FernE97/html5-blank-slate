<?php

// Translations
load_theme_textdomain( 'h5bs', get_template_directory() . '/lib/language' );

$locale      = get_locale();
$locale_file = get_template_directory() . "/lib/language/$locale.php";

if ( is_readable( $locale_file ) ) require_once( $locale_file );
