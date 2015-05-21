<?php the_content(); ?>
<section id="staff-directory" class="pad-two-b" role="complementary">
    <?php 
	$c = 1; //init counter
	$bpr = 2; //boxes per row
	$reset = 0;
	$staff_roles = get_terms( 'roles' );
	
	foreach ( $staff_roles as $staff_role ) {
    $query = new WP_Query( 
	$args = array(
		'posts_per_page' => '-1',
        'roles' => $staff_role->slug,
		'post_type' => 'staff',
		'order' => 'ASC',
    ) );
	$query = new WP_Query($args);
	echo '<h2 class="clearfix mar-one-t" id="'.$staff_role->slug.'">';
	echo $staff_role->name;
	echo '</h2>';
	if ($staff_role->description):
	echo '<p>';
	echo $staff_role->description;
	echo '</p>';
	endif;
	if($c == 1) :
		echo '<div class="row clearfix" role="complementary">';
	endif;
    while ( $query->have_posts() ) : $query->the_post();
	
	if (get_field('featured')):
		echo '<div class="col-xs-12"><div class="well">';
	    get_template_part('templates/column', 'staff');
		echo '</div></div>';
		$c = 2;
	else:
		
		echo '<div class="col-xs-6 mar-one-b clearfix">';
		get_template_part('templates/column', 'staff');
		echo '</div>';
		
	endif;
    if($c == $bpr) :
		echo '</div>';
		echo '<div class="row clearfix" role="complementary">';
		$c = 0;
	endif;
	$c++;	
    endwhile;
	wp_reset_postdata();
    $query = null;
	
		echo '</div>';
		$c = 1;
	
    wp_reset_postdata();
	}
	?>
  </section>