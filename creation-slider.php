<?php function theme_perso_creation_slider(){
    $query = new WP_Query([
        'post_type' => 'creation',
        'post_status' => 'publish',
        'posts_per_page'=>10,
    ]);
    ob_start();?>
    <div class="slider">
        <?php while($query->have_posts()): $query->the_post(); ?>
            <div>
                <?php the_post_thumbnail('large');?>
                <div class="slider-text">
                    <h3><?php the_title();?></h3>
                    <p><?php echo get_the_excerpt() . " <a href='".get_the_permalink()."' class='slider-link'>Découvrir</a>"; ?></p>
                </div>
            </div>
        <?php endwhile;wp_reset_postdata(); ?>
    </div>
    <script>
        $('.slider').slick({
            autoplay:true,
        });
    </script>
    <?php $html = ob_get_clean();
    return $html;
}
add_shortcode('creation-slider', 'theme_perso_creation_slider');