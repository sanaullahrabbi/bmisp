<?php
/* Display Service Section */
$get_options = get_option('durel_options');

// Safely get service groups with error checking
$serviceGroups = isset($get_options['durel_hp_ss_list']) ? $get_options['durel_hp_ss_list'] : array();

if (!empty($serviceGroups) && is_array($serviceGroups)):
    ?>

    <section class="service-section bg-white">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="service-section-title">Our Services</h2>
                <p class="service-section-subtitle">
                    Comprehensive internet solutions designed to meet all your connectivity needs
                </p>
            </div>
            
            <div class="d-grid grid-cols-3 gap-8">
                <?php foreach ($serviceGroups as $service): ?>
                    <?php 
                    // Safely get service data with defaults
                    $service_name = isset($service['durel_hp_ss_name']) ? $service['durel_hp_ss_name'] : '';
                    $service_description = isset($service['durel_hp_ss_description']) ? $service['durel_hp_ss_description'] : '';
                    $service_icon = isset($service['durel_hp_ss_icon']) ? $service['durel_hp_ss_icon'] : '';
                    $service_link = isset($service['durel_hp_ss_link']) ? $service['durel_hp_ss_link'] : '';
                    
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
                                
                                <?php if (!empty($service_link)): ?>
                                    <a href="<?php echo esc_url($service_link); ?>" class="service-link">
                                        Learn More <svg class="ms-2" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                            <polyline points="12,5 19,12 12,19"></polyline>
                                        </svg>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

<?php endif; ?>