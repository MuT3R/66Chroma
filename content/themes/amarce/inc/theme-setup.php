<?php

function chroma_setup()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(500, 500, ['center', 'center']);
    add_image_size( 'crop-portfolio', 800, 800, ['center', 'center'], TRUE);
    add_image_size( 'crop-banner', 800, 800, ['center', 'center'], TRUE);


    register_nav_menus([
        'menu_header' => 'Menu de navigation du haut de la page',
    ]);

}

add_action('after_setup_theme', 'chroma_setup');