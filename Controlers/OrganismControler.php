<?php

class OrganismControler {
    /* Handle requests that concern organism entities */
    var $organismService;
    var $authService;
    var $membershipService;
    var $settingService;
    
    public function __construct() {
        $this->organismService = new OrganismService();
        $this->authService = new AuthService();
        $this->membershipService = new membershipService();
        $this->settingService = new settingService();
    }

    public function get($organismId) {

        $userId = $this->authService->getUserId();
        $userName = $this->authService->getUserName();

        $organismList = $this->organismService->getOrganismList($userId);

        $organismId = $organismId;

        $day = date('Y-m-d');
        
        include("Views/OrganismListView.php");
    }

    public function post($organismId) {
        /* create an organism. 
        Create corresponding default membership and settings.
        redirect */

        // create organism
        $this->organismService->createOrganism();

        // create membership of the creating user
        $userId = $this->authService->getUserId();
        $role = 'creator';
        $organismId = $this->organismService->getLastCreatedOrganismId();

        $this->membershipService->createMembership($userId, $organismId, $role);

        // create default settings
        $this->settingService->createSetting($organismId, "startDay", "monday");
        $this->settingService->createSetting($organismId, "endDay", "friday");
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