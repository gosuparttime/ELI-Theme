<?php
if (get_field('gallery_image')) :
	  	echo '<div class="thumbnail">';
		$gal_pix = get_field('gallery_image');
		$gal_size = "small-feature";
		$gal_image = wp_get_attachment_image_src( $gal_pix, $gal_size );
		echo '<img src="';
		echo $gal_image[0];
		echo '" alt="';
		the_title();
		echo '"/></div>';
endif;
echo '<div class="row-fluid">';
echo '<h4 class="clean-bottom">';
echo the_title();
echo '</h4>';
if (function_exists('the_subheading')) : 
	the_subheading('<strong class="subheading">', '</strong>');
endif;
echo the_field('gallery_description');
echo '</div>';
echo '<div class="row-fluid clearfix"><a href="'.get_permalink().'" class="btn btn-blue btn-block">';
echo '<i class="fa fa-arrow-right"></i>View Gallery ';	
echo '</a></div>';
?>