<?php

// Enqueue Styles
function h5bs_enqueue_styles() {
    //wp_enqueue_style('font-awesome', 'https://use.fontawesome.com/releases/v5.4.2/css/all.css"');
    wp_enqueue_style('h5bs-theme', get_template_directory_uri() . '/assets/css/theme.css', false, '3.6.0');
    wp_enqueue_style('h5bs-custom', get_template_directory_uri() . '/custom.css', false, '3.6.0');
}

add_action('wp_enqueue_scripts', 'h5bs_enqueue_styles');

// Enqueue Scripts
function h5bs_enqueue_scripts() {
    wp_enqueue_script('vendor-js', get_template_directory_uri() . '/assets/js/vendor.bundle.js', array('jquery'), '3.6.0', true);
    // wp_enqueue_script('commons-js', get_template_directory_uri() . '/assets/js/commons.bundle.js', array(), '3.6.0', true);
    wp_enqueue_script('bundle-js', get_template_directory_uri() . '/assets/js/bundle.js', array('jquery'), '3.6.0', true);
}

add_action('wp_enqueue_scripts', 'h5bs_enqueue_scripts');

// Custom Menus
function h5bs_register_menus() {
    register_nav_menus(array(
        'primary' => __('Primary Navigation', 'h5bs'),
        'secondary' => __('Secondary Navigation', 'h5bs'),
        'footer' => __('Footer Navigation', 'h5bs'),
        'mobile' => __('Mobile Navigation', 'h5bs'),
    ));
}

add_action('init', 'h5bs_register_menus');

function h5bs_primary_nav() {
    wp_nav_menu(array(
        'container' => false, // remove nav container
        'menu' => 'Primary Nav', // nav name
        'menu_id' => 'nav-main', // custom id
        'menu_class' => 'nav-main nav group', // custom class
        'theme_location' => 'primary', // where it's located in the theme
        'before' => '', // before the menu
        'after' => '', // after the menu
        'link_before' => '', // before each link
        'link_after' => '', // after each link
        'depth' => 0, // set to 1 to disable dropdowns
        'fallback_cb' => 'h5bs_nav_fallback', // fallback function
    ));
}

function h5bs_secondary_nav() {
    wp_nav_menu(array(
        'container' => false, // remove nav container
        'menu' => 'Secondary Nav', // nav name
        'menu_id' => 'nav-sub', // custom id
        'menu_class' => 'nav-sub nav group', // custom class
        'theme_location' => 'secondary', // where it's located in the theme
        'before' => '', // before the menu
        'after' => '', // after the menu
        'link_before' => '', // before each link
        'link_after' => '', // after each link
        'depth' => 0, // set to 1 to disable dropdowns
        'fallback_cb' => 'h5bs_nav_fallback', // fallback function
    ));
}

function h5bs_footer_nav() {
    wp_nav_menu(array(
        'container' => false, // remove nav container
        'menu' => 'Footer Nav', // nav name
        'menu_id' => 'nav-footer', // custom id
        'menu_class' => 'nav-footer nav group', // custom class
        'theme_location' => 'footer', // where it's located in the theme
        'before' => '', // before the menu
        'after' => '', // after the menu
        'link_before' => '', // before each link
        'link_after' => '', // after each link
        'depth' => 0, // set to 1 to disable dropdowns
        'fallback_cb' => 'h5bs_nav_fallback', // fallback function
    ));
}

function h5bs_mobile_nav() {
    wp_nav_menu(array(
        'container' => false, // remove nav container
        'menu' => 'Mobile Nav', // nav name
        'menu_id' => 'nav-mobile', // custom id
        'menu_class' => 'nav-mobile nav group', // custom class
        'theme_location' => 'mobile', // where it's located in the theme
        'before' => '', // before the menu
        'after' => '', // after the menu
        'link_before' => '', // before each link
        'link_after' => '', // after each link
        'depth' => 0, // set to 1 to disable dropdowns
        'fallback_cb' => 'h5bs_nav_fallback', // fallback function
    ));
}

function h5bs_nav_fallback() {
    wp_page_menu(array(
        'menu_class' => 'nav group',
        'include' => '',
        'exclude' => '',
        'link_before' => '',
        'link_after' => '',
        'show_home' => true,
    ));
}

// Image Thumbnails
add_theme_support('post-thumbnails');

// html5 search form
add_theme_support('html5', array('search-form'));

// Add class to next/prev page links
add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_attributes');

function posts_link_attributes() {
    return 'class="button tiny radius"';
}

// Excerpts
function custom_excerpt_length($length) {
    return 48;
}

add_filter('excerpt_length', 'custom_excerpt_length', 999);

function new_excerpt_more($more) {
    return '...';
}

add_filter('excerpt_more', 'new_excerpt_more');

// Remove junk from head
function h5bs_remove_junk() {
    // Really Simple Discovery
    remove_action('wp_head', 'rsd_link');
    // Windows Live Writer
    remove_action('wp_head', 'wlwmanifest_link');
    // WP Version
    remove_action('wp_head', 'wp_generator');
}

add_action('init', 'h5bs_remove_junk');

// Sidebars & Widgetizes Areas
function h5bs_register_sidebars() {
    register_sidebar(array(
        'id' => 'sidebar1',
        'name' => 'Sidebar 1',
        'description' => 'The first (primary) sidebar.',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widgettitle">',
        'after_title' => '</h4>',
    ));
}

add_action('widgets_init', 'h5bs_register_sidebars');

// Comments List
function h5bs_comments($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;

    if (get_comment_type() == 'pingback' || get_comment_type() == 'trackback'): ?>
      <li class="pingback" id="comment-<?php comment_ID();?>">
        <article <?php comment_class('group');?>> <header class="comment-meta">
            <h5>
              <?php _e('Pingback:', 'h5bs');?>
            </h5>
            <p>
              <?php edit_comment_link();?>
            </p>
          </header>
          <p>
            <?php comment_author_link();?>
          </p>
        </article>
        <?php // WordPress closes </li>

    elseif (get_comment_type() == 'comment'): ?>
      <li id="comment-<?php comment_ID();?>">
        <article <?php comment_class('group');?>> <header class="comment-meta">
            <h5>
              <?php comment_author_link();?>
            </h5>
            <p class="comment-date">on
              <?php comment_date();?> at
              <?php comment_time();?>
            </p>
            <p class="reply">
              <?php comment_reply_link(array_merge($args, array('reply_text' => __('Reply', 'h5bs'), 'depth' => $depth, 'max_depth' => $args['max_depth'])));?>
            </p>
          </header>
          <figure class="comment-avatar">
      <?php
$avatar_size = 80;
    echo get_avatar($comment, $avatar_size);
    ?>
    </figure>
    <?php if ('0' == $comment->comment_approved): ?>
    <p class="comment-awaiting-moderation">
      <?php _e('Your comment is awaiting moderation.', 'h5bs');?>
    </p>
    <?php endif;?>
    <?php comment_text();?>
  </article>
  <?php // WordPress closes </li>
    endif;
}

/** https://github.com/blineberry/Improved-HTML5-WordPress-Captions **/
// Removes inline styling from wp-caption and changes to HTML5 figure/figcaption
add_filter('img_caption_shortcode', 'h5bs_img_caption_shortcode_filter', 10, 3);

function h5bs_img_caption_shortcode_filter($val, $attr, $content = null) {
    extract(shortcode_atts(array(
        'id' => '',
        'align' => '',
        'width' => '',
        'caption' => '',
    ), $attr));

    if (1 > (int) $width || empty($caption)) {
        return $val;
    }

    return '<figure id="' . $id . '" class="wp-caption ' . esc_attr($align) . '" style="width: ' . $width . 'px;">'
    . do_shortcode($content) . '<figcaption class="wp-caption-text">' . $caption . '</figcaption></figure>';
}

// Client Options Page
require_once 'includes/client-options.php';
add_action('admin_menu', 'h5bs_client_options');

// Translation
// require_once( 'includes/lang/translation.php' ); // uncomment if needed

// Run this code on 'after_theme_setup', when plugins have already been loaded.
add_action('after_setup_theme', 'acf_extensions');
function acf_extensions() {
    // Check to see if the plugin has already been loaded.
    if (!class_exists('acf_field_post_type_selector_plugin')) {
        include_once get_template_directory() . '/includes/acf-configs/acf-extensions/acf-post-type-selector/acf-post-type-selector.php';
    }
}

// Generate CSS using values from ACF fields
// Each time a page is updated in WP Admin, this updates the CSS
function generate_acf_css() {
    // Capture all output into buffer
    ob_start();
    // Grab the acf-styles.php file
    require get_stylesheet_directory() . '/includes/acf-configs/acf-styles.php';
    // Store output in a variable, then flush the buffer
    $css = ob_get_clean();
    // Minify output
    $css = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $css);
    $css = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $css);
    // Save as a css file
    file_put_contents(get_stylesheet_directory() . '/assets/css/acf-styles.css', $css, LOCK_EX);
}
// Parse the output and write the CSS file on post save
// https://www.advancedcustomfields.com/resources/acf-save_post/
add_action('acf/save_post', 'generate_acf_css', 99999);

// By default, if you make an acf-json folder in your theme folder,
// each time you change a field it will export the JSON for the group.
// To limit clutter of base theme folder, you can change the location of those saves
add_filter('acf/settings/save_json', 'custom_acf_json_save_point');
function custom_acf_json_save_point($path) {
    // update path
    $path = dirname(__FILE__) . '/includes/acf-configs/acf-json';
    return $path;
}

// Sets the acf-json loading point to the custom save point
// You'll have the option to sync the field group: https://i.imgur.com/5QgAnFE.png --> https://i.imgur.com/7kQUZN4.png
add_filter('acf/settings/load_json', 'custom_acf_json_load_point');
function custom_acf_json_load_point($paths) {
    // remove original path
    unset($paths[0]);
    // append path
    $paths[] = dirname(__FILE__) . '/includes/acf-configs/acf-json';
    return $paths;
}

// Enqueue the created stylesheet
add_action('wp_enqueue_scripts', 'enqueue_acf_styles');
function enqueue_acf_styles() {
    wp_enqueue_style('acf-styles', get_template_directory_uri() . '/assets/css/acf-styles.css');
}

// ACF JavaScript API seems very powerful, could be useful in the future
// https://www.advancedcustomfields.com/resources/javascript-api/

add_action('acf/input/admin_enqueue_scripts', 'acf_js_enqueue');
function acf_js_enqueue() {
    wp_register_script('acf-js', get_template_directory_uri() . '/includes/acf-configs/acf-scripts.js', 'acf-input', false, true);
    wp_localize_script('acf-js', 'global_settings', get_field('global', 'option')); // Pass 'Global Options' ACF group
    wp_enqueue_script('acf-js');
  }

if( function_exists('acf_add_options_page') ) {
	acf_add_options_page("Global Options");
}

// Lower ACF WYSIWYG editor height
function acf_wysiwyg() { ?>
	<script type="text/javascript">
		(function($) {
			acf.add_action('wysiwyg_tinymce_init', function( ed, id, mceInit, $field ){
				$(".acf-field-wysiwyg .mce-edit-area iframe").removeAttr("style");
        $(".acf-field-wysiwyg .mce-edit-area iframe").attr("style", "height: 75px; min-height: 50px; width: 100%;");
			});
		})(jQuery);
	</script>
<?php }
add_action('acf/input/admin_footer', 'acf_wysiwyg');
