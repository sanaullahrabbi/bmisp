<?php

/* Template Name: FAQ */
get_header();
$get_options = get_option('durel_options');
?>

<!-- Page Banner Section Start  -->
<?php pageBannerSection(pageTitle: get_the_title()) ?>
<!-- Page Banner Section End  -->


<?php
$faqGroups = $get_options['durel_faq_groups'];
if ($faqGroups):
    ?>
    <!-- FAQ Section Start  -->
    <section class="faq-section position-relative">
        <div class="container">
            <div class="bg-wrapper mt-50 mb-50">
                <div class="accordion accordion-style-two" id="accordion<?php echo $i; ?>">
                    <?php
                    $i = 1;
                    foreach ($faqGroups as $faq): ?>
                        <div class="accordion-item">
                            <div class="accordion-header" id="Fheading<?php echo $i ?>">
                                <?php if ($faq['durel_faq_question']): ?>
                                    <button class="accordion-button <?php echo $i === 1 ? '' : 'collapsed' ?>" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#Fcollapse<?php echo $i ?>" aria-expanded="false"
                                        aria-controls="Fcollapse<?php echo $i ?>">
                                        <?php _e($faq['durel_faq_question'], 'durel') ?>
                                    </button>
                                <?php endif; ?>
                            </div>
                            <?php if ($faq['durel_faq_answer']): ?>
                                <div id="Fcollapse<?php echo $i ?>"
                                    class="accordion-collapse collapse <?php echo $i === 1 ? 'show' : '' ?>"
                                    aria-labelledby="Fheading<?php echo $i ?>" data-bs-parent="#accordionTwo">
                                    <div class="accordion-body">
                                        <p>
                                            <?php _e($faq['durel_faq_answer'], 'durel') ?>
                                        </p>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                        <?php
                        $i++;
                    endforeach; ?>
                </div>
            </div>
        </div>
    </section>
    <!-- FAQ Section End  -->
<?php endif; ?>

<?php
get_footer();
?>