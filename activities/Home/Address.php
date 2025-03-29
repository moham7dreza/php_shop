<?php

namespace Activities\Home;

use Database\Database;


class Address
{

    public $currentDomain;
    public $basePath;

    function __construct()
    {
        $this->currentDomain = CURRENT_DOMAIN;
        $this->basePath = BASE_PATH;
    }

    public function index()
    {
        $db = new Database();

        if (!isset($_SESSION['user'])) {
            flash('error', 'لطفا وارد شوید');
            $this->redirect('login-register');
            return;
        }
        $userId = $_SESSION['user'];


        $addresses = $db->select('select * from addresses where user_id = ? AND status = 1', [$userId])->fetchAll();
        $cities = $db->select('select * from cities')->fetchAll();




        require_once BASE_PATH . '/template/app/profile/my-addresses.php';
    }

    public function store($request)
    {
        $db = new Database();

        if (!isset($_SESSION['user'])) {
            flash('error', 'لطفا وارد شوید');
            $this->redirect('login-register');
            return;
        }
        $userId = $_SESSION['user'];


        $db->insert('addresses', ['user_id', 'city_id', 'postal_code', 'address', 'no', 'unit', 'mobile', 'status'], [$userId, $request['city_id'], $request['postal_code'], $request['address'], $request['no'], $request['unit'], $request['mobile'], 1]);

        flash('success', 'ادرس جدید با موفقیت ثبت شد');

        $this->redirect('profile/my-addresses');
    }

    protected function redirect($url)
    {
        header("Location: " . trim($this->currentDomain, '/ ') . '/' . trim($url, '/ '));
        exit;
    }
    protected function redirectBack()
    {
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit;
    }
}
