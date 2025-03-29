<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once BASE_PATH . '/template/admin/layouts/head-tag.php';
    ?>
    <title>تنظیمات</title>
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
                                    تنظیمات
                                </h5>
                                <p>
                                    در این بخش اطلاعاتی در مورد تنظیمات به شما داده می شود
                                </p>
                            </div>

                        </section>
                        <section class="body-content">

                            <table class="table">
                                <thead class="table-info">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">عنوان</th>
                                        <th scope="col">توضیحات</th>
                                        <th scope="col">کلمات کلیدی</th>
                                        <th scope="col">لوگو</th>
                                        <th scope="col">ایکون</th>
                                        <th scope="col">تنظیمات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>1</th>
                                        <td><?= $setting['title'] ?></td>
                                        <td><?= $setting['description'] ?></td>
                                        <td><?= $setting['keywords'] ?></td>
                                        <td>
                                            <img src="<?= $setting['logo'] ?  asset($setting['logo']) : '' ?>" alt="" width="100" height="100">
                                        </td>
                                        <td>
                                            <img src="<?= $setting['icon'] ?  asset($setting['icon']) : '' ?>" alt="" width="100" height="100">
                                        </td>

                                        <td>
                                            <div class="d-flex">
                                                <div class="mx-2">
                                                    <a href="<?= url('admin/setting/setting/edit/' . $setting['id']) ?>" class="text-warning">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
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
    <script>
        const statusBtns = document.querySelectorAll(".status");

        statusBtns.forEach((statusBtn) => {
            statusBtn.addEventListener("change", (e) => {
                let targetBtn = e.target;
                let id = targetBtn.dataset.id;

                fetch(
                        `http://localhost/php-shop/admin/content/post-category/change-status/${id}`
                    )
                    .then((response) => response.json())
                    .then((result) => {
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