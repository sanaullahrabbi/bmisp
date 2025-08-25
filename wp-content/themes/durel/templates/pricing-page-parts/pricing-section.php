<?php
/* Display Pricing Section */

$get_options = get_option('durel_options');

$pricingGroupList = $get_options['durel_pp_package_list'];
if ($pricingGroupList):


    function pricingList($pricingListGroup)
    {

        foreach ($pricingListGroup as $pricing):
            ?>
            <div class="pricing-list job-listing-wrapper border-wrapper mt-30 wow fadeInUp">
                <div class="job-list-one position-relative bottom-border">
                    <div class="row row-cols-1 row-cols-lg-4 justify-content-between align-items-center">
                        <div class="col mb-3 mb-md-0">
                            <div class="job-title">
                                <?php if ($pricing['durel_pp_package_name']): ?>
                                    <h5>🔥 <?php _e($pricing['durel_pp_package_name'], 'durel') ?> +</h5>
                                <?php endif;
                                if ($pricing['durel_pp_short_description']):
                                    ?>
                                    <p><?php _e($pricing['durel_pp_short_description'], 'durel') ?></p>
                                    <?php
                                endif;
                                if ($pricing['durel_pp_package_internet']):
                                    ?>
                                    <h3 class="package"><?php _e($pricing['durel_pp_package_internet'], 'durel') ?></h3>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="col-lg-6 mb-3 mb-md-0">
                            <div class="row row-cols-1 row-cols-lg-2 align-items-center justify-content-center package-point">
                                <?php
                                $packageOfferPoints = $pricing['durel_pp_package_offer_list'];
                                foreach ($packageOfferPoints as $packageOfferPoint):
                                    if ($packageOfferPoint['durel_pp_package_offer_title']):
                                        ?>
                                        <li>
                                            <i
                                                class="fas fa-check-circle"></i><?php _e($packageOfferPoint['durel_pp_package_offer_title'], 'durel') ?>
                                        </li>
                                        <?php
                                    endif;
                                endforeach; ?>
                            </div>
                        </div>

                        <div class="col text-center mb-3 mb-md-0">
                            <div class="price-box">
                                <?php if ($pricing['durel_pp_package_price']): ?>
                                    <h3 class="price">TK <?php _e($pricing['durel_pp_package_price'], 'durel') ?> <sub>/m</sub></h3>
                                <?php endif; ?>
                                <a href="<?php echo home_url() ?>/new-connection/"
                                    class="apply-btn text-center tran3s"><?php _e('Buy Now', 'durel') ?></a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <?php

        endforeach;
    }

    ?>
    <section class="job-listing-one mt-40 mb-40" id="package">
        <div class="container">
            <?php if (is_front_page()): ?>
                <div class="text-center d-lg-flex justify-content-between align-items-center">
                    <div class="title-one">
                        <h2 class="section-title-price"><?php _e('Pricing Plans', 'durel') ?></h2>
                    </div>
                    <div class="mt-15 mt-md-0">
                        <a href="<?php echo home_url() ?>/pricing" class="btn-six"><?php _e('Explore all package', 'durel') ?>
                            <i class="fas fa-angle-right"></i></a>
                    </div>
                </div>


                <?php
                $shortPriceList = [];
                if (count($pricingGroupList) >= 2):
                    $shortPriceList = array_slice($pricingGroupList, 0, 3);
                    pricingList($shortPriceList);
                else:
                    pricingList($pricingGroupList);
                endif;

            else:
                pricingList($pricingGroupList);

            endif;
            ?>
        </div>
    </section>
<?php endif; ?>