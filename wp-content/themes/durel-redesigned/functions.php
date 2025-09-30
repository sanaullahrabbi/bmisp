<?php

require_once get_template_directory() . '/includes/assetsFunction.php';
require_once get_template_directory() . '/includes/customFunction.php';
require_once get_template_directory() . '/includes/codestar-framework-master/codestar-framework.php';
require_once get_template_directory() . '/includes/codestar-framework-master/samples/admin-options.php';
require_once get_template_directory() . '/includes/class-walker-nav-main-menu.php';
require_once get_template_directory() . '/includes/class-walker-nav-mobile-menu.php';
require_once get_template_directory() . '/includes/menu-generator.php';
require_once get_template_directory() . '/includes/page-header-component.php';


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

// Helper function to get service categories for admin dropdown
if (!function_exists('durel_get_service_categories')):
    function durel_get_service_categories() {
        $options = get_option('durel_options');
        $services = $options['durel_sp_service_categories'] ?? array();
        
        $categories = array();
        if (!empty($services) && is_array($services)) {
            foreach ($services as $service) {
                if (isset($service['durel_sp_service_slug']) && isset($service['durel_sp_service_name'])) {
                    $categories[$service['durel_sp_service_slug']] = $service['durel_sp_service_name'];
                }
            }
        }
        
        return $categories;
    }
endif;

// Function to dynamically populate service category options
if (!function_exists('durel_service_category_options')):
    function durel_service_category_options() {
        return durel_get_service_categories();
    }
endif;

// Hook to dynamically update service category options
add_action('admin_init', 'durel_update_service_category_options');

if (!function_exists('durel_update_service_category_options')):
    function durel_update_service_category_options() {
        // Only run on our admin pages
        if (!isset($_GET['page']) || strpos($_GET['page'], 'isp-website') === false) {
            return;
        }
        
        // Get current service categories
        $service_categories = durel_get_service_categories();
        
        // Always add the script, even if no categories exist
        // This will be handled by JavaScript to update the select options dynamically
        add_action('admin_footer', function() use ($service_categories) {
            ?>
            <script type="text/javascript">
                jQuery(document).ready(function($) {
                    // Function to update service category dropdowns
                    function updateServiceCategoryDropdowns() {
                        var categories = <?php echo json_encode($service_categories); ?>;
                        
                        // Update all service category select fields
                        $('select[name*="durel_pp_package_service_category"]').each(function() {
                            var $select = $(this);
                            var currentValue = $select.val();
                            
                            // Clear existing options except the first empty one
                            $select.find('option').not(':first').remove();
                            
                            // Add new options or show helpful message
                            if (Object.keys(categories).length > 0) {
                                $.each(categories, function(slug, name) {
                                    $select.append($('<option>', {
                                        value: slug,
                                        text: name
                                    }));
                                });
                                
                                // Restore selected value if it exists
                                if (currentValue && categories[currentValue]) {
                                    $select.val(currentValue);
                                }
                            } else {
                                $select.append($('<option>', {
                                    value: '',
                                    text: 'No services configured yet'
                                }));
                            }
                        });
                    }
                    
                    // Update on page load
                    updateServiceCategoryDropdowns();
                    
                    // Update when new package groups are added
                    $(document).on('click', '.csf-field-group-add', function() {
                        setTimeout(updateServiceCategoryDropdowns, 500);
                    });
                    
                    // Auto-generate slug from service name
                    function generateSlug(text) {
                        return text
                            .toLowerCase()
                            .trim()
                            .replace(/[^a-z0-9\s-]/g, '') // Remove special characters
                            .replace(/\s+/g, '-') // Replace spaces with hyphens
                            .replace(/-+/g, '-') // Replace multiple hyphens with single
                            .replace(/^-|-$/g, ''); // Remove leading/trailing hyphens
                    }
                    
                    // Auto-fill slug when service name changes
                    $(document).on('input', 'input[name*="durel_sp_service_name"]', function() {
                        var $nameInput = $(this);
                        var $slugInput = $nameInput.closest('.csf-field').siblings().find('input[name*="durel_sp_service_slug"]');
                        
                        if ($slugInput.length && !$slugInput.data('user-edited')) {
                            var slug = generateSlug($nameInput.val());
                            $slugInput.val(slug);
                        }
                    });
                    
                    // Mark slug as user-edited when manually changed
                    $(document).on('input', 'input[name*="durel_sp_service_slug"]', function() {
                        $(this).data('user-edited', true);
                    });
                    
                    // Reset user-edited flag when new service group is added
                    $(document).on('click', '.csf-field-group-add', function() {
                        setTimeout(function() {
                            $('input[name*="durel_sp_service_slug"]').data('user-edited', false);
                        }, 500);
                    });
                    
                    // Update when service categories change (with delay to allow save)
                    $(document).on('change', 'input[name*="durel_sp_service_slug"], input[name*="durel_sp_service_name"]', function() {
                        setTimeout(function() {
                            // Reload the page to get updated categories
                            if (confirm('Service categories have been updated. Reload page to see changes in package dropdowns?')) {
                                window.location.reload();
                            }
                        }, 2000);
                    });
                });
            </script>
            <?php
        });
    }
endif;

// Flush rewrite rules on theme activation
add_action('after_switch_theme', 'durel_flush_rewrite_rules');

if (!function_exists('durel_flush_rewrite_rules')):
    function durel_flush_rewrite_rules() {
        durel_add_service_rewrite_rules();
        flush_rewrite_rules();
    }
endif;

// Add custom rewrite rules for service pages
add_action('init', 'durel_add_service_rewrite_rules');

if (!function_exists('durel_add_service_rewrite_rules')):
    function durel_add_service_rewrite_rules() {
        add_rewrite_rule(
            '^services/([^/]+)/?$',
            'index.php?service_slug=$matches[1]',
            'top'
        );
    }
endif;

// Add query vars for service pages
add_filter('query_vars', 'durel_add_service_query_vars');

if (!function_exists('durel_add_service_query_vars')):
    function durel_add_service_query_vars($vars) {
        $vars[] = 'service_slug';
        return $vars;
    }
endif;

// Handle service page template loading
add_filter('template_include', 'durel_service_template_include');

if (!function_exists('durel_service_template_include')):
    function durel_service_template_include($template) {
        if (get_query_var('service_slug')) {
            $service_template = locate_template('templates/service-detail-page-template.php');
            if ($service_template) {
                return $service_template;
            }
        }
        return $template;
    }
endif;

// Add custom rewrite rules for hosting pages
add_action('init', 'durel_add_hosting_rewrite_rules');

if (!function_exists('durel_add_hosting_rewrite_rules')):
    function durel_add_hosting_rewrite_rules() {
        add_rewrite_rule(
            '^hosting/([^/]+)/?$',
            'index.php?hosting_service_slug=$matches[1]',
            'top'
        );
    }
endif;

// Add query vars for hosting pages
add_filter('query_vars', 'durel_add_hosting_query_vars');

if (!function_exists('durel_add_hosting_query_vars')):
    function durel_add_hosting_query_vars($vars) {
        $vars[] = 'hosting_service_slug';
        return $vars;
    }
endif;

// Handle hosting page template loading
add_filter('template_include', 'durel_hosting_template_include');

if (!function_exists('durel_hosting_template_include')):
    function durel_hosting_template_include($template) {
        if (get_query_var('hosting_service_slug')) {
            $hosting_template = locate_template('templates/hosting-detail-page-template.php');
            if ($hosting_template) {
                return $hosting_template;
            }
        }
        return $template;
    }
endif;

// Helper function to check if a service is an internet service
if (!function_exists('durel_is_internet_service')):
    function durel_is_internet_service($service) {
        return isset($service['durel_sp_service_is_internet']) && $service['durel_sp_service_is_internet'] == true;
    }
endif;

// Helper function to check if a package belongs to an internet service
if (!function_exists('durel_is_internet_package')):
    function durel_is_internet_package($package, $service) {
        return durel_is_internet_service($service);
    }
endif;

// Helper function to get internet packages only
if (!function_exists('durel_get_internet_packages')):
    function durel_get_internet_packages($services) {
        $internet_packages = [];
        foreach ($services as $service) {
            if (durel_is_internet_service($service)) {
                $service_packages = $service['durel_sp_service_packages'] ?? [];
                foreach ($service_packages as $package) {
                    $package['service_name'] = $service['durel_sp_service_name'] ?? '';
                    $package['service_slug'] = $service['durel_sp_service_slug'] ?? '';
                    $internet_packages[] = $package;
                }
            }
        }
        return $internet_packages;
    }
endif;

?>