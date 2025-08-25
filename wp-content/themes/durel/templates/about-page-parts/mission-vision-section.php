<?php
/* Display Mission & Vision Section of About Us Page */
$get_options = get_option('durel_options');
?>

<section class="mission-vision-section" id="mission-vision">
    <div class="container">
        <div class="row row-cols-1 row-cols-md-2 mission-section">
            <div class="col">
                <?php if ($get_options['durel_ap_mv_mission_title']): ?>
                    <div class="mission-vision-title mission-title mb-5 mb-md-0">
                        <h1><?php _e($get_options['durel_ap_mv_mission_title'], 'durel') ?></h1>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col">
                <div class="mission-vision-text mission-text">
                    <p class="text-justify">
                        <?php _e($get_options['durel_ap_mv_mission_description'], 'durel') ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="and-text">
            <p>&</p>
        </div>
        <div class="row row-cols-1 row-cols-md-2 vision-section">
            <div class="col">
                <div class="mission-vision-text vision-text">
                    <p class="text-justify">
                        <?php _e($get_options['durel_ap_mv_vision_description'], 'durel') ?>
                    </p>
                </div>
            </div>
            <div class="col">
                <?php if ($get_options['durel_ap_mv_vision_title']): ?>
                    <div class="mission-vision-title vision-title mt-5 mt-md-0">
                        <h1><?php _e($get_options['durel_ap_mv_vision_title'], 'durel') ?></h1>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>