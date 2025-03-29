<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once BASE_PATH . '/template/admin/layouts/head-tag.php';
    ?>
    <title>روش های ارسال</title>
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

            <?php
            require_once BASE_PATH . '/template/admin/layouts/partials/error.php';
            ?>

            <section class="row">
                <section class="col-12">
                    <section class="main-body-container">
                        <section class="main-body-container-header d-flex justify-content-between align-items-center">
                            <div>
                                <h5>
                                    ساخت روش ارسال
                                </h5>

                            </div>
                            <div>
                                <a href="<?= url('admin/market/delivery') ?>" class="btn btn-warning">بازگشت</a>
                            </div>
                        </section>
                        <section class="body-content">

                            <form class="row g-3" action="<?= url('admin/market/delivery/store') ?>" method="post">
                                <div class="col-6">
                                    <label for="name" class="form-label">نام</label>
                                    <input type="text" name="name" class="form-control" id="name" value="<?= old('name') ?>">
                                </div>

                                <div class="col-6">
                                    <label for="amount" class="form-label">قیمت</label>
                                    <input type="text" name="amount" class="form-control" id="amount" value="<?= old('amount') ?>">
                                </div>

                                <div class="col-6">
                                    <label for="time" class="form-label">زمان</label>
                                    <input type="text" name="time" class="form-control" id="time" value="<?= old('time') ?>">
                                </div>

                                <div class="col-6">
                                    <label for="unit" class="form-label">واحد</label>
                                    <input type="text" name="unit" class="form-control" value="<?= old('unit') ?>" id="unit">
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="btn btn-success">ثبت</button>
                                </div>
                            </form>

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