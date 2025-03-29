<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once BASE_PATH . '/template/admin/layouts/head-tag.php';
    ?>
    <title> پست ها</title>
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
                                    ساخت پست
                                </h5>

                            </div>
                            <div>
                                <a href="<?= url('admin/content/post') ?>" class="btn btn-warning">بازگشت</a>
                            </div>
                        </section>
                        <section class="body-content">

                            <form class="row g-3" action="<?= url('admin/content/post/store') ?>" method="post" enctype="multipart/form-data" id="form">
                                <div class="col-md-6">
                                    <label for="title" class="form-label">عنوان</label>
                                    <input type="text" name="title" class="form-control" id="title" value="<?= old('title') ?>">
                                </div>
                                <div class="col-6">
                                    <label for="slug" class="form-label">slug</label>
                                    <input type="text" name="slug" class="form-control" value="<?= old('slug') ?>" id="slug">
                                </div>
                                <div class="col-md-12">
                                    <label for="post_category_id" class="form-label">دسته بندی</label>
                                    <select class="form-select" name="post_category_id" id="post_category_id">
                                        <?php
                                        foreach ($categories as $category) {
                                        ?>
                                            <option value="<?= $category['id'] ?>" <?php if (old('post_category_id') == $category['id']) echo "selected" ?>><?= $category['name'] ?></option>
                                        <?php
                                        }
                                        ?>

                                    </select>
                                </div>

                                <div class="col-md-12">
                                    <label for="tags" class="form-label">تگ ها</label>
                                    <select class="form-control" id="select_tags" multiple="multiple">
                                    </select>
                                    <input type="hidden" id="tags" name="tags">
                                </div>
                                <div class="form-group">
                                    <label for="published_at">تاریخ انتشار</label>
                                    <input type="text" class="form-control d-none" id="published_at" name="published_at" required autofocus>
                                    <input type="text" class="form-control" id="published_at_view" required autofocus>
                                </div>

                                <div class="col-md-12">
                                    <label for="summary" class="form-label">خلاصه</label>
                                    <input type="text" name="summary" value="<?= old('summary') ?>" class="form-control" id="summary">
                                </div>
                                <div class="col-md-12">
                                    <label for="body" class="form-label">بدنه اصلی</label>
                                    <textarea class="form-control" id="body" name="body" placeholder="body ..." rows="5" required autofocus></textarea>

                                </div>

                                <div class="mb-3 col-md-12">
                                    <label for="image" class="form-label">عکس</label>
                                    <input class="form-control" name="image" type="file" id="image">
                                </div>

                                <div class="col-md-6">
                                    <label for="status" class="form-label">وضعیت</label>
                                    <select class="form-select" name="status" id="status">
                                        <option value="1" <?php if (old('status') == 1) echo "selected" ?>>فعال</option>
                                        <option value="2" <?php if (old('status') == 2) echo "selected" ?>>غیر فعال</option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label for="commentable" class="form-label">ثبت نظر</label>
                                    <select class="form-select" name="commentable" id="commentable">
                                        <option value="1" <?php if (old('commentable') == 1) echo "selected" ?>>فعال</option>
                                        <option value="2" <?php if (old('commentable') == 2) echo "selected" ?>>غیر فعال</option>
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