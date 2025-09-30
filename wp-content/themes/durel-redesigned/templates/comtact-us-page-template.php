<?php

/* Template Name: Contact Us */
get_header();
$contact_info = durel_get_contact_info();
?>

<!-- Page Header Section Start  -->
<?php 
$page_title = get_the_title();
$page_subtitle = 'Get in touch with us for any inquiries or support';

// Custom breadcrumbs for Contact page
$breadcrumbs = array(
    array('title' => 'Home', 'url' => home_url('/')),
    array('title' => 'Contact Us', 'url' => false)
);

pageHeaderSection($page_title, $page_subtitle, $breadcrumbs);
?>
<!-- Page Header Section End  -->

<!-- Contact Form Section Start -->
<section class="contact-form-section">
    <div class="contact-form-container">
        <div class="contact-form-grid">
            <!-- Contact Form -->
            <div class="contact-form-wrapper">
                <div class="contact-form-header">
                    <h2 class="contact-form-title">Send us a Message</h2>
                    <p class="contact-form-subtitle">We'll get back to you within 24 hours</p>
                </div>
                
                <div class="contact-form-content">
                    <?php echo do_shortcode('[contact-form-7 id="23f1a71" title="Contact Us Form"]') ?>
                </div>
            </div>

            <!-- Contact Information -->
            <div class="contact-info-wrapper">
                <div class="contact-info-header">
                    <h2 class="contact-info-title">Get in Touch</h2>
                    <p class="contact-info-subtitle">Multiple ways to reach us</p>
                </div>

                <div class="contact-info-cards">
                    <?php if (!empty($contact_info['address'])): ?>
                    <div class="contact-info-card">
                        <div class="contact-info-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
                                <circle cx="12" cy="10" r="3"/>
                            </svg>
                        </div>
                        <div class="contact-info-content">
                            <h3 class="contact-info-card-title">Our Address</h3>
                            <p class="contact-info-card-text"><?php echo nl2br(esc_html($contact_info['address'])); ?></p>
                        </div>
                    </div>
                    <?php endif; ?>

                    <?php if (!empty($contact_info['email'])): ?>
                    <div class="contact-info-card">
                        <div class="contact-info-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                                <polyline points="22,6 12,13 2,6"/>
                            </svg>
                        </div>
                        <div class="contact-info-content">
                            <h3 class="contact-info-card-title">Email Us</h3>
                            <p class="contact-info-card-text">
                                <a href="mailto:<?php echo esc_attr($contact_info['email']); ?>" class="contact-info-link">
                                    <?php echo esc_html($contact_info['email']); ?>
                                </a>
                            </p>
                        </div>
                    </div>
                    <?php endif; ?>

                    <?php if (!empty($contact_info['phone'])): ?>
                    <div class="contact-info-card">
                        <div class="contact-info-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                            </svg>
                        </div>
                        <div class="contact-info-content">
                            <h3 class="contact-info-card-title">Call Us</h3>
                            <p class="contact-info-card-text">
                                <a href="tel:<?php echo esc_attr($contact_info['phone']); ?>" class="contact-info-link">
                                    <?php echo esc_html($contact_info['phone']); ?>
                                </a>
                            </p>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>

                <!-- Company Logo -->
                <?php if (!empty($contact_info['header_logo']['url'])): ?>
                <div class="contact-logo-wrapper">
                    <img src="<?php echo esc_url($contact_info['header_logo']['url']); ?>" 
                         alt="<?php echo esc_attr($contact_info['company_name'] ?: 'Company Logo'); ?>" 
                         class="contact-logo">
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<!-- Contact Form Section End -->

<!-- Google Map Section Start -->
<?php if (!empty($contact_info['google_map_link'])): ?>
<section class="google-map-section">
    <div class="google-map-container">
        <div class="google-map-header">
            <h2 class="google-map-title">Find Us</h2>
            <p class="google-map-subtitle">Visit our office location</p>
        </div>
        <div class="google-map-wrapper">
            <iframe src="<?php echo esc_url($contact_info['google_map_link']); ?>" 
                    width="100%" 
                    height="450" 
                    style="border:0;"
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade"
                    class="google-map-iframe">
            </iframe>
        </div>
    </div>
</section>
<?php endif; ?>
<!-- Google Map Section End -->



<?php
get_footer();
?>
?>
