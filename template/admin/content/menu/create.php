<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once BASE_PATH . '/template/admin/layouts/head-tag.php';
    ?>
    <title>منو ها</title>
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
                                    ساخت منو
                                </h5>

                            </div>
                            <div>
                                <a href="<?= url('admin/content/menu') ?>" class="btn btn-warning">بازگشت</a>
                            </div>
                        </section>
                        <section class="body-content">

                            <form class="row g-3" action="<?= url('admin/content/menu/store') ?>" method="post">
                                <div class="col-md-12">
                                    <label for="name" class="form-label">عنوان</label>
                                    <input type="text" name="name" class="form-control" id="name" value="<?= old('name') ?>">
                                </div>

                                <div class="col-md-6">
                                    <label for="url" class="form-label">آدرس</label>
                                    <input type="text" name="url" value="<?= old('url') ?>" class="form-control" id="url">
                                </div>

                                <div class="col-md-6">
                                    <label for="parent_id" class="form-label">منو والد</label>
                                    <select class="form-select" name="parent_id" id="parent_id">
                                        <option value="">اصلی</option>
                                        <?php
                                        foreach ($menus as $menu) {
                                        ?>
                                            <option value="<?= $menu['id'] ?>" <?php if (old('parent_id') == $menu['id']) echo "selected" ?>><?= $menu['name'] ?></option>
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