<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once BASE_PATH . '/template/admin/layouts/head-tag.php';
    ?>
    <title>تخفیفات</title>
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
                                    تخفیفات
                                </h5>
                                <p>
                                    در این بخش اطلاعاتی در مورد تخفیفات به شما داده می شود
                                </p>
                            </div>
                            <div>
                                <a href="<?= url('admin/market/discount/create') ?>" class="btn btn-success">ساخت</a>
                            </div>
                        </section>
                        <section class="body-content">

                            <table class="table">
                                <thead class="table-info">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">کد</th>
                                        <th scope="col">مقدار</th>
                                        <th scope="col">نوع</th>
                                        <th scope="col">سقف</th>
                                        <th scope="col">نوع استفاده</th>
                                        <th scope="col">وضعیت</th>
                                        <th scope="col">شروع</th>
                                        <th scope="col">پایان</th>
                                        <th scope="col">کاربر</th>
                                        <th scope="col">تنظیمات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($discounts as $discount) { ?>
                                        <tr>
                                            <th><?= $discount['id'] ?></th>
                                            <td><?= $discount['code'] ?></td>
                                            <td><?= $discount['amount'] ?></td>
                                            <td><?= $discount['amount_type'] ?></td>
                                            <td><?= $discount['discount_celling'] ?></td>
                                            <td><?= $discount['type'] ?></td>
                                            <td><?= $discount['status'] ?></td>
                                            <td><?= $discount['start_date'] ?></td>
                                            <td><?= $discount['end_date'] ?></td>
                                            <td><?= $discount['email'] ?></td>

                                            <td>
                                                <div class="d-flex">
                                                    <div class="mx-2">
                                                        <a href="<?= url('admin/market/discount/delete/' . $discount['id']) ?>" class="text-danger">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    </div>
                                                    <div class="mx-2">
                                                        <a href="<?= url('admin/market/discount/edit/' . $discount['id']) ?>" class="text-warning">
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