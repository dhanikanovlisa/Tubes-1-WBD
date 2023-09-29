<?php

require_once "../app/init.php";

$router = new parserrouting($route);
$uri = $_SERVER["REQUEST_URI"];
$method = $_SERVER["REQUEST_METHOD"];
$router->call($uri, $method);

// $db = new Database();
// $db->callQuery("INSERT INTO genre(name) VALUES('Action'); ");
// $db->callQuery("SELECT * FROM genre");
// print_r($db->fetchAllResult());

// define('DB_HOST', $_ENV['POSTGRES_HOST']);
// define('DB_NAME', $_ENV['POSTGRES_DB']);
// define('DB_USER', $_ENV['POSTGRES_USER']);
// define('DB_PASS', $_ENV['POSTGRES_PASSWORD']);
// define('DB_PORT', $_ENV['POSTGRES_PORT']);

// // Test DB Connection
// $handle = pg_connect("host=" . DB_HOST . " dbname=" . DB_NAME . " user=" . DB_USER . " password=" . DB_PASS . " port=" . DB_PORT);

// if ($handle) {
//     echo "Connected to DB: " . DB_NAME . "\n";
// } else {
//     echo "Failed to connect to DB: " . DB_NAME . "\n";
// }

// pg_close($handle);