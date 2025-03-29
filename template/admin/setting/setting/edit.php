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

            <?php
            require_once BASE_PATH . '/template/admin/layouts/partials/error.php';
            ?>

            <section class="row">
                <section class="col-12">
                    <section class="main-body-container">
                        <section class="main-body-container-header d-flex justify-content-between align-items-center">
                            <div>
                                <h5>
                                    ویرایش تنظیمات
                                </h5>

                            </div>
                            <div>
                                <a href="<?= url('admin/setting/setting') ?>" class="btn btn-warning">بازگشت</a>
                            </div>
                        </section>
                        <section class="body-content">

                            <form class="row g-3" action="<?= url('admin/setting/setting/update/' . $setting['id']) ?>" method="post" enctype="multipart/form-data">
                                <div class="col-md-12">
                                    <label for="title" class="form-label">عنوان</label>
                                    <input type="text" name="title" class="form-control" id="title" value="<?= $setting['title'] ?>">
                                </div>

                                <div class="col-md-12">
                                    <label for="description" class="form-label">توضیحات</label>
                                    <input type="text" name="description" value="<?= $setting['description'] ?>" class="form-control" id="description">
                                </div>

                                <div class="col-md-12">
                                    <label for="keywords" class="form-label">کلمات کلیدی</label>
                                    <input type="text" name="keywords" value="<?= $setting['keywords'] ?>" class="form-control" id="keywords">
                                </div>

                                <div class="mb-3 col-md-12">
                                    <label for="logo" class="form-label">لوگو</label>
                                    <input class="form-control" name="logo" type="file" id="logo">
                                    <img src="<?= asset($setting['logo']) ?>" alt="" width="150" height="150">
                                </div>

                                <div class="mb-3 col-md-12">
                                    <label for="icon" class="form-label">آیکون</label>
                                    <input class="form-control" name="icon" type="file" id="icon">
                                    <img src="<?= asset($setting['icon']) ?>" alt="" width="150" height="150">
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