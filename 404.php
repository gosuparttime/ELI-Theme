<?php get_template_part('templates/page', 'header'); ?>

<div class="alert alert-warning">
  <?php _e('Sorry, but the page you were trying to view does not exist.', 'eli_theme'); ?>
</div>

<p><?php _e('It looks like this was the result of either:', 'eli_theme'); ?></p>
<ul>
  <li><?php _e('a mistyped address', 'eli_theme'); ?></li>
  <li><?php _e('an out-of-date link', 'eli_theme'); ?></li>
</ul>

<?php get_search_form(); ?>
