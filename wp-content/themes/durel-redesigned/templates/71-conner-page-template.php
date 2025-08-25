<?php

/* Template Name: 71 Conner */
get_header();
$get_options = get_option('durel_options');
?>

<!-- Page Banner Section Start  -->
<?php pageBannerSection(pageTitle: get_the_title()) ?>
<!-- Page Banner Section End  -->

<!-- 71 Conner Section Start  -->
<section class="blog-section bg-color pt-50 pb-50">
    <div class="container">
        <div class="row gx-xl-5">
            <?php

            $conner71Data = new WP_Query(customPostArrayData(postType: "71_corner", postPerPage: 9, order:"DESC" ));
            if ($conner71Data->have_posts()):
                while ($conner71Data->have_posts()):
                    $conner71Data->the_post();
                    ?>
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <article class="blog-meta-two box-layout mb-20">
                            <figure class="post-img m0">
                                <a href="<?php the_permalink() ?>" class="w-100 d-block">
                                    <?php the_post_thumbnail("", array("class" => "w-100 h-100")) ?>
                                </a>
                            </figure>
                            <div class="post-data">
                                <div class="date"><?php echo get_the_date('d M, Y') ?></div>
                                <a href="<?php the_permalink() ?>">
                                    <h4 class="tran3s blog-title">
                                        <?php
                                        $titleLength = strlen(get_the_title());
                                        if ($titleLength > 50):
                                            $shortTitle = substr(get_the_title(), 0, 50);
                                            echo $shortTitle . "....";

                                        else:
                                            echo get_the_title();
                                        endif;

                                        ?>
                                    </h4>
                                </a>

                            </div>
                        </article>
                    </div>

                    <?php
                    wp_reset_postdata();
                endwhile;
            else:
                _e("<div class='text-center'>
                <error>Data Not Found!!</error>
                </div>", "durel");
            endif; ?>
        </div>

        <!-- Pagination Section Start  -->
        <div class="pagination-section" id="pagination">
            <?php
            echo postPagination($conner71Data);
            ?>
        </div>
        <!-- Pagination Section End  -->

    </div>
</section>
<!-- 71 Conner Section End  -->

<?php
get_footer();
?>