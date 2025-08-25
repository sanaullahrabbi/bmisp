<?php

/* Template Name: About Us */
get_header();
$get_options = get_option('durel_options');
?>

<!-- Page Banner Section Start  -->
<?php pageBannerSection(pageTitle: get_the_title()) ?>
<!-- Page Banner Section End  -->

<!-- Mission & Vision Section Start  -->
<?php echo get_template_part('/templates/about-page-parts/mission-vision-section'); ?>
<!-- Mission & Vision Section End  -->


<!-- Team Member Section Start  -->
<?php echo get_template_part('/templates/support-team-page-parts/support-team-section-slider'); ?>
<!-- Team Member Section End  -->


<!-- History Section Start  -->
<?php echo get_template_part('/templates/about-page-parts/history-section'); ?>
<!-- History Section End  -->



<?php
get_footer();
?>