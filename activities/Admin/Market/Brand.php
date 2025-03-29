<?php

namespace Activities\Admin\Market;

use Activities\Admin\Admin;
use Database\Database;


class Brand extends Admin
{


    public function index()
    {
        $db = new Database();
        $brands = $db->select("select * from `brands`")->fetchAll();
        require_once BASE_PATH . '/template/admin/market/brand/index.php';
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
        dd('hi');

        flash('success', 'عملیات با موفقیت انجام شد');
        $this->redirectBack();
    }
}
