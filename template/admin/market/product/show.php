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

            <section class="row">
                <section class="col-12">
                    <?php
                    require_once BASE_PATH . '/template/admin/layouts/partials/success.php'
                    ?>
                    <div class="alert alert-success d-none" id="alert">

                    </div>
                    <section class="main-body-container">
                        <section class="main-body-container-header d-flex justify-content-between align-items-center">
                            <div>
                                <h5>
                                    محصول
                                </h5>
                                <p>
                                    در این بخش محصول به شما ارائه داده می شود
                                </p>
                            </div>

                        </section>
                        <section class="body-content">

                            <div class=" p-3 rounded">
                                <div class="d-flex border-bottom py-2">
                                    <h5 class="mx-2">نام : </h5>
                                    <h6><?= $product['name'] ?></h6>
                                </div>
                                <div class="d-flex border-bottom py-2">
                                    <h5 class="mx-2">slug : </h5>
                                    <h6><?= $product['slug'] ?></h6>
                                </div>
                                <div class="d-flex border-bottom py-2">
                                    <h5 class="mx-2">بازدید : </h5>
                                    <h6><?= $product['view'] ?></h6>
                                </div>
                                <div class="d-flex border-bottom py-2">
                                    <h5 class="mx-2">توضیح کوتاه : </h5>
                                    <h6><?= $product['introduction'] ?></h6>
                                </div>
                                <div class="d-flex border-bottom py-2">
                                    <h5 class="mx-2">عکس : </h5>
                                    <img src="<?= asset($product['image']) ?>">
                                </div>
                                <div class="d-flex border-bottom py-2">
                                    <h5 class="mx-2">طول : </h5>
                                    <h6><?= $product['length'] ?></h6>
                                </div>
                                <div class="d-flex border-bottom py-2">
                                    <h5 class="mx-2">وزن : </h5>
                                    <h6><?= $product['weight'] ?></h6>
                                </div>
                                <div class="d-flex border-bottom py-2">
                                    <h5 class="mx-2">ارتفاع : </h5>
                                    <h6><?= $product['height'] ?></h6>
                                </div>
                                <div class="d-flex border-bottom py-2">
                                    <h5 class="mx-2">قیمت : </h5>
                                    <h6><?= $product['price'] ?></h6>
                                </div>
                                <div class="d-flex border-bottom py-2">
                                    <h5 class="mx-2">وضعیت : </h5>
                                    <h6><?= $product['status'] ?></h6>
                                </div>
                                <div class="d-flex border-bottom py-2">
                                    <h5 class="mx-2">تگ ها : </h5>
                                    <h6><?= $product['tags'] ?></h6>
                                </div>
                                <div class="d-flex border-bottom py-2">
                                    <h5 class="mx-2">تعداد فروخته شده : </h5>
                                    <h6><?= $product['sold_number'] ?></h6>
                                </div>
                                <div class="d-flex border-bottom py-2">
                                    <h5 class="mx-2">تعداد قابل فروش : </h5>
                                    <h6><?= $product['marketable_number'] ?></h6>
                                </div>
                                <div class="d-flex border-bottom py-2">
                                    <h5 class="mx-2">برند : </h5>
                                    <h6><?= $product['brand_id'] ?></h6>
                                </div>
                                <div class="d-flex border-bottom py-2">
                                    <h5 class="mx-2">دسته بندی : </h5>
                                    <h6><?= $product['product_category_id'] ?></h6>
                                </div>
                                <div class="d-flex border-bottom py-2">
                                    <h5 class="mx-2">تاریخ ایجاد : </h5>
                                    <h6><?= jDate($product['created_at']) ?></h6>
                                </div>
                            </div>

                        </section>
                    </section>
                </section>
            </section>



        </section>
    </section>

</body>

</html>