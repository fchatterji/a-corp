<?php

class LogoutControler {
    /* handles logouts */
    var $service;
    
    public function __construct() {
        $this->service = new AuthService();
    }

    public function get() {
        /* logout and redirect to login page */
        $boolean = $this->service->logout($_COOKIE["authID"]);
        header("Location: https://a-corp1.000webhostapp.com/login");
        exit();
    }
}
?>

