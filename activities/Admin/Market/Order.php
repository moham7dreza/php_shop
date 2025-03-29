<?php

namespace Activities\Admin\Market;

use Activities\Admin\Admin;
use Database\Database;


class Order extends Admin
{


    public function index()
    {
        $db = new Database();
        $orders = $db->select("select orders.*, users.email AS email FROM orders INNER JOIN users ON orders.user_id = users.id")->fetchAll();
        require_once BASE_PATH . '/template/admin/market/order/index.php';
    }

    public function create()
    {
        require_once BASE_PATH . '/template/admin/market/brand/create.php';
    }

    public function store($request)
    {
        $db = new Database();
        $request['logo'] = $this->saveImage($request['logo'], 'market-brand-images');
        if ($request['logo']) {
            $db->insert('brands', array_keys($request), $request);
            flash('success', 'عملیات با موفقیت انجام شد');
            $this->redirect('admin/market/brand');
        } else {
            flash('validation_error', 'فیلد عکس اجباری میباشد');
            $this->redirectBack();
        }
    }

    public function show($id)
    {
        $db = new Database();

        $order =  $db->select('SELECT orders.*, (SELECT email FROM users WHERE orders.user_id = users.id) AS email, (SELECT `address` FROM `addresses` WHERE orders.address_id = addresses.id) AS address, (SELECT `tracking_code` FROM payments WHERE orders.payment_id = payments.id) AS trackingCode , (SELECT `name` FROM deliveries WHERE deliveries.id = orders.delivery_id) AS deliveryName, (SELECT `code` FROM discounts WHERE orders.discount_id = discounts.id) AS code FROM orders WHERE id = ?', [$id])->fetch();



        require_once BASE_PATH . '/template/admin/market/order/show.php';
    }

    public function items($orderId)
    {
        $db = new Database();

        $items =  $db->select('SELECT order_items.*,(SELECT `name` FROM products WHERE order_items.product_id = products.id) AS product_name FROM order_items WHERE order_id = ?', [$orderId])->fetchAll();
        require_once BASE_PATH . '/template/admin/market/order/items.php';
    }


    public function edit($id)
    {
        $db = new Database();
        $brand = $db->select("SELECT * FROM `brands` WHERE id = ?", [$id])->fetch();
        require_once BASE_PATH . '/template/admin/market/brand/edit.php';
    }

    public function update($request, $id)
    {
        $db = new Database();
        if ($request['logo']['tmp_name'] != null) {
            $banner = $db->select('select * from `brands` where id = ?', [$id])->fetch();
            $this->removeImage($banner['logo']);
            $request['logo'] = $this->saveImage($request['logo'], 'market-brand-images');
        } else {
            unset($request['logo']);
        }
        $db->update('brands', $id, array_keys($request), $request);
        flash('success', 'عملیات با موفقیت انجام شد');
        $this->redirect('admin/market/brand');
    }


    public function delete($id)
    {
        $db = new Database();
        $banner = $db->select("SELECT * FROM `brands` WHERE id = ?", [$id])->fetch();
        if ($banner['logo']) {
            $this->removeImage($banner['logo']);
        }
        $db->delete('brands', $id);
        flash('success', 'عملیات با موفقیت انجام شد');
        $this->redirectBack();
    }
}
