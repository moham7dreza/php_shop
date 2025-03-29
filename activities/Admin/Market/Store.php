<?php

namespace Activities\Admin\Market;

use Activities\Admin\Admin;
use Database\Database;


class Store extends Admin
{


    public function index()
    {
        $db = new Database();
        $products = $db->select("select * from `products`")->fetchAll();
        require_once BASE_PATH . '/template/admin/market/store/index.php';
    }



    public function edit($product_id)
    {
        $db = new Database();
        $product = $db->select("SELECT * FROM `products` WHERE id = ?", [$product_id])->fetch();
        require_once BASE_PATH . '/template/admin/market/store/edit.php';
    }

    public function update($request, $product_id)
    {
        $db = new Database();
        $request = ['marketable_number' => $request['marketable_number'], 'sold_number' => $request['sold_number']];
        $db->update('products', $product_id, array_keys($request), $request);
        flash('success', 'عملیات با موفقیت انجام شد');
        $this->redirect('admin/market/store');
    }


    public function addForm($product_id)
    {
        $db = new Database();
        $product = $db->select("SELECT * FROM `products` WHERE id = ?", [$product_id])->fetch();
        require_once BASE_PATH . '/template/admin/market/store/add.php';
    }

    public function add($request, $product_id)
    {
        $db = new Database();
        $product = $db->select("SELECT * FROM `products` WHERE id = ?", [$product_id])->fetch();
        $db->update('products', $product_id, ['marketable_number'], [$product['marketable_number'] + $request['number']]);
        flash('success', 'عملیات با موفقیت انجام شد');
        $this->redirect('admin/market/store');
    }
}
