<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once BASE_PATH . '/template/admin/layouts/head-tag.php';
    ?>
    <title>برند ها</title>
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
                                    ساخت برند
                                </h5>

                            </div>
                            <div>
                                <a href="<?= url('admin/market/brand') ?>" class="btn btn-warning">بازگشت</a>
                            </div>
                        </section>
                        <section class="body-content">

                            <form class="row g-3" action="<?= url('admin/market/brand/update/' . $brand['id']) ?>" method="post" enctype="multipart/form-data">
                                <div class="col-md-12">
                                    <label for="persian_name" class="form-label">عنوان</label>
                                    <input type="text" name="persian_name" class="form-control" id="persian_name" value="<?= $brand['persian_name'] ?>">
                                </div>

                                <div class="col-md-12">
                                    <label for="english_name" class="form-label">عنوان انگلیسی</label>
                                    <input type="text" name="english_name" class="form-control" id="english_name" value="<?= $brand['english_name'] ?>">
                                </div>

                                <div class="mb-3 col-md-12">
                                    <label for="logo" class="form-label">عکس</label>
                                    <input class="form-control" name="logo" type="file" id="logo">
                                    <img src="<?= asset($brand['logo']) ?>" width="150" height="150" alt="">
                                </div>

                                <div class="col-12">
                                    <label for="slug" class="form-label">slug</label>
                                    <input type="text" name="slug" class="form-control" value="<?= $brand['slug'] ?>" id="slug">
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