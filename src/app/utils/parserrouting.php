<?php

class parserrouting{

    private $path;

    public function __construct($path)
    {
        $this->path = $path;
    }

    public function matchURL($path, $pathBrowser){

        $path = trim($path, '/');
        $pathBrowser = trim($pathBrowser, '/');

        $path = explode('/', $path);
        $pathBrowser = explode('/', $pathBrowser);

        if(count($path) != count($pathBrowser)){
            return false;  
        }

        for ($i = 0; $i < count($path); $i++){
            if($path[$i] == $pathBrowser[$i] || substr($path[$i], 0, 1) == ":"){
                continue;
            }
            else {
                return false;
            }
        }

        return true;
    }

    public function checkURL($path, $method){
        foreach ($this->path as $key=>$value){
            if($this->matchURL($key, $path)){
                if (!isset($value[$method])){
                    http_response_code(405);
                    return null; //eror 405
                }
                return $value[$method];
            }
        }
        return null; //ini page 404
    }

    public function call($path, $method){
        $result = $this->checkURL($path, $method);
        
        if ($result === null) {
            if (http_response_code() === 405) {
                $controllerName = "MethodNotAllowedController";
                $methodName = "showMethodNotAllowedPage";
            } else {
                $controllerName = "NotFoundController";
                $methodName = "showNotFoundPage";
            }
            require_once __DIR__ . "/../controller/" . $controllerName . ".php";
            $controller = new $controllerName();
            $controller->$methodName();
        } else {
            $result = explode("@", $result);
            $controllerName = $result[0];
            $methodName = $result[1];
            require_once __DIR__ . "/../controller/" . $controllerName . ".php";
            $controller = new $controllerName();
            $controller->$methodName();
        }
    }
}