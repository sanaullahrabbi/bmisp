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
        
        
        <section class="page-header-section">
            <div class="container">
                <div class="page-header-content">
                    <!-- Breadcrumb Navigation -->
                    <?php if (!empty($breadcrumbs)): ?>
                    <div class="breadcrumbs">
                        <?php 
                        $breadcrumb_count = count($breadcrumbs);
                        foreach ($breadcrumbs as $index => $breadcrumb): 
                        ?>
                            <?php if ($index > 0): ?>
                                <span class="breadcrumb-separator">/</span>
                            <?php endif; ?>
                            
                            <?php if (isset($breadcrumb['url']) && $breadcrumb['url']): ?>
                                <a href="<?php echo esc_url($breadcrumb['url']); ?>" class="breadcrumb-link">
                                    <?php echo esc_html($breadcrumb['title']); ?>
                                </a>
                            <?php else: ?>
                                <span class="breadcrumb-current"><?php echo esc_html($breadcrumb['title']); ?></span>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                    
                    <!-- Page Title -->
                    <h1 class="page-header-title"><?php echo esc_html($page_title); ?></h1>
                    
                    <!-- Page Subtitle -->
                    <?php if (!empty($page_subtitle)): ?>
                        <p class="page-header-subtitle"><?php echo esc_html($page_subtitle); ?></p>
                    <?php endif; ?>
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
