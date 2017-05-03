<?php

class AdminGuardControler {
	/* prevents acess to pages if the user is not logged in */
    var $authService;

    public function __construct() {
        $this->authService = new AuthService();
    }

    public function preventAccessIfNotAdmin() {
    	/* if the user is not logged in, redirect him to 403 page */
        $isAdmin = $this->authService->isAdmin();

        // get user id and user name from authservice
        $userName = $this->authService->getUserName();

    	if ($isAdmin === 'false') {
    		header('HTTP/1.0 403 Forbidden');
    		include "Views/403NotAdminView.php";
    		exit();
    	}
    }
}
?>
