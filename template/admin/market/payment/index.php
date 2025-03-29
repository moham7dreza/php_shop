<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once BASE_PATH . '/template/admin/layouts/head-tag.php';
    ?>
    <title>پرداخت ها</title>
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
                                    پرداخت ها
                                </h5>
                                <p>
                                    در این بخش اطلاعاتی در مورد پرداخت ها به شما داده می شود
                                </p>
                            </div>

                        </section>
                        <section class="body-content">

                            <table class="table">
                                <thead class="table-info">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">کد پیگیری</th>
                                        <th scope="col">مبلغ</th>
                                        <th scope="col">کاربر</th>
                                        <th scope="col">درگاه</th>
                                        <th scope="col">پیغام</th>
                                        <th scope="col">درایور</th>
                                        <th scope="col">کد اختصاصی</th>
                                        <th scope="col">شناسه معامله</th>
                                        <th scope="col">شناسه پیگیری</th>
                                        <th scope="col">وضعیت</th>
                                        <th scope="col">تنظیمات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($payments as $payment) { ?>
                                        <tr>
                                            <th><?= $payment['id'] ?></th>
                                            <td><?= $payment['tracking_code'] ?></td>
                                            <td><?= $payment['amount'] ?></td>
                                            <td><?= $payment['email'] ?></td>
                                            <td><?= $payment['gateway'] ?></td>
                                            <td><?= $payment['msg'] ?></td>
                                            <td><?= $payment['driver'] ?></td>
                                            <td><?= $payment['uuid'] ?></td>
                                            <td><?= $payment['transaction_id'] ?></td>
                                            <td><?= $payment['reference_id'] ?></td>
                                            <td>
                                                <select class="form-select status" data-id="<?= $payment['id'] ?>">
                                                    <option value="1" <?php if ($payment['status'] == 1)  echo 'selected' ?>> پرداخت شده</option>
                                                    <option value="0" <?php if ($payment['status'] == 2)  echo 'selected' ?>>پرداخت نشده</option>
                                                </select>

                                            </td>
                                            <td>
                                                <div class="d-flex">


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
                        `http://localhost/php-shop/admin/market/payment/change-status/${id}`
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