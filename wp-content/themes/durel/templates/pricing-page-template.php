<?php

/* Template Name: Pricing */
get_header();
$get_options = get_option('durel_options');
?>

<!-- Page Banner Section Start  -->
<?php pageBannerSection(pageTitle: get_the_title()) ?>
<!-- Page Banner Section End  -->


<!-- Pricing Section Start -->
<?php echo get_template_part('/templates/pricing-page-parts/pricing-section'); ?>
<!-- Pricing Section End -->

<?php
get_footer();
?>