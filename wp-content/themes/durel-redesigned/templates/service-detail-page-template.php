<?php

/* Template Name: Service Detail */
get_header();
$get_options = get_option('durel_options');

// Get service slug from URL
$service_slug = get_query_var('service_slug') ?: '';
$services = $get_options['durel_sp_service_categories'] ?? [];

// Find the specific service
$current_service = null;
foreach ($services as $service) {
    if (($service['durel_sp_service_slug'] ?? '') === $service_slug) {
        $current_service = $service;
        break;
    }
}

// Get packages directly from the service
$service_packages = $current_service['durel_sp_service_packages'] ?? [];

// Packages are already sorted by the admin interface drag-and-drop functionality

?>

<!-- Page Header Section Start  -->
<?php 
$page_title = $current_service['durel_sp_service_name'] ?? 'Service Packages';
$page_subtitle = $current_service['durel_sp_service_description'] ?? '';

// Custom breadcrumbs for service pages
$breadcrumbs = array(
    array('title' => 'Home', 'url' => home_url('/')),
    array('title' => 'Services', 'url' => home_url('/services/')),
    array('title' => $page_title, 'url' => false)
);

pageHeaderSection($page_title, $page_subtitle, $breadcrumbs);
?>
<!-- Page Header Section End  -->

<!-- Service Packages Section Start -->
<section class="detail-page-section packages-detail-section">
    <div class="detail-page-container">
        <?php if ($current_service): ?>


            <!-- Packages Slick Slider -->
            <?php if (!empty($service_packages)): ?>
                <div class="packages-slick-container">
                    <div class="packages-slick-slider">
                        <?php foreach ($service_packages as $package): 
                            // Add service info to package for context
                            $package['service_name'] = $current_service['durel_sp_service_name'] ?? '';
                            $package['service_slug'] = $current_service['durel_sp_service_slug'] ?? '';
                            $package['service_is_internet'] = $current_service['durel_sp_service_is_internet'] ?? false;
                        ?>
                            <div class="package-slide">
                                <div class="package-card">
                                    <?php if (isset($package['durel_sp_package_popular']) && $package['durel_sp_package_popular']): ?>
                                        <div class="package-popular absolute -top-4 left-1/2 transform -translate-x-1/2">
                                            <span><?php _e('Most Popular', 'durel') ?></span>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <div class="package-info">
                                        <?php if ($package['durel_sp_package_name']): ?>
                                            <h3 class="package-name"><?php echo esc_html($package['durel_sp_package_name']); ?></h3>
                                        <?php endif; ?>
                                        
                                        <?php if ($package['durel_sp_package_specs']): ?>
                                            <div class="package-specs">
                                                <span class="package-specs-amount"><?php echo esc_html($package['durel_sp_package_specs']); ?></span>
                                            </div>
                                        <?php endif; ?>
                                        
                                        <?php if ($package['durel_sp_package_price']): ?>
                                            <div class="package-price">
                                                <span class="package-price-amount">TK <?php echo esc_html($package['durel_sp_package_price']); ?></span>
                                                <span class="package-price-unit">/mo</span>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    
                                    <ul class="package-offer-points">
                                        <?php if (!empty($package['durel_sp_package_features'])): ?>
                                            <?php foreach ($package['durel_sp_package_features'] as $feature): ?>
                                                <?php if (!empty($feature['durel_sp_package_feature_text'])): ?>
                                                    <li class="package-offer-point">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check-circle"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><path d="m9 11 3 3L22 4"></path></svg>
                                                        <span class="text-gray-600"><?php echo esc_html($feature['durel_sp_package_feature_text']); ?></span>
                                                    </li>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </ul>
                                    
                                    <button class="package-btn secondary-btn choose-plan-btn" data-package="<?php echo esc_attr($package['durel_sp_package_name'] ?? ''); ?>">
                                        <?php _e('Choose Plan', 'durel') ?>
                                    </button>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php else: ?>
                <div class="row">
                    <div class="col-12 text-center">
                        <div class="no-packages-message">
                            <i class="fas fa-box-open mb-3"></i>
                            <h3>No Packages Available</h3>
                            <p>No packages have been configured for this service yet.</p>
                            <a href="<?php echo home_url('/services/'); ?>" class="btn btn-primary">
                                View All Services
                            </a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Back to Services Link -->
            <div class="text-center">
                <a href="<?php echo home_url('/services/'); ?>" class="back-to-services-btn">
                    <i class="fas fa-arrow-left"></i>
                    Back to All Services
                </a>
            </div>

        <?php else: ?>
            <!-- Service Not Found -->
            <div class="text-center">
                <div class="service-not-found">
                    <i class="fas fa-exclamation-triangle"></i>
                    <h2>Service Not Found</h2>
                    <p>The requested service could not be found.</p>
                    <a href="<?php echo home_url('/services/'); ?>" class="primary-btn">
                        View All Services
                    </a>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php
get_footer();
?>
