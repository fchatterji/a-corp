<?php

class RegisterControler {
    // un contrôleur par url
    var $service;
    
    public function __construct() {
        $this->service = new AuthService();
    }

    public function get() {
    	include("Views/RegisterView.php");
    }

    public function post() {
        $array = $this->service->register($_POST['email'], $_POST['password'], $_POST['repeatpassword']);
        var_dump($array);	
    }
}
?>

