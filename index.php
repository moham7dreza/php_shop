<?php

use Activities\Services\SmsService;


use Activities\Auth\Auth;

session_start();
date_default_timezone_set(timezoneId: "Asia/Tehran");



//autoload
spl_autoload_register(function ($className) {
    $path = BASE_PATH . DIRECTORY_SEPARATOR . 'lib' . DIRECTORY_SEPARATOR;
    $className = str_replace('\\', DIRECTORY_SEPARATOR, $className);
    include $path . $className . '.php';
});


//require app class
require_once 'activities/Services/SmsService.php';



//require app class
require_once 'activities/Home/Home.php';
require_once 'activities/Home/Order.php';
require_once 'activities/Home/Address.php';


//database required
require_once 'database/Database.php';


//require admin class
require_once 'activities/Admin/Admin.php';
require_once 'activities/Admin/Dashboard.php';

//content
require_once 'activities/Admin/Content/PostCategory.php';
require_once 'activities/Admin/Content/Post.php';
require_once 'activities/Admin/Market/Comment.php';
require_once 'activities/Admin/Content/Banner.php';
require_once 'activities/Admin/Content/Faq.php';
require_once 'activities/Admin/Content/Menu.php';
require_once 'activities/Admin/User/User.php';
require_once 'activities/Admin/Setting/Setting.php';
require_once 'activities/Admin/Market/ProductCategory.php';
require_once 'activities/Admin/Market/Brand.php';
require_once 'activities/Admin/Market/Product.php';
require_once 'activities/Admin/Market/Store.php';
require_once 'activities/Admin/Market/CategoryAttribute.php';
require_once 'activities/Admin/Market/CategoryAttributeValue.php';
require_once 'activities/Admin/Market/Payment.php';
require_once 'activities/Admin/Market/Gallery.php';
require_once 'activities/Admin/Market/Delivery.php';
require_once 'activities/Admin/Market/Discount.php';
require_once 'activities/Admin/Market/Order.php';



//require Auth
require_once 'activities/Auth/Auth.php';


//require App




//helpers
require_once 'helpers/helper.php';

// $sms = new SmsService();
// $sms->sendSmsOtp('093921212121', '322332');

//routing
require_once 'routes/web.php';
