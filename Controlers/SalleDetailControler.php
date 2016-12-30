<?php

class SalleDetailControler {
    // un contrôleur par url
    var $service;
    
    public function __construct() {
        $this->service = new SalleService();
    }

    public function get($id) {
        $salle = $this->service->getSalleById($id);
        include("views/SalleDetailView.php");
    }

    public function post() {
        $stmt = $this->service->createSalle($_POST['name'], $_POST['places']);
        header("Location: http://localhost:8080/a-corp/salles");
        exit();	
    }

    public function put($id) {
        $stmt = $this->service->updateSalle($id, $_POST['name'], $_POST['places']);
        header("Location: http://localhost:8080/a-corp/salles");
        exit();	
    }

    public function delete($id) {
        $stmt = $this->service->deleteSalle($id);
        header("Location: http://localhost:8080/a-corp/salles");
        exit();	
    }
}
?>

