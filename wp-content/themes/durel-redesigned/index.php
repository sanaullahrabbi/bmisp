<?php

get_header();
$get_options = get_option('durel_options');
?>

<!-- Page Banner Section Start  -->
<?php pageBannerSection(pageTitle: "Blog") ?>
<!-- Page Banner Section End  -->


<!-- Blog Section Start -->
<section class="blog-section bg-color pt-50 pb-50">
    <div class="container">
        <div class="row gx-xl-5">
            <?php
            if (have_posts()):
                while (have_posts()):
                    the_post();
                    ?>
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <article class=" blog-meta-two box-layout mb-20">
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
                ?>
                <!-- Pagination Section Start  -->
                <div class="pagination-section" id="pagination">
                    <?php the_posts_pagination(
                        array(
                            "prev_text" => __("&lt;", 'durel'),
                            "next_text" => __("&gt;", 'durel'),
                        )
                    ); ?>
                </div>
                <!-- Pagination Section End  -->
                <?php
            else:
                _e("<div class='text-center'>
                <error>Data Not Found!!</error>
                </div>", "durel");
            endif; ?>
        </div>
    </div>
</section>
<!-- Blog Section End -->

<?php
get_footer();
?>