<?php


//require configuration
use JetBrains\PhpStorm\NoReturn;

require_once 'config/config.php';

function uri($reservedUrl, $class, $method, $methodField = "GET")
{

    //current URL
    $currentUrl = explode('?', currentUrl())[0];
    $currentUrl = str_replace(CURRENT_DOMAIN, '', $currentUrl);
    $currentUrl = trim($currentUrl, '/ ');
    $currentUrlArray = explode('/', $currentUrl);
    $currentUrlArray = array_filter($currentUrlArray);

    //reserved Url
    $reservedUrl = trim($reservedUrl, '/ ');
    $reservedUrlArray = explode('/', $reservedUrl);
    $reservedUrlArray = array_filter($reservedUrlArray);

    if (sizeof($currentUrlArray) != sizeof($reservedUrlArray) || methodField() != $methodField) {
        return false;
    }

    // admin/category/edit/{id}
    // admin/category/edit/3

    $parameters = [];
    for ($key = 0; $key < sizeof($currentUrlArray); $key++) {
        if ($reservedUrlArray[$key][0] == '{' && $reservedUrlArray[$key][strlen($reservedUrlArray[$key]) - 1] == '}') {
            $parameters[] = $currentUrlArray[$key];
        } elseif ($currentUrlArray[$key] !== $reservedUrlArray[$key]) {
            return false;
        }
    }

    if (methodField() == 'POST') {
        $request = isset($_FILES) ? array_merge($_FILES, $_POST) : $_POST;
        $parameters = array_merge([$request], $parameters);
    }

    $object = new $class;
    call_user_func_array([$object, $method], $parameters);
    exit;
}

function protocol(): string
{
    return stripos($_SERVER['SERVER_PROTOCOL'], 'https') ? 'https://' : 'http://';
}

// echo protocol();

function currentDomain(): string
{
    return protocol() . $_SERVER['HTTP_HOST'];
}

// echo trim(CURRENT_DOMAIN, '/');

function asset($src): string
{
    $domain = trim(CURRENT_DOMAIN, '/ ');
    return $domain . '/' . trim($src, '/ ');
}

// echo asset('admin/style.css');

function url($url): string
{
    $domain = trim(CURRENT_DOMAIN, '/ ');
    return $domain . '/' . trim($url, '/ ');
}

function currentUrl(): string
{
    return currentDomain() . $_SERVER['REQUEST_URI'];
}

function methodField()
{
    return $_SERVER['REQUEST_METHOD'];
}

// echo methodField();

#[NoReturn] function dd($var): void
{
    echo '<pre style="background-color: black; color: springgreen; padding: 10px; font-size: 15px;">';
    var_dump($var);
    exit;
}

// dd('hi');

function displayError($status): void
{
    if ($status) {
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
    } else {
        ini_set('display_errors', 0);
        ini_set('display_startup_errors', 0);
        error_reporting(0);
    }
}

displayError(DISPLAY_ERROR);

global $flashMessage;
if (isset($_SESSION['flash_message'])) {
    $flashMessage = $_SESSION['flash_message'];
    unset($_SESSION['flash_message']);
}

function flash($name, $value = null)
{
    if ($value == null) {
        global $flashMessage;
        return $flashMessage[$name] ?? '';
    } else {
        $_SESSION['flash_message'][$name] = $value;
    }
}
