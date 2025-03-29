<?php

namespace Activities\Admin\Market;

use Activities\Admin\Admin;
use Database\Database;


class Payment extends Admin
{


    public function index()
    {
        $db = new Database();
        $payments = $db->select("select payments.*, users.email AS email FROM payments INNER JOIN users ON payments.user_id = users.id")->fetchAll();
        require_once BASE_PATH . '/template/admin/market/payment/index.php';
    }


    public function changeStatus($id)
    {
        $db = new Database();
        $payment = $db->select('SELECT * FROM payments WHERE id = ?', [$id])->fetch();
        if ($payment) {
            if ($payment['status'] == 1) {
                $db->update('payments', $id, ['status'], [2]);
            } else {
                $db->update('payments', $id, ['status'], [1]);
            }
            echo json_encode(['status' => 'ok', 'message' => 'با موفقیت انجام شد']);
            return true;
        } else {
            echo json_encode(['status' => 'failed', 'message' => 'پرداخت پیدا نشد']);
            return false;
        }
    }
}
