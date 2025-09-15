<?php
/* Display How it works Section */
$get_options = get_option('durel_options');

$howItWorkGroup = $get_options['durel_hp_hiw_list'];
if ($howItWorkGroup):
    ?>

    <section class="how-it-works-section py-20 bg-white">
        <div class="container">
            <div class="how-it-works-header">
                <h2><?php _e($get_options['durel_hp_hiw_title'] ?: 'How It Works', 'durel') ?></h2>
                <p><?php _e('Get connected in three simple steps', 'durel') ?></p>
            </div>
            
            <div class="how-it-works-steps">
                <?php
                $stepNumber = 1;
                foreach ($howItWorkGroup as $howItWork): ?>
                    <div class="how-it-works-step">
                        <div class="step-content">
                            <div class="step-number">
                                <div class="step-circle">
                                    <span class="step-number-text"><?php echo $stepNumber; ?></span>
                                </div>
                                <?php if ($stepNumber < count($howItWorkGroup)): ?>
                                    <div class="step-connector"></div>
                                <?php endif; ?>
                            </div>
                            
                            <div class="step-info">
                                <?php if ($howItWork['durel_hp_hiw_name']): ?>
                                    <h3 class="step-title"><?php _e($howItWork['durel_hp_hiw_name'], 'durel') ?></h3>
                                <?php endif; ?>
                                
                                <?php if ($howItWork['durel_hp_hiw_short_description']): ?>
                                    <p class="step-description"><?php _e($howItWork['durel_hp_hiw_short_description'], 'durel') ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php
                    $stepNumber++;
                endforeach; ?>
            </div>
        </div>
    </section>

<?php endif; ?>