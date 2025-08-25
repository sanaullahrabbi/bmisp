<?php
/* Display Support Team Member Section */
?>
<section class="expert-section-one position-relative mt-40 mb-40">
    <div class="container position-relative">
        <div class="row">
            <div class="col-md-7">
                <div class="title-one text-center text-md-start mb-65 md-mb-50">
                    <h2>
                        <span class="position-relative"><?php _e('Talented Team Member', 'durel') ?>
                            <img src="<?php echo get_template_directory_uri() ?> /assets/images/shape/shape_04.svg"
                                alt="" class="lazy-img shapes shape" /></span>

                    </h2>
                </div>
            </div>
        </div>

        <div class="expert-slider-one">
            <?php

            $videoGallery = new WP_Query(customPostArrayData(postType: "support_member", postPerPage: -1, ));
            if ($videoGallery->have_posts()):
                while ($videoGallery->have_posts()):
                    $videoGallery->the_post();
                    ?>

                    <div class="item">
                        <div class="card-style-three text-center">
                            <div class="img-meta mb-40 lg-mb-20">
                                <?php the_post_thumbnail() ?>
                            </div>
                            <h4 class="name text-md fw-500"><?php the_title(); ?></h4>
                            <?php if (get_field('designation')): ?>
                                <div class="post"><?php echo get_field('designation') ?></div>
                            <?php endif; ?>
                        </div>

                    </div>

                    <?php
                    wp_reset_postdata();
                endwhile;
            endif;
            ?>

        </div>
        <ul class="slider-arrows slick-arrow-one d-flex justify-content-center style-none sm-mt-30">
            <li class="prev_a slick-arrow"><i class="bi bi-arrow-left"></i></li>
            <li class="next_a slick-arrow">
                <i class="bi bi-arrow-right"></i>
            </li>
        </ul>
    </div>
</section>