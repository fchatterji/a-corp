<?php

class OrganismControler {
    /* Handle requests that concern organism entities */
    var $organismService;
    var $authService;
    var $membershipService;
    
    public function __construct() {
        $this->organismService = new OrganismService();
        $this->authService = new AuthService();
        $this->membershipService = new membershipService();
    }

    public function get($organismId) {

        $userId = $this->authService->getUserId();
        $userName = $this->authService->getUserName();

        $organismList = $this->organismService->getOrganismListByUser($userId);

        $organismId = $organismId;
        
        include("Views/OrganismListView.php");
    }

    public function post($organismId) {
        /* create an organism and redirect */

        $userId = $this->authService->getUserId();

        $role = 'creator';

        $this->organismService->createOrganism();
        $organismId = $this->organismService->getLastCreatedOrganismId();

        print_r($organismId);

        $this->membershipService->createMembership($userId, $organismId, $role);

        header("Location: /{$organismId}/organisms");
        exit(); 
    }

    public function put($organismId) {
        /* update an organism and redirect */
        $this->organismService->updateOrganism($organismId);
        header("Location: /{$organismId}/organisms");
        exit(); 
    }

    public function delete($organismId) {
        /* delete an organism and redirect */
        $this->organismService->deleteOrganism($organismId);
        header("Location: /{$organismId}/organisms");
        exit(); 
    }
}

?>