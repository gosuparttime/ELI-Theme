<h5 class="meta">
        <?php _e("Posted", "eli-theme"); ?>
        <time datetime="<?php echo the_time('Y-m-j'); ?>" pubdate>
          <?php the_date(); ?>
        </time>
        <?php _e("by", "eli-theme"); ?>
        <?php the_author_posts_link(); ?>
        <span class="amp">&</span>
        <?php _e("filed under", "eli-theme"); ?>
        <?php the_category(', '); ?>
        .</h5>