<?php

namespace Activities\Admin\Market;

use Activities\Admin\Admin;
use Database\Database;


class Discount extends Admin
{


    public function index()
    {
        $db = new Database();
        $discounts =  $db->select("select discounts.*, users.email AS email FROM discounts LEFT JOIN users ON discounts.user_id = users.id")->fetchAll();
        require_once BASE_PATH . '/template/admin/market/discount/index.php';
    }

    public function create()
    {
        $db = new Database();
        $users = $db->select("select * from `users`")->fetchAll();
        require_once BASE_PATH . '/template/admin/market/discount/create.php';
    }

    public function store($request)
    {
        $realTimeStart = substr($request['start_date'], 0, 10);
        $request['start_date'] = date('Y-m-d H:i:s', (int)$realTimeStart);

        $realTimeEnd = substr($request['end_date'], 0, 10);
        $request['end_date'] = date('Y-m-d H:i:s', (int)$realTimeEnd);

        if ($request['amount_type'] == "1") {
            if ($request['amount'] > 100 || $request['amount'] <= 0) {
                $request['amount'] = 1;
            }
        }

        if ($request['type'] == "1" || !$request['user_id']) {
            unset($request['user_id']);
            $request['type'] = 1;
        }

        if (!$request['discount_celling']) {
            unset($request['discount_celling']);
        }

        $db = new Database();
        $db->insert('discounts', array_keys($request), $request);
        flash('success', 'عملیات با موفقیت انجام شد');
        $this->redirect('admin/market/discount');
    }


    public function edit($id)
    {
        $db = new Database();
        $discount = $db->select("SELECT * FROM `discounts` WHERE id = ?", [$id])->fetch();
        $users = $db->select("select * from `users`")->fetchAll();
        require_once BASE_PATH . '/template/admin/market/discount/edit.php';
    }

    public function update($request, $id)
    {

        $realTimeStart = substr($request['start_date'], 0, 10);
        $request['start_date'] = date('Y-m-d H:i:s', (int)$realTimeStart);

        $realTimeEnd = substr($request['end_date'], 0, 10);
        $request['end_date'] = date('Y-m-d H:i:s', (int)$realTimeEnd);

        if ($request['amount_type'] == "1") {
            if ($request['amount'] > 100 || $request['amount'] <= 0) {
                $request['amount'] = 1;
            }
        }


        if ($request['type'] == "1" || !$request['user_id']) {
            $request['user_id'] = null;
            $request['type'] = 1;
        }

        if (!$request['discount_celling']) {
            unset($request['discount_celling']);
        }

        $db = new Database();
        $db->update('discounts', $id, array_keys($request), $request);
        flash('success', 'عملیات با موفقیت انجام شد');
        $this->redirect('admin/market/discount');
    }


    public function delete($id)
    {
        $db = new Database();
        $db->delete('discounts', $id);
        flash('success', 'عملیات با موفقیت انجام شد');
        $this->redirectBack();
    }
}
