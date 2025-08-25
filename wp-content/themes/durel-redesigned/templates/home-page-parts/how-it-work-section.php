<?php
/* Display Hot it work Section */
$get_options = get_option('durel_options');

$howItWorkGroup = $get_options['durel_hp_hiw_list'];
if ($howItWorkGroup):
    ?>

    <section class="how-it-works position-relative bg-color pt-40 pb-40">
        <div class="container">
            <?php if ($get_options['durel_hp_hiw_title']): ?>
                <div class="title-one text-center mb-65 lg-mb-40">
                    <h2>
                        <span class="position-relative"><?php _e($get_options['durel_hp_hiw_title'], 'durel') ?>
                            <img src="<?php echo get_template_directory_uri() ?>/assets/images/shape/shape_07.svg" alt=""
                                class="lazy-img shapes shape" /></span>
                    </h2>
                </div>
            <?php endif; ?>

            <div class="row justify-content-center">
                <?php
                $i = 1;
                foreach ($howItWorkGroup as $howItWork): ?>
                    <div class="col-xxl-3 col-lg-4 col-md-6 <?php echo $i % 2 === 0 ? 'm-auto' : '' ?>">
                        <div
                            class="card-style-two text-center mt-25 wow fadeInUp <?php echo $i % 2 === 0 ? 'position-relative arrow' : '' ?>">
                            <?php if ($howItWork['durel_hp_hiw_icon']): ?>
                                <div class="icon rounded-circle d-flex align-items-center justify-content-center m-auto">
                                    <i class="<?php echo $howItWork['durel_hp_hiw_icon'] ?>"></i>
                                </div>
                            <?php endif;
                            if ($howItWork['durel_hp_hiw_name']):
                                ?>
                                <div class="title fw-500">
                                    <h3><?php _e($howItWork['durel_hp_hiw_name'], 'durel') ?></h3>
                                </div>
                            <?php endif;
                            if ($howItWork['durel_hp_hiw_short_description']):
                                ?>
                                <p><?php _e($howItWork['durel_hp_hiw_short_description'], 'durel') ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php
                    $i++;
                endforeach; ?>
            </div>
        </div>
        <img src="<?php echo get_template_directory_uri() ?>/assets/images/shape/shape_08.svg" alt=""
            class="lazy-img shapes shape_01" />
        <img src="<?php echo get_template_directory_uri() ?>/assets/images/shape/shape_09.svg" alt=""
            class="lazy-img shapes shape_02" />
    </section>

<?php endif; ?>