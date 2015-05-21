<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix pad-one-b main-stuff'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
      <header>
        <hgroup>
          <h1 class="page-title clean-bottom" itemprop="headline">
            <?php the_title(); ?>
          </h1>
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
        </hgroup>
      </header>
      
      <!-- end article header -->
      <hr />
      <section class="post_content clearfix" itemprop="articleBody">
        <?php the_content(); ?>
      </section>
      <!-- end article section -->
      
      <footer>
        <?php the_tags('<p class="tags"><span class="tags-title">' . __("Tags","eli-theme") . ':</span> ', ' ', '</p>'); ?>
      </footer>
      <!-- end article footer --> 
      
    </article>
    <!-- end article -->
    
    <?php comments_template(); ?>
    <?php endwhile; 
	endif; ?>

