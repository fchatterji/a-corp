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
        $organismList = $this->organismService->getOrganismList($userId);
        $userName = $this->authService->getUserName();
        include("Views/OrganismListView.php");
    }

    public function post() {
        /* create an organism and redirect */
        $this->organismService->createOrganism();
        header("Location: /organisms");
        exit(); 
    }

    public function put($id) {
        /* update an organism and redirect */
        $this->organismService->updateOrganism($id);
        header("Location: /organisms");
        exit(); 
    }

    public function delete($id) {
        /* delete an organism and redirect */
        $this->organismService->deleteOrganism($id);
        header("Location: /organisms");
        exit(); 
    }
}
?>