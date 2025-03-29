<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once BASE_PATH . '/template/admin/layouts/head-tag.php';
    ?>
    <title>نظرات</title>
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
                                    نظرات
                                </h5>
                                <p>
                                    در این بخش لیست نظرات به شما ارائه داده می شود
                                </p>
                            </div>

                        </section>
                        <section class="body-content">

                            <table class="table">
                                <thead class="table-info">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">نظر</th>
                                        <th scope="col">نویسنده</th>
                                        <th scope="col">محصول</th>
                                        <th scope="col">پاسخ</th>
                                        <th scope="col">وضعیت</th>
                                        <th scope="col">تنظیمات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($comments as $comment) { ?>
                                        <tr>
                                            <th><?= $comment['id'] ?></th>
                                            <td><?= $comment['body'] ?></td>
                                            <td><?= $comment['email'] ?></td>
                                            <td><?= $comment['product_name'] ?></td>
                                            <td><?= $comment['parent_id'] ? 'هست' : '-' ?></td>

                                            <td>
                                                <select class="form-select status" data-id="<?= $comment['id'] ?>">
                                                    <option <?php if ($comment['status'] == "unseen")  echo 'selected' ?>> دیده نشده</option>
                                                    <option value="seen" <?php if ($comment['status'] == "seen")  echo 'selected' ?>>دیده شده</option>
                                                    <option value="approved" <?php if ($comment['status'] == "approved")  echo 'selected' ?>>تایید شده</option>
                                                </select>

                                            </td>
                                            <td>
                                                <div class="d-flex">

                                                    <div class="mx-2">
                                                        <a href="<?= url('admin/content/comment/show/' . $comment['id']) ?>" class="text-warning">
                                                            <i class="fa fa-eye"></i>
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
                let value = targetBtn.value;

                fetch(
                        `http://localhost/php-shop/admin/content/comment/change-status/${id}`, {
                            method: "POST",
                            headers: {
                                "Accept": "application/json",
                                'Content-Type': "application/json"
                            },
                            body: JSON.stringify({
                                value: value,
                            })
                        }
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