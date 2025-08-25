<?php

/* Template Name: Pay Bill */
get_header();
$get_options = get_option('durel_options');
?>

<!-- Page Banner Section Start  -->
<?php pageBannerSection(pageTitle: get_the_title()) ?>
<!-- Page Banner Section End  -->


<!-- Pay Bill Section Start  -->
<section class="pay-bill-section" id="payBill">
    <div class="container">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-tab1" data-bs-toggle="pill" data-bs-target="#pills1"
                    type="button" role="tab" aria-controls="pills-1" aria-selected="true">
                    <?php _e('Pay Bill', 'durel') ?>
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-tab2" data-bs-toggle="pill" data-bs-target="#pills2" type="button"
                    role="tab" aria-controls="pills-2" aria-selected="false">
                    <?php _e('Check Out', 'durel') ?>
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-tab3" data-bs-toggle="pill" data-bs-target="#pills3" type="button"
                    role="tab" aria-controls="pills-3" aria-selected="false">
                    <?php _e('Payment', 'durel') ?>
                </button>
            </li>
        </ul>
        <hr />
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills1" role="tabpanel" aria-labelledby="pills-tab1">
                <div class="content-body">
                    <?php
                    $payBillGroups = $get_options['durel_pbp_pay_bill_group'];
                    if ($payBillGroups):
                        foreach ($payBillGroups as $payBill):
                            ?>
                            <div class="payment-info my-5">
                                <h3 class="sectionTitle">Pay Bill through
                                    <strong><?php _e($payBill['durel_pbp_pay_bill_method'], 'durel') ?></strong>
                                </h3>
                                <div class="row row-cols-1 row-cols-md-2 align-items-center">
                                    <div class="col">
                                        <div class="content-text">
                                            <ul>
                                                <li>
                                                    <i class="fas fa-sign-out-alt"></i>
                                                    <span>Login to your
                                                        <strong><?php _e($payBill['durel_pbp_pay_bill_method'], 'durel') ?></strong>
                                                        account with your account's PIN
                                                        number and tap on
                                                        <span class="innerSpan">"পে বিল"</span>
                                                        option.</span>
                                                </li>
                                                <li>
                                                    <i class="fas fa-money-bill-alt"></i> In
                                                    <span><span class="innerSpan">"পে বিল"</span> option
                                                        you'll find <span class="innerSpan">
                                                            "<?php echo bloginfo('name') ?> Brand"</span>. Simply tap on it and
                                                        follow the next step.</span>
                                                </li>
                                                <li>
                                                    <i class="fas fa-money-bill-alt"></i>
                                                    <span>Now select your internet billing timeline in
                                                        <span class="innerSpan">"বিল সময়সীমা"</span> box &
                                                        input your customer in "বিল একাউন্ট নম্বর দিন"
                                                        box.</span>
                                                </li>
                                                <li>
                                                    <i class="fas fa-money-bill-alt"></i>
                                                    <span>If you want to save the payment info for quick
                                                        payment, you can simple tick the checkbox
                                                        <span class="innerSpan">"ভবিষ্যৎ বিল পেমেন্টের জন্য একাউন্টটি সেভ করে
                                                            রাখুন"</span>.</span>
                                                </li>
                                                <li>
                                                    <i class="fas fa-money-bill-alt"></i>
                                                    <span>After that, tap the
                                                        <span class="innerSpan">"পে বিল করতে এগিয়ে যান"</span>
                                                        button & hold the pay button for a few second.
                                                        You're done!</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <?php if ($payBill['durel_pbp_pay_bill_img']['url']): ?>
                                            <div class="img-box">
                                                <img class="img-fluid w-100"
                                                    src="<?php echo $payBill['durel_pbp_pay_bill_img']['url'] ?>" alt="" />
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <?php
                        endforeach;
                    endif; ?>
                </div>
            </div>
            <div class="tab-pane fade" id="pills2" role="tabpanel" aria-labelledby="pills-tab2">

                <div class="content-body">
                    <?php
                    $checkOutGroups = $get_options['durel_pbp_check_out_group'];
                    if ($checkOutGroups):
                        foreach ($checkOutGroups as $checkOut):
                            ?>
                            <div class="payment-info mb-5">
                                <div class="img-box">
                                    <?php
                                    if ($checkOut['durel_pbp_cu_app_img']['url']):
                                        ?>
                                        <img class="img-fluid w-100" src="<?php echo $checkOut['durel_pbp_cu_app_img']['url'] ?>"
                                            alt="" />
                                        <?php
                                    endif;
                                    if ($checkOut['durel_pbp_cu_manual_img']['url']):
                                        ?>
                                        <img class="img-fluid w-100" src="<?php echo $checkOut['durel_pbp_cu_manual_img']['url'] ?>"
                                            alt="" />
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php
                        endforeach;
                    endif; ?>

                </div>
            </div>
            <div class="tab-pane fade" id="pills3" role="tabpanel" aria-labelledby="pills-tab3">
                <div class="content-body">
                    <?php
                    $paymentGroups = $get_options['durel_pbp_payment_group'];
                    if ($paymentGroups):
                        foreach ($paymentGroups as $payment):
                            ?>
                            <div class="payment-info mb-5">
                                <div class="img-box">
                                    <?php
                                    if ($payment['durel_pbp_payment_app_img']['url']):
                                        ?>
                                        <img class="img-fluid w-100"
                                            src="<?php echo $payment['durel_pbp_payment_app_img']['url'] ?>" alt="" />
                                        <?php
                                    endif;
                                    if ($payment['durel_pbp_payment_manual_img']['url']):
                                        ?>
                                        <img class="img-fluid w-100"
                                            src="<?php echo $payment['durel_pbp_payment_manual_img']['url'] ?>" alt="" />
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php
                        endforeach;
                    endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Pay Bill Section End  -->


<?php
get_footer();
?>