<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once BASE_PATH . '/template/admin/layouts/head-tag.php';
    ?>
    <title>سوالات متداول</title>
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
                                    ویرایش سوال
                                </h5>

                            </div>
                            <div>
                                <a href="<?= url('admin/content/faq') ?>" class="btn btn-warning">بازگشت</a>
                            </div>
                        </section>
                        <section class="body-content">

                            <form class="row g-3" action="<?= url('admin/content/faq/update/' . $faq['id']) ?>" method="post">
                                <div class="col-md-12">
                                    <label for="question" class="form-label">سوال</label>
                                    <input type="text" name="question" class="form-control" id="question" value="<?= $faq['question'] ?>">
                                </div>

                                <div class="col-md-12">
                                    <label for="answer" class="form-label">پاسخ</label>
                                    <input type="text" name="answer" value="<?= $faq['answer'] ?>" class="form-control" id="answer">
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