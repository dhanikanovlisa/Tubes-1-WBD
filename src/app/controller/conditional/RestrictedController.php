<?php

class RestrictedController{ 
    public function showRestrictedPage(){
        require_once DIRECTORY . "/../component/conditional/Restricted.php";
    }
}