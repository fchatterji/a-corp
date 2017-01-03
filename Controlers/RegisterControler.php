<?php

class RegisterControler {
    // un contrôleur par url
    var $service;
    
    public function __construct() {
        $this->service = new AuthService();
    }

    public function get() {
    	include("Views/LoginView.php");
    }

    public function post() {
        $array = $this->service->register($_POST['email'], $_POST['password'], $_POST['repeatpassword']);
        header("Location: http://localhost:8080/a-corp/home");
        exit();
    }
}
?>

