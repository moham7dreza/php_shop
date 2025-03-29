<?php

namespace Activities\Home;

use Database\Database;


class Home
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
        $slides = $db->select('select * from banners where status = 1 order by created_at DESC')->fetchAll();
        $popularProducts = $db->select('select * from products order by view DESC LIMIT 10')->fetchAll();
        $recommendedProducts = $db->select('select * from products where sold_number > 0 order by sold_number DESC LIMIT 10')->fetchAll();
        $brands = $db->select('select * from brands  order by created_at DESC')->fetchAll();


        require_once BASE_PATH . '/template/app/index.php';
    }

    public function product($id)
    {
        $db = new Database();
        $product = $db->select('select * from products where id = ? AND status = 1', [$id])->fetch();

        $db->update('products', $id, ['view'], [$product['view'] + 1]);

        $categories = $this->getAllCategories($product['product_category_id']);

        $galleryImages = $db->select('select * from galleries where product_id = ?', [$id])->fetchAll();

        $relatedProducts = $this->getRelatedProductsByCategory($product['product_category_id'], $id);

        $comments = $this->getComments($id);



        require_once BASE_PATH . '/template/app/product.php';
    }

    private function getComments($productId, $parentId = null)
    {
        $db = new Database();

        if ($parentId == null) {
            $comments = $db->select('select * from comments where product_id = ? AND parent_id IS NULL AND status = "approved"', [$productId])->fetchAll();
        } else {
            $comments = $db->select('select * from comments where product_id = ? AND parent_id = ? AND status = "approved"', [$productId, $parentId])->fetchAll();
        }

        foreach ($comments as &$comment) {
            $comment['replies'] = $this->getComments($productId, $comment['id']);
        }

        return $comments;
    }

    private function getAllCategories($categoryId)
    {
        $db = new Database();
        $category = $db->select('select * from product_categories where id = ?', [$categoryId])->fetch();
        if ($category['parent_id']) {
            $parentCategory = $this->getAllCategories($category['parent_id']);
            return array_merge($parentCategory, [$category]);
        }

        return [$category];
    }

    public function getRelatedProductsByCategory($categoryId, $productId)
    {
        $db = new Database();

        $relatedProducts = $db->select('select * from products where product_category_id = ? AND id != ? AND status = 1 LIMIT 10', [$categoryId, $productId])->fetchAll();

        return $relatedProducts;
    }


    public function commentStore($request)
    {
        if (!empty($request['comment'])) {
            if (isset($_SESSION['user'])) {
                $db = new Database();
                $request = [
                    'body' => $request['comment'],
                    'user_id' => $_SESSION['user'],
                    'product_id' => $request['product_id'],
                    'parent_id' => $request['parent_id'] == 0 ? null : $request['parent_id'],
                ];
                $db->insert('comments', array_keys($request), $request);
            }
        }
        $this->redirect('product/' . $request['product_id']);
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

    public function addToCart($request)
    {
        if (isset($_SESSION['user'])) {
            $db = new Database();
            $userId = $_SESSION['user'];
            $productId = $request['product_id'];
            $quantity = $request['quantity'];

            $product = $db->select('SELECT price,marketable_number FROM products WHERE id = ?', [$productId])->fetch();

            if (!$product) {
                $this->redirectBack();
                return;
            }

            if ($product['marketable_number'] < $quantity) {
                flash('cart_error', 'موجودی کافی نیست');
                $this->redirectBack();
                return;
            }

            $totalPrice = $product['price'] * $quantity;
            $cart = $db->select("select * from carts WHERE user_id = ? AND status = 1", [$userId])->fetch();

            if (!$cart) {
                $cartId = $db->insert('carts', ['user_id', 'status', 'expired_at', 'total_price', 'total_off_price', 'discount_status'], [$userId, 1, date('Y-m-d H:i:s', strtotime('+1 day')), 0, 0, 2]);
            } else {
                $cartId = $cart['id'];
            }


            $cartItem = $db->select('select * from cart_items where cart_id = ? and product_id = ?', [$cartId, $productId])->fetch();

            if ($cartItem) {
                $newQuantity = $cartItem['quantity'] + $quantity;

                if ($product['marketable_number'] < $newQuantity) {
                    flash('cart_error', 'موجودی کافی نیست');
                    $this->redirectBack();
                    return;
                }

                $newTotalPrice = $newQuantity * $product['price'];
                $db->update('cart_items', $cartItem['id'], ['quantity', 'total_price'], [$newQuantity, $newTotalPrice]);
            } else {
                $db->insert('cart_items', ['user_id', 'cart_id', 'quantity', 'total_price', 'product_id'], [$userId, $cartId, $quantity, $totalPrice, $productId]);
            }

            $cartTotal = $db->select('select SUM(total_price) AS total FROM cart_items where cart_id = ?', [$cartId])->fetch()['total'];
            $db->update('carts', $cartId, ['total_price'], [$cartTotal]);
            flash('cart_success', 'محصول با موفقیت به سبد خرید اضافه شد');
            $this->redirectBack();
        } else {
            $this->redirect('product/' . $request['product_id']);
        }
    }

    public function cart()
    {
        if (!isset($_SESSION['user'])) {
            $this->redirect('login-register');
            return;
        }

        $userId = $_SESSION['user'];
        $db = new Database();

        $cart = $db->select('select * from carts where user_id = ? AND status = 1', [$userId])->fetch();

        $cartItems = [];
        if ($cart) {
            $cartItems = $db->select("select ci.*, p.name, p.price, p.image from cart_items ci join products p ON ci.product_id = p.id where ci.cart_id = ?", [$cart['id']])->fetchAll();
        }

        require_once BASE_PATH . '/template/app/cart.php';
    }

    public function deleteFromCart($request)
    {
        if (isset($request['cart_item_id']) && isset($_SESSION['user'])) {
            $db = new Database();
            $cartItemId = $request['cart_item_id'];
            $userId = $_SESSION['user'];

            $db->delete('cart_items', $cartItemId);

            $cart = $db->select('select id from carts where user_id = ? AND status = 1', [$userId])->fetch();
            if ($cart) {
                $cartId = $cart['id'];

                $remainingItems = $db->select('select COUNT(*) AS count from cart_items where cart_id = ?', [$cartId])->fetch()['count'];

                if ($remainingItems > 0) {
                    $cartTotalResult = $db->select('select SUM(total_price) AS total FROM cart_items where cart_id = ?', [$cartId])->fetch();
                    $cartTotal = $cartTotalResult['total'] !== null ? $cartTotal = $cartTotalResult['total'] : 0;
                    $db->update('carts', $cartId, ['total_price'], [$cartTotal]);
                } else {
                    $db->delete('carts', $cartId);
                }
            }

            flash('success', 'محصول با موفقیت حذف شد');
            $this->redirectBack();
        } else {
            flash('error', 'خطا در حذف از سبد خرید');
            $this->redirectBack();
        }
    }

    public function updateQuantity($request)
    {

        if (isset($request['cart_item_id']) && isset($request['quantity']) && isset($_SESSION['user'])) {
            $db = new Database();
            $cartItemId = $request['cart_item_id'];
            $quantity = max(1, (int)$request['quantity']);
            $userId = $_SESSION['user'];

            $cartItem = $db->select('select * from cart_items where id = ? AND user_id = ?', [$cartItemId, $userId])->fetch();
            if ($cartItem) {
                $product = $db->select('select price from products where id = ?', [$cartItem['product_id']])->fetch();
                $totalPrice = $product['price'] * $quantity;
                $db->update('cart_items', $cartItemId, ['quantity', 'total_price'], [$quantity, $totalPrice]);

                $cartId = $cartItem['cart_id'];
                $cartTotal = $db->select('select SUM(total_price) AS total FROM cart_items where cart_id = ?', [$cartId])->fetch()['total'] ?? 0;
                $db->update('carts', $cartId, ['total_price'], [$cartTotal]);
            }
        }
        $this->redirectBack();
    }


    public function payment()
    {
        if (!isset($_SESSION['user'])) {
            $this->redirect('login-register');
            return;
        }

        $userId = $_SESSION['user'];
        $db = new Database();

        $cart = $db->select('select * from carts where user_id = ? AND status = 1', [$userId])->fetch();
        if (!$cart) {
            flash('error', 'سبد خرید خالی است');
            $this->redirect('/cart');
            return;
        }
        $cartItems = [];
        $totalItems = 0;
        $totalPrice = 0;

        if ($cart) {
            $cartItems = $db->select('SELECT ci.*, p.price, p.name from cart_items ci JOIN products p ON ci.product_id = p.id where ci.cart_id = ?', [$cart['id']])->fetchAll();

            foreach ($cartItems as $item) {
                $totalItems += $item['quantity'];
                $totalPrice += $item['total_price'];
            }
        }

        $shippingMethods = $db->select('select * from deliveries')->fetchAll();
        $addresses = $db->select('select * from addresses where user_id = ? AND status = 1', [$userId])->fetchAll();

        $discount = 0;
        $totalPayable = $totalPrice - $discount;

        require_once BASE_PATH . '/template/app/payment.php';
    }

    public function applyDiscount($request)
    {

        if (isset($request['discount_code']) && isset($_SESSION['user'])) {

            $db = new Database();
            $discountCode = trim($request['discount_code']);
            $userId = $_SESSION['user'];

            $cartItems = $db->select('select ci.total_price from cart_items ci join carts c ON ci.cart_id = c.id where c.user_id = ? AND c.status = 1', [$userId])->fetchAll();
            $totalPrice = 0;
            foreach ($cartItems as $item) {
                $totalPrice += $item['total_price'];
            }

            $discount = $db->select('select * from discounts where code = ? AND status = 1 AND start_date <= NOW() AND (end_date IS NULL OR end_date >= NOW())', [$request['discount_code']])->fetch();
            if ($discount) {
                $discountAmount = 0;
                if ($discount['amount_type'] == 1) {
                    $discountAmount = ($totalPrice * $discount['amount']) / 100;
                    if ($discount['discount_celling'] && $discountAmount > $discount['discount_celling']) {
                        $discountAmount = $discount['discount_celling'];
                    }
                } else {
                    $discountAmount = $discount['amount'];
                }

                if ($discountAmount > $totalPrice) {
                    $discountAmount = $totalPrice;
                }

                $_SESSION['discount'] = $discountAmount;
                $_SESSION['discount_id'] = $discount['id'];
                flash('success', 'کد تخفیف با موفقیت اعمال شد');
            } else {
                flash('error', 'کد وارد شده معتبر نیست یا منقضی شده است');
            }
        } else {
            flash('error', 'لطفا کد معتبر وارد کنید');
        }

        $this->redirect('/payment');
    }

    public function submitOrder($request)
    {
        if (isset($_SESSION['user'])) {
            $userId = $_SESSION['user'];
            $db = new Database();

            if (empty($request['address_id']) || empty($request['delivery_id']) || empty($request['payment_type'])) {
                flash('error', 'لطفا ادرس روش ارسال و نوع پرداخت را انتخاب نمایید');
                $this->redirect('/payment');
                return;
            }

            $cart = $db->select('select * from carts where user_id = ? AND status = 1', [$userId])->fetch();
            if (!$cart) {
                flash('error', 'سبد خرید خالی است');
                $this->redirect('/payment');
                return;
            }
            $cartItems = $db->select('select ci.*, p.name AS product_name, p.price from cart_items ci JOIN products p ON ci.product_id = p.id where ci.cart_id = ?', [$cart['id']])->fetchAll();

            $totalPrice = 0;
            foreach ($cartItems as $item) {
                $totalPrice += $item['total_price'];
            }

            $discountAmount = $_SESSION['discount'] ?? 0;
            $discountId = $_SESSION['discount_id'] ?? null;

            if (!$discountId && $discountAmount > 0) {
                flash('error', 'شناسه تخفیف یافت نشد');
                $this->redirect('/payment');
                return;
            }

            $finalAmount = max($totalPrice - $discountAmount, 0);

            $delivery = $db->select('select * from deliveries where id = ?', [$request['delivery_id']])->fetch();
            if (!$delivery) {
                flash('error', 'روش ارسال نا معتبر');
                $this->redirect('/payment');
                return;
            }
            $deliveryAmount = $delivery['amount'];

            $address = $db->select('select * from addresses where id = ? AND user_id = ?', [$request['address_id'], $userId])->fetch();

            if (!$address) {
                flash('error', 'ادرس وارد شده نا معتبر است');
                $this->redirect('/payment');
                return;
            }

            $trackingCode = uniqid('pay_');
            $paymentId = $db->insert('payments', ['tracking_code', 'amount', 'user_id', 'gateway', 'status'], [$trackingCode, $finalAmount, $userId, 'zarinpal', 1]);

            $orderId = $db->insert('orders', ['user_id', 'address_id', 'address_object', 'delivery_id', 'delivery_object', 'delivery_amount', 'payment_id', 'payment_object', 'payment_type', 'payment_status', 'order_final_amount', 'order_discount_amount', 'order_total_discount_amount', 'cart_id', 'order_status', 'discount_id', 'discount_object'], [$userId, $request['address_id'], json_encode($address), $request['delivery_id'], json_encode($delivery), $deliveryAmount, $paymentId, json_encode(['tracking_code' => $trackingCode]), $request['payment_type'], 1, $finalAmount, $discountAmount, $discountAmount, $cart['id'], 0, $discountId, json_encode(['amount' => $discountAmount])]);

            foreach ($cartItems as $item) {
                $db->insert('order_items', ['order_id', 'product_id', 'product', 'quantity', 'price', 'total_price', 'status'], [$orderId, $item['product_id'], json_encode($item['product_name']), $item['quantity'], $item['price'], $item['total_price'], 1]);
            }

            $db->update('carts', $cart['id'], ['status'], [2]);

            unset($_SESSION['discount']);
            unset($_SESSION['discount_id']);

            flash('success', 'سفارش با موفقیت ثبت شد');
            $this->redirect('/');
            return;
        } else {
            $this->redirect('login-register');
            return;
        }
    }
}
