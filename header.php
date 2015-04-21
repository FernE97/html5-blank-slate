<?php
/**
 * Default Header Template
 *
 */
?>
<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php wp_title( '|', true, 'right' ); bloginfo( 'name' ); ?></title>

    <?php // Place favicon.ico and apple-touch-icon.png in the root of the domain ?>

    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header class="site-header" role="banner">
    <p class="logo"><a href="<?php echo home_url( '/' ); ?>"><?php bloginfo( 'name' ); ?></a></p>

    <nav role="navigation">
        <?php h5bs_primary_nav(); ?>
    </nav>
</header>
