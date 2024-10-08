<?php get_header(); ?>
<?php
//var_dump(get_locale());
?>
<main>
    <?php if (have_posts()) : ?>
        <h1><?php echo __("Mes créations de sites Web", "theme_perso");?></h1>
        <ul class="archive-creation-list">
            <?php while (have_posts()) : the_post(); ?>
                <li>
                    <a href="<?php the_permalink() ?>">
                        <figure>
                            <?php the_post_thumbnail('thumbnail'); ?>                        
                        </figure>
                        <h2><?php the_title(); ?></h2>
                    </a>
                </li>
            <?php endwhile; ?>
        </ul>
    <?php else : ?>
        <p><?php echo __("Pas de créations à afficher", "theme_perso") ?></p>
    <?php endif; ?>
</main>

<?php get_footer(); ?>