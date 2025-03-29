<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once BASE_PATH . '/template/admin/layouts/head-tag.php';
    ?>
    <title>کاربران</title>
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
                                    کاربران
                                </h5>
                                <p>
                                    در این بخش اطلاعاتی در مورد کاربران به شما داده می شود
                                </p>
                            </div>

                        </section>
                        <section class="body-content">

                            <table class="table">
                                <thead class="table-info">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">نام</th>
                                        <th scope="col">موبایل</th>
                                        <th scope="col">ایمیل</th>
                                        <th scope="col">دسترسی</th>
                                        <th scope="col">تنظیمات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($users as $user) { ?>
                                        <tr>
                                            <th><?= $user['id'] ?></th>
                                            <td><?= $user['name'] ?></td>
                                            <td><?= $user['mobile'] ?></td>
                                            <td><?= $user['email'] ?></td>
                                            <td><?= $user['permission'] ?></td>
                                            <td>
                                                <div class="d-flex">

                                                    <div class="mx-2">
                                                        <a href="<?= url('admin/user/user/edit/' . $user['id']) ?>" class="text-warning">
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