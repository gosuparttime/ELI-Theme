<?php the_content(); ?>
<?php if (get_field('open_position')):
	echo '<div class="well"><h3>Current Positions</h3>';
	echo '<div class="clearfix">';
  	 
			while (has_sub_field('open_position')) :
				echo '<h4>';
				echo the_sub_field('job_title');
				echo '</h4>';
				echo '<div class="row-fluid" id=job-';
				echo the_ID();
				echo '"><div class="span4">';
				echo '<a href="'.get_sub_field('job_link').'" title="'.get_sub_field('job_title').'" target="_blank">';
				echo 'View Details <i class="icon-external-link"></i>';
				echo '</a>';
				echo '</div><div class="span7 offset1">';
				echo the_sub_field('job_description');
				echo '</div></div><hr />';
			endwhile;
	echo '</div></div>';
	else:
	echo '<div class="alert alert-warning">Currently, there are no positions available at ELI</div>';
    endif; ?>