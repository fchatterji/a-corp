<?php

class SalleControler {
    /* Handle requests that concern salle entities */
    var $service;
    
    public function __construct() {
        $this->service = new SalleService();
    }

    public function getSalleList() {
        /* display a list of salles */
        $salleList = $this->service->getSalleList();
        include("Views/SalleListView.php");
    }

    public function post() {
        /* create a salle and redirect */
        $this->service->createSalle();
        header("Location: /salles");
        exit();	
    }

    public function put($id) {
        /* update a salle and redirect */
        $this->service->updateSalle($id);
        header("Location: /salles");
        exit();	
    }

    public function delete($id) {
        /* delete a salle and redirect */
        $this->service->deleteSalle($id);
        header("Location: /salles");
        exit();	
    }
}
?>

