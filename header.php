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
					<!-- The WordPress Menu goes here -->
					<div class="menu-primary-menu-container">
						<ul id="menu-primary-menu" class="nav-links">
							<li id="menu-item-219" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-219"><a href="/" aria-current="page">Home</a></li>
							<li id="menu-item-218" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-218"><a href="https://genzrevise.com/category/gadgets/">About Me</a></li>
							<li id="menu-item-3810" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-3810"><a href="https://genzrevise.com/category/buy-guide/">News</a></li>
							<li id="menu-item-3849" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-3849"><a href="https://genzrevise.com/top-stories/">Photos</a></li>
							<li id="menu-item-3852" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-3852"><a href="https://genzrevise.com/top-stories/">Videos</a></li>
							<li id="menu-item-3853" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-3853"><a href="https://genzrevise.com/category/technology/">Contact</a></li>
						</ul>
					</div>
					<div class="ham-burger">
						<div class="all-lines">
							<div class="line line1"></div>
							<div class="line line2"></div>
							<div class="line line3"></div>
						</div>
					</div>
					<div class="blur-bg"></div>
				</div><!-- .container -->
			</nav>
		</header>
		<!-- #wrapper-navbar end -->