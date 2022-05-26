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
                <div class="col-md-4">
                    <div class="card--container">
                        <div class="card--img">
                            <img src="https://images.unsplash.com/photo-1653463174231-3911539cfdd9?crop=entropy&cs=tinysrgb&fm=jpg&ixlib=rb-1.2.1&q=80&raw_url=true&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170" alt="">
                        </div>
                        <div class="card--info">
                            <h1>Sirjana-2020: Kathmandu hosts a collective art show featuring paintings and more</h1>
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
            </div>
        </div>
    </div>
</main>
<?php
get_footer();
