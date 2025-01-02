<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/**
 * 
 * Database setting
 * 
 */
if (!defined('NGROK_IS_ACTIVE')) {


    if (PHP_MAJOR_VERSION >= 8) {
        if (str_contains($_SERVER['SERVER_NAME'], 'ngrok')) {
            $upgradeCss = '<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">';
        } else {
            $upgradeCss = '';
        }
    } else {

        if (strpos($_SERVER['SERVER_NAME'], 'ngrok') === true) {

            $upgradeCss = '<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">';
        } else {
            $upgradeCss = '';
        }
    }
    define('NGROK_IS_ACTIVE', $upgradeCss);
}

if (!defined("SERVER_IS_LIVE")) {
    $serverName = $_SERVER['SERVER_NAME'];
    if ($serverName === 'localhost' || !empty(NGROK_IS_ACTIVE) || $_SERVER['SERVER_NAME'] === $_SERVER['REMOTE_ADDR']) {
        $serverLive = false;
    } else {
        $serverLive = true;
    }
    define("SERVER_IS_LIVE", $serverLive);
}




if (!defined('BASE_FOLDER')) {
    if (SERVER_IS_LIVE) {
        $base = "/school-application/";
    } else {

        $base = "/school-application/";
    }
    define('BASE_FOLDER', $base);
}
/**
 * Root paths and folder
 * 
 */
if (!defined("ROOT_PATH")) {
    define("ROOT_PATH", $_SERVER['DOCUMENT_ROOT'] . BASE_FOLDER);
}
if (!defined("ROOT_URL")) {
    $root_url = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . BASE_FOLDER;
    define("ROOT_URL", $root_url);
}
if (!defined("ENTRY")) {
    $root_url = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . BASE_FOLDER .'log-in';
    define("ENTRY", $root_url);
}
if (!defined("FORM_ACTION")) {
    $root_url = ROOT_URL . 'backend/controller/';
    define("FORM_ACTION", $root_url);
}
if (!defined("ADMIN_DASHBOARD")) {
    $admin_nav = ROOT_URL . 'admin/index?p=dashboard';
    define("ADMIN_DASHBOARD", $admin_nav);
}
if (!defined("ADMIN_NAV")) {
    $admin_nav = ROOT_URL . 'admin/index?p=';
    define("ADMIN_NAV", $admin_nav);
}

if (!defined("ASSETS_URL")) {
    $asset_url = ROOT_URL . 'assets/';
    define("ASSETS_URL", $asset_url);
}

if (!defined("PDF_URL")) {
    $asset_url = ROOT_URL . 'assets/pdf/';
    define("PDF_URL", $asset_url);
}

