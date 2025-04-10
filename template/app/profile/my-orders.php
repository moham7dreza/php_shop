<!doctype html>
<html lang="fa" dir="rtl">

<head>
    <?php
    require_once BASE_PATH . '/template/app/layouts/head-tag.php';
    ?>
    <title>فروشگاه آمازون</title>
</head>

<body>



    <?php
    require_once BASE_PATH . '/template/app/layouts/partials/header.php';
    ?>



    <!-- start body -->
    <section class="">
        <section id="main-body-two-col" class="container-xxl body-container">
            <section class="row">
                <?php
                require_once BASE_PATH . '/template/app/layouts/partials/profile-sidebar.php';
                ?>
                <main id="main-body" class="main-body col-md-9">
                    <section class="content-wrapper bg-white p-3 rounded-2 mb-2">

                        <!-- start vontent header -->
                        <section class="content-header">
                            <section class="d-flex justify-content-between align-items-center">
                                <h2 class="content-header-title">
                                    <span>تاریخچه سفارشات</span>
                                </h2>
                                <section class="content-header-link">
                                    <!--<a href="#">مشاهده همه</a>-->
                                </section>
                            </section>
                        </section>
                        <!-- end vontent header -->


                        <section class="d-flex justify-content-center my-4">
                            <a class="btn btn-info btn-sm mx-1" href="<?= url('profile/my-orders?status=pending') ?>">در انتظار پرداخت</a>
                            <a class="btn btn-warning btn-sm mx-1" href="<?= url('profile/my-orders?status=processing') ?>">در حال پردازش</a>
                            <a class="btn btn-success btn-sm mx-1" href="<?= url('profile/my-orders?status=deliveried') ?>">تحویل شده</a>
                            <a class="btn btn-danger btn-sm mx-1" href="<?= url('profile/my-orders?status=returned') ?>">مرجوعی</a>
                            <a class="btn btn-dark btn-sm mx-1" href="<?= url('profile/my-orders?status=canceled') ?>">لغو شده</a>
                        </section>


                        <!-- start content header -->
                        <section class="content-header mb-3">
                            <section class="d-flex justify-content-between align-items-center">
                                <h2 class="content-header-title content-header-title-small">
                                    در انتظار پرداخت
                                </h2>
                                <section class="content-header-link">
                                    <!--<a href="#">مشاهده همه</a>-->
                                </section>
                            </section>
                        </section>
                        <!-- end content header -->


                        <section class="order-wrapper">
                            <?php
                            if (empty($orders)) {
                            ?>
                                <p class="text-center text-muted">شما هیچ سفارشی ندارید</p>
                            <?php } else { ?>

                                <?php
                                foreach ($orders as $order) {
                                ?>
                                    <section class="order-item">
                                        <section class="d-flex justify-content-between">
                                            <section>
                                                <section class="order-item-date"><i class="fa fa-calendar-alt"></i>
                                                    <?= jDate($order['created_at']) ?>
                                                </section>
                                                <section class="order-item-id"><i class="fa fa-id-card-alt"></i>کد سفارش : <?= $order['id'] ?></section>
                                                <section class="order-item-status"><i class="fa fa-clock"></i>

                                                    <?php

                                                    switch ($order['order_status']) {

                                                        case 0:
                                                            echo 'در انتظار';
                                                            break;
                                                        case 1:
                                                            echo 'درحال پردازش';
                                                            break;
                                                        case 2:
                                                            echo 'تکمیل';
                                                            break;
                                                        case  3:
                                                            echo 'خطا دار';
                                                            break;
                                                        case 4:
                                                            echo 'برگشت داده شده';
                                                            break;
                                                    }

                                                    ?>

                                                </section>
                                                <section class="order-delivery">
                                                    <p>
                                                        <strong>روش ارسال</strong>
                                                        <?= $order['delivery_object']['name'] ?>
                                                        (<?= $order['delivery_amount'] ?> تومان)
                                                    </p>

                                                    <p>
                                                        <strong>روش پرداخت</strong>
                                                        <?= $order['payment_type'] == 1 ? 'انلاین' : 'در محل' ?>
                                                    </p>

                                                </section>
                                                <section class="order-discount">
                                                    <p>
                                                        <strong>مبلغ تخفیف</strong>
                                                        <?= number_format($order['order_total_discount_amount']) ?> تومان
                                                    </p>

                                                </section>
                                                <section class="order-discount">
                                                    <p>
                                                        <strong>مبلغ نهایی</strong>
                                                        <?= number_format($order['order_final_amount']) ?> تومان
                                                    </p>

                                                </section>
                                                <section class="order-item-products">
                                                    <?php
                                                    foreach ($order['products'] as $product) {
                                                    ?>
                                                        <a href="#"><img src="<?= asset($product['image']) ?>" alt=""></a>
                                                    <?php } ?>
                                                </section>
                                            </section>
                                            <section class="order-item-link">
                                                <?php
                                                if ($order['order_status'] == 0) {
                                                ?>
                                                    <a href="#">پرداخت سفارش</a>
                                                <?php } ?>
                                            </section>
                                        </section>
                                    </section>
                                <?php } ?>

                            <?php } ?>


                        </section>


                    </section>
                </main>
            </section>
        </section>
    </section>
    <!-- end body -->





    <?php
    require_once BASE_PATH . '/template/app/layouts/partials/footer.php';
    ?>

    <?php
    require_once BASE_PATH . '/template/app/layouts/scripts.php';
    ?>




</body>

</html>