<?php
/* Display Notice Text Section */
$get_options = get_option('durel_options');

$noticeTextGroup = $get_options['durel_hp_bs_nt_group'];

if ($noticeTextGroup):
    ?>

    <section class="notice-text-section ">
        <div class="container">
            <div class="notice-box">
                <div class="notice-title">
                    <?php _e('Notice', 'durel') ?>
                </div>
                <marquee>
                    <?php foreach ($noticeTextGroup as $noticeText):
                        if ($noticeText['durel_hp_bs_nt_text']):
                            ?>
                            <li><?php _e($noticeText['durel_hp_bs_nt_text'], 'durel') ?></li>
                            <?php
                        endif;
                    endforeach; ?>
                </marquee>
            </div>
        </div>
    </section>

<?php endif; ?>