<?php

require_once get_template_directory() . '/includes/assetsFunction.php';
require_once get_template_directory() . '/includes/customFunction.php';
require_once get_template_directory() . '/includes/codestar-framework-master/codestar-framework.php';
require_once get_template_directory() . '/includes/codestar-framework-master/samples/admin-options.php';
require_once get_template_directory() . '/includes/class-walker-nav-main-menu.php';
require_once get_template_directory() . '/includes/class-walker-nav-mobile-menu.php';


if (!function_exists('durel_redesigned_theme_setup')):
    function durel_redesigned_theme_setup()
    {
        load_theme_textdomain('durel-redesigned', get_template_directory() . '/languages');
        add_theme_support('automatic-feed-links');
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');        
        register_nav_menus(
            array(
                'main_menu' => __('Main Menu', 'durel-redesigned'),
                'footer_menu_1' => __('Footer Menu 1', 'durel-redesigned'),
                'footer_menu_2' => __('Footer Menu 2', 'durel-redesigned'),
                'footer_menu_3' => __('Footer Menu 3', 'durel-redesigned'),
                'footer_menu_4' => __('Footer Menu 4', 'durel-redesigned'),
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
    add_action("after_setup_theme", 'durel_redesigned_theme_setup');
endif;

if (!function_exists('durel_redesigned_assets')):
    durel_redesigned_assets();
endif;
add_action('wp_enqueue_scripts', 'durel_redesigned_assets');


// Helper function to get global contact information
if (!function_exists('durel_get_contact_info')):
    function durel_get_contact_info($key = null) {
        $options = get_option('durel_options');
        
        $contact_info = array(
            'company_name' => $options['durel_ss_company_name'] ?? '',
            'phone' => $options['durel_ss_company_phone'] ?? '',
            'email' => $options['durel_ss_company_email'] ?? '',
            'address' => $options['durel_ss_company_address'] ?? '',
            'description' => $options['durel_ss_company_description'] ?? '',
            'google_map_link' => $options['durel_ss_google_map_link'] ?? '',
            'social_links' => $options['durel_ss_social_links_group'] ?? array(),
            'copyright' => $options['durel_ss_copyright_text'] ?? '© 2024 All Rights Reserved',
            'header_logo' => $options['durel_ss_header_logo'] ?? '',
            'client_login_link' => $options['durel_ss_client_login_link'] ?? '',
            'new_connection_link' => $options['durel_ss_new_connection_link'] ?? '/new-connection',
            'footer_show_contact' => $options['durel_ss_footer_show_contact'] ?? true,
            'footer_show_social' => $options['durel_ss_footer_show_social'] ?? true,
            'show_floating_buttons' => $options['durel_ss_show_floating_buttons'] ?? true,
        );
        
        if ($key) {
            return isset($contact_info[$key]) ? $contact_info[$key] : '';
        }
        
        return $contact_info;
    }
endif;

?>