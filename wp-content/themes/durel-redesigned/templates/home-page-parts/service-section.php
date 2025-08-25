<?php
/* Display Notice Text Section */
$get_options = get_option('durel_options');

$serviceGroups = $get_options['durel_hp_ss_list'];

if ($serviceGroups):
    ?>

    <section class="category-section-one position-relative pb-50">
        <div class="container">
            <div class="row row-cols-2 row-cols-md-4 row-cols-lg-6 justify-content-center mt-20">

                <?php foreach ($serviceGroups as $service): ?>
                    <div class="col service-custom-card text-center mt-20 wow fadeInUp">
                        <a href="<?php $service['durel_hp_ss_link'] ? _e($service['durel_hp_ss_link'], 'durel') : _e('#', 'durel') ?>"
                            class="wrapper">
                            <?php if ($service['durel_hp_ss_icon']): ?>
                                <i class="<?php echo $service['durel_hp_ss_icon'] ?>"></i>
                                <?php
                            endif;
                            if ($service['durel_hp_ss_name']):
                                ?>
                                <div>
                                    <h4 class="title fw-500"> <?php _e($service['durel_hp_ss_name'], 'durel') ?> </h4>
                                </div>
                            <?php endif; ?>
                        </a>
                    </div>
                <?php endforeach; ?>


            </div>
        </div>
    </section>

<?php endif; ?>