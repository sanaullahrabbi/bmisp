<?php

/* Template Name: Support Team */
get_header();
$get_options = get_option('durel_options');
?>

<!-- Page Banner Section Start  -->
<?php pageBannerSection(pageTitle: get_the_title()) ?>
<!-- Page Banner Section End  -->

<!-- Support Member Section Start  -->
<section class="expert-section-one position-relative mt-40 mb-40">
    <div class="container position-relative">
        <?php echo get_template_part('/templates/support-team-page-parts/support-team-section'); ?>
    </div>
</section>
<!-- Support Member Section End  -->
<?php
get_footer();
?>