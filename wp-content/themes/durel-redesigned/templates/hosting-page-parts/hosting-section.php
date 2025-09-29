<?php
/* Display Hosting Section with Categorized Packages */
$get_options = get_option('durel_options');
$hosting_services = $get_options['durel_h_service_categories'] ?? [];
$show_overview = $get_options['durel_h_show_service_overview'] ?? true;
$packages_per_row = $get_options['durel_h_packages_per_row'] ?? '3';
?>

<section class="hosting-services-section py-20">
    <div class="container">
        <!-- Hosting Services Grid -->
        <?php if ($show_overview): ?>
        <div class="hosting-grid">
            <?php if (!empty($hosting_services)): ?>
                <?php foreach ($hosting_services as $index => $service): ?>
                    <?php 
                    $is_featured = isset($service['durel_h_service_featured']) && $service['durel_h_service_featured'] == true;
                    $service_slug = $service['durel_h_service_slug'] ?? '';
                    $service_icon = $service['durel_h_service_icon'] ?? 'fas fa-server';
                    $service_name = $service['durel_h_service_name'] ?? 'Service';
                    $service_description = $service['durel_h_service_description'] ?? '';
                    $final_link = home_url('/hosting/' . $service_slug . '/');
                    ?>
                    <div class="hosting-card <?php echo $is_featured ? 'featured' : ''; ?>">
                        <?php if ($is_featured): ?>
                            <div class="hosting-badge">Popular</div>
                        <?php endif; ?>
                        
                        <div class="hosting-icon">
                            <i class="<?php echo esc_attr($service_icon); ?>"></i>
                        </div>
                        
                        <h3 class="hosting-title"><?php echo esc_html($service_name); ?></h3>
                        
                        <p class="hosting-description"><?php echo esc_html($service_description); ?></p>
                        
                        <a href="<?php echo esc_url($final_link); ?>" class="hosting-btn">
                            <span><?php _e('Discover', 'durel') ?></span>
                            <i class="fas fa-arrow-right hosting-btn-icon"></i>
                        </a>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center">
                    <p>No hosting services configured yet. Please add hosting services in the admin panel.</p>
                </div>
            <?php endif; ?>
        </div>
        <?php endif; ?>
    </div>
</section>
