<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once BASE_PATH . '/template/admin/layouts/head-tag.php';
    ?>
    <title> پست ها</title>
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
                                    پست ها
                                </h5>
                                <p>
                                    در این بخش اطلاعاتی در مورد پست ها به شما داده می شود
                                </p>
                            </div>
                            <div>
                                <a href="<?= url('admin/content/post/create') ?>" class="btn btn-success">ساخت</a>
                            </div>
                        </section>
                        <section class="body-content">

                            <table class="table">
                                <thead class="table-info">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">عنوان</th>
                                        <th scope="col">خلاصه</th>
                                        <th scope="col">عکس</th>
                                        <th scope="col">تاریخ انتشار</th>
                                        <th scope="col">نویسنده</th>
                                        <th scope="col">دسته بندی</th>
                                        <th scope="col">وضعیت</th>
                                        <th scope="col">وضعیت کامنت</th>
                                        <th scope="col">تگ ها</th>

                                        <th scope="col">تنظیمات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($posts as $post) { ?>
                                        <tr>
                                            <th><?= $post['id'] ?></th>
                                            <td><?= $post['title'] ?></td>
                                            <td><?= $post['summary'] ?></td>
                                            <td>
                                                <img src="<?= $post['image'] ?  asset($post['image']) : '' ?>" alt="" width="100" height="100">
                                            </td>
                                            <td><?= jDate($post['published_at']) ?></td>
                                            <td><?= $post['email'] ?></td>
                                            <td><?= $post['categoryName'] ?></td>
                                            <td>
                                                <select class="form-select status" data-id="<?= $post['id'] ?>">
                                                    <option value="1" <?php if ($post['status'] == 1)  echo 'selected' ?>> فعال</option>
                                                    <option value="0" <?php if ($post['status'] == 2)  echo 'selected' ?>>غیر فعال</option>
                                                </select>

                                            </td>
                                            <td>
                                                <select class="form-select comment" data-id="<?= $post['id'] ?>">
                                                    <option value="1" <?php if ($post['commentable'] == 1)  echo 'selected' ?>> فعال</option>
                                                    <option value="0" <?php if ($post['commentable'] == 2)  echo 'selected' ?>>غیر فعال</option>
                                                </select>

                                            </td>
                                            <td><?= $post['tags'] ?></td>

                                            <td>
                                                <div class="d-flex">
                                                    <div class="mx-2">
                                                        <a href="<?= url('admin/content/post/delete/' . $post['id']) ?>" class="text-danger">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    </div>
                                                    <div class="mx-2">
                                                        <a href="<?= url('admin/content/post/edit/' . $post['id']) ?>" class="text-warning">
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
    <script>
        const statusBtns = document.querySelectorAll(".status");

        statusBtns.forEach((statusBtn) => {
            statusBtn.addEventListener("change", (e) => {
                let targetBtn = e.target;
                let id = targetBtn.dataset.id;

                fetch(
                        `http://localhost/php-shop/admin/content/post/change-status/${id}`
                    )
                    .then((response) => response.json())
                    .then((result) => {
                        console.log(result);
                        if (result.status == "ok") {
                            const alert = document.getElementById("alert");
                            alert.classList.remove("d-none");
                            alert.innerHTML = result.message;
                        }
                    });
            });
        });

        const commentBtns = document.querySelectorAll(".comment");

        commentBtns.forEach((commentBtn) => {
            commentBtn.addEventListener("change", (e) => {
                let targetBtn = e.target;
                let id = targetBtn.dataset.id;

                fetch(
                        `http://localhost/php-shop/admin/content/post/change-commentable/${id}`
                    )
                    .then((response) => response.json())
                    .then((result) => {
                        console.log(result);
                        if (result.status == "ok") {
                            const alert = document.getElementById("alert");
                            alert.classList.remove("d-none");
                            alert.innerHTML = result.message;
                        }
                    });
            });
        });
    </script>



</body>

</html>