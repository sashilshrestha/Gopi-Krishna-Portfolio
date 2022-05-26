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
        <ul>
            <li><a href="" data-filter="*">All</a></li>
            <li><a href="" data-filter=".a">A</a></li>
            <li><a href="" data-filter=".b">B</a></li>
        </ul>
        <div class="d-flex">
            <div class="a"><img src="https://picsum.photos/200/300" alt=""></div>
            <div class="b"><img src="https://picsum.photos/200/370" alt=""></div>
            <div class="a"><img src="https://picsum.photos/200/350" alt=""></div>
            <div class="a"><img src="https://picsum.photos/200/320" alt=""></div>
            <div class="b"><img src="https://picsum.photos/200/330" alt=""></div>
        </div>

    </div>
</main>
<?php
get_footer();
