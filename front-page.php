<?php get_header() ?>
<main id="front-page">
    <div class="py-5">
        <div class="your-class">
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
</main>
<?php get_footer() ?>