<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once BASE_PATH . '/template/admin/layouts/head-tag.php';
    ?>
    <title>انبار محصولات</title>
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
                                    انبار محصولات
                                </h5>
                                <p>
                                    در این بخش اطلاعاتی در مورد انبار محصولات به شما داده می شود
                                </p>
                            </div>

                        </section>
                        <section class="body-content">

                            <table class="table">
                                <thead class="table-info">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">نام</th>
                                        <th scope="col">عکس</th>
                                        <th scope="col">موجودی</th>
                                        <th scope="col">فروخته شده</th>
                                        <th scope="col">تنظیمات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($products as $product) { ?>
                                        <tr>
                                            <th><?= $product['id'] ?></th>
                                            <td><?= $product['name'] ?></td>
                                            <td>
                                                <img src="<?= $product['image'] ?  asset($product['image']) : '' ?>" alt="" width="100" height="100">
                                            </td>
                                            <td><?= $product['marketable_number'] ?></td>
                                            <td><?= $product['sold_number'] ?></td>
                                            <td>
                                                <div class="d-flex">
                                                    <div class="mx-2">
                                                        <a href="<?= url('admin/market/store/add-form/' . $product['id']) ?>" class="text-info">
                                                            <i class="fa fa-plus"></i>
                                                        </a>
                                                    </div>
                                                    <div class="mx-2">
                                                        <a href="<?= url('admin/market/store/edit/' . $product['id']) ?>" class="text-warning">
                                                            <i class="fa fa-edit"></i>
                                                        </a>

                                                    </div>
                                                    <div class="mx-2">
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