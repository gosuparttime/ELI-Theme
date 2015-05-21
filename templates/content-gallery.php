<?php the_content(); ?>

<section class="post_content clearfix" itemprop="articleBody">
  <div class="row pad-two-b clearfix" role="complementary">
    <?php 
			$c = 1; //init counter
			$bpr = 2; //boxes per row
			$type = 'gallery';
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		  	$args=array(
				'post_type' => $type,
				'post_status' => 'publish',
				'paged' => $paged,
				'posts_per_page' => 6,
				'caller_get_posts'=> 1,
				'meta_key' => 'gallery_date',
				'orderby' => 'meta_value_num',
				'order' => 'DESC',
		  	);
			$temp = $wp_query;  // assign original query to temp variable for later use
			$wp_query = null;
			$wp_query = new WP_Query();
			$wp_query->query($args);
 			while ($wp_query->have_posts()) : $wp_query->the_post();?>
    <div class="col-xs-6">
      <?php get_template_part('templates/column', 'gallery'); ?>
    </div>
    <!-- end row -->
    <?php if($c == $bpr) : ?>
  </div>
  <div class="row pad-two-b clearfix" role="complementary">
    <?php $c = 0;
				endif;
			$c++;
			endwhile; ?>
  </div>
</section>
<!-- end article section -->

<footer>
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
</footer>
