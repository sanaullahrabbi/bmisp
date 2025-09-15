<?php
/* Display Pricing Section */

$get_options = get_option('durel_options');

$pricingGroupList = $get_options['durel_pp_package_list'];
if ($pricingGroupList):
    ?>
    <!-- Pricing Plans Section -->
    <section class="pricing-plans-section py-20 bg-gradient-to-br from-gray-50 to-white">
        <div class="container">
            <div class="pricing-section-header">
                <h2><?php _e($get_options['durel_pp_section_title'] ?: 'Pricing Plans', 'durel') ?></h2>
                <p><?php _e($get_options['durel_pp_section_subtitle'] ?: 'Choose the perfect plan for your needs', 'durel') ?></p>
            </div>
            
            <!-- Slick Slider Container -->
            <div class="pricing-slick-container">
                <div class="pricing-slick-slider">
                    <?php
                    foreach ($pricingGroupList as $pricing):
                        $isPopular = isset($pricing['durel_pp_package_popular']) && $pricing['durel_pp_package_popular'] == true;
                        ?>
                        <div class="pricing-slide">
                            <div class="pricing-card">
                                <?php if ($isPopular): ?>
                                    <div class="package-popular absolute -top-4 left-1/2 transform -translate-x-1/2">
                                        <span><?php _e('Most Popular', 'durel') ?></span>
                                    </div>
                                <?php endif; ?>
                                
                                <div class="package-info">
                                    <?php if ($pricing['durel_pp_package_name']): ?>
                                        <h3 class="package-name"><?php _e($pricing['durel_pp_package_name'], 'durel') ?></h3>
                                    <?php endif; ?>
                                    
                                    <?php if ($pricing['durel_pp_package_internet']): ?>
                                        <div class="package-internet">
                                            <span class="package-internet-amount"><?php _e($pricing['durel_pp_package_internet'], 'durel') ?></span>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <?php if ($pricing['durel_pp_package_price']): ?>
                                        <div class="package-price">
                                            <span class="package-price-amount">TK <?php _e($pricing['durel_pp_package_price'], 'durel') ?></span>
                                            <span class="package-price-unit">/mo</span>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                
                                <ul class="package-offer-points">
                                    <?php
                                    $packageOfferPoints = $pricing['durel_pp_package_offer_list'];
                                    if ($packageOfferPoints):
                                        foreach ($packageOfferPoints as $packageOfferPoint):
                                            if ($packageOfferPoint['durel_pp_package_offer_title']):
                                                ?>
                                                <li class="package-offer-point">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check-circle"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><path d="m9 11 3 3L22 4"></path></svg>
                                                    <span class="text-gray-600"><?php _e($packageOfferPoint['durel_pp_package_offer_title'], 'durel') ?></span>
                                                </li>
                                                <?php
                                            endif;
                                        endforeach;
                                    endif;
                                    ?>
                                </ul>
                                
                                <a href="<?php echo home_url() ?>/new-connection/" 
                                   class="pricing-btn secondary-btn">
                                    <?php _e('Choose Plan', 'durel') ?>
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
            jQuery('.pricing-slick-slider').slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                centerMode: true,
                centerPadding: '0px',
                infinite: true,
                autoplay: true,
                autoplaySpeed: 4000,
                speed: 600,
                arrows: true,
                prevArrow: '<button type="button" class="slick-prev pricing-slick-prev"><i class="fas fa-chevron-left"></i></button>',
                nextArrow: '<button type="button" class="slick-next pricing-slick-next"><i class="fas fa-chevron-right"></i></button>',
                dots: false,
                cssEase: 'ease-in-out',
            });
            
            // Function to update button classes based on center position
            function updateButtonClasses() {
                jQuery('.pricing-slide').each(function() {
                    var $slide = jQuery(this);
                    var $button = $slide.find('.pricing-btn');
                    
                    if ($slide.hasClass('slick-center')) {
                        $button.removeClass('secondary-btn').addClass('primary-btn');
                    } else {
                        $button.removeClass('primary-btn').addClass('secondary-btn');
                    }
                });
            }
            jQuery('.pricing-slick-slider').on('afterChange', function(event, slick, currentSlide) {
                updateButtonClasses();
            });
        
            updateButtonClasses();
        }
    });
    </script>
    <?php
endif;
?>