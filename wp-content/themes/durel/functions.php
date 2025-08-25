<?php

require_once get_template_directory() . '/includes/assetsFunction.php';
require_once get_template_directory() . '/includes/customFunction.php';
require_once get_template_directory() . '/includes/codestar-framework-master/codestar-framework.php';
require_once get_template_directory() . '/includes/codestar-framework-master/samples/admin-options.php';
require_once get_template_directory() . '/includes/class-walker-nav-main-menu.php';
require_once get_template_directory() . '/includes/class-walker-nav-mobile-menu.php';


if (!function_exists('durel_theme_setup')):
    function durel_theme_setup()
    {
        load_theme_textdomain('durel', get_template_directory() . '/languages');
        add_theme_support('automatic-feed-links');
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');        
        register_nav_menus(
            array(
                'main_menu' => __('Main Menu', 'durel'),
                'footer_menu_1' => __('Footer Menu 1', 'durel'),
                'footer_menu_2' => __('Footer Menu 2', 'durel'),
                'footer_menu_3' => __('Footer Menu 3', 'durel'),
                'footer_menu_4' => __('Footer Menu 4', 'durel'),
            )
        );
        add_theme_support(
            'html5',
            array(
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption'
            )
        );
        add_theme_support(
            'post-formats',
            array(
                'aside',
                'image',
                'video',
                'quote',
                'link',
                'gallery',
                'status',
                'audio',
                'chat'
            )
        );

    }
    add_action("after_setup_theme", 'durel_theme_setup');
endif;

if (!function_exists('durel_assets')):
    durel_assets();
endif;
add_action('wp_enqueue_scripts', 'durel_assets');

?>