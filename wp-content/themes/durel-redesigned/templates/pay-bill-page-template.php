<?php

/* Template Name: Pay Bill */
get_header();
$get_options = get_option('durel_options');
?>

<!-- Page Header Section Start  -->
<?php 
$get_options = get_option('durel_options');
$page_title = $get_options['durel_pbp_page_title'] ?: get_the_title();
$page_subtitle = $get_options['durel_pbp_page_subtitle'] ?: 'Convenient payment options for your internet bills';

// Custom breadcrumbs for Pay Bill page
$breadcrumbs = array(
    array('title' => 'Home', 'url' => home_url('/')),
    array('title' => 'Pay Bill', 'url' => false)
);

pageHeaderSection($page_title, $page_subtitle, $breadcrumbs);
?>
<!-- Page Header Section End  -->

<!-- Pay Bill Section Start -->
<section class="pay-bill-section">
    <div class="pay-bill-container">
        <!-- Page Description -->
        <?php if ($get_options['durel_pbp_page_description']): ?>
        <div class="page-description">
            <?php echo wp_kses_post($get_options['durel_pbp_page_description']); ?>
        </div>
        <?php endif; ?>

        <!-- App Download & Login Section -->
        <?php if ($get_options['durel_pbp_show_app_section']): ?>
        <div class="app-login-section">
            <div class="app-login-buttons">
                <a href="<?php echo esc_url($get_options['durel_pbp_app_download_url']); ?>" class="app-download-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                        <polyline points="7,10 12,15 17,10"/>
                        <line x1="12" y1="15" x2="12" y2="3"/>
                    </svg>
                    <?php echo esc_html($get_options['durel_pbp_app_download_text']); ?>
                </a>
                <a href="<?php echo esc_url($get_options['durel_pbp_client_login_url']); ?>" class="client-login-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"/>
                        <polyline points="10,17 15,12 10,7"/>
                        <line x1="15" y1="12" x2="3" y2="12"/>
                    </svg>
                    <?php echo esc_html($get_options['durel_pbp_client_login_text']); ?>
                </a>
            </div>
        </div>
        <?php endif; ?>

        <!-- Tab Navigation -->
        <div class="pay-bill-tabs">
            <div class="tab-nav">
                <button class="tab-btn active" data-tab="mobile-banking">
                    <?php echo esc_html($get_options['durel_pbp_tab_mobile_banking'] ?: 'Mobile Banking'); ?>
                </button>
                <button class="tab-btn" data-tab="checkout">
                    <?php echo esc_html($get_options['durel_pbp_tab_checkout'] ?: 'Check Out & Bill Offers'); ?>
                </button>
                <button class="tab-btn" data-tab="client-guidelines">
                    <?php echo esc_html($get_options['durel_pbp_tab_client_guidelines'] ?: 'Client\'s Guidelines'); ?>
                </button>
            </div>
        </div>

        <!-- Tab Content -->
        <div class="tab-content">
            <!-- Mobile Banking Tab -->
            <div class="tab-panel active" id="mobile-banking">
                <?php
                $payBillGroups = $get_options['durel_pbp_pay_bill_group'];
                if ($payBillGroups):
                    foreach ($payBillGroups as $payBill):
                        $method_name = esc_html($payBill['durel_pbp_pay_bill_method']);
                        $merchant_number = esc_html($payBill['durel_pbp_pay_bill_merchant_number']);
                        $steps = $payBill['durel_pbp_pay_bill_steps'] ?? array();
                        $guide_image = $payBill['durel_pbp_pay_bill_img']['url'] ?? '';
                        ?>
                        <div class="payment-method-section">
                            <div class="method-header">
                                <h2 class="method-title"><?php echo $method_name; ?></h2>
                                <?php if ($merchant_number): ?>
                                    <p class="merchant-number">Merchant Number: <strong><?php echo $merchant_number; ?></strong></p>
                                <?php endif; ?>
                            </div>
                            
                            <div class="method-content">
                                <div class="method-steps">
                                    <?php if (!empty($steps)): ?>
                                        <?php foreach ($steps as $step): ?>
                                            <div class="step-item">
                                                <div class="step-number"><?php echo esc_html($step['durel_pbp_step_number']); ?></div>
                                                <div class="step-text"><?php echo esc_html($step['durel_pbp_step_description']); ?></div>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>
                                
                                <?php if ($guide_image): ?>
                                <div class="method-image">
                                    <img src="<?php echo esc_url($guide_image); ?>" 
                                         alt="<?php echo esc_attr($method_name); ?> Payment Guide" 
                                         class="guide-image">
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php
                    endforeach;
                else:
                ?>
                <div class="empty-state">
                    <div class="empty-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="1" y="4" width="22" height="16" rx="2" ry="2"/>
                            <line x1="1" y1="10" x2="23" y2="10"/>
                        </svg>
                    </div>
                    <h3 class="empty-title">No Payment Methods Available</h3>
                    <p class="empty-text">Payment methods will be added soon. Please check back later or contact us for assistance.</p>
                </div>
                <?php endif; ?>
            </div>

            <!-- Check Out Tab -->
            <div class="tab-panel" id="checkout">
                <?php if ($get_options['durel_pbp_checkout_description']): ?>
                <div class="tab-description">
                    <?php echo wp_kses_post($get_options['durel_pbp_checkout_description']); ?>
                </div>
                <?php endif; ?>

                <?php
                $checkOutGroups = $get_options['durel_pbp_check_out_group'];
                if ($checkOutGroups):
                    foreach ($checkOutGroups as $checkOut):
                        ?>
                        <div class="checkout-method-section">
                            <div class="method-header">
                                <h2 class="method-title"><?php echo esc_html($checkOut['durel_pbp_cu_method']); ?></h2>
                            </div>
                            
                            <div class="method-content">
                                <div class="checkout-images">
                                    <?php if ($checkOut['durel_pbp_cu_app_img']['url']): ?>
                                    <div class="checkout-image-item">
                                        <h3 class="image-title">App Payment</h3>
                                        <img src="<?php echo esc_url($checkOut['durel_pbp_cu_app_img']['url']); ?>" 
                                             alt="App Payment Process" 
                                             class="checkout-image">
                                    </div>
                                    <?php endif; ?>
                                    
                                    <?php if ($checkOut['durel_pbp_cu_manual_img']['url']): ?>
                                    <div class="checkout-image-item">
                                        <h3 class="image-title">Manual Payment</h3>
                                        <img src="<?php echo esc_url($checkOut['durel_pbp_cu_manual_img']['url']); ?>" 
                                             alt="Manual Payment Process" 
                                             class="checkout-image">
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php
                    endforeach;
                else:
                ?>
                <div class="empty-state">
                    <div class="empty-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/>
                            <rect x="8" y="2" width="8" height="4" rx="1" ry="1"/>
                        </svg>
                    </div>
                    <h3 class="empty-title">No Check Out Information Available</h3>
                    <p class="empty-text">Check out information will be added soon. Please check back later or contact us for assistance.</p>
                </div>
                <?php endif; ?>
            </div>

            <!-- Client Guidelines Tab -->
            <div class="tab-panel" id="client-guidelines">
                <?php if ($get_options['durel_pbp_client_guidelines_description']): ?>
                <div class="tab-description">
                    <?php echo wp_kses_post($get_options['durel_pbp_client_guidelines_description']); ?>
                </div>
                <?php endif; ?>

                <?php
                $guidelinesGroups = $get_options['durel_pbp_client_guidelines_group'];
                if ($guidelinesGroups):
                    foreach ($guidelinesGroups as $guideline):
                        ?>
                        <div class="guideline-method-section">
                            <div class="method-header">
                                <h2 class="method-title"><?php echo esc_html($guideline['durel_pbp_guideline_title']); ?></h2>
                            </div>
                            
                            <div class="method-content">
                                <div class="guideline-description">
                                    <?php echo wp_kses_post($guideline['durel_pbp_guideline_description']); ?>
                                </div>
                                
                                <?php if ($guideline['durel_pbp_guideline_image']['url']): ?>
                                <div class="method-image">
                                    <img src="<?php echo esc_url($guideline['durel_pbp_guideline_image']['url']); ?>" 
                                         alt="<?php echo esc_attr($guideline['durel_pbp_guideline_title']); ?>" 
                                         class="guide-image">
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php
                    endforeach;
                else:
                ?>
                <div class="empty-state">
                    <div class="empty-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 1v6l3-3 3 3V1"/>
                            <path d="M21 12v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-6"/>
                            <path d="M3 8l9 9 9-9"/>
                        </svg>
                    </div>
                    <h3 class="empty-title">No Client Guidelines Available</h3>
                    <p class="empty-text">Client guidelines will be added soon. Please check back later or contact us for assistance.</p>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<!-- Pay Bill Section End -->

<?php
get_footer();
?>