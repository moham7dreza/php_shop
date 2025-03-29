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

        <?php
        if (flash('error')) { ?>

            <div class="alert alert-danger">
                <h6><?= flash('error') ?></h6>
            </div>

        <?php }
        ?>

        <?php
        if (flash('success')) { ?>

            <div class="alert alert-success">
                <h6><?= flash('success') ?></h6>
            </div>

        <?php }
        ?>

        <!-- start cart -->
        <section class="mb-4">
            <section class="container-xxl">
                <section class="row">
                    <section class="col">
                        <!-- start vontent header -->
                        <section class="content-header">
                            <section class="d-flex justify-content-between align-items-center">
                                <h2 class="content-header-title">
                                    <span>سبد خرید شما</span>
                                </h2>
                                <section class="content-header-link">
                                    <!--<a href="#">مشاهده همه</a>-->
                                </section>
                            </section>
                        </section>

                        <?php
                        if (empty($cartItems)) {
                        ?>
                            <section class="content-wrapper bg-white p-3 rounded-2 mt-4">
                                <p>سبد خرید خالی است</p>
                            </section>
                        <?php } else { ?>

                            <section class="row mt-4">
                                <section class="col-md-9 mb-3">
                                    <section class="content-wrapper bg-white p-3 rounded-2">

                                        <?php
                                        foreach ($cartItems as $cartItem) {
                                        ?>
                                            <section class="cart-item d-md-flex py-3">
                                                <section class="cart-img align-self-start flex-shrink-1"><img src="<?= $cartItem['image'] ?>" alt=""></section>
                                                <section class="align-self-start w-100">
                                                    <p class="fw-bold"><?= $cartItem['name'] ?></p>
                                                    <p><i class="fa fa-store-alt cart-product-selected-store me-1"></i> <span>کالا موجود در انبار</span></p>
                                                    <section>

                                                        <form action="<?= url('/cart/update-quantity') ?>" method="post" class="d-inline">
                                                            <input type="hidden" name="cart_item_id" value="<?= $cartItem['id'] ?>">
                                                            <section class="cart-product-number d-inline-block ">
                                                                <button class="cart-number-down" type="submit" name="quantity" value="<?= $cartItem['quantity'] - 1 ?>">-</button>
                                                                <input class="" type="number" min="1" max="5" step="1" value="<?= $cartItem['quantity'] ?>" readonly="readonly">
                                                                <button class="cart-number-up" type="submit" name="quantity" value="<?= $cartItem['quantity'] + 1 ?>">+</button>
                                                            </section>
                                                        </form>




                                                        <form action="<?= url('/cart/delete') ?>" method="post" class="d-inline">
                                                            <input type="hidden" name="cart_item_id" value="<?= $cartItem['id'] ?>">
                                                            <button type="submit" class="ms-4 cart-delete btn btn-danger text-white btn-sm">حذف از سبد خرید</button>
                                                        </form>
                                                    </section>
                                                </section>
                                                <section class="align-self-end flex-shrink-1">
                                                    <section class="text-nowrap fw-bold"><?= number_format($cartItem['price'] * $cartItem['quantity']) ?> تومان</section>
                                                </section>
                                            </section>

                                        <?php } ?>


                                    </section>
                                </section>
                                <section class="col-md-3">
                                    <section class="content-wrapper bg-white p-3 rounded-2 cart-total-price">
                                        <section class="d-flex justify-content-between align-items-center">
                                            <p class="text-muted">قیمت کالاها (<?= count($cartItems) ?>)</p>
                                            <p class="text-muted"><?= number_format($cart['total_price']) ?> تومان</p>
                                        </section>



                                        <p class="my-3">
                                            <i class="fa fa-info-circle me-1"></i>کاربر گرامی خرید شما هنوز نهایی نشده است. برای ثبت سفارش و تکمیل خرید باید ابتدا آدرس خود را انتخاب کنید و سپس نحوه ارسال را انتخاب کنید. نحوه ارسال انتخابی شما محاسبه و به این مبلغ اضافه شده خواهد شد. و در نهایت پرداخت این سفارش صورت میگیرد.
                                        </p>


                                        <section class="">
                                            <a href="<?= url('payment') ?>" class="btn btn-danger d-block">تکمیل فرآیند خرید</a>
                                        </section>

                                    </section>
                                </section>
                            </section>
                        <?php } ?>
                    </section>
                </section>

            </section>
        </section>
        <!-- end cart -->

    </main>
    <!-- end main one col -->






    <?php
    require_once BASE_PATH . '/template/app/layouts/partials/footer.php';
    ?>

    <?php
    require_once BASE_PATH . '/template/app/layouts/scripts.php';
    ?>





</body>

</html>