<?php while (have_posts()) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
      <?php if (get_field('staff_photo')) {
	  	echo '<div class="col-xs-4 pull-right mar-two-t"><div class="pad-one-tb">';
		$staff_pix = get_field('staff_photo');
		$staff_size = "staff-photo";
		$staff_image = wp_get_attachment_image_src( $staff_pix, $staff_size );
		echo '<img class="thumbnail pull-right" src="';
		echo $staff_image[0];
		echo '" alt="';
		the_title();
		echo '"/>';		echo '</div></div>';
	  } ?>
      <header>
        <hgroup>
          <?php 
			$subhead =  get_field('position');
	 	  	if ($subhead) : 
				$head_class = "page-title clean-bottom"; 
            else: 
			 	$head_class = "page-title"; 
			endif; ?>
          <h1 class="<? echo $head_class ?>" itemprop="headline">
            <?php the_title(); ?>
          </h1>
          <?php if ($subhead) : 
			echo '<h4 class="subheading">'.$subhead.'</h4>'; 
          endif; ?>
          </hgroup>
          <?php $eds = get_field('education');
			if($eds) {
				echo '<ul class="no-space">';
				foreach($eds as $ed){
					echo '<li>'.$ed['degree'].', '. $ed['school'].'</li>';
				}
			echo '</ul>';
			} ?>
          <?php if (get_field('email_address')) : 
			echo '<a href="mailto:'.get_field('email_address').'"><i class="icon-envelope-alt"></i> '.get_field('email_address').'</a>'; 
          endif; ?>
		  <?php if (get_field('phone_number')) : 
			echo '<br/><a href="tel:1-'.get_field('phone_number').'" class="visible-phone"><i class="icon-phone"></i> ';
			echo the_field('phone_number');
			echo '</a>';
			echo '<span class="hidden-phone"><i class="icon-phone"></i> ';
			echo the_field('phone_number');
			echo '</span>';
          endif; ?>
        
      </header>
      <!-- end article header -->
      <hr />
      <section class="post_content clearfix pad-one-tb" itemprop="articleBody">
        <?php the_field('biography'); ?>
      </section>
      <!-- end article section -->
      
      <footer>
        
      </footer>
      <!-- end article footer --> 
      
    </article>
    <!-- end article -->
    
    <?php endwhile; ?>
