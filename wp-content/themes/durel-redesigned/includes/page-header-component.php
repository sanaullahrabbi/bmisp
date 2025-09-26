<?php
/**
 * Simple Page Header Component with Breadcrumbs
 * Usage: pageHeaderSection($page_title, $page_subtitle, $breadcrumbs, $background_image)
 */

if (!function_exists('pageHeaderSection')):
    function pageHeaderSection($page_title = '', $page_subtitle = '', $breadcrumbs = array(), $background_image = '') {
        // Default background image if none provided
        if (empty($background_image)) {
            $background_image = 'https://images.pexels.com/photos/5077047/pexels-photo-5077047.jpeg?auto=compress&cs=tinysrgb&w=800';
        }
        
        // Auto-generate breadcrumbs if not provided
        if (empty($breadcrumbs)) {
            $breadcrumbs = generateBreadcrumbs();
        }
        
        // Get page title if not provided
        if (empty($page_title)) {
            $page_title = get_the_title();
        }
        ?>
        
        <style>
        /* Page Header Styles */
        .page-header-section {
            position: relative;
            background: linear-gradient(135deg, #1f2937 0%, #7f1d1d 50%, #000000 100%);
            padding: 80px 0;
            overflow: hidden;
            min-height: 300px;
            display: flex;
            align-items: center;
        }
        
        .page-header-section::before {
            content: '';
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.3);
            z-index: 1;
        }
        
        .page-header-container {
            width: 100%;
            margin: 0 auto;
            padding: 0 1rem;
            position: relative;
            z-index: 2;
        }
        
        .page-header-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 3rem;
            align-items: center;
        }
        
        @media (min-width: 1024px) {
            .page-header-grid {
                grid-template-columns: 1fr 1fr;
            }
        }
        
        .page-header-content {
            color: white;
        }
        
        .breadcrumb-nav {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.875rem;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
        }
        
        .breadcrumb-link {
            color: rgba(255, 255, 255, 0.6);
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .breadcrumb-link:hover {
            color: white;
        }
        
        .breadcrumb-separator {
            color: rgba(255, 255, 255, 0.4);
        }
        
        .breadcrumb-current {
            color: white;
        }
        
        .page-title {
            font-size: 3rem;
            font-weight: 700;
            color: white;
            line-height: 1.1;
            margin-bottom: 1rem;
        }
        
        @media (min-width: 1024px) {
            .page-title {
                font-size: 3.75rem;
            }
        }
        
        .page-subtitle {
            font-size: 1.25rem;
            color: rgba(255, 255, 255, 0.9);
            line-height: 1.6;
            margin-bottom: 1rem;
        }
        
        
        .page-header-image {
            position: relative;
        }
        
        .page-header-img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 1rem;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        }
        
        @media (min-width: 768px) {
            .page-header-img {
                height: 200px;
            }
        }
        
        /* Animation for page load */
        .page-header-content > * {
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.6s ease forwards;
        }
        
        .page-header-content > *:nth-child(1) { animation-delay: 0.1s; }
        .page-header-content > *:nth-child(2) { animation-delay: 0.2s; }
        .page-header-content > *:nth-child(3) { animation-delay: 0.3s; }
        
        .page-header-image {
            opacity: 0;
            transform: translateX(20px);
            animation: fadeInRight 0.8s ease forwards;
            animation-delay: 0.2s;
        }
        
        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes fadeInRight {
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .page-header-section {
                padding: 60px 0;
                min-height: 350px;
            }
            
            .page-title {
                font-size: 2.5rem;
            }
            
            .page-subtitle {
                font-size: 1.125rem;
            }
            
            .page-header-grid {
                gap: 2rem;
            }
        }
        </style>
        
        <section class="page-header-section">
            <div class="page-header-container container">
                <div class="page-header-grid">
                    <div class="page-header-content">
                        <!-- Breadcrumb Navigation -->
                        <?php if (!empty($breadcrumbs)): ?>
                        <nav class="breadcrumb-nav">
                            <?php 
                            $breadcrumb_count = count($breadcrumbs);
                            foreach ($breadcrumbs as $index => $breadcrumb): 
                            ?>
                                <?php if ($index > 0): ?>
                                    <span class="breadcrumb-separator">›</span>
                                <?php endif; ?>
                                
                                <?php if (isset($breadcrumb['url']) && $breadcrumb['url']): ?>
                                    <a href="<?php echo esc_url($breadcrumb['url']); ?>" class="breadcrumb-link">
                                        <?php echo esc_html($breadcrumb['title']); ?>
                                    </a>
                                <?php else: ?>
                                    <span class="breadcrumb-current"><?php echo esc_html($breadcrumb['title']); ?></span>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </nav>
                        <?php endif; ?>
                        
                        <!-- Page Title -->
                        <h1 class="page-title"><?php echo esc_html($page_title); ?></h1>
                        
                        <!-- Page Subtitle -->
                        <?php if (!empty($page_subtitle)): ?>
                            <p class="page-subtitle"><?php echo esc_html($page_subtitle); ?></p>
                        <?php endif; ?>
                    </div>
                    
                    <!-- Page Header Image -->
                    <div class="page-header-image">
                        <img 
                            src="<?php echo esc_url($background_image); ?>" 
                            alt="<?php echo esc_attr($page_title); ?>" 
                            class="page-header-img"
                        />
                    </div>
                </div>
            </div>
        </section>
        
        <?php
    }
endif;

/**
 * Generate automatic breadcrumbs based on current page
 */
if (!function_exists('generateBreadcrumbs')):
    function generateBreadcrumbs() {
        $breadcrumbs = array();
        
        // Always start with Home
        $breadcrumbs[] = array(
            'title' => 'Home',
            'url' => home_url('/')
        );
        
        // Get current page info
        if (is_front_page()) {
            // Home page - no additional breadcrumbs needed
            return $breadcrumbs;
        }
        
        if (is_page()) {
            $page_id = get_the_ID();
            $page_title = get_the_title();
            
            // Add parent pages if they exist
            $parent_id = wp_get_post_parent_id($page_id);
            while ($parent_id) {
                $parent = get_post($parent_id);
                array_splice($breadcrumbs, -1, 0, array(array(
                    'title' => $parent->post_title,
                    'url' => get_permalink($parent_id)
                )));
                $parent_id = wp_get_post_parent_id($parent_id);
            }
            
            // Add current page (no URL for current page)
            $breadcrumbs[] = array(
                'title' => $page_title,
                'url' => false
            );
        }
        
        elseif (is_single()) {
            // For blog posts, add Blog and current post
            $breadcrumbs[] = array(
                'title' => 'Blog',
                'url' => get_permalink(get_option('page_for_posts'))
            );
            $breadcrumbs[] = array(
                'title' => get_the_title(),
                'url' => false
            );
        }
        
        elseif (is_category() || is_tag() || is_tax()) {
            $breadcrumbs[] = array(
                'title' => 'Blog',
                'url' => get_permalink(get_option('page_for_posts'))
            );
            $breadcrumbs[] = array(
                'title' => single_term_title('', false),
                'url' => false
            );
        }
        
        // Special handling for service pages
        if (get_query_var('service_slug')) {
            $breadcrumbs[] = array(
                'title' => 'Services',
                'url' => home_url('/services/')
            );
            
            $service_slug = get_query_var('service_slug');
            $get_options = get_option('durel_options');
            $services = $get_options['durel_sp_service_categories'] ?? [];
            
            foreach ($services as $service) {
                if (($service['durel_sp_service_slug'] ?? '') === $service_slug) {
                    $breadcrumbs[] = array(
                        'title' => $service['durel_sp_service_name'] ?? 'Service',
                        'url' => false
                    );
                    break;
                }
            }
        }
        
        return $breadcrumbs;
    }
endif;
?>
