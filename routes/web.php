<?php

//app
uri('/', 'Activities\Home\Home', 'index');
uri('/product/{id}', 'Activities\Home\Home', 'product');
uri('/product/comment-store', 'Activities\Home\Home', 'commentStore', 'POST');
uri('/cart/store', 'Activities\Home\Home', 'addToCart', 'POST');
uri('/cart', 'Activities\Home\Home', 'cart');
uri('/cart/delete', 'Activities\Home\Home', 'deleteFromCart', "POST");
uri('/cart/update-quantity', 'Activities\Home\Home', 'updateQuantity', "POST");
uri('/payment', 'Activities\Home\Home', 'payment');
uri('/apply-discount', 'Activities\Home\Home', 'applyDiscount', "POST");
uri('/submit-order', 'Activities\Home\Home', 'submitOrder', "POST");

//profile
uri('/profile/my-orders', 'Activities\Home\Order', 'index');
uri('/profile/my-addresses', 'Activities\Home\Address', 'index');
uri('/profile/my-addresses/store', 'Activities\Home\Address', 'store', "POST");


//auth
uri('/login-register', 'Activities\Auth\Auth', 'loginRegister');
uri('/login-register-store', 'Activities\Auth\Auth', 'loginRegisterStore', 'POST');
uri('/otp-verify', 'Activities\Auth\Auth', 'verifyOtpView');
uri('/otp-verify-store', 'Activities\Auth\Auth', 'verifyOtpStore', 'POST');
uri('/logout', 'Activities\Auth\Auth', 'logout');



//dashboard
uri('admin', 'Activities\Admin\Dashboard', 'index');


//content

//post category
uri('admin/content/post-category', 'Activities\Admin\Content\PostCategory', 'index');
uri('admin/content/post-category/create', 'Activities\Admin\Content\PostCategory', 'create');
uri('admin/content/post-category/store', 'Activities\Admin\Content\PostCategory', 'store', "POST");
uri('admin/content/post-category/change-status/{id}', 'Activities\Admin\Content\PostCategory', 'changeStatus');
uri('admin/content/post-category/edit/{id}', 'Activities\Admin\Content\PostCategory', 'edit');
uri('admin/content/post-category/update/{id}', 'Activities\Admin\Content\PostCategory', 'update', "POST");
uri('admin/content/post-category/delete/{id}', 'Activities\Admin\Content\PostCategory', 'delete');


//post
uri('admin/content/post', 'Activities\Admin\Content\Post', 'index');
uri('admin/content/post/create', 'Activities\Admin\Content\Post', 'create');
uri('admin/content/post/store', 'Activities\Admin\Content\Post', 'store', "POST");
uri('admin/content/post/change-status/{id}', 'Activities\Admin\Content\Post', 'changeStatus');
uri('admin/content/post/change-commentable/{id}', 'Activities\Admin\Content\Post', 'changeCommentable');
uri('admin/content/post/edit/{id}', 'Activities\Admin\Content\Post', 'edit');
uri('admin/content/post/update/{id}', 'Activities\Admin\Content\Post', 'update', "POST");
uri('admin/content/post/delete/{id}', 'Activities\Admin\Content\Post', 'delete');





//banner
uri('admin/content/banner', 'Activities\Admin\Content\Banner', 'index');
uri('admin/content/banner/create', 'Activities\Admin\Content\Banner', 'create');
uri('admin/content/banner/store', 'Activities\Admin\Content\Banner', 'store', "POST");
uri('admin/content/banner/edit/{id}', 'Activities\Admin\Content\Banner', 'edit');
uri('admin/content/banner/update/{id}', 'Activities\Admin\Content\Banner', 'update', "POST");
uri('admin/content/banner/delete/{id}', 'Activities\Admin\Content\Banner', 'delete');
//////////////////////////////////



//faqs
uri('admin/content/faq', 'Activities\Admin\Content\Faq', 'index');
uri('admin/content/faq/create', 'Activities\Admin\Content\Faq', 'create');
uri('admin/content/faq/store', 'Activities\Admin\Content\Faq', 'store', "POST");
uri('admin/content/faq/edit/{id}', 'Activities\Admin\Content\Faq', 'edit');
uri('admin/content/faq/update/{id}', 'Activities\Admin\Content\Faq', 'update', "POST");
uri('admin/content/faq/delete/{id}', 'Activities\Admin\Content\Faq', 'delete');
//////////////////////////////////


//menus
uri('admin/content/menu', 'Activities\Admin\Content\Menu', 'index');
uri('admin/content/menu/create', 'Activities\Admin\Content\Menu', 'create');
uri('admin/content/menu/store', 'Activities\Admin\Content\Menu', 'store', "POST");
uri('admin/content/menu/edit/{id}', 'Activities\Admin\Content\Menu', 'edit');
uri('admin/content/menu/update/{id}', 'Activities\Admin\Content\Menu', 'update', "POST");
uri('admin/content/menu/delete/{id}', 'Activities\Admin\Content\Menu', 'delete');
//////////////////////////////////



//users
uri('admin/user/user', 'Activities\Admin\User\User', 'index');
uri('admin/user/user/edit/{id}', 'Activities\Admin\User\User', 'edit');
uri('admin/user/user/update/{id}', 'Activities\Admin\User\User', 'update', "POST");
//////////////////////////////////



//setting
uri('admin/setting/setting', 'Activities\Admin\Setting\Setting', 'index');
uri('admin/setting/setting/edit/{id}', 'Activities\Admin\Setting\Setting', 'edit');
uri('admin/setting/setting/update/{id}', 'Activities\Admin\Setting\Setting', 'update', "POST");
//////////////////////////////////


//Market

//post category
uri('admin/market/product-category', 'Activities\Admin\Market\ProductCategory', 'index');
uri('admin/market/product-category/create', 'Activities\Admin\Market\ProductCategory', 'create');
uri('admin/market/product-category/store', 'Activities\Admin\Market\ProductCategory', 'store', "POST");
uri('admin/market/product-category/change-status/{id}', 'Activities\Admin\Market\ProductCategory', 'changeStatus');
uri('admin/market/product-category/edit/{id}', 'Activities\Admin\Market\ProductCategory', 'edit');
uri('admin/market/product-category/update/{id}', 'Activities\Admin\Market\ProductCategory', 'update', "POST");
uri('admin/market/product-category/delete/{id}', 'Activities\Admin\Market\ProductCategory', 'delete');



//brand
uri('admin/market/brand', 'Activities\Admin\Market\Brand', 'index');
uri('admin/market/brand/create', 'Activities\Admin\Market\Brand', 'create');
uri('admin/market/brand/store', 'Activities\Admin\Market\Brand', 'store', "POST");
uri('admin/market/brand/change-status/{id}', 'Activities\Admin\Market\Brand', 'changeStatus');
uri('admin/market/brand/edit/{id}', 'Activities\Admin\Market\Brand', 'edit');
uri('admin/market/brand/update/{id}', 'Activities\Admin\Market\Brand', 'update', "POST");
uri('admin/market/brand/delete/{id}', 'Activities\Admin\Market\Brand', 'delete');



//product
uri('admin/market/product', 'Activities\Admin\Market\Product', 'index');
uri('admin/market/product/create', 'Activities\Admin\Market\Product', 'create');
uri('admin/market/product/store', 'Activities\Admin\Market\Product', 'store', "POST");
uri('admin/market/product/change-status/{id}', 'Activities\Admin\Market\Product', 'changeStatus');
uri('admin/market/product/edit/{id}', 'Activities\Admin\Market\Product', 'edit');
uri('admin/market/product/update/{id}', 'Activities\Admin\Market\Product', 'update', "POST");
uri('admin/market/product/delete/{id}', 'Activities\Admin\Market\Product', 'delete');
uri('admin/market/product/show/{id}', 'Activities\Admin\Market\Product', 'show');




//store
uri('admin/market/store', 'Activities\Admin\Market\Store', 'index');
uri('admin/market/store/edit/{productId}', 'Activities\Admin\Market\Store', 'edit');
uri('admin/market/store/update/{productId}', 'Activities\Admin\Market\Store', 'update', "POST");
uri('admin/market/store/add-form/{productId}', 'Activities\Admin\Market\Store', 'addForm');
uri('admin/market/store/add/{productId}', 'Activities\Admin\Market\Store', 'add', "POST");



//comment
uri('admin/market/comment', 'Activities\Admin\Market\Comment', 'index');
uri('admin/market/comment/show/{id}', 'Activities\Admin\Market\Comment', 'show');
uri('admin/market/comment/change-status/{id}', 'Activities\Admin\Market\Comment', 'changeStatus', "POST");
uri('admin/market/comment/answer/{id}', 'Activities\Admin\Market\Comment', 'answer', "POST");




//category-attribute
uri('admin/market/category-attribute', 'Activities\Admin\Market\CategoryAttribute', 'index');
uri('admin/market/category-attribute/create', 'Activities\Admin\Market\CategoryAttribute', 'create');
uri('admin/market/category-attribute/store', 'Activities\Admin\Market\CategoryAttribute', 'store', "POST");
uri('admin/market/category-attribute/edit/{id}', 'Activities\Admin\Market\CategoryAttribute', 'edit');
uri('admin/market/category-attribute/update/{id}', 'Activities\Admin\Market\CategoryAttribute', 'update', "POST");
uri('admin/market/category-attribute/delete/{id}', 'Activities\Admin\Market\CategoryAttribute', 'delete');



//category-attribute-value
uri('admin/market/category-attribute-value/{category-attribute}', 'Activities\Admin\Market\CategoryAttributeValue', 'index');
uri('admin/market/category-attribute-value/{category-attribute}/create', 'Activities\Admin\Market\CategoryAttributeValue', 'create');
uri('admin/market/category-attribute-value/{category-attribute}/store', 'Activities\Admin\Market\CategoryAttributeValue', 'store', "POST");
uri('admin/market/category-attribute-value/{category-attribute}/edit/{id}', 'Activities\Admin\Market\CategoryAttributeValue', 'edit');
uri('admin/market/category-attribute-value/{category-attribute}/update/{id}', 'Activities\Admin\Market\CategoryAttributeValue', 'update', "POST");
uri('admin/market/category-attribute-value/delete/{id}', 'Activities\Admin\Market\CategoryAttributeValue', 'delete');




//payment
uri('admin/market/payment', 'Activities\Admin\Market\Payment', 'index');
uri('admin/market/payment/change-status/{id}', 'Activities\Admin\Market\Payment', 'changeStatus');




//gallery
uri('admin/market/product/{product_id}/gallery', 'Activities\Admin\Market\Gallery', 'index');
uri('admin/market/product/{product_id}/gallery/create', 'Activities\Admin\Market\Gallery', 'create');
uri('admin/market/product/{product_id}/gallery/store', 'Activities\Admin\Market\Gallery', 'store', "POST");
uri('admin/market/product/{product_id}/gallery/edit/{id}', 'Activities\Admin\Market\Gallery', 'edit');
uri('admin/market/product/{product_id}/gallery/update/{id}', 'Activities\Admin\Market\Gallery', 'update', "POST");
uri('admin/market/gallery/delete/{id}', 'Activities\Admin\Market\Gallery', 'delete');




//delivery
uri('admin/market/delivery', 'Activities\Admin\Market\Delivery', 'index');
uri('admin/market/delivery/create', 'Activities\Admin\Market\Delivery', 'create');
uri('admin/market/delivery/store', 'Activities\Admin\Market\Delivery', 'store', "POST");
uri('admin/market/delivery/edit/{id}', 'Activities\Admin\Market\Delivery', 'edit');
uri('admin/market/delivery/update/{id}', 'Activities\Admin\Market\Delivery', 'update', "POST");
uri('admin/market/delivery/delete/{id}', 'Activities\Admin\Market\Delivery', 'delete');


//discount
uri('admin/market/discount', 'Activities\Admin\Market\Discount', 'index');
uri('admin/market/discount/create', 'Activities\Admin\Market\Discount', 'create');
uri('admin/market/discount/store', 'Activities\Admin\Market\Discount', 'store', "POST");
uri('admin/market/discount/edit/{id}', 'Activities\Admin\Market\Discount', 'edit');
uri('admin/market/discount/update/{id}', 'Activities\Admin\Market\Discount', 'update', "POST");
uri('admin/market/discount/delete/{id}', 'Activities\Admin\Market\Discount', 'delete');



//order
uri('admin/market/order', 'Activities\Admin\Market\Order', 'index');
// uri('admin/market/order/edit/{id}', 'Activities\Admin\Market\Order', 'edit');
// uri('admin/market/order/update/{id}', 'Activities\Admin\Market\Order', 'update', "POST");
uri('admin/market/order/show/{id}', 'Activities\Admin\Market\Order', 'show');
uri('admin/market/order/items/{orderId}', 'Activities\Admin\Market\Order', 'items');




echo '404 - not found!!!';
exit;
