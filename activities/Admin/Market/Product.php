<?php

namespace Activities\Admin\Market;

use Activities\Admin\Admin;
use Database\Database;


class Product extends Admin
{


    public function index()
    {
        $db = new Database();
        $products = $db->select("select * from `products`")->fetchAll();
        require_once BASE_PATH . '/template/admin/market/product/index.php';
    }

    public function show($id)
    {

        $db = new Database();
        $product = $db->select("SELECT * FROM `products` WHERE id = ?", [$id])->fetch();
        require_once BASE_PATH . '/template/admin/market/product/show.php';
    }

    public function create()
    {
        $db = new Database();
        $brands = $db->select("select * from `brands`")->fetchAll();
        $categories = $db->select("select * from `product_categories`")->fetchAll();
        require_once BASE_PATH . '/template/admin/market/product/create.php';
    }

    public function store($request)
    {
        $db = new Database();
        $request['image'] = $this->saveImage($request['image'], 'market-product-images');
        if ($request['image']) {
            $db->insert('products', array_keys($request), $request);
            flash('success', 'عملیات با موفقیت انجام شد');
            $this->redirect('admin/market/product');
        } else {
            flash('validation_error', 'فیلد عکس اجباری میباشد');
            $this->redirectBack();
        }
    }


    public function edit($id)
    {
        $db = new Database();
        $brands = $db->select("select * from `brands`")->fetchAll();
        $categories = $db->select("select * from `product_categories`")->fetchAll();
        $product = $db->select("SELECT * FROM `products` WHERE id = ?", [$id])->fetch();
        require_once BASE_PATH . '/template/admin/market/product/edit.php';
    }

    public function update($request, $id)
    {
        $db = new Database();
        if ($request['image']['tmp_name'] != null) {
            $product = $db->select('select * from `products` where id = ?', [$id])->fetch();
            $this->removeImage($product['image']);
            $request['image'] = $this->saveImage($request['image'], 'market-product-images');
        } else {
            unset($request['image']);
        }
        $db->update('products', $id, array_keys($request), $request);
        flash('success', 'عملیات با موفقیت انجام شد');
        $this->redirect('admin/market/product');
    }


    public function delete($id)
    {
        $db = new Database();
        $product = $db->select("SELECT * FROM `products` WHERE id = ?", [$id])->fetch();
        if ($product['image']) {
            $this->removeImage($product['image']);
        }
        $db->delete('products', $id);
        flash('success', 'عملیات با موفقیت انجام شد');
        $this->redirectBack();
    }
}
