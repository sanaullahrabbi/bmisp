<?php

/* Template Name: About Us */
get_header();
$get_options = get_option('durel_options');
?>

<!-- Page Header Section Start  -->
<?php 
$page_title = $get_options['durel_ap_page_title'] ?? get_the_title();
$page_subtitle = $get_options['durel_ap_page_subtitle'] ?? '';

// Custom breadcrumbs for About page
$breadcrumbs = array(
    array('title' => 'Home', 'url' => home_url('/')),
    array('title' => 'About Us', 'url' => false)
);

pageHeaderSection($page_title, $page_subtitle, $breadcrumbs);
?>
<!-- Page Header Section End  -->

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