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

        <!-- start slideshow -->
        <section class="container-xxl my-4">
            <section class="row">
                <section class="col-md-8 pe-md-1 ">
                    <section id="slideshow" class="owl-carousel owl-theme">
                        <?php
                        foreach ($slides as $slide) {
                        ?>
                            <section class="item"><a class="w-100 d-block h-auto text-decoration-none" href="<?= url($slide['url']) ?>"><img class="w-100 rounded-2 d-block h-auto" src="<?= asset($slide['image']) ?>" alt=""></a></section>
                        <?php } ?>
                    </section>
                </section>
                <section class="col-md-4 ps-md-1 mt-2 mt-md-0">
                    <?php
                    if (isset($slides[0])) {
                    ?>
                        <section class="mb-2"><a href="<?= url($slides[0]['url']) ?>" class="d-block"><img class="w-100 rounded-2" src="<?= asset($slides[0]['image']) ?>" alt=""></a></section>
                    <?php }
                    if (isset($slides[1])) {
                    ?>
                        <section class="mb-2"><a href="<?= url($slides[1]['url']) ?>" class="d-block"><img class="w-100 rounded-2" src="<?= asset($slides[1]['image']) ?>" alt=""></a></section>
                    <?php } ?>
                </section>
            </section>
        </section>
        <!-- end slideshow -->



        <!-- start product lazy load -->
        <section class="mb-3">
            <section class="container-xxl">
                <section class="row">
                    <section class="col">
                        <section class="content-wrapper bg-white p-3 rounded-2">
                            <!-- start vontent header -->
                            <section class="content-header">
                                <section class="d-flex justify-content-between align-items-center">
                                    <h2 class="content-header-title">
                                        <span>پربازدیدترین کالاها</span>
                                    </h2>
                                    <section class="content-header-link">
                                        <a href="#">مشاهده همه</a>
                                    </section>
                                </section>
                            </section>
                            <!-- start vontent header -->
                            <section class="lazyload-wrapper">
                                <section class="lazyload light-owl-nav owl-carousel owl-theme">

                                    <?php
                                    foreach ($popularProducts as $popularProduct) {
                                    ?>
                                        <section class="item">
                                            <section class="lazyload-item-wrapper">
                                                <section class="product">
                                                    <section class="product-add-to-cart"><a href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به سبد خرید"><i class="fa fa-cart-plus"></i></a></section>
                                                    <section class="product-add-to-favorite"><a href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به علاقه مندی"><i class="fa fa-heart"></i></a></section>
                                                    <a class="product-link" href="<?= url('product/' . $popularProduct['id']) ?>">
                                                        <section class="product-image">
                                                            <img class="" src="<?= asset($popularProduct['image']) ?>" alt="">
                                                        </section>
                                                        <section class="product-colors"></section>
                                                        <section class="product-name">
                                                            <a href="<?= url('product/' . $popularProduct['id']) ?>" class="text-body">
                                                                <h3><?= $popularProduct['name'] ?></h3>
                                                            </a>
                                                        </section>
                                                        <section class="product-price-wrapper">

                                                            <section class="product-price"><?= $popularProduct['price'] ?> تومان</section>
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



        <!-- start ads section -->
        <section class="mb-3">
            <section class="container-xxl">
                <!-- two column-->
                <section class="row py-4">
                    <section class="col-12 col-md-6 mt-2 mt-md-0"><img class="d-block rounded-2 w-100" src="assets/images/ads/two-col-1.jpg" alt=""></section>
                    <section class="col-12 col-md-6 mt-2 mt-md-0"><img class="d-block rounded-2 w-100" src="assets/images/ads/two-col-2.jpg" alt=""></section>
                </section>

            </section>
        </section>
        <!-- end ads section -->


        <!-- start product lazy load -->
        <section class="mb-3">
            <section class="container-xxl">
                <section class="row">
                    <section class="col">
                        <section class="content-wrapper bg-white p-3 rounded-2">
                            <!-- start vontent header -->
                            <section class="content-header">
                                <section class="d-flex justify-content-between align-items-center">
                                    <h2 class="content-header-title">
                                        <span>پیشنهاد آمازون به شما</span>
                                    </h2>
                                    <section class="content-header-link">
                                        <a href="#">مشاهده همه</a>
                                    </section>
                                </section>
                            </section>
                            <!-- start vontent header -->
                            <section class="lazyload-wrapper">
                                <section class="lazyload light-owl-nav owl-carousel owl-theme">
                                    <?php
                                    foreach ($recommendedProducts as $recommendedProduct) {
                                    ?>
                                        <section class="item">
                                            <section class="lazyload-item-wrapper">
                                                <section class="product">
                                                    <section class="product-add-to-cart"><a href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به سبد خرید"><i class="fa fa-cart-plus"></i></a></section>
                                                    <section class="product-add-to-favorite"><a href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به علاقه مندی"><i class="fa fa-heart"></i></a></section>
                                                    <a class="product-link" href="#">
                                                        <section class="product-image">
                                                            <img class="" src="<?= asset($recommendedProduct['image']) ?>" alt="">
                                                        </section>
                                                        <section class="product-colors"></section>
                                                        <section class="product-name">
                                                            <h3><?= $recommendedProduct['name'] ?></h3>
                                                        </section>
                                                        <section class="product-price-wrapper">
                                                            <section class="product-price"><?= $recommendedProduct['price'] ?> تومان</section>
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


        <!-- start ads section -->
        <section class="mb-3">
            <section class="container-xxl">
                <!-- one column -->
                <section class="row py-4">
                    <section class="col"><img class="d-block rounded-2 w-100" src="assets/images/ads/one-col-1.jpg" alt=""></section>
                </section>

            </section>
        </section>
        <!-- end ads section -->



        <!-- start brand part-->
        <section class="brand-part mb-4 py-4">
            <section class="container-xxl">
                <section class="row">
                    <section class="col">
                        <!-- start vontent header -->
                        <section class="content-header">
                            <section class="d-flex align-items-center">
                                <h2 class="content-header-title">
                                    <span>برندهای ویژه</span>
                                </h2>
                            </section>
                        </section>
                        <!-- start vontent header -->
                        <section class="brands-wrapper py-4">
                            <section class="brands dark-owl-nav owl-carousel owl-theme">
                                <?php
                                foreach ($brands as $brand) {
                                ?>
                                    <section class="item">
                                        <section class="brand-item">
                                            <a href="#"><img class="rounded-2" src="<?= asset($brand['logo']) ?>" alt=""></a>
                                        </section>
                                    </section>

                                <?php } ?>


                            </section>
                        </section>
                    </section>
                </section>
            </section>
        </section>
        <!-- end brand part-->

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