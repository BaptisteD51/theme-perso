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

    register_nav_menus([
        'main-menu'=> 'Menu principal',
        'footer-menu'=> 'Menu footer',
    ]);
}

add_action('wp_enqueue_scripts', 'theme_perso_assets');
add_action('after_setup_theme', 'theme_perso_supports');