<?php

namespace Activities\Admin\Market;

use Activities\Admin\Admin;
use Database\Database;


class Gallery extends Admin
{


    public function index($product_id)
    {
        $db = new Database();
        $galleries = $db->select("select * from galleries where product_id = ?", [$product_id])->fetchAll();
        $product = $db->select("select * from products where id = ?", [$product_id])->fetch();
        require_once BASE_PATH . '/template/admin/market/gallery/index.php';
    }

    public function create($product_id)
    {
        $db = new Database();
        $product = $db->select("select * from products where id = ?", [$product_id])->fetch();
        require_once BASE_PATH . '/template/admin/market/gallery/create.php';
    }

    public function store($request, $product_id)
    {
        $db = new Database();
        $request['image'] = $this->saveImage($request['image'], 'market-product-gallery');
        if ($request['image']) {
            $request['product_id'] = $product_id;
            $db->insert('galleries', array_keys($request), $request);
            flash('success', 'عملیات با موفقیت انجام شد');
            $this->redirect('admin/market/product/' . $product_id . '/gallery');
        } else {
            flash('validation_error', 'فیلد عکس اجباری میباشد');
            $this->redirectBack();
        }
        $this->redirect('admin/market/product/' . $product_id . '/gallery');
    }


    public function edit($product_id, $id)
    {
        $db = new Database();
        $gallery = $db->select("SELECT * FROM `galleries` WHERE id = ?", [$id])->fetch();
        $product = $db->select("SELECT * FROM `products` WHERE id = ?", [$product_id])->fetch();
        require_once BASE_PATH . '/template/admin/market/gallery/edit.php';
    }

    public function update($request, $product_id, $id)
    {
        $db = new Database();
        $product = $db->select("SELECT * FROM `products` WHERE id = ?", [$product_id])->fetch();
        if ($request['image']['tmp_name'] != null) {
            $gallery = $db->select('select * from `galleries` where id = ?', [$id])->fetch();
            $this->removeImage($gallery['image']);
            $request['image'] = $this->saveImage($request['image'], 'market-product-gallery');
        } else {
            unset($request['image']);
        }
        $db->update('galleries', $id, array_keys($request), $request);
        flash('success', 'عملیات با موفقیت انجام شد');
        $this->redirect('admin/market/product/' . $product['id'] . '/gallery');
    }


    public function delete($id)
    {
        $db = new Database();
        $gallery = $db->select("SELECT * FROM `galleries` WHERE id = ?", [$id])->fetch();
        if ($gallery['image']) {
            $this->removeImage($gallery['image']);
        }
        $db->delete('galleries', $id);
        flash('success', 'عملیات با موفقیت انجام شد');
        $this->redirectBack();
    }
}
