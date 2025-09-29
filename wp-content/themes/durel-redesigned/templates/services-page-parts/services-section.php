<?php
/* Display Services Section with Categorized Packages */
$get_options = get_option('durel_options');
$services = $get_options['durel_sp_service_categories'] ?? [];
$packages = $get_options['durel_pp_package_list'] ?? [];
$section_title = $get_options['durel_sp_section_title'] ?? 'Our Services';
$section_subtitle = $get_options['durel_sp_section_subtitle'] ?? 'Comprehensive internet solutions designed to meet all your connectivity needs';
$show_overview = $get_options['durel_sp_show_service_overview'] ?? true;
$packages_per_row = $get_options['durel_sp_packages_per_row'] ?? '3';
?>

<section class="services-section py-5">
    <div class="container">
        <!-- Section Header -->
        <div class="row mb-5">
            <div class="col-12 text-center">
                <h2 class="services-title"><?php echo esc_html($section_title); ?></h2>
                <p class="services-subtitle"><?php echo esc_html($section_subtitle); ?></p>
            </div>
        </div>

        <!-- Services Grid -->
        <?php if ($show_overview): ?>
        <div class="d-grid grid-cols-3 gap-8">
            <?php if (!empty($services)): ?>
                <?php foreach ($services as $index => $service): ?>
                    <?php 
                    $service_slug = $service['durel_sp_service_slug'] ?? '';
                    $service_icon = $service['durel_sp_service_icon'] ?? 'fas fa-wifi';
                    $service_name = $service['durel_sp_service_name'] ?? 'Service';
                    $service_description = $service['durel_sp_service_description'] ?? '';
                    ?>
                    <div class="w-full">
                        <div class="service-card">
                            <div class="service-icon-wrapper">
                                <i class="<?php echo esc_attr($service_icon); ?> service-icon"></i>
                            </div>
                            <h3 class="service-title"><?php echo esc_html($service_name); ?></h3>
                            <p class="service-description"><?php echo esc_html($service_description); ?></p>
                            <a href="<?php echo home_url('/services/' . $service_slug . '/'); ?>" 
                               class="service-link view-packages-link" 
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
                    <p>No services configured yet. Please add services in the admin panel.</p>
                </div>
            <?php endif; ?>
        </div>
        <?php endif; ?>
    </div>
</section>