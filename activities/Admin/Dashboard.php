<?php

namespace Activities\Admin;

class Dashboard extends Admin
{
    public function index(): void
    {
        require_once BASE_PATH . '/template/admin/index.php';
    }
}