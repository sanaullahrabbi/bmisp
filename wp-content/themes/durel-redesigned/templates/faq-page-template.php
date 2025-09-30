<?php

/* Template Name: FAQ */
get_header();
$get_options = get_option('durel_options');
?>

<!-- Page Header Section Start  -->
<?php 
$get_options = get_option('durel_options');
$page_title = $get_options['durel_faq_page_title'] ?: get_the_title();
$page_subtitle = $get_options['durel_faq_page_subtitle'] ?: 'Find answers to commonly asked questions';

// Custom breadcrumbs for FAQ page
$breadcrumbs = array(
    array('title' => 'Home', 'url' => home_url('/')),
    array('title' => 'FAQ', 'url' => false)
);

pageHeaderSection($page_title, $page_subtitle, $breadcrumbs);
?>
<!-- Page Header Section End  -->

<?php
$faqGroups = $get_options['durel_faq_groups'];
if ($faqGroups):
    ?>
    <!-- FAQ Section Start  -->
    <section class="faq-section">
        <div class="faq-container">
            <div class="faq-accordion">
                <?php
                $i = 1;
                foreach ($faqGroups as $faq): ?>
                    <div class="faq-item">
                        <div class="faq-question">
                            <button class="faq-question-button" 
                                    type="button"
                                    data-bs-toggle="collapse" 
                                    data-bs-target="#faq-collapse-<?php echo $i ?>" 
                                    aria-expanded="<?php echo $i === 1 ? 'true' : 'false' ?>"
                                    aria-controls="faq-collapse-<?php echo $i ?>">
                                <span class="faq-question-text">
                                    <?php echo esc_html($faq['durel_faq_question']); ?>
                                </span>
                                <span class="faq-question-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <polyline points="6,9 12,15 18,9"/>
                                    </svg>
                                </span>
                            </button>
                        </div>
                        
                        <div id="faq-collapse-<?php echo $i ?>"
                             class="faq-answer collapse <?php echo $i === 1 ? 'show' : '' ?>"
                             aria-labelledby="faq-question-<?php echo $i ?>"
                             data-bs-parent=".faq-accordion">
                            <div class="faq-answer-content">
                                <p class="faq-answer-text">
                                    <?php echo wp_kses_post($faq['durel_faq_answer']); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <?php
                    $i++;
                endforeach; ?>
            </div>
            
            <!-- Contact CTA -->
            <div class="faq-contact-cta">
                <div class="faq-contact-content">
                    <h3 class="faq-contact-title">Still have questions?</h3>
                    <p class="faq-contact-text">Can't find what you're looking for? Our support team is here to help.</p>
                    <div class="faq-contact-buttons">
                        <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="faq-contact-btn faq-contact-btn-primary">
                            Contact Support
                        </a>
                        <a href="tel:<?php echo esc_attr(durel_get_contact_info('phone')); ?>" class="faq-contact-btn faq-contact-btn-secondary">
                            Call Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- FAQ Section End  -->
<?php else: ?>
    <!-- No FAQ Content -->
    <section class="faq-section">
        <div class="faq-container">
            <div class="faq-empty-state">
                <div class="faq-empty-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"/>
                        <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/>
                        <line x1="12" y1="17" x2="12.01" y2="17"/>
                    </svg>
                </div>
                <h3 class="faq-empty-title">No FAQ Available</h3>
                <p class="faq-empty-text">FAQ content will be added soon. Please check back later or contact us for assistance.</p>
                <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="faq-empty-btn">
                    Contact Us
                </a>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php
get_footer();
?>