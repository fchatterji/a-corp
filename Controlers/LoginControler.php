<?php

class LoginControler {
    /* handles logins */

    var $service;

    public function __construct() {
        $this->service = new AuthService();
    }


    public function get() {

        if ($this->service->isLogged()) {
            /* redirect to home page */
            header("Location: https://a-corp1.000webhostapp.com/home");
            exit();             
        } else {
            /* display login page */
            include("Views/LoginView.php");            
        }

    }

    public function post() {
        /* login then redirect to home page */
        $array = $this->service->login();

        $error = $array["error"];
        $hash = $array["hash"];
        $expire = $array["expire"];
        $loginMessage = $array["message"];

        if ($error) {
            $_SESSION["loginErrorMessage"] = $loginMessage;
            header("Location: https://a-corp1.000webhostapp.com/login");
            exit();

        } else {
            $_SESSION["loginSuccessMessage"] = $loginMessage;

            // set session cookie
            setcookie('authID', $array["hash"]); 
            // redirect to home page
            header("Location: https://a-corp1.000webhostapp.com/home");
            exit();            
        }
    }
}
?>

