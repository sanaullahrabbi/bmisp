<?php

/* Template Name: About Us */
get_header();
$get_options = get_option('durel_options');
?>

<!-- Page Header Section Start  -->
<?php 
$page_title = $get_options['durel_ap_page_title'] ?? get_the_title();
$page_subtitle = $get_options['durel_ap_page_subtitle'] ?? 'Learn more about our company, mission, and the people behind our success';

// Custom breadcrumbs for About page
$breadcrumbs = array(
    array('title' => 'Home', 'url' => home_url('/')),
    array('title' => 'About Us', 'url' => false)
);

pageHeaderSection($page_title, $page_subtitle, $breadcrumbs);
?>
<!-- Page Header Section End  -->

<!-- Mission & Vision Section Start -->
<section class="mission-vision-section">
    <div class="mission-vision-container">
        <!-- Mission -->
        <?php if ($get_options['durel_ap_mv_mission_title'] || $get_options['durel_ap_mv_mission_description']): ?>
        <div class="mission-vision-item mission-item">
            <div class="mission-vision-content">
                <div class="mission-vision-text">
                    <h2 class="mission-vision-title"><?php echo esc_html($get_options['durel_ap_mv_mission_title']); ?></h2>
                    <div class="mission-vision-description">
                        <?php echo wp_kses_post($get_options['durel_ap_mv_mission_description']); ?>
                    </div>
                </div>
                <div class="mission-vision-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 2L2 7l10 5 10-5-10-5z"/>
                        <path d="M2 17l10 5 10-5"/>
                        <path d="M2 12l10 5 10-5"/>
                    </svg>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <!-- Vision -->
        <?php if ($get_options['durel_ap_mv_vision_title'] || $get_options['durel_ap_mv_vision_description']): ?>
        <div class="mission-vision-item vision-item">
            <div class="mission-vision-content">
                <div class="mission-vision-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                        <circle cx="12" cy="12" r="3"/>
                    </svg>
                </div>
                <div class="mission-vision-text">
                    <h2 class="mission-vision-title"><?php echo esc_html($get_options['durel_ap_mv_vision_title']); ?></h2>
                    <div class="mission-vision-description">
                        <?php echo wp_kses_post($get_options['durel_ap_mv_vision_description']); ?>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
</section>
<!-- Mission & Vision Section End -->

<!-- Team Section Start -->
<section class="about-team-section">
    <div class="about-team-container">
        <div class="about-team-header">
            <h2 class="about-team-title"><?php echo esc_html($get_options['durel_hp_team_section_title'] ?: 'Meet Our Team'); ?></h2>
            <p class="about-team-subtitle"><?php echo esc_html($get_options['durel_hp_team_section_subtitle'] ?: 'The talented individuals behind our success'); ?></p>
        </div>
        
        <div class="about-team-grid">
            <?php
            $team_members = $get_options['durel_hp_team_member_group'] ?? array();
            if (!empty($team_members) && is_array($team_members)):
                foreach ($team_members as $member):
                    $member_name = $member['durel_hp_team_member_name'] ?? '';
                    $member_position = $member['durel_hp_team_member_position'] ?? '';
                    $member_bio = $member['durel_hp_team_member_bio'] ?? '';
                    $member_image_data = $member['durel_hp_team_member_image'] ?? array();
                    $member_image = '';
                    
                    if (is_array($member_image_data) && !empty($member_image_data['url'])) {
                        $member_image = $member_image_data['url'];
                    } elseif (is_string($member_image_data)) {
                        $member_image = $member_image_data;
                    }
                    
                    if (!empty($member_name)):
                    ?>
                    <div class="about-team-card">
                        <div class="team-card-image">
                            <?php if ($member_image): ?>
                                <img src="<?php echo esc_url($member_image); ?>" 
                                     alt="<?php echo esc_attr($member_name); ?>" 
                                     class="team-member-photo">
                            <?php else: ?>
                                <div class="team-member-placeholder">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                                        <circle cx="12" cy="7" r="4"/>
                                    </svg>
                                </div>
                            <?php endif; ?>
                        </div>
                        
                        <div class="team-card-content">
                            <h3 class="team-member-name"><?php echo esc_html($member_name); ?></h3>
                            <?php if ($member_position): ?>
                                <p class="team-member-position"><?php echo esc_html($member_position); ?></p>
                            <?php endif; ?>
                            <?php if ($member_bio): ?>
                                <p class="team-member-bio"><?php echo esc_html($member_bio); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php
                    endif;
                endforeach;
            endif;
            ?>
        </div>
    </div>
</section>
<!-- Team Section End -->

<!-- History Section Start -->
<section class="about-history-section">
    <div class="about-history-container">
        <?php if ($get_options['durel_ap_history_section_title']): ?>
        <div class="about-history-header">
            <h2 class="about-history-title"><?php echo esc_html($get_options['durel_ap_history_section_title']); ?></h2>
        </div>
        <?php endif; ?>

        <?php
        $historyGroups = $get_options['durel_ap_history_group'];
        if ($historyGroups):
        ?>
        <div class="about-history-timeline">
            <?php foreach ($historyGroups as $index => $history): ?>
            <div class="history-timeline-item <?php echo $index % 2 === 0 ? 'timeline-left' : 'timeline-right'; ?>">
                <div class="timeline-content">
                    <div class="timeline-year">
                        <?php echo esc_html($history['durel_ap_history_year']); ?>
                    </div>
                    <div class="timeline-card">
                        <h3 class="timeline-title"><?php echo esc_html($history['durel_ap_history_title']); ?></h3>
                        <p class="timeline-description"><?php echo esc_html($history['durel_ap_history_description']); ?></p>
                    </div>
                </div>
                <?php if ($history['durel_ap_history_img']['url']): ?>
                <div class="timeline-image">
                    <img src="<?php echo esc_url($history['durel_ap_history_img']['url']); ?>" 
                         alt="<?php echo esc_attr($history['durel_ap_history_title']); ?>" 
                         class="history-photo">
                </div>
                <?php endif; ?>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</section>
<!-- History Section End -->

<?php
get_footer();
?>