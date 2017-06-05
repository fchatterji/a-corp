<?php

class RegisterControler {
    /* handles registering */
    var $authService;
    var $organismService;
    var $membershipService;
    
    public function __construct() {
        $this->authService = new AuthService();
        $this->organismService = new OrganismService();

    }

    public function get() {
        /* displays login page (register and login are on the same page) */
    	include("Views/LoginView.php");
    }

    public function post() {
        /* register a user and redirect to login page */
        $array = $this->authService->register();

        $error = $array["error"];
        $registerMessage = $array["message"];

        if ($error) {
            $_SESSION["registerErrorMessage"] = $registerMessage;
            header("Location: /login");
            exit();

        } else {

            $_SESSION["registerSuccessMessage"] = $registerMessage;
            header("Location: /login");
            exit();            
        }
    }
}

?>
