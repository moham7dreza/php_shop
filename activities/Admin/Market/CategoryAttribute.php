<?php

namespace Activities\Admin\Market;

use Activities\Admin\Admin;
use Database\Database;


class CategoryAttribute extends Admin
{


    public function index()
    {
        $db = new Database();
        $attributes = $db->select("select category_attributes.*, product_categories.name AS category_name from category_attributes INNER JOIN product_categories ON category_attributes.product_category_id = product_categories.id")->fetchAll();
        require_once BASE_PATH . '/template/admin/market/category-attribute/index.php';
    }

    public function create()
    {
        $db = new Database();
        $categories = $db->select("select * from `product_categories`")->fetchAll();
        require_once BASE_PATH . '/template/admin/market/category-attribute/create.php';
    }

    public function store($request)
    {
        $db = new Database();
        $db->insert('category_attributes', array_keys($request), $request);
        $this->redirect('admin/market/category-attribute');
    }


    public function edit($id)
    {
        $db = new Database();
        $categories = $db->select("select * from `product_categories`")->fetchAll();
        $attribute = $db->select("SELECT * FROM `category_attributes` WHERE id = ?", [$id])->fetch();
        require_once BASE_PATH . '/template/admin/market/category-attribute/edit.php';
    }

    public function update($request, $id)
    {
        $db = new Database();
        $db->update('category_attributes', $id, array_keys($request), $request);
        flash('success', 'عملیات با موفقیت انجام شد');
        $this->redirect('admin/market/category-attribute');
    }


    public function delete($id)
    {
        $db = new Database();
        $db->delete('category_attributes', $id);
        flash('success', 'عملیات با موفقیت انجام شد');
        $this->redirectBack();
    }
}
