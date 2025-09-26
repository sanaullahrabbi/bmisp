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
                            <a href="<?php echo home_url('/service/' . $service_slug . '/'); ?>" 
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

<!-- Note: Package sections moved to individual service pages -->
<!-- Each service now has its own dedicated page at /service/service-slug/ -->

<style>
/* Services Page Styles - Matching Home Page Design */
.services-section {
    padding: 80px 0;
}

.services-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 1rem;
}

.services-subtitle {
    font-size: 1.1rem;
    color: #6c757d;
    max-width: 600px;
    margin: 0 auto;
}

/* Grid Layout */
.d-grid {
    display: grid;
}

.grid-cols-3 {
    grid-template-columns: repeat(3, 1fr);
}

.gap-8 {
    gap: 2rem;
}

.w-full {
    width: 100%;
}

/* Service Cards - Matching Home Page Style */
.service-card {
    background: white;
    border-radius: 15px;
    padding: 2rem;
    text-align: center;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    height: 100%;
    border: 1px solid #f0f0f0;
}

.service-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.15);
}

.service-icon-wrapper {
    margin-bottom: 1.5rem;
}

.service-icon {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, #e74c3c, #c0392b);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
    color: white;
    font-size: 1.5rem;
}

.service-title {
    font-size: 1.3rem;
    font-weight: 600;
    color: #2c3e50;
    margin-bottom: 1rem;
}

.service-description {
    color: #6c757d;
    margin-bottom: 1.5rem;
    line-height: 1.6;
    font-size: 0.95rem;
}

.service-link {
    color: #e74c3c;
    text-decoration: none;
    font-weight: 500;
    transition: color 0.3s ease;
    display: inline-flex;
    align-items: center;
}

.service-link:hover {
    color: #c0392b;
}

.ms-2 {
    margin-left: 0.5rem;
}

/* Responsive Design */
@media (max-width: 992px) {
    .grid-cols-3 {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 768px) {
    .grid-cols-3 {
        grid-template-columns: 1fr;
    }
    
    .services-title {
        font-size: 2rem;
    }
    
    .service-card {
        padding: 1.5rem;
    }
}

/* Package styles removed - now handled by individual service pages */
</style>

<!-- JavaScript removed - links now go to individual service pages -->
