<?php get_template_part('templates/page', 'header'); ?>

<?php if (!have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'eli_theme'); ?>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/content', get_post_format()); ?>
<?php endwhile; ?>

<?php if ($wp_query->max_num_pages > 1) : ?>
  <?php if (function_exists('page_navi')) { // if expirimental feature is active ?>
  <?php page_navi(); // use the page navi function ?>
  <?php } else { // if it is disabled, display regular wp prev & next links ?>
  <nav class="wp-prev-next">
    <ul class="clearfix">
      <li class="prev-link">
        <?php next_posts_link(_e('&laquo; Older Entries', "eli-theme")) ?>
      </li>
      <li class="next-link">
        <?php previous_posts_link(_e('Newer Entries &raquo;', "eli-theme")) ?>
      </li>
    </ul>
  </nav>
  <?php } ?>
  <!-- end article footer -->
  <?php wp_reset_query(); ?>
<?php endif; ?>
