<?php

/* Template Name: Hosting Detail */
get_header();
$get_options = get_option('durel_options');

// Get hosting service slug from URL
$hosting_service_slug = get_query_var('hosting_service_slug') ?: '';
$hosting_services = $get_options['durel_h_service_categories'] ?? [];

// Find the specific hosting service
$current_hosting_service = null;
foreach ($hosting_services as $service) {
    if (($service['durel_h_service_slug'] ?? '') === $hosting_service_slug) {
        $current_hosting_service = $service;
        break;
    }
}

// Get packages directly from the hosting service
$hosting_service_packages = $current_hosting_service['durel_h_service_packages'] ?? [];

?>

<!-- Page Header Section Start  -->
<?php 
$page_title = $current_hosting_service['durel_h_service_name'] ?? 'Hosting Packages';
$page_subtitle = $current_hosting_service['durel_h_service_description'] ?? '';

// Custom breadcrumbs for hosting pages
$breadcrumbs = array(
    array('title' => 'Home', 'url' => home_url('/')),
    array('title' => 'Hosting', 'url' => home_url('/hosting/')),
    array('title' => $page_title, 'url' => false)
);

pageHeaderSection($page_title, $page_subtitle, $breadcrumbs);
?>
<!-- Page Header Section End  -->

<!-- Hosting Packages Section Start -->
<section class="detail-page-section packages-detail-section">
    <div class="detail-page-container">
        <?php if ($current_hosting_service): ?>

            <!-- Packages Slick Slider -->
            <?php if (!empty($hosting_service_packages)): ?>
                <div class="packages-slick-container">
                    <div class="packages-slick-slider">
                        <?php foreach ($hosting_service_packages as $package): ?>
                            <div class="package-slide">
                                <div class="package-card">
                                    <?php if (isset($package['durel_h_package_popular']) && $package['durel_h_package_popular']): ?>
                                        <div class="package-popular absolute -top-4 left-1/2 transform -translate-x-1/2">
                                            <span><?php _e('Most Popular', 'durel') ?></span>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <div class="package-info">
                                        <?php if ($package['durel_h_package_name']): ?>
                                            <h3 class="package-name"><?php echo esc_html($package['durel_h_package_name']); ?></h3>
                                        <?php endif; ?>
                                        
                                        <?php if ($package['durel_h_package_specs']): ?>
                                            <div class="package-specs">
                                                <span class="package-specs-amount"><?php echo esc_html($package['durel_h_package_specs']); ?></span>
                                            </div>
                                        <?php endif; ?>
                                        
                                        <?php if ($package['durel_h_package_price']): ?>
                                            <div class="package-price">
                                                <span class="package-price-amount">TK <?php echo esc_html($package['durel_h_package_price']); ?></span>
                                                <span class="package-price-unit">/mo</span>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    
                                    <ul class="package-offer-points">
                                        <?php if (!empty($package['durel_h_package_features'])): ?>
                                            <?php foreach ($package['durel_h_package_features'] as $feature): ?>
                                                <?php if (!empty($feature['durel_h_package_feature_text'])): ?>
                                                    <li class="package-offer-point">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check-circle"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><path d="m9 11 3 3L22 4"></path></svg>
                                                        <span class="text-gray-600"><?php echo esc_html($feature['durel_h_package_feature_text']); ?></span>
                                                    </li>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </ul>
                                    
                                    <button class="package-btn secondary-btn choose-plan-btn" data-package="<?php echo esc_attr($package['durel_h_package_name'] ?? ''); ?>">
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
                            <p>No packages have been configured for this hosting service yet.</p>
                            <a href="<?php echo home_url('/hosting/'); ?>" class="btn btn-primary">
                                View All Hosting Services
                            </a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Back to Hosting Link -->
            <div class="text-center">
                <a href="<?php echo home_url('/hosting/'); ?>" class="back-to-services-btn">
                    <i class="fas fa-arrow-left"></i>
                    Back to All Hosting Services
                </a>
            </div>

        <?php else: ?>
            <!-- Service Not Found -->
            <div class="text-center">
                <div class="service-not-found">
                    <i class="fas fa-exclamation-triangle"></i>
                    <h2>Hosting Service Not Found</h2>
                    <p>The requested hosting service could not be found.</p>
                    <a href="<?php echo home_url('/hosting/'); ?>" class="primary-btn">
                        View All Hosting Services
                    </a>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php
get_footer();
?>
