<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once BASE_PATH . '/template/admin/layouts/head-tag.php';
    ?>
    <title>محصولات</title>
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
                                    ویرایش محصول
                                </h5>

                            </div>
                            <div>
                                <a href="<?= url('admin/market/product') ?>" class="btn btn-warning">بازگشت</a>
                            </div>
                        </section>
                        <section class="body-content">

                            <form class="row g-3" action="<?= url('admin/market/product/update/' . $product['id']) ?>" method="post" enctype="multipart/form-data" id="form">
                                <div class="col-md-12 col-lg-6">
                                    <label for="name" class="form-label">نام</label>
                                    <input type="text" name="name" class="form-control" id="name" value="<?= $product['name'] ?>">
                                </div>

                                <div class="col-md-12 col-lg-6">
                                    <label for="product_category_id" class="form-label">دسته بندی</label>
                                    <select class="form-select" name="product_category_id" id="product_category_id">
                                        <?php
                                        foreach ($categories as $category) {
                                        ?>
                                            <option value="<?= $category['id'] ?>" <?php if ($product['product_category_id'] == $category['id']) echo "selected" ?>><?= $category['name'] ?></option>
                                        <?php
                                        }
                                        ?>

                                    </select>
                                </div>


                                <div class="col-md-12 col-lg-6">
                                    <label for="brand_id" class="form-label">برند</label>
                                    <select class="form-select" name="brand_id" id="brand_id">
                                        <?php
                                        foreach ($brands as $brand) {
                                        ?>
                                            <option value="<?= $brand['id'] ?>" <?php if ($product['brand_id'] == $brand['id']) echo "selected" ?>><?= $brand['persian_name'] ?></option>
                                        <?php
                                        }
                                        ?>

                                    </select>
                                </div>


                                <div class="col-md-12 col-lg-6">
                                    <label for="slug" class="form-label">slug</label>
                                    <input type="text" name="slug" class="form-control" id="slug" value="<?= $product['slug'] ?>">
                                </div>

                                <div class="col-md-12">
                                    <label for="introduction" class="form-label">معرفی</label>
                                    <textarea class="form-control" id="introduction" name="introduction" placeholder="introduction ..." rows="5" required autofocus><?= $product['introduction'] ?></textarea>

                                </div>


                                <div class="col-md-12 col-lg-4">
                                    <label for="weight" class="form-label">وزن</label>
                                    <input type="text" name="weight" class="form-control" id="weight" value="<?= $product['weight'] ?>">
                                </div>

                                <div class="col-md-12 col-lg-4">
                                    <label for="height" class="form-label">ارتفاع</label>
                                    <input type="text" name="height" class="form-control" id="height" value="<?= $product['height'] ?>">
                                </div>

                                <div class="col-md-12 col-lg-4">
                                    <label for="length" class="form-label">طول</label>
                                    <input type="text" name="length" class="form-control" id="length" value="<?= $product['length'] ?>">
                                </div>

                                <div class="col-md-12 col-lg-6">
                                    <label for="price" class="form-label">قیمت</label>
                                    <input type="text" name="price" class="form-control" id="price" value="<?= $product['price'] ?>">
                                </div>

                                <div class="mb-3 col-md-12 col-lg-6">
                                    <label for="image" class="form-label">عکس</label>
                                    <input class="form-control" name="image" type="file" id="image">
                                    <img src="<?= asset($product['image']) ?>" alt="" width="100" height="100">
                                </div>

                                <div class="col-md-6">
                                    <label for="status" class="form-label">وضعیت</label>
                                    <select class="form-select" name="status" id="status">
                                        <option value="1" <?php if ($product['status'] == 1) echo "selected" ?>>فعال</option>
                                        <option value="2" <?php if ($product['status'] == 2) echo "selected" ?>>غیر فعال</option>
                                    </select>
                                </div>


                                </div>

                                <div class="col-md-6">
                                    <label for="tags" class="form-label">تگ ها</label>
                                    <select class="form-control" id="select_tags" multiple="multiple">
                                    </select>
                                    <input type="hidden" id="tags" name="tags" value="<?= $product['tags'] ?>">

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
            var tags_input = $('#tags');
            var select_tags = $('#select_tags');
            var default_tags = tags_input.val();
            var default_data = null


            if (tags_input.val() !== null && tags_input.val().length > 0) {
                default_data = default_tags.split(',')
            }

            select_tags.select2({
                placeholder: 'لطفا تگ های خود را وارد نمایید',
                tags: true,
                data: default_data
            })

            select_tags.children('option').attr('selected', true).trigger('change');

            $('#form').submit(function(event) {
                if (select_tags.val() !== null && select_tags.val().length > 0) {
                    var selectedSource = select_tags.val().join(',');
                    tags_input.val(selectedSource)
                }
            })


        });
    </script>


</body>

</html>