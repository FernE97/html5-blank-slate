<?php

// Get image url
function get_img(string $name): string
{
  if ($name) {
    return get_stylesheet_directory_uri()."/src/assets/images/{$name}";
  }

  return '';
}

// Print image url
function img(string $name)
{
  echo get_img($name);
}

// Get content of an svg
function get_svg(string $name): string
{
  if ($name) {
    return file_get_contents(get_template_directory()."/src/assets/images/{$name}.svg");
  }

  return '';
}

// Print svg content
function svg(string $name)
{
  echo get_svg($name);
}
