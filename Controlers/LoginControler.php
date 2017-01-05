<?php

class LoginControler {
    /* handles logins */

    var $service;

    public function __construct() {
        $this->service = new AuthService();
    }


    public function get() {
        /* display login page */
    	include("Views/LoginView.php");
    }

    public function post() {
        /* login then redirect to home page */
        $array = $this->service->login($_POST['email'], $_POST['password'], false);
        setcookie('authID', $array["hash"]); // a cookie is used to authenticate the user
        header("Location: https://a-corp1.000webhostapp.com/home");
        exit();
    }
}
?>

