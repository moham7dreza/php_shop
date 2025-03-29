<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once BASE_PATH . '/template/admin/layouts/head-tag.php';
    ?>
    <title>کاربران </title>
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
                                    ویرایش کاربر
                                </h5>

                            </div>
                            <div>
                                <a href="<?= url('admin/user/user') ?>" class="btn btn-warning">بازگشت</a>
                            </div>
                        </section>
                        <section class="body-content">

                            <form class="row g-3" action="<?= url('admin/user/user/update/' . $user['id']) ?>" method="post">
                                <div class="col-md-6">
                                    <label for="name" class="form-label">نام</label>
                                    <input type="text" name="name" class="form-control" id="name" value="<?= $user['name'] ?>">
                                </div>

                                <div class="col-md-6">
                                    <label for="permission" class="form-label">دسترسی</label>
                                    <select class="form-select" name="permission" id="permission">
                                        <option value="user" <?php if ($user['permission'] == 'user') echo "selected" ?>>کاربر</option>
                                        <option value="admin" <?php if ($user['permission'] == 'admin') echo "selected" ?>>ادمین</option>
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


</body>

</html>