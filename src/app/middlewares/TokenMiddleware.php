<?php
require_once __DIR__ . '/../middlewares/' . $middleware . '.php';
class TokenMiddleware
{
    public function putToken(){
        if (!isset($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(24));
        }
    }

    public function checkToken(){
        $token = $_REQUEST['csrf_token'];

        if (!$token || $token !== $_SESSION['csrf_token']) {

        }
    }
}