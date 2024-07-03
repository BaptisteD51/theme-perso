<?php get_header();
if(have_posts()):?>
<main class="archive-post">
    <ul class="archive-post-list">
        <?php while(have_posts()): the_post();?>
            <li>
                <a href="<?php the_permalink(); ?>">    
                    <h2><?php the_title();?></h2>
                    <figure>
                        <?php the_post_thumbnail("thumbnail");?>
                    </figure>
                    <p><?php the_excerpt();?></p>
                </a>
            </li>
        <?php endwhile;?>
    </ul>
</main>
<?php else:?>
    <p>Pas de posts à afficher</p>
<?php endif;?>



<?php get_footer();?>