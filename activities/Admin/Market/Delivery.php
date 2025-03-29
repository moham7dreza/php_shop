<?php

namespace Activities\Admin\Market;

use Activities\Admin\Admin;
use Database\Database;


class Delivery extends Admin
{


    public function index()
    {
        $db = new Database();
        $deliveries = $db->select("select * from `deliveries`")->fetchAll();
        require_once BASE_PATH . '/template/admin/market/delivery/index.php';
    }

    public function create()
    {
        require_once BASE_PATH . '/template/admin/market/delivery/create.php';
    }

    public function store($request)
    {
        $db = new Database();
        $db->insert('deliveries', array_keys($request), $request);
        flash('success', 'عملیات با موفقیت انجام شد');
        $this->redirect('admin/market/delivery');
    }


    public function edit($id)
    {
        $db = new Database();
        $delivery = $db->select("SELECT * FROM `deliveries` WHERE id = ?", [$id])->fetch();
        require_once BASE_PATH . '/template/admin/market/delivery/edit.php';
    }

    public function update($request, $id)
    {
        $db = new Database();
        $db->update('deliveries', $id, array_keys($request), $request);
        flash('success', 'عملیات با موفقیت انجام شد');
        $this->redirect('admin/market/delivery');
    }


    public function delete($id)
    {
        $db = new Database();
        $db->delete('deliveries', $id);
        flash('success', 'عملیات با موفقیت انجام شد');
        $this->redirectBack();
    }
}
