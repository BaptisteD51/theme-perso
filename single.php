<?php get_header();?>
<main>
<?php if(have_posts()):?>
    <?php while(have_posts()): the_post();?>
        <h1><?php the_title();?></h1>
        <p class="post-publication-date">
            <time><?php the_date(); ?></time>
        </p>
        <figure>
            <?php the_post_thumbnail('medium');?>
            <figcaption>
                <?php echo get_the_post_thumbnail_caption(); ?>
            </figcaption>
        </figure>
        <?php the_content();?>
    <?php endwhile;?>

<?php else:?>
    <p>Pas de posts à afficher</p>
<?php endif;?>

</main>
<?php get_footer();?>