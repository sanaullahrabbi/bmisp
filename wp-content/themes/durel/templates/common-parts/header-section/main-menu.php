<?php
/* Display Main Menu */
?>

<div class="theme-main-menu sticky-menu">

    <!-- <nav class="navbar category-menu d-none d-lg-block">
        <ul class="style-none nav-item d-flex align-items-center justify-content-center">
            <li class="nav-item"><a class="active" href="index.html">Home</a></li>
            <li class="nav-item"><a href="about-us.html">About Us</a></li>
            <li class="nav-item"><a href="pricing.html">Pricing</a></li>
            <li class="nav-item"><a href="pay-bill.html">Pay Bill</a></li>
            <li class="nav-item"><a href="coverage-area.html">Coverage Area</a></li>
            <li class="nav-item"><a href="support-member.html">Support Team</a></li>
            <li class="nav-item dropdown">
                <a href="#">Service</a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="dropdown-item" href="service-details.html">Service 1</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="service-details.html">Service 2</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#">Live Server</a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="dropdown-item" href="#">FTP Server</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">Live Tv Server</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item dropdown">
                <a href="#">Gallery</a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="dropdown-item" href="image-gallery.html">Image Gallery</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="video-gallery.html">Video Gallery</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item"><a href="contact.html">Contact Us</a></li>
        </ul>
    </nav> -->

    <?php
    wp_nav_menu(
        $args = array(
            'theme_location' => 'main_menu',
            'menu' => '',
            'container' => 'nav',
            'container_class' => 'navbar category-menu d-none d-lg-block',
            'container_id' => '',
            'container_aria_label' => '',
            'menu_class' => 'style-none nav-item d-flex align-items-center justify-content-center',
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
            'walker' => new Walker_Nav_Main_Menu(),
        )
    );
    ?>

</div>