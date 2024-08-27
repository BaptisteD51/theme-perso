<?php get_header();?>
<main>
<?php if(have_posts()):?>
    <?php while(have_posts()): the_post();?>
        <h1><?php the_title();?></h1>
        <?php the_post_thumbnail('medium');?>
        <?php the_content();?>
    <?php endwhile;?>

<?php else:?>
    <p>Pas de posts à afficher</p>
<?php endif;?>

</main>
<?php get_footer();?>