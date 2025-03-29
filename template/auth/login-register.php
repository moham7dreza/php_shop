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
            <?php
            $message = flash('input_error');
            if (!empty($message)) {
            ?>
                <section>
                    <h5 class="text-danger"><?= $message ?></h5>
                </section>
            <?php } ?>
            <section class="login-title">ورود / ثبت نام</section>
            <section class="login-info">شماره موبایل یا پست الکترونیک خود را وارد کنید</section>
            <form action="<?= url('login-register-store') ?>" method="post">
                <section class="login-input-text">
                    <input type="text" name="mobile">
                </section>
                <section class="login-btn d-grid g-2"><button type="submit" class="btn btn-danger">ورود به آمازون</button></section>
            </form>

            <section class="login-terms-and-conditions"><a href="#">شرایط و قوانین</a> را خوانده ام و پذیرفته ام</section>
        </section>
    </section>





    <?php
    require_once BASE_PATH . '/template/app/layouts/scripts.php';
    ?>




</body>

</html>