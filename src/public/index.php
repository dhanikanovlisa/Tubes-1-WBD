<?php

require_once "../app/init.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();

    $current_time = time();
    $_SESSION['created_at'] = $current_time;

}

$router = new parserrouting($route);
$uri = $_SERVER["REQUEST_URI"];
$method = $_SERVER["REQUEST_METHOD"];
$router->call($uri, $method);
<<<<<<< HEAD
=======


// $db = new Database();
// $db->callQuery("INSERT INTO users(username, first_name, last_name, email, password, phone_number, is_admin) VALUES('qwe', '','','aaaa@email.com', 'qwertyui',123456789,true); ");
// $db->callQuery("SELECT * FROM users");
// $db->execute();
// print_r($db->fetchAllResult());

// $db->callQuery("SELECT * FROM users WHERE username = 'itb16521007';");
// $db->execute();
// print_r($db->fetchAllResult());
>>>>>>> 45371298a03ba91c8fc2fe8dc50eecbdbee39af5
