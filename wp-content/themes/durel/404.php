<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="keywords" content="Digital marketing agency, Digital marketing company, Digital marketing services">
    <meta name="description" content="Jobi is a beautiful website template designed for job board websites.">
    <meta property="og:site_name" content="Jano">
    <meta property="og:url" content="https://creativegigstf.com/">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Jobi - Responsive Job Board HTML Template">
    <meta name='og:image' content='images/assets/ogg.png'>
    <!-- For IE -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- For Resposive Device -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- For Window Tab Color -->
    <!-- Chrome, Firefox OS and Opera -->
    <meta name="theme-color" content="#244034">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#244034">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#244034">


    <?php wp_head() ?>
</head>

<body>
    <div class="main-page-wrapper">
        <!-- ===================================================
                Loading Transition
            ==================================================== -->
        <?php echo get_template_part('/templates/common-parts/loading'); ?>

        <!-- Error Page -->
        <div class="error-page d-flex align-items-center justify-content-center">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-5 col-md-6 ms-auto order-md-last">
                        <div class="error">404</div>
                        <h2><?php _e('Page Not Found !!!', 'durel') ?></h2>
                        <p class="text-md"><?php _e('Can not find what you need? Take a moment and do a search below or start from
                            our Homepage.', 'durel') ?></p>
                        <a href="<?php echo home_url() ?>"
                            class="btn-one w-100 d-flex align-items-center justify-content-between mt-30">
                            <span><?php _e('GO BACK', 'durel') ?></span>
                            <img src="<?php echo get_template_directory_uri() ?>/assets/images/icon/icon_61.svg" alt="">
                        </a>
                    </div>
                    <div class="col-md-6 order-md-first">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/images/assets/404.svg" alt=""
                            class="sm-mt-60">
                    </div>
                </div>
            </div>
        </div>


        <?php wp_footer() ?>
    </div>
</body>

</html>