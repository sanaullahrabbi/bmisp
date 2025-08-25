<?php

/* Template Name: Image Gallery */
get_header();
$get_options = get_option('durel_options');
?>

<!-- Page Banner Section Start  -->
<?php pageBannerSection(pageTitle: get_the_title()) ?>
<!-- Page Banner Section End  -->


<!-- Image Gallery Section Start  -->
<section class="gallery-section" id="gallery">
    <div class="container">

        <div class="button-group filter-button-group">
            <button class="active" data-filter="*">All</button>
            <?php
            $customCategories = get_terms(
                array(
                    'taxonomy' => 'image_categories',
                    'hide_empty' => false,
                    'order' => "ASC"
                )
            );
            if (!empty($customCategories) && !is_wp_error($customCategories)) {
                foreach ($customCategories as $customCategory) {
                    ?>
                    <button data-filter=".<?php echo $customCategory->slug ?>"><?php echo $customCategory->name ?></button>
                    <?php
                }
            }

            ?>
        </div>


        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 grid">

            <?php
            $imageGallery = new WP_Query(customPostArrayData(postType: "image_gallery", postPerPage: 8, ));
            if ($imageGallery->have_posts()):
                while ($imageGallery->have_posts()):
                    $imageGallery->the_post();

                    $postCategories = get_the_terms(get_the_ID(), 'image_categories');
                    $categoryMarge = [];
                    foreach ($postCategories as $postCategory):
                        array_push($categoryMarge, $postCategory->slug);
                    endforeach;
                    $arrayToStringCategories = join(" ", $categoryMarge);
                    $perPostCategories = $arrayToStringCategories;
                    ?>

                    <div class="col mb-4 element-item <?php echo $perPostCategories ?>">
                        <div class="img-box">
                            <a href="<?php the_post_thumbnail_url() ?>" class="image-link">
                                <?php the_post_thumbnail("", array("class" => "img-fluid")) ?>
                            </a>
                        </div>
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
            echo postPagination($imageGallery);
            ?>
        </div>
        <!-- Pagination Section End  -->
    </div>
</section>
<!-- Image Gallery Section End  -->

<?php
get_footer();
?>