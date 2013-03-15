<?php 
namespace FrontBase;
if (function_exists('\add_theme_support')) {
    add_theme_support('nav-menus');
}
function menus_setup() {
  // Register wp_nav_menu() menus (http://codex.wordpress.org/Function_Reference/register_nav_menus)
  register_nav_menus(array(
    'primary_navigation' => __('Primary Navigation', 'frontbase'),
  ));
  register_nav_menus(array(
    'footer_menu' => __('Footer Menu', 'frontbase'),
  ));
}
add_action('after_setup_theme', '\FrontBase\menus_setup');

?>