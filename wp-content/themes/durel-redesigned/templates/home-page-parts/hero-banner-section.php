<?php
/* Display Here Banner Section */
$get_options = get_option('durel_options');
?>

<section class="hero-banner-section pt-40 pb-40">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-7 text-center text-md-start">
                <div class="banner-box">
                    <?php if ($get_options['durel_hp_bs_title']): ?>
                        <h1><?php _e($get_options['durel_hp_bs_title'], 'durel') ?></h1>
                    <?php endif;                 
                        ?>                       
                   
                </div>
            </div>
            <div class="col-lg-6 col-md-5">
                <?php if ($get_options['durel_hp_bs_image']['url']): ?>
                    <div class="img-box">
                        <img class="img-fluid w-100 h-100" src="<?php echo $get_options['durel_hp_bs_image']['url'] ?>"
                            alt="" />
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>