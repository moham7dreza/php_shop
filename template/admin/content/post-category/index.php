<!DOCTYPE html>
<html lang="en">

<head>
    <?= require_once BASE_PATH . '/template/admin/layouts/head-tags.php' ?>
    <title>دسته بندی پست ها</title>
</head>

<body dir="rtl">

<?= require_once BASE_PATH . '/template/admin/layouts/partials/header.php' ?>

<section class="body-container">
    <?= require_once BASE_PATH . '/template/admin/layouts/partials/sidebar.php' ?>

    <section id="main-body" class="main-body">

        <section class="row">
            <section class="col-12">
                <section class="main-body-container">
                    <section class="main-body-container-header">
                        <h5>
                            دسته بندی پست ها
                        </h5>
                        <p>
                            در این بخش اطلاعاتی در مورد کاربران به شما داده می شود
                        </p>
                    </section>
                    <section class="body-content">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">نام</th>
                                <th scope="col">توضیحات</th>
                                <th scope="col">عکس</th>
                                <th scope="col">وضعیت</th>
                                <th scope="col">تنظیمات</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($categories as $category) { ?>
                                <tr>
                                    <th scope="row">
                                        <!--                                    --><?php //= $category->id ?>
                                    </th>
                                    <td><?= $category->name ?></td>
                                    <td><?= $category->description ?></td>
                                    <td><?= $category->image ?></td>
                                    <td><?= $category->statusText() ?></td>
                                    <td>
                                        <div class="d-flex">
                                            <div class="mx-2"><a href="" class="text-danger"><i class="fa fa-trash"></i></a>
                                            </div>
                                            <div class="mx-2"><a href="" class="text-info"><i
                                                            class="fa fa-edit"></i></a></div>
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

<?= require_once BASE_PATH . '/template/admin/layouts/scripts.php' ?>
</body>

</html>