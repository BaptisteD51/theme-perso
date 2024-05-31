<?php get_header();
if(have_posts()):?>
<ul>
    <?php while(have_posts()): the_post();?>
        <li>
            <h1><?php the_title();?></h1>
            <?php the_content();?>
        </li>
    <?php endwhile;?>
</ul>
<?php else:?>
    <p>Pas de posts à afficher</p>
<?php endif;?>



<?php get_footer();?>