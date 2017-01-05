<?php

class LoginGuardControler {
    // un contrôleur par url
    var $service;

    public function __construct() {
        $this->service = new AuthService();
    }

    public function preventAccessIfNotLoggedIn() {
    	if (!$this->service->isLogged()) {
    		header('HTTP/1.0 403 Forbidden');
    		include "Views/403View.php";
    		exit();
    	}
    }
}
?>

