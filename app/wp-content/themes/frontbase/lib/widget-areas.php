<?php 
namespace FrontBase;
function widget_areas_init() {
  register_sidebar(array(
    'name'          => __('Primary Sidebar', 'frontbase'),
    'id'            => 'sidebar-primary',
    'before_widget' => '<section class="widget %1$s %2$s"><div class="widget-inner">',
    'after_widget'  => '</div></section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>',
  ));

  register_sidebar(array(
    'name'          => __('Footer 1', 'frontbase'),
    'id'            => 'sidebar-footer-1',
    'before_widget' => '<section class="widget %1$s %2$s"><div class="widget-inner">',
    'after_widget'  => '</div></section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>',
  ));

  register_sidebar(array(
    'name'          => __('Footer 2', 'frontbase'),
    'id'            => 'sidebar-footer-2',
    'before_widget' => '<section class="widget %1$s %2$s"><div class="widget-inner">',
    'after_widget'  => '</div></section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>',
  ));

  register_sidebar(array(
    'name'          => __('Footer 3', 'frontbase'),
    'id'            => 'sidebar-footer-3',
    'before_widget' => '<section class="widget %1$s %2$s"><div class="widget-inner">',
    'after_widget'  => '</div></section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>',
  ));

  register_sidebar(array(
    'name'          => __('Footer 4', 'frontbase'),
    'id'            => 'sidebar-footer-4',
    'before_widget' => '<section class="widget %1$s %2$s"><div class="widget-inner">',
    'after_widget'  => '</div></section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>',
  ));
}
add_action('widgets_init', '\FrontBase\widget_areas_init');

function widget_area_exist_and_active( $sidebar_name ) {
  global $wp_registered_sidebars;
  foreach ( (array) $wp_registered_sidebars as $index => $sidebar ) {
    if ( in_array($sidebar_name, $sidebar) ) {
        return is_active_sidebar( $sidebar['id'] );
    }
  }
  return false;
}

?>