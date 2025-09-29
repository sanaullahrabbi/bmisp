<?php
/* Display Packages Section - Now using integrated service packages */

$get_options = get_option('durel_options');

// Get services and their packages
$services = $get_options['durel_sp_service_categories'] ?? [];

// Collect all packages that should display on homepage
$homepage_packages = [];
foreach ($services as $service) {
    $service_packages = $service['durel_sp_service_packages'] ?? [];
    foreach ($service_packages as $package) {
        if (isset($package['durel_sp_package_display_homepage']) && $package['durel_sp_package_display_homepage'] == true) {
            // Add service info to package for context
            $package['service_name'] = $service['durel_sp_service_name'] ?? '';
            $package['service_slug'] = $service['durel_sp_service_slug'] ?? '';
            $package['service_is_internet'] = $service['durel_sp_service_is_internet'] ?? false;
            $homepage_packages[] = $package;
        }
    }
}

// Filter to show only internet packages on homepage (based on admin option)
$show_internet_only = $get_options['durel_hp_packages_show_internet_only'] ?? true;
if ($show_internet_only) {
    $homepage_packages = array_filter($homepage_packages, function($package) {
        return isset($package['service_is_internet']) && $package['service_is_internet'] == true;
    });
}

// Packages are already sorted by the admin interface drag-and-drop functionality

if (!empty($homepage_packages)):
    ?>
    <!-- Packages Section -->
    <section id="packages" class="packages-section py-20">
        <div class="container">
            <div class="packages-section-header">
                <h2><?php _e($get_options['durel_hp_packages_section_title'] ?: 'Our Packages', 'durel') ?></h2>
                <p><?php _e($get_options['durel_hp_packages_section_subtitle'] ?: 'Choose the perfect package for your needs', 'durel') ?></p>
            </div>
            
            <!-- Slick Slider Container -->
            <div class="packages-slick-container">
                <div class="packages-slick-slider">
                    <?php
                    foreach ($homepage_packages as $package):
                        $isPopular = isset($package['durel_sp_package_popular']) && $package['durel_sp_package_popular'] == true;
                        ?>
                        <div class="package-slide">
                            <div class="package-card">
                                <?php if ($isPopular): ?>
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
                                
                                <?php 
                                // Generate URL to individual service page
                                $service_slug = $package['service_slug'] ?? '';
                                $final_link = home_url('/services/' . $service_slug . '/');
                                ?>
                                <a href="<?php echo esc_url($final_link); ?>" 
                                   class="package-btn secondary-btn">
                                    <?php _e('View Details', 'durel') ?>
                                </a>
                            </div>
                        </div>
                        <?php
                    endforeach;
                    ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Slick Slider Initialization Script -->
    <script>
    jQuery(document).ready(function() {
        if (typeof jQuery.fn.slick !== 'undefined') {
            jQuery('.packages-slick-slider').slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                centerMode: true,
                centerPadding: '0px',
                infinite: true,
                autoplay: true,
                autoplaySpeed: 4000,
                speed: 600,
                arrows: true,
                prevArrow: '<button type="button" class="slick-prev packages-slick-prev"><i class="fas fa-chevron-left"></i></button>',
                nextArrow: '<button type="button" class="slick-next packages-slick-next"><i class="fas fa-chevron-right"></i></button>',
                dots: false,
                cssEase: 'ease-in-out',
            });
            
            // Function to update button classes based on center position
            function updateButtonClasses() {
                jQuery('.package-slide').each(function() {
                    var $slide = jQuery(this);
                    var $button = $slide.find('.package-btn');
                    
                    if ($slide.hasClass('slick-center')) {
                        $button.removeClass('secondary-btn').addClass('primary-btn');
                    } else {
                        $button.removeClass('primary-btn').addClass('secondary-btn');
                    }
                });
            }
            jQuery('.packages-slick-slider').on('afterChange', function(event, slick, currentSlide) {
                updateButtonClasses();
            });
        
            updateButtonClasses();
        }
    });
    </script>
    <?php
else:
    ?>
    <!-- No packages configured for homepage display -->
    <section id="packages" class="packages-section py-20 bg-gradient-to-br from-gray-50 to-white">
        <div class="container">
            <div class="packages-section-header">
                <h2><?php _e($get_options['durel_hp_packages_section_title'] ?: 'Our Packages', 'durel') ?></h2>
                <p><?php _e($get_options['durel_hp_packages_section_subtitle'] ?: 'Choose the perfect package for your needs', 'durel') ?></p>
            </div>
            <div class="text-center">
                <p>No packages configured for homepage display. Please configure packages in <strong>ISP Website → Services Page</strong> and enable "Display on Homepage" for packages you want to feature.</p>
            </div>
        </div>
    </section>
    <?php
endif;
?>