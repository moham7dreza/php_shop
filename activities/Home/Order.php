<?php

namespace Activities\Home;

use Database\Database;


class Order
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

        $query = "SELECT * FROM orders WHERE user_id = ? ";
        $params = [$userId];

        $status = $_GET['status'] ?? null;
        if ($status != null) {
            switch ($status) {
                case 'pending':
                    $statusValue = 0;
                    break;
                case 'processing':
                    $statusValue = 1;
                    break;
                case 'deliveried':
                    $statusValue = 2;
                    break;
                case 'canceled':
                    $statusValue = 3;
                    break;
                case 'returned':
                    $statusValue = 4;
                    break;
                default:
                    $statusValue = null;
            }
            if ($statusValue !== null) {
                $query .= " AND order_status = ? ";
                $params[] = $statusValue;
            }
        }


        $query .= " Order by created_at DESC";
        $orders = $db->select($query, $params)->fetchAll();

        foreach ($orders as &$order) {
            $order['delivery_object'] = !empty($order['delivery_object']) ? json_decode($order['delivery_object'], true) : [];
            $order['payment_object'] = !empty($order['payment_object']) ? json_decode($order['payment_object'], true) : [];
            $order['discount_object'] = !empty($order['discount_object']) ? json_decode($order['discount_object'], true) : [];


            $orderItems = $db->select('select p.id, p.name, p.image, oi.quantity, oi.price, oi.total_price from order_items oi join products p ON oi.product_id = p.id where oi.order_id = ?', [$order['id']])->fetchAll();

            $order['products'] = $orderItems;
        }



        require_once BASE_PATH . '/template/app/profile/my-orders.php';
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
