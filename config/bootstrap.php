<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . "/connect.php";

try {
    $capsule->addConnection([
        'driver' => DB_DRIVER,
        'host' => DB_HOST,
        'database' => DB_NAME,
        'username' => DB_HOST,
        'password' => DB_PASSWORD,
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
    ]);
} catch (Exception $exception) {
    var_dump('Failed to establish connection');
}


$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();