<?php
if (has_post_thumbnail()) :
	echo '<div class="thumbnail">';
	echo the_post_thumbnail('small-feature');
	echo '</div>';
endif;
echo '<div class="story-unit">';
echo '<h4 class="clean-bottom">';
echo the_title();
echo '</h4>';
if (function_exists('the_subheading')) : 
	the_subheading('<strong class="subheading">', '</strong>');
endif;
$showMore = get_field('show_link');
if ($showMore){
	echo the_excerpt('&raquo; &raquo; &raquo; &raquo;');
} else {
	echo the_content();
}
echo '</div>';

if ($showMore){
	echo '<div class="row-fluid clearfix"><a href="'.get_permalink().'" class="btn btn-blue btn-block">';
	echo '<i class="fa fa-arrow-right"></i>View Story ';	
	echo '</a></div>';
}
?>