<?php get_header();

if (have_posts()): ?>
    <main>
        <?php while (have_posts()): the_post(); ?>
            <h1><?php the_title(); ?></h1>
            <div>
                Technologies :
                <?php if (!empty(wp_get_post_terms(get_the_ID(), "technology"))) : foreach (wp_get_post_terms(get_the_ID(), "technology") as $technology) : ?>
                        <p class="creation-technology"><?php echo $technology->name; ?></p>
                <?php endforeach;
                endif; ?>
            </div>
            <figure>
                <?php the_post_thumbnail("large"); ?>
            </figure>
            <?php the_content(); ?>
        <?php endwhile; ?>
    </main>
<?php else: ?>
    <p>Pas de création à afficher</p>
<?php endif; ?>

<?php get_footer(); ?>