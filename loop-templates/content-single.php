<?php

/**
 * Single post partial template
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

$thumb_id = get_post_thumbnail_id();
$thumb_url = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);

// Gets Current URL
global $wp;
$current_url = home_url(add_query_arg(array(), $wp->request));
$current_url = substr($current_url, 7);
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<img src="<?php echo $thumb_url[0]; ?>" alt="" class="content-image">

	<div class="row">
		<div class="col-md-9">
			<div class="entry-content">

				<?php the_content(); ?>

				<?php
				wp_link_pages(
					array(
						'before' => '<div class="page-links">' . __('Pages:', 'understrap'),
						'after'  => '</div>',
					)
				);
				?>

			</div><!-- .entry-content -->

		</div>
		<div class="col-md-3 side-container">
			<div class="share-box">
				<span>Share on: </span>
				<a href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F<?php echo $current_url; ?>&amp;src=sdkpreparse"><img src="<?php echo get_template_directory_uri() ?>/assets/icons/Facebook.png" alt="" target="_blank"></a>
				<a href="https://twitter.com/intent/tweet?original_referer=http%3A%2F%2F<?php echo $current_url; ?>&amp;ref_src=twsrc%5Etfw&amp;tw_p=tweetbutton&amp;url=https%3A%2F%2F<?php echo $current_url; ?>"><img src="<?php echo get_template_directory_uri() ?>/assets/icons/Twitter.png" alt="" target="_blank"></a>
				<a href="https://www.linkedin.com/shareArticle?mini=true&url=https%3A%2F<?php echo $current_url; ?>"><img src="<?php echo get_template_directory_uri() ?>/assets/icons/Linkedin.png" alt="" target="_blank"></a>
			</div>
			<div class="side-title">
				<h3>Recent News</h3>
			</div>
			<div class="side-posts">
				<?php
				$args = array(
					'post_type' => 'post',
					'posts_per_page' => 5,
					'order' => 'DESC',
					'orderby' => 'publish_date',
				);
				$allposts = new WP_Query($args);

				while ($allposts->have_posts()) :
					$allposts->the_post();

					$thumb_id = get_post_thumbnail_id();
					$thumb_url = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
				?>

					<div class="side-card">
						<div class="row">
							<div class="side-card__img col-md-4">
								<img src="<?php echo $thumb_url[0]; ?>" alt="">
							</div>
							<div class="side-card__info col-md-8">
								<a href="<?php the_permalink(); ?>">
									<h3><?php the_title(); ?></h3>
									<p><?php echo trim_data(get_the_content(), 5, ' [...]') ?></p>
								</a>
							</div>
						</div>
					</div>
				<?php
				endwhile;
				wp_reset_postdata();
				?>
			</div>

			<div class="side-title">
				<h3>Media Coverages</h3>
			</div>
			<div class="side-posts">
				<?php
				$args = array(
					'post_type' => 'media_coverage',
					'post_status' => 'publish',
					'posts_per_page' => 4,
					'order' => 'DESC',
					'orderby' => 'publish_date',
				);
				$allposts = new WP_Query($args);

				while ($allposts->have_posts()) :
					$allposts->the_post();

					$thumb_id = get_post_thumbnail_id();
					$thumb_url = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
				?>

					<div class="side-card">
						<div class="row">
							<div class="side-card__img col-md-4">
								<img src="<?php echo $thumb_url[0]; ?>" alt="">
							</div>
							<div class="side-card__info col-md-8">
								<a href="<?php the_permalink(); ?>">
									<h3><?php the_title(); ?></h3>
									<p><?php echo trim_data(get_the_content(), 5, ' [...]') ?></p>
								</a>
							</div>
						</div>
					</div>
				<?php
				endwhile;
				$not_in_next_main[] = get_the_ID();
				wp_reset_postdata();
				?>
			</div>

		</div>
	</div>

	<?php
	// if (comments_open()) :
	// 	comments_template();
	// endif;
	?>

</article><!-- #post-## -->