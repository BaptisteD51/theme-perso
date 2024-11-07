<?php function theme_perso_creation_posts()
{
    $query = new WP_Query([
        'post_type' => 'creation',
        'post_status' => 'publish',
        'posts_per_page' => 10,
    ]);
    ob_start(); ?>
    <ul class="archive-post-list">
        <?php while ($query->have_posts()): $query->the_post(); ?>
            <li>
                <a href="<?php the_permalink(); ?>">

                    <?php the_post_thumbnail('thumbnail'); ?>
                    <div class="post-element-text">
                        <h3><?php the_title(); ?></h3>
                        <?php the_excerpt(); ?>
                        <?php if (!empty(wp_get_post_terms(get_the_ID(), "technology"))) : foreach (wp_get_post_terms(get_the_ID(), "technology") as $technology) : ?>
                                <p class="creation-technology"><?php echo $technology->name; ?></p>
                        <?php endforeach;
                        endif; ?>
                    </div>
                </a>
            </li>
        <?php endwhile;
        wp_reset_postdata(); ?>
    </ul>
<?php $html = ob_get_clean();
    return $html;
}
add_shortcode('creation-posts', 'theme_perso_creation_posts');
