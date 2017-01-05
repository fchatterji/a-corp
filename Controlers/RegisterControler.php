<?php

class RegisterControler {
    /* handles registering */
    var $service;
    
    public function __construct() {
        $this->service = new AuthService();
    }

    public function get() {
        /* displays login page (register and login are on the same page) */
    	include("Views/LoginView.php");
    }

    public function post() {
        /* register a user and redirect to home page */
        $array = $this->service->register($_POST['email'], $_POST['password'], $_POST['repeatPassword']);
        header("Location: https://a-corp1.000webhostapp.com/home");
        exit();
    }
}
?>

