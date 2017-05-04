<?php

class MembershipControler {
    /* Handle requests that concern memberships */
    var $membershipService;
    var $authService;
    
    public function __construct() {
        $this->membershipService = new MembershipService();
        $this->authService = new AuthService();
    }

    public function getMembershipList($organismId) {

        $userName = $this->authService->getUserName();

        $membershipList = $this->membershipService->getMembershipListByOrganism($organismId);
        
        include("Views/MembershipView.php");
    }

}

?>