<?php
/* Display Service Section - Now using Services Page configuration */
$get_options = get_option('durel_options');

// Get services from Services Page configuration
$all_services = $get_options['durel_sp_service_categories'] ?? [];
$services_page_url = $get_options['durel_sp_services_page_url'] ?? '/services/';

// Filter services that should show on home page
$home_services = array_filter($all_services, function($service) {
    return isset($service['durel_sp_service_show_on_home']) && $service['durel_sp_service_show_on_home'] == true;
});

// Services are already sorted by the admin interface drag-and-drop functionality

if (!empty($home_services)):
    ?>

    <section class="service-section">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="service-section-title">Our Services</h2>
                <p class="service-section-subtitle">
                    Comprehensive internet solutions designed to meet all your connectivity needs
                </p>
            </div>
            
            <div class="services-grid">
                <?php foreach ($home_services as $service): ?>
                    <?php 
                    // Safely get service data with defaults
                    $service_name = $service['durel_sp_service_name'] ?? '';
                    $service_description = $service['durel_sp_service_description'] ?? '';
                    $service_icon = $service['durel_sp_service_icon'] ?? '';
                    $service_slug = $service['durel_sp_service_slug'] ?? '';
                    
                    // Only show service if it has a name
                    if (!empty($service_name)):
                    ?>
                        <div class="w-full">
                            <div class="service-card">
                                                   <div class="service-icon-wrapper">
                       <?php if (!empty($service_icon)): ?>
                           <i class="<?php echo esc_attr($service_icon); ?> service-icon"></i>
                       <?php else: ?>
                           <!-- Default SVG icon when no icon is provided -->
                           <svg class="service-icon default-icon" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                               <circle cx="12" cy="12" r="10"></circle>
                               <path d="M12 6v6l4 2"></path>
                           </svg>
                       <?php endif; ?>
                   </div>
                                
                                <h3 class="service-title"><?php echo esc_html($service_name); ?></h3>
                                
                                <?php if (!empty($service_description)): ?>
                                    <p class="service-description"><?php echo esc_html($service_description); ?></p>
                                <?php endif; ?>
                                
                                <?php 
                                // Generate URL to individual service page
                                $final_link = home_url('/services/' . $service_slug . '/');
                                ?>
                                <a href="<?php echo esc_url($final_link); ?>" class="service-link">
                                    View Packages <svg class="ms-2" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                        <polyline points="12,5 19,12 12,19"></polyline>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

<?php else: ?>
    <!-- No services configured for home page -->
    <section class="service-section bg-white">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="service-section-title">Our Services</h2>
                <p class="service-section-subtitle">
                    Comprehensive internet solutions designed to meet all your connectivity needs
                </p>
            </div>
            <div class="text-center">
                <p>No services configured for home page display. Please configure services in <strong>ISP Website → Services Page</strong> and enable "Show on Home Page" for services you want to display.</p>
            </div>
        </div>
    </section>
<?php endif; ?>