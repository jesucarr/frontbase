<?php 
namespace FrontBase;
/**
 * Tell WordPress to use searchform.php from the templates/ directory
 */
function get_search_form($argument) {
  if ($argument === '') {
    locate_template('/templates/searchform.php', true, false);
  }
}
add_filter('get_search_form', '\FrontBase\get_search_form');

 ?>