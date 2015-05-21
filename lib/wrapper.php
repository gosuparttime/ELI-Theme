<?php
/**
 * Theme wrapper
 *
 * @link http://eli_theme.io/an-introduction-to-the-eli_theme-theme-wrapper/
 * @link http://scribu.net/wordpress/theme-wrappers.html
 */
function eli_theme_template_path() {
  return eli_theme_Wrapping::$main_template;
}

function eli_theme_sidebar_path() {
  return new eli_theme_Wrapping('templates/sidebar.php');
}

class eli_theme_Wrapping {
  // Stores the full path to the main template file
  static $main_template;

  // Stores the base name of the template file; e.g. 'page' for 'page.php' etc.
  static $base;

  public function __construct($template = 'base.php') {
    $this->slug = basename($template, '.php');
    $this->templates = array($template);

    if (self::$base) {
      $str = substr($template, 0, -4);
      array_unshift($this->templates, sprintf($str . '-%s.php', self::$base));
    }
  }

  public function __toString() {
    $this->templates = apply_filters('eli_theme/wrap_' . $this->slug, $this->templates);
    return locate_template($this->templates);
  }

  static function wrap($main) {
    self::$main_template = $main;
    self::$base = basename(self::$main_template, '.php');

    if (self::$base === 'index') {
      self::$base = false;
    }

    return new eli_theme_Wrapping();
  }
}
add_filter('template_include', array('eli_theme_Wrapping', 'wrap'), 99);
