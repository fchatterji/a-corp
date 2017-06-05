<?php

class SalleControler {
    /* Handle requests that concern salle entities */
    var $salleService;
    var $authService;
    
    public function __construct() {
        $this->salleService = new SalleService();
        $this->authService = new AuthService();
    }

    public function getSalleList($organismId) {
        /* display a list of salles */
        $salleList = $this->salleService->getSalleList($organismId);

        // get user id and user name from authservice
        $userName = $this->authService->getUserName();

        // make organism variable available in the view
        $organismId = $organismId;

        include("Views/SalleListView.php");
    }

    public function post($organismId) {
        /* create a salle and redirect */
        $this->salleService->createSalle($organismId);
        header("Location: /{$organismId}/salles");
        exit();	
    }

    public function put($organismId, $salleId) {
        /* update a salle and redirect */
        $this->salleService->updateSalle($salleId);
        header("Location: /{$organismId}/salles");
        exit();	
    }

    public function delete($organismId, $salleId) {
        /* delete a salle and redirect */
        $this->salleService->deleteSalle($salleId);
        header("Location: /{$organismId}/salles");
        exit();	
    }
}
?>

