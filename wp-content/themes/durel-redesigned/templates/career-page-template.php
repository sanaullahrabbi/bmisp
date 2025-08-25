<?php

/* Template Name: Career */
get_header();
$get_options = get_option('durel_options');
?>

<!-- Page Banner Section Start  -->
<?php pageBannerSection(pageTitle: get_the_title()) ?>
<!-- Page Banner Section End  -->

<?php
$jobGroup = $get_options['durel_cp_job_groups'];
if ($jobGroup):
    ?>
    <!-- Career Section Start  -->
    <section class="career-section" id="career">
        <div class="container">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <?php
                $i = 1;
                foreach ($jobGroup as $job):
                    if ($job['durel_cp_job_title']):
                        ?>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link <?php echo $i === 1 ? 'active' : '' ?>" id="pills-tab<?php echo $i; ?>"
                                data-bs-toggle="pill" data-bs-target="#pills<?php echo $i; ?>" type="button" role="tab"
                                aria-controls="pills-<?php echo $i; ?>" aria-selected="<?php echo $i === 1 ? 'true' : 'false' ?>">
                                <?php _e($job['durel_cp_job_title'], 'durel') ?>
                            </button>
                        </li>
                        <?php
                    endif;
                    $i++;
                endforeach;
                ?>
            </ul>
            <hr />
            <div class="tab-content" id="pills-tabContent">
                <?php
                $i = 1;
                foreach ($jobGroup as $job):
                    if ($job['durel_cp_job_description']):
                        ?>
                        <div class="tab-pane fade <?php echo $i === 1 ? 'show active' : '' ?> " id="pills<?php echo $i; ?>"
                            role="tabpanel" aria-labelledby="pills-tab<?php echo $i; ?>">
                            <article class="item-page">
                                <?php _e($job['durel_cp_job_description'], 'durel') ?>
                            </article>
                        </div>
                        <?php
                    endif;
                    $i++;
                endforeach;
                ?>
            </div>
        </div>
    </section>
    <!-- Career Section End  -->
<?php endif; ?>

<?php
get_footer();
?>