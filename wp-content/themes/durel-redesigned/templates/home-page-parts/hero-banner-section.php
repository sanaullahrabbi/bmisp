<?php
/* Display Hero Banner Section */
$get_options = get_option('durel_options');
?>

<section class="hero-banner-section overflow-hidden position-relative">
    <!-- Background gradient overlay -->
    <div class="hero-bg-overlay"></div>
    <div class="container hero-banner-content position-relative">
        <div class="banner-content">
            <h1 class="hero-title hero-title-accent">
                <?php _e($get_options['durel_hp_hb_title'] ?: 'Ultra-Fast Fiber Internet', 'durel') ?>
            </h1>
            
            <p class="hero-subtitle">
                <?php _e($get_options['durel_hp_hb_subtitle'] ?: 'Experience lightning-fast internet speeds with our cutting-edge fiber technology. Get connected to the future today.', 'durel') ?>
            </p>
            
            <div class="hero-buttons">
                <a href="<?php echo esc_url($get_options['durel_hp_hb_explore_plans_link'] ?: '#pricing'); ?>" class="primary-btn hero-primary-btn">
                    <span><?php _e($get_options['durel_hp_hb_explore_plans_text'] ?: 'Explore Plans', 'durel') ?></span>
                    <svg class="hero-btn-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                        <polyline points="12,5 19,12 12,19"></polyline>
                    </svg>
                </a>
                
                <button class="secondary-btn hero-secondary-btn" onclick="openVideoModal('<?php echo esc_js($get_options['durel_hp_hb_watch_demo_link'] ?: '#'); ?>')">
                    <svg class="hero-btn-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polygon points="5,3 19,12 5,21"></polygon>
                    </svg>
                    <span><?php _e($get_options['durel_hp_hb_watch_demo_text'] ?: 'Watch Demo', 'durel') ?></span>
                </button>
            </div>
        </div>
        <div class="hero-feature-card">
            <?php 
            $right_content_type = $get_options['durel_hp_hb_right_content_type'] ?: 'speed_test';
            
            if ($right_content_type === 'speed_test'): 
                $speed_test_service = $get_options['durel_hp_hb_speed_test_service'] ?: 'netmeter';
                $custom_url = $get_options['durel_hp_hb_speed_test_custom_url'] ?: '';
                
                // Define speed test URLs
                $speed_test_urls = array(
                    'netmeter' => '//www.metercustom.net/plugin/?hl=en-gb&th=g',
                    'fast_com' => 'https://fast.com/',
                    'custom_url' => $custom_url
                );
                
                $speed_test_url = $speed_test_urls[$speed_test_service] ?: $speed_test_urls['netmeter'];
                
                // Generate class name based on speed test service
                $speed_test_class = 'speed-test-' . sanitize_html_class($speed_test_service);
            ?>
                <!-- Internet Speed Test -->
                <div class="speed-test-container <?php echo esc_attr($speed_test_class); ?>">
                    <iframe class="speed-test-iframe" src="<?php echo esc_url($speed_test_url); ?>"></iframe>
                </div>
            <?php else: ?>
                <!-- Feature Card -->
                <div class="feature-card-content">
                    <div class="feature-card-content-inner">
                        <div class="feature-header">
                            <div class="feature-icon">
                                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polygon points="13,2 3,14 12,14 11,22 21,10 12,10 13,2"></polygon>
                                </svg>
                            </div>
                            <span class="feature-title"><?php _e($get_options['durel_hp_hb_feature_title'] ?: 'Ultra-Fast Speed', 'durel') ?></span>
                        </div>
                        <div class="speed-indicator mb-2">
                            <div class="speed-bar">
                                <div class="speed-fill"></div>
                            </div>
                        </div>
                        <p class="speed-text"><?php _e($get_options['durel_hp_hb_feature_description'] ?: 'Up to 1 Gbps Download Speed', 'durel') ?></p>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Video Modal for Hero Demo -->
<div id="heroVideoModal" class="video-modal">
    <div class="video-modal-content relative max-w-4xl w-full">
        <button id="closeHeroVideoModal" class="absolute -top-12 right-0 text-white hover:text-gray-300 transition-colors">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
        <div class="video-wrapper relative w-full" style="padding-bottom: 56.25%;">
            <iframe id="heroVideoIframe" class="absolute top-0 left-0 w-full h-full rounded-lg" 
                    src="" frameborder="0" allowfullscreen></iframe>
        </div>
    </div>
</div>

<script>
function openVideoModal(videoUrl) {
    const modal = document.getElementById('heroVideoModal');
    const iframe = document.getElementById('heroVideoIframe');
    
    if (videoUrl) {
        iframe.src = videoUrl;
        modal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }
}

document.addEventListener('DOMContentLoaded', function() {
    const closeModal = document.getElementById('closeHeroVideoModal');
    const modal = document.getElementById('heroVideoModal');
    const iframe = document.getElementById('heroVideoIframe');
    
    closeModal.addEventListener('click', function() {
        modal.style.display = 'none';
        iframe.src = '';
        document.body.style.overflow = 'auto';
    });
    
    modal.addEventListener('click', function(e) {
        if (e.target === modal) {
            modal.style.display = 'none';
            iframe.src = '';
            document.body.style.overflow = 'auto';
        }
    });
});
</script>