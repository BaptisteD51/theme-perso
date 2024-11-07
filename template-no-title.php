<?php
/**
 * Template Name: Page sans <h1>
 * Template Post Type: page
 */
get_header();

if(have_posts()):?>
<main>
    <?php while(have_posts()): the_post();?>
        <?php the_content();?>
    <?php endwhile;?>
</main>
<?php else:?>
    <p>Pas de posts à afficher</p>
<?php endif;?>

<?php get_footer();?>