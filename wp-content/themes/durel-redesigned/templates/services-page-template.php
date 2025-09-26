<?php

/* Template Name: Services */
get_header();
$get_options = get_option('durel_options');
?>

<!-- Page Header Section Start  -->
<?php 
$page_title = get_the_title();
$page_subtitle = 'Discover our comprehensive range of internet services designed to meet all your connectivity needs';

// Auto-generated breadcrumbs
pageHeaderSection($page_title, $page_subtitle);
?>
<!-- Page Header Section End  -->


<!-- Services Section Start -->
<?php echo get_template_part('/templates/services-page-parts/services-section'); ?>
<!-- Services Section End -->

<?php
get_footer();
?>
