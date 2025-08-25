<?php
/* Display Footer Section */
$get_options = get_option('durel_options');

function footer_menu($themeLocation, $menuClass = "", $walker = "")
{
    return wp_nav_menu(
        array(
            'theme_location' => $themeLocation,
            'menu' => '',
            'container' => '',
            'container_class' => '',
            'container_id' => '',
            'container_aria_label' => '',
            'menu_class' => $menuClass,
            'menu_id' => '',
            'echo' => true,
            'fallback_cb' => 'wp_page_menu',
            'before' => '',
            'after' => '',
            'link_before' => '',
            'link_after' => '',
            'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            'item_spacing' => 'preserve',
            'depth' => 0,
            'walker' => $walker,
        )
    );
}
?>
<section class="footer-with-bg">
    <div class="footer-one">
        <div class="container">
            <div class="inner-wrapper">
                <div class="row row-cols-2 row-cols-lg-5">
                    <div class="col col-lg-2 mb-20">
                        <h5 class="footer-title"><?php _e('Company', 'durel') ?></h5>
                        <?php footer_menu(themeLocation: 'footer_menu_1', menuClass: 'footer-nav-link style-none') ?>

                    </div>
                    <div class="col col-lg-2 mb-20">
                        <h5 class="footer-title"><?php _e('Support', 'durel') ?></h5>
                        <?php footer_menu(themeLocation: 'footer_menu_2', menuClass: 'footer-nav-link style-none') ?>

                    </div>
                    <div class="col col-lg-2 mb-20">
                        <h5 class="footer-title"><?php _e('Quick Links', 'durel') ?></h5>
                        <?php footer_menu(themeLocation: 'footer_menu_3', menuClass: 'footer-nav-link style-none') ?>

                    </div>
                    <div class="col col-lg-2 mb-20">
                        <h5 class="footer-title"><?php _e('Legal', 'durel') ?></h5>
                        <?php footer_menu(themeLocation: 'footer_menu_4', menuClass: 'footer-nav-link style-none') ?>

                    </div>
                    <div class="col-12 col-lg-4 mb-20 footer-newsletter">
                        <h5 class="footer-title"><?php _e('Office Address', 'durel') ?></h5>
                        <?php if ($get_options['durel_ss_cu_address']): ?>
                            <p class="mb-15"><i class="fas fa-map-marker-alt"></i>
                                <?php _e($get_options['durel_ss_cu_address'], 'durel') ?></p>
                        <?php endif; ?>
                        <p><?php _e('Subscribe then get update regularly', 'durel') ?></p>
                        <div class="subscribe-form">
                            <?php echo do_shortcode('[contact-form-7 id="fa25b8a" title="Subscribe Form"]') ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.inner-wrapper -->
        </div>

        <div class="footer-bottom-section">
            <div class="container">
                <div class="text-center text-lg-start d-lg-flex align-items-center justify-content-between">
                    <div>
                        <p class="mb-lg-0 copyright-text">&copy;
                            <?php echo date('Y') . " " . $get_options['durel_ss_hf_copyright_text'] ?>
                        </p>
                    </div>

                    <div class="social-menu">

                        <?php
                        $socialLinks = $get_options['durel_ss_cu_social_link_group'];

                        if ($socialLinks):
                            ?>
                            <ul class="social-link">
                                <?php foreach ($socialLinks as $socialLink):
                                    if ($socialLink):
                                        ?>
                                        <li>
                                            <a target="_blank" href="<?php echo $socialLink['durel_ss_cu_social_link'] ?>">
                                                <i class="<?php echo $socialLink['durel_ss_cu_social_icon'] ?>"></i>
                                            </a>
                                        </li>
                                        <?php
                                    endif;
                                endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                    <div>
                        <p class="mb-lg-0 copyright-text">
                            <?php _e('Made With ❤ by', 'durel') ?>
                            <a target="_blank" href="https://deelko.com/"><?php _e('Deelko', 'durel') ?></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>