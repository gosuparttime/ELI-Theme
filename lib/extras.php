<?php
/**
 * Clean up the_excerpt()
 */
function eli_theme_excerpt_more($more) {
  return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'eli_theme') . '</a>';
}
add_filter('excerpt_more', 'eli_theme_excerpt_more');

/**
 * Manage output of wp_title()
 */
function eli_theme_wp_title($title) {
  if (is_feed()) {
    return $title;
  }

  $title .= get_bloginfo('name');

  return $title;
}
add_filter('wp_title', 'eli_theme_wp_title', 10);

//
// Display Components
function display_module($type, $heading, $block, $hide) {
	echo '<div class="clearfix';
	
	echo '" role="complementary">';
    $query = new WP_Query(array( 'post_type' => 'module', 'name' => $type));
    while ( $query->have_posts() ) : $query->the_post();
	if (!$hide){
		echo '<h'.$heading.'>';
		the_title();
		echo '</h'.$heading.'>';
	}
	if (has_post_thumbnail()){
		echo '<div class="pad-one-t">'; 
		the_post_thumbnail('featured');
		echo '</div>'; 
	}
	the_content();//$info; 
    endwhile;
	wp_reset_postdata();
	echo '</div>'; 
}


// Module Widget
class ModuleWidget extends WP_Widget
{
  function ModuleWidget()
  {
    $widget_ops = array('classname' => 'ModuleWidget', 'description' => 'Displays information from selected module section within "Homepage Options"' );
    $this->WP_Widget('ModuleWidget', 'Module Widget', $widget_ops);
  }
  function form($instance)
  {
    $instance = wp_parse_args( (array) $instance, array( 'color' => '', 'available' => '' ) );
	$available = $instance['available'];
	$query = new WP_Query(array( 'post_type' => 'module', 'orderby' => 'ASC', 'posts_per_page' => '-1'));?>
    <p>
  <label for="<?php echo $this->get_field_id('available'); ?>">Choose A Module: </label>
  <select id="<?php echo $this->get_field_id('available'); ?>" name="<?php echo $this->get_field_name('available'); ?>" class="widefat" style="width:100%;">
    <? while ( $query->have_posts() ) : $query->the_post();
  $id = get_the_ID();?>
  <option <?php selected( $instance['available'], $id ); ?> value="<?php echo $id; ?>"><?php echo the_title(); ?></option>
  <? endwhile;
  	wp_reset_postdata(); ?>
  </select>
</p>
<?php
  }
 
  function update($new_instance, $old_instance)
  {
    $instance = $old_instance;
    $instance['color'] = $new_instance['color'];
	$instance['available'] = $new_instance['available'];
    return $instance;
  }
 
    function widget($args, $instance)
  {
    extract($args, EXTR_SKIP);
	$color = empty($instance['color']) ? ' ' : apply_filters('widget_title', $instance['color']);
	$available = empty($instance['available']) ? ' ' : apply_filters('widget_title', $instance['available']);
    $query = new WP_Query(array( 'post_type' => 'module', 'page_id' => $available));
    while ( $query->have_posts() ) : $query->the_post();
   
    //$title = the_title();
 	
    //if (!empty($title))
    echo $before_widget;
	echo $before_title;
	echo the_title();
	echo $after_title;
    
    // WIDGET CODE GOES HERE
   
	echo '<div class="content">';
	if (has_post_thumbnail()){
		echo '<div class="content_img">';
	};
	echo the_content();
	if (get_field('page_link')){
		echo '<p><a href="';
			if( get_field('internal_link')){
				the_field('internal_link');
				echo '"';
			}
			else if(get_field('external_link')){
				the_field('external_link');
				echo '" target="_blank"';
			} else {
				the_permakink();
				echo '"';
			}
		echo 'title="';
		echo the_title();
		echo '">';
		if (get_field('link_label')){
			the_field('link_label');
			echo '</a>';
		} else {
			echo 'Learn More</a></p>';
		};
	};
	echo '</div>';
	if (has_post_thumbnail()){
		the_post_thumbnail('thumbnail');
		echo '</div>';
	};
    echo $after_widget;
	endwhile;
	wp_reset_postdata();
  }
 
}
add_action( 'widgets_init', create_function('', 'return register_widget("ModuleWidget");') );

// Format Styles
add_filter( 'tiny_mce_before_init', 'fb_mce_before_init' );
function fb_mce_before_init( $settings ) {

    $style_formats = array(
        array(
            'title' => 'Colors',
			'items' => array(
				array(
					'title' => 'Red',
					'inline' => 'span',
					'classes' => 'red',
				),
				array(
					'title' => 'Blue',
					'inline' => 'span',
					'classes' => 'blue',
				),
				array(
					'title' => 'Orange',
					'inline' => 'span',
					'classes' => 'orange',
				),
				array(
					'title' => 'White',
					'inline' => 'span',
					'classes' => 'white',
				),
				array(
					'title' => 'Gray',
					'inline' => 'span',
					'classes' => 'gray',
				),
				array(
					'title' => 'Gray - Light',
					'inline' => 'span',
					'classes' => 'gray-light',
				),
				array(
					'title' => 'Gray - Lighter',
					'inline' => 'span',
					'classes' => 'gray-lighter',
				),
			),
        ),
        array(
            'title' => 'Unordered Lists',
			'items' => array(
				array(
					'title' => 'Unstyled',
					'selector' => 'ul',
					'classes' => 'list-unstyled',
				),
				array(
					'title' => 'Inline',
					'selector' => 'ul',
					'classes' => 'list-inline',
				),
			),
		),
		array(
            'title' => 'Tables',
			'items' => array(
				array(
					'title' => 'Table Hover',
					'selector' => 'table',
					'classes' => 'table table-hover',
				),
				array(
					'title' => 'Table Condensed',
					'selector' => 'table',
					'classes' => 'table table-condensed',
				),
				array(
					'title' => 'Table Bordered',
					'selector' => 'table',
					'classes' => 'table table-bordered',
				),
			),
		),
		array(
            'title' => 'Table - Cell Background',
			'items' => array(
				array(
					'title' => 'Yellow',
					'selector' => 'td',
					'block' => 'td',
					'classes' => 'bg-warning',
				),
				array(
					'title' => 'Green',
					'selector' => 'td',
					'block' => 'td',
					'classes' => 'bg-success',
				),
				array(
					'title' => 'Blue',
					'selector' => 'td',
					'block' => 'td',
					'classes' => 'bg-info',
				),
				array(
					'title' => 'Red',
					'selector' => 'td',
					'block' => 'td',
					'classes' => 'bg-danger',
				),
				array(
					'title' => 'Gray - Light',
					'selector' => 'td',
					'block' => 'td',
					'classes' => 'bg-gray-light',
				),
			),
		),
    );

    $settings['style_formats'] = json_encode( $style_formats );

    return $settings;

}
//
