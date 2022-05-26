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
            <li><a data-filter=".a" class="">Photos</a></li>
            <li><a data-filter=".b " class="">Videos</a></li>
        </ul>
        <div class="gallery--container">
            <div class="container wrapper">
                <div class="a item"><a href="https://picsum.photos/200/300" class="magnify"><img src="https://picsum.photos/200/300" alt=""></a></div>
                <div class="b item"><a href="https://picsum.photos/200/370" class="magnify"><img src="https://picsum.photos/200/370" alt=""></a></div>
                <div class="a item"><a href="https://picsum.photos/200/350" class="magnify"><img src="https://picsum.photos/200/350" alt=""></a></div>
                <div class="a item"><a href="https://picsum.photos/200/320" class="magnify"><img src="https://picsum.photos/200/320" alt=""></a></div>
                <div class="b item"><a class="popup-youtube" href="http://www.youtube.com/watch?v=0O2aH4XLbto"><img src="https://picsum.photos/200/330" alt=""></a></div>
            </div>
        </div>

    </div>
</main>
<?php
get_footer();
