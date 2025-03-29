<?php

namespace Activities\Admin\Content;

use Activities\Admin\Admin;
use Database\Database;


class Faq extends Admin
{


    public function index()
    {
        $db = new Database();
        $faqs = $db->select("select * from `faqs`")->fetchAll();
        require_once BASE_PATH . '/template/admin/content/faq/index.php';
    }

    public function create()
    {
        require_once BASE_PATH . '/template/admin/content/faq/create.php';
    }

    public function store($request)
    {
        $db = new Database();
        $db->insert('faqs', array_keys($request), $request);
        flash('success', 'عملیات با موفقیت انجام شد');
        $this->redirect('admin/content/faq');
    }


    public function edit($id)
    {
        $db = new Database();
        $faq = $db->select("SELECT * FROM `faqs` WHERE id = ?", [$id])->fetch();
        require_once BASE_PATH . '/template/admin/content/faq/edit.php';
    }

    public function update($request, $id)
    {
        $db = new Database();
        $db->update('faqs', $id, array_keys($request), $request);
        flash('success', 'عملیات با موفقیت انجام شد');
        $this->redirect('admin/content/faq');
    }


    public function delete($id)
    {
        $db = new Database();
        $db->delete('faqs', $id);
        flash('success', 'عملیات با موفقیت انجام شد');
        $this->redirectBack();
    }
}
