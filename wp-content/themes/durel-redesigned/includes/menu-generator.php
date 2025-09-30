<?php
/**
 * Menu Generator for Admin Options
 * Provides AJAX functionality to generate menu items from admin data
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Generate Services Menu Items
 */
function generate_services_menu_items() {
    // Verify nonce for security
    if (!wp_verify_nonce($_POST['nonce'], 'generate_menu_nonce')) {
        wp_die('Security check failed');
    }
    
    // Check user permissions
    if (!current_user_can('manage_options')) {
        wp_die('Insufficient permissions');
    }
    
    $get_options = get_option('durel_options');
    $services = $get_options['durel_sp_service_categories'] ?? [];
    
    if (empty($services)) {
        wp_send_json_error('No services found. Please add some services first.');
        return;
    }
    
    // Get the main menu
    $menu_locations = get_nav_menu_locations();
    $menu_id = $menu_locations['main_menu'] ?? null;
    
    if (!$menu_id) {
        wp_send_json_error('Main menu not found. Please create a main menu first.');
        return;
    }
    
    $menu = wp_get_nav_menu_object($menu_id);
    if (!$menu) {
        wp_send_json_error('Main menu not found.');
        return;
    }
    
    // Find Services parent menu item
    $menu_items = wp_get_nav_menu_items($menu_id);
    $services_parent = null;
    
    foreach ($menu_items as $item) {
        if ($item->title === 'Services' || strpos($item->url, '/services/') !== false) {
            $services_parent = $item;
            break;
        }
    }
    
    if (!$services_parent) {
        wp_send_json_error('Services parent menu item not found. Please add a "Services" menu item first.');
        return;
    }
    
    // Remove existing service submenus
    foreach ($menu_items as $item) {
        if ($item->menu_item_parent == $services_parent->ID) {
            wp_delete_post($item->ID, true);
        }
    }
    
    // Add new service submenus
    $created_items = array();
    foreach ($services as $service) {
        $service_name = $service['durel_sp_service_name'] ?? 'Service';
        $service_slug = $service['durel_sp_service_slug'] ?? '';
        $service_url = home_url('/services/' . $service_slug . '/');
        
        $menu_item_id = wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' => $service_name,
            'menu-item-url' => $service_url,
            'menu-item-status' => 'publish',
            'menu-item-parent-id' => $services_parent->ID,
            'menu-item-type' => 'custom'
        ));
        
        if ($menu_item_id && !is_wp_error($menu_item_id)) {
            $created_items[] = $service_name;
        }
    }
    
    wp_send_json_success(array(
        'message' => 'Successfully created ' . count($created_items) . ' service menu items!',
        'items' => $created_items
    ));
}
add_action('wp_ajax_generate_services_menu', 'generate_services_menu_items');

/**
 * Generate Hosting Menu Items
 */
function generate_hosting_menu_items() {
    // Verify nonce for security
    if (!wp_verify_nonce($_POST['nonce'], 'generate_menu_nonce')) {
        wp_die('Security check failed');
    }
    
    // Check user permissions
    if (!current_user_can('manage_options')) {
        wp_die('Insufficient permissions');
    }
    
    $get_options = get_option('durel_options');
    $hosting_services = $get_options['durel_h_service_categories'] ?? [];
    
    if (empty($hosting_services)) {
        wp_send_json_error('No hosting services found. Please add some hosting services first.');
        return;
    }
    
    // Get the main menu
    $menu_locations = get_nav_menu_locations();
    $menu_id = $menu_locations['main_menu'] ?? null;
    
    if (!$menu_id) {
        wp_send_json_error('Main menu not found. Please create a main menu first.');
        return;
    }
    
    $menu = wp_get_nav_menu_object($menu_id);
    if (!$menu) {
        wp_send_json_error('Main menu not found.');
        return;
    }
    
    // Find Hosting parent menu item
    $menu_items = wp_get_nav_menu_items($menu_id);
    $hosting_parent = null;
    
    foreach ($menu_items as $item) {
        if ($item->title === 'Hosting' || strpos($item->url, '/hosting/') !== false) {
            $hosting_parent = $item;
            break;
        }
    }
    
    if (!$hosting_parent) {
        wp_send_json_error('Hosting parent menu item not found. Please add a "Hosting" menu item first.');
        return;
    }
    
    // Remove existing hosting submenus
    foreach ($menu_items as $item) {
        if ($item->menu_item_parent == $hosting_parent->ID) {
            wp_delete_post($item->ID, true);
        }
    }
    
    // Add new hosting submenus
    $created_items = array();
    foreach ($hosting_services as $service) {
        $service_name = $service['durel_h_service_name'] ?? 'Hosting Service';
        $service_slug = $service['durel_h_service_slug'] ?? '';
        $service_url = home_url('/hosting/' . $service_slug . '/');
        
        $menu_item_id = wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' => $service_name,
            'menu-item-url' => $service_url,
            'menu-item-status' => 'publish',
            'menu-item-parent-id' => $hosting_parent->ID,
            'menu-item-type' => 'custom'
        ));
        
        if ($menu_item_id && !is_wp_error($menu_item_id)) {
            $created_items[] = $service_name;
        }
    }
    
    wp_send_json_success(array(
        'message' => 'Successfully created ' . count($created_items) . ' hosting menu items!',
        'items' => $created_items
    ));
}
add_action('wp_ajax_generate_hosting_menu', 'generate_hosting_menu_items');

/**
 * Add JavaScript for menu generation buttons
 */
function add_menu_generator_script() {
    if (isset($_GET['page']) && strpos($_GET['page'], 'isp-website') !== false) {
        ?>
        <script type="text/javascript">
        jQuery(document).ready(function($) {
            // Generate Services Menu
            $('#generate-services-menu').on('click', function() {
                var button = $(this);
                var originalText = button.text();
                
                button.prop('disabled', true).text('Generating...');
                
                $.ajax({
                    url: ajaxurl,
                    type: 'POST',
                    data: {
                        action: 'generate_services_menu',
                        nonce: '<?php echo wp_create_nonce('generate_menu_nonce'); ?>'
                    },
                    success: function(response) {
                        if (response.success) {
                            alert('✅ ' + response.data.message + '\n\nCreated items:\n• ' + response.data.items.join('\n• '));
                        } else {
                            alert('❌ Error: ' + response.data);
                        }
                    },
                    error: function() {
                        alert('❌ Error: Failed to generate menu items. Please try again.');
                    },
                    complete: function() {
                        button.prop('disabled', false).text(originalText);
                    }
                });
            });
            
            // Generate Hosting Menu
            $('#generate-hosting-menu').on('click', function() {
                var button = $(this);
                var originalText = button.text();
                
                button.prop('disabled', true).text('Generating...');
                
                $.ajax({
                    url: ajaxurl,
                    type: 'POST',
                    data: {
                        action: 'generate_hosting_menu',
                        nonce: '<?php echo wp_create_nonce('generate_menu_nonce'); ?>'
                    },
                    success: function(response) {
                        if (response.success) {
                            alert('✅ ' + response.data.message + '\n\nCreated items:\n• ' + response.data.items.join('\n• '));
                        } else {
                            alert('❌ Error: ' + response.data);
                        }
                    },
                    error: function() {
                        alert('❌ Error: Failed to generate menu items. Please try again.');
                    },
                    complete: function() {
                        button.prop('disabled', false).text(originalText);
                    }
                });
            });
        });
        </script>
        <?php
    }
}
add_action('admin_footer', 'add_menu_generator_script');
