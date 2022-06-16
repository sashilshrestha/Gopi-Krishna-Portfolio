<?php

/**
 * Template Name: Youtube Page
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
?>
<main id="gallery-page">
    <div class="page--header">
        <h1><?php the_title() ?></h1>
    </div>
    <div class="gallery--content">
        <?php $themefile = get_template_directory_uri(); ?>
        <div class="subscribe--btn">
            <a href="https://www.youtube.com/c/ArtistKhabar?sub_confirmation=1" target="_blank"><img src="<?php echo $themefile; ?>/assets/images/subscribe.png" alt=""></a>
        </div>
        <div class="gallery--container">
            <div class="container wrapper">
                <!-- Post Calling Loop Started -->
                <?php
                $args = array(
                    'post_type' => 'youtube',
                    'posts_per_page' => -1,
                    'order' => 'DESC',
                    'orderby' => 'published_date',
                );
                $allposts = new WP_Query($args);

                while ($allposts->have_posts()) :
                    $allposts->the_post();
                    // For Image Call
                    $thumb_id = get_post_thumbnail_id();
                    $thumb_url = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
                ?>
                    <!-- Loop Started -->
                    <div class="item"><a href="<?php echo get_field('youtube_link') ?>" class="videos-frame"><img src="<?php echo $thumb_url[0]; ?>" alt=""></a></div>
                    <!-- Loop Ended -->
                <?php
                endwhile;
                wp_reset_postdata();
                ?>
            </div>
        </div>

    </div>
</main>
<?php
get_footer();
