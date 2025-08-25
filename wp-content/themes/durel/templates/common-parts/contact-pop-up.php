<?php
/* Display Contact Pop */
$get_options = get_option('durel_options');
?>
<div class="contact-pop-up">
    <ul>
        <?php if ($get_options['durel_ss_cu_number']): ?>
            <li>
                <a href="tel:<?php _e($get_options['durel_ss_cu_number'], 'durel') ?>">
                    <i class="fas fa-phone-volume"></i>
                    <span><?php _e($get_options['durel_ss_cu_number'], 'durel') ?></span> </a>
            </li>
        <?php endif; ?>
        <li>
            <a href="<?php echo home_url() ?>/new-connection">
                <i class="fas fa-user-plus"></i> <span><?php _e('New Connection', 'durel') ?></span>
            </a>
        </li>
        <?php if ($get_options['durel_ss_hf_clink']): ?>
            <li>
                <a target="_blank" href="<?php _e($get_options['durel_ss_hf_clink'], 'durel') ?>">
                    <i class="fas fa-sign-in-alt"></i>
                    <span><?php _e('Client Login', 'durel') ?></span>
                </a>
            </li>
        <?php endif; ?>
    </ul>
</div>