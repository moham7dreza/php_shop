<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once BASE_PATH . '/template/admin/layouts/head-tag.php';
    ?>
    <title>انبار محصول</title>
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
                                    ویرایش موجودی محصول
                                </h5>

                            </div>
                            <div>
                                <a href="<?= url('admin/market/store') ?>" class="btn btn-warning">بازگشت</a>
                            </div>
                        </section>
                        <section class="body-content">

                            <form class="row g-3" action="<?= url('admin/market/store/update/' . $product['id']) ?>" method="post">
                                <div class="col-md-12 col-lg-6">
                                    <label for="marketable_number" class="form-label">تعداد قابل فروش</label>
                                    <input type="text" name="marketable_number" class="form-control" id="marketable_number" value="<?= $product['marketable_number'] ?>">
                                </div>

                                <div class="col-md-12 col-lg-6">
                                    <label for="sold_number" class="form-label">تعداد فروخته شده</label>
                                    <input type="text" name="sold_number" class="form-control" id="sold_number" value="<?= $product['sold_number'] ?>">
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