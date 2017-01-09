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
        $array = $this->service->register();

        $error = $array["error"];
        $registerMessage = $array["message"];

        if ($error) {
            $_SESSION["registerErrorMessage"] = $registerMessage;
            header("Location: https://a-corp1.000webhostapp.com/login");
            exit();

        } else {
            $_SESSION["registerSuccessMessage"] = $registerMessage;
            header("Location: https://a-corp1.000webhostapp.com/login");
            exit();            
        }
    }
}
?>

