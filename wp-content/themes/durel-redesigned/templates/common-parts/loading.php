<?php
/* Display Loading Option */

$site_title = get_bloginfo('name');
$site_title_arrays = str_split($site_title);
?>
<div id="preloader">
    <div id="ctn-preloader" class="ctn-preloader">
        <div class="icon"><img src="<?php echo get_template_directory_uri() ?>/assets/images/loader.svg" alt=""
                class="m-auto d-block" width="60"></div>
        <div class="txt-loading">
            <?php foreach ($site_title_arrays as $site_title_letter):
                if ($site_title_letter): ?>
                    <span data-text-preloader="<?php echo $site_title_letter; ?>" class="letters-loading">
                        <?php echo $site_title_letter; ?>
                    </span>
                    <?php
                endif;
            endforeach; ?>
        </div>
    </div>
</div>