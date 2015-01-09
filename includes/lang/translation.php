<?php
// Translations
load_theme_textdomain( 'h5bs', get_template_directory() . '/lib/lang' );

$locale      = get_locale();
$locale_file = get_template_directory() . "/lib/lang/$locale.php";

if ( is_readable( $locale_file ) ) require_once( $locale_file );
