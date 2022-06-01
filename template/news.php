<?php

/**
 * Template Name: News Page
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
?>
<main id="news-page">
    <div class="page--header">
        <h1><?php the_title() ?></h1>
    </div>
    <div class="news--content">
        <div class="container">
            <div class="row">
                <?php
                $args = array(
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'posts_per_page' => 6,
                    'order' => 'DESC',
                    'orderby' => 'publish_date',
                    'paged' => (get_query_var('paged') ? get_query_var('paged') : 1),
                );
                $newsposts = new WP_Query($args);

                while ($newsposts->have_posts()) :
                    $newsposts->the_post();

                    $thumb_id = get_post_thumbnail_id();
                    $thumb_url = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
                ?>
                    <div class="col-md-4">
                        <div class="card--container">
                            <div class="card--img">
                                <img src="<?php echo $thumb_url[0] ?>" alt="">
                            </div>
                            <div class="card--info">
                                <a href="<?php the_permalink() ?>">
                                    <h1><?php the_title() ?></h1>
                                </a>
                                <p>In the exhibition, most of the rhythmic paintings are created in the abstract form where their composition an</p>
                                <footer>
                                    <p>10 December 2022</p>
                                    <a href="">
                                        <?php $themefile = get_template_directory_uri(); ?>
                                        <img src="<?php echo $themefile; ?>/assets/icons/right-arrow.svg" alt="">
                                    </a>
                                </footer>
                            </div>
                        </div>
                    </div>
                <?php
                endwhile;
                ?>
                <div class="pagination--container">
                    <?php echo paginate_links(array(
                        'total' => $newsposts->max_num_pages,
                        'mid_size' => 2
                    )); ?>
                </div>
                <?php
                wp_reset_postdata();
                ?>
            </div>
        </div>
    </div>
</main>
<?php
get_footer();
