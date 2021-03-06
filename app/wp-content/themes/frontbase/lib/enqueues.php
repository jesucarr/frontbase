<?php 
/**
 * Enqueue scripts and stylesheets
 *
 * Enqueue stylesheets in the following order:
 * 1. /theme/assets/css/bootstrap.css
 * 2. /theme/assets/css/bootstrap-responsive.css
 * 3. /theme/assets/css/app.css
 * 4. /child-theme/style.css (if a child theme is activated)
 *
 * Enqueue scripts in the following order:
 * 1. jquery-1.9.1.min.js via Google CDN
 * 2. /theme/assets/js/vendor/modernizr-2.6.2.min.js
 * 3. /theme/assets/js/plugins.js (in footer)
 * 4. /theme/assets/js/main.js    (in footer)
 */

namespace FrontBase;
function enqueues() {
  // Load style.css from child theme
  if (is_child_theme()) {
    wp_enqueue_style('frontbase_child', get_stylesheet_uri(), false, null);
  }

  wp_enqueue_style('frontbase-app', get_template_directory_uri() . '/assets/stylesheets/app.css', false, null);
  
  
  wp_register_script('modernizr', get_template_directory_uri() . '/components/modernizr/modernizr.js', false, null, false);

  // jQuery is loaded using the same method from HTML5 Boilerplate:
  // Grab Google CDN's latest jQuery with a protocol relative URL; fallback to local if offline
  // It's kept in the header instead of footer to avoid conflicts with plugins.
  if (!is_admin()) {
    wp_deregister_script('jquery');
    wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js', false, null, true);
  }

  if (is_single() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }

  wp_register_script('bootstrap', get_template_directory_uri() . '/assets/javascripts/bootstrap.js', false, null, true);
  wp_register_script('frontbase-app', get_template_directory_uri() . '/assets/javascripts/app.js', false, null, true);

  wp_enqueue_script('modernizr');
  wp_enqueue_script('jquery');
  wp_enqueue_script('bootstrap');
  wp_enqueue_script('frontbase-app');
}
add_action('wp_enqueue_scripts', '\FrontBase\enqueues', 100);

// http://wordpress.stackexchange.com/a/12450
function jquery_local_fallback($src, $handle) {
  static $add_jquery_fallback = false;

  if ($add_jquery_fallback) {
    echo '<script>window.jQuery || document.write(\'<script src="' . get_template_directory_uri() . '/assets/js/vendor/jquery-1.9.1.min.js"><\/script>\')</script>' . "\n";
    $add_jquery_fallback = false;
  }

  if ($handle === 'jquery') {
    $add_jquery_fallback = true;
  }

  return $src;
}
if (!is_admin()) {
  add_filter('script_loader_src', '\FrontBase\jquery_local_fallback', 10, 2);
}
?>