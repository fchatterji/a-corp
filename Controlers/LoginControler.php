<?php

class LoginControler {
    /* handles logins */

    var $authService;

    public function __construct() {
        $this->authService = new AuthService();
        $this->organismService = new organismService();
    }

    public function get() {
        /* display login page */
        $isLogged = $this->authService->isLogged();
        $userName = $this->authService->getUserName();
        include("Views/LoginView.php");            
    }

    public function post() {
        /* login then redirect to reservations page */

        // login
        $array = $this->authService->login();

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
            $userId = $this->authService->getUserId();
            $organismId = $this->organismService->findCurrentUserOrganism(5);
            header("Location: {$organismId[id]}/reservations/".$day);
            exit();            
        }
    }
}
?>

