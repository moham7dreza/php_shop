<?php

namespace Activities\Admin\Setting;

use Activities\Admin\Admin;
use Database\Database;


class Setting extends Admin
{


    public function index()
    {
        $db = new Database();
        $setting = $db->select("select * from `settings`")->fetch();
        if (!$setting) {
            $db->insert('settings', ['title'], ['سایت تستی']);
            $setting = $db->select("select * from `settings`")->fetch();
        }
        require_once BASE_PATH . '/template/admin/setting/setting/index.php';
    }




    public function edit($id)
    {
        $db = new Database();
        $setting = $db->select("SELECT * FROM `settings`")->fetch();
        if (!$setting) {
            $this->redirect('admin/setting/setting');
        }
        require_once BASE_PATH . '/template/admin/setting/setting/edit.php';
    }

    public function update($request, $id)
    {
        $db = new Database();
        if ($request['logo']['tmp_name'] != null) {
            $setting = $db->select('select * from `settings`')->fetch();
            $this->removeImage($setting['logo']);
            $request['logo'] = $this->saveImage($request['logo'], 'setting-images', 'logo');
        } else {
            unset($request['logo']);
        }

        if ($request['icon']['tmp_name'] != null) {
            $setting = $db->select('select * from `settings`')->fetch();
            $this->removeImage($setting['icon']);
            $request['icon'] = $this->saveImage($request['icon'], 'setting-images', 'icon');
        } else {
            unset($request['icon']);
        }

        $db->update('settings', $id, array_keys($request), $request);
        flash('success', 'عملیات با موفقیت انجام شد');
        $this->redirect('admin/setting/setting');
    }
}
