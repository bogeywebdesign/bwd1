<?php
remove_action( 'wp_head', 'wp_generator' );

$content_width = 700;

if(function_exists('register_sidebar')){
		function replace_widgets() {
			unregister_sidebar_widget('tag_cloud');
		}
		
		add_action('widgets_init','replace_widgets');
		
		register_sidebar(array(
		'name' => 'Blog Sidebar',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3>',
		'after_title' => '</h3>'));
		
		register_sidebar(array(
		'name' => 'Page Sidebar',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3>',
		'after_title' => '</h3>'));
		
		register_sidebar(array(
		'name' => '404 Sidebar',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3>',
		'after_title' => '</h3>'));
}

// make the tag cloud easier to style
function new_widget_cloud() {
	global $wpdb, $post;
	$options = get_option('widget_tag_cloud');
	$title = empty($options['title']) ? __('Popular Tags') : apply_filters('widget_title', $options['title']);
	
	if(function_exists('wp_tag_cloud')){
		echo "<h3>" . $title . "</h3>
		<p id=\"tagCloud\">";
			wp_tag_cloud("smallest=1&largest=2.4&unit=em&number=25");
		echo "</p>";
	}
}

// keep the option to change the title for tag cloud
function new_widget_cloud_control() {
	$options = $newoptions = get_option('widget_tag_cloud');

	if ( isset($_POST['tag-cloud-submit']) ) {
		$newoptions['title'] = strip_tags(stripslashes($_POST['tag-cloud-title']));
	}

	if ( $options != $newoptions ) {
		$options = $newoptions;
		update_option('widget_tag_cloud', $options);
	}

	$title = attribute_escape( $options['title'] );
?>
	<p><label for="tag-cloud-title">
	<?php _e('Title:') ?> <input type="text" class="widefat" id="tag-cloud-title" name="tag-cloud-title" value="<?php echo $title ?>" /></label>
	</p>
	<input type="hidden" name="tag-cloud-submit" id="tag-cloud-submit" value="1" />
<?php
}

// get the copyright range
function copyright() {
  global $wpdb;

  $posts = $wpdb->get_results("SELECT YEAR(post_date_gmt) AS year FROM $wpdb->posts WHERE post_date_gmt > 1970 ORDER BY post_date_gmt ASC");
  $first = $posts[0]->year;

  $copyright = __('&copy; Copyright ') . $first;
  
  if($first != date('Y')) {
    $copyright .= ' &ndash; ' . date('Y');
  }

  return $copyright;
}

$widget_ops = array('classname' => 'new_widget_cloud', 'description' => __( "Tag Cloud") );
wp_register_sidebar_widget('new_widget_cloud', __('Tag Cloud'), 'new_widget_cloud', $widget_ops);
wp_register_widget_control('new_widget_cloud', __('Tag Cloud'), 'new_widget_cloud_control' );

// including options page for home page intro text
include(TEMPLATEPATH . '/functions/optionsPage.php');
?>