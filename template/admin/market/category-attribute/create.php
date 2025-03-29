<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once BASE_PATH . '/template/admin/layouts/head-tag.php';
    ?>
    <title>ویژگی ها</title>
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
                                    ساخت ویژگی
                                </h5>

                            </div>
                            <div>
                                <a href="<?= url('admin/market/category-attribute') ?>" class="btn btn-warning">بازگشت</a>
                            </div>
                        </section>
                        <section class="body-content">

                            <form class="row g-3" action="<?= url('admin/market/category-attribute/store') ?>" method="post">
                                <div class="col-md-12">
                                    <label for="name" class="form-label">نام</label>
                                    <input type="text" name="name" class="form-control" id="name" value="<?= old('name') ?>">
                                </div>

                                <div class="col-md-12">
                                    <label for="unit" class="form-label">واحد اندازه گیری </label>
                                    <input type="text" name="unit" class="form-control" id="unit" value="<?= old('unit') ?>">
                                </div>

                                <div class="col-md-12">
                                    <label for="product_category_id" class="form-label">دسته بندی</label>
                                    <select class="form-select" name="product_category_id" id="product_category_id">
                                        <?php
                                        foreach ($categories as $category) {
                                        ?>
                                            <option value="<?= $category['id'] ?>" <?php if (old('product_category_id') == $category['id']) echo "selected" ?>><?= $category['name'] ?></option>
                                        <?php
                                        }
                                        ?>

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