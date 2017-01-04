<?php

class SalleDetailControler {
    // un contrôleur par url
    var $service;
    
    public function __construct() {
        $this->service = new SalleService();
    }

    public function get($id) {
        $salle = $this->service->getSalleById($id);
        include("Views/SalleDetailView.php");
    }

    public function post() {
        $this->service->createSalle($_POST['name'], $_POST['places']);
        header("Location: https://a-corp1.000webhostapp.com/salles");
        exit();	
    }

    public function put($id) {
        $this->service->updateSalle($id, $_POST['name'], $_POST['places']);
        header("Location: https://a-corp1.000webhostapp.com/salles");
        exit();	
    }

    public function delete($id) {
        $this->service->deleteSalle($id);
        header("Location: https://a-corp1.000webhostapp.com/salles");
        exit();	
    }
}
?>

