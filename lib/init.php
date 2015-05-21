<?php
/**
 * eli_theme initial setup and constants
 */
function eli_theme_setup() {
  // Make theme available for translation
  // Community translations can be found at https://github.com/eli_theme/eli_theme-translations
  load_theme_textdomain('eli_theme', get_template_directory() . '/lang');

  // Register wp_nav_menu() menus
  // http://codex.wordpress.org/Function_Reference/register_nav_menus
  register_nav_menus(                      // wp3+ menus
		array( 
			'main_nav' => 'The Main Menu',   // main nav in header
			'lang_nav' => 'Language Menu',   // main nav in header
			'utility_nav' => 'utility Menu',   // main nav in header
			'footer_links' => 'Footer Links' // secondary nav in footer
		)
	);	

  // Add post thumbnails
  // http://codex.wordpress.org/Post_Thumbnails
  // http://codex.wordpress.org/Function_Reference/set_post_thumbnail_size
  // http://codex.wordpress.org/Function_Reference/add_image_size
  add_theme_support('post-thumbnails');
  // Thumbnail sizes
	add_image_size( 'featured', 770, 433, true );
	add_image_size( 'banner', 1170, 200, true);
	add_image_size( 'carousel', 1170, 420, true);
	add_image_size( 'small-feature', 365, 205, true );
	add_image_size( 'acc-logos', 160, 9999, false );
	add_image_size( 'staff-photo', 240, 240, true );
  // Add post formats
  // http://codex.wordpress.org/Post_Formats
  //add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio'));

  // Add HTML5 markup for captions
  // http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5
  add_theme_support('html5', array('caption'));

  // Tell the TinyMCE editor to use a custom stylesheet
  add_editor_style('/assets/css/editor-style.css');
}
add_action('after_setup_theme', 'eli_theme_setup');

// Cleaning up the Wordpress Head
function eli_head_cleanup() {
	// remove header links
	remove_action( 'wp_head', 'feed_links_extra', 3 );                    // Category Feeds
	remove_action( 'wp_head', 'feed_links', 2 );                          // Post and Comment Feeds
	remove_action( 'wp_head', 'rsd_link' );                               // EditURI link
	remove_action( 'wp_head', 'wlwmanifest_link' );                       // Windows Live Writer
	remove_action( 'wp_head', 'index_rel_link' );                         // index link
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );            // previous link
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );             // start link
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 ); // Links for Adjacent Posts
	remove_action( 'wp_head', 'wp_generator' );                           // WP version
	if (!is_admin()) {
		wp_deregister_script('jquery');                                   // De-Register jQuery
		wp_register_script('jquery', '', '', '', true);                   // It's already in the Header
	}	
}
	// launching operation cleanup
	add_action('init', 'eli_head_cleanup');

/**
 * Register navs
 */
function eli_main_nav() {
	// display the wp3 menu if available
    wp_nav_menu( 
    	array( 
    		'menu' => 'main_nav', /* menu name */
    		'menu_class' => 'navbar-nav nav',
    		'theme_location' => 'main_nav', /* where in the theme it's assigned */
    		'container' => 'false', /* container class */
    		'fallback_cb' => 'eli_main_nav_fallback', /* menu fallback */
    		'depth' => '2', /* suppress lower levels for now */
    		'walker' => new description_walker()
    	)
    );
}
function eli_lang_nav() {
	// display the wp3 menu if available
    wp_nav_menu( 
    	array( 
    		'menu' => 'lang_nav', /* menu name */
    		'menu_class' => 'navbar-nav nav',
    		'theme_location' => 'lang_nav', /* where in the theme it's assigned */
    		'container' => 'false', /* container class */
    		'fallback_cb' => 'eli_main_nav_fallback', /* menu fallback */
    		'depth' => '2', /* suppress lower levels for now */
    		'walker' => new description_walker()
    	)
    );
}

function utility_nav() {
	// display the wp3 menu if available
    wp_nav_menu( 
    	array( 
    		'menu' => 'utility_nav', /* menu name */
    		'menu_class' => 'menu',
    		'theme_location' => 'utility_nav', /* where in the theme it's assigned */
    		'container_class' => 'clearfix', /* container tag */
    		'depth' => '1'
    	)
    );
}	

function eli_footer_links() { 
	// display the wp3 menu if available
    wp_nav_menu(
    	array(
    		'menu' => 'footer_links', /* menu name */
    		'theme_location' => 'footer_links', /* where in the theme it's assigned */
    		'container' => 'false', /* container class */
    		'fallback_cb' => 'eli_footer_links_fallback' /* menu fallback */
    	)
	);
}

/**
 * Register sidebars
 */
function eli_theme_widgets_init() {
  register_sidebar(array(
    	'id' => 'sidebar-home',
    	'name' => 'Homepage Sidebar',
    	'description' => 'Used only on the homepage page template.',
    	'before_widget' => '<div id="%1$s" class="widget %2$s">',
    	'after_widget' => '</div>',
    	'before_title' => '<h3 class="widgettitle">',
    	'after_title' => '</h3>',
    ));
	
	register_sidebar(array(
      'id' => 'sidebar-nav',
      'name' => 'Nav Sidebar',
	  'description' => 'Sidebar item for pages with third level navigation',
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<h3 class="widgettitle">',
      'after_title' => '</h3>',
    ));
	
	register_sidebar(array(
    	'id' => 'sidebar-primary',
    	'name' => 'Page Sidebar',
    	'description' => 'Default Sidebar for All Pages',
    	'before_widget' => '<div id="%1$s" class="widget %2$s">',
    	'after_widget' => '</div>',
    	'before_title' => '<h3 class="widgettitle">',
    	'after_title' => '</h3>',
    ));
      
    register_sidebar(array(
      'id' => 'sidebar2',
      'name' => 'Program Sidebar',
	  'description' => 'Default Sidebar for Program & Fees Pages',
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<h3 class="widgettitle">',
      'after_title' => '</h3>',
    ));

    register_sidebar(array(
      'id' => 'sidebar3',
      'name' => 'Apply Sidebar',
	  'description' => 'Default Sidebar for "Apply To ELI" Pages',
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<h3 class="widgettitle">',
      'after_title' => '</h3>',
    ));

    register_sidebar(array(
      'id' => 'sidebar4',
      'name' => 'Student Sidebar',
	  'description' => 'Default Sidebar for "For Students" Pages',
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<h3 class="widgettitle">',
      'after_title' => '</h3>',
    ));
    
    register_sidebar(array(
      'id' => 'sidebar',
      'name' => 'Resources Sidebar',
	  'description' => 'Default Sidebar for Resources Pages',
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<h3 class="widgettitle">',
      'after_title' => '</h3>',
    ));
	
    register_sidebar(array(
      'id' => 'sidebar6',
      'name' => 'About Sidebar',
	  'description' => 'Default Sidebar for About Us Pages',
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<h3 class="widgettitle">',
      'after_title' => '</h3>',
    ));
	
    register_sidebar(array(
      'id' => 'sidebar7',
      'name' => 'Events Sidebar',
	  'description' => 'Default Sidebar for All Pages',
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<h3 class="widgettitle">',
      'after_title' => '</h3>',
    ));
}
add_action('widgets_init', 'eli_theme_widgets_init');
