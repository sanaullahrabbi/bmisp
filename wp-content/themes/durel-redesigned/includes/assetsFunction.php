<?php


define("ASSETS_PATH", get_template_directory_uri() . '/assets/');
define("VERSION", time());


function durel_redesigned_assets()
{
    // CSS Files
    $cssFiles = array(
        "durel_bootstrap_min" => ASSETS_PATH . "css/bootstrap.min.css",
        "durel_viewbox" => ASSETS_PATH . "css/viewbox.css",
        "durel_mediabox" => ASSETS_PATH . "css/mediabox.css",
        "durel_slick_cdn" => "https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css",
        "durel_slick_theme_cdn" => "https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css",
        "durel_swiper" => "https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css",
        "durel_style_min" => ASSETS_PATH . "css/style.min.css",
        "durel_custom" => ASSETS_PATH . "css/custom.css",
        "durel_responsive" => ASSETS_PATH . "css/responsive.css",
    );

    foreach ($cssFiles as $handleKey => $cssFile):
        wp_enqueue_style($handleKey, $cssFile, array(), VERSION, 'all');
    endforeach;
    wp_enqueue_style('durel_main_theme_root_style', get_stylesheet_uri());

    // JS Files
    $jsFiles = array(
        'durel_jquery_cdn' => 'https://code.jquery.com/jquery-3.6.0.min.js',
        'durel_jquery_min' => ASSETS_PATH . 'vendor/jquery.min.js',
        'durel_bootstrap_min' => ASSETS_PATH . 'vendor/bootstrap/js/bootstrap.bundle.min.js',
        'durel_wow_min' => ASSETS_PATH . 'vendor/wow/wow.min.js',
        'durel_slick_cdn' => 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js',
        'durel_swiper' => 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js',
        'durel_fancybox_min' => ASSETS_PATH . 'vendor/fancybox/dist/jquery.fancybox.min.js',
        'durel_lazy_min' => ASSETS_PATH . 'vendor/jquery.lazy.min.js',
        'durel_counterup_min' => ASSETS_PATH . 'vendor/jquery.counterup.min.js',
        'durel_waypoints_min' => ASSETS_PATH . 'vendor/jquery.waypoints.min.js',
        'durel_nice_select_min' => ASSETS_PATH . 'vendor/nice-select/jquery.nice-select.min.js',
        'durel_validator' => ASSETS_PATH . 'vendor/validator.js',
        'durel_isotope_pkgd_min' => ASSETS_PATH . 'js/isotope.pkgd.min.js',
        'durel_viewbox_min' => ASSETS_PATH . 'js/jquery.viewbox.min.js',
        'durel_mediabox_min' => ASSETS_PATH . 'js/mediabox.js',
        'durel_theme_min' => ASSETS_PATH . 'js/theme.js',
    );

    foreach ($jsFiles as $handleKey => $jsFile):
        if ($handleKey === 'durel_slick_cdn') {
            wp_enqueue_script($handleKey, $jsFile, array('jquery'), VERSION, true);
        } else {
            wp_enqueue_script($handleKey, $jsFile, array('jquery'), VERSION, true);
        }
    endforeach;
    
    // Add FontAwesome for service section (since admin is saving FontAwesome classes)
    wp_enqueue_style('fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css', array(), '6.5.1');
    
    // Add Bootstrap Icons for back-to-top button
    wp_enqueue_style('bootstrap-icons', ASSETS_PATH . 'fonts/bootstrap-icons-1.10.2/font.css', array(), '1.10.2');
}


