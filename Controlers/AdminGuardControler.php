<?php

class AdminGuardControler {
	/* prevents acess to pages if the user is not logged in */
    var $service;

    public function __construct() {
        $this->service = new AuthService();
    }

    public function preventAccessIfNotAdmin() {
    	/* if the user is not logged in, redirect him to 403 page */
    	if (!$this->service->isAdmin()) {
    		header('HTTP/1.0 403 Forbidden');
    		include "Views/403NotAdminView.php";
    		exit();
    	}
    }
}
?>
