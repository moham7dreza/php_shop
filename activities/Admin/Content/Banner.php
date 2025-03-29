<?php

namespace Activities\Admin\Content;

use Activities\Admin\Admin;
use Database\Database;


class Banner extends Admin
{


    public function index()
    {
        $db = new Database();
        $banners = $db->select("select * from `banners`")->fetchAll();
        require_once BASE_PATH . '/template/admin/content/banner/index.php';
    }

    public function create()
    {
        require_once BASE_PATH . '/template/admin/content/banner/create.php';
    }

    public function store($request)
    {
        $db = new Database();
        $request['image'] = $this->saveImage($request['image'], 'content-banner-images');
        if ($request['image']) {
            $db->insert('banners', array_keys($request), $request);
            flash('success', 'عملیات با موفقیت انجام شد');
            $this->redirect('admin/content/banner');
        } else {
            flash('validation_error', 'فیلد عکس اجباری میباشد');
            $this->redirectBack();
        }
    }


    public function edit($id)
    {
        $db = new Database();
        $banner = $db->select("SELECT * FROM `banners` WHERE id = ?", [$id])->fetch();
        require_once BASE_PATH . '/template/admin/content/banner/edit.php';
    }

    public function update($request, $id)
    {
        $db = new Database();
        if ($request['image']['tmp_name'] != null) {
            $banner = $db->select('select * from `banners` where id = ?', [$id])->fetch();
            $this->removeImage($banner['image']);
            $request['image'] = $this->saveImage($request['image'], 'content-banner-images');
        } else {
            unset($request['image']);
        }
        $db->update('banners', $id, array_keys($request), $request);
        flash('success', 'عملیات با موفقیت انجام شد');
        $this->redirect('admin/content/banner');
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
