<?php if(get_row_layout() == "add_module"): // layout: Choose Modules ?>

<div class="clearfix pad-two-b">
  <?php 
			$modules = get_sub_field('choose_module');
			$my_module = $modules->post_name;
			$my_module = strval($my_module);
			display_module($my_module, '3', false);
            ?>
</div>
<?php elseif(get_row_layout() == "student_story"): // layout: Student Story ?>
<div class="clearfixx pad-two-b">
  <?php 
		  	if (get_sub_field('story_title')){ 
				echo '<h3>';
				echo the_sub_field('story_title');
				echo '</h3>';
			}
			
			$stories = get_sub_field('related_story');
			$my_story = $stories->post_name;
			if ($my_story) {		
				do_shortcode('[show-story name="'.$my_story.'"]');
			} else {
				do_shortcode('[show-story]');
			}
            ?>
  <a class="btn btn-block" href="/for-students/stories-from-our-students/"><i class="fa fa-arrow-right"></i>See More Stories</a> </div>
<?php elseif(get_row_layout() == "add_video"): // layout: add video ?>
<div class="clearfix pad-two-b">
  <h3>
    <?php the_sub_field('video_title'); ?>
  </h3>
  <div class="video-player">
    <?php the_sub_field('video_text'); ?>
  </div>
</div>
<?php elseif(get_row_layout() == "link_to_files"): // layout: Featured Posts ?>
<div class="clearfix pad-two-b">
  <?php 
			if (get_sub_field('link_title')){ 
				echo '<h3>';
				echo the_sub_field('link_title');
				echo '</h3>';
			}
			if (get_sub_field('link_text')){ 
				echo get_sub_field('link_text');
			}
			$my_filez = get_sub_field('link_files');
			foreach( $my_filez as $filez):
  			$filez_link = wp_get_attachment_url($filez->ID);
			$filez_title = $filez->post_title;
			$filez_sub = $filez->post_excerpt;
			
			$filez_button = 'button text="';
			$filez_button .= $filez_title;
			if ($filez_sub) { 
				$filez_button .= '" subtext="';
				$filez_button .= $filez_sub;
			}
			$filez_button .= '" url="';
			$filez_button .= $filez_link;
			$filez_button .='" blank="true" icon="fa fa-download" color="info"';
			echo do_shortcode('['.$filez_button.']');
			//echo $filez_sub;
							
		endforeach; ?>
</div>
<?php elseif(get_row_layout() == "link_to_any"): // layout: Link To Any Content ?>
<div class="clearfix pad-two-b">
  <?php 
			if (get_sub_field('any_title')){ 
				echo '<h3>';
				echo the_sub_field('any_title');
				echo '</h3>';
			}
			if (get_sub_field('any_text')){ 
				echo get_sub_field('any_text');
			}
			
			$any_linked = get_sub_field('any_link');
			foreach( $any_linked as $any):
			$any_link = $any['button_link'];
			$any_title = $any['button_text'];
			$any_sub = $any['button_subtext'];
			$any_icon = $any['button_icon'];
			$any_blank = $any['blank_page'];
			$any_color = $any['button_color'];
			
			$any_button = 'button text="';
			$any_button .= $any_title;
			if ($any_sub) { 
				$any_button .= '" subtext="';
				$any_button .= $any_sub;
			}
			$any_button .= '" url="';
			$any_button .= $any_link;
			$any_button .= '" ';
			// URL
			$any_button .= '" color="';
			$any_button .= $any_color;
			$any_button .= '" ';
			if ($any_blank):
			$any_button .='" blank="true" ';
			endif;
			$any_button .='" icon=" fa ';
			$any_button .= $any_icon;
			$any_button .='"';
			echo do_shortcode('['.$any_button.']');
			//echo $filez_sub;
							
		endforeach; ?>
</div>
<?php elseif(get_row_layout() == "link_my_pages"): // layout: Featured Posts ?>
<div class="clearfix pad-two-b">
  <?php 
			if (get_sub_field('page_title')){ 
				echo '<h3>';
				echo the_sub_field('page_title');
				echo '</h3>';
			}
			if (get_sub_field('page_text')){ 
				echo the_sub_field('page_text');
			}
			$my_pages = get_sub_field('link_pages');
			foreach( $my_pages as $pagez):
  			$pagez_link = get_permalink($pagez->ID);
			$pagez_title = get_the_title($pagez->ID);
			$pagez_sub = get_the_subheading($pagez->ID);
			
			$pagez_button = 'button text="';
			$pagez_button .= $pagez_title;
			if ($pagez_sub) { 
				$pagez_button .= '" subtext="';
				$pagez_button .= $pagez_sub;
			}
			$pagez_button .= '" url="';
			$pagez_button .= $pagez_link;
			$pagez_button .='"';
			echo do_shortcode('['.$pagez_button.']');
			
							
		endforeach; ?>
</div>
<?php elseif(get_row_layout() == "add_text"): // layout: Add Additional Text ?>
<div class="clearfix pad-two-b">
  <h3>
    <?php the_sub_field('column_title'); ?>
  </h3>
  <?php the_sub_field('column_content'); ?>
</div>
<?php endif; ?>
