<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once BASE_PATH . '/template/admin/layouts/head-tag.php';
    ?>
    <title>بنر ها</title>
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
                                    ویرایش بنر
                                </h5>

                            </div>
                            <div>
                                <a href="<?= url('admin/content/banner') ?>" class="btn btn-warning">بازگشت</a>
                            </div>
                        </section>
                        <section class="body-content">

                            <form class="row g-3" action="<?= url('admin/content/banner/update/' . $banner['id']) ?>" method="post" enctype="multipart/form-data">
                                <div class="col-md-12">
                                    <label for="title" class="form-label">عنوان</label>
                                    <input type="text" name="title" class="form-control" id="title" value="<?= $banner['title'] ?>">
                                </div>

                                <div class="col-md-12">
                                    <label for="url" class="form-label">آدرس</label>
                                    <input type="text" name="url" value="<?= $banner['url'] ?>" class="form-control" id="url">
                                </div>

                                <div class="mb-3 col-md-12">
                                    <label for="image" class="form-label">عکس</label>
                                    <input class="form-control" name="image" type="file" id="image">
                                    <img src="<?= asset($banner['image']) ?>" alt="" width="150" height="150">

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