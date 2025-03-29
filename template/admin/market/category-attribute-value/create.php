<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once BASE_PATH . '/template/admin/layouts/head-tag.php';
    ?>
    <title>مقادیر ویژگی ها</title>
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
                                    ساخت مقادیر
                                </h5>

                            </div>
                            <div>
                                <a href="<?= url('admin/market/category-attribute-value/' . $attribute['id']) ?>" class="btn btn-warning">بازگشت</a>
                            </div>
                        </section>
                        <section class="body-content">

                            <form class="row g-3" action="<?= url('admin/market/category-attribute-value/' . $attribute['id'] . '/store') ?>" method="post">
                                <div class="col-6">
                                    <label for="value" class="form-label">مقدار</label>
                                    <input type="text" name="value" class="form-control" id="value" value="<?= old('value') ?>">
                                </div>

                                <div class="col-6">
                                    <label for="increase_price" class="form-label">افزایش قیمت </label>
                                    <input type="text" name="increase_price" class="form-control" id="increase_price" value="<?= old('increase_price') ?>">
                                </div>

                                <div class="col-6">
                                    <label for="product_id" class="form-label">محصول</label>
                                    <select class="form-select" name="product_id" id="product_id">
                                        <?php
                                        foreach ($products as $product) {
                                        ?>
                                            <option value="<?= $product['id'] ?>" <?php if (old('product_id') == $product['id']) echo "selected" ?>><?= $product['name'] ?></option>
                                        <?php
                                        }
                                        ?>

                                    </select>
                                </div>


                                <div class="col-6">
                                    <label for="type" class="form-label">حالت</label>
                                    <select class="form-select" name="type" id="type">
                                        <option value="1" <?php if (old('type') == 1) echo "selected" ?>>تکی</option>
                                        <option value="2" <?php if (old('type') == 2) echo "selected" ?>>چندگانه</option>
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