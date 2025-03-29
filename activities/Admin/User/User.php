<?php

namespace Activities\Admin\User;

use Activities\Admin\Admin;
use Database\Database;


class User extends Admin
{


    public function index()
    {
        $db = new Database();
        $users = $db->select("select * from `users`")->fetchAll();
        require_once BASE_PATH . '/template/admin/user/user/index.php';
    }


    public function edit($id)
    {
        $db = new Database();
        $user = $db->select("SELECT * FROM `users` WHERE id = ?", [$id])->fetch();
        require_once BASE_PATH . '/template/admin/user/user/edit.php';
    }

    public function update($request, $id)
    {
        $db = new Database();
        $request = ['name' => $request['name'], 'permission' => $request['permission']];
        $db->update('users', $id, array_keys($request), $request);
        flash('success', 'عملیات با موفقیت انجام شد');
        $this->redirect('admin/user/user');
    }


    public function delete($id)
    {
        $db = new Database();
        $banner = $db->select("SELECT * FROM `banners` WHERE id = ?", [$id])->fetch();
        if ($banner['image']) {
            $this->removeImage($banner['image']);
        }
        $db->delete('banners', $id);
        flash('success', 'عملیات با موفقیت انجام شد');
        $this->redirectBack();
    }
}
