<?php

/**
 * Template Name: Blogs Page
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
?>
<main id="blogs-page">
    <div class="page--header">
        <h1><?php the_title() ?></h1>
    </div>
    <div class="blogs--content">
        <div class="container">
            <div class="row">
                <?php
                $args = array(
                    'post_type' => 'blogs',
                    'post_status' => 'publish',
                    'posts_per_page' => 1,
                    'order' => 'DESC',
                    'orderby' => 'publish_date',

                );
                $newsposts = new WP_Query($args);

                while ($newsposts->have_posts()) :
                    $newsposts->the_post();

                    $thumb_id = get_post_thumbnail_id();
                    $thumb_url = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
                ?>
                    <div class="col-md-9">
                        <div class="carding">
                            <div class="card--container">
                                <div class="card--img">
                                    <img src="<?php echo $thumb_url[0] ?>" alt="">
                                </div>
                                <div class="card--info">
                                    <a href="<?php the_permalink() ?>">
                                        <h1><?php the_title() ?></h1>
                                    </a>
                                    <footer>
                                        <p><?php echo get_the_date() ?></p>
                                        <a href="<?php the_permalink(); ?>">
                                            <?php $themefile = get_template_directory_uri(); ?>
                                            <img src="<?php echo $themefile; ?>/assets/icons/right-arrow.svg" alt="">
                                        </a>
                                    </footer>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                    $not_in_first[] = get_the_ID();
                endwhile;
                wp_reset_postdata();
                ?>
                <div class="col-md-3">
                    <div class="side-title">
                        <h3>Featured Blogs</h3>
                    </div>
                    <div class="side-posts">
                        <?php
                        $args = array(
                            'post_type' => 'blogs',
                            'post_status' => 'publish',
                            'posts_per_page' => 4,
                            'order' => 'DESC',
                            'orderby' => 'publish_date',
                            'meta_query' => array(
                                array(
                                    'key' => 'featured_blog',
                                    'value' => '1',
                                    'compare' => '=',
                                    'type' => 'NUMERIC',
                                ),
                            ),
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
        </div>
        <div class="second--row">
            <div class="container">
                <div class="row">
                    <?php
                    $args = array(
                        'post_type' => 'blogs',
                        'post_status' => 'publish',
                        'posts_per_page' => -1,
                        'order' => 'DESC',
                        'orderby' => 'publish_date',
                        'post__not_in' => $not_in_first,

                    );
                    $newsposts = new WP_Query($args);

                    while ($newsposts->have_posts()) :
                        $newsposts->the_post();

                        $thumb_id = get_post_thumbnail_id();
                        $thumb_url = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
                    ?>
                        <div class="col-md-4">
                            <div class="carding">
                                <div class="card--container">
                                    <div class="card--img">
                                        <img src="<?php echo $thumb_url[0] ?>" alt="" class="image">
                                    </div>
                                    <div class="card--info">
                                        <a href="<?php the_permalink() ?>">
                                            <h1><?php the_title() ?></h1>
                                        </a>
                                        <footer>
                                            <p><?php echo get_the_date() ?></p>
                                            <a href="<?php the_permalink(); ?>">
                                                <?php $themefile = get_template_directory_uri(); ?>
                                                <img src="<?php echo $themefile; ?>/assets/icons/right-arrow.svg" alt="">
                                            </a>
                                        </footer>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    endwhile;
                    ?>
                    <div class="pagination--container">
                        <?php //echo paginate_links(array(
                        //'total' => $newsposts->max_num_pages,
                        //'mid_size' => 2
                        //)); 
                        ?>
                    </div>
                    <?php
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
get_footer();
