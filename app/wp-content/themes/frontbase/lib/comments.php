<?php
/**
 * Use Bootstrap's media object for listing comments
 *
 * @link http://twitter.github.com/bootstrap/components.html#media
 */
namespace FrontBase;
class Walker_Comment extends \Walker_Comment {
  function start_lvl(&$output, $depth = 0, $args = array()) {
    $GLOBALS['comment_depth'] = $depth + 1; 
    include (dirname(dirname(__FILE__)).'/templates/comments-start.php');
  }

  function end_lvl(&$output, $depth = 0, $args = array()) {
    $GLOBALS['comment_depth'] = $depth + 1;
    include (dirname(dirname(__FILE__)).'/templates/comments-end.php');
  }

  function start_el(&$output, $comment, $depth, $args, $id = 0) {
    $depth++;
    $GLOBALS['comment_depth'] = $depth;
    $GLOBALS['comment'] = $comment;

    if (!empty($args['callback'])) {
      call_user_func($args['callback'], $comment, $args, $depth);
      return;
    }

    extract($args, EXTR_SKIP); 
    include (dirname(dirname(__FILE__)).'/templates/comment-start.php');
  }

  function end_el(&$output, $comment, $depth = 0, $args = array()) {
    if (!empty($args['end-callback'])) {
      call_user_func($args['end-callback'], $comment, $args, $depth);
      return;
    }
    include (dirname(dirname(__FILE__)).'/templates/comment-end.php');
  }
}

function get_avatar($avatar) {
  $avatar = str_replace("class='avatar", "class='avatar pull-left media-object", $avatar);
  return $avatar;
}
add_filter('get_avatar', '\FrontBase\get_avatar');
