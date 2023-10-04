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

// $db = new Database;
// $db->callQuery("INSERT INTO users (
//     username,
//     first_name,
//     last_name,
//     email,
//     password,
//     phone_number,
//     photo_profile,
//     is_admin
// ) VALUES
// (
//     'abc',
//     'Jane',
//     'Smith',
//     'jane.smth@example.com', '"
//     . password_hash('opopop',PASSWORD_DEFAULT) ."',
//     '+9876543210',
//     'avatar.jpg',
//     true
// );");
// $db->execute();
