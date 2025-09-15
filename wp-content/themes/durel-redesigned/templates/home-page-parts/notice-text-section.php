<?php
/* Display Notice Text Section */
$get_options = get_option('durel_options');

// Check if notice section is enabled
$show_notice = $get_options['durel_hp_ns_show_notice'] ?? true;
$noticeGroup = $get_options['durel_hp_ns_notice_group'] ?? array();

if ($show_notice && !empty($noticeGroup) && is_array($noticeGroup)):
    ?>

    <section class="notice-section py-3">
        <div class="container">
            <div class="notice-container">
                <div class="notice-content">
                    <div class="notice-header">
                        <div class="notice-icon-wrapper">
                            <i class="fas fa-bullhorn"></i>
                        </div>
                        <h3 class="notice-title">Important Notice</h3>
                    </div>
                    
                    <div class="notice-marquee-wrapper">
                        <div class="notice-marquee">
                            <?php foreach ($noticeGroup as $notice):
                                if (!empty($notice['durel_hp_ns_notice_text'])):
                                    $notice_type = $notice['durel_hp_ns_notice_type'] ?? 'info';
                                    $notice_link = $notice['durel_hp_ns_notice_link'] ?? '';
                                    
                                    // Get appropriate icon based on notice type
                                    $icon_class = 'fas fa-info-circle';
                                    switch ($notice_type) {
                                        case 'success':
                                            $icon_class = 'fas fa-check-circle';
                                            break;
                                        case 'warning':
                                            $icon_class = 'fas fa-exclamation-triangle';
                                            break;
                                        case 'error':
                                            $icon_class = 'fas fa-times-circle';
                                            break;
                                        default:
                                            $icon_class = 'fas fa-info-circle';
                                    }
                                    ?>
                                    <div class="notice-item notice-<?php echo esc_attr($notice_type); ?>">
                                        <?php if ($notice_link): ?>
                                            <a href="<?php echo esc_url($notice_link); ?>" class="notice-link">
                                                <i class="<?php echo esc_attr($icon_class); ?> me-2"></i>
                                                <span><?php echo esc_html($notice['durel_hp_ns_notice_text']); ?></span>
                                            </a>
                                        <?php else: ?>
                                            <i class="<?php echo esc_attr($icon_class); ?> me-2"></i>
                                            <span><?php echo esc_html($notice['durel_hp_ns_notice_text']); ?></span>
                                        <?php endif; ?>
                                    </div>
                                    <?php
                                endif;
                            endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php endif; ?>