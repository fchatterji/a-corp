<?php

class OrganismControler {
    /* Handle requests that concern organism entities */
    var $organismService;
    var $authService;
    
    public function __construct() {
        $this->organismService = new OrganismService();
        $this->authService = new AuthService();
    }

    public function get() {
        $userId = $this->authService->getUserId();
        $organisms = $this->organismService->getOrganisms($userId);
        $userName = $this->authService->getUserName();
        include("Views/OrganismView.php");
    }
}
?>