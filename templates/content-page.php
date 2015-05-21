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