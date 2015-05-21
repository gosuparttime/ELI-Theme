<?php the_content(); ?>
<section class="row pad-two-b" role="complementary">
    <?php 
	$c = 1; //init counter
	$bpr = 2; //boxes per row
	$query = new WP_Query( 
	$args = array(
		'posts_per_page' => '-1',
		'post_type' => 'story',
		'order' => 'ASC',
    ) );

        if ($query-> have_posts()) : while ($query-> have_posts()) : $query-> the_post(); ?>
          <div class="col-xs-6">
            <?php get_template_part('templates/column', 'story'); ?>
          </div>
          <!-- end article -->
          <?php if($c == $bpr) : ?>
        </section>
        <section class="row pad-two-b" role="complementary">
          <?php $c = 0;
		endif; ?>
          <?php
		$c++;

        endwhile; ?>
        </section>
	<? endif;
	//wp_reset_postdata();?>
  </section>