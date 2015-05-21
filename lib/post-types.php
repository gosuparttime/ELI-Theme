<?php
add_action('admin_head', 'plugin_header');
function plugin_header() {
        global $post_type;
    ?>
    <style>
    <?php if (($_GET['post_type'] == 'slide') || ($post_type == 'slide')) : ?>
    #icon-home-menu { background:transparent url('<?php echo get_bloginfo('template_directory') .'/library/cpt-icon/picture.png';?>') no-repeat; }     
    <?php endif; ?>
        </style>
        <?php
}


// Homepage Options Dashboard Menu
$file_url = get_bloginfo('template_directory').'library/images/custom-post-icon.png';
function home_control_menu() {
  add_menu_page( 'Site Options', 'Site Options', 'edit_posts', 'home-menu', null, '', 31 );
}

add_action('admin_menu', 'home_control_menu');

// Custom Post Types
add_action( 'init', 'create_new_slides' );
function create_new_slides() {
	// Add Student Types
	$labels = array(
		'name' => 'Slides',
		 'singular_name' => 'Slide',
		 'menu_name' => 'Slides',
		 'add_new' => 'Add Slide',
		 'add_new_item' => 'Add New Slide',
		 'edit' => 'Edit',
		 'edit_item' => 'Edit Slide',
		 'new_item' => 'New Slide',
		 'view' => 'View Slide',
		 'view_item' => 'View Slide',
		 'search_items' => 'Search Slides',
		 'not_found' => 'No Slides Found',
		 'not_found_in_trash' => 'No Slides Found in Trash',
		 'parent' => 'Parent Slide'
	);
	$args = array(
		'labels' => $labels,
		'description' => 'Create new slides for ELI. These are displayed on the homepage',
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => false,
		'capability_type' => 'page',
		'map_meta_cap' => true,
		'hierarchical' => false,
		'rewrite' => array('slug' => 'slide'),
		'query_var' => true,
		'exclude_from_search' => true,
		'menu_position' => 1,
		'show_in_menu' => 'home-menu',
		'supports' => array('title'),
	);
	register_post_type('slide', $args);
};
function set_slide_columns($columns) {
    return array(
        'cb' => '<input type="checkbox" />',
        'title' => __('Title'),
        'date' => __('Date'),
        'author' => __('Author'),
		'column_1' => __('Slide Image'),
        'column_2' => __('Slide URL'),
    );
}
// POPULATE CUSTOM COLUMNS ON CUSTOM POST
add_action('manage_slide_posts_custom_column', 'add_new_slide_cols', 10, 2);
	function add_new_slide_cols($column, $post_id){
	global $post;
	switch ($column){
	case 'column_1':
	$column_1_content = the_field('slide_image');
	echo $column_1_content;
	case 'column_2':
	$column_2_content = the_field('slide_url');
	echo $column_2_content;
	default:
	break;
	}
}
add_filter('manage_slide_posts_columns' , 'set_slide_columns');
// New Modules For Homepage
add_action( 'init', 'create_acc' );
function create_acc() {
	// Add Modules
	$labels = array(
		'name' => 'Affiliation',
		 'singular_name' => 'Affiliation',
		 'menu_name' => 'Affiliations',
		 'add_new' => 'Add Affiliation',
		 'add_new_item' => 'Add New Affiliation',
		 'edit' => 'Edit',
		 'edit_item' => 'Edit Affiliation',
		 'new_item' => 'New Affiliation',
		 'view' => 'View Affiliation',
		 'view_item' => 'View Affiliation',
		 'search_items' => 'Search Affiliations',
		 'not_found' => 'No Affiliations Found',
		 'not_found_in_trash' => 'No Affiliations Found in Trash',
		 'parent' => 'Parent Affiliation'
	);
	$args = array(
		'labels' => $labels,
		'description' => 'Create new affiliation for ELI. These are displayed on the homepage',
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => false,
		'capability_type' => 'page',
		'map_meta_cap' => true,
		'hierarchical' => false,
		'rewrite' => array('slug' => 'accreditation'),
		'query_var' => true,
		'exclude_from_search' => true,
		'menu_position' => 2,
		'show_in_menu' => 'home-menu',
		'supports' => array('title'),
	);
	register_post_type('accreditation', $args);
};

// New Modules For Site
add_action( 'init', 'create_new_modules' );
function create_new_modules() {
	// Add Modules
	$labels = array(
		'name' => 'Modules',
		 'singular_name' => 'Module',
		 'menu_name' => 'Modules',
		 'add_new' => 'Add Module',
		 'add_new_item' => 'Add New Module',
		 'edit' => 'Edit',
		 'edit_item' => 'Edit Module',
		 'new_item' => 'New Module',
		 'view' => 'View Module',
		 'view_item' => 'View Module',
		 'search_items' => 'Search Modules',
		 'not_found' => 'No Modules Found',
		 'not_found_in_trash' => 'No Modules Found in Trash',
		 'parent' => 'Parent Module'
	);
	$args = array(
		'labels' => $labels,
		'description' => 'Create new modules for ELI. These can be content blocks for the homepage',
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => false,
		'capability_type' => 'page',
		'map_meta_cap' => true,
		'hierarchical' => false,
		'rewrite' => array('slug' => 'module'),
		'query_var' => true,
		'exclude_from_search' => true,
		'menu_position' => 3,
		'show_in_menu' => 'home-menu',
		'supports' => array('title', 'editor', 'thumbnail'),
	);
	register_post_type('module', $args);
};
add_action('admin_menu', 'register_my_custom_submenu_page');
function register_my_custom_submenu_page() {
	add_submenu_page( 'home-menu', 'Add New Slide', 'Add New Slide', 'edit_posts',' post-new.php?post_type=slide');
	add_submenu_page( 'home-menu', 'Add New Affiliation', 'Add New Affiliation', 'edit_posts',' post-new.php?post_type=accreditation');
	add_submenu_page( 'home-menu', 'Add New Module', 'Add New Module', 'edit_posts',' post-new.php?post_type=module');
}
// New Student Stories For Site
add_action( 'init', 'create_new_story' );
function create_new_story() {
	// Add Student Story
	$labels = array(
		'name' => 'Student Stories',
		 'singular_name' => 'Student Story',
		 'menu_name' => 'Student Stories',
		 'add_new' => 'Add Student Story',
		 'add_new_item' => 'Add New Student Story',
		 'edit' => 'Edit',
		 'edit_item' => 'Edit Student Story',
		 'new_item' => 'New Student Story',
		 'view' => 'View Student Story',
		 'view_item' => 'View Student Story',
		 'search_items' => 'Search Student Stories',
		 'not_found' => 'No Student Stories Found',
		 'not_found_in_trash' => 'No Student Stories Found in Trash',
		 'parent' => 'Parent Student Story'
	);
	$args = array(
		'labels' => $labels,
		'description' => 'Create new student stories for ELI.',
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => 'page',
		'map_meta_cap' => true,
		'hierarchical' => false,
		'rewrite' => array('slug' => 'for-students/stories-from-our-students/story'),
		'query_var' => true,
		'exclude_from_search' => true,
		'menu_position' => 33,
		'supports' => array('title', 'editor', 'thumbnail'),
	);
	register_post_type('story', $args);
};
add_action( 'init', 'create_new_faq' );
function create_new_faq() {
	// Add FAQs
	$labels = array(
		'name' => 'FAQs',
		 'singular_name' => 'FAQ',
		 'menu_name' => 'FAQs',
		 'add_new' => 'Add FAQ',
		 'add_new_item' => 'Add New FAQ',
		 'edit' => 'Edit',
		 'edit_item' => 'Edit FAQ',
		 'new_item' => 'New FAQ',
		 'view' => 'View FAQ',
		 'view_item' => 'View FAQ',
		 'search_items' => 'Search FAQs',
		 'not_found' => 'No FAQs Found',
		 'not_found_in_trash' => 'No FAQs Found in Trash',
		 'parent' => 'Parent FAQ'
	);
	$args = array(
		'labels' => $labels,
		'description' => 'Create new FAQ items for ELI.',
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => 'page',
		'map_meta_cap' => true,
		'hierarchical' => false,
		'rewrite' => array('slug' => 'faq'),
		'query_var' => true,
		'exclude_from_search' => true,
		'menu_position' => 34,
		'supports' => array('title', 'editor'),
	);
	register_post_type('faq', $args);
};

add_action( 'init', 'create_new_staff' );
function create_new_staff() {
	// Add Staff Members
	$labels = array(
		'name' => 'Staff',
		 'singular_name' => 'Staff',
		 'menu_name' => 'Staff',
		 'add_new' => 'Add Staff',
		 'add_new_item' => 'Add New Staff Member',
		 'edit' => 'Edit',
		 'edit_item' => 'Edit Staff Member',
		 'new_item' => 'New Staff Member',
		 'view' => 'View Staff Member',
		 'view_item' => 'View Staff Member',
		 'search_items' => 'Search Staff Members',
		 'not_found' => 'No Staff Members Found',
		 'not_found_in_trash' => 'No Staff Members Found in Trash',
		 'parent' => 'Parent Staff'
	);
	$args = array(
		'labels' => $labels,
		'description' => 'Create new Staff Members for ELI.',
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => 'page',
		'map_meta_cap' => true,
		'hierarchical' => true,
		'rewrite' => array('slug' => 'about-us/staff'),
		'query_var' => true,
		'exclude_from_search' => true,
		'menu_position' => 35,
		'supports' => array('title'),
	);
	register_post_type('staff', $args);
};
add_action('init', 'cptui_register_my_taxes_roles');
function cptui_register_my_taxes_roles() {
	register_taxonomy( 'roles',array (
	  0 => 'staff',
	),
	array( 'hierarchical' => true,
		'label' => 'Roles',
		'show_ui' => true,
		'query_var' => true,
		'show_admin_column' => false,
		'labels' => array (
	  'search_items' => 'Role',
	  'popular_items' => '',
	  'all_items' => '',
	  'parent_item' => '',
	  'parent_item_colon' => '',
	  'edit_item' => '',
	  'update_item' => '',
	  'add_new_item' => '',
	  'new_item_name' => '',
	  'separate_items_with_commas' => '',
	  'add_or_remove_items' => '',
	  'choose_from_most_used' => '',
	)
	) ); 
}
add_action( 'init', 'create_new_gallery' );
function create_new_gallery() {
	// Add Student Types
	$labels = array(
		'name' => 'Gallery',
		 'singular_name' => 'Gallery',
		 'menu_name' => 'Gallery',
		 'add_new' => 'Add Gallery',
		 'add_new_item' => 'Add New Student Gallery',
		 'edit' => 'Edit',
		 'edit_item' => 'Edit Student Gallery',
		 'new_item' => 'New Student Gallery',
		 'view' => 'View Student Gallery',
		 'view_item' => 'View Student Gallery',
		 'search_items' => 'Search Student Gallery',
		 'not_found' => 'No Student Gallery Found',
		 'not_found_in_trash' => 'No Student Gallery Found in Trash',
		 'parent' => 'Parent Gallery'
	);
	$args = array(
		'labels' => $labels,
		'description' => 'Create a new Student Gallery entry for ELI.',
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => 'post',
		'has_archive' => true,
		'map_meta_cap' => true,
		'hierarchical' => false,
		 'rewrite' => array('slug' => 'student-gallery/gallery'),
		'query_var' => true,
		'exclude_from_search' => true,
		'menu_position' => 36,
		'supports' => array('title', 'editor'),
	);
	register_post_type('gallery', $args);
};
add_action('init', 'cptui_register_my_taxes_albums');
function cptui_register_my_taxes_albums() {
	register_taxonomy( 'albums',array (
	  0 => 'gallery',
	),
	array( 'hierarchical' => true,
		'label' => 'Albums',
		'show_ui' => true,
		'query_var' => false,
		'show_admin_column' => false,
		'labels' => array (
	  'search_items' => 'Album',
	  'popular_items' => '',
	  'all_items' => '',
	  'parent_item' => '',
	  'parent_item_colon' => '',
	  'edit_item' => '',
	  'update_item' => '',
	  'add_new_item' => '',
	  'new_item_name' => '',
	  'separate_items_with_commas' => '',
	  'add_or_remove_items' => '',
	  'choose_from_most_used' => '',
	)
	) ); 
}

// Custom CSS Styling
function add_menu_icons_styles(){
?>
 
<style>
#adminmenu #menu-posts-gallery div.wp-menu-image:before {
  content: '\f161';
}
#adminmenu #menu-posts-story div.wp-menu-image:before {
  content: '\f337';
}
#adminmenu #menu-posts-faq div.wp-menu-image:before {
  content: '\f223';
}
#adminmenu #menu-posts-staff div.wp-menu-image:before {
  content: '\f307';
}

</style>
 
<?php
}
add_action( 'admin_head', 'add_menu_icons_styles' );
?>