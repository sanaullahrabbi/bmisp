<?php

/* Template Name: Image Gallery */
get_header();
$get_options = get_option('durel_options');
?>

<!-- Page Header Section Start -->
<?php 
$get_options = get_option('durel_options');
$page_title = $get_options['durel_ig_page_title'] ?: get_the_title();
$page_subtitle = $get_options['durel_ig_page_subtitle'] ?: 'Explore our collection of images showcasing our work and achievements';

// Custom breadcrumbs for Image Gallery page
$breadcrumbs = array(
    array('title' => 'Home', 'url' => home_url('/')),
    array('title' => 'Image Gallery', 'url' => false)
);

pageHeaderSection($page_title, $page_subtitle, $breadcrumbs);
?>
<!-- Page Header Section End -->

<!-- Image Gallery Section Start -->
<section class="image-gallery-section">
    <div class="image-gallery-container">
        <!-- Filter Buttons -->
        <div class="gallery-filters">
            <button class="filter-btn active" data-filter="*">All Images</button>
            <?php
            // Get categories from admin options
            $image_categories = $get_options['durel_image_categories'] ?: [];
            
            foreach ($image_categories as $category) {
                if (!empty($category['durel_image_category_name'])) {
                    $category_name = $category['durel_image_category_name'];
                    $slug = sanitize_title($category_name);
                    ?>
                    <button class="filter-btn" data-filter=".<?php echo esc_attr($slug); ?>"><?php echo esc_html($category_name); ?></button>
                    <?php
                }
            }
            ?>
        </div>

        <!-- Gallery Grid -->
        <div class="gallery-grid">
            <?php
            $image_gallery_group = $get_options['durel_image_gallery_group'] ?: [];
            
            if (!empty($image_gallery_group)):
                foreach ($image_gallery_group as $image):
                    if (empty($image['durel_image_file'])) continue;
                    
                    $image_title = $image['durel_image_title'] ?: 'Untitled Image';
                    $image_description = $image['durel_image_description'] ?: '';
                    $image_file = $image['durel_image_file'];
                    $image_categories = $image['durel_image_category'] ?: [];
                    
                    // Handle media field - it might be an array with 'url' key
                    if (is_array($image_file) && isset($image_file['url'])) {
                        $image_url = $image_file['url'];
                    } else {
                        $image_url = $image_file;
                    }
                    
                    // Handle multiple categories
                    $category_classes = '';
                    if (is_array($image_categories) && !empty($image_categories)) {
                        $category_slugs = array_map('sanitize_title', $image_categories);
                        $category_classes = implode(' ', $category_slugs);
                    }
                    ?>
                    
                    <div class="gallery-item <?php echo esc_attr($category_classes); ?>">
                        <div class="gallery-card">
                            <div class="gallery-image">
                                <a href="<?php echo esc_url($image_url); ?>" class="gallery-link" data-lightbox="gallery">
                                    <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_title); ?>" class="gallery-img">
                                    <div class="gallery-overlay">
                                        <div class="gallery-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                                                <polyline points="7,10 12,15 17,10"/>
                                                <line x1="12" y1="15" x2="12" y2="3"/>
                                            </svg>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="gallery-content">
                                <h3 class="gallery-item-title"><?php echo esc_html($image_title); ?></h3>
                                <?php if (!empty($image_categories) && is_array($image_categories)): ?>
                                <div class="gallery-categories">
                                    <?php foreach ($image_categories as $category): ?>
                                        <span class="gallery-category"><?php echo esc_html($category); ?></span>
                                    <?php endforeach; ?>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <?php
                endforeach;
            else:
            ?>
            <div class="gallery-empty">
                <div class="empty-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="3" width="18" height="18" rx="2" ry="2"/>
                        <circle cx="8.5" cy="8.5" r="1.5"/>
                        <polyline points="21,15 16,10 5,21"/>
                    </svg>
                </div>
                <h3 class="empty-title">No Images Available</h3>
                <p class="empty-text">Images will be added to the gallery soon. Please check back later.</p>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<!-- Image Gallery Section End -->

<?php
get_footer();
?>