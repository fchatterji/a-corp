<?php

class LoginControler {
    /* handles logins */

    var $service;

    public function __construct() {
        $this->service = new AuthService();
    }


    public function get() {

        $isLogged = $this->service->isLogged();
        include("Views/LoginView.php");            
    }

    public function post() {
        /* login then redirect to reservations page */
        $array = $this->service->login();

        $error = $array["error"];
        $hash = $array["hash"];
        $expire = $array["expire"];
        $loginMessage = $array["message"];

        if ($error) {
            $_SESSION["loginErrorMessage"] = $loginMessage;
            $isLogged = false;
            header("Location: /login");
            exit();

        } else {
            $_SESSION["loginSuccessMessage"] = $loginMessage;
            $isLogged = true;
            // set session cookie
            setcookie('authID', $array["hash"], $expire); 
            // redirect to reservations page
            $day =  $date = date('Y-m-d');
            header("Location: /reservations/".$day);
            exit();            
        }
    }
}
?>

