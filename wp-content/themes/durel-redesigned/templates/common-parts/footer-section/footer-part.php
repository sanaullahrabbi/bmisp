<?php
/* Display Footer Section */
$contact_info = durel_get_contact_info();

function footer_menu($themeLocation, $menuClass = "", $walker = "")
{
    return wp_nav_menu(
        array(
            'theme_location' => $themeLocation,
            'menu' => '',
            'container' => '',
            'container_class' => '',
            'container_id' => '',
            'container_aria_label' => '',
            'menu_class' => $menuClass,
            'menu_id' => '',
            'echo' => true,
            'fallback_cb' => 'wp_page_menu',
            'before' => '',
            'after' => '',
            'link_before' => '',
            'link_after' => '',
            'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            'item_spacing' => 'preserve',
            'depth' => 0,
            'walker' => $walker,
        )
    );
}
?>

<footer class="footer-modern bg-gray-900 text-white py-16">
    <div class="container">
        <div class="row g-4 g-lg-8 footer-top">
            <!-- Company Info Column -->
            <div class="col-md-6 col-lg-3">
                <div class="footer-company-info">
                    <div class="company-logo d-flex align-items-center mb-4">
                        <?php
                        if (!empty($contact_info['header_logo']['url'])) {
                            echo '<div class="footer-logo">';
                            echo '<img src="' . esc_url($contact_info['header_logo']['url']) . '" alt="' . esc_attr($contact_info['company_name'] ?: get_bloginfo('name')) . '"  style="max-height: 48px; width: auto;">';
                            echo '</div>';
                        }
                        ?>
                        <span class="company-name">
                            <?php echo esc_html($contact_info['company_name'] ?: 'BMISP'); ?>
                        </span>
                    </div>
                    <p class="company-description text-gray-400">
                        <?php echo esc_html($contact_info['description'] ?: 'Your trusted partner for high-speed fiber internet connectivity across Bangladesh.'); ?>
                    </p>
                </div>
            </div>
            
            <!-- Services Column -->
            <div class="col-md-6 col-lg-3">
                <div class="footer-section">
                    <h3 class="footer-section-title">Services</h3>
                    <?php footer_menu(themeLocation: 'footer_menu_1', menuClass: 'footer-links') ?>
                </div>
            </div>
            
            <!-- Quick Links Column -->
            <div class="col-md-6 col-lg-3">
                <div class="footer-section">
                    <h3 class="footer-section-title">Quick Links</h3>
                    <?php footer_menu(themeLocation: 'footer_menu_2', menuClass: 'footer-links') ?>
                </div>
            </div>
            
            <!-- Contact Info Column -->
            <?php if ($contact_info['footer_show_contact']): ?>
            <div class="col-md-6 col-lg-3">
                <div class="footer-section">
                    <h3 class="footer-section-title">Contact Info</h3>
                    <div class="contact-info">
                        <?php if (!empty($contact_info['phone'])): ?>
                            <div class="contact-item d-flex align-items-center mb-3">
                                <div class="contact-icon me-3">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <a href="tel:<?php echo esc_attr($contact_info['phone']); ?>" class="contact-text text-decoration-none">
                                    <?php echo esc_html($contact_info['phone']); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                        
                        <?php if (!empty($contact_info['email'])): ?>
                            <div class="contact-item d-flex align-items-center mb-3">
                                <div class="contact-icon me-3">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <a href="mailto:<?php echo esc_attr($contact_info['email']); ?>" class="contact-text text-decoration-none">
                                    <?php echo esc_html($contact_info['email']); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                        
                        <?php if (!empty($contact_info['address'])): ?>
                            <div class="contact-item d-flex align-items-center">
                                <div class="contact-icon me-3">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <span class="contact-text">
                                    <?php echo nl2br(esc_html($contact_info['address'])); ?>
                                </span>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
        
        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="d-grid grid-cols-2 align-items-center">
                <p class="copyright-text">
                    <?php echo esc_html($contact_info['copyright'] ?: '© ' . date('Y') . ' ' . $contact_info['company_name'] . '. All rights reserved.'); ?>
                </p>
                
                <?php if ($contact_info['footer_show_social'] && !empty($contact_info['social_links'])): ?>
                <div class="w-100">
                    <div class="social-links">
                        <ul class="social-links-list d-flex justify-content-center justify-content-lg-end gap-3">
                            <?php foreach ($contact_info['social_links'] as $social):
                                if (!empty($social['durel_ss_social_link']) && !empty($social['durel_ss_social_icon'])):
                            ?>
                                <li>
                                    <a href="<?php echo esc_url($social['durel_ss_social_link']); ?>" 
                                       target="_blank" 
                                       class="social-link">
                                        <i class="<?php echo esc_attr($social['durel_ss_social_icon']); ?>"></i>
                                    </a>
                                </li>
                            <?php 
                                endif;
                            endforeach; ?>
                        </ul>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</footer>