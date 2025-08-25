<?php
/* Display Client Review Section */
$get_options = get_option('durel_options');

$clientReviewGroup = $get_options['durel_hp_cr_review_group'];
if ($clientReviewGroup):
    ?>

    <section class="feedback-section-three position-relative mt-40 mb-40">
        <div class="container position-relative">
            <div class="row">
                <div class="col-xl-6 col-lg-7 col-md-8 m-auto">
                    <?php if ($get_options['durel_hp_cr_section_title']): ?>
                        <div class=" text-center">
                            <img src="<?php echo get_template_directory_uri() ?>/assets/images/icon/icon_22.svg" alt=""
                                class="lazy-img me-auto ms-auto mb-10" />
                            <h2 class="fw-300 color-blue">
                                <?php _e($get_options['durel_hp_cr_section_title'], 'durel') ?>
                            </h2>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <div id="feedBack_carousel" class="carousel slide mt-30" data-bs-ride="carousel">
                <div class="row">
                    <div class="col-xxl-9 col-lg-8 col-md-10 m-auto">
                        <div class="carousel-inner text-center">
                            <?php
                            $i = 1;
                            foreach ($clientReviewGroup as $clientReview):
                                ?>
                                <div class="carousel-item <?php echo $i == 1 ? 'active' : '' ?>" data-bs-interval="1000000">
                                    <?php if ($clientReview['durel_hp_cr_text']): ?>
                                        <p>
                                            <?php _e($clientReview['durel_hp_cr_text'], 'durel') ?>
                                        </p>
                                    <?php endif;
                                    if ($clientReview['durel_hp_cr_name']):
                                        ?>
                                        <h4 class="d-inline-block position-relative name fw-500 text-lg">
                                            <?php _e($clientReview['durel_hp_cr_name'], 'durel') ?> <span
                                                class="fw-normal opacity-50">
                                                <?php _e($clientReview['durel_hp_cr_designation'], 'durel') ?> </span>
                                        </h4>
                                    <?php endif; ?>
                                </div>

                                <?php
                                $i++;
                            endforeach; ?>
                        </div>
                    </div>
                </div>

                <button class="carousel-control-prev carousel-btn" type="button" data-bs-target="#feedBack_carousel"
                    data-bs-slide="prev">
                    <i class="bi bi-chevron-left"></i>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next carousel-btn" type="button" data-bs-target="#feedBack_carousel"
                    data-bs-slide="next">
                    <i class="bi bi-chevron-right"></i>
                    <span class="visually-hidden">Next</span>
                </button>

                <div class="carousel-indicators">
                    <?php
                    $i = 1;
                    foreach ($clientReviewGroup as $clientReview):
                        if ($clientReview['durel_hp_cr_img']['url']):
                            ?>
                            <button type="button" data-bs-target="#feedBack_carousel" data-bs-slide-to="<?php echo $i - 1 ?>"
                                class="<?php echo $i == 1 ? 'active' : '' ?>"
                                aria-current="<?php echo $i == 1 ? 'true' : 'false' ?>" aria-label="Slide <?php echo $i ?>">
                                <img src="<?php echo $clientReview['durel_hp_cr_img']['url'] ?>" alt=""
                                    class="lazy-img rounded-circle" />
                            </button>

                            <?php
                        endif;
                        $i++;
                    endforeach; ?>


                </div>
            </div>
        </div>
    </section>

<?php endif; ?>