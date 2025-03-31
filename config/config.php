<?php

//config
define('BASE_PATH', dirname(__DIR__));
define('DISPLAY_ERROR', true);
define('CURRENT_DOMAIN', trim(currentDomain(), '/') . '/php-shop/');
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_NAME', 'shop_php');
define('DB_PASSWORD', 'password');
define('DB_DRIVER', 'mysql');

//mail config
define('MAIL_HOST', 'smtp.gmail.com');
define('SMTP_AUTH', true);
define('MAIL_USERNAME', '');
define('MAIL_PASSWORD', '');
define('MAIL_PORT', 587);
define('SENDER_MAIL', '');
define('SENDER_NAME', 'دوره پی اچ پی');
