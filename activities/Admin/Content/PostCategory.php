<?php

namespace Activities\Admin\Content;

use Activities\Admin\Admin;
use Database\Database;


class PostCategory extends Admin
{


    public function index()
    {
        $db = new Database();
        $categories = $db->select("select * from `post_categories`")->fetchAll();
        require_once BASE_PATH . '/template/admin/content/post-category/index.php';
    }

    public function create()
    {
        require_once BASE_PATH . '/template/admin/content/post-category/create.php';
    }

    public function store($request)
    {
        $db = new Database();
        $request['image'] = $this->saveImage($request['image'], 'content-category-images');
        if ($request['image']) {
            $db->insert('post_categories', array_keys($request), $request);
            flash('success', 'عملیات با موفقیت انجام شد');
            $this->redirect('admin/content/post-category');
        } else {
            flash('validation_error', 'فیلد عکس اجباری میباشد');
            $this->redirectBack();
        }
    }


    public function edit($id)
    {
        $db = new Database();
        $category = $db->select("SELECT * FROM `post_categories` WHERE id = ?", [$id])->fetch();
        require_once BASE_PATH . '/template/admin/content/post-category/edit.php';
    }

    public function update($request, $id)
    {
        $db = new Database();
        if ($request['image']['tmp_name'] != null) {
            $category = $db->select('select * from `post_categories` where id = ?', [$id])->fetch();
            $this->removeImage($category['image']);
            $request['image'] = $this->saveImage($request['image'], 'content-category-images');
        } else {
            unset($request['image']);
        }
        $db->update('post_categories', $id, array_keys($request), $request);
        flash('success', 'عملیات با موفقیت انجام شد');
        $this->redirect('admin/content/post-category');
    }

    public function changeStatus($id)
    {
        $db = new Database();
        $category = $db->select('SELECT * FROM post_categories WHERE id = ?', [$id])->fetch();
        if ($category) {
            if ($category['status'] == 1) {
                $db->update('post_categories', $id, ['status'], [2]);
            } else {
                $db->update('post_categories', $id, ['status'], [1]);
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
        $category = $db->select("SELECT * FROM `post_categories` WHERE id = ?", [$id])->fetch();
        if ($category['image']) {
            $this->removeImage($category['image']);
        }
        $db->delete('post_categories', $id);
        flash('success', 'عملیات با موفقیت انجام شد');
        $this->redirectBack();
    }
}
