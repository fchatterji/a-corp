<?php

class LogoutControler {
    // un contrôleur par url
    var $service;
    
    public function __construct() {
        $this->service = new AuthService();
    }

    public function get() {
        $boolean = $this->service->logout($_COOKIE["authID"]);
        header("Location: https://a-corp1.000webhostapp.com/login");
        exit();
    }
}
?>

