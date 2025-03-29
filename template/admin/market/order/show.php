<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once BASE_PATH . '/template/admin/layouts/head-tag.php';
    ?>
    <title>سفارش</title>
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
                                    سفارش
                                </h5>
                                <p>
                                    در این بخش اطلاعاتی در مورد سفارش به شما داده می شود
                                </p>
                            </div>
                        </section>
                        <section class="body-content">

                            <table class="table  table-striped">

                                <tbody>
                                    <tr>
                                        <td>id</td>
                                        <td><?= $order['id'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>user</td>
                                        <td><?= $order['email'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>address</td>
                                        <td><?= $order['address'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>payment</td>
                                        <td><?= $order['trackingCode'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>payment status</td>
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
                                    </tr>
                                    <tr>
                                        <td>delivery</td>
                                        <td><?= $order['deliveryName'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>delivery amount</td>
                                        <td><?= $order['delivery_amount'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>delivery status</td>
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
                                    </tr>
                                    <tr>
                                        <td>delivery date</td>
                                        <td><?= $order['delivery_date'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>order final amount</td>
                                        <td><?= $order['order_final_amount'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>order discount amount</td>
                                        <td><?= $order['order_discount_amount'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>discount</td>
                                        <td><?= $order['code'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>order total discount amount</td>
                                        <td><?= $order['order_total_discount_amount'] ?></td>
                                    </tr>

                                    <tr>
                                        <td>order status</td>
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
                                            ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>created at</td>
                                        <td><?= jDate($order['created_at'], 'Y-m-d H:i:s') ?></td>
                                    </tr>


                                    <tr>
                                        <td>updated at</td>
                                        <td><?= jDate($order['updated_at'], 'Y-m-d H:i:s') ?></td>
                                    </tr>


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