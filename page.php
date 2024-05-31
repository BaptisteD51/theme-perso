<?php get_header();

if(have_posts()):?>
<main>
    <?php while(have_posts()): the_post();?>
        <h1><?php the_title();?></h1>
        <?php the_content();?>
    <?php endwhile;?>
</main>
<?php else:?>
    <p>Pas de posts à afficher</p>
<?php endif;?>

<?php get_footer();?>