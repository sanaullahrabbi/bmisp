<?php

/* Template Name: Video Gallery */
get_header();
$get_options = get_option('durel_options');
?>

<!-- Page Header Section Start -->
<?php 
$get_options = get_option('durel_options');
$page_title = $get_options['durel_vg_page_title'] ?: get_the_title();
$page_subtitle = $get_options['durel_vg_page_subtitle'] ?: 'Watch our collection of videos showcasing our services and achievements';

// Custom breadcrumbs for Video Gallery page
$breadcrumbs = array(
    array('title' => 'Home', 'url' => home_url('/')),
    array('title' => 'Video Gallery', 'url' => false)
);

pageHeaderSection($page_title, $page_subtitle, $breadcrumbs);
?>
<!-- Page Header Section End -->

<!-- Video Gallery Section Start -->
<section class="video-gallery-section">
    <div class="video-gallery-container">
        <!-- Filter Buttons -->
        <div class="gallery-filters">
            <button class="filter-btn active" data-filter="*">All Videos</button>
            <?php
            // Get categories from admin options
            $video_categories = $get_options['durel_video_categories'] ?: [];
            
            foreach ($video_categories as $category) {
                if (!empty($category['durel_video_category_name'])) {
                    $category_name = $category['durel_video_category_name'];
                    $slug = sanitize_title($category_name);
                    ?>
                    <button class="filter-btn" data-filter=".<?php echo esc_attr($slug); ?>"><?php echo esc_html($category_name); ?></button>
                    <?php
                }
            }
            ?>
        </div>

        <!-- Video Grid -->
        <div class="video-grid">
            <?php
            $video_gallery_group = $get_options['durel_video_gallery_group'] ?: [];
            
            if (!empty($video_gallery_group)):
                foreach ($video_gallery_group as $video):
                    if (empty($video['durel_video_url'])) continue;
                    
                    $video_title = $video['durel_video_title'] ?: 'Untitled Video';
                    $video_description = $video['durel_video_description'] ?: '';
                    $video_url = $video['durel_video_url'] ?: '';
                    $video_thumbnail = $video['durel_video_thumbnail'] ?: '';
                    $video_categories = $video['durel_video_category'] ?: [];
                    
                    // Handle multiple categories
                    $category_classes = '';
                    if (is_array($video_categories) && !empty($video_categories)) {
                        $category_slugs = array_map('sanitize_title', $video_categories);
                        $category_classes = implode(' ', $category_slugs);
                    }
                    
                    // Get thumbnail URL
                    $thumbnail_url = '';
                    if ($video_thumbnail) {
                        // Handle media field for thumbnail
                        if (is_array($video_thumbnail) && isset($video_thumbnail['url'])) {
                            $thumbnail_url = $video_thumbnail['url'];
                        } else {
                            $thumbnail_url = $video_thumbnail;
                        }
                    }
                    ?>
                    
                    <div class="video-item <?php echo esc_attr($category_classes); ?>">
                        <div class="video-card">
                            <div class="video-thumbnail">
                                <a href="#" class="video-link" data-video-url="<?php echo esc_url($video_url); ?>" data-video-title="<?php echo esc_attr($video_title); ?>">
                                    <?php if ($thumbnail_url): ?>
                                        <img src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php echo esc_attr($video_title); ?>" class="video-img">
                                    <?php else: ?>
                                        <div class="video-placeholder">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <polygon points="23,7 16,12 23,17 23,7"/>
                                                <rect x="1" y="5" width="15" height="14" rx="2" ry="2"/>
                                            </svg>
                                        </div>
                                    <?php endif; ?>
                                    <div class="video-overlay">
                                        <div class="play-button">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <polygon points="5,3 19,12 5,21"/>
                                            </svg>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="video-content">
                                <h3 class="video-title"><?php echo esc_html($video_title); ?></h3>
                                <?php if ($video_description): ?>
                                <p class="video-description"><?php echo wp_trim_words($video_description, 20); ?></p>
                                <?php endif; ?>
                                <?php if (!empty($video_categories) && is_array($video_categories)): ?>
                                <div class="video-categories">
                                    <?php foreach ($video_categories as $category): ?>
                                        <span class="video-category"><?php echo esc_html($category); ?></span>
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
            <div class="video-empty">
                <div class="empty-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polygon points="23,7 16,12 23,17 23,7"/>
                        <rect x="1" y="5" width="15" height="14" rx="2" ry="2"/>
                    </svg>
                </div>
                <h3 class="empty-title">No Videos Available</h3>
                <p class="empty-text">Videos will be added to the gallery soon. Please check back later.</p>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<!-- Video Gallery Section End -->

        <!-- Video Modal -->
        <div id="videoModal" class="video-modal">
            <div class="video-modal-content relative max-w-4xl w-full">
                <button id="closeVideoModal" class="absolute -top-12 right-0 text-white hover:text-gray-300 transition-colors">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
                <div class="video-wrapper relative w-full" style="padding-bottom: 56.25%;">
                    <iframe id="videoPlayer" class="absolute top-0 left-0 w-full h-full rounded-lg" 
                            src="" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
        </div>

<?php
get_footer();
?>