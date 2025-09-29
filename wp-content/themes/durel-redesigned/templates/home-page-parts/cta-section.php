<?php
/* Display CTA Section */
$get_options = get_option('durel_options');
?>

<section class="cta-section">
    <div class="cta-overlay"></div>
    <div class="cta-container">
        <div class="cta-content">
            <h2 class="cta-title">
                <?php _e($get_options['durel_hp_cta_section_title'] ?: 'Ready to Get Connected?', 'durel') ?>
            </h2>
            
            <p class="cta-description">
                <?php _e($get_options['durel_hp_cta_section_description'] ?: 'Join thousands of satisfied customers enjoying ultra-fast fiber internet. Get started today!', 'durel') ?>
            </p>
            
            <div class="cta-buttons">
                <a href="<?php echo esc_url($get_options['durel_hp_cta_primary_button_link'] ?: '#packages'); ?>" 
                   class="cta-primary-btn">
                    <svg class="cta-btn-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                    <span><?php _e($get_options['durel_hp_cta_primary_button_text'] ?: 'Choose Your Plan', 'durel') ?></span>
                </a>
                
                <a href="<?php echo esc_url($get_options['durel_hp_cta_secondary_button_link'] ?: 'tel:+8801234567890'); ?>" 
                   class="cta-secondary-btn">
                    <svg class="cta-btn-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                    </svg>
                    <span><?php _e($get_options['durel_hp_cta_secondary_button_text'] ?: 'Call Now', 'durel') ?>: <?php _e($get_options['durel_hp_cta_phone_number'] ?: '+880 1234 567890', 'durel') ?></span>
                </a>
            </div>
            
            <?php if ($get_options['durel_hp_cta_show_apk_download'] ?? true): ?>
            <div class="cta-apk-download">
                <p class="cta-apk-text">
                    <?php _e('Download our mobile app for easy account management', 'durel') ?>
                </p>
                <div class="cta-apk-button">
                    <a href="<?php echo esc_url($get_options['durel_ss_apk_download_url'] ?: '#'); ?>" 
                       class="cta-apk-btn" download>
                        <svg class="cta-apk-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15V3m0 0l-3 3m3-3l3 3m-3 12v-6m0 0l-3 3m3-3l3 3"></path>
                        </svg>
                        <span><?php _e($get_options['durel_ss_apk_download_text'] ?: 'Download APK', 'durel') ?></span>
                    </a>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>
