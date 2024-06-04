<?php
function theme_perso_assets(){
    wp_register_style( 'theme_perso_style', get_template_directory_uri() . '/style.css');
    wp_register_script('fontawesome', 'https://kit.fontawesome.com/1c552aca57.js');
    wp_register_style('roboto', 'https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');

    wp_enqueue_style('theme_perso_style');
    wp_enqueue_script('fontawesome');
    wp_enqueue_style('roboto');
};

function theme_perso_supports(){
    add_theme_support('menus');
    add_theme_support('post-thumbnails',[
        'post',
        'creation',
    ]);

    register_nav_menus([
        'main-menu'=> 'Menu principal',
        'footer-menu'=> 'Menu footer',
    ]);
}

function theme_perso_init(){
    register_post_type("creation", [
        "label"=>'Créations',
        "labels"=>[
            "name"=>"Créations",
            "singular_name"=>"Création",
            "add_new"=>"Ajouter une nouvelle création",
            "add_new_item"=>"Ajouter une nouvelle création",
            "edit_item"=>"Modifier la création",
            "new_item"=>"Nouvelle création",
            "view_item"=>"Voir la création",
            "view_items"=>"Visualiser les créations",
            "search_items"=>"Rechercher des créations",
            "not_found"=>"Pas de création trouvée",
            "not_found_in_trash"=>"Pas de création trouvée dans la corbeille",
            "all_items"=>"Toutes les créations",
            "archives"=>"Archives des créations",
            "attributes"=>"Attributs de la création",
            "insert_into_item"=>"Insérer dans la création",
            "uploaded_to_this_item"=>"Ajouté à la création",
        ],
        "public"=>true,
        "show_in_rest"=>true,
        "menu_icon"=>"dashicons-admin-site-alt3",
        "supports"=>[
            'title',
            'editor',
            'excerpt',
            'thumbnail',
        ],
        "has_archive"=>true,
        "rewrite"=>[
            "slug"=>"creations",
            "with_front"=>"false",
        ]
    ]);
}

function theme_perso_creation_slider(){
    $query = new WP_Query([
        'post_type' => 'creation',
        'post_status' => 'publish',
        'posts_per_page'=>10,
    ]);
    ob_start();?>
    <ul>
        <?php while($query->have_posts()): $query->the_post(); ?>
            <li>
                <?php
                    the_title();
                    the_excerpt();
                    the_post_thumbnail('large');
                ?>
            </li>
        <?php endwhile;wp_reset_postdata(); ?>
    </ul>
    <?php $html = ob_get_clean();
    return $html;
}
add_shortcode('creation-slider', 'theme_perso_creation_slider');

add_action('wp_enqueue_scripts', 'theme_perso_assets');
add_action('after_setup_theme', 'theme_perso_supports');
add_action('init','theme_perso_init');