<!DOCTYPE html>
<html <?php language_attributes() ?> class="no-js">

<head>
    <meta charset="<?php bloginfo('charset') ?>">
    <!-- For IE -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#244034">
    <meta name="msapplication-navbutton-color" content="#244034">
    <meta name="apple-mobile-web-app-status-bar-style" content="#244034">
    <?php wp_head(); ?>
</head>

<body>
    <div class="main-page-wrapper">

        <!--  Loading Transition Start -->
        <?php 
        // echo get_template_part('/templates/common-parts/loading'); 
        ?>
        <!--  Loading Transition End -->

        <!-- Contact Info Pop Up Start -->
        <?php echo get_template_part('/templates/common-parts/contact-pop-up'); ?>
        <!-- Contact Info Pop Up End -->

        <!-- Main Header Navigation Start -->
        <header class="navbar navbar-expand-lg sticky-top">
            <div class="container w-100 d-flex justify-content-between align-items-center">
                <!-- Logo Section -->
                <div class="d-flex align-items-center">
                    <?php
                    // Get global contact info
                    $contact_info = durel_get_contact_info();
                    $get_options = get_option('durel_options');
                    $show_company_name_header = $get_options['durel_ss_header_show_company_name'] ?? true;
                    
                    if (!empty($contact_info['header_logo']['url'])) {
                        // Use logo from global settings
                        echo '<a href="' . esc_url(home_url('/')) . '" class="logo-link d-flex align-items-center">';
                        echo '<img src="' . esc_url($contact_info['header_logo']['url']) . '" alt="' . esc_attr($contact_info['company_name'] ?: get_bloginfo('name')) . '" class="logo-image" style="max-height: 48px; width: auto;">';
                        // Show company name only if option is enabled
                        if ($show_company_name_header && !empty($contact_info['company_name'])) {
                            echo '<span class="logo-text">' . esc_html($contact_info['company_name']) . '</span>';
                        }
                        echo '</a>';
                    } elseif (!empty($contact_info['company_name'])) {
                        // Fallback to company name only
                        echo '<a href="' . esc_url(home_url('/')) . '" class="logo-link d-flex align-items-center">';
                        echo '<span class="logo-text">' . esc_html($contact_info['company_name']) . '</span>';
                        echo '</a>';
                    }
                    ?>
                </div>
                
                <!-- Desktop Navigation -->
                <nav class="" id="main-menu">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'main_menu',
                            'menu' => '',
                            'container' => '',
                            'container_class' => '',
                            'container_id' => '',
                            'container_aria_label' => '',
                            'menu_class' => 'navbar-nav',
                            'menu_id' => '',
                            'echo' => true,
                            'fallback_cb' => 'wp_page_menu',
                            'before' => '',
                            'after' => '',
                            'link_before' => '',
                            'link_after' => '',
                            'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                            'item_spacing' => 'preserve',
                            'depth' => 0,
                            'walker' => new Walker_Nav_Main_Menu(),
                        )
                    );
                    ?>


                    <!-- Download APK Button for Mobile -->
                    <?php 
                    $get_options = get_option('durel_options');
                    $apk_url = $get_options['durel_ss_apk_download_url'] ?? '#';
                    $apk_text = $get_options['durel_ss_apk_download_text'] ?? 'Download APK';
                    ?>
                    <a href="<?php echo esc_url($apk_url); ?>" class="primary-btn download-apk-btn mobile-download-btn" download>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-download-icon lucide-download"><path d="M12 15V3"/><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><path d="m7 10 5 5 5-5"/></svg>
                        <?php echo esc_html($apk_text); ?>
                    </a>
                </nav>

                <!-- Download APK Button for Desktop -->
                <?php 
                $get_options = get_option('durel_options');
                $apk_url = $get_options['durel_ss_apk_download_url'] ?? '#';
                $apk_text = $get_options['durel_ss_apk_download_text'] ?? 'Download APK';
                ?>
                <a href="<?php echo esc_url($apk_url); ?>" class="primary-btn download-apk-btn desktop-download-btn" download>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-download-icon lucide-download"><path d="M12 15V3"/><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><path d="m7 10 5 5 5-5"/></svg>
                    <?php echo esc_html($apk_text); ?>
                </a>

                <!-- Mobile Menu Button -->
                <button class="navbar-toggler" type="button">
                    <i class="fa-solid fa-bars"></i>
                </button>
            </div>
        </header>
        <!-- Main Header Navigation End -->