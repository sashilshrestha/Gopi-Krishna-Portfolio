<?php

/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="shortcut icon" href="#">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php do_action('wp_body_open'); ?>
	<div class="site" id="page">

		<!-- ******************* The Navbar Area ******************* -->
		<header id="wrapper-navbar">
			<nav id="main-nav">
				<div class="container">
					<?php echo get_custom_logo(); ?>
					<!-- The WordPress Menu goes here -->
					<?php
					wp_nav_menu(
						array(
							'theme_location'  => 'primary',
							'container_class' => '',
							'container_id'    => '',
							'menu_class'      => 'nav-links',
							'fallback_cb'     => '',
							'menu_id'         => '',
							'depth'           => 2,
							// 'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
						)
					);
					?>
					<div class="ham-burger">
						<div class="all-lines">
							<div class="line line1"></div>
							<div class="line line2"></div>
							<div class="line line3"></div>
						</div>
					</div>
					<!-- <div class="blur-bg"></div> -->
				</div><!-- .container -->
			</nav>
		</header>
		<!-- #wrapper-navbar end -->