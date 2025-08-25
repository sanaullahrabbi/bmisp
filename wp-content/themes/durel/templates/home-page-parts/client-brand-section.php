<?php
/* Display Client Brand Section */
$get_options = get_option('durel_options');

$clientLogoGroup = $get_options['durel_hp_cl_logo_group'];
if ($clientLogoGroup):
    ?>

    <section class="client-logo-section">
        <div class="container">
            <div class="autoplay client-slider">
                <?php foreach ($clientLogoGroup as $clientLogo): ?>

                    <a
                        href="<?php $clientLogo['durel_hp_cl_link'] ? _e($clientLogo['durel_hp_cl_link'], 'durel') : _e('#', 'durel') ?>">
                        <div class="client-logo-body">
                            <?php if ($clientLogo['durel_hp_cl_logo_img']['url']): ?>
                                <div class="img-box">
                                    <img class="img-fluid" src="<?php echo $clientLogo['durel_hp_cl_logo_img']['url'] ?>" alt="">
                                </div>
                            <?php endif; ?>
                        </div>
                    </a>
                <?php endforeach ?>
            </div>
        </div>
    </section>
<?php endif; ?>