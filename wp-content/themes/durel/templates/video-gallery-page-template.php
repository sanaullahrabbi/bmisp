<?php

/* Template Name: Video Gallery */
get_header();
$get_options = get_option('durel_options');
?>

<!-- Page Banner Section Start  -->
<?php pageBannerSection(pageTitle: get_the_title()) ?>
<!-- Page Banner Section End  -->


<!-- Video Gallery Section Start  -->
<section class="video-gallery" id="videoGallery">
    <div class="container">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
            <?php
            $videoGallery = new WP_Query(customPostArrayData(postType: "video_gallery", postPerPage: 9, order: "DESC"));
            if ($videoGallery->have_posts()):
                while ($videoGallery->have_posts()):
                    $videoGallery->the_post();
                    ?>

                    <div class="col text-center mb-4">
                        <a href="<?php echo get_field('video_id') ? 'https://www.youtube.com/watch?v=' . get_field('video_id') : '#' ?>"
                            class="mediabox">
                            <div class="img-box">
                                <?php the_post_thumbnail() ?>
                                <li>
                                    <i class="fas fa-play"></i>
                                </li>
                            </div>
                        </a>
                    </div>
                    <?php
                    wp_reset_postdata();
                endwhile;
            endif;
            ?>

        </div>

        <!-- Pagination Section Start  -->
        <div class="pagination-section" id="pagination">
            <?php
            echo postPagination($videoGallery);
            ?>
        </div>
        <!-- Pagination Section End  -->
    </div>
</section>
<!-- Video Gallery Section End  -->

<?php
get_footer();
?>