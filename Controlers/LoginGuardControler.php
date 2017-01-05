<?php

class LoginGuardControler {
	/* prevents acess to pages if the user is not logged in */
    var $service;

    public function __construct() {
        $this->service = new AuthService();
    }

    public function preventAccessIfNotLoggedIn() {
    	/* if the user is not logged in, redirect him to 403 page */
    	if (!$this->service->isLogged()) {
    		//header('HTTP/1.0 403 Forbidden');
    		//include "Views/403View.php";
    		//exit();
    	}
    }
}
?>

