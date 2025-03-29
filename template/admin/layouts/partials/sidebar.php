<aside id="sidebar" class="sidebar">
    <section class="sidebar-container">
        <section class="sidebar-wrapper">

            <a href="<?= url('/') ?>" class="sidebar-link">
                <i class="fas fa-shopping-bag"></i>
                <span>فروشگاه</span>
            </a>
            <hr>

            <a href="<?= url('/admin') ?>" class="sidebar-link">
                <i class="fas fa-home"></i>
                <span>خانه</span>
            </a>
            <section class="sidebar-part-title">بخش فروشگاه</section>


            <a href="<?= url('admin/market/product-category') ?>" class="sidebar-link">
                <i class="fas fa-hryvnia"></i>
                <span>دسته ها</span>
            </a>


            <a href="<?= url('admin/market/brand') ?>" class="sidebar-link">
                <i class="fas fa-brain"></i>
                <span>برند ها</span>
            </a>

            <a href="<?= url('admin/market/payment') ?>" class="sidebar-link">
                <i class="fas fa-brain"></i>
                <span>پرداخت ها</span>
            </a>
            <a href="<?= url('admin/market/delivery') ?>" class="sidebar-link">
                <i class="fas fa-brain"></i>
                <span>روش های ارسال</span>
            </a>
            <a href="<?= url('admin/market/discount') ?>" class="sidebar-link">
                <i class="fa fa-table"></i>
                <span>تخفیف</span>
            </a>

            <a href="<?= url('admin/market/product') ?>" class="sidebar-link">
                <i class="fas fa-box"></i>
                <span>محصولات</span>
            </a>


            <a href="<?= url('admin/market/comment') ?>" class="sidebar-link">
                <i class="fas fa-comment"></i>
                <span>نظرات </span>
            </a>


            <a href="<?= url('admin/market/store') ?>" class="sidebar-link">
                <i class="fas fa-box-open"></i>
                <span>انبار</span>
            </a>


            <a href="<?= url('admin/market/order') ?>" class="sidebar-link">
                <i class="fa fa-network-wired"></i>
                <span>سفارشات</span>
            </a>


            <a href="<?= url('admin/market/category-attribute') ?>" class="sidebar-link">
                <i class="fas fa-box-open"></i>
                <span>ویژگی دسته بندی ها</span>
            </a>


            <section class="sidebar-part-title">بخش محتوی</section>

            <a href="<?= url('admin/content/post-category') ?>" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>دسته ها</span>
            </a>

            <a href="<?= url('admin/content/post') ?>" class="sidebar-link">
                <i class="fas fa-podcast"></i>
                <span>پست ها</span>
            </a>


            <a href="<?= url('admin/content/banner') ?>" class="sidebar-link">
                <i class="fas fa-mobile"></i>
                <span>بنر ها </span>
            </a>

            <a href="<?= url('admin/content/faq') ?>" class="sidebar-link">
                <i class="fas fa-question"></i>
                <span>سوالات متداول </span>
            </a>

            <a href="<?= url('admin/content/menu') ?>" class="sidebar-link">
                <i class="fas fa-walking"></i>
                <span>منو ها </span>
            </a>


            <section class="sidebar-group-link">
                <section class="sidebar-dropdown-toggle">
                    <i class="fas fa-chart-bar icon"></i>
                    <span>نوشته ها</span>
                    <i class="fas fa-angle-left angle"></i>
                </section>
                <section class="sidebar-dropdown">
                    <a href="#">مقالات</a>
                    <a href="#">پست ها</a>
                    <a href="#">دوره ها</a>
                </section>
            </section>

            <section class="sidebar-part-title">بخش کاربران</section>

            <a href="<?= url('admin/user/user') ?>" class="sidebar-link">
                <i class="fas fa-user"></i>
                <span>کاربران </span>
            </a>

            <section class="sidebar-part-title">بخش تنظیمات</section>

            <section class="sidebar-group-link">
                <a href="<?= url('admin/setting/setting') ?>" class="sidebar-link">
                    <i class="fas fa-cogs"></i>
                    <span>تنظیمات </span>
                </a>
            </section>


        </section>
    </section>
</aside>