<?php

class LoginControler {
    // un contrôleur par url
    var $service;

    public function __construct() {
        $this->service = new AuthService();
    }


    public function get() {
    	include("Views/LoginView.php");
    }

    public function post() {
        $array = $this->service->login($_POST['email'], $_POST['password'], false);
        setcookie('authID', $array["hash"]);
        header("Location: https://a-corp1.000webhostapp.com/home");
        exit();
    }
}
?>

