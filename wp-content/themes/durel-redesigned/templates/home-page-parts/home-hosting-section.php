<?php
/* Display Homepage Hosting Section */

$get_options = get_option('durel_options');

// Get hosting services
$hosting_services = $get_options['durel_h_service_categories'] ?? [];

// Filter services that should show on homepage
$homepage_hosting_services = array_filter($hosting_services, function($service) {
    return isset($service['durel_h_service_show_on_home']) && $service['durel_h_service_show_on_home'] == true;
});

if (!empty($homepage_hosting_services)):
    ?>
    <!-- Hosting Section -->
    <section id="hosting" class="hosting-section py-20">
        <div class="container">
            <div class="hosting-section-header">
                <h2><?php _e($get_options['durel_h_section_title'] ?: 'Hosting Solutions', 'durel') ?></h2>
                <p><?php _e($get_options['durel_h_section_subtitle'] ?: 'Professional hosting services for your online presence', 'durel') ?></p>
            </div>
            
            <div class="hosting-grid">
                <?php foreach ($homepage_hosting_services as $index => $service): ?>
                    <?php 
                    $is_featured = isset($service['durel_h_service_featured']) && $service['durel_h_service_featured'] == true;
                    $service_slug = $service['durel_h_service_slug'] ?? '';
                    $final_link = home_url('/hosting/' . $service_slug . '/');
                    ?>
                    <div class="hosting-card <?php echo $is_featured ? 'featured' : ''; ?>">
                        <?php if ($is_featured): ?>
                            <div class="hosting-badge">Popular</div>
                        <?php endif; ?>
                        
                        <div class="hosting-icon">
                            <i class="<?php echo esc_attr($service['durel_h_service_icon'] ?? 'fas fa-server'); ?>"></i>
                        </div>
                        
                        <h3 class="hosting-title"><?php echo esc_html($service['durel_h_service_name'] ?? 'Service'); ?></h3>
                        
                        <p class="hosting-description"><?php echo esc_html($service['durel_h_service_description'] ?? ''); ?></p>
                        
                        <a href="<?php echo esc_url($final_link); ?>" class="hosting-btn">
                            <span><?php _e('Discover', 'durel') ?></span>
                            <i class="fas fa-arrow-right hosting-btn-icon"></i>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php
endif;
?>

