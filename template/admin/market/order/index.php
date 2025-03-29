<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once BASE_PATH . '/template/admin/layouts/head-tag.php';
    ?>
    <title>سفارشات</title>
</head>

<body dir="rtl">

    <?php
    require_once BASE_PATH . '/template/admin/layouts/partials/header.php';
    ?>


    <section class="body-container">

        <?php
        require_once BASE_PATH . '/template/admin/layouts/partials/sidebar.php';
        ?>


        <section id="main-body" class="main-body">

            <section class="row">
                <section class="col-12">
                    <?php
                    require_once BASE_PATH . '/template/admin/layouts/partials/success.php'
                    ?>
                    <div class="alert alert-success d-none" id="alert">

                    </div>
                    <section class="main-body-container">
                        <section class="main-body-container-header d-flex justify-content-between align-items-center">
                            <div>
                                <h5>
                                    سفارشات
                                </h5>
                                <p>
                                    در این بخش اطلاعاتی در مورد سفارشات به شما داده می شود
                                </p>
                            </div>
                        </section>
                        <section class="body-content">

                            <table class="table">
                                <thead class="table-info">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">توسط</th>
                                        <th scope="col">وضعیت پرداخت</th>
                                        <th scope="col">وضعیت ارسال</th>
                                        <th scope="col">قیمت نهایی</th>
                                        <th scope="col">وضعیت سفارش</th>
                                        <th scope="col">زمان</th>
                                        <th scope="col">تنظیمات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($orders as $order) { ?>
                                        <tr>
                                            <th><?= $order['id'] ?></th>
                                            <td><?= $order['email'] ?></td>
                                            <td>
                                                <?php
                                                if ($order['payment_status'] == 1) {
                                                    echo 'درحال پردازش';
                                                } elseif ($order['payment_status'] == 2) {
                                                    echo 'پرداخت شده';
                                                } else {
                                                    echo 'پرداخت نشده';
                                                }

                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                if ($order['delivery_status'] == 1) {
                                                    echo 'درحال پردازش';
                                                } elseif ($order['delivery_status'] == 2) {
                                                    echo 'ارسال شده';
                                                } else {
                                                    echo 'بازگشت داده شده';
                                                }

                                                ?>
                                            </td>
                                            <td><?= $order['order_final_amount'] ?></td>
                                            <td>
                                                <?php
                                                if ($order['order_status'] == 0) {
                                                    echo 'در انتظار';
                                                } elseif ($order['order_status'] == 1) {
                                                    echo 'درحال پردازش';
                                                } elseif ($order['order_status'] == 2) {
                                                    echo 'تکمیل شده';
                                                } elseif ($order['order_status'] == 3) {
                                                    echo 'رد شده';
                                                } else {
                                                    echo 'بازگشت داده شده';
                                                }
                                                ?></td>
                                            <td><?= $order['created_at'] ?></td>

                                            <td>
                                                <div class="d-flex">
                                                    <div class="mx-2">
                                                        <a href="<?= url('admin/market/order/items/' . $order['id']) ?>" class="text-danger">
                                                            <i class="fa fa-object-group"></i>
                                                        </a>
                                                    </div>
                                                    <div class="mx-2">
                                                        <a href="<?= url('admin/market/order/show/' . $order['id']) ?>" class="text-info">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>

                        </section>
                    </section>
                </section>
            </section>



        </section>
    </section>






    <?php
    require_once BASE_PATH . '/template/admin/layouts/scripts.php';
    ?>



</body>

</html>