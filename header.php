<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head() ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open();?>
    <header>
        <div class="header-container">
            <p class="site-title">
                <a href="<?php echo theme_perso_get_home_url();?>"><?php bloginfo(); ?></a>
            </p>
            <?php wp_nav_menu(['theme_location' => 'main-menu', 'container' => 'nav', 'container_id' => 'main-menu-wrapper', 'container_class' => 'main-menu-wrapper', 'menu_id' => 'main-menu',]);?>
            
            <div id="burger">
                <i class="fa-solid fa-bars"></i>
            </div>

        </div>
    </header>