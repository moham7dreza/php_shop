<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once BASE_PATH . '/template/admin/layouts/head-tag.php';
    ?>
    <title>جزئیات سفارش</title>
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
                                    جزئیات سفارش
                                </h5>
                                <p>
                                    در این بخش اطلاعاتی در مورد جزئیات سفارش به شما داده می شود
                                </p>
                            </div>
                        </section>
                        <section class="body-content">

                            <table class="table">
                                <thead class="table-info">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">شماره سفارش</th>
                                        <th scope="col">محصول</th>
                                        <th scope="col">تعداد</th>
                                        <th scope="col">قیمت تک</th>
                                        <th scope="col">قیمت کل</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($items as $item) { ?>
                                        <tr>
                                            <th><?= $item['id'] ?></th>
                                            <td><?= $item['order_id'] ?></td>
                                            <td><?= $item['product_name'] ?></td>
                                            <td><?= $item['quantity'] ?></td>
                                            <td><?= $item['price'] ?></td>
                                            <td><?= $item['total_price'] ?></td>
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