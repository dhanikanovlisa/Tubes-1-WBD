<?php

require_once "../app/init.php";


$router = new parserrouting($route);
$uri = $_SERVER["REQUEST_URI"];
$method = $_SERVER["REQUEST_METHOD"];
$router->call($uri, $method);

// $db = new Database();
// $db->callQuery("INSERT INTO genre(name) VALUES('action');");
// $db->execute();
// $db->callQuery("SELECT * FROM genre");
// print_r($db->fetchAllResult());
// $db->execute();

// $db = new Database();
// $db->callQuery("SELECT * FROM users");
// print_r($db->fetchAllResult());
// $db->execute();

