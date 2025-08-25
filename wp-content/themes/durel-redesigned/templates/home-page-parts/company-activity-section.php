<?php
/* Display Company Activity Section */
$get_options = get_option('durel_options');

$activityGroup = $get_options['durel_hp_ca_list'];
if ($activityGroup):
    ?>

    <section class="company-activity-section">
        <div class="container">
            <div class="row row-cols-1 row-cols-lg-2 align-items-center justify-content-center">
                <?php if ($get_options['durel_hp_ca_image']['url']): ?>
                    <div class="col-lg-5">
                        <div class="img-box">
                            <img class="img-fluid w-100" src="<?php echo $get_options['durel_hp_ca_image']['url'] ?>" alt="">
                        </div>
                    </div>
                <?php endif; ?>

                <div class="col-lg-7">
                    <div class="row row-cols-2 align-items-center justify-content-center">
                        <?php foreach ($activityGroup as $activity): ?>
                            <div class="count-box ">
                                <?php if ($activity['durel_hp_ca_icon']): ?>
                                    <li>
                                        <i class="<?php echo $activity['durel_hp_ca_icon']; ?>"></i>
                                    </li>
                                <?php endif; ?>
                                <div>
                                    <?php if ($activity['durel_hp_ca_number']): ?>
                                        <h1> <span class="count"><?php echo $activity['durel_hp_ca_number'] ?></span>+</h1>
                                    <?php endif;
                                    if ($activity['durel_hp_ca_name']):
                                        ?>
                                        <p><?php _e($activity['durel_hp_ca_name'], 'durel') ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>


                    </div>
                </div>
            </div>
        </div>
    </section>

<?php endif; ?>