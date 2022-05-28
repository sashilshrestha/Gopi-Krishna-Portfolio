<?php

/**
 * UnderStrap functions and definitions
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

// UnderStrap's includes directory.
$understrap_inc_dir = 'inc';

// Array of files to include.
$understrap_includes = array(
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                      // Custom pagination for this theme.
	'/hooks.php',                           // Custom hooks.
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	'/customizer.php',                      // Customizer additions.
	'/custom-comments.php',                 // Custom Comments file.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker. Trying to get deeper navigation? Check out: https://github.com/understrap/understrap/issues/567.
	'/editor.php',                          // Load Editor functions.
	'/block-editor.php',                    // Load Block Editor functions.
	'/deprecated.php',                      // Load deprecated functions.
);

// Load WooCommerce functions if WooCommerce is activated.
if (class_exists('WooCommerce')) {
	$understrap_includes[] = '/woocommerce.php';
}

// Load Jetpack compatibility file if Jetpack is activiated.
if (class_exists('Jetpack')) {
	$understrap_includes[] = '/jetpack.php';
}

// Include files.
foreach ($understrap_includes as $file) {
	require_once get_theme_file_path($understrap_inc_dir . $file);
}


// ----------------------------- Feature image in admin pannel -----------------------------
// show featured images in dashboard
add_image_size('prithak-admin-post-featured-image', 70, 120, false);

// Add the posts and pages columns filter. They both use the same function.
add_filter('manage_posts_columns', 'prithak_add_post_admin_thumbnail_column', 2);
add_filter('manage_pages_columns', 'prithak_add_post_admin_thumbnail_column', 2);

// Add the column
function prithak_add_post_admin_thumbnail_column($prithak_columns)
{
	$prithak_columns['prithak_thumb'] = __('Featured Image');
	return $prithak_columns;
}

// Manage Post and Page Admin Panel Columns
add_action('manage_posts_custom_column', 'prithak_show_post_thumbnail_column', 5, 2);
add_action('manage_pages_custom_column', 'prithak_show_post_thumbnail_column', 5, 2);

// Get featured-thumbnail size post thumbnail and display it
function prithak_show_post_thumbnail_column($prithak_columns, $prithak_id)
{
	switch ($prithak_columns) {
		case 'prithak_thumb':
			if (function_exists('the_post_thumbnail')) {
				echo the_post_thumbnail('prithak-admin-post-featured-image');
			} else
				echo 'hmm… your theme doesn\'t support featured image…';
			break;
	}
}

// ----------------------------- Custom Excerpt  -----------------------------
function trim_data($excerpt, $num_words, $more)
{
	$excerpt = wp_trim_words($excerpt, $num_words, $more);
	return $excerpt;
}

// ----------------------------- Custom slider post type -----------------------------
function gk_custom_slider()
{
	register_post_type('Slider', [
		'rewrite' => ['slug' => 'Slider'],
		'labels' => [
			'name' => 'Slider',
			'singular_name' => 'Slide',
			'add_new_item' => 'Add New Slide',
			'edit_item' => 'Edit Slide',
		],
		'menu_icon' => 'dashicons-media-archive',
		'public' => true,
		'has_archive' => true,
		'show_in_rest' => true,
		'menu_position' => 10,
		'supports' => ['title', 'editor', 'thumbnail', 'page-attributes'],
	]);
}
add_action('init', 'gk_custom_slider');

// ----------------------------- Custom youtube videos post type -----------------------------
function gk_custom_yt_videos()
{
	register_post_type('youtube', [
		'rewrite' => ['slug' => 'Youtube'],
		'labels' => [
			'name' => 'YT Videos',
			'singular_name' => 'YT',
			'add_new_item' => 'Add New YT Video',
			'edit_item' => 'Edit YT Video',
		],
		'menu_icon' => 'dashicons-video-alt3',
		'public' => true,
		'has_archive' => true,
		'show_in_rest' => true,
		'menu_position' => 11,
		'supports' => ['title', 'editor', 'thumbnail', 'page-attributes'],
	]);
}
add_action('init', 'gk_custom_yt_videos');

// ----------------------------- Custom photo gallery post type -----------------------------
function gk_custom_photo_gallery()
{
	register_post_type('photos', [
		'rewrite' => ['slug' => 'Photos'],
		'labels' => [
			'name' => 'Photos',
			'singular_name' => 'Photo',
			'add_new_item' => 'Add New Photo',
			'edit_item' => 'Edit Photo',
		],
		'menu_icon' => 'dashicons-embed-photo',
		'public' => true,
		'has_archive' => true,
		'show_in_rest' => true,
		'menu_position' => 12,
		'supports' => ['title', 'editor', 'thumbnail', 'page-attributes', 'taxonomy'],
	]);
}
add_action('init', 'gk_custom_photo_gallery');

// ----------------------------- Custom media coverage post type -----------------------------
function gk_custom_media_coverage()
{
	register_post_type('media_coverage', [
		'rewrite' => ['slug' => 'Media Coverage'],
		'labels' => [
			'name' => 'Media Coverage',
			'singular_name' => 'Coverage',
			'add_new_item' => 'Add New Coverage',
			'edit_item' => 'Edit Coverage',
		],
		'menu_icon' => 'dashicons-welcome-widgets-menus',
		'public' => true,
		'has_archive' => true,
		'show_in_rest' => true,
		'menu_position' => 13,
		'supports' => ['title', 'editor', 'thumbnail', 'page-attributes', 'taxonomy'],
	]);
}
add_action('init', 'gk_custom_media_coverage');

// ----------------------------- Custom Taxonomy for Custom Post -----------------------------
function taxonomies_photos()
{
	$labels = array(
		'name'              => _x('Photos Categories', 'taxonomy general name'),
		'singular_name'     => _x('Photos Category', 'taxonomy singular name'),
		'search_items'      => __('Search Photos Categories'),
		'all_items'         => __('All Photos Categories'),
		'parent_item'       => __('Parent Photos Category'),
		'parent_item_colon' => __('Parent Photos Category:'),
		'edit_item'         => __('Edit Photos Category'),
		'update_item'       => __('Update Photos Category'),
		'add_new_item'      => __('Add New Photos Category'),
		'new_item_name'     => __('New Photos Category'),
		'menu_name'         => __('Photos Categories'),
	);
	$args = array(
		'labels' => $labels,
		'hierarchical' => true,
		'show_in_rest' => true,
	);
	register_taxonomy('photos_category', 'photos', $args);
}
add_action('init', 'taxonomies_photos', 0);
