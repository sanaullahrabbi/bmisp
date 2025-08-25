<?php

get_header();
$get_options = get_option('durel_options');
$categoryData = get_queried_object(); // get all data of category.
?>

<!-- Page Banner Section Start  -->
<?php

pageBannerSection(pageTitle: $categoryData->name) ?>
<!-- Page Banner Section End  -->

<!-- Service Details Section Start  -->
<section class="service-details-section">
    <div class="container">
        <div class="row row-cols-1 row-lg-2">
            <div class="col-lg-3 mb-20">
                <ul class="service-list">
                    <?php
                    $customCategories = get_terms(
                        array(
                            'taxonomy' => 'service_categories',
                            'hide_empty' => false,
                            'order' => "ASC"
                        )
                    );

                    if ($customCategories):
                        $i = 1;
                        foreach ($customCategories as $customCategory):
                            ?>
                            <li><a class="<?php echo $categoryData->term_id === $customCategory->term_id ? 'active' : '' ?>"
                                    href="<?php echo get_category_link($customCategory->term_id) ?>"><?php echo $customCategory->name ?></a>
                            </li>
                            <?php
                            $i++;
                        endforeach;
                    endif;
                    ?>



                </ul>
            </div>

            <div class="col-lg-9">
                <div class="service-details-body">
                    <div class="img-box">
                        <?php the_post_thumbnail() ?>
                    </div>
                    <h3 class="service-heading mt-20"><?php the_title() ?></h3>
                    <?php the_content() ?>
                </div>

                <div class="mt-30">
                    <h3><?php _e('Frequently Asked Question', 'durel') ?></h3>
                    <div class="accordion" id="accordionExample">

                        <?php
                        if (have_rows('faq_group')):
                            $i = 1;
                            while (have_rows('faq_group')):
                                the_row();

                                ?>
                                <div class="accordion-item">
                                    <?php
                                    if (get_sub_field('faq_question')):
                                        ?>
                                        <h3 class="accordion-header" id="heading<?php echo $i ?>">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapse<?php echo $i ?>"
                                                aria-expanded="<?php echo $i === 1 ? 'true' : 'false' ?>"
                                                aria-controls="collapse<?php echo $i ?>">
                                                <?php _e(get_sub_field('faq_question'), 'durel') ?>
                                            </button>
                                        </h3>
                                        <?php
                                    endif;
                                    if (get_sub_field('faq_answer')):
                                        ?>
                                        <div id="collapse<?php echo $i ?>"
                                            class="accordion-collapse collapse <?php echo $i === 1 ? 'show' : '' ?>"
                                            aria-labelledby="heading<?php echo $i ?>" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <?php _e(get_sub_field('faq_answer'), 'durel') ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <?php
                                $i++;
                            endwhile;

                        endif;
                        ?>




                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Service Details Section End  -->

<?php
get_footer();
?>