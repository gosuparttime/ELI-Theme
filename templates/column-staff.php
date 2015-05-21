<?php
echo '<h4>';
echo the_title();
echo '</h4>';
echo '<div class="row">';
if (get_field('staff_photo')) {
	  	echo '<div class="col-xs-4 pull-right">';
		$staff_pix = get_field('staff_photo');
		$staff_size = "staff-photo";
		$staff_image = wp_get_attachment_image_src( $staff_pix, $staff_size );
		echo '<img class="thumbnail pull-right" src="';
		echo $staff_image[0];
		echo '" alt="';
		the_title();
		echo '"/>';		echo '</div><div class="col-xs-8 alpha">';
} else {
	echo '<div class="col-xs-12">';
}
echo '<p><strong>';
echo the_field('position');
echo '</strong></p>';
$eds = get_field('education');
if($eds) {
	echo '<ul class="no-space">';
 	foreach($eds as $ed){
		echo '<li>'.$ed['degree'].', '. $ed['school'].'</li>';
	}
	echo '</ul>';
}
echo '<p><a href="mailto:'.get_field('email_address').'"><i class="fa fa-envelope"></i>';
the_field('email_address');
echo '</a> | ';
echo '<a href="tel:1-'.get_field('phone_number').'" class="visible-xs"><i class="fa fa-phone"></i> ';
echo the_field('phone_number');
echo '</a>';
echo '<span class="hidden-xs"><i class="fa fa-phone"></i> ';
echo the_field('phone_number');
echo '</span>';
if (get_field('biography')) {
	$staff_link = get_permalink($staff_role->ID);
	echo '<div class="row-fluid"><a href="'.$staff_link.'" class="btn btn-blue btn-block">';
	echo 'View Biography <i class="fa fa-arrow-right"></i>';	
	echo '</a></div>';
}
echo '</p></div></div>';
?>