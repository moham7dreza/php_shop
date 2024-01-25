<?php

//config
define('BASE_PATH', dirname(__DIR__));
const DISPLAY_ERROR = true;
define('CURRENT_DOMAIN', trim(currentDomain(), '/'));
const DB_HOST = 'localhost';
const DB_USERNAME = 'root';
const DB_NAME = 'php_shop';
const DB_PASSWORD = '';
const DB_DRIVER = 'mysql';

//mail config
const MAIL_HOST = 'smtp.gmail.com';
const SMTP_AUTH = true;
const MAIL_USERNAME = '';
const MAIL_PASSWORD = '';
const MAIL_PORT = 587;
const SENDER_MAIL = '';
const SENDER_NAME = 'دوره پی اچ پی';
