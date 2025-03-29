<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once BASE_PATH . '/template/admin/layouts/head-tag.php';
    ?>
    <title>تخفیفات</title>
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
                                    ساخت تخفیف
                                </h5>

                            </div>
                            <div>
                                <a href="<?= url('admin/market/discount') ?>" class="btn btn-warning">بازگشت</a>
                            </div>
                        </section>
                        <section class="body-content">

                            <form class="row g-3" action="<?= url('admin/market/discount/store') ?>" method="post">
                                <div class="col-6">
                                    <label for="code" class="form-label">کد</label>
                                    <input type="text" name="code" class="form-control" id="code" value="<?= old('code') ?>">
                                </div>

                                <div class="col-6">
                                    <label for="amount" class="form-label">میزان</label>
                                    <input type="text" name="amount" class="form-control" id="amount" value="<?= old('amount') ?>">
                                </div>


                                <div class="col-6">
                                    <label for="discount_celling" class="form-label">سقف</label>
                                    <input type="text" name="discount_celling" class="form-control" id="discount_celling" value="<?= old('discount_celling') ?>">
                                </div>

                                <div class="col-md-6">
                                    <label for="amount_type" class="form-label">نوع</label>
                                    <select class="form-select" name="amount_type" id="amount_type">
                                        <option value="1" <?php if (old('amount_type') == 1) echo "selected" ?>>درصدی</option>
                                        <option value="2" <?php if (old('amount_type') == 2) echo "selected" ?>>عددی</option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label for="type" class="form-label">نوع تخفیف</label>
                                    <select class="form-select" name="type" id="type">
                                        <option value="1" <?php if (old('type') == 1) echo "selected" ?>>عمومی</option>
                                        <option value="2" <?php if (old('type') == 2) echo "selected" ?>>خصوصی</option>
                                    </select>
                                </div>

                                <div class="col-6">
                                    <label for="user_id" class="form-label">کاربر</label>
                                    <select class="form-select" name="user_id" id="user_id">
                                        <option value="">هیچکدام</option>
                                        <?php
                                        foreach ($users as $user) {
                                        ?>
                                            <option value="<?= $user['id'] ?>" <?php if (old('user_id') == $user['id']) echo "selected" ?>><?= $user['email'] ?></option>
                                        <?php
                                        }
                                        ?>

                                    </select>
                                </div>



                                <div class="form-group col-6">
                                    <label for="start_date">تاریخ شروع</label>
                                    <input type="text" class="form-control d-none" id="start_date" name="start_date">
                                    <input type="text" class="form-control" id="start_date_view" required autofocus>
                                </div>

                                <div class="form-group col-6">
                                    <label for="end_date">تاریخ پایان</label>
                                    <input type="text" class="form-control d-none" id="end_date" name="end_date">
                                    <input type="text" class="form-control" id="end_date_view" required autofocus>
                                </div>


                                <div class="col-md-12">
                                    <label for="status" class="form-label">وضعیت</label>
                                    <select class="form-select" name="status" id="status">
                                        <option value="1" <?php if (old('status') == 1) echo "selected" ?>>فعال</option>
                                        <option value="2" <?php if (old('status') == 2) echo "selected" ?>>غیر فعال</option>
                                    </select>
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


    <script>
        $(document).ready(function() {

            $("#start_date_view").persianDatepicker({
                observer: true,
                format: "YYYY/MM/DD HH:mm:ss",
                toolbox: {
                    calendarSwitch: {
                        enabled: true
                    }
                },
                altField: '#start_date'
            })

            $("#end_date_view").persianDatepicker({
                observer: true,
                format: "YYYY/MM/DD HH:mm:ss",
                toolbox: {
                    calendarSwitch: {
                        enabled: true
                    }
                },
                altField: '#end_date'
            })
        });
    </script>

</body>

</html>