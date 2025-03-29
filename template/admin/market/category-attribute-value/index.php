<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once BASE_PATH . '/template/admin/layouts/head-tag.php';
    ?>
    <title>مقادیر ویژگی </title>
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
                                    مقادیر
                                </h5>
                                <p>
                                    در این بخش اطلاعاتی در مورد مقادیر ویژگی به شما داده می شود
                                </p>
                            </div>
                            <div>
                                <a href="<?= url("admin/market/category-attribute-value/" . $attribute['id'] . "/create") ?>" class="btn btn-success">ساخت</a>
                            </div>
                        </section>
                        <section class="body-content">

                            <table class="table">
                                <thead class="table-info">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">مقدار</th>
                                        <th scope="col">تاثیر قیمت</th>
                                        <th scope="col">محصول</th>
                                        <th scope="col">نوع</th>
                                        <th scope="col">تنظیمات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($values as $value) { ?>
                                        <?php
                                        ?>
                                        <tr>
                                            <th><?= $value['id'] ?></th>
                                            <td><?= json_decode($value['value'], true)['value'] ?></td>
                                            <td><?= json_decode($value['value'], true)['increase_price'] ?></td>
                                            <td><?= $value['product_name'] ?></td>
                                            <td><?= $value['type'] == 1 ? 'single' : 'multiple'  ?></td>

                                            <td>
                                                <div class="d-flex">
                                                    <div class="mx-2">
                                                        <a href="<?= url('admin/market/category-attribute-value/delete/' . $value['id']) ?>" class="text-danger">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    </div>
                                                    <div class="mx-2">
                                                        <a href="<?= url('admin/market/category-attribute-value/' . $attribute['id'] . '/edit/' . $value['id']) ?>" class="text-warning">
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