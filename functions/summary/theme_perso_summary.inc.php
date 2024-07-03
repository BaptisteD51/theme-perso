<?php
/**
 * Function to create a summary at the top of my articles. Add anchors du headers.
 */
include_once 'summary.php';
include_once 'header.php';

function theme_perso_summary($content){
    // Checks if I'm on the post post type
    if ( is_singular('post') && in_the_loop() && is_main_query() ) {
        $summary = new Summary;
        $summary->collect_headers($content);
        var_dump($summary->headers);

        $content = "<h1>Hello World</h1>" . $content;
    }
    return $content;
}

add_filter( 'the_content', 'theme_perso_summary', 1 );