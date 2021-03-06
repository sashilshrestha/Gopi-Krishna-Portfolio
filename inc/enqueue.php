<?php

/**
 * Understrap enqueue scripts
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

if (!function_exists('understrap_scripts')) {
	/**
	 * Load theme's JavaScript and CSS sources.
	 */
	function understrap_scripts()
	{
		// Get the theme data.
		$the_theme         = wp_get_theme();
		$theme_version     = $the_theme->get('Version');
		$suffix            = defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '' : '.min';

		// Grab asset urls.
		// {$suffix}
		$theme_styles  = "/css/theme.css";
		$theme_scripts = "/js/theme.js";
		$isotope_scripts = "/js/isotope.js";


		$css_version = $theme_version . '.' . filemtime(get_template_directory() . $theme_styles);
		wp_enqueue_style('understrap-styles', get_template_directory_uri() . $theme_styles, array(), $css_version);

		wp_enqueue_script('jquery');

		$js_version = $theme_version . '.' . filemtime(get_template_directory() . $theme_scripts);
		wp_enqueue_script('understrap-scripts', get_template_directory_uri() . $theme_scripts, array(), $js_version, true);
		wp_enqueue_script('understrap-isotope', get_template_directory_uri() . $isotope_scripts, array(), $js_version, true);

		if (is_singular() && comments_open() && get_option('thread_comments')) {
			wp_enqueue_script('comment-reply');
		}
	}
} // End of if function_exists( 'understrap_scripts' ).

add_action('wp_enqueue_scripts', 'understrap_scripts', 'understrap-isotope');
