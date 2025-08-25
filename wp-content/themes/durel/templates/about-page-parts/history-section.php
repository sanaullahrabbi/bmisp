<?php
/* Display History Section of About Us Page */
$get_options = get_option('durel_options');
?>

<section class="history-section" id="history">
    <div class="container-xxl">
        <?php if ($get_options['durel_ap_history_section_title']): ?>
            <div class="sec-title-v4 text-center">
                <h2><?php _e($get_options['durel_ap_history_section_title'], 'durel') ?></h2>
            </div>
        <?php endif; ?>

        <?php
        $historyGroups = $get_options['durel_ap_history_group'];
        if ($historyGroups):
            ?>
            <div class="our-history-content">
                <div class="top-box"></div>
                <div class="our-history-content-body">
                    <?php foreach ($historyGroups as $history): ?>
                        <div class="inner-content">
                            <div class="row our-history-row">
                                <div class="col-md-6 col-sm-12 col-xs-6 our-history-right">
                                    <?php if ($history['durel_ap_history_year']): ?>
                                        <span class="year"> <?php _e($history['durel_ap_history_year'], 'durel') ?> </span>
                                    <?php endif; ?>
                                    <div class="content">
                                        <?php if ($history['durel_ap_history_title']): ?>
                                            <h4><?php _e($history['durel_ap_history_title'], 'durel') ?></h4>
                                        <?php endif;

                                        if ($history['durel_ap_history_description']):
                                            ?>
                                            <div class="simple-text">
                                                <p>
                                                    <?php _e($history['durel_ap_history_description'], 'durel') ?>
                                                </p>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="col-md-6 our-history-left">
                                    <?php if ($history['durel_ap_history_img']['url']): ?>
                                        <span class="img-box">
                                            <img class="img-fluid w-100" src="<?php echo $history['durel_ap_history_img']['url'] ?>"
                                                alt="" />
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                    <?php endforeach; ?>
                </div>
                <div class="bottom-box"></div>
            </div>

        <?php endif; ?>
    </div>
</section>