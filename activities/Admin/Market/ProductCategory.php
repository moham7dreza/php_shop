<?php

namespace Activities\Admin\Market;

use Activities\Admin\Admin;
use Database\Database;


class ProductCategory extends Admin
{


    public function index()
    {
        $db = new Database();
        $categories = $db->select("SELECT c1.*, c2.name AS parent_name FROM product_categories c1 LEFT JOIN product_categories c2 ON c1.parent_id = c2.id")->fetchAll();

        require_once BASE_PATH . '/template/admin/market/product-category/index.php';
    }

    public function create()
    {
        $db = new Database();
        $product_categories = $db->select("select * from `product_categories` WHERE parent_id IS NULL ")->fetchAll();
        require_once BASE_PATH . '/template/admin/market/product-category/create.php';
    }

    public function store($request)
    {
        $db = new Database();
        $request['image'] = $this->saveImage($request['image'], 'market-category-images');
        if ($request['image']) {
            $db->insert('product_categories', array_keys(array_filter($request)), array_filter($request));
            flash('success', 'عملیات با موفقیت انجام شد');
            $this->redirect('admin/market/product-category');
        } else {
            flash('validation_error', 'فیلد عکس اجباری میباشد');
            $this->redirectBack();
        }
    }


    public function edit($id)
    {
        $db = new Database();
        $product_categories = $db->select("select * from `product_categories` WHERE parent_id IS NULL ")->fetchAll();
        $category = $db->select("SELECT * FROM `product_categories` WHERE id = ?", [$id])->fetch();
        require_once BASE_PATH . '/template/admin/market/product-category/edit.php';
    }

    public function update($request, $id)
    {
        $db = new Database();
        if ($request['image']['tmp_name'] != null) {
            $category = $db->select('select * from `product_categories` where id = ?', [$id])->fetch();
            $this->removeImage($category['image']);
            $request['image'] = $this->saveImage($request['image'], 'market-category-images');
        } else {
            unset($request['image']);
        }
        $db->update('product_categories', $id, array_keys($request), $request);
        flash('success', 'عملیات با موفقیت انجام شد');
        $this->redirect('admin/market/product-category');
    }

    public function changeStatus($id)
    {
        $db = new Database();
        $category = $db->select('SELECT * FROM product_categories WHERE id = ?', [$id])->fetch();
        if ($category) {
            if ($category['status'] == 1) {
                $db->update('product_categories', $id, ['status'], [2]);
            } else {
                $db->update('product_categories', $id, ['status'], [1]);
            }
            echo json_encode(['status' => 'ok', 'message' => 'با موفقیت انجام شد']);
            return true;
        } else {
            echo json_encode(['status' => 'failed', 'message' => 'دسته بندی پیدا نشد']);
            return false;
        }
    }


    public function delete($id)
    {
        $db = new Database();
        $category = $db->select("SELECT * FROM `product_categories` WHERE id = ?", [$id])->fetch();
        if ($category['image']) {
            $this->removeImage($category['image']);
        }
        $db->delete('product_categories', $id);
        flash('success', 'عملیات با موفقیت انجام شد');
        $this->redirectBack();
    }
}
