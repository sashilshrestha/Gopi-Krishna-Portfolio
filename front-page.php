<?php get_header() ?>
<main id="front-page">

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
    <div class="about--section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1>About Me</h1>
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. </p>
                    <a href="" class="btn btn-primary">Read More</a>
                </div>
                <div class="col-md-6">
                    <?php $themefile = get_template_directory_uri(); ?>
                    <img src="<?php echo $themefile; ?>/assets/images/about-section-profile.png" alt="">
                </div>
            </div>
        </div>
    </div>
</main>
<?php get_footer() ?>