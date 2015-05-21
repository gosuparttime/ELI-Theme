<?php
/**
 * Utility functions
 */
function is_element_empty($element) {
  $element = trim($element);
  return !empty($element);
}

// Tell WordPress to use searchform.php from the templates/ directory
function eli_theme_get_search_form($form) {
  $form = '';
  locate_template('/templates/searchform.php', true, false);
  return $form;
}
add_filter('get_search_form', 'eli_theme_get_search_form');
function myplugin_tinymce_buttons($buttons)
 {
	//Remove the format dropdown select and text color selector
	$remove = array('underline','forecolor','justifyfull','alignleft','aligncenter','alignright','justify','hr','blockquote', 'strikethrough');
	return array_diff($buttons,$remove);
 }
add_filter('mce_buttons_2','myplugin_tinymce_buttons');
add_filter('mce_buttons','myplugin_tinymce_buttons');