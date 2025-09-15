<?php
/* Display Mobile Menu */
$get_options = get_option('durel_options');
?>

<header class="theme-main-menu-custom">
    <div class="inner-content position-relative">
        <div class="top-header">
            <div class="d-flex align-items-center justify-content-between d-lg-block">
                <?php if ($get_options['durel_ss_hf_logo']['url']): ?>
                    <div class="logo order-lg-0 text-lg-center">
                        <a href="<?php echo home_url(); ?>">
                            <img src="<?php echo $get_options['durel_ss_hf_logo']['url'] ?>" alt="" />
                        </a>
                    </div>
                <?php endif; ?>

                <nav class="navbar navbar-expand-lg p0 ms-3 ms-lg-auto order-lg-2">
                    <button class="navbar-toggler d-block d-lg-none" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <div class="menu category-menu d-block d-md-none">

                            <?php if ($get_options['durel_ss_hf_logo']['url']): ?>
                                <div class="logo">
                                    <a class="d-block" href="<?php echo home_url(); ?>">
                                        <img src="<?php echo $get_options['durel_ss_hf_logo']['url'] ?>" alt=""
                                            width="100" />
                                    </a>
                                </div>
                            <?php endif; ?>

                            <?php
                            wp_nav_menu(
                                $args = array(
                                    'theme_location' => 'main_menu',
                                    'menu' => '',
                                    'container' => '',
                                    'container_class' => '',
                                    'container_id' => '',
                                    'container_aria_label' => '',
                                    'menu_class' => 'navbar-nav',
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
                                    'walker' => new Walker_Nav_Mobile_Menu(),
                                )
                            );
                            ?>
                            
                            <!-- Mobile Download APK Button -->
                            <div class="mobile-download-section mt-4 text-center">
                                <?php 
                                $get_options = get_option('durel_options');
                                $apk_url = $get_options['durel_ss_apk_download_url'] ?? '#';
                                $apk_text = $get_options['durel_ss_apk_download_text'] ?? 'Download APK';
                                ?>
                                <a href="<?php echo esc_url($apk_url); ?>" class="btn btn-success w-100 download-apk-btn-mobile" download>
                                    <i class="fas fa-download me-2"></i>
                                    <?php echo esc_html($apk_text); ?>
                                </a>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>