<?php
get_header();
?>

<!-- Page Header Section Start -->
<?php 
// Get page title and subtitle
$page_title = get_the_title();
$page_subtitle = '';

// Create breadcrumbs
$breadcrumbs = array(
    array('title' => 'Home', 'url' => home_url('/')),
    array('title' => $page_title, 'url' => false)
);

// Call the page header function
pageHeaderSection($page_title, $page_subtitle, $breadcrumbs);
?>
<!-- Page Header Section End -->

<!-- Page Content Section Start -->
<section class="page-content-section">
    <div class="page-content-container">
        <div class="page-content">
            <?php
            while (have_posts()) :
                the_post();
                the_content();
            endwhile;
            ?>
        </div>
    </div>
</section>
<!-- Page Content Section End -->

<?php
get_footer();
?>