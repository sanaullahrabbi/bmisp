<?php
/* Display Client Review Section */
$get_options = get_option('durel_options');

$clientReviewGroup = $get_options['durel_hp_cr_review_group'];
if ($clientReviewGroup):
    ?>

    <section class="client-review-section py-20">
        <div class="container">
            <div class="review-section-header">
                <h2><?php _e($get_options['durel_hp_cr_section_title'] ?: 'What Our Clients Say', 'durel'); ?></h2>
                <p><?php _e($get_options['durel_hp_cr_section_subtitle'] ?: 'Hear from our satisfied customers about their experience', 'durel'); ?></p>
            </div>
            
            <div class="reviews-slider-container">
                <div class="reviews-slider">
                    <?php
                    foreach ($clientReviewGroup as $clientReview):
                        $review_text = $clientReview['durel_hp_cr_text'] ?? '';
                        $review_name = $clientReview['durel_hp_cr_name'] ?? '';
                        $review_designation = $clientReview['durel_hp_cr_designation'] ?? '';
                        $review_image = $clientReview['durel_hp_cr_img']['url'] ?? '';
                        ?>
                        
                        <div class="review-slide">
                            <div class="review-card">
                                <div class="review-content">
                                    <div class="review-quote">
                                        <i class="fas fa-quote-left"></i>
                                    </div>
                                    <?php if ($review_text): ?>
                                        <p class="review-text"><?php _e($review_text, 'durel'); ?></p>
                                    <?php endif; ?>
                                </div>
                                
                                <div class="review-author">
                                    <?php if ($review_image): ?>
                                        <div class="author-image">
                                            <img src="<?php echo esc_url($review_image); ?>" 
                                                 alt="<?php echo esc_attr($review_name); ?>"
                                                 class="author-img">
                                        </div>
                                    <?php else: ?>
                                        <div class="author-image-placeholder">
                                            <i class="fas fa-user"></i>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <div class="author-info">
                                        <?php if ($review_name): ?>
                                            <h4 class="author-name"><?php _e($review_name, 'durel'); ?></h4>
                                        <?php endif; ?>
                                        <?php if ($review_designation): ?>
                                            <p class="author-designation"><?php _e($review_designation, 'durel'); ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                
                                <div class="review-rating">
                                    <div class="stars">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

<!-- Client Review Slider Initialization Script -->
<script>
jQuery(document).ready(function() {
    if (typeof jQuery.fn.slick !== 'undefined') {
        jQuery('.reviews-slider').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            infinite: true,
            autoplay: true,
            autoplaySpeed: 4000,
            speed: 600,
            arrows: true,
            prevArrow: '<button type="button" class="slick-prev reviews-slick-prev"><i class="fas fa-chevron-left"></i></button>',
            nextArrow: '<button type="button" class="slick-next reviews-slick-next"><i class="fas fa-chevron-right"></i></button>',
            dots: true,
            cssEase: 'ease-in-out',
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        arrows: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        arrows: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        arrows: false,
                        dots: true
                    }
                }
            ]
        });
        
        console.log('Client Review Slider initialized successfully');
    } else {
        console.error('Slick Slider is not loaded for client review section');
    }
});
</script>

<?php endif; ?>