<?php
/* Display Hosting Section with Categorized Packages */
$get_options = get_option('durel_options');
$hosting_services = $get_options['durel_h_service_categories'] ?? [];
$show_overview = $get_options['durel_h_show_service_overview'] ?? true;
$packages_per_row = $get_options['durel_h_packages_per_row'] ?? '3';
?>

<section class="hosting-services-section py-5">
    <div class="container">
        <!-- Hosting Services Grid -->
        <?php if ($show_overview): ?>
        <div class="d-grid grid-cols-3 gap-8">
            <?php if (!empty($hosting_services)): ?>
                <?php foreach ($hosting_services as $index => $service): ?>
                    <?php 
                    $service_slug = $service['durel_h_service_slug'] ?? '';
                    $service_icon = $service['durel_h_service_icon'] ?? 'fas fa-server';
                    $service_name = $service['durel_h_service_name'] ?? 'Service';
                    $service_description = $service['durel_h_service_description'] ?? '';
                    ?>
                    <div class="w-full">
                        <div class="hosting-service-card">
                            <div class="hosting-service-icon-wrapper">
                                <i class="<?php echo esc_attr($service_icon); ?> hosting-service-icon"></i>
                            </div>
                            <h3 class="hosting-service-title"><?php echo esc_html($service_name); ?></h3>
                            <p class="hosting-service-description"><?php echo esc_html($service_description); ?></p>
                            <a href="<?php echo home_url('/hosting/' . $service_slug . '/'); ?>" 
                               class="hosting-service-link view-packages-link" 
                               data-service="<?php echo esc_attr($service_slug); ?>">
                                View Packages <svg class="ms-2" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                    <polyline points="12,5 19,12 12,19"></polyline>
                                </svg>
                            </a>
                        </div>
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
