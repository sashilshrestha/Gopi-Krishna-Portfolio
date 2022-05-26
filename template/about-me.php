<?php

/**
 * Template Name: About Me Page
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
?>
<main id="about-page">
    <div class="page--header">
        <h1><?php the_title() ?></h1>
    </div>
    <div class="page--hero">
        <?php $themefile = get_template_directory_uri(); ?>
        <img src="<?php echo $themefile; ?>/assets/images/abstract-background.png" alt="" class="abstract--background">
        <div class="hero--img">
            <div class="img--container">
                <img src="<?php echo $themefile; ?>/assets/images/about-us-profile.png" alt="">
            </div>
        </div>
    </div>
    <div class="hero--content">
        <div class="container">
            <?php the_content() ?>
        </div>
    </div>
</main>
<?php
get_footer();
