<?php get_header(); ?>
<?php
//var_dump(get_locale());
?>
<main>
    <?php if (have_posts()) : ?>
        <h1><?php echo __("Mes créations de sites Web", "theme_perso"); ?></h1>
        <ul class="archive-post-list">
            <?php while (have_posts()) : the_post(); ?>
                <li>
                    <a href="<?php the_permalink() ?>">
                        <figure>
                            <?php the_post_thumbnail('thumbnail'); ?>
                        </figure>
                        <div class="post-element-text">
                            <h2><?php the_title(); ?></h2>
                            <?php the_excerpt(); ?>
                                <?php if (!empty(wp_get_post_terms(get_the_ID(), "technology"))) : foreach (wp_get_post_terms(get_the_ID(), "technology") as $technology) : ?>
                                        <p class="creation-technology"><?php echo $technology->name; ?></p>
                                <?php endforeach;
                                endif; ?>
                        </div>
                    </a>
                </li>
            <?php endwhile; ?>
        </ul>
    <?php else : ?>
        <p><?php echo __("Pas de créations à afficher", "theme_perso") ?></p>
    <?php endif; ?>
</main>

<?php get_footer(); ?>