<!DOCTYPE html>
<html <?php language_attributes() ?> class="no-js">

<head>
    <meta charset="<?php bloginfo('charset') ?>" />
    <!-- For IE -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="theme-color" content="#244034" />
    <meta name="msapplication-navbutton-color" content="#244034" />
    <meta name="apple-mobile-web-app-status-bar-style" content="#244034" />
    <?php wp_head(


    ); ?>
</head>

<body>
    <div class="main-page-wrapper">

        <!--  Loading Transition Start -->
        <?php 
        
        // echo get_template_part('/templates/common-parts/loading'); ?>
        <!--  Loading Transition End -->

        <!-- Contact Info Pop Up Start -->
        <?php echo get_template_part('/templates/common-parts/contact-pop-up'); ?>
        <!-- Contact Info Pop Up End -->

        <!--Mobile Menu Section Start  -->
        <?php echo get_template_part('/templates/common-parts/header-section/mobile-menu'); ?>
        <!--Mobile Menu Section End  -->

        <!--Main Menu Section Start  -->
        <?php echo get_template_part('/templates/common-parts/header-section/main-menu'); ?>
        <!-- Main Menu Section End  -->