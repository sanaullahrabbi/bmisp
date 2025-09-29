<?php
/* Template Name: Hosting Page */
get_header();
?>

<!-- Page Header Section Start -->
<?php 
$get_options = get_option('durel_options');
$page_title = $get_options['durel_h_section_title'] ?? 'Hosting Solutions';
$page_subtitle = $get_options['durel_h_section_subtitle'] ?? 'Professional hosting services for your online presence';

// Custom breadcrumbs for hosting page
$breadcrumbs = array(
    array('title' => 'Home', 'url' => home_url('/')),
    array('title' => 'Hosting', 'url' => false)
);

pageHeaderSection($page_title, $page_subtitle, $breadcrumbs);
?>
<!-- Page Header Section End -->

<!-- Hosting Services Section Start -->
<?php echo get_template_part('/templates/hosting-page-parts/hosting-section'); ?>
<!-- Hosting Services Section End -->

<?php
get_footer();
?>
