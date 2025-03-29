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



    <!-- start body -->
    <section class="">
        <section id="main-body-two-col" class="container-xxl body-container">
            <section class="row">
                <?php
                require_once BASE_PATH . '/template/app/layouts/partials/profile-sidebar.php';
                ?>
                <main id="main-body" class="main-body col-md-9">
                    <section class="content-wrapper bg-white p-3 rounded-2 mb-2">

                        <!-- start vontent header -->
                        <section class="content-header mb-4">
                            <section class="d-flex justify-content-between align-items-center">
                                <h2 class="content-header-title">
                                    <span>آدرس های من</span>
                                </h2>
                                <section class="content-header-link">
                                    <!--<a href="#">مشاهده همه</a>-->
                                </section>
                            </section>
                        </section>
                        <!-- end vontent header -->



                        <section class="my-addresses">

                            <?php
                            if (empty($addresses)) {
                            ?>
                                <p>شما هیچ آدرسی ندارید</p>
                                <?php } else {
                                foreach ($addresses as $address) {
                                ?>

                                    <section class="my-address-wrapper mb-2 p-2">
                                        <section class="mb-2">
                                            <i class="fa fa-map-marker-alt mx-1"></i>
                                            <?= $address['address'] ?>
                                            واحد<?= $address['unit'] ?>
                                            پلاک <?= $address['no'] ?>
                                        </section>
                                        <section class="mb-2">
                                            <i class="fa fa-mobile-alt mx-1"></i>
                                            موبایل گیرنده : <?= $address['mobile'] ?>
                                        </section>
                                        <!-- <a class="" href="#"><i class="fa fa-edit"></i> ویرایش آدرس</a> -->
                                        <span class="address-selected">کالاها به این آدرس ارسال می شوند</span>
                                    </section>

                            <?php }
                            } ?>




                            <section class="address-add-wrapper">
                                <button class="address-add-button" type="button" data-bs-toggle="modal" data-bs-target="#add-address"><i class="fa fa-plus"></i> ایجاد آدرس جدید</button>
                                <!-- start add address Modal -->
                                <section class="modal fade" id="add-address" tabindex="-1" aria-labelledby="add-address-label" aria-hidden="true">
                                    <section class="modal-dialog">
                                        <section class="modal-content">
                                            <section class="modal-header">
                                                <h5 class="modal-title" id="add-address-label"><i class="fa fa-plus"></i> ایجاد آدرس جدید</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </section>
                                            <section class="modal-body">
                                                <form class="row" action="<?= url('/profile/my-addresses/store') ?>" method="post">
                                                    <section class="col-12 mb-2">
                                                        <label for="city" class="form-label mb-1">شهر</label>
                                                        <select class="form-select form-select-sm" name="city_id" id="city_id">
                                                            <option selected>استان را انتخاب کنید</option>
                                                            <?php foreach ($cities as $city) { ?>
                                                                <option value="<?= $city['id'] ?>"><?= $city['name'] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </section>
                                                    <section class="col-12 mb-2">
                                                        <label for="address" class="form-label mb-1">نشانی</label>
                                                        <input type="text" name="address" class="form-control form-control-sm" id="address" placeholder="نشانی">
                                                    </section>

                                                    <section class="col-6 mb-2">
                                                        <label for="postal_code" class="form-label mb-1">کد پستی</label>
                                                        <input type="text" name="postal_code" class="form-control form-control-sm" id="postal_code" placeholder="کد پستی">
                                                    </section>

                                                    <section class="col-3 mb-2">
                                                        <label for="no" class="form-label mb-1">پلاک</label>
                                                        <input type="text" name="no" class="form-control form-control-sm" id="no" placeholder="پلاک">
                                                    </section>

                                                    <section class="col-3 mb-2">
                                                        <label for="unit" class="form-label mb-1">واحد</label>
                                                        <input type="text" name="unit" class="form-control form-control-sm" id="unit" placeholder="واحد">
                                                    </section>

                                                    <section class="col-12 mb-2">
                                                        <label for="mobile" class="form-label mb-1">شماره موبایل</label>
                                                        <input type="text" name="mobile" class="form-control form-control-sm" id="mobile" placeholder="شماره موبایل">
                                                    </section>


                                            </section>
                                            <section class="modal-footer py-1">
                                                <button type="submit" class="btn btn-sm btn-primary">ثبت آدرس</button>
                                                </form>

                                                <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">بستن</button>
                                            </section>
                                        </section>
                                    </section>
                                </section>
                                <!-- end add address Modal -->
                            </section>

                        </section>


                    </section>
                </main>
            </section>
        </section>
    </section>
    <!-- end body -->





    <?php
    require_once BASE_PATH . '/template/app/layouts/partials/footer.php';
    ?>

    <?php
    require_once BASE_PATH . '/template/app/layouts/scripts.php';
    ?>




</body>

</html>