<?php
function theme_perso_assets(){
    wp_register_style( 'theme_perso_style', get_template_directory_uri() . '/style.css');
    wp_register_script('fontawesome', 'https://kit.fontawesome.com/1c552aca57.js');
    wp_register_style('roboto', 'https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');
    wp_register_script('jq', get_template_directory_uri().'/js/jquery/jquery-3.7.1.min.js');
    wp_register_style('slick-css', get_template_directory_uri().'/js/slick/slick.css');
    wp_register_style('slick-theme-css', get_template_directory_uri().'/js/slick/slick-theme.css');
    wp_register_script('slick', get_template_directory_uri().'/js/slick/slick.min.js');
    wp_register_style('slider', get_template_directory_uri().'/css/slider.css');
    wp_register_script('highlightjs', get_template_directory_uri()."/js/highlightjs/highlight.min.js");
    wp_register_style('highlightjsCSS', get_template_directory_uri()."/js/highlightjs/styles/atom-one-dark-reasonable.min.css");
    wp_register_style('burgerCSS', get_template_directory_uri()."/css/burger.css");
    //wp_register_script('iconify', "https://code.iconify.design/iconify-icon/2.1.0/iconify-icon.min.js");

    wp_enqueue_style('theme_perso_style');
    wp_enqueue_script('fontawesome');
    wp_enqueue_style('roboto');
    wp_enqueue_script('jq');
    wp_enqueue_style('slick-css');
    wp_enqueue_script('slick');
    wp_enqueue_style('slick-theme-css');
    wp_enqueue_style('slider');
    wp_enqueue_script('highlightjs');
    wp_enqueue_style('highlightjsCSS');
    wp_enqueue_style('burgerCSS');
    //wp_enqueue_script('iconify');
};

function theme_perso_supports(){
    add_theme_support('menus');
    add_theme_support('post-thumbnails',[
        'post',
        'creation',
    ]);
    add_theme_support('align-wide');
    add_theme_support('editor-styles');

    $palette = [
        [
            "slug" => "bleu-clair",
            "color" => "#d4e9ff",
            "name" => "Bleu Clair"
        ],[
            "slug" => "bleu-moyen",
            "color" => "#357bb1",
            "name" => "Bleu Moyen"
        ],[
            "slug" => "bleu-sombre",
            "color" => "#224870",
            "name" => "Bleu Sombre"
        ],
    ];
    add_theme_support('editor-color-palette', $palette);

    add_theme_support('appearance-tools');
    
    add_theme_support('custom-spacing');

    add_theme_support( "title-tag" );

    register_nav_menus([
        'main-menu'=> 'Menu principal',
        'footer-menu'=> 'Menu footer',
    ]);

    load_theme_textdomain('theme_perso',get_template_directory()."/languages");
}

add_editor_style(get_template_directory_uri() . '/css/editor-style.css');

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

function theme_perso_wp_footer(){
    wp_register_script('script', get_template_directory_uri()."/js/script.js");
    wp_register_script('burger', get_template_directory_uri()."/js/burger.js");

    wp_enqueue_script("script");
    wp_enqueue_script("burger");
}

function theme_perso_excerpt_length($length){
    return 20;
}

require_once 'creation-slider.php';

require_once 'functions/summary/theme_perso_summary.inc.php';

require_once 'functions/theme_perso_get_home_url.inc.php';

add_action('wp_enqueue_scripts', 'theme_perso_assets');
add_action('after_setup_theme', 'theme_perso_supports');
add_action('init','theme_perso_init');
add_action('wp_footer', 'theme_perso_wp_footer');
add_filter( 'excerpt_length', 'theme_perso_excerpt_length');