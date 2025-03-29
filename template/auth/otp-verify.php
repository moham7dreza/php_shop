<!doctype html>
<html lang="fa" dir="rtl">

<head>
    <?php
    require_once BASE_PATH . '/template/app/layouts/head-tag.php';
    ?>
    <title>ورود / ثبت نام</title>
</head>

<body>



    <section class="vh-100 d-flex justify-content-center align-items-center pb-5">
        <section class="login-wrapper mb-5">
            <section class="login-logo">
                <img src="<?= asset('public/app/assets/images/logo/4.png') ?>" alt="">
            </section>

            <section class="login-title">تایید کد</section>
            <?php
            $message = flash('otp_error');
            if (!empty($message)) { ?>
                <small class="text-danger"><?= $message ?></small>
            <?php }
            ?>
            <section class="login-info">کد ارسال شده خود را وارد کنید</section>
            <form action="<?= url('otp-verify-store') ?>" method="post">
                <section class="login-input-text">
                    <input type="text" name="otp">
                    <input type="hidden" name="phoneNumber" value="<?= $_GET['phoneNumber'] ?>">
                </section>
                <section class="login-btn d-grid g-2"><button type="submit" class="btn btn-danger">تایید</button></section>
            </form>

        </section>
    </section>





    <?php
    require_once BASE_PATH . '/template/app/layouts/scripts.php';
    ?>




</body>

</html>