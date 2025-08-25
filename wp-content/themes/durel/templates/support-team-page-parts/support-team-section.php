<?php
/* Display Support Team Member Section */
?>


<div class="row row-cols-2 row-cols-md-3 row-cols-lg-4">
    <?php
    $supportTeamMember = new WP_Query(customPostArrayData(postType: "support_member", postPerPage: 12, ));
    if ($supportTeamMember->have_posts()):
        while ($supportTeamMember->have_posts()):
            $supportTeamMember->the_post();
            ?>
            <div class="col mb-35 item">
                <div class="card-style-three text-center">
                    <div class="img-meta mb-10">
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

<!-- Pagination Section Start  -->
<div class="pagination-section" id="pagination">
    <?php
    echo postPagination($supportTeamMember);
    ?>
</div>
<!-- Pagination Section End  -->