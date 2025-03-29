<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once BASE_PATH . '/template/admin/layouts/head-tag.php';
    ?>
    <title>سوالات متداول</title>
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
                                    سوالات متداول
                                </h5>
                                <p>
                                    در این بخش اطلاعاتی در مورد سوالات متداول به شما داده می شود
                                </p>
                            </div>
                            <div>
                                <a href="<?= url('admin/content/faq/create') ?>" class="btn btn-success">ساخت</a>
                            </div>
                        </section>
                        <section class="body-content">

                            <table class="table">
                                <thead class="table-info">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">سوال</th>
                                        <th scope="col">پاسخ</th>
                                        <th scope="col">تنظیمات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($faqs as $faq) { ?>
                                        <tr>
                                            <th><?= $faq['id'] ?></th>
                                            <td><?= $faq['question'] ?></td>
                                            <td><?= $faq['answer'] ?></td>
                                            <td>
                                                <div class="d-flex">
                                                    <div class="mx-2">
                                                        <a href="<?= url('admin/content/faq/delete/' . $faq['id']) ?>" class="text-danger">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    </div>
                                                    <div class="mx-2">
                                                        <a href="<?= url('admin/content/faq/edit/' . $faq['id']) ?>" class="text-warning">
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