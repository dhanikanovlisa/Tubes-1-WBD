<?php

require_once "../app/init.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();

    $current_time = time();
    $_SESSION['created_at'] = $current_time;

    // $tokenMiddleware = new TokenMiddleware();
    // $tokenMiddleware->putToken();
}

$router = new parserrouting($route);
$uri = $_SERVER["REQUEST_URI"];
$method = $_SERVER["REQUEST_METHOD"];
$router->call($uri, $method);

