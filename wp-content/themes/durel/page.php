<?php

/* Template Name: Support Team */
get_header();
$get_options = get_option('durel_options');
?>

<!-- Page Banner Section Start  -->
<?php pageBannerSection(pageTitle: get_the_title()) ?>
<!-- Page Banner Section End  -->

<!-- Page Section Start  -->
<section class="main-page-section">
    <div class="container position-relative mt-60 mb-60">
        <?php the_content() ?>
    </div>
</section>
<!-- Page Section End  -->

<?php
get_footer();
?>