<?php

require_once "../app/init.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();

    $current_time = time();
    $_SESSION['created_at'] = $current_time;
    // print_r(!isset($_SESSION['user_id']));
}

$router = new parserrouting($route);
$uri = $_SERVER["REQUEST_URI"];
$method = $_SERVER["REQUEST_METHOD"];
$router->call($uri, $method);

$db = new Database;
$db->callQuery("SELECT * FROM users");
$db->execute();
$res = $db->fetchAllResult();
print_r($res);