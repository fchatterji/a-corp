<?php

class SalleControler {
    /* Handle requests that concern salle entities */
    var $salleService;
    var $authService;
    
    public function __construct() {
        $this->salleService = new SalleService();
        $this->authService = new AuthService();
    }

    public function getSalleList() {
        /* display a list of salles */
        $salleList = $this->salleService->getSalleList();

        // get user id and user name from authservice
        $userName = $this->authService->getUserName();

        include("Views/SalleListView.php");
    }

    public function post() {
        /* create a salle and redirect */
        $this->salleService->createSalle();
        header("Location: /salles");
        exit();	
    }

    public function put($id) {
        /* update a salle and redirect */
        $this->salleService->updateSalle($id);
        header("Location: /salles");
        exit();	
    }

    public function delete($id) {
        /* delete a salle and redirect */
        $this->salleService->deleteSalle($id);
        header("Location: /salles");
        exit();	
    }
}
?>

