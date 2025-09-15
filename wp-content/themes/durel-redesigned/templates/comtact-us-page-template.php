<?php

/* Template Name: Contact Us */
get_header();
$contact_info = durel_get_contact_info();
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

            <?php if (!empty($contact_info['header_logo']['url'])): ?>
                <div class="col">
                    <div class="img-box">
                        <img class="img-fluid w-100 h-100" src="<?php echo esc_url($contact_info['header_logo']['url']); ?>"
                            alt="<?php echo esc_attr($contact_info['company_name'] ?: 'Contact Us'); ?>">
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
                <?php if (!empty($contact_info['address'])): ?>
                    <div class="col-md-4">
                        <div class="address-block-one text-center mb-40 wow fadeInUp">
                            <i class="fas fa-map-marker-alt"></i>
                            <h5 class="title"><?php _e('Our Address', 'durel') ?></h5>
                            <p><?php echo nl2br(esc_html($contact_info['address'])); ?></p>
                        </div>
                    </div>
                <?php endif;
                if (!empty($contact_info['email'])):
                    ?>
                    <div class="col-md-4">
                        <div class="address-block-one text-center mb-40 wow fadeInUp">
                            <i class="fas fa-envelope"></i>
                            <h5 class="title"><?php _e('Contact Info', 'durel') ?></h5>
                            <p>
                                <a href="mailto:<?php echo esc_attr($contact_info['email']); ?>"><?php echo esc_html($contact_info['email']); ?></a>
                            </p>
                        </div>
                    </div>
                    <?php
                endif;
                if (!empty($contact_info['phone'])):
                    ?>
                    <div class="col-md-4">
                        <div class="address-block-one text-center mb-40 wow fadeInUp">
                            <i class="fas fa-phone-alt"></i>
                            <h5 class="title"><?php _e('Call Support', 'durel') ?></h5>
                            <p>
                                <a href="tel:<?php echo esc_attr($contact_info['phone']); ?>"><?php echo esc_html($contact_info['phone']); ?></a>
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
<?php if (!empty($contact_info['google_map_link'])): ?>
    <div class="google-map-section">
        <iframe src="<?php echo esc_url($contact_info['google_map_link']); ?>" width="100%" height="450" style="border:0;"
            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
<?php endif; ?>
<!-- Google Map End -->



<?php
get_footer();
?>