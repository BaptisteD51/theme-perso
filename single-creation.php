<?php get_header();

if(have_posts()):?>
<main>
    <?php while(have_posts()): the_post();?>
        <h1><?php the_title();?></h1>
        <figure>
            <?php the_post_thumbnail("large");?>
        </figure>
        <?php the_content();?>
    <?php endwhile;?>
</main>
<?php else:?>
    <p>Pas de création à afficher</p>
<?php endif;?>

<?php get_footer();?>