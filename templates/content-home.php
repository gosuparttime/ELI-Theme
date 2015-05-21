<?php the_content(); ?>
<?php $add_cols = get_field('add_columns');
	if ($add_cols): ?>

<div class="row clearfix pad-two-t page-columns">
  <div class="col-sm-6 col-xs-12" id="left_column">
    <div class="my-col">
      <?php while(has_sub_field("left_column")):
                get_template_part('templates/column', 'two');
            endwhile; ?>
    </div>
  </div>
  <div class="col-sm-6 col-xs-12" id="right_column">
    <div class="my-col">
      <?php while(has_sub_field("right_column")):
                get_template_part('templates/column', 'two');
            endwhile; ?>
    </div>
  </div>
</div>
<? endif; ?>
<div class="hidden-xs">
  <h4>ELI on Facebook</h4>
  <div class="row-fluid" id="facebook">
    <div class="fb-like-box" data-href="https://www.facebook.com/EnglishLanguageInstituteSyracuse" data-width="766" data-show-faces="true" data-stream="false" data-border-color="white" data-header="false"></div>
  </div>
</div>
<hr />
<div class="row clearfix pad-one-b hidden-phone" id="accreditations" role="complementary">
  <div class="col-sm-12">
    <?php display_module('accreditations', '4', true); ?>
    <?php $query = new WP_Query(array( 'post_type' => 'accreditation', 'order' => 'ASC'));
    				while ( $query->have_posts() ) : $query->the_post();
						$attachment_id = get_field('acc_logo');
						$size = "acc-logos";
						$image = wp_get_attachment_image_src( $attachment_id, $size );
						echo '<div class="twenty"><div class="acc-logo"><img src="';
						echo $image[0];
						echo '" alt="';
						the_title();
						echo ' logo" /></div><div class="caption acc-credit">';
						echo '<h6>';
						the_title();
						echo '</h6></div></div>';
					endwhile ?>
  </div>
</div>
