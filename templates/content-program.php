<?php if(get_field('show_info')):
	  	echo '<div class="row-fluid"><div class="col-sm-5 col-xs-12 pull-right well-blue mar-one-b mar-two-l">';
		echo '<h4>'.get_field('program_term').' Session</h4>';
		echo '<p class="small-mar"><strong>';
		$s_date = DateTime::createFromFormat('Ymd', get_field('program_start'));
		echo $s_date->format('F j, Y');
		echo '-';
		$e_date = DateTime::createFromFormat('Ymd', get_field('program_end'));
		echo $e_date->format('F j, Y');
		echo '</strong></p><p class="small-mar">';
		echo '<strong>Level: </strong>'.get_field('program_level');
		echo '</p><p class="small-mar">';
		$time = get_field('program_time');
		if(!empty($time)):
		echo get_field('program_time').' hours per week</p>';
		endif;
		if(get_field('program_instructions')):
			echo '<p>';
			echo get_field('program_instructions');
			echo '</p>';
		endif;
		if(get_field('program_apply')):
			echo '<a class="btn-orange btn-block" href="/apply-to-eli/eli-application-form/"><i class="icon-arrow-right"></i>Apply Now</a>';
		endif;
		echo '</div>';
	  	endif; ?>
<?php the_content(); ?>
<?php $add_cols = get_field('add_columns');
	if ($add_cols): ?>
    <div class="row clearfix pad-two-tb page-columns">
      <div class="col-sm-6 col-xs-12" id="left_column"><div class="my-col">
        <?php while(has_sub_field("left_column")):
                get_template_part('templates/column', 'two');
            endwhile; ?></div>
      </div>
      <div class="col-sm-6 col-xs-12" id="right_column"><div class="my-col">
        <?php while(has_sub_field("right_column")):
                get_template_part('templates/column', 'two');
            endwhile; ?></div>
      </div>
    </div>
    <? endif; ?>