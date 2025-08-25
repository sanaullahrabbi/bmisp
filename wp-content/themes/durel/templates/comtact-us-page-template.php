<?php

/* Template Name: Contact Us */
get_header();
$get_options = get_option('durel_options');
?>

<!-- Page Banner Section Start  -->
<?php pageBannerSection(pageTitle: get_the_title()) ?>
<!-- Page Banner Section End  -->

<!-- Contact Form Start  -->
<section class="contact-us-section mt-40 mb-40">
    <div class="container">
        <div class="row row-cols-1 row-cols-lg-2">
            <div class="col">
                <div class="form-style-one wow fadeInUp">
                    <div id="contact-form">
                        <?php echo do_shortcode('[contact-form-7 id="23f1a71" title="Contact Us Form"]') ?>
                    </div>
                </div>
            </div>

            <?php if ($get_options['durel_ss_cu_img']['url']): ?>
                <div class="col">
                    <div class="img-box">
                        <img class="img-fluid w-100 h-100" src="<?php echo $get_options['durel_ss_cu_img']['url'] ?>"
                            alt="">
                    </div>
                </div>
            <?php endif; ?>
        </div>

    </div>
</section>
<!-- Contact Form End  -->

<!-- Contact Info Start -->
<section class="contact-info-section pt-40 pb-40">
    <div class="row">
        <div class="col-xl-10 m-auto">
            <div class="row">
                <?php if ($get_options['durel_ss_cu_address']): ?>
                    <div class="col-md-4">
                        <div class="address-block-one text-center mb-40 wow fadeInUp">
                            <i class="fas fa-map-marker-alt"></i>
                            <h5 class="title"><?php _e('Our Address', 'durel') ?></h5>
                            <p><?php _e($get_options['durel_ss_cu_address'], 'durel') ?></p>
                        </div>
                    </div>
                <?php endif;
                if ($get_options['durel_ss_cu_email']):
                    ?>
                    <div class="col-md-4">
                        <div class="address-block-one text-center mb-40 wow fadeInUp">
                            <i class="fas fa-envelope"></i>
                            <h5 class="title"><?php _e('Contact Info', 'durel') ?></h5>
                            <p>
                                <a
                                    href="mailto:<?php echo $get_options['durel_ss_cu_email'] ?>"><?php _e($get_options['durel_ss_cu_email'], 'durel') ?></a>
                            </p>
                        </div>
                    </div>
                    <?php
                endif;
                if ($get_options['durel_ss_cu_number']):
                    ?>
                    <div class="col-md-4">
                        <div class="address-block-one text-center mb-40 wow fadeInUp">
                            <i class="fas fa-phone-alt"></i>
                            <h5 class="title"><?php _e('Call Support', 'durel') ?></h5>
                            <p>
                                <a
                                    href="tel:<?php echo $get_options['durel_ss_cu_number'] ?>"><?php echo $get_options['durel_ss_cu_number'] ?></a>
                            </p>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<!-- Contact Info End -->

<!-- Google Map Start -->
<?php if ($get_options['durel_ss_cu_google_map']): ?>
    <div class="google-map-section">
        <iframe src="<?php echo $get_options['durel_ss_cu_google_map'] ?>" width="100%" height="450" style="border:0;"
            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <?php
endif; ?>
<!-- Google Map End -->



<?php
get_footer();
?>