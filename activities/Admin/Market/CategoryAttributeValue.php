<?php

namespace Activities\Admin\Market;

use Activities\Admin\Admin;
use Database\Database;


class CategoryAttributeValue extends Admin
{


    public function index($id)
    {
        $db = new Database();
        $attribute = $db->select("SELECT * FROM `category_attributes` WHERE id = ?", [$id])->fetch();
        $values = $db->select("select category_values.*, products.name AS product_name from category_values INNER JOIN products ON category_values.product_id = products.id")->fetchAll();
        require_once BASE_PATH . '/template/admin/market/category-attribute-value/index.php';
    }

    public function create($id)
    {
        $db = new Database();
        $attribute = $db->select("SELECT * FROM `category_attributes` WHERE id = ?", [$id])->fetch();
        $products = $db->select("select * from `products`")->fetchAll();
        require_once BASE_PATH . '/template/admin/market/category-attribute-value/create.php';
    }

    public function store($request, $id)
    {
        $db = new Database();
        $attribute = $db->select("SELECT * FROM `category_attributes` WHERE id = ?", [$id])->fetch();
        $value = ['value' => $request['value'], 'increase_price' => $request['increase_price']];
        $value = json_encode($value);
        $db->insert('category_values', ['product_id', 'value', 'category_attribute_id', 'type'], [$request['product_id'], $value, $attribute['id'], $request['type']]);
        $this->redirect('admin/market/category-attribute-value/' . $attribute['id']);
    }


    public function edit($attribute_id, $id)
    {
        $db = new Database();
        $products = $db->select("select * from `products`")->fetchAll();
        $attribute = $db->select("SELECT * FROM `category_attributes` WHERE id = ?", [$attribute_id])->fetch();
        $value = $db->select("SELECT * FROM `category_values` WHERE id = ?", [$id])->fetch();
        require_once BASE_PATH . '/template/admin/market/category-attribute-value/edit.php';
    }

    public function update($request, $attribute_id, $id)
    {
        $db = new Database();
        $attribute = $db->select("SELECT * FROM `category_attributes` WHERE id = ?", [$attribute_id])->fetch();
        $value = ['value' => $request['value'], 'increase_price' => $request['increase_price']];
        $value = json_encode($value);
        $db->update('category_values', $id, ['product_id', 'value', 'category_attribute_id', 'type'], [$request['product_id'], $value, $attribute['id'], $request['type']]);
        flash('success', 'عملیات با موفقیت انجام شد');
        $this->redirect('admin/market/category-attribute-value/' . $attribute['id']);
    }


    public function delete($id)
    {
        $db = new Database();
        $db->delete('category_values', $id);
        flash('success', 'عملیات با موفقیت انجام شد');
        $this->redirectBack();
    }
}
