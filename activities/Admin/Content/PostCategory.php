<?php

namespace Activities\Admin\Content;

use Activities\Admin\Admin;

class PostCategory extends Admin
{
    public function index(): void
    {
        $categories = \Models\PostCategory::query()->get();

        require_once BASE_PATH . '/template/admin/content/post-category/index.php';
    }
}