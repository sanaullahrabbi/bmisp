<?php

/* Template Name: Coverage Area */
get_header();
$get_options = get_option('durel_options');
?>

<!-- Page Banner Section Start  -->
<?php pageBannerSection(pageTitle: get_the_title()) ?>
<!-- Page Banner Section End  -->

<?php
$coverageAreaGroups = $get_options['durel_cap_region_group'];
if ($coverageAreaGroups): ?>
    <!-- Coverage Area Section Start  -->
    <section class="coverage-area" id="coverage">
        <div class="container">
            <div class="accordion" id="accordionExample">

                <?php
                $i = 1;
                foreach ($coverageAreaGroups as $coverageAreas):
                    ?>
                    <div class="accordion-item">
                        <?php if ($coverageAreas['durel_cap_region_name']): ?>
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse<?php echo $i; ?>"
                                    aria-expanded="<?php echo $i === 1 ? 'true' : 'false' ?>"
                                    aria-controls="collapse<?php echo $i; ?>">
                                    <i class="fas fa-map-marked-alt"></i>
                                    <span>
                                        <h4 class="main-area-name"><?php _e($coverageAreas['durel_cap_region_name'], 'durel') ?>
                                        </h4>
                                        <p><?php _e('Check the available area for the ' . $coverageAreas['durel_cap_region_name'] . ' Region', 'durel') ?>
                                        </p>
                                    </span>
                                </button>
                            </h2>
                        <?php endif; ?>
                        <div id="collapse<?php echo $i; ?>"
                            class="accordion-collapse collapse <?php echo $i === 1 ? 'show' : '' ?>"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-4">

                                    <?php
                                    $officeInfoGroup = $coverageAreas['durel_cap_oInfo_group'];
                                    $j = 1;
                                    foreach ($officeInfoGroup as $officeInfo):
                                        if ($officeInfo['durel_cap_office_name']):
                                            ?>
                                            <div class="col">
                                                <div class="inner-area" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal<?php echo $i . $j ?>">
                                                    <i class="fas fa-map-marker-alt"></i>
                                                    <?php _e($officeInfo['durel_cap_office_name'], 'durel') ?>
                                                </div>
                                            </div>

                                            <!-- Modal  -->
                                            <div class="modal fade" id="exampleModal<?php echo $i . $j ?>" tabindex="-1"
                                                aria-labelledby="exampleModalLabel<?php echo $i . $j ?>" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel<?php echo $i . $j ?>">
                                                                <?php _e('" ' . $officeInfo['durel_cap_office_name'] . ' "' . ' Office
                                                                Information', 'durel') ?>
                                                            </h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <ul class="office-info-list">
                                                                <?php if ($officeInfo['durel_cap_office_num1']): ?>
                                                                    <li>
                                                                        <a href="tel:<?php echo $officeInfo['durel_cap_office_num1'] ?>"><i
                                                                                class="fas fa-phone-alt"></i>
                                                                            <?php echo $officeInfo['durel_cap_office_num1'] ?></a>
                                                                    </li>
                                                                    <?php
                                                                endif;
                                                                if ($officeInfo['durel_cap_office_num2']):
                                                                    ?>
                                                                    <li>
                                                                        <a href="tel:<?php echo $officeInfo['durel_cap_office_num2'] ?>"><i
                                                                                class="fas fa-phone-alt"></i>
                                                                            <?php echo $officeInfo['durel_cap_office_num2'] ?></a>
                                                                    </li>
                                                                    <?php
                                                                endif;
                                                                if ($officeInfo['durel_cap_office_email1']):
                                                                    ?>

                                                                    <li>
                                                                        <a
                                                                            href="mailto:<?php echo $officeInfo['durel_cap_office_email1'] ?>"><i
                                                                                class="fas fa-envelope"></i>
                                                                            <?php echo $officeInfo['durel_cap_office_email1'] ?></a>
                                                                    </li>
                                                                    <?php
                                                                endif;
                                                                if ($officeInfo['durel_cap_office_email2']):
                                                                    ?>
                                                                    <li>
                                                                        <a
                                                                            href="mailto:<?php echo $officeInfo['durel_cap_office_email2'] ?>"><i
                                                                                class="fas fa-envelope"></i>
                                                                            <?php echo $officeInfo['durel_cap_office_email2'] ?>
                                                                        </a>
                                                                    </li>
                                                                    <?php
                                                                endif;
                                                                if ($officeInfo['durel_cap_office_address']):
                                                                    ?>
                                                                    <li>
                                                                        <i
                                                                            class="fas fa-map-marker-alt"></i><?php _e($officeInfo['durel_cap_office_address'], 'durel') ?>
                                                                    </li>
                                                                <?php endif; ?>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <?php
                                        endif;
                                        $j++;
                                    endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    $i++;
                endforeach;
                ?>

            </div>

        </div>
    </section>
    <!-- Coverage Area Section End  -->
<?php endif; ?>

<?php
get_footer();
?>