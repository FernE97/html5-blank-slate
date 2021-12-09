<?php

// Enqueue Styles
function h5bs_enqueue_styles()
{
  wp_enqueue_style('h5bs-custom', get_template_directory_uri().'/custom.css', false, '1.0.0');
}

add_action('wp_enqueue_scripts', 'h5bs_enqueue_styles');

// Enqueue Scripts
function h5bs_enqueue_scripts()
{
  // wp_enqueue_script('example', get_template_directory_uri().'/assets/js/example.js', [], '1.0.0', true);
}

add_action('wp_enqueue_scripts', 'h5bs_enqueue_scripts');


// Vite assets helpers
define('IS_DEVELOPMENT', is_development());
define('DIST_PATH', get_template_directory_uri().'/dist/');

function endsWith(string $haystack, string $needle): bool
{
  return substr($haystack, -strlen($needle)) === $needle;
}

function is_development(): bool
{
  if (isset($_SERVER['SERVER_NAME'])) {
    if (
      $_SERVER['SERVER_NAME'] == 'localhost'
      || endsWith($_SERVER['SERVER_NAME'], '.test')
      || endsWith($_SERVER['SERVER_NAME'], '.local')
    ) {
      return true;
    }
  }

  return false;
}

function vite(String $entry): string
{
  return vite_js_tag($entry)
    .vite_js_preload_imports($entry)
    .vite_css_tag($entry);
}

// Helpers to print tags
function vite_js_tag(string $entry): string
{
  $url = IS_DEVELOPMENT ? 'http://localhost:3005/'.$entry : vite_asset_url($entry);

  if (!$url) {
    return '';
  }

  return '<script type="module" crossorigin src="'.$url.'"></script>';
}

function vite_js_preload_imports(string $entry): string
{
  if (IS_DEVELOPMENT) {
    return '';
  }

  $res = '';
  foreach (vite_imports_urls($entry) as $url) {
    $res .= '<link rel="modulepreload" href="'.$url.'">';
  }

  return $res;
}

function vite_css_tag(string $entry): string
{
  // not needed on dev, it's injected by Vite
  if (IS_DEVELOPMENT) {
    return '';
  }

  $tags = '';
  foreach (vite_css_urls($entry) as $url) {
    $tags .= '<link rel="stylesheet" href="'.$url.'">';
  }

  return $tags;
}

// Helpers to locate files
function vite_get_manifest(): array
{
  $content = file_get_contents(__DIR__.'/../dist/manifest.json');

  return json_decode($content, true);
}

function vite_asset_url(string $entry): string
{
  $manifest = vite_get_manifest();

  return isset($manifest[$entry]) ? DIST_PATH.$manifest[$entry]['file'] : '';
}

function vite_imports_urls(string $entry): array
{
  $urls = [];
  $manifest = vite_get_manifest();

  if (!empty($manifest[$entry]['imports'])) {
    foreach ($manifest[$entry]['imports'] as $imports) {
      $urls[] = DIST_PATH.$manifest[$imports]['file'];
    }
  }

  return $urls;
}

function vite_css_urls(string $entry): array
{
  $urls = [];
  $manifest = vite_get_manifest();

  if (!empty($manifest[$entry]['css'])) {
    foreach ($manifest[$entry]['css'] as $file) {
      $urls[] = DIST_PATH.$file;
    }
  }

  return $urls;
}
