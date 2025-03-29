<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once BASE_PATH . '/template/admin/layouts/head-tag.php';
    ?>
    <title>روش های ارسال </title>
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
                                    روش های ارسال
                                </h5>
                                <p>
                                    در این بخش اطلاعاتی در مورد روش های ارسال به شما داده می شود
                                </p>
                            </div>
                            <div>
                                <a href="<?= url('admin/market/delivery/create') ?>" class="btn btn-success">ساخت</a>
                            </div>
                        </section>
                        <section class="body-content">

                            <table class="table">
                                <thead class="table-info">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">نام</th>
                                        <th scope="col">قیمت</th>
                                        <th scope="col">زمان</th>
                                        <th scope="col">واحد</th>
                                        <th scope="col">تنظیمات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($deliveries as $delivery) { ?>
                                        <tr>
                                            <th><?= $delivery['id'] ?></th>
                                            <td><?= $delivery['name'] ?></td>
                                            <td><?= $delivery['amount'] ?></td>
                                            <td><?= $delivery['time'] ?></td>
                                            <td><?= $delivery['unit'] ?></td>
                                            <td>
                                                <div class="d-flex">
                                                    <div class="mx-2">
                                                        <a href="<?= url('admin/market/delivery/delete/' . $delivery['id']) ?>" class="text-danger">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    </div>
                                                    <div class="mx-2">
                                                        <a href="<?= url('admin/market/delivery/edit/' . $delivery['id']) ?>" class="text-warning">
                                                            <i class="fa fa-edit"></i>
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