<?php

get_header();
$get_options = get_option('durel_options');
?>

<!-- Page Banner Section Start  -->
<?php pageBannerSection(pageTitle: get_the_title()) ?>
<!-- Page Banner Section End  -->


<!-- Blog Details Section Start  -->
<section class="blog-section pt-50 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="blog-details-page pe-xxl-5 me-xxl-3">
                    <article class="blog-details-meta">
                        <h2 class="blog-heading"><?php the_title() ?></h2>
                        <div class="img-meta mb-15">
                            <?php the_post_thumbnail("", array("class" => "w-100 h-100")) ?>
                        </div>
                        <div class="text-justify">
                            <?php the_content() ?>
                        </div>

                    </article>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="blog-sidebar ps-xl-4 md-mt-60">

                    <?php get_search_form(); ?>

                    <div class="category-list mb-60 lg-mb-40">
                        <h3 class="sidebar-title"><?php _e('Category', 'durel') ?></h3>
                        <ul class="style-none">

                            <?php
                            $categories = get_the_category(get_the_ID());

                            if (!empty($categories)) {
                                foreach ($categories as $category) {
                                    ?>
                                    <li><a href="<?php echo get_category_link($category->term_id) ?>"><?php echo $category->name . " (" . $category->count . ")" ?>
                                        </a>
                                    </li>
                                    <?php
                                }
                            } else {
                                echo 'No categories found for this post.';
                            }
                            ?>
                        </ul>
                    </div>
                    <div class="sidebar-recent-news mb-60 lg-mb-40">
                        <h4 class="sidebar-title"><?php _e('Recent Post', 'durel') ?></h4>

                        <?php
                        $postData = new WP_Query(customPostArrayData(postType: "post", postPerPage: 3, order: "DESC"));
                        if ($postData->have_posts()):
                            while ($postData->have_posts()):
                                $postData->the_post();
                                ?>
                                <div class="news-block d-flex align-items-center pt-20 pb-20 border-top">
                                    <div class="img-box">
                                        <?php the_post_thumbnail() ?>
                                    </div>
                                    <div class="post ps-4">
                                        <h4 class="mb-5">
                                            <a href="<?php the_permalink() ?>" class="title tran3s">
                                                <?php the_title() ?></a>
                                        </h4>
                                        <div class="date"><?php echo get_the_date("d M, Y") ?></div>
                                    </div>
                                </div>

                                <?php
                                wp_reset_postdata();
                            endwhile;
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Details Section End  -->

<?php
get_footer();
?>