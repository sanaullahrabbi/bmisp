<?php
/* Display Video Section */
$get_options = get_option('durel_options');
?>

<section class="fancy-banner-three mt-75 lg-mt-50">
    <div class="container">
        <div class="bg-wrapper position-relative wow fadeInUp">
            <div class="row justify-content-center">
                <div class="col-sm-12 wow fadeInRight">
                    <div class="text-wrapper text-center">
                        <?php if ($get_options['durel_hp_cr_video_id']): ?>
                            <a class="fancybox rounded-circle video-icon" data-fancybox=""
                                href="https://www.youtube.com/embed/<?php echo $get_options['durel_hp_cr_video_id'] ?>">
                                <i class="bi bi-play-fill"></i>
                            </a>
                            <?php
                        endif;
                        if ($get_options['durel_hp_cr_video_title']):
                            ?>
                            <h2 class="fw-300 text-white">
                                <?php _e($get_options['durel_hp_cr_video_title'], 'durel') ?>
                            </h2>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>