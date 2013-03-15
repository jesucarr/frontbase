<?php 
namespace FrontBase;
function title() {
  if (is_home()) {
    if (get_option('page_for_posts', true)) {
      echo get_the_title(get_option('page_for_posts', true));
    } else {
      _e('Latest Posts', 'frontbase');
    }
  } elseif (is_archive()) {
    $term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
    if ($term) {
      echo $term->name;
    } elseif (is_post_type_archive()) {
      echo get_queried_object()->labels->name;
    } elseif (is_day()) {
      printf(__('Daily Archives: %s', 'frontbase'), get_the_date());
    } elseif (is_month()) {
      printf(__('Monthly Archives: %s', 'frontbase'), get_the_date('F Y'));
    } elseif (is_year()) {
      printf(__('Yearly Archives: %s', 'frontbase'), get_the_date('Y'));
    } elseif (is_author()) {
      printf(__('Author Archives: %s', 'frontbase'), get_the_author());
    } else {
      single_cat_title();
    }
  } elseif (is_search()) {
    printf(__('Search Results for %s', 'frontbase'), get_search_query());
  } elseif (is_404()) {
    _e('Not Found', 'frontbase');
  } else {
    the_title();
  }
}
?>