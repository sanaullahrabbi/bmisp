<?php
/* Display Company Activity Section */
$get_options = get_option('durel_options');

$activityGroup = $get_options['durel_hp_ca_list'];
if ($activityGroup):
    ?>

    <section class="company-activity-section py-20">
        <div class="container">
            <div class="activity-content">
                <div class="activity-stats">
                    <div class="stats-grid">
                        <?php foreach ($activityGroup as $activity): ?>
                            <div class="stat-card">
                                <div class="stat-icon">
                                    <?php if ($activity['durel_hp_ca_icon']): ?>
                                        <i class="<?php echo esc_attr($activity['durel_hp_ca_icon']); ?>"></i>
                                    <?php else: ?>
                                        <i class="fas fa-chart-line"></i>
                                    <?php endif; ?>
                                </div>
                                <div class="stat-number">
                                    <?php if ($activity['durel_hp_ca_number']): ?>
                                        <?php echo esc_html($activity['durel_hp_ca_number']); ?>+
                                    <?php endif; ?>
                                </div>
                                <div class="stat-label">
                                    <?php if ($activity['durel_hp_ca_name']): ?>
                                        <?php _e($activity['durel_hp_ca_name'], 'durel'); ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                
                <div class="activity-content-text">
                    <h2 class="content-title">
                        <?php _e($get_options['durel_hp_ca_section_title'] ?: 'Trusted by thousands across Bangladesh', 'durel'); ?>
                    </h2>
                    <p class="content-description">
                        <?php _e($get_options['durel_hp_ca_section_description'] ?: 'FTTB provides direct fiber-to-the-home connections via speeds up to 1 Gbps. Our network infrastructure is designed to deliver consistent, reliable internet service to residential and business customers across 200+ locations.', 'durel'); ?>
                    </p>
                    <div class="content-guarantee">
                        <i class="fas fa-shield-alt"></i>
                        <span><?php _e($get_options['durel_hp_ca_guarantee_text'] ?: '99.9% Uptime Guarantee', 'durel'); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php endif; ?>