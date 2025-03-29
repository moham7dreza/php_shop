<!doctype html>
<html lang="fa" dir="rtl">

<head>
    <?php
    require_once BASE_PATH . '/template/app/layouts/head-tag.php';
    ?>
    <title>فروشگاه آمازون</title>
</head>

<body>



    <?php
    require_once BASE_PATH . '/template/app/layouts/partials/header.php';
    ?>


    <!-- start main one col -->
    <main id="main-body-one-col" class="main-body">

        <!-- start product -->
        <section class="mb-4">
            <section class="container-xxl">
                <section class="row">
                    <section class="col">
                        <!-- start vontent header -->
                        <section class="content-header">
                            <section class="d-flex justify-content-between align-items-center">
                                <h2 class="content-header-title">
                                    <span><?= $product['name'] ?></span>
                                </h2>
                                <section class="content-header-link">
                                    <!--<a href="#">مشاهده همه</a>-->
                                </section>
                            </section>
                        </section>

                        <section class="row mt-4">

                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <?php foreach ($categories as $category) { ?>
                                        <li class="breadcrumb-item"><a href="#">
                                                <?= $category['name'] ?>
                                            </a></li>
                                    <?php } ?>
                                    <li class="breadcrumb-item"><?= $product['name'] ?></li>
                                </ol>
                            </nav>
                            <!-- start image gallery -->
                            <section class="col-md-4">
                                <section class="content-wrapper bg-white p-3 rounded-2 mb-4">
                                    <section class="product-gallery">
                                        <section class="product-gallery-selected-image mb-3">
                                            <img src="<?= asset($product['image']) ?>" alt="">
                                        </section>
                                        <section class="product-gallery-thumbs">
                                            <?php
                                            foreach ($galleryImages as $galleryImage) {
                                            ?>
                                                <img class="product-gallery-thumb" src="<?= asset($galleryImage['image']) ?>" alt="" data-input="<?= asset($galleryImage['image']) ?>">
                                            <?php } ?>
                                        </section>
                                    </section>
                                </section>
                            </section>
                            <!-- end image gallery -->

                            <!-- start product info -->
                            <section class="col-md-5">

                                <section class="content-wrapper bg-white p-3 rounded-2 mb-4">

                                    <!-- start vontent header -->
                                    <section class="content-header mb-3">
                                        <section class="d-flex justify-content-between align-items-center">
                                            <h2 class="content-header-title content-header-title-small">
                                                <?= $product['name'] ?>
                                            </h2>
                                            <section class="content-header-link">
                                                <!--<a href="#">مشاهده همه</a>-->
                                            </section>
                                        </section>
                                    </section>
                                    <section class="product-info">

                                        <!-- <p><span>رنگ : قهوه ای</span></p>
                                        <p>
                                            <span style="background-color: #523e02;" class="product-info-colors me-1" data-bs-toggle="tooltip" data-bs-placement="bottom" title="قهوه ای تیره"></span>
                                            <span style="background-color: #0c4128;" class="product-info-colors me-1" data-bs-toggle="tooltip" data-bs-placement="bottom" title="سبز یشمی"></span>
                                            <span style="background-color: #fd7e14;" class="product-info-colors me-1" data-bs-toggle="tooltip" data-bs-placement="bottom" title="نارنجی پرتقالی"></span>
                                        </p> -->
                                        <p><i class="fa fa-shield-alt cart-product-selected-warranty me-1"></i> <span> گارانتی اصالت و سلامت فیزیکی کالا</span></p>
                                        <p><i class="fa fa-store-alt cart-product-selected-store me-1"></i> <span>کالا موجود در انبار</span></p>
                                        <p><a class="btn btn-light  btn-sm text-decoration-none" href="#"><i class="fa fa-heart text-danger"></i> افزودن به علاقه مندی</a></p>
                                        <section>
                                            <?php
                                            if ($product['marketable_number'] > 0) {
                                            ?>
                                                <section class="cart-product-number d-inline-block ">
                                                    <button class="cart-number-down" type="button">-</button>
                                                    <input form="myform" name="quantity" type="number" min="1" max="5" step="1" value="1" readonly="readonly">
                                                    <button class="cart-number-up" type="button">+</button>
                                                </section>
                                            <?php } ?>
                                        </section>
                                        <p class="mb-3 mt-5">
                                            <i class="fa fa-info-circle me-1"></i>کاربر گرامی خرید شما هنوز نهایی نشده است. برای ثبت سفارش و تکمیل خرید باید ابتدا آدرس خود را انتخاب کنید و سپس نحوه ارسال را انتخاب کنید. نحوه ارسال انتخابی شما محاسبه و به این مبلغ اضافه شده خواهد شد. و در نهایت پرداخت این سفارش صورت میگیرد. پس از ثبت سفارش کالا بر اساس نحوه ارسال که شما انتخاب کرده اید کالا برای شما در مدت زمان مذکور ارسال می گردد.
                                        </p>
                                    </section>
                                </section>

                            </section>
                            <!-- end product info -->

                            <section class="col-md-3">
                                <section class="content-wrapper bg-white p-3 rounded-2 cart-total-price">
                                    <section class="d-flex justify-content-between align-items-center">
                                        <p class="text-muted">قیمت کالا</p>
                                        <p class="text-muted"><?= number_format($product['price']) ?> <span class="small">تومان</span></p>
                                    </section>
                                    <?php
                                    if ($product['marketable_number'] > 0) {
                                    ?>
                                        <section class="">
                                            <form action="<?= url('cart/store') ?>" method="post" id="myform">
                                                <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                                                <!-- <input type="hidden" name="quantity" value="1"> -->
                                                <button id="next-level" class="btn btn-danger d-inline-block w-100" type="submit">افزودن به سبد خرید</button>
                                            </form>
                                        </section>
                                    <?php } else { ?>
                                        <section class="">
                                            <a id="next-level" class="btn btn-danger d-block  disabled" disabled>موجود نیست</a>
                                        </section>
                                    <?php } ?>
                                </section>
                            </section>
                        </section>
                    </section>
                </section>

            </section>
        </section>
        <!-- end cart -->



        <!-- start product lazy load -->
        <section class="mb-4">
            <section class="container-xxl">
                <section class="row">
                    <section class="col">
                        <section class="content-wrapper bg-white p-3 rounded-2">
                            <!-- start vontent header -->
                            <section class="content-header">
                                <section class="d-flex justify-content-between align-items-center">
                                    <h2 class="content-header-title">
                                        <span>کالاهای مرتبط</span>
                                    </h2>
                                    <section class="content-header-link">
                                        <!--<a href="#">مشاهده همه</a>-->
                                    </section>
                                </section>
                            </section>
                            <!-- start vontent header -->
                            <section class="lazyload-wrapper">
                                <section class="lazyload light-owl-nav owl-carousel owl-theme">

                                    <?php
                                    foreach ($relatedProducts as $relatedProduct) {
                                    ?>
                                        <section class="item">
                                            <section class="lazyload-item-wrapper">
                                                <section class="product">
                                                    <section class="product-add-to-cart"><a href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به سبد خرید"><i class="fa fa-cart-plus"></i></a></section>
                                                    <section class="product-add-to-favorite"><a href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به علاقه مندی"><i class="fa fa-heart"></i></a></section>
                                                    <a class="product-link" href="#">
                                                        <section class="product-image">
                                                            <img class="" src="<?= asset($relatedProduct['image']) ?>" alt="">
                                                        </section>
                                                        <section class="product-name">
                                                            <h3><?= $relatedProduct['name'] ?></h3>
                                                        </section>
                                                        <section class="product-price-wrapper">
                                                            <section class="product-price"><?= $relatedProduct['price'] ?> تومان</section>
                                                        </section>
                                                        <section class="product-colors">
                                                            <section class="product-colors-item" style="background-color: yellow;"></section>
                                                            <section class="product-colors-item" style="background-color: green;"></section>
                                                            <section class="product-colors-item" style="background-color: white;"></section>
                                                            <section class="product-colors-item" style="background-color: blue;"></section>
                                                            <section class="product-colors-item" style="background-color: red;"></section>
                                                        </section>
                                                    </a>
                                                </section>
                                            </section>
                                        </section>

                                    <?php } ?>


                                </section>
                            </section>
                        </section>
                    </section>
                </section>
            </section>
        </section>
        <!-- end product lazy load -->

        <!-- start description, features and comments -->
        <section class="mb-4">
            <section class="container-xxl">
                <section class="row">
                    <section class="col">
                        <section class="content-wrapper bg-white p-3 rounded-2">
                            <!-- start content header -->
                            <section id="introduction-features-comments" class="introduction-features-comments">
                                <section class="content-header">
                                    <section class="d-flex justify-content-between align-items-center">
                                        <h2 class="content-header-title">
                                            <span class="me-2"><a class="text-decoration-none text-dark" href="#introduction">معرفی</a></span>
                                            <span class="me-2"><a class="text-decoration-none text-dark" href="#features">ویژگی ها</a></span>
                                            <span class="me-2"><a class="text-decoration-none text-dark" href="#comments">دیدگاه ها</a></span>
                                        </h2>
                                        <section class="content-header-link">
                                            <!--<a href="#">مشاهده همه</a>-->
                                        </section>
                                    </section>
                                </section>
                            </section>
                            <!-- start content header -->

                            <section class="py-4">

                                <!-- start vontent header -->
                                <section id="introduction" class="content-header mt-2 mb-4">
                                    <section class="d-flex justify-content-between align-items-center">
                                        <h2 class="content-header-title content-header-title-small">
                                            معرفی
                                        </h2>
                                        <section class="content-header-link">
                                            <!--<a href="#">مشاهده همه</a>-->
                                        </section>
                                    </section>
                                </section>
                                <section class="product-introduction mb-4">
                                    <?= $product['introduction'] ?>
                                </section>

                                <!-- start vontent header -->
                                <section id="features" class="content-header mt-2 mb-4">
                                    <section class="d-flex justify-content-between align-items-center">
                                        <h2 class="content-header-title content-header-title-small">
                                            ویژگی ها
                                        </h2>
                                        <section class="content-header-link">
                                            <!--<a href="#">مشاهده همه</a>-->
                                        </section>
                                    </section>
                                </section>
                                <section class="product-features mb-4 table-responsive">
                                    <table class="table table-bordered border-white">
                                        <?php
                                        if ($product['weight']) {
                                        ?>
                                            <tr>
                                                <td>وزن</td>
                                                <td><?= $product['weight'] ?></td>
                                            </tr>
                                        <?php } ?>

                                        <?php
                                        if ($product['height']) {
                                        ?>
                                            <tr>
                                                <td>ارتفاع</td>
                                                <td><?= $product['height'] ?></td>
                                            </tr>
                                        <?php } ?>

                                        <?php
                                        if ($product['length']) {
                                        ?>
                                            <tr>
                                                <td>طول</td>
                                                <td><?= $product['length'] ?></td>
                                            </tr>
                                        <?php } ?>

                                    </table>
                                </section>


                                <?php

                                function displayComments($comments, $level = 0)
                                {
                                    foreach ($comments as $comment) { ?>

                                        <section class="product-comment ms-<?= $level * 3 ?>">
                                            <section class="product-comment-header d-flex justify-content-start">
                                                <section class="product-comment-date"><?= jDate($comment['created_at']) ?></section>
                                                <section class="product-comment-title"><?= $comment['user_id'] ?></section>
                                            </section>
                                            <section class="product-comment-body">
                                                <button type="button" class="btn btn-success reply-button" data-comment-id="<?= $comment['id'] ?>">پاسخ</button>
                                                <?= $comment['body'] ?>
                                            </section>
                                        </section>

                                <?php
                                        if (count($comment['replies']) > 0) {
                                            displayComments($comment['replies'], $level + 1);
                                        }
                                    }
                                }

                                ?>


                                <?php
                                if (isset($_SESSION['user'])) { ?>



                                    <section class="comment-add-wrapper">
                                        <button class="comment-add-button" type="button" data-bs-toggle="modal" data-bs-target="#add-comment"><i class="fa fa-plus"></i> افزودن دیدگاه</button>
                                        <!-- start add comment Modal -->
                                        <section class="modal fade" id="add-comment" tabindex="-1" aria-labelledby="add-comment-label" aria-hidden="true">
                                            <section class="modal-dialog">
                                                <section class="modal-content">
                                                    <section class="modal-header">
                                                        <h5 class="modal-title" id="add-comment-label"><i class="fa fa-plus"></i> افزودن دیدگاه</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </section>
                                                    <section class="modal-body">
                                                        <form class="row" action="<?= url('product/comment-store') ?>" method="post">

                                                            <section class="col-12 mb-2">
                                                                <label for="comment" class="form-label mb-1">دیدگاه شما</label>
                                                                <textarea class="form-control form-control-sm" name="comment" id="comment" placeholder="دیدگاه شما ..." rows="4"></textarea>
                                                                <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                                                                <input type="hidden" name="parent_id" id="parent_id" value="0">
                                                            </section>

                                                    </section>
                                                    <section class="modal-footer py-1">
                                                        <button type="submit" class="btn btn-sm btn-primary">ثبت دیدگاه</button>
                                                        <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">بستن</button>
                                                    </section>
                                                    </form>

                                                </section>
                                            </section>
                                        </section>
                                    </section>

                                <?php  } ?>


                                <!-- start vontent header -->
                                <section id="comments" class="content-header mt-2 mb-4">
                                    <section class="d-flex justify-content-between align-items-center">
                                        <h2 class="content-header-title content-header-title-small">
                                            دیدگاه ها
                                        </h2>
                                        <section class="content-header-link">
                                            <!--<a href="#">مشاهده همه</a>-->
                                        </section>
                                    </section>
                                </section>
                                <section class="product-comments mb-4">


                                    <?php
                                    if (count($comments) > 0) {
                                        displayComments($comments);
                                    } else { ?>
                                        <p>نظری وجود ندارد</p>
                                    <?php }
                                    ?>



                                </section>
                            </section>

                        </section>
                    </section>
                </section>
            </section>
        </section>
        <!-- end description, features and comments -->

    </main>
    <!-- end main one col -->





    <?php
    require_once BASE_PATH . '/template/app/layouts/partials/footer.php';
    ?>

    <?php
    require_once BASE_PATH . '/template/app/layouts/scripts.php';
    ?>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const replyButtons = document.querySelectorAll('.reply-button');

            replyButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const commentId = this.getAttribute('data-comment-id');
                    document.getElementById('parent_id').value = commentId;
                    const addCommentModal = new bootstrap.Modal(document.getElementById('add-comment'))
                    addCommentModal.show();
                })
            })
        })
    </script>



</body>

</html>