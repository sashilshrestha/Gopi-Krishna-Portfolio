<?php get_header() ?>
<main id="front-page">

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
</main>
<?php get_footer() ?>