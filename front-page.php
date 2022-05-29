<?php get_header() ?>
<main id="front-page">

    <!-- Hero Section -->
    <div class="hero--section">
        <div class="container">
            <div class="hero">
                <h5>Hello, I am</h5>
                <h1>Gopi Krishna Chapagain</h1>
                <h4><span>Journalist</span><span>Journalist</span><span>Journalist</span></h4>
            </div>
        </div>
        <div class="img--slider">
            <!-- Post Calling Loop Started -->
            <?php
            $args = array(
                'post_type' => 'slider',
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
            ?>
                <!-- Loop Started -->
                <img src="<?php echo $thumb_url[0] ?>" alt="">
                <!-- Loop Ended -->
            <?php
            endwhile;
            wp_reset_postdata();
            ?>
            <!-- Post Calling Loop Ends -->

        </div>
    </div>

    <!-- About Section -->
    <div class="about--section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 about--section--info">
                    <?php
                    $page_slug = 'about-me';
                    $page_data = get_page_by_path($page_slug);
                    $page_id = $page_data->ID;
                    echo '<h1>' . $page_data->post_title . '</h1>';
                    $paragraph =  $page_data->post_content;
                    ?>
                    <p><?php echo trim_data($paragraph, 85, ' [...]') ?></p>
                    <div>
                        <a href="<?php echo get_permalink($page_id) ?>" class="btn btn-primary">Read More</a>
                    </div>
                </div>
                <div class="col-md-6 about--section--img">
                    <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($page_id), 'single-post-thumbnail'); ?>
                    <img src="<?php echo $image[0]; ?>" alt="">
                    <div class="interviews">
                        <h1 class="counter" data-count="<?php echo get_field('video_interviews', $page_id); ?>"></h1>
                        <h5>Video Interviews</h5>
                    </div>
                    <div class="news">
                        <h1 class="counter" data-count="<?php echo get_field('news', $page_id); ?>"></h1>
                        <h5>News</h5>
                    </div>
                    <div class="media">
                        <h1 class="counter" data-count="<?php echo get_field('media_coverage', $page_id); ?>"></h1>
                        <h5>Media Coverage</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- About Section -->
    <div class="news--section">
        <div class="container">
            <h1 class="section--title">Checkout My News/Blogs</h1>

            <div class="row section--content">
                <?php
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 4,
                    'order' => 'DESC',
                    'orderby' => 'publish_date',

                );
                $youtube_posts = new WP_Query($args);

                while ($youtube_posts->have_posts()) :
                    $youtube_posts->the_post();
                    // For Image Call
                    $thumb_id = get_post_thumbnail_id();
                    $thumb_url = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
                ?>
                    <!-- Loop Started -->
                    <div class="col-md-6">
                        <div class="card--container">
                            <img src="<?php echo $thumb_url[0] ?>" alt="">
                            <div class="bg--overlay"></div>
                            <div class="card--info">
                                <a href="<?php the_permalink() ?>">
                                    <h4><?php the_title() ?></h4>
                                </a>
                                <h5>
                                    <?php
                                    $content = get_the_content();
                                    echo trim_data($content, 15, ' [...]')
                                    ?></h5>
                            </div>
                        </div>
                    </div>
                    <!-- Loop Started -->
                <?php
                endwhile;
                wp_reset_postdata();
                ?>
                <div class="col-md-6"></div>
                <div class="col-md-6 explore--more">
                    <h1></h1>
                </div>
            </div>

        </div>
    </div>
</main>
<?php get_footer() ?>