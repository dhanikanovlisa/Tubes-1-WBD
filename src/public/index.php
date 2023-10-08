<?php

require_once "../app/init.php";
if (session_status() === PHP_SESSION_NONE) {
    session_start();

    $current_time = time();
    $_SESSION['created_at'] = $current_time;
}

if (session_status() === PHP_SESSION_ACTIVE) {
    $current_time = time();
    if (isset($_SESSION['created_at']) && ($current_time - $_SESSION['created_at'] > 24*60*60)) {
        session_unset();
        session_destroy();
    }
}

$router = new parserrouting($route);
$uri = $_SERVER["REQUEST_URI"];
$method = $_SERVER["REQUEST_METHOD"];
$router->call($uri, $method);
