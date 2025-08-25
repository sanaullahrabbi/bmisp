<?php


function durelchild_theme_assets()
{
    wp_enqueue_style('durel_parent_theme_style', get_parent_theme_file_uri("/style.css"), array(), time());

    wp_enqueue_style('durel_child_theme_style', get_stylesheet_uri(), array(), time());
}

add_action("wp_enqueue_scripts", "durelchild_theme_assets", 11);
