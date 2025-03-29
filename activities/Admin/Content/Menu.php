<?php

namespace Activities\Admin\Content;

use Activities\Admin\Admin;
use Database\Database;


class Menu extends Admin
{


    public function index()
    {
        $db = new Database();
        $menus = $db->select("SELECT m1.*, m2.name AS parent_name FROM menus m1 LEFT JOIN menus m2 ON m1.parent_id = m2.id")->fetchAll();
        require_once BASE_PATH . '/template/admin/content/menu/index.php';
    }

    public function create()
    {
        $db = new Database();
        $menus = $db->select('select * from `menus` WHERE parent_id IS NULL')->fetchAll();
        require_once BASE_PATH . '/template/admin/content/menu/create.php';
    }

    public function store($request)
    {
        $db = new Database();
        $db->insert('menus', array_keys(array_filter($request)), array_filter($request));
        flash('success', 'عملیات با موفقیت انجام شد');
        $this->redirect('admin/content/menu');
    }


    public function edit($id)
    {
        $db = new Database();
        $menus = $db->select('select * from `menus` WHERE parent_id IS NULL')->fetchAll();
        $menu = $db->select("SELECT * FROM `menus` WHERE id = ?", [$id])->fetch();
        require_once BASE_PATH . '/template/admin/content/menu/edit.php';
    }

    public function update($request, $id)
    {
        $db = new Database();
        $realTime = substr($request['published_at'], 0, 10);
        $request['published_at'] = date('Y-m-d H:i:s', (int)$realTime);
        if ($request['post_category_id'] != null) {
            if ($request['image']['tmp_name'] != null) {
                $post = $db->select('select * from `posts` where id = ?', [$id])->fetch();
                $this->removeImage($post['image']);
                $request['image'] = $this->saveImage($request['image'], 'content-post-images');
            } else {
                unset($request['image']);
            }
            $db->update('posts', $id, array_keys($request), $request);
            flash('success', 'عملیات با موفقیت انجام شد');
            $this->redirect('admin/content/post');
        } else {
            flash('validation_error', 'فیلد دسته بندی اجباری میباشد');
            $this->redirectBack();
        }
    }


    public function delete($id)
    {
        $db = new Database();
        $db->delete('menus', $id);
        flash('success', 'عملیات با موفقیت انجام شد');
        $this->redirectBack();
    }
}
