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

  <title><?php wp_title( '|', true, 'right' ); ?></title>

  <?php // Place favicon.ico and apple-touch-icon.png in the root of the domain ?>

  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header class="site-header grid-x align-middle" role="banner">
  <a href="<?= home_url( '/' ); ?>" class="logo cell shrink"><?php bloginfo( 'name' ); ?></a>

  <nav class="nav-main-wrap cell auto" role="navigation">
    <?php h5bs_primary_nav(); ?>
  </nav>
  
  <button class="site-header__openModal cell shrink hide-for-medium ml-auto" data-open="mobile-menu">
    <svg class="site-header__svg svg svg--open cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 459 459"><path fill="currentColor" d="M0 382.5h459v-51H0v51zM0 255h459v-51H0v51zM0 76.5v51h459v-51H0z"/></svg>
  </button>
  
  <nav id="mobile-menu" class="site-header__mobileMenu nav-mobile-wrap reveal full hide-for-medium" role="navigation" data-reveal data-animation-in="fade-in-up" data-animation-out="fade-in-down" data-overlay="false">
    <div class="grid-y grid-margin-y h-100">
      <div class="cell shrink grid-x align-middle">
        <a href="<?= home_url( '/' ); ?>" class="logo cell shrink"><?php bloginfo( 'name' ); ?></a>
        <button class="site-header__closeModal cell shrink ml-auto" data-close aria-label="Close modal">
          <svg class="site-header__svg svg svg--closeModal cursor-pointer" data-close aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30"><path fill="currentColor" d="M19.92 18.33l-3.706-3.705 3.706-3.705a1.129 1.129 0 000-1.59 1.129 1.129 0 00-1.59 0l-3.705 3.706L10.92 9.33c-.436-.435-1.097-.499-1.59 0-.499.5-.421 1.168 0 1.59l3.706 3.705L9.33 18.33c-.47.472-.45 1.147 0 1.59.45.45 1.154.435 1.59 0l3.705-3.706 3.705 3.706a1.129 1.129 0 001.59 0 1.116 1.116 0 000-1.59z"/><path fill="currentColor" d="M29.25 14.625c0 8.079-6.546 14.625-14.625 14.625S0 22.704 0 14.625 6.546 0 14.625 0 29.25 6.546 29.25 14.625zM14.625 1.969c-3.382 0-6.56 1.315-8.95 3.705a12.572 12.572 0 00-3.706 8.951c0 3.382 1.315 6.56 3.705 8.95a12.572 12.572 0 008.951 3.706c3.382 0 6.56-1.315 8.95-3.705a12.572 12.572 0 003.706-8.951c0-3.382-1.315-6.56-3.705-8.95a12.572 12.572 0 00-8.951-3.706"/></svg>
        </button>
      </div>
    
      <div class="cell auto grid-x align-center-middle text-center flex-1 site-header__mobileNav">
        <?php h5bs_mobile_nav(); ?>
      </div>
    </div>
  </nav>
</header>
