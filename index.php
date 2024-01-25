<?php
require_once 'vendor/autoload.php';

session_start();


//autoload
spl_autoload_register(function ($className) {
    $path = BASE_PATH . DIRECTORY_SEPARATOR . 'lib' . DIRECTORY_SEPARATOR;
    $className = str_replace('\\', DIRECTORY_SEPARATOR, $className);
    include $path . $className . '.php';
});


//database required
require_once 'database/Database.php';


//require admin class
require_once 'activities/Admin/Admin.php';
require_once 'activities/Admin/Dashboard.php';


//require Auth
require_once 'activities/Auth/Auth.php';


//require App


//helpers
require_once 'helpers/helper.php';

require_once 'config/bootstrap.php';

//routing
require_once 'routes/web.php';
