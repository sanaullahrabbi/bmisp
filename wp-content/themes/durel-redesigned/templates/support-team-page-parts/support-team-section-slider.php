<?php
/* Display Support Team Member Section */
$get_options = get_option('durel_options');
?>
<section class="team-section py-20">
    <div class="container">
        <div class="team-section-header">
            <h2><?php _e($get_options['durel_hp_team_section_title'] ?: 'Talented Team Members', 'durel') ?></h2>
            <p><?php _e($get_options['durel_hp_team_section_subtitle'] ?: 'Meet the experts behind our exceptional service', 'durel') ?></p>
        </div>
        
        <div class="team-slider-container">
            <div class="team-slider">
                <?php
                $team_members = $get_options['durel_hp_team_member_group'] ?? array();
                if (!empty($team_members) && is_array($team_members)):
                    foreach ($team_members as $member):
                        $member_name = $member['durel_hp_team_member_name'] ?? '';
                        $member_position = $member['durel_hp_team_member_position'] ?? '';
                        $member_image_data = $member['durel_hp_team_member_image'] ?? array();
                        $member_image = '';
                        
                        if (is_array($member_image_data) && !empty($member_image_data['url'])) {
                            $member_image = $member_image_data['url'];
                        } elseif (is_string($member_image_data)) {
                            $member_image = $member_image_data;
                        }
                        
                        if (!empty($member_name)): // Only show if name is provided
                        ?>
                        <div class="team-slide">
                            <div class="team-member">
                                <div class="member-image-container">
                                    <?php if ($member_image): ?>
                                        <img 
                                            src="<?php echo esc_url($member_image); ?>" 
                                            alt="<?php echo esc_attr($member_name); ?>"
                                            class="member-image"
                                        />
                                    <?php else: ?>
                                        <div class="member-image-placeholder">
                                            <i class="fas fa-user"></i>
                                        </div>
                                    <?php endif; ?>
                                    <div class="member-image-overlay"></div>
                                </div>
                                
                                <div class="member-info">
                                    <h3 class="member-name"><?php echo esc_html($member_name); ?></h3>
                                    <?php if ($member_position): ?>
                                        <p class="member-role"><?php echo esc_html($member_position); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        
                        <?php
                        endif;
                    endforeach;
                endif;
                ?>
            </div>
        </div>
    </div>
</section>

<!-- Team Slider Initialization Script -->
<script>
jQuery(document).ready(function() {
    if (typeof jQuery.fn.slick !== 'undefined') {
        jQuery('.team-slider').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            infinite: true,
            autoplay: true,
            autoplaySpeed: 3000,
            speed: 600,
            arrows: true,
            prevArrow: '<button type="button" class="slick-prev team-slick-prev"><i class="fas fa-chevron-left"></i></button>',
            nextArrow: '<button type="button" class="slick-next team-slick-next"><i class="fas fa-chevron-right"></i></button>',
            dots: false,
            cssEase: 'ease-in-out',
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        arrows: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        arrows: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        arrows: true,
                        dots: true
                    }
                }
            ]
        });
        
        console.log('Team Slider initialized successfully');
    } else {
        console.error('Slick Slider is not loaded for team section');
    }
});
</script>