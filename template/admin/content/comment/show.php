<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once BASE_PATH . '/template/admin/layouts/head-tag.php';
    ?>
    <title>نظرات</title>
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
                                    نظر
                                </h5>
                                <p>
                                    در این بخش نظر به شما ارائه داده می شود
                                </p>
                            </div>

                        </section>
                        <section class="body-content">

                            <div class=" p-3 rounded text-bg-secondary">
                                <div class="d-flex">
                                    <h5 class="mx-2">نظر : </h5>
                                    <h6><?= $comment['body'] ?></h6>
                                </div>
                                <div class="d-flex">
                                    <h5 class="mx-2">نویسنده : </h5>
                                    <h6><?= $comment['email'] ?></h6>
                                </div>
                                <div class="d-flex">
                                    <h5 class="mx-2">پست : </h5>
                                    <h6><?= $comment['post_title'] ?></h6>
                                </div>
                                <div class="d-flex">
                                    <h5 class="mx-2">وضعیت : </h5>
                                    <h6><?= $comment['status'] ?></h6>
                                </div>
                            </div>


                            <section>
                                <div class="text-bg-warning p-3 rounded my-2">
                                    <h5 class="mx-2">پاسخ : </h5>
                                </div>
                                <form action="<?= url('admin/content/comment/answer/' . $comment['id']) ?>" method="post">
                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">متن پاسخ</label>
                                        <textarea name="answer" class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
                                        <div class="my-2">
                                            <button class="btn btn-success">ثبت</button>
                                        </div>
                                    </div>
                                </form>

                            </section>

                            <?php
                            if (count($replies) > 0) {
                            ?>
                                <div class="bg-info p-3 rounded my-2">
                                    <h5 class="mx-2">پاسخ ها : </h5>
                                </div>
                                <?php foreach ($replies as $reply) { ?>
                                    <div class="p-3 border rounded my-2">
                                        <h6>نویسنده : <?= $reply['email'] ?></h6>
                                        <p><?= $reply['body'] ?></p>
                                    </div>

                            <?php }
                            } ?>
                        </section>
                    </section>
                </section>
            </section>



        </section>
    </section>

</body>

</html>