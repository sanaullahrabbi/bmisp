<?php

/* Template Name: Service Detail */
get_header();
$get_options = get_option('durel_options');

// Get service slug from URL
$service_slug = get_query_var('service_slug') ?: '';
$services = $get_options['durel_sp_service_categories'] ?? [];
$packages = $get_options['durel_pp_package_list'] ?? [];

// Find the specific service
$current_service = null;
foreach ($services as $service) {
    if (($service['durel_sp_service_slug'] ?? '') === $service_slug) {
        $current_service = $service;
        break;
    }
}

// Filter packages for this service
$service_packages = array_filter($packages, function($package) use ($service_slug) {
    return isset($package['durel_pp_package_service_category']) && 
           $package['durel_pp_package_service_category'] === $service_slug;
});

// Sort packages by name or price if needed
usort($service_packages, function($a, $b) {
    $price_a = (int)($a['durel_pp_package_price'] ?? 0);
    $price_b = (int)($b['durel_pp_package_price'] ?? 0);
    return $price_a - $price_b;
});

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
<section class="service-packages-detail py-5">
    <div class="container">
        <?php if ($current_service): ?>


            <!-- Packages Grid -->
            <?php if (!empty($service_packages)): ?>
                <div class="row">
                    <?php foreach ($service_packages as $package): ?>
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="package-card-detail <?php echo isset($package['durel_pp_package_popular']) && $package['durel_pp_package_popular'] ? 'popular' : ''; ?>">
                                <?php if (isset($package['durel_pp_package_popular']) && $package['durel_pp_package_popular']): ?>
                                    <div class="popular-badge">Most Popular</div>
                                <?php endif; ?>
                                
                                <div class="package-header">
                                    <h3 class="package-name"><?php echo esc_html($package['durel_pp_package_name'] ?? 'Package'); ?></h3>
                                    <div class="package-speed">
                                        <?php echo esc_html($package['durel_pp_package_internet'] ?? '0'); ?>Mbps
                                    </div>
                                </div>
                                
                                <div class="package-price">
                                    <span class="price-amount">TK <?php echo esc_html($package['durel_pp_package_price'] ?? '0'); ?></span>
                                    <span class="price-period">/month</span>
                                </div>
                                
                                <?php if (!empty($package['durel_pp_short_description'])): ?>
                                    <div class="package-description">
                                        <p><?php echo esc_html($package['durel_pp_short_description']); ?></p>
                                    </div>
                                <?php endif; ?>
                                
                                <div class="package-features">
                                    <?php if (isset($package['durel_pp_package_offer_list']) && is_array($package['durel_pp_package_offer_list'])): ?>
                                        <?php foreach ($package['durel_pp_package_offer_list'] as $offer): ?>
                                            <div class="feature-item">
                                                <i class="fas fa-check"></i>
                                                <span><?php echo esc_html($offer['durel_pp_package_offer_title'] ?? ''); ?></span>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>
                                
                                <div class="package-action">
                                    <button class="choose-plan-btn" data-package="<?php echo esc_attr($package['durel_pp_package_name'] ?? ''); ?>">
                                        Choose Plan
                                    </button>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
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
            <div class="row mt-5">
                <div class="col-12 text-center">
                    <a href="<?php echo home_url('/services/'); ?>" class="back-to-services-btn">
                        <i class="fas fa-arrow-left me-2"></i>
                        Back to All Services
                    </a>
                </div>
            </div>

        <?php else: ?>
            <!-- Service Not Found -->
            <div class="row">
                <div class="col-12 text-center">
                    <div class="service-not-found">
                        <i class="fas fa-exclamation-triangle mb-3"></i>
                        <h2>Service Not Found</h2>
                        <p>The requested service could not be found.</p>
                        <a href="<?php echo home_url('/services/'); ?>" class="btn btn-primary">
                            View All Services
                        </a>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

<style>
/* Service Detail Page Styles */
.service-packages-detail {
    padding: 60px 0;
}

.service-header-icon {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, #e74c3c, #c0392b);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
    color: white;
    font-size: 2rem;
}

.service-detail-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 1rem;
}

.service-detail-description {
    font-size: 1.2rem;
    color: #6c757d;
    max-width: 600px;
    margin: 0 auto;
}

.package-card-detail {
    background: white;
    border-radius: 15px;
    padding: 2rem;
    text-align: center;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    transition: transform 0.3s ease;
    position: relative;
    height: 100%;
    border: 2px solid transparent;
}

.package-card-detail:hover {
    transform: translateY(-5px);
}

.package-card-detail.popular {
    border-color: #e74c3c;
    transform: scale(1.05);
}

.popular-badge {
    position: absolute;
    top: -10px;
    left: 50%;
    transform: translateX(-50%);
    background: #e74c3c;
    color: white;
    padding: 5px 15px;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 500;
}

.package-header {
    margin-bottom: 1.5rem;
}

.package-name {
    font-size: 1.5rem;
    font-weight: 600;
    color: #2c3e50;
    margin-bottom: 0.5rem;
}

.package-speed {
    background: linear-gradient(135deg, #e74c3c, #c0392b);
    color: white;
    padding: 8px 16px;
    border-radius: 20px;
    font-weight: 600;
    font-size: 1.1rem;
    display: inline-block;
}

.package-price {
    margin-bottom: 1.5rem;
}

.price-amount {
    font-size: 2.5rem;
    font-weight: 700;
    color: #2c3e50;
}

.price-period {
    color: #6c757d;
    font-size: 1rem;
}

.package-description {
    margin-bottom: 1.5rem;
    padding: 1rem;
    background: #f8f9fa;
    border-radius: 8px;
}

.package-description p {
    margin: 0;
    color: #6c757d;
    font-style: italic;
}

.package-features {
    margin-bottom: 2rem;
}

.feature-item {
    display: flex;
    align-items: center;
    margin-bottom: 0.8rem;
    text-align: left;
}

.feature-item i {
    color: #27ae60;
    margin-right: 0.5rem;
    font-size: 0.9rem;
}

.choose-plan-btn {
    background: transparent;
    border: 2px solid #e74c3c;
    color: #e74c3c;
    padding: 12px 30px;
    border-radius: 25px;
    font-weight: 500;
    transition: all 0.3s ease;
    width: 100%;
}

.package-card-detail.popular .choose-plan-btn {
    background: #e74c3c;
    color: white;
}

.choose-plan-btn:hover {
    background: #e74c3c;
    color: white;
}

.back-to-services-btn {
    color: #e74c3c;
    text-decoration: none;
    font-weight: 500;
    transition: color 0.3s ease;
}

.back-to-services-btn:hover {
    color: #c0392b;
}

.no-packages-message, .service-not-found {
    padding: 3rem;
    background: #f8f9fa;
    border-radius: 15px;
    color: #6c757d;
}

.no-packages-message i, .service-not-found i {
    font-size: 3rem;
    color: #e74c3c;
}

.btn-primary {
    background: #e74c3c;
    border-color: #e74c3c;
    padding: 12px 24px;
    border-radius: 25px;
    text-decoration: none;
    display: inline-block;
    margin-top: 1rem;
}

.btn-primary:hover {
    background: #c0392b;
    border-color: #c0392b;
}

.me-2 {
    margin-right: 0.5rem;
}

@media (max-width: 768px) {
    .service-detail-title {
        font-size: 2rem;
    }
    
    .package-card-detail.popular {
        transform: none;
    }
    
    .price-amount {
        font-size: 2rem;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Package selection handling
    const choosePlanBtns = document.querySelectorAll('.choose-plan-btn');
    choosePlanBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const packageName = this.getAttribute('data-package');
            alert('Selected package: ' + packageName + '. This would typically redirect to a contact or signup form.');
        });
    });
});
</script>

<?php
get_footer();
?>
