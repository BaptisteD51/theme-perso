<?php get_header();
if(have_posts()):?>
<main class="archive-post">
    <h1>Blog</h1>
    <ul class="archive-post-list">
        <?php while(have_posts()): the_post();?>
            <li>
                <a href="<?php the_permalink(); ?>">    
                    <figure>
                        <?php the_post_thumbnail("thumbnail");?>
                    </figure>
                    <div class="post-element-text">
                        <h2><?php the_title();?></h2>
                        <?php the_excerpt();?>
                    </div>
                </a>
            </li>
        <?php endwhile;?>
    </ul>
</main>
<?php else:?>
    <p>Pas de posts à afficher</p>
<?php endif;?>



<?php get_footer();?>