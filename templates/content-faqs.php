<?php the_content(); ?>
<!-- end article section -->

<!-- end article -->

<?php 
	$args = array(
			'post_type' => 'faq',
			'orderby' => 'title', 
			'order' => 'asc',
			'posts_per_page' => '-1'
		);
		$loop = new WP_Query( $args );
       ?>

<nav id="faq-menu" class=" faq-nav" role="navigation">
  <ul>
    <?php while ($loop-> have_posts()) : $loop-> the_post(); ?>
    <li><a title="<?php the_title(); ?>" href="#faq-<?php the_ID(); ?>">
      <?php the_title(); ?>
      </a></li>
    <?php endwhile; ?>
  </ul>
</nav>
<?php while ($loop-> have_posts()) : $loop-> the_post(); ?>
<article id="faq-<?php the_ID(); ?>" class="clearfix">
  <header>
    <h4>
      <?php the_title(); ?>
    </h4>
  </header>
  <section>
    <?php the_content(); ?>
  </section>
</article>
<?php endwhile; 
wp_reset_postdata(); ?>
