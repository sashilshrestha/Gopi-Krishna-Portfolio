<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
?>

<?php get_template_part('sidebar-templates/sidebar', 'footerfull'); ?>


<footer>
	<div class="container">
		<h1>Gopi Krishna Chapagain</h1>
		<p>Are you interested in collaborating or want to connect or chat? If so, hit the contact button down below or contact me via LinkedIn.</p>
		<a href="" class="btn btn-primary">Contact</a>
		<h5>Follow Me on</h5>
		<div class="social--icons">
			<div>Facebook</div>
			<div>Facebook</div>
			<div>Facebook</div>
			<div>Facebook</div>
		</div>
		<div class="copyright--section">
			<p>© Copyright 2022, Gopi Krishna Chapagain. All Rights Reserved.</p>
		</div>
		<div class="author--section">
			Made with &hearts; in Nepal By Sashil
		</div>
	</div>
</footer>


</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>