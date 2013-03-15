<?php
  if (post_password_required()) {
    return;
  }

 if (have_comments()) : ?>
  <section id="comments">
    <h3><?php printf(_n('One Response to &ldquo;%2$s&rdquo;', '%1$s Responses to &ldquo;%2$s&rdquo;', get_comments_number(), 'frontbase'), number_format_i18n(get_comments_number()), get_the_title()); ?></h3>

    <ol class="media-list">
      <?php wp_list_comments(array('walker' => new \FrontBase\Walker_Comment)); ?>
    </ol>

    <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
    <nav>
      <ul class="pager">
        <?php if (get_previous_comments_link()) : ?>
          <li class="previous"><?php previous_comments_link(__('&larr; Older comments', 'frontbase')); ?></li>
        <?php endif; ?>
        <?php if (get_next_comments_link()) : ?>
          <li class="next"><?php next_comments_link(__('Newer comments &rarr;', 'frontbase')); ?></li>
        <?php endif; ?>
      </ul>
    </nav>
    <?php endif; ?>

    <?php if (!comments_open() && !is_page() && post_type_supports(get_post_type(), 'comments')) : ?>
    <div class="alert">
      <?php _e('Comments are closed.', 'frontbase'); ?>
    </div>
    <?php endif; ?>
  </section><!-- /#comments -->
<?php endif; ?>

<?php if (!have_comments() && !comments_open() && !is_page() && post_type_supports(get_post_type(), 'comments')) : ?>
  <section id="comments">
    <div class="alert">
      <?php _e('Comments are closed.', 'frontbase'); ?>
    </div>
  </section><!-- /#comments -->
<?php endif; ?>

<?php if (comments_open()) : ?>
  <section id="respond">
    <h3><?php comment_form_title(__('Leave a Reply', 'frontbase'), __('Leave a Reply to %s', 'frontbase')); ?></h3>
    <p class="cancel-comment-reply"><?php cancel_comment_reply_link(); ?></p>
    <?php if (get_option('comment_registration') && !is_user_logged_in()) : ?>
      <p><?php printf(__('You must be <a href="%s">logged in</a> to post a comment.', 'frontbase'), wp_login_url(get_permalink())); ?></p>
    <?php else : ?>
      <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
        <?php if (is_user_logged_in()) : ?>
          <p>
            <?php printf(__('Logged in as <a href="%s/wp-admin/profile.php">%s</a>.', 'frontbase'), get_option('siteurl'), $user_identity); ?>
            <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php __('Log out of this account', 'frontbase'); ?>"><?php _e('Log out &raquo;', 'frontbase'); ?></a>
          </p>
        <?php else : ?>
          <label for="author"><?php _e('Name', 'frontbase'); if ($req) _e(' (required)', 'frontbase'); ?></label>
          <input type="text" class="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" <?php if ($req) echo 'aria-required="true"'; ?>>
          <label for="email"><?php _e('Email (will not be published)', 'frontbase'); if ($req) _e(' (required)', 'frontbase'); ?></label>
          <input type="email" class="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" <?php if ($req) echo 'aria-required="true"'; ?>>
          <label for="url"><?php _e('Website', 'frontbase'); ?></label>
          <input type="url" class="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="22">
        <?php endif; ?>
        <label for="comment"><?php _e('Comment', 'frontbase'); ?></label>
        <textarea name="comment" id="comment" class="input-xlarge" rows="5" aria-required="true"></textarea>
        <p><input name="submit" class="btn btn-primary" type="submit" id="submit" value="<?php _e('Submit Comment', 'frontbase'); ?>"></p>
        <?php comment_id_fields(); ?>
        <?php do_action('comment_form', $post->ID); ?>
      </form>
    <?php endif; ?>
  </section><!-- /#respond -->
<?php endif; ?>
