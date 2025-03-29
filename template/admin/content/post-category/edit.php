<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once BASE_PATH . '/template/admin/layouts/head-tag.php';
    ?>
    <title>دسته بندی پست ها</title>
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
                                    ویرایش دسته بندی
                                </h5>

                            </div>
                            <div>
                                <a href="<?= url('admin/content/post-category') ?>" class="btn btn-warning">بازگشت</a>
                            </div>
                        </section>
                        <section class="body-content">

                            <form class="row g-3" action="<?= url('admin/content/post-category/update/' . $category['id']) ?>" method="post" enctype="multipart/form-data">
                                <div class="col-md-6">
                                    <label for="name" class="form-label">نام</label>
                                    <input type="text" name="name" class="form-control" id="name" value="<?= $category['name'] ?>">
                                </div>
                                <div class="col-6">
                                    <label for="slug" class="form-label">slug</label>
                                    <input type="text" name="slug" class="form-control" value="<?= $category['slug'] ?>" id="slug">
                                </div>
                                <div class="col-md-12">
                                    <label for="description" class="form-label">توضیحات</label>
                                    <input type="text" name="description" value="<?= $category['description'] ?>" class="form-control" id="description">
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="image" class="form-label">عکس</label>
                                    <input class="form-control" name="image" type="file" id="image">
                                    <img src="<?= asset($category['image']) ?>" alt="" width="100" height="100">
                                </div>
                                <div class="col-md-6">
                                    <label for="status" class="form-label">وضعیت</label>
                                    <select class="form-select" name="status" id="status">
                                        <option value="1" <?php if ($category['status'] == 1) echo "selected" ?>>فعال</option>
                                        <option value="2" <?php if ($category['status'] == 2) echo "selected" ?>>غیر فعال</option>
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