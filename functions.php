<?php
/**
 * eli_theme includes
 *
 * The $eli_theme_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/eli_theme/eli_theme/pull/1042
 */
$eli_theme_includes = array(
  'lib/utils.php',           // Utility functions
  'lib/init.php',            // Initial theme setup and constants
  'lib/wrapper.php',         // Theme wrapper class
  'lib/sidebar.php',         // Sidebar class
  'lib/config.php',          // Configuration
  'lib/activation.php',      // Theme activation
  'lib/titles.php',          // Page titles
  'lib/nav.php',             // Custom nav modifications
  'lib/gallery.php',         // Custom [gallery] modifications
  'lib/comments.php',        // Custom comments modifications
  'lib/scripts.php',         // Scripts and stylesheets
  'lib/extras.php',          // Custom functions
  'lib/post-types.php',        // Custom comments modifications
  'lib/shortcodes.php',         // Scripts and stylesheets
  'lib/wp-bootstrap-gallery.php',          // Custom functions
);

foreach ($eli_theme_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'eli_theme'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);
