<?php

/**
 * Template Name: Gallery Page
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
        <ul class="links">
            <li><a data-filter="*" class="active">All</a></li>
            <?php
            $taxonomy = get_terms('photos_category', array('hide_empty' => 0));
            foreach ($taxonomy as $taxo) {

            ?>
                <li><a data-filter=".<?php echo $taxo->name ?>"><?php echo $taxo->name ?></a></li>
            <?php
            }
            ?>



        </ul>
        <div class="gallery--container">
            <div class="container wrapper">
                <!-- Post Calling Loop Started -->
                <?php
                $args = array(
                    'post_type' => 'photos',
                    'posts_per_page' => -1,
                    'order' => 'ASC',
                    'orderby' => 'menu_order',
                );
                $allposts = new WP_Query($args);

                while ($allposts->have_posts()) :
                    $allposts->the_post();
                    // For Image Call
                    $thumb_id = get_post_thumbnail_id();
                    $thumb_url = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
                    $categories = get_the_terms($post->ID, 'photos_category');

                ?>
                    <!-- Loop Started -->
                    <div class="<?php print_r($categories[0]->name); ?> item"><a href="<?php echo $thumb_url[0]; ?>" class="magnify" title="<?php the_title(); ?>"><img src="<?php echo $thumb_url[0]; ?>" alt=""></a></div>
                    <!-- Loop Ended -->
                <?php
                endwhile;
                wp_reset_postdata();
                ?>
                <div class="item"><a href="https://www.youtube.com/watch?v=06hKnu9RUKk" class="videos-frame"><img src="https://i.ytimg.com/vi/06hKnu9RUKk/hqdefault.jpg?sqp=-oaymwEcCPYBEIoBSFXyq4qpAw4IARUAAIhCGAFwAcABBg==&rs=AOn4CLCKcuasF0VSv4Z1uZJodGtv5SyJzA" alt=""></a></div>
            </div>
        </div>

    </div>
</main>
<?php
get_footer();
